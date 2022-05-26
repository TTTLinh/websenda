<?php include("includes/connection.php"); ?>
<?php session_start(); ?>
<?php include("../header.php") ?>
<?php include("includes/permission.php");?>
<head>
	<link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css">
	<link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap-theme.min.css">
	<script src="//netdna.bootstrapcdn.com/bootstrap/3.1.1/js/bootstrap.min.js"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
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
<div class="container" style="width:auto;">
	<div class="row">
		<div class="col-md-12">
			<select id="catList" class="btn btn-default">
			<option value="0">Bữa ăn</option>
			<?php
				$sql="SELECT * from category";
				$catquery=$conn->query($sql);
				while($catrow=$catquery->fetch_array()){
					$catid = isset($_GET['category']) ? $_GET['category'] : 0;
					$selected = ($catid == $catrow['categoryid']) ? " selected" : "";
					echo "<option$selected value=".$catrow['categoryid'].">".$catrow['catname']."</option>";
				}
			?>
			</select>
			<a href="#addproduct" data-toggle="modal" class="pull-right btn btn-primary"><span class="glyphicon glyphicon-plus"></span> Thêm</a>
		</div>
	</div>
	<div style="margin-top:10px;">
		<table class="table table-striped table-bordered">
			<thead>
				<th>Hình ảnh</th>
				<th>Tên món</th>
				<th>Giá tiền</th>
				<th>Lựa chọn</th>
			</thead>
			<tbody>
				<?php
					$where = "";
					if(isset($_GET['category']))
					{
						$catid=$_GET['category'];
						$where = " WHERE product.categoryid = $catid";
					}
					$sql="SELECT * from product left join category on category.categoryid=product.categoryid $where order by product.categoryid asc, product_name asc";
					$query=$conn->query($sql);
					while($row=$query->fetch_array()){
						?>
						<tr>
							<td><a href="<?php if(empty($row['product_image'])){echo "upload/noimage.jpg";} else{echo $row['product_image'];} ?>"><img src="<?php if(empty($row['product_image'])){echo "upload/noimage.jpg";} else{echo $row['product_image'];} ?>" height="30px" width="40px"></a></td>
							<td><?php echo $row['product_name']; ?></td>
							<td><?php echo number_format($row['product_price']); ?> đ</td>
							<td>
								<a href="#editproduct<?php echo $row['id']; ?>" data-toggle="modal" class="btn btn-success btn-sm"><span class="glyphicon glyphicon-pencil"></span> Edit</a>
								<a href="#deleteproduct<?php echo $row['id']; ?>" data-toggle="modal" class="btn btn-danger btn-sm"><span class="glyphicon glyphicon-trash"></span> Delete</a>
								<?php include('product_modal.php'); ?>
							</td>
						</tr>
						<?php
					}
				?>
			</tbody>
		</table>
	</div>
</div>
<?php include('modal.php'); ?>
<script type="text/javascript">
	$(document).ready(function(){
		$("#catList").on('change', function(){
			if($(this).val() == 0)
			{
				window.location = 'product.php';
			}
			else
			{
				window.location = 'product.php?category='+$(this).val();
			}
		});
	});
</script>

</div>
</div>
</div>
</body>
</html>