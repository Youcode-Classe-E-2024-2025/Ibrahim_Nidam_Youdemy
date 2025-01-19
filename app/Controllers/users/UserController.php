<?php
    namespace UsersController;

    use AdminModel\CategoryModel;
    use AdminModel\TagsModel;
    use AdminModel\TeacherModel;
    use Core\Controller;
    use CourseModel\CourseModel;
    use Middleware\CsrfMiddleware;
    use Model\StatisticsModel;
    use Security\Security;
    use UsersModel\UserModel;

    class UserController extends Controller {
        private $userModel;
        private $csrfMiddleware;
        protected $security;
        protected $stats;
        protected $tags;
        protected $categories;
        protected $courseModel;
        protected $teacherModel;

        public function __construct(){
            $this->userModel = new UserModel();
            $this->csrfMiddleware = new CsrfMiddleware();
            $this->security = new Security();
            $this->stats = new StatisticsModel();
            $this->tags = new TagsModel();
            $this->categories = new CategoryModel();
            $this->courseModel = new CourseModel();
            $this->teacherModel = new TeacherModel();
        }

        public function registerStudent(){
            if($_SERVER["REQUEST_METHOD"] === "POST"){
                $this->csrfMiddleware->handle($_POST);

                $name = $_POST["learn-username"] ?? "";
                $email = $_POST["learn-email"] ?? "";
                $password = $_POST["learn-password"] ?? "";
                $confirmedPass = $_POST["learn-password-confirmed"] ?? "";

                if($password !== $confirmedPass){
                    $this->setFlash("error", "Passwords do not match");
                    $this->redirect("../Public");
                }

                $this->userModel->setUsername($name);
                $this->userModel->setEmail($email);
                $this->userModel->setPassword($password);
                $this->userModel->setRole("student");

                if($this->userModel->findUserByEmail($email)){
                    $this->setFlash("error", "Email is already registered.");
                    $this->redirect("../Public");
                }

                $this->userModel->createUser();
                $this->setFlash("success", "Registration successful!");
                $this->redirect("../Public");
            } else {
                $csrfToken = $this->security->generateCsrfToken();
                $this->showView("../Public", ["csrf_token" => $csrfToken]);
            }
        }

        public function registerTeacher(){
            if($_SERVER["REQUEST_METHOD"] === "POST"){
                $this->csrfMiddleware->handle($_POST);

                $name = $_POST["teach-username"] ?? "";
                $email = $_POST["teach-email"] ?? "";
                $password = $_POST["teach-password"] ?? "";
                $confirmedPass = $_POST["teach-password-confirmed"] ?? "";

                if($password !== $confirmedPass){
                    $this->setFlash("error", "Passwords do not match.");
                    $this->redirect("../Public");
                }

                $this->userModel->setUsername($name);
                $this->userModel->setEmail($email);
                $this->userModel->setPassword($password);
                $this->userModel->setRole("pending_teacher");

                if($this->userModel->findUserbyEmail($email)){
                    $this->setFlash("error", "Email is already registered.");
                    $this->redirect("../Public");
                }

                $this->userModel->createUser();
                $this->setFlash("success", "Registration successful!");
                $this->redirect("../Public");
            } else {
                $csrfToken = $this->security->generateCsrfToken();
                $this->showView("../Public", ["csrf_token" => $csrfToken]);
            }
        }

        public function login() {
            if($_SERVER["REQUEST_METHOD"] === "POST"){
                $this->csrfMiddleware->handle($_POST);

                $email = $_POST["email"] ?? "";
                $password = $_POST["password"] ?? "";

                $user = $this->userModel->findUserByEmail($email);

                if($user && $this->userModel->verifyPassword($password, $user["password"])){
                    $_SESSION["id"] = $user["id"];
                    $_SESSION["name"] = $user["name"];
                    $_SESSION["role"] = $user["role"];
                    $_SESSION["is_active"] = $user["is_active"];

                    $this->redirect("../Public");
                } else {
                    $this->setFlash("error", "Invalid email or password");
                    $this->redirect("../Public");
                }
            } else {
                $csrfToken = $this->security->generateCsrfToken();
                $this->showView("../Public", ["csrf_token" => $csrfToken]);
            }
        }

        public function logout(){
            session_start();
            session_unset();
            session_destroy();
            $this->redirect("../Public");
        }
    }