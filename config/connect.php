<?php
  $connect=new mysqli("localhost", "root", "", "city_management", "3306");
  if ($connect->errno){
    die("Could not connect to the database!");
  }
  $connect->set_charset("utf8");
?>
