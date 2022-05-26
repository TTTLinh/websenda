<?php
	include("includes/connection.php");

	$id=$_GET['product'];

	$pname=$_POST['pname'];
	$category=$_POST['category'];
	$price=$_POST['price'];
	$review = $_POST['review'];

	$sql="SELECT * FROM product WHERE id='$id'";
	$query=$conn->query($sql);
	$row=$query->fetch_array();

	$fileinfo=PATHINFO($_FILES["photo"]["name"]);

	if (empty($fileinfo['filename'])){
		$location = $row['photo'];
	}
	else{
		$newFilename=$fileinfo['filename'] ."_". time() . "." . $fileinfo['extension'];
		move_uploaded_file($_FILES["photo"]["tmp_name"],"upload/" . $newFilename);
		$location="upload/" . $newFilename;
	}

	$sql="UPDATE product set product_name='$pname', product_review='$review', categoryid='$category', product_price='$price', product_image='$location' where id='$id'";
	$conn->query($sql);

	header('location:product.php');
?>