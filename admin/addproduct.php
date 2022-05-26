<?php
	include("includes/connection.php");

	$pname=$_POST['pname'];
	$price=$_POST['price'];
	$category=$_POST['category'];
	$review = $_POST['review'];

	$fileinfo=PATHINFO($_FILES["photo"]["name"]);

	if(empty($fileinfo['filename'])){
		$location="";
	}
	else{
	$newFilename=$fileinfo['filename'] ."_". time() . "." . $fileinfo['extension'];
	move_uploaded_file($_FILES["photo"]["tmp_name"],"upload/" . $newFilename);
	$location="upload/" . $newFilename;
	}
	
	$sql="INSERT into product (product_name, product_review, categoryid, product_price, product_image) values ('$pname', '$review', '$category', '$price', '$location')";
	$conn->query($sql);

	header('location:product.php');

?>