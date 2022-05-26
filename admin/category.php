<?php include("includes/connection.php"); ?>
<?php include("../header.php") ?>
<?php session_start();?>
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
			<a href="#addcategory" data-toggle="modal" class="pull-right btn btn-primary"><span class="glyphicon glyphicon-plus"></span> Thêm</a>
		</div>
	</div>
	<div>
		<table class="table table-striped table-bordered">
			<thead>
			    <th>ID</th>
				<th>Danh mục</th>
				<th>Lựa chọn</th>
			</thead>
			<tbody>
				<?php
					$sql="SELECT * FROM category ORDER BY categoryid ASC";
					$query=$conn->query($sql);
					while($row=$query->fetch_array()){
						?>
						<tr>
						    <td><?php echo $row['categoryid']?></td>
							<td><?php echo $row['catname']; ?></td>
							<td>
                                <a href="#editcategory<?php echo $row['categoryid']; ?>" data-toggle="modal" class="btn btn-success btn-sm"><span class="glyphicon glyphicon-pencil"></span> Sửa</a>
                                <a href="#deletecategory<?php echo $row['categoryid']; ?>" data-toggle="modal" class="btn btn-danger btn-sm"><span class="glyphicon glyphicon-trash"></span> Xóa</a>
								<?php include('category_modal.php'); ?>
							</td>
						</tr>
						<?php
					}
				?>
			</tbody>
        </table>
        <?php include('modal.php'); ?>
	</div>
</div>
</div>
</div>
</div>
</body>