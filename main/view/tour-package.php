<?php
session_start();
$db=new dbclass();
$con=$db->Connection();
$edID=isset($_REQUEST["ed"])?$_REQUEST["ed"]:"";
$del=isset($_REQUEST["del"])?$_REQUEST["del"]:"";
if($SesUserType==1)
{
	$category=isset($_REQUEST["category"])?$_REQUEST["category"]:"";
	$subcategory=isset($_REQUEST["subcategory"])?$_REQUEST["subcategory"]:"";
	$heading=isset($_REQUEST["heading"])?$_REQUEST["heading"]:"";
	$icons=implode(",",$_REQUEST["icons"]);
	$slug=create_slug($heading);
	$heading=htmlspecialchars($heading);
	$pack_name=isset($_REQUEST["pack_name"])?$_REQUEST["pack_name"]:"";
	$night=isset($_REQUEST["night"])?$_REQUEST["night"]:"";
	$deal=isset($_REQUEST["deal"])?$_REQUEST["deal"]:"";
	$tag=implode(",",$_REQUEST["tag"]);
	$days=mysqli_real_escape_string($con, $_REQUEST["days"]);
	$day1=json_encode($_POST['day1']);
	
	$honeymoon_include=mysqli_real_escape_string($con, $_REQUEST["honeymoon_inclusion"]);
	$package_include=mysqli_real_escape_string($con, $_REQUEST["package_inclusion"]);
	$payment_policy=mysqli_real_escape_string($con, $_REQUEST["payment_policy"]);
	$term_condition=mysqli_real_escape_string($con, $_REQUEST["term_condition"]);
	
	$narration=mysqli_real_escape_string($con, $_REQUEST["narration"]);
	$narration=htmlspecialchars($narration);
	$active=isset($_REQUEST["active"])?$_REQUEST["active"]:"";
	
	$Image=empty($Image)?"abc.png":$Image;
	// $Icon=empty($Icon)?"ico.png":$Icon;
	$dataset=json_encode($_REQUEST);
	$Image=isset($_REQUEST["old_cat_image"])?$_REQUEST["old_cat_image"]:"";
	// $Icon=isset($_REQUEST["old_icon"])?$_REQUEST["old_icon"]:"";
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
		$check_exist="select ID from category where ID='".$category."' and childcatID='".$subcategory."' and  name='".$pack_name."' ";
		$check_exist=mysqli_num_rows($db->TransQry($check_exist,$con));
		if($check_exist>0)
		{
			$msg=" '".$pack_name."' Already Exist in '".$subcategory."' ";
			/*echo '<meta http-equiv="refresh" content="2;URL=?route='.$PageRoute.'" />';*/
		}
		else{   
			$ImgArr=explode('.',basename($_FILES['image']['name']));
			$IcnArr=explode('.',basename($_FILES['cat_icon']['name']));
			if($_FILES['image']['name']!="" )
			{

				if(file_exists("uploads/category/".$Image))
				{
					unlink("uploads/category/".$Image);
				}
				$Image=time().'image'.rand().'.'.end($ImgArr);
				$UploadDir="uploads/category/".$Image;
				move_uploaded_file($_FILES['image']['tmp_name'],$UploadDir);
			}
			if($_FILES['cat_icon']['name']!="")
			{

				if(file_exists("uploads/category/icon/".$Icon))
				{
					unlink("uploads/category/icon/".$Icon);
				}
				$Icon=time().'cat_icon'.rand().'.'.end($IcnArr);
				$UploadDir1="uploads/category/icon/".$Icon;
				move_uploaded_file($_FILES['cat_icon']['tmp_name'],$UploadDir1);
			} 
			if($pack_name!= "")
			{

		 // echo $packageID=empty($edID)?GUID():$edID;

				$selectQry="select ID from package where ID='".$edID."' "; 

				$checkinsup=mysqli_num_rows($db->TransQry($selectQry,$con));
				if($checkinsup==1)
				{
					$qry="update  package set categoryID='".$category."',childcatID='".$subcategory."',heading='".$heading."',name='".$pack_name."',days='".$days."',night='".$night."',deal='".$deal."',tag='".$tag."',icons='".$icons."',image='".$Image."',Narration='".$narration."',day1='".$day1."',package_include='".$package_include."',honeymoon_include='".$honeymoon_include."',payment_policy='".$payment_policy."',term_condition='".$term_condition."',slug='".$slug."',active='".$active."',e_date='".$E_Date."' where ID='".$edID."'";
				}
				else if($checkinsup==0)
				{

					$qry="insert into  package set categoryID='".$category."',childcatID='".$subcategory."',heading='".$heading."',name='".$pack_name."',days='".$days."',night='".$night."',deal='".$deal."',tag='".$tag."',icons='".$icons."',image='".$Image."',Narration='".$narration."',day1='".$day1."',package_include='".$package_include."',honeymoon_include='".$honeymoon_include."',payment_policy='".$payment_policy."',term_condition='".$term_condition."',slug='".$slug."',active='".$active."',e_date='".$E_Date."'";
				}
				$res=$db->TransQry($qry,$con);
				
				if($res)
				{
					$msg="Save Successfully";
					echo '<meta http-equiv="refresh" content="2;URL=?route='.$PageRoute.'" />';
				}
				else
				{
					$msg="Error in saving";
				}
			}
			else
			{
				$msg="All Fields Are Required";
				echo '<meta http-equiv="refresh" content="5;URL=?route='.$PageRoute.'" />';
			}
		}
	}
}
/* Get All Activated package */
$qry="Select package.*,category.name as c_name,category.parantID as c_parent FROM package left join category on category.ID = package.childcatID where package.active='1' order by ID DESC";
$res=$db->SelectQry($qry,$con);	
$Rows2 = mysqli_num_rows($res);	
$all_package=array();	
if($Rows2 >0)	
{ 	
	$i=0;  	
	while($get_cat =mysqli_fetch_assoc($res))   	
	{		       			
		$all_package[$i++]=$get_cat;  	
	}	
}
/* Get All package */
$qry="Select * FROM package order by e_date DESC;";
$res=$db->SelectQry($qry,$con);	
$Rows2 = mysqli_num_rows($res);	
$all_cat=array();	
if($Rows2 >0)	
{ 	
	$i=0;  	
	$get_allcat =mysqli_fetch_assoc($res);
		// {		 
			// @extract($get_allcat);		
	if($edID==$get_allcat["ID"])
	{
		$heading = $get_allcat["heading"];
		$name = $get_allcat["name"];
		$image = $get_allcat["image"];
		$days = $get_allcat["days"];
		$day1 = json_decode($get_allcat["day1"]);
		$night = $get_allcat["night"];
		$deal = $get_allcat["deal"];
		$package_include = $get_allcat["package_include"];
		$honeymoon_include = $get_allcat["honeymoon_include"];
		$categoryID  = $get_allcat["categoryID"];
		$subcatID  = $get_allcat["childcatID"];
		$packID = $get_allcat["ID"];
		$narration = $get_allcat["Narration"];
	}
	$all_cat[$i++]=$get_allcat;
}
// Category Parant Id
$qry="Select * FROM category where active=1 and parantID='0' order by name ASC;";
$get=$db->SelectQry($qry,$con);	
$count = mysqli_num_rows($get);	
$Categ=array();	
if($count >0)	
{ 	
	$i=0;  	
	while($Ftch =mysqli_fetch_assoc($get))   	
	{		       			
		$Categ[$i++]=$Ftch;  	
	}	

}

