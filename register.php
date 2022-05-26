<?php session_start(); ?>
<html>
<head>
	<title>Trang đăng kí</title>
	<meta charset="utf-8">
	<link href="style/style.css" rel="stylesheet" type="text/css">
	<link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css">
	<link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap-theme.min.css">
	<script src="//netdna.bootstrapcdn.com/bootstrap/3.1.1/js/bootstrap.min.js"></script>
	<link href="css/login.css" rel="stylesheet">
</head>

<body class="login">

<?php require_once("admin/includes/connection.php"); ?>
<?php
	if (isset($_POST["btn_submit"])) {
		//lấy thông tin từ các form bằng phương thức POST
		$username = $_POST["username"];
		$password = $_POST["pass"];
		$name = $_POST["name"];
		$email = $_POST["email"];
		//Kiểm tra điều kiện bắt buộc đối với các field không được bỏ trống
		if ($username == "" || $password == "" || $name == "" || $email == "") {
			echo '<h2 class="notice">bạn vui lòng nhập đầy đủ thông tin</h2>';
		}else{
			$sql = "INSERT INTO users(username, password, fullname, email, createdate ) VALUES ( '$username', '$password', '$name', '$email', now())";
			// thực thi câu $sql với biến conn lấy từ file connection.php
			mysqli_query($conn,$sql);
			echo '<h2 class="notice">Chúc mừng bạn đã đăng ký thành công</h2>';
		}
	}

?>
	<form action="register.php" method="post">
	
	<h1 style=" text-align:center;">Đăng kí thành viên</h1>

	<div class="form-group">
    <label for="Tài khoản">Tài khoản </label><br>
    <input type="text" class="form-control" id="username" name="username">
	</div>
	<div class="form-group">
    <label for="Mật khẩu :">Mật khẩu </label><br>
    <input type="password" class="form-control" id="pass" name="pass">
	</div>
	<div class="form-group">
    <label for="Họ và tên :">Họ và tên </label><br>
    <input type="text" class="form-control" id="name" name="name">
	</div>
	<div class="form-group">
    <label for="Email :">Email </label><br>
	<input type="text" class="form-control" id="email" name="email">
	</div>
	<div>
	<button type="submit" class="btn btn-primary" name="btn_submit">Đăng ký</button>
	</div>
	<div class="contain">
		<a href="dang-nhap.php" class="dn"> Đăng nhập</a>
    	<a href="index.php">Quay lại</a>
  	</div>
	</form>
 
</body>
</html>