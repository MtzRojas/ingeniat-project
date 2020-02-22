<?php
require_once 'database.php';

class role {

  public function __construct()
  {
    $this->db = new Database();
  }
}