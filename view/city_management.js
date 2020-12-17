$(document).ready(function(){
  //get cities:
  $("#getcities").click(function(){
    $.get("view/getcities.php", function(response){
      $("#content").html(response);
      $("#content").addClass("cities-table");
    });
  });

  //modify/delete cities:
  $("#modifycities").click(function(){
    $.get("view/modifycities.php", function(response){
      $("#content").html(response);
      $("#content").addClass("modifycities-table");
    });
  });
  $(document).on("click", "#modifybutton", function(){
    var id=$(this).attr("data-id");
    //console.log("modify id: "+id);
    var city=$("#cityname_data"+id).text().trim();
    var county=$("#countyname_data"+id).text().trim();
    //console.log("city: "+city+"; county: "+county);
    $.ajax({
      url: "view/modifycities.php",
      method: "post",
      data: {modify_id: id, modify_city: city, modify_county: county},
      //dataType: "text",
      success: function(){
        alert("City updated succesfully.");
      }
    });
  });
  $(document).on("click", "#deletebutton", function(){
    var id=$(this).attr("data-id");
    //console.log("delete id: "+id)
    $.ajax({
      url: "view/deletecity.php",
      method: "post",
      data: {delete_id: id},
      success: function(){
        alert("City deleted succesfully.");
      }
    })
  });

  //add city:
  $("#addnewcity").click(function(){
    $.get("view/insertcity.html", function(response){
      $("#content").html(response);
      $("#content").addClass("addcity-form");
    });
  });
  $(document).on("submit", "#addcity", function(e){
    e.preventDefault();
    var city_name=$("#cityname").val().trim();
    var county_name=$("#countyname").val().trim();
    if (city_name!='' && county_name!=''){
      $.ajax({
        url: "view/insertcity.php",
        method: "post",
        data: {city: city_name, county: county_name},
        dataType: "text",
        success: function(){
          alert("Succesfully added the new city to the database.");
        }
      });
    }
  });
});
