<?php
$sql = "DELETE FROM orders WHERE id=".$_GET['id'];
$ketqua = mysqli_query($conn, $sql);
?>
<html> 
<head>
<title>Xóa đơn hàng</title> 
</head> 
<body>
<h1>Đã xóa</h1> 
<a href="quanlidonhang.php">Quay lại trang quản lí</a>

</body> 
</html>
