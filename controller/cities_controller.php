<?php
  require("../model/cities_model.php");
  class Cities_controller{
    public function getCities(){
      $cities_obj=new Cities_model();
      return $cities_obj->getCities();
    }
    public function updateCity($city_id, $city_name, $county){
      $cities_obj=new Cities_model();
      $cities_obj->updateCity($city_id, $city_name, $county);
    }
    public function createCity($city_name, $county){
      $cities_obj=new Cities_model();
      $cities_obj->createCity($city_name, $county);
    }
    public function deleteCity($city_id){
      $cities_obj=new Cities_model();
      $cities_obj->deleteCity($city_id);
    }
  }
?>
