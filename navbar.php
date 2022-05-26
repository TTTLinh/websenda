<?php include('header.php'); ?>
<head>
	<link href="//maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet">
</head>
	  <nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">
	    <div class="container">
	      <a class="navbar-brand" href="index.php">SENDA</a>
	      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
	        <span class="oi oi-menu"></span>
	      </button>

	      <div class="collapse navbar-collapse" id="ftco-nav">
	        <ul class="navbar-nav ml-auto">
	        	<li class="nav-item active"><a href="index.php" class="nav-link">Trang chủ</a></li>
	        	<li class="nav-item active"><a href="order.php" class="nav-link">Tất cả</a></li>
				<li class="nav-item active"><a href="register.php" class="nav-link">Đăng ký</a></li>
				<li class="nav-item active"><a href="dang-nhap.php" class="nav-link">Đăng nhập</a></li>

				<li class="dropdown">
		  			<span class="nav-link" name="category" type="button" data-toggle="dropdown" style="color:#c8a97e; font-size: 14px; padding-top: 12.8px;">Danh mục</span>
		  			<ul class="dropdown-menu">
        		<?php
					$sql = "SELECT * FROM category ";
					$conn = mysqli_connect("localhost", "root", "", "test");
            		$ketqua = mysqli_query($conn, $sql);
        			while ($row = mysqli_fetch_assoc($ketqua)) {
          
           				echo '<li class="nav-item active"> <a class="dropdown-item" href="list_category.php?categoryid= ' . $row['categoryid'] . '">' . $row['catname'] . '</li> </a>';

        			}
				?>
					  </ul>
				</li>
				
				
				<li class="nav-item active">
    				<form class="nav-link" action="searchproduct.php" method="GET">
						<input type="text" name="timkiem" placeholder="Search.. ">
						<button type="submit"><i class="fa fa-search"></i></button>
    				</form>
				</li>
				
				   
			  <li class="nav-item">
          		<a class="nav-link" href="cart.php"><i class="fa fa-shopping-cart" aria-hidden="true"></i> <span id="cart-item" class="badge badge-danger"></span></a>
        	  </li>

	        </ul>
	      </div>
	    </div>
	  </nav>