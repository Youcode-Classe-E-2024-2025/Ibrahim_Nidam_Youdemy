<body class="bg-background font-sans">

<!-- Navbar -->
<nav class="bg-card shadow-sm w-full z-50">
    <div class="container mx-auto px-4 py-3 flex items-center justify-between">
        <div class="text-2xl font-bold text-primary">Youdemy</div>
        <div class="hidden md:flex space-x-6">
            <input type="hidden" name="">
            <?php if(getCurrentPage() === "Public"): ?>
                <a href="<?= BASE_URL ?>coursesPage" class="text-foreground hover:text-primary">Courses</a>
            <?php elseif(in_array(getCurrentPage(), ["AdminDash", "TeacherDash", "StudentProfile"])): ?>
                <a href="<?= BASE_URL ?>" class="text-foreground hover:text-primary">Home</a>
                <a href="<?= BASE_URL ?>coursesPage" class="text-foreground hover:text-primary">Courses</a>
            <?php else: ?>
                <a href="<?= BASE_URL ?>" class="text-foreground hover:text-primary">Home</a>
            <?php endif; ?>
            <a href="<?= BASE_URL ?>users/AdminDash" class="text-foreground hover:text-primary">Categories</a>
            <?php if(isset($_SESSION["user_id"])): ?>
                <a href="<?= BASE_URL ?>users/<?= $_SESSION["user_role"] == "admin" ? "AdminDash" : ($_SESSION["user_role"] == "teacher" ? "TeacherDash" : "StudentProfile") ?>" class="text-foreground hover:text-primary">Dashboard</a>
            <?php endif; ?>
        </div>
        <?php if(!isset($_SESSION)): ?>
            <?php require_once __DIR__ . '/login_signup_forms.php'; ?>
        <?php else: ?>
            <div class="flex items-center space-x-4">
                <a href="<?= BASE_URL ?>logout.php" class="px-4 py-2 text-primary-foreground bg-primary rounded hover:bg-opacity-90">Logout</a>
            </div>
        <?php endif; ?>
    </div>
</nav>
