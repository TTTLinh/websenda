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
    <title>Quản lí đơn hàng</title>
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
        <div class="templatemo-content-container">
          <div class="templatemo-content-widget no-padding">
            <div class="panel panel-default table-responsive">
              <table class="table table-striped table-bordered templatemo-user-table">
                <thead style="background-color: black;">
                  <tr>
                    <td><a href="" class="white-text templatemo-sort-by">STT <span class="caret"></span></a></td>
                    <td><a href="" class="white-text templatemo-sort-by">Tên người đặt <span class="caret"></span></a></td>
                    <td><a href="" class="white-text templatemo-sort-by">Số điện thoại <span class="caret"></span></a></td>
                    <td><a href="" class="white-text templatemo-sort-by">Địa chỉ <span class="caret"></span></a></td>
                    <td><a href="" class="white-text templatemo-sort-by">Cách thức thanh toán <span class="caret"></span></a></td>
                    <td>Xác nhận</td>
                    <td>Thao tác</td>
                   
                  </tr>
                </thead>
                <tbody>
                <?php
      require_once("includes/connection.php");
    ?>
          <?php
            $stt = 1 ;
            $sql = "SELECT * FROM orders";
            
            $query = mysqli_query($conn,$sql);
            while ($data = mysqli_fetch_array($query)) {
          ?>
            <tr>
              <th scope="row"><?php echo $stt++ ?></th>
              <td><?php echo $data["name"]; ?></td>
              <td><?php echo $data["phone"]; ?></td>
              <td><?php echo $data["address"]; ?></td>
              <td><?php echo $data["pmode"]; ?></td>
              <td><?php echo ($data['xacnhan'] == 1) ? "Đã xác nhận" : "Chưa xác nhận"; ?></td>
			
              <td>
				<a href="chinhsuadonhang.php?id=<?php echo $data["id"];?>">Sửa</a>
				<a href="xoadonhang.php?id=<?php echo $data["id"];?>">Xóa</a>
			</td>
            </tr>
          <?php
            }
          ?>
          </tbody>
              </table>    
            </div>                          
          </div>          
                           
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