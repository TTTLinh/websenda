<?php
	include("includes/connection.php");

	$id = $_GET['category'];

	$sql="DELETE from category where categoryid='$id'";
	$conn->query($sql);

	header('location:category.php');
?>