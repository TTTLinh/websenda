<?php session_start(); ?>
<?php include('header.php'); ?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <title>SENDA</title>
  </head>
  <body>
  <?php include("navbar.php"); ?>

    <section class="hero-wrap hero-wrap-2" style="background-image: url('images/bg_3.jpg');" data-stellar-background-ratio="0.5">
      <div class="overlay"></div>
      <div class="container">
        <div class="row no-gutters slider-text align-items-end justify-content-center">
          <div class="col-md-9 ftco-animate text-center mb-4">
            <h1  style="color:white;">Bài viết</h1>
            <p class="breadcrumbs"><span class="mr-2"><a href="index.html">Trang chủ <i class="ion-ios-arrow-forward"></i></a></span> <span class="mr-2"><a href="blog.html">Bài viết<i class="ion-ios-arrow-forward"></i></a></span> <span>Nội dung<i class="ion-ios-arrow-forward"></i></span></p>
          </div>
        </div>
      </div>
    </section>
		
		<section class="ftco-section">
			<div class="container">
				<div class="row">
          <div class="col-lg-8 ftco-animate">


          <?php
    $id = $_GET['id'];
    $ketnoi = mysqli_connect("localhost", "root", "", "test");
    $sql = "SELECT * FROM product WHERE id = $id";
    $ketqua = mysqli_query($ketnoi, $sql);
    $obj = mysqli_fetch_assoc($ketqua);
        echo '<div class="product">';
        echo '<h1>Chi tiết món ăn</h1>';
        echo '<img src="'.$obj['product_image'].'" height="300px" width="400px">';
        echo '<p><a>ID sản phẩm: '.$obj['id'].'<br></a>';
        echo '<p><a>Tên sản phẩm: '.$obj['product_name'].'<br></a>';
        echo '<p><a> Mô tả: '.$obj['product_review'].'<br></a>';
        echo '<p><a> Số lượng: '.$obj['product_amount'].'<br></a>';
        echo '<br>';
        echo "<a>Giá: ".number_format($obj['product_price'])." VNĐ</a>";
        echo '<br>';
        echo '<hr>';
        echo '</div>';