if(isset($del) and $del!='')
{
	$query_del= mysqli_query($con,"SELECT * FROM  package WHERE ID= '".$del."' ");
	$row_del  = mysqli_fetch_array($query_del);
	$Image= $row_del['image'];
	unlink("uploads/testimony/".$Image);

	$qry="delete from package where ID='".$del."'";
	$res=$db->TransQry($qry,$con);
	if ($res) 
	{
		$msg = "Delete Successfully";
		echo '<meta http-equiv="refresh" content="4;URL=?route='.$PageRoute.'" />';
	}
}


/* Get All Activated Tag */
$qry="Select * FROM tag where active=1 order by name ASC;";
$get_tag=$db->SelectQry($qry,$con);	
$Count = mysqli_num_rows($get_tag);	
$gettag=array();	
if($Count >0)	
{ 	
	$i=0;  	
	while($Fetch =mysqli_fetch_assoc($get_tag))   	
	{		       			
		$gettag[$i++]=$Fetch;  	
	}	
}

/* Get All Activated Departure */
$qry="Select * FROM departure_city where active=1 order by name ASC;";
$get_departure=$db->SelectQry($qry,$con);	
$Count_departure = mysqli_num_rows($get_departure);	
$get_departure_city=array();	
if($Count_departure >0)	
{ 	
	$i=0;  	
	while($Fetch_departure =mysqli_fetch_assoc($get_departure))   	
	{		       			
		$get_departure_city[$i++]=$Fetch_departure;  	
	}	
}

