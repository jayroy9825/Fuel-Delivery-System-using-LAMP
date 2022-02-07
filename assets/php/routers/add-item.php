<?php
include '../includes/connect.php';

$name = $_POST['name'];
$price = $_POST['price'];

if (isset($_POST['action'])) {
  $image_name = $_FILES['uploadfile']['name'];
  $tempname = $_FILES['uploadfile']['tmp_name'];
  #echo $image_name."<br>";

  if(isset($image_name) and !empty($image_name)){

    $target = "../images/".basename($image_name);

    if (move_uploaded_file($tempname, $target)) {
      $msg = "Image uploaded successfully";
      echo $msg;
    }
    else{
      $msg = "Failed to upload image";
      echo $msg;
    }

    echo $price."<br>";
    echo $name."<br>";
    echo $image_name."<br>";

    $sql = "INSERT INTO items (name, price, product_img) VALUES ('$name', '$price', '$image_name')";
    $con->query($sql) or die("Query Cannot be performed");
  }
  else{
    echo "<br>Image Not Found.";
  }

}

header("location: ../admin-page.php");
?>
