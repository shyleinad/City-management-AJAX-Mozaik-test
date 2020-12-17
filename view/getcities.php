<?php
  require("../controller/cities_controller.php");
  $cities_cont_obj=new Cities_controller();
  echo "<table><tr><th>Id</th><th>City</th><th>County</th></tr>";
  foreach($cities_cont_obj->getCities() as $item){
    echo "<tr>
          <td>".$item["Id"]."</td>
          <td>".$item["City"]."</td>
          <td>".$item["County"]."</td>
          </tr>";
  }
  echo "</table>";
?>
