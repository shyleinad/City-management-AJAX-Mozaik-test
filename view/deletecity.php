<?php
  require("../controller/cities_controller.php");
  $cities_cont_obj=new Cities_controller();
  $id=$_POST["delete_id"];
  $cities_cont_obj->deletecity($id);
?>
