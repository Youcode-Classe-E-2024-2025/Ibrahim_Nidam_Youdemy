<?php
namespace UsersModel;

class AdminModel extends UserModel
{
    public function __construct()
    {
        parent::__construct();
        $this->role = "admin";
    }

    public function AdminCreation(){
        return $this->createUser();
    }
}
