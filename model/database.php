<?php
class Database {

  public function __construct()
  {
    $this->host      = 'localhost';
    $this->unsername = 'ingeniat';
    $this->password  = 'ingeniat';
    $this->database  = 'ingeniat';

    $this->mysqli = new mysqli($this->host, $this->unsername, $this->password) OR die("exist a problem with the database :D!");

    if(mysqli_connect_errno()){
      printf("connect failed", mysqli_connect_error());
      exit();
    }

    $this->mysqli->select_db($this->database);

    if(mysqli_connect_errno()){
      printf("connect failed", mysqli_connect_error());
      exit();
    }

    return true;
  } 

  public function query($query){
    $return = array();

    if(!$result = $this->mysqli->query($query)){
      $return['success'] = false;
      $return['error'] = $this->mysqli->error;

      return $return;
    }

    $return['succes'] = true;
    $return['affected_rows'] = $this->mysqli->affected_rows;
    $return['insert_id'] = $this->mysqli->insert_id;

    if(0 == $this->mysqli->insert_id)
    {
      if (!is_object($result)){
        return false;
      }

      $return['count'] = $result->num_rows;
      $return['rows'] = array();

      while($row = $result->fetch_assoc()){
        $return['rows'][] = $row;
      }

      $result->close();
    }
    return $return;
  }

  public function __destruct()
  {
    $this->mysqli->close() OR die("database disconected");
  }
}