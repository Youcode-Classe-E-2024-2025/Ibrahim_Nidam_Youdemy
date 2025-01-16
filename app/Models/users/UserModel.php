<?php
namespace UsersModel;

use Core\Model;

class UserModel extends Model{
    protected $table = "users";

    private $username;
    private $email;
    private $password;
    private $role;

    public function setUsername($username){
        $this->username = $this->security->sanitizeInput($username);
    }

    public function setEmail($email){
        $this->email = $this->security->sanitizeInput($email);
    }

    public function setRole($role){
        $validRoles = ["student", "pending_teacher", "teacher", "admin"];
        if(in_array($role, $validRoles)){
            $this->role = $role;
        } else {
            throw new \InvalidArgumentException("Invalid role.");
        }
    }

    public function setPassword($password){
        if($this->security->validePassword($password)){
            $this->password = password_hash($password, PASSWORD_BCRYPT);
        } else {
            throw new \InvalidArgumentException("Password does not meet security requirements.");
        }
    }

    public function createUser(){
        return $this->create($this->table, [
            "name" => $this->username,
            "email" => $this->email,
            "password" => $this->password,
            "role" => $this->role
        ]);
    }

    public function findUserbyEmail($email){
        $users = $this->read($this->table, ["email" => $email]);
        return $users ? $users[0] : null;
    }

    public function verifyPassword($inputPass, $hashedPass){
        return password_verify($inputPass,$hashedPass);
    }
}