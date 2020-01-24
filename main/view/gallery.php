<?php
$db=new dbclass();
$con=$db->Connection();
$edID=isset($_REQUEST["ed"])?$_REQUEST["ed"]:"";
$del=isset($_REQUEST["del"])?$_REQUEST["del"]:"";

if($SesUserType==1)
{
	$heading=isset($_REQUEST["heading"])?$_REQUEST["heading"]:"";
	$name=isset($_REQUEST["name"])?$_REQUEST["name"]:"";
	$slug=create_slug($name);
	$cat_name = strtolower($name);
	$short_description= mysqli_real_escape_string($con,$_REQUEST["short_description"]);
	$description= mysqli_real_escape_string($con,$_REQUEST["description"]);
	$active=isset($_REQUEST["active"])?$_REQUEST["active"]:"";
	
	$Image=empty($Image)?"abc.png":$Image;
	$Image=isset($_REQUEST["old_image"])?$_REQUEST["old_image"]:"";
	
	$msg="";
	if(isset($_REQUEST["submit"]))
	{
		
		if($active=='on')
		{ 
			$active=1;
		}
		else
		{
			$active=0;
		}
		
		$ImgArr=explode('.',basename($_FILES['gallery_image']['name']));
		if($_FILES['gallery_image']['name']!="" )
		{

			if(file_exists("uploads/gallery/".$Image))
			{
				unlink("uploads/gallery/".$Image);
			}
			$Image=time().'gallery_image'.rand().'.'.end($ImgArr);
			$UploadDir="uploads/gallery/".$Image;
			move_uploaded_file($_FILES['gallery_image']['tmp_name'],$UploadDir);
		}

		if($name!= "")
		{


			echo $selectQry="select ID from gallery where ID='".$edID."' ";
			$checkinsup=mysqli_num_rows($db->TransQry($selectQry,$con));
			if($checkinsup==1)
			{
				echo $qry="update gallery set heading='".$heading."',name='".$name."',slug='".$slug."',short_description='".$short_description."',description='".$description."',image='".$Image."',icon='".$Icon."',status='".$active."' where ID='".$edID."'"; 
			}
			else if($checkinsup==0)
			{
				echo $qry="insert into gallery set heading='".$heading."',name='".$name."',slug='".$slug."',short_description='".$short_description."',description='".$description."',image='".$Image."',status='".$active."' "; 
			}
			$res=$db->TransQry($qry,$con);
			if($res)
			{
				$msg="Save Successfully";
				echo '<meta http-equiv="refresh" content="1;URL=?route='.$PageRoute.'" />';
			}
			else
			{
				$msg="Error in saving";
			}
		}
		else
		{
			$msg="Please Enter Required Fields";
		}
	  // }
	}
}

/* Get All gallery */
$qry="Select * FROM gallery where name!='' order by ID DESC";
$res=$db->SelectQry($qry,$con);	
$Rows2 = mysqli_num_rows($res);	
$all_cat=array();	
if($Rows2 >0)	
{ 	
	$i=0;  	
	while($get_allcat =mysqli_fetch_assoc($res))   	
	{		  
		if($edID==$get_allcat["ID"])
		{
			$heading = $get_allcat["heading"];
			$name = $get_allcat["name"];
			$image = $get_allcat["image"];
			$short_description = $get_allcat["short_description"];
			$description = $get_allcat["description"];
			$status = $get_allcat["status"];
		}
		$all_cat[$i++]=$get_allcat;

	}	
}

/* delete record query */
if(isset($del) and $del!='')
{
	$query_del= mysqli_query($con,"SELECT * FROM  gallery WHERE ID= '".$del."' ");
	$row_del  = mysqli_fetch_array($query_del);
	$Image= $row_del['image'];
	unlink("uploads/gallery/".$Image);

	$delqry = mysqli_query($con, "DELETE FROM gallery WHERE ID='".$del."'"); 
	unlink("uploads/gallery/".$Image);
	$msg="Delete Successfully";
	echo '<meta http-equiv="refresh" content="2;URL=?route=gallery" />';
}

