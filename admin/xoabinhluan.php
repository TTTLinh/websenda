<?php
$sql = "DELETE FROM tbl_comment WHERE comment_id=".$_GET['comment_id'];
$ketqua = mysqli_query($conn, $sql);
?>
<html> 
<head>
<title>Xóa bình luận</title> 
</head> 
<body>
<h1>Đã xóa</h1> 
<a href="quanlibinhluan.php">Quay lại trang quản lí</a>

</body> 
</html>
