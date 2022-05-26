<?php session_start(); ?>
<?php require_once("includes/connection.php");?>
<?php include("includes/permission.php");?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">  
    <title>Quản lí đơn hàng</title>
    <meta name="description" content="">
    <meta name="author" content="templatemo">
	<link href="css/style.css" rel="stylesheet">
  </head>
  <body>  
    <div class="templatemo-flex-row">
    <?php include('menu.php'); ?>
      <div class="templatemo-content col-1 light-gray-bg" style="height: 750px;">
        <div class="templatemo-top-nav-container">
          <div class="row">
            <nav class="templatemo-top-nav col-lg-12 col-md-12">
              <ul class="text-uppercase">
              <li><a href="" class="active">Admin</a></li>
              </ul>  
            </nav> 
          </div>
        </div>
		<div class="templatemo-content-container">
          <div class="templatemo-content-widget no-padding">
            <div class="panel panel-default table-responsive">

			<?php
	if (isset($_POST["btn_submit"])) {
		//lấy thông tin từ các form bằng phương thức POST
		$name = $_POST["name"];
		$email = $_POST["email"];
		$xacnhan = 0;
		if (isset($_POST["xacnhan"])) {
			$xacnhan = $_POST["xacnhan"];
		}

		$id = $_POST["id"];
		// Viết câu lệnh cập nhật thông tin người dùng
		$sql = "UPDATE orders SET name = '$name', email = '$email', xacnhan = '$xacnhan' WHERE id=$id";
		// thực thi câu $sql với biến conn lấy từ file connection.php
		mysqli_query($conn,$sql);
		header('Location: quanlidonhang.php');
	}

	$id = -1;
	if (isset($_GET['id'])) {
		$id = $_GET['id'];
	}
	$sql = "SELECT * FROM orders WHERE id = ".$id;
	$query = mysqli_query($conn,$sql);

?>
	<?php
		while ( $data = mysqli_fetch_array($query) ) {
			$i = 1;
			$id = $data['id'];
			$xacnhan = "";
			if ($data['xacnhan'] == 1) {
				$xacnhan = "checked='checked'";
			}
	?>
	<form action="chinhsuadonhang.php" method="post">
	<table style="width:80%">
		<tbody style="width:100%">
			<tr>
				<td colspan="2">
					<h3>Chỉnh sửa tình trạng đơn hàng</h3>
					<input type="hidden" name="id" value="<?php echo $id; ?>">
				</td>
			</tr>	
			<tr>
				<td nowrap="nowrap">Họ tên :</td>
				<td><input name="name" id="name" value="<?php echo $data['name']; ?>" ></td>
			</tr>
			<tr>
				<td nowrap="nowrap">Địa chỉ email :</td>
				<td><input type="text" id="email" name="email" value="<?php echo $data['email']; ?>"></td>
			</tr>
			
			<tr>
				<td nowrap="nowrap">Xác nhận :</td>
				<td><input style="display: inline;" type="checkbox" id="xacnhan" name="xacnhan" value="1" <?php echo $xacnhan; ?> ></td>
			</tr>
			<tr>
				<td colspan="2" align="center"><input type="submit" name="btn_submit" value="Cập nhật thông tin"></td>
			</tr>
		</tbody>
		</table>
		
	</form>
	<?php } ?>
			</div>
		  </div>
		</div>
	  </div>
	</div>
  </body>
</html>