$StatusArr=array("","");
$StatusArr[$active]='checked="checked" ';
unset($db);
?>
			
	<!-- Content Wrapper. Contains page content -->
	<div class="content-wrapper">
		<!-- Content Header (Page header) -->
		<section class="content-header">
			<h1>Add New Gallery Image</h1>
			<ol class="breadcrumb">
				<li class="breadcrumb-item"><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
				<li class="breadcrumb-item"><a href="#">Catalog</a></li>
				<li class="breadcrumb-item active">Gallery</li>
			</ol>
		</section>

		<!-- Main content -->
		<section class="content">

			<!-- Basic Forms -->
			<div class="box box-default">
				<div class="box-header with-border">
					<h3 class="box-title">Add gallery</h3>

					<div class="box-tools pull-right">
						<button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
						<button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-remove"></i></button>
					</div>
				</div>
				<!-- /.box-header -->
				<form name="c_form" method="post" enctype="multipart/form-data">
					<p class="text-center" style="color:GREEN;font-weight:700;"> <?php if(isset($msg) and $msg!='') echo $msg;?></p>
					<div class="box-body">
						<div class="row">
							<div class="col-12">
							<div class="form-group row">
									<label for="example-text-input" class="col-sm-2 col-form-label">Heading</label>
									<div class="col-sm-10">
									  <input class="form-control" placeholder="Enter Heading" type="text" value="<?=$heading?>" id="heading" name="heading">
									</div>
								</div>

								<div class="form-group row">
									<label for="example-text-input" class="col-sm-2 col-form-label">Name</label>
									<div class="col-sm-10">
										<input class="form-control" placeholder="Enter Name" type="text" value="<?=$name;?>" id="name" name="name">
									</div>
								</div>

								<div class="form-group row">
									<label for="example-text-input" class="col-sm-2 col-form-label">Short Summary</label>
									<div class="col-sm-10">
										<textarea class="form-control" name="short_description" placeholder="Enter Summary" ><?=$short_description?></textarea>

									</div>
								</div>

								<div class="form-group row">
									<label for="example-text-input" class="col-sm-2 col-form-label">Description</label>
									<div class="col-sm-10">
										<textarea class="form-control" name="description" id="description" placeholder="Enter Short Description" ><?=$description?></textarea>

									</div>
								</div>	

								<div class="form-group row">
									<label for="example-text-input" class="col-sm-2 col-form-label">Gallery Image</label>
									<div class="col-sm-10">
										<input type="file" id="gallery_image" name="gallery_image">
										<input type="hidden" name="old_image" id="old_image" value="<?=$image?>">
										<?php if(isset($edID) and $edID!=''){ ?>
											<img src="uploads/gallery/<?=$image?>" height='70'>
										<?php } ?>
									</div>
								</div>
			
								<div class="form-group row">
									<label for="example-text-input" class="col-sm-2 col-form-label">Active</label>
									<div class="col-sm-10">
										<input type="checkbox" id="active" name="active" class="filled-in chk-col-green" checked />
										<label for="active"></label>
									</div>
								</div>

								<div class="form-group row">
									<div class="col-sm-8">
										<input class="btn btn-primary" type="submit" value="Submit" id="submit" name="submit">
									</div>
								</div>
							</div>
							<!-- /.col -->
						</div>
						<!-- /.row -->
					</div>
				</form>
				<!-- /.box-body -->
			</div>
			<!-- /.box -->
			<div class="box-body">
				<form method="post">
					<table id="example" class="table table-bordered table-hover display nowrap margin-top-10 table-responsive">
						<thead>
							<tr>
								<th>Sr .No</th>
								<th>Heading</th>
								<th>Name</th>
								<th>Image</th>
								<th>Active</th>
								<th>Action</th>

							</tr>
						</thead>
						<tbody>
							<?php
							for($i=0;$i<count($all_cat);$i++)
							{
								?>

								<tr>
									<td><?=$i ?></td>
									<td><?=$all_cat[$i]["heading"]?></td>
									<td><?=$all_cat[$i]["name"]?></td>

									<td>
										<?php 
										if(isset($all_cat[$i]["image"]) and $all_cat[$i]["image"]!='')
										{
											?>
											<img height="40" width="80" src="uploads/gallery/<?=$all_cat[$i]["image"]?>"><?php } else{
												echo '<img height="15" width="15" src="uploads/images/cross.png">';
											} ?>
										</td>
										
										<td><?php 
										if($all_cat[$i]["status"]==1)
										{
											echo '<img height="15" width="15" src="uploads/images/yes.png">';
										}else{
											echo '<img height="15" width="15" src="uploads/images/cross.png">';
										}
										$all_cat[$i]["active"]?></td>
										<td><a href="?route=<?=$PageRoute?>&ed=<?=$all_cat[$i]["ID"];?>" class="btn btn-success">Edit</a><a href="?route=<?=$PageRoute?>&del=<?=$all_cat[$i]["ID"];?>" class="btn btn-danger">Delete</a></td>

									</tr>
								<?php } ?>

							</tbody>
							<tfoot>
								
								<tr>
									<th>Sr .No</th>
									<th>Heading</th>
									<th>Name</th>
									<th>Image</th>
									<th>Active</th>
									<th>Action</th>
								</tr>
							</tfoot>
						</table>
					</form>

				</div>

			</section>
			<!-- /.content -->
		</div>
		<!-- /.content-wrapper -->
	</body>
	</html>
	<script src="https://cdn.ckeditor.com/4.11.4/standard/ckeditor.js"></script>
	<script>
		CKEDITOR.replace( 'description' );
	</script>
