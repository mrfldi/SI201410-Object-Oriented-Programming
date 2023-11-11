<?php

namespace Controllers;

use Models\UserModel;
use Views\UserView;

class UserController {
    private $model;
    private $view;

    public function __construct() {
        $this->model = new UserModel();
        $this->view = new UserView();
    }

    public function getModel() {
        return $this->model;
    }

    public function listUsers() {
        $users = $this->model->getAllUsers();
        $this->view->displayUsers($users);
    }

    public function showUser($userId) {
        $user = $this->model->getUserById($userId);
        $this->view->displayUser($user);
    }

    public function addUser($userData) {
        $this->model->addUser($userData);
        $this->listUsers();
    }

    public function updateUser($userId, $userData) {
        $this->model->updateUser($userId, $userData);
        $this->showUser($userId);
    }

    public function deleteUser($userId) {
        $this->model->deleteUser($userId);
        $this->listUsers();
    }
}
