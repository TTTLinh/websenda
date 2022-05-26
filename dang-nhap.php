<?php
session_start();
?>
<html>
<head>
	<title>Trang đăng nhập</title>
	<meta charset="utf-8">
	<link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css">
	<link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap-theme.min.css">
	<script src="//netdna.bootstrapcdn.com/bootstrap/3.1.1/js/bootstrap.min.js"></script>
	<link href="css/login.css" rel="stylesheet">
</head>

<body class="login">
	<?php 
require_once("admin/includes/connection.php");
	// Kiểm tra nếu người dùng đã ân nút đăng nhập thì mới xử lý
if (isset($_POST["btn_submit"])) {
	// lấy thông tin người dùng
	$username = $_POST["username"];
	$password = $_POST["password"];
	//làm sạch thông tin, xóa bỏ các tag html, ký tự đặc biệt 
	//mà người dùng cố tình thêm vào để tấn công theo phương thức sql injection
	$username = strip_tags($username);
	$username = addslashes($username);
	$password = strip_tags($password);
	$password = addslashes($password);
	if ($username == "" || $password =="") {
		echo "username hoặc password bạn không được để trống!";
	}
	else{
		$sql = "SELECT * from users where username = '$username' and password = '$password' ";
		$query = mysqli_query($conn,$sql);
		$num_rows = mysqli_num_rows($query);
		if ($num_rows==0) {
			echo "tên đăng nhập hoặc mật khẩu không đúng !";
		}else{
			// Lấy ra thông tin người dùng và lưu vào session
			while ( $data = mysqli_fetch_array($query) ) {
	    		$_SESSION["user_id"] = $data["id"];
				$_SESSION['username'] = $data["username"];
				$_SESSION["email"] = $data["email"];
				$_SESSION["fullname"] = $data["fullname"];
				$_SESSION["is_block"] = $data["is_block"];
				$_SESSION["permision"] = $data["permision"];
	    	}
                // Thực thi hành động sau khi lưu thông tin vào session
				// ở đây mình tiến hành chuyển hướng trang web tới một trang gọi là index.php
				$_SESSION["logged"] = true;
					header('Location: indexadmin.php');
		}
	}
}
?>
	<form method="POST" action="dang-nhap.php">

	<h1 style=" text-align:center;">Đăng nhập</h1>
	<div class="form-group">
    <label for="Tài khoản">Tài khoản </label><br>
    <input type="text" class="form-control"  name="username">
	</div>
	<div class="form-group">
    <label for="Mật khẩu :">Mật khẩu </label><br>
    <input type="password" class="form-control"  name="password">
	</div>
	<div>
	<button type="submit" class="btn btn-primary" name="btn_submit">Đăng nhập</button>
	</div>
	<div class="contain">
    	<a href="index.php">Quay lại</a>
  	</div>
  </form>
 
</body>

</html>