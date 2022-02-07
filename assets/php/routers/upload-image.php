<?php
include '../includes/connect.php';
$user_id = $_SESSION['user_id'];

$msg = "";

if (isset($_POST['upload'])) {
	$image_name = $_FILES['uploadfile']['name'];
	$tempname = $_FILES["uploadfile"]["tmp_name"];
	echo $image_name."<br>";


	$p_id = $_POST['product_id'];
	$size = $_POST['size'];
	echo $size."<br>";
	echo $p_id."<br>";

	$target = "../images/".basename($image_name);

	// UPDATE `items` SET `product_img` = $image WHERE `items`.`id` = $p_id;

	$sql = "UPDATE `items` SET `product_img` = $image_name WHERE `items`.`id` = $p_id";
	mysqli_query($con, $sql) or die("Query Cannot be processed.");

	if (move_uploaded_file($tempname, $target)) {
		$msg = "Image uploaded successfully";
	  echo $msg;
	}
	else{
		$msg = "Failed to upload image";
	  echo $msg;
	}
}

$result = mysqli_query($con, "SELECT * FROM images");

print_r($result);
echo "<br>On Different page.";

//header("location: ../admin-page.php");
?>
