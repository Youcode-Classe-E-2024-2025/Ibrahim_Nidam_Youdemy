<?php
namespace UsersModel;

use Core\Model;
use InvalidArgumentException;

class UserModel extends Model
{
    protected $table = "users";
    protected $username;
    protected $email;
    protected $password;
    protected $role;
    protected $is_active;

    public function setUsername($username)
    {
        $this->username = $this->security->sanitizeInput($username);
    }

    public function setEmail($email)
    {
        $this->email = $this->security->sanitizeInput($email);
    }

    public function setRole($role)
    {
        $validRoles = ["student", "pending_teacher", "teacher", "admin"];
        if (!in_array($role, $validRoles)) {
            throw new InvalidArgumentException("Invalid role.");
        }
        $this->role = $role;
    }

    public function setPassword($password)
    {
        if ($this->security->validePassword($password)) {
            $this->password = password_hash($password, PASSWORD_BCRYPT);
        } else {
            throw new InvalidArgumentException("Password does not meet security requirements.");
        }
    }

    public function createUser()
    {
        return $this->create($this->table, [
            "name" => $this->username,
            "email" => $this->email,
            "password" => $this->password,
            "role" => $this->role
        ]);
    }

    public function findUserByEmail($email)
    {
        $users = $this->read($this->table, ["email" => $email]);
        return $users ? $users[0] : null;
    }

    public function verifyPassword($inputPass, $hashedPass)
    {
        return password_verify($inputPass, $hashedPass);
    }

    public function getAllUsers()
    {
        return $this->read($this->table);
    }

    public function suspendUser($id)
    {
        return $this->update($this->table, ['is_active' => 0], ['id' => $id]);
    }

    public function activateUser($id)
    {
        return $this->update($this->table, ['is_active' => 1], ['id' => $id]);
    }

    public function deleteUser($id)
    {
        return $this->delete($this->table, ['id' => $id]);
    }
}
