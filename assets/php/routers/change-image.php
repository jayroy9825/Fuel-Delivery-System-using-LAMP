<?php
include '../includes/connect.php';
$user_id = $_SESSION['user_id'];

$msg = "";

if (isset($_POST['upload'])) {
$image = $_FILES['image']['name'];
$p_id = $_POST['product_id'];
$target = "images/".basename($image);

// UPDATE `items` SET `product_img` = $image WHERE `items`.`id` = $p_id;

$sql = "UPDATE `items` SET `product_img` = $image WHERE `items`.`id` = $p_id";
mysqli_query($con, $sql);

if (move_uploaded_file($_FILES['image']['tmp_name'], $target)) {
	$msg = "Image uploaded successfully";
  echo '<script>alert("$msg")</script>';
}
else{
	$msg = "Failed to upload image";
  echo '<script>alert("$msg")</script>';
}
}

$result = mysqli_query($con, "SELECT * FROM images");

echo '<pre>
print_r($result);
</pre>';


//header("location: ../admin-page.php");
?>