$StatusArr=array("","");
$StatusArr[$active]='checked="checked" ';
// unset($db);
?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<section class="content-header">
		<h1>
			Add New Tour Package
		</h1>
		<ol class="breadcrumb">
			<li class="breadcrumb-item"><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
			<li class="breadcrumb-item"><a href="#">Forms</a></li>
			<li class="breadcrumb-item active">Tour Package</li>
		</ol>
	</section>

	<!-- Main content -->
	<section class="content">

		<!-- Basic Forms -->
		<div class="box box-default">
			<div class="box-header with-border">
				<h3 class="box-title">Add Tour Package</h3>

				<div class="box-tools pull-right">
					<button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
					<button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-remove"></i></button>
				</div>
			</div>
			<!-- /.box-header -->
			<form name="c_form" method="post" enctype="multipart/form-data">
				<p class="text-center" style="color:green;font-weight:700;"> <?php if(isset($msg) and $msg!='') echo $msg;?></p>
				<div class="box-body">
					<div class="row">
						<div class="col-12">
							<div class="form-group row">
								<label for="example-text-input" class="col-sm-2 col-form-label">Select Category</label>
								<div class="col-sm-10">

									<select onchange="getCategory(this.value);" class="form-control select2" data-placeholder="Select Category" name="category" id="category">
										<option value="0">None</option>
										<?php
										for($i=0;$i<count($Categ);$i++)
										{

											?>
											<option value="<?=$Categ[$i]["ID"]?>" <?php if(isset($categoryID) and $categoryID!='' and $categoryID==$Categ[$i]["ID"]) { ?> selected="selected" <?php }?>><?=$Categ[$i]["name"]?></option>
										<?php } ?>
									</select>
								</div>
							</div>
							<div class="form-group row">
								<label for="example-text-input" class="col-sm-2 col-form-label">Sub Category</label>
								<div class="col-sm-10">

									<select class="form-control select2" data-placeholder="Select Category" name="subcategory" id="subcategory" attr_selected_id="<?=$subcatID?>">
										<option value="0">None</option>

									</select>
								</div>
							</div>
							<div class="form-group row">
								<label for="example-text-input" class="col-sm-2 col-form-label">Package Heading</label>
								<div class="col-sm-10">
									<input class="form-control" placeholder="Tour Package Heading" type="text" value="<?php if(isset($heading) and $heading!='') echo $heading;?>" id="heading" name="heading">
								</div>
							</div> 
							<div class="form-group row">
								<label for="example-text-input" class="col-sm-2 col-form-label">Package Name</label>
								<div class="col-sm-10">
									<input class="form-control" placeholder="Tour Package Name" type="text" value="<?php if(isset($name) and $name!='') echo $name;?>" id="pack_name" name="pack_name">
								</div>
							</div>
							<div class="form-group row">
								<label for="example-text-input" class="col-sm-2 col-form-label">No. Of Days</label>
								<div class="col-sm-10">
									<input class="form-control" placeholder="No. Of days" type="text" value="<?=$days;?>" id="days" name="days">
								</div>
							</div>
							<div class="form-group row">
								<label for="example-text-input" class="col-sm-2 col-form-label">No. Of Night</label>
								<div class="col-sm-10">
									<input class="form-control" placeholder="No. Of Night" type="text" value="<?=$night;?>" id="night" name="night">
								</div>
							</div>
							<div class="form-group row">
								<label for="example-text-input" class="col-sm-2 col-form-label">Tag</label>
								<div class="col-sm-10">

									<select class="form-control select2" multiple data-placeholder="Select Tag" name="tag[]" id="tag">
										<option value="0">Select Tag</option>
										<?php
										for($i=0;$i<count($gettag);$i++)
										{
											?>
											<option value="<?=$gettag[$i]["name"]?>" <?php if(isset($p_catid) and $p_catid!='' and $p_catid==$gettag[$i]["ID"]) { ?> selected="selected" <?php }?>><?=ucwords($gettag[$i]["name"])?></option>
										<?php } ?>
									</select>
								</div>
							</div>

							<div class="form-group row">
								<label for="example-text-input" class="col-sm-2 col-form-label">Departure</label>
								<div class="col-sm-10">

									<select class="form-control select2" multiple data-placeholder="Select Departure" name="departure" id="departure">
										<option value="0">Select Departure</option>
										<?php
										for($i=0;$i<count($get_departure_city);$i++)
										{
											?>
											<option value="<?=$get_departure_city[$i]["name"]?>" <?php if(isset($departure_city) and $departure_city!='' and $departure_city==$get_departure_city[$i]["ID"]) { ?> selected="selected" <?php }?>><?=ucwords($get_departure_city[$i]["name"])?></option>
										<?php } ?>
									</select>
								</div>
							</div>

							<div class="form-group row">
								<label for="example-text-input" class="col-sm-2 col-form-label">Facility Icons</label>
								<div class="col-sm-10">

									<select class="form-control select2" multiple data-placeholder="Select Facility Icons" name="icons[]" id="icons">
										<option value="">Select icons</option>
										<?php

										$icons = explode(",",$get_allcat['icons']);	

										$qry="Select * FROM icons where active=1  order by name ASC;";
										$run=$db->SelectQry($qry,$con);	
										$Rows2 = mysqli_num_rows($run);	

										while($fetch =mysqli_fetch_assoc($run))   	
										{	


											?>

											<option value="<?=$fetch['ID']?>"<?php 
											if(isset($fetch['ID']))
											{

												foreach($icons as $icon)
												{
													if($icon == $fetch['ID']) { echo "selected=selected"; } 
												}
											}
											?>><?=$fetch['name']?></option>
										<?php }	

										?>

									</select>
								</div>
							</div>
							<div class="form-group row">
								<label for="example-text-input" class="col-sm-2 col-form-label">Deal </label>
								<div class="col-sm-10">
									<textarea class="form-control" placeholder="Deal Detail" id="deal" name="deal"><?=$deal;?></textarea>
								</div>
							</div>
							<div class="form-group row">
								<label for="example-text-input" class="col-sm-2 col-form-label">Day1</label>
								<div class="col-sm-9">
									<textarea class="form-control" placeholder="Day 1 Detail" id="day1" name="day1[]"><?=$day1?></textarea>
								</div> 
								<div class="col-sm-1">
									<button type="button" style="border-radius: 50px;font-size: 29px;color: #eef5ee; background: #65a061;border: none;" id="add_more" class="fa fa-plus" aria-hidden="true"></button>
								</div>
							</div> 

							<div id="more_field"></div>

							<div class="form-group row">
								<label for="example-text-input" class="col-sm-2 col-form-label">Package Inclusion</label>
								<div class="col-sm-10">
									<textarea class="form-control" placeholder="Package Inclusion Detail" id="package_inclusion" name="package_inclusion"><?=$package_include?></textarea>
								</div>
							</div>
							<div class="form-group row">
								<label for="example-text-input" class="col-sm-2 col-form-label">Package Exclusion</label>
								<div class="col-sm-10">
									<textarea class="form-control" placeholder="Honeymoon Exclusion Detail" id="honeymoon_inclusion" name="honeymoon_inclusion"><?=$honeymoon_include?></textarea>
								</div>
							</div>

							<div class="form-group row">
								<label for="example-text-input" class="col-sm-2 col-form-label">Payment Polilcy</label>
								<div class="col-sm-10">
									<textarea class="form-control" placeholder="Payment Polilcy" id="payment_policy" name="payment_policy"><?=$payment_policy;?></textarea>
								</div>
							</div>
							<div class="form-group row">
								<label for="example-text-input" class="col-sm-2 col-form-label">Term & Condition</label>
								<div class="col-sm-10">
									<textarea class="form-control" placeholder="Term & Condition" id="term_condition" name="term_condition"><?=$term_condition;?></textarea>
								</div>
							</div>

							<div class="form-group row">
								<label for="example-text-input" class="col-sm-2 col-form-label">Description</label>
								<div class="col-sm-10">
									<textarea class="form-control" name="narration" placeholder="Narration" ><?=$narration;?></textarea>
								</div>
							</div>

							<div class="form-group row">
								<label for="example-text-input" class="col-sm-2 col-form-label">Image</label>
								<div class="col-sm-10">
									<input class="" type="file" value="" id="image" name="image">
									<input type="hidden" name="old_cat_image" id="old_cat_image" value="<?=$image?>">
									<?php if(isset($edID) and $edID!=''){ ?>
										<img src="uploads/category/<?=$image?>" height='70'>
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
					</div>
				</div>
			</form>
			<!-- /.box-body -->
		</div>
		<!-- /.box -->
		<div class="box-body">
			<table id="example" class="table table-bordered table-hover display nowrap margin-top-10 table-responsive">
				<thead>
					<tr style="background: #a4e2a4;">
						<th>Category Name</th>
						<th>Tour Name</th>
						<th>Image</th>
						<th>Narration</th>
						<th>Active</th>
						<th>Action</th>
						
					</tr>
				</thead>
				<tbody>
					<?php
					for($i=0;$i<count($all_package);$i++)
					{
						?>
						<tr>
							<td><?=$all_package[$i]["c_name"]?></td>
							<td><?=$all_package[$i]["name"]?></td>

							<td><img height="40" width="80" src="uploads/category/<?=$all_package[$i]["image"]?>"></td>
							<td><?=$all_package[$i]["Narration"]?></td>
							<td><?php 
							if($all_package[$i]["active"]==1)
							{
								echo '<img height="15" width="15" src="uploads/images/yes.png">';
							}else{
								echo '<img height="15" width="15" src="uploads/images/cross.png">';
							}
							$all_package[$i]["active"]?></td>
							<td><a href="?route=<?=$PageRoute?>&ed=<?=$all_package[$i]["ID"];?>" class="btn btn-success">Edit</a><a href="?route=<?=$PageRoute?>&del=<?=$all_package[$i]["ID"];?>" class="btn btn-danger">Delete</a></td>

						</tr>
					<?php } ?>
					
				</tbody>
				<tfoot>
					<tr style="background: #a4e2a4;">
						<th>Category Name</th>
						<th>Tour Name</th>
						<th>Image</th>
						<th>Narration</th>
						<th>Active</th>
						<th>Action</th>
					</tr>
				</tfoot>
			</table>


		</div>

	</section>
	<!-- /.content -->
</div>
<!-- /.content-wrapper -->



<script src="https://cdn.ckeditor.com/4.11.4/standard/ckeditor.js"></script>
<script>
	CKEDITOR.replace( 'day1' );
	CKEDITOR.replace( 'package_inclusion' );
	CKEDITOR.replace( 'honeymoon_inclusion' ); 
	CKEDITOR.replace( 'payment_policy' );
	CKEDITOR.replace( 'term_condition' );

	function getCategory(val , previously_selected_subcat = false) {

		$.ajax({
			type: "POST",
			url: "model/gertResult.php",
			data: {catID:val , previously_selected_subcat:previously_selected_subcat},
			success: function(data){

				$("#subcategory").html(data);

			}
		});
	}

	$(document).ready(function(){
		var categoryID = $('#category').val();
		var subcategoryId = $('#subcategory').attr('attr_selected_id');

		if(categoryID != null){
			getCategory(categoryID, subcategoryId);
		}

	});

	/*--------------------DYNAMIC FIELDS FOR ADDING ROOMS-----------------*/
	var remove;
	var srNo=2;


	$('#add_more').click(function()
	{
		if (srNo >= 20) 
		{
			$("#add_more").attr("disabled", "disabled");   
		}
		$("#more_field").append('<div id="remove_field'+srNo+'"><div class="form-group row"><label for="example-text-input" class="col-sm-2 col-form-label">Day'+srNo+'</label><div class="col-sm-9"><textarea class="form-control" placeholder="Day '+srNo+' Detail" id="day1'+srNo+'" name="day1[]"><?=$day1?></textarea></div><div class="col-sm-1"><button type="button" class="fa fa-minus" aria-hidden="true" style="border-radius: 50%;font-size: 29px;color: #eef5ee; background: #f13e5f;border: none;" onclick="remove('+srNo+')"></button></div></div></div>');srNo++;
	});
	



	function remove(id)
	{
		$('#remove_field'+id).remove();
		srNo--;
		$('#add_more').prop('disabled', false);
		/*document.getElementById("add_more").disabled = false;*/
	}	
</script>

