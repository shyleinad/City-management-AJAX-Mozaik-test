<?php
  require("../controller/cities_controller.php");
  $cities_cont_obj=new Cities_controller();
  echo "<table><tr><th>Id</th><th>City</th><th>County</th></tr>";
  foreach($cities_cont_obj->getCities() as $item){
    echo "<tr>
          <td>".$item["Id"]."</td>
          <td contenteditable id='cityname_data".$item["Id"]."'>".$item["City"]."</td>
          <td contenteditable id='countyname_data".$item["Id"]."'>".$item["County"]."</td>
          <td><button type='button' class='btn btn-warning' id='modifybutton' data-id='".$item["Id"]."'>Modify</button></td>
          <td><button type='button' class='btn btn-danger' id='deletebutton' data-id='".$item["Id"]."'>Delete</button></td>
          </tr>";
  }
  echo "</table>";

  if (isset($_POST["modify_city"]) && isset($_POST["modify_county"]) && isset($_POST["modify_id"])){
    $city=$_POST["modify_city"]; $county=$_POST["modify_county"]; $city_id=$_POST["modify_id"];
    //var_dump($city); var_dump($county); var_dump($city_id);
    $cities_cont_obj->updateCity($city_id, $city, $county);
    //unset($_POST["modify_city"]); unset($_POST["modify_county"]); unset($_POST["modify_city"]);
  }
?>
