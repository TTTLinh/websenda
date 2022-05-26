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
		$name = $_POST["fullname"];
		$email = $_POST["email"];
		$permission = $_POST["permission"];
		$is_block = 0;
		if (isset($_POST["is_block"])) {
			$is_block = $_POST["is_block"];
		}

		$id = $_POST["id"];
		// Viết câu lệnh cập nhật thông tin người dùng
		$sql = "UPDATE users SET fullname = '$name', email = '$email', permision = '$permission', is_block = '$is_block' WHERE id=$id";
		// thực thi câu $sql với biến conn lấy từ file connection.php
		mysqli_query($conn,$sql);
		header('Location: manage-users.php');
	}

	$id = -1;
	if (isset($_GET['id'])) {
		$id = $_GET['id'];
	}
	$sql = "SELECT * FROM users WHERE id = ".$id;
	$query = mysqli_query($conn,$sql);

	function make_permission_dropdown($id){
		$select_1 = "";
		$select_2 = "";
		$select_3 = "";
		if ($id == 0) {
			$select_1 = 'selected = "selected"';
		}
		if ($id == 1) {
			$select_2 = 'selected = "selected"';
		}
		if ($id == 2) {
			$select_3 = 'selected = "selected"';
		}
		$select = '<select id="permission" name="permission">
						<option value="-1"></option>
						<option value="0" '.$select_1.'>Thành viên thường</option>
						<option value="1" '.$select_2.'>Admin cấp 1</option>
						<option value="2" '.$select_3.'>Admin cấp 2</option>
					</select>';

		return $select;
	}


?>
	<?php
		while ( $data = mysqli_fetch_array($query) ) {
			$i = 1;
			$id = $data['id'];
			$is_block = "";
			if ($data['is_block'] == 1) {
				$is_block = "checked='checked'";
			}
	?>
	<form action="chinh-sua-thanh-vien.php" method="post">
		<table style="width:80%">
		<tbody style="width:100%">
			<tr>
				<td colspan="2">
					<h3>Chỉnh sửa thông tin thành viên</h3>
					<input type="hidden" name="id" value="<?php echo $id; ?>">
				</td>
			</tr>	
			<tr>
				<td nowrap="nowrap">Họ tên :</td>
				<td><input name="fullname" id="fullname" value="<?php echo $data['fullname']; ?>" ></td>
			</tr>
			<tr>
				<td nowrap="nowrap">Địa chỉ email :</td>
				<td><input type="text" id="email" name="email" value="<?php echo $data['email']; ?>"></td>
			</tr>
			<tr>
				<td nowrap="nowrap">Quyền :</td>
				<td>
					<?php echo make_permission_dropdown($data['permision']); ?>
				</td>
			</tr>
			<tr>
				<td nowrap="nowrap">Block người dùng :</td>
				<td><input style="display: inline;" type="checkbox" id="is_block" name="is_block" value="1" <?php echo $is_block; ?> ></td>
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

