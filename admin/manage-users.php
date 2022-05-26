<?php include("includes/connection.php"); ?>
<?php include("../header.php") ?>
<?php session_start();?>
<?php include("includes/permission.php");?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">  
    <title>Quản lí tài khoản</title>
    <meta name="description" content="">
    <meta name="author" content="templatemo">
   
  </head>
  <body>  
    
    <div class="templatemo-flex-row">
    <?php include('menu.php'); ?>
      <div class="templatemo-content col-1 light-gray-bg" style="height: 850px;">
        <div class="templatemo-top-nav-container">
          <div class="row">
            <nav class="templatemo-top-nav col-lg-12 col-md-12">
              <ul class="text-uppercase">
              <li><a href="" class="active">Admin</a></li>
              
              </ul>  
            </nav> 
          </div>
        </div>
        <div class="templatemo-content-container" >
          <div class="templatemo-content-widget no-padding" >
            <div class="panel panel-default table-responsive" style="padding: 20px;">
            <?php
	$sql = "SELECT * FROM users";
	$query = mysqli_query($conn,$sql);
?>
<?php
	if (isset($_GET["id_delete"])) {
		$sql = "DELETE FROM users WHERE id = ".$_GET["id_delete"];
		mysqli_query($conn,$sql);
	}
	
?>
<a href="them-thanh-vien.php">Thêm thành viên</a><hr>
              <table class="table table-striped table-bordered templatemo-user-table">
                <thead style="background-color: black;">
                  <tr>
                    
                    <td><a href="" class="white-text templatemo-sort-by">Tên đăng nhập <span class="caret"></span></a></td>
                    <td><a href="" class="white-text templatemo-sort-by">Email <span class="caret"></span></a></td>
                    <td><a href="" class="white-text templatemo-sort-by">Khóa tài khoản <span class="caret"></span></a></td>
                    <td><a href="" class="white-text templatemo-sort-by">Quyền <span class="caret"></span></a></td>
                    <td>Thao tác</td>
                  </tr>
                </thead>
                <tbody>
                <?php 
		while ( $data = mysqli_fetch_array($query) ) {
			$i = 1;
			$id = $data['id'];
	?>
		<tr>
			
			<td><?php echo $data['username']; ?></td>
			<td><?php echo $data['email']; ?></td>
			<td><?php echo ($data['is_block'] == 1) ? "Bị khóa" : "Không bị khóa"; ?></td>
			<td><?php echo ($data['permision'] == 0) ? "Thành viên thường" : "Admin"; ?></td>
			<td>
				<a href="chinh-sua-thanh-vien.php?id=<?php echo $id;?>">Sửa</a>
				<a href="quan-ly-thanh-vien.php?id_delete=<?php echo $id;?>">Xóa</a>
			</td>
		</tr>
	<?php 
			$i++;
		}
	?>
          </tbody>
              </table>    
            </div>                          
          </div>          
                           
          </div> 

          <div class="pagination-wrap">
            <ul class="pagination">
              <li><a href="#">1</a></li>
              <li><a href="#">2</a></li>
              <li class="active"><a href="#">3 <span class="sr-only">(current)</span></a></li>
              <li><a href="#">4</a></li>
              <li><a href="#">5</a></li>
              <li>
                <a href="#" aria-label="Next">
                  <span aria-hidden="true"><i class="fa fa-play"></i></span>
                </a>
              </li>
            </ul>
          </div>          
                  
        </div>
      </div>
    </div>
    
    
    <script type="text/javascript" src="js/jquery-1.11.2.min.js"></script>      
    <script type="text/javascript" src="js/templatemo-script.js"></script>      
    <script>
      $(document).ready(function(){
      
        var imageUrl = $('img.content-bg-img').attr('src');
        $('.templatemo-content-img-bg').css('background-image', 'url(' + imageUrl + ')');
        $('img.content-bg-img').hide();        
      });
    </script>

  </body>
</html>