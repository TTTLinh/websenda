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
    <title>Quản lí hóa đơn</title>
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
                    <td><a href="" class="white-text templatemo-sort-by">Tên người bình luận <span class="caret"></span></a></td>
                    <td><a href="" class="white-text templatemo-sort-by">Thời gian <span class="caret"></span></a></td>
                    <td><a href="" class="white-text templatemo-sort-by">Mã sản phẩm <span class="caret"></span></a></td>
                    <td><a href="" class="white-text templatemo-sort-by">Nội dung <span class="caret"></span></a></td>
                    <td>Lựa chọn</td>
                   
                  </tr>
                </thead>
                <tbody>
                <?php
      require_once("includes/connection.php");
    ?>
          <?php
            $stt = 1 ;
            $sql = "SELECT * FROM tbl_comment ";
            
            $query = mysqli_query($conn,$sql);
            while ($data = mysqli_fetch_array($query)) {
          ?>
            <tr>
              <td><?php echo $data["comment_sender_name"]; ?></td>
              <td><?php echo $data["date"]; ?></td>
              <td><?php echo $data["id"]; ?></td>
              <td><?php echo $data["comment"]; ?></td>
              	
              <td>
				<a href="xoabinhluan.php?comment_id=<?php echo $data["comment_id"];?>">Xóa</a>
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