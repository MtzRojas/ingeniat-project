<?php
require_once 'database.php';

class user {
  private $db;

  public function __construct()
  {
    $this->db = new Database();
  }

  public function is_a_user($nickname, $password)
  {
    $user_log = $this->db->query("SELECT * FROM users WHERE nickname = '".$nickname."' AND password = '".$password."' LIMIT 1 ");
    $user_log['count'] == 1;
  }
}