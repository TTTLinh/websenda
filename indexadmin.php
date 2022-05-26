<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">  
    <title>ADMIN</title>
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300,400italic,700' rel='stylesheet' type='text/css'>
    <link href="admin/css/font-awesome.min.css" rel="stylesheet">
    <link href="admin/css/bootstrap.min.css" rel="stylesheet">
    <link href="admin/css/templatemo-style.css" rel="stylesheet">
  
  </head>
  <body>  

    <div class="templatemo-flex-row">
      <div class="templatemo-sidebar">
        
        <form class="templatemo-search-form" role="search">
          <div class="input-group">
              <button type="submit" class="fa fa-search"></button>
              <input type="text" class="form-control" placeholder="Search" name="srch-term" id="srch-term">           
          </div>
        </form>
        <div class="mobile-menu-icon">
            <i class="fa fa-bars"></i>
        </div>
        <nav class="templatemo-left-nav">          
          <ul>
            <li><a href="indexadmin.php" class="active"><i class="fa fa-home fa-fw"></i>Trang chủ</a></li>
            <li><a href="admin/manage-users.php"><i class="fa fa-users fa-fw"></i>Quản lí tài khoản</a></li>
            <li><a href="admin/product.php"><i class="fa fa-sliders fa-fw"></i>Quản lí sản phẩm</a></li>
            <li><a href="admin/category.php"><i class="fa fa-sliders fa-fw"></i>Quản lí danh mục</a></li>
            <li><a href="admin/quanlidonhang.php"><i class="fa fa-users fa-fw"></i>Quản lí đơn hàng</a></li>
            <li><a href="admin/quanlihoadon.php"><i class="fa fa-sliders fa-fw"></i>Quản lí hóa đơn</a></li>
            <li><a href="admin/quanlibinhluan.php"><i class="fa fa-sliders fa-fw"></i>Quản lí bình luận</a></li>
            <li><a href="logout.php"><i class="fa fa-eject fa-fw"></i>Đăng xuất</a></li>
          </ul>  
        </nav>
      </div>
 
      <div class="templatemo-content col-1 light-gray-bg">
        <div class="templatemo-top-nav-container">
          <div class="row">
            <nav class="templatemo-top-nav col-lg-12 col-md-12">
              <ul class="text-uppercase">
                <li><a href="" class="active">Admin panel</a></li>
              
              </ul>  
            </nav> 
          </div>
        </div>
        <div class="templatemo-content-container">
          <div class="templatemo-flex-row flex-content-row">
            
            <div class="templatemo-content-widget white-bg col-1 text-center">
              <i class="fa fa-times"></i>
              <h2 class="text-uppercase">Maris</h2>
              <h3 class="text-uppercase margin-bottom-10">Design Project</h3>
              <img src="admin/images/bicycle.jpg" alt="Bicycle" class="img-circle img-thumbnail">
            </div>
            <div class="templatemo-content-widget white-bg col-1">
              <i class="fa fa-times"></i>
              <h2 class="text-uppercase">Dictum</h2>
              <h3 class="text-uppercase">Sedvel Erat Non</h3><hr>
              <div class="progress">
                <div class="progress-bar progress-bar-info" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 60%;"></div>
              </div>
              <div class="progress">
                <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 50%;"></div>
              </div>
              <div class="progress">
                <div class="progress-bar progress-bar-warning" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 60%;"></div>
              </div>                          
            </div>
          </div>
            
        </div>
      </div>
    </div>
    

    <script src="js/jquery-1.11.2.min.js"></script>      
    <script src="js/jquery-migrate-1.2.1.min.js"></script> 
    <script src="https://www.google.com/jsapi"></script> 
    <script>
     
      google.load('visualization', '1.0', {'packages':['corechart']});

      // Set a callback to run when the Google Visualization API is loaded.
      google.setOnLoadCallback(drawChart); 
      
      // Callback that creates and populates a data table,
      // instantiates the pie chart, passes in the data and
      // draws it.
      function drawChart() {

          // Create the data table.
          var data = new google.visualization.DataTable();
          data.addColumn('string', 'Topping');
          data.addColumn('number', 'Slices');
          data.addRows([
            ['Mushrooms', 3],
            ['Onions', 1],
            ['Olives', 1],
            ['Zucchini', 1],
            ['Pepperoni', 2]
          ]);

       
          var options = {'title':'How Much Pizza I Ate Last Night'};

          
          var pieChart = new google.visualization.PieChart(document.getElementById('pie_chart_div'));
          pieChart.draw(data, options);

          var barChart = new google.visualization.BarChart(document.getElementById('bar_chart_div'));
          barChart.draw(data, options);
      }

      $(document).ready(function(){
        if($.browser.mozilla) {
        
          $(window).bind('resize', function(e)
          {
            if (window.RT) clearTimeout(window.RT);
            window.RT = setTimeout(function()
            {
              this.location.reload(false); 
            }, 200);
          });      
        } else {
          $(window).resize(function(){
            drawChart();
          });  
        }   
      });
      
    </script>
    <script type="text/javascript" src="js/templatemo-script.js"></script>    

  </body>
</html>