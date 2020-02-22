<?php
require_once 'model/user.php';

class users {
  private $model;

  public function __construct()
  {
    $this->model = new user();
  }

  public function log(){
    require_once 'views/header.php';
    require_once 'views/users/login.php';
  }

  public function login_error(){
    require_once 'views/header.php';
    require_once 'views/users/login_error.php';
  }

  public function login(){
    $data = $_POST;
    $nickname = $data['nickname'];
    $pass = $data['password'];

    $response = $this->model->is_a_user($nickname, $pass);

    if($response){
      header('Location: users/list');
    }

    return header('Location: users/login_error');
  }
}