<?php
  //For some reason the require/require_once/include/include_once did not work at all in this row, even though the path was correct. I had to use the require/require_once function in every function here.
  class Cities_model{
    public function getCities(){
      require_once("../config/connect.php");
      $city_data=array();
      $query="SELECT cities.id AS Id, cities.name AS City, counties.name AS County FROM cities, counties WHERE cities.county_id=counties.id AND cities.soft_deleted=0";
      $res=$connect->query($query);
      while($record=$res->fetch_assoc()){
        $city_data[]=$record;
      }
      //var_dump($city_data);
      return $city_data;
    }
    public function updateCity($city_id, $city_name, $county){
      require("../config/connect.php"); //require_once did not work here
      $query="SELECT id FROM counties WHERE name=?";
      $stmt=$connect->prepare($query); $stmt->bind_param("s", $county); $stmt->execute();
      $res=$stmt->get_result();
      $county_id=$res->fetch_assoc();
      //var_dump($county_id);
      $query_update="UPDATE cities SET name=?, county_id=? WHERE id=?";
      $stmt_update=$connect->prepare($query_update); $stmt_update->bind_param("sii", $city_name, $county_id["id"], $city_id); $stmt_update->execute();
    }
    public function createCity($city_name, $county){
      require_once("../config/connect.php");
      $query="SELECT id FROM counties WHERE name=?";
      $stmt=$connect->prepare($query); $stmt->bind_param("s", $county); $stmt->execute();
      $res=$stmt->get_result();
      $county_id=$res->fetch_assoc();
      //var_dump($county_id);
      $query_create="INSERT INTO cities (name, county_id) VALUES(?, ?)";
      $stmt_create=$connect->prepare($query_create); $stmt_create->bind_param("si", $city_name, $county_id["id"]); $stmt_create->execute();
    }
    public function deleteCity($city_id){
      require_once("../config/connect.php");
      $query="UPDATE cities SET soft_deleted=1 WHERE id=?";
      $stmt=$connect->prepare($query); $stmt->bind_param("i", $city_id); $stmt->execute();
    }
  }
?>
