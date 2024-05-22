<?php 

session_start();
include("./config/crud.php");
$crud = new Crud("localhost", "root", "", "agrocare");


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css"/>

    
</head>
<body>
  <?php

  if(isset($_POST["heading"])){
    $image1 = $_FILES["image1"];
    $image2 = $_FILES['image2'];
    $image_upload1 = $crud->upload_file("image1", "./images/");
    // echo $image_upload1;
    $image_upload2 = $crud->upload_file("image2", "./images/");
    $heading = $_POST["heading"];
    $description = $_POST["description"];
    // echo $image_upload1;
    $sql = "insert into service_upload(heading, description, image1, image2) values('$heading', '$description', '$image_upload1', '$image_upload2')";
    $result = $crud->conn->query($sql);

    // $insert = $crud->insert_data("service_upload", [`heading` => $heading, `description` => $description, `image1` => $image_upload1, `image2` => $image_upload2]);
    if($result){
      ?>
      <div class="w3-panel w3-padding w3-auto w3-green w3-round-large">
        service registered successfully
      </div>
      <?php
    }else{
      ?>
      <div class="w3-panel w3-padding w3-auto w3-red w3-round-large">
        some error occured
      </div>
      <?php
    }

    // echo $description;

  }

  ?>
   
            <div class="w3-auto" style="width: 30rem;">

            <form action="./upload.php" method="post" enctype="multipart/form-data">
                
                
                <div class="w3-section">
                  <label class="w3-label w3-text-black" for="textfield1" required>Heading</label>
                  <input class="w3-input w3-border" type="text" name="heading" id="heading" required>
                </div>
                <div class="w3-section">
                    <label class="w3-label w3-text-black" for="textfield2" required>Description:</label>
                    <input class="w3-input w3-border" type="text" name="description" id="description">
                  </div>
                <div class="w3-section">
                    <label class="w3-label w3-text-black" for="image1" required>Image 1:</label>
                    <input class="w3-input w3-border" type="file" name="image1" id="image1">
                  </div>
                <div class="w3-section">
                  <label class="w3-label w3-text-black" for="image2" required>Image 2:</label>
                  <input class="w3-input w3-border" type="file" name="image2" id="image2">
                </div>
                
                <input class="w3-btn w3-blue" type="submit" value="Submit">
              </form>
    </div>
</body>

</html>