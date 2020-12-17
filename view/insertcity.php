<?php
  require("../controller/cities_controller.php");
  include("../view/top.html");
  $county=$_POST["county"]; $city_name=$_POST["city"];
  $cities_cont_obj=new Cities_controller();
  $cities_cont_obj->createCity($city_name, $county);
?>
