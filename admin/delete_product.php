<?php
	include("includes/connection.php");

	$id = $_GET['product'];

	$sql="DELETE FROM product where id='$id'";
	$conn->query($sql);

	header('location:product.php');
?>