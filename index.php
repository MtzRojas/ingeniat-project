<?php
require_once 'model/database.php';

$controller = 'users';

if(!isset($_REQUEST['c']))
{
  require_once "controller/$controller.php";
  $controller = ucwords($controller);
  $controller = new $controller;
  $controller->log();
} else {
  $controller = strtolower($_REQUEST['c']);
  $action = isset($_REQUEST['a']) ? $_REQUEST['a'] : 'Index';

  require_once "controller/$controller.php";
  $controller = ucwords($controller);
  $controller = new $controller;

  call_user_func(array($controller, $action));
}