?>
            
            <div class="pt-5 mt-5">
              <h3 class="mb-5 h4 font-weight-bold p-4 bg-light">Bình luận</h3>
              <ul class="comment-list">
                <div class="container">
                  <form method="POST" id="comment_form">
                    <div class="form-group">
                      <input type="text" name="comment_name" id="comment_name" class="form-control" placeholder="Nhập tên" />
                    </div>
                    <div class="form-group">
                      <textarea name="comment_content" id="comment_content" class="form-control" placeholder="Nhập bình luận" rows="5"></textarea>
                    </div>
                    <div class="form-group">
                      <input type="text" name="id" id="id" class="form-control" placeholder="Nhập tên món" />
                    </div>
                    <div class="form-group">
                      <input type="hidden" name="comment_id" id="comment_id" value="0" />
                      <input type="submit" name="submit" id="submit" class="btn btn-info" value="Submit" />
                    </div>
                  </form>
                  <span id="comment_message"></span>
                  <br />
                  <div id="display_comment"></div>
               </div>
                  </ul>
                </li>
              </ul>

            </div>
          </div> <!-- .col-md-8 -->

          <div class="col-lg-4 sidebar ftco-animate">
            <div class="sidebar-box">
              <form action="#" class="search-form">
                <div class="form-group">
                  <span class="icon icon-search"></span>
                  <input type="text" class="form-control" placeholder="Type a keyword and hit enter">
                </div>
              </form>
            </div>
            <div class="sidebar-box ftco-animate">
            	<h3>Category</h3>
              <ul class="categories">
                <li><a href="#">Sen đá <span>(6)</span></a></li>
                <li><a href="#">Xương rồng <span>(8)</span></a></li>
              </ul>
            </div>

            <div class="sidebar-box ftco-animate">
              <h3>Popular Articles</h3>
              <div class="block-21 mb-4 d-flex">
                <a class="blog-img mr-4" style="background-image: url(images/image_1.jpg);"></a>
                <div class="text">
                  <h3 class="heading"><a href="#">Even the all-powerful Pointing has no control about the blind texts</a></h3>
                  <div class="meta">
                    <div><a href="#"><span class="icon-calendar"></span> June 25, 2019</a></div>
                    <div><a href="#"><span class="icon-person"></span> Dave Lewis</a></div>
                    <div><a href="#"><span class="icon-chat"></span> 19</a></div>
                  </div>
                </div>
              </div>
              <div class="block-21 mb-4 d-flex">
                <a class="blog-img mr-4" style="background-image: url(images/image_2.jpg);"></a>
                <div class="text">
                  <h3 class="heading"><a href="#">Even the all-powerful Pointing has no control about the blind texts</a></h3>
                  <div class="meta">
                    <div><a href="#"><span class="icon-calendar"></span> June 25, 2019</a></div>
                    <div><a href="#"><span class="icon-person"></span> Dave Lewis</a></div>
                    <div><a href="#"><span class="icon-chat"></span> 19</a></div>
                  </div>
                </div>
              </div>
              <div class="block-21 mb-4 d-flex">
                <a class="blog-img mr-4" style="background-image: url(images/image_3.jpg);"></a>
                <div class="text">
                  <h3 class="heading"><a href="#">Even the all-powerful Pointing has no control about the blind texts</a></h3>
                  <div class="meta">
                    <div><a href="#"><span class="icon-calendar"></span> June 25, 2019</a></div>
                    <div><a href="#"><span class="icon-person"></span> Dave Lewis</a></div>
                    <div><a href="#"><span class="icon-chat"></span> 19</a></div>
                  </div>
                </div>
              </div>
            </div>

            <div class="sidebar-box ftco-animate">
              <h3>Paragraph</h3>
              <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ducimus itaque, autem necessitatibus voluptate quod mollitia delectus aut, sunt placeat nam vero culpa sapiente consectetur similique, inventore eos fugit cupiditate numquam!</p>
            </div>
          </div><!-- END COL -->
        </div>
			</div>
		</section>
		
    <?php include("footer.php"); ?>
  <!-- loader -->
  <div id="ftco-loader" class="show fullscreen"><svg class="circular" width="48px" height="48px"><circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee"/><circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#F96D00"/></svg></div>
  <script src="js/jquery.min.js"></script>
  <script src="js/jquery-migrate-3.0.1.min.js"></script>
  <script src="js/popper.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/jquery.easing.1.3.js"></script>
  <script src="js/jquery.waypoints.min.js"></script>
  <script src="js/jquery.stellar.min.js"></script>
  <script src="js/owl.carousel.min.js"></script>
  <script src="js/jquery.magnific-popup.min.js"></script>
  <script src="js/aos.js"></script>
  <script src="js/jquery.animateNumber.min.js"></script>
  <script src="js/bootstrap-datepicker.js"></script>
  <script src="js/jquery.timepicker.min.js"></script>
  <script src="js/scrollax.min.js"></script>
  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBVWaKrjvy3MaE7SQ74_uJiULgl1JY0H2s&sensor=false"></script>
  <script src="js/google-map.js"></script>
  <script src="js/main.js"></script>
    
  </body>
</html>
<script>
$(document).ready(function(){
 
 $('#comment_form').on('submit', function(event){
  event.preventDefault();
  var form_data = $(this).serialize();
  $.ajax({
   url:"add_comment.php",
   method:"POST",
   data:form_data,
   dataType:"JSON",
   success:function(data)
   {
    if(data.error != '')
    {
     $('#comment_form')[0].reset();
     $('#comment_message').html(data.error);
     $('#id').val('0');
     $('#comment_id').val('0');
     load_comment();
    }
   }
  })
 });

 load_comment();

 function load_comment()
 {
  $.ajax({
   url:"fetch_comment.php?id=<?= $obj['id']?>",
   method:"POST",
   success:function(data)             
   {
    $('#display_comment').html(data);
   }
  })
 }

 $(document).on('click', '.reply', function(){
  var comment_id = $(this).attr("id");
  $('#comment_id').val(comment_id);
  $('#comment_name').focus();
 });
 
});
</script>