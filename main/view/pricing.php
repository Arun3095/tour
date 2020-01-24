	<?php
	$db=new dbclass();
	$con=$db->Connection();
	$edID=isset($_REQUEST["ed"])?$_REQUEST["ed"]:"";
	$del=isset($_REQUEST["del"])?$_REQUEST["del"]:"";
	if($SesUserType==1)
	{

		$package=isset($_REQUEST["package"])?$_REQUEST["package"]:"";
		$category=isset($_REQUEST["category"])?$_REQUEST["category"]:""; 
		$subcategory=isset($_REQUEST["subcategory"])?$_REQUEST["subcategory"]:"";
		$planID=isset($_REQUEST["planid"])?$_REQUEST["planid"]:"";

		$lux_final_price=isset($_REQUEST["lux_final_price"])?$_REQUEST["lux_final_price"]:"";
		$lux_regular_price=isset($_REQUEST["lux_regular_price"])?$_REQUEST["lux_regular_price"]:"";
		$lux_per_bed_price=isset($_REQUEST["lux_per_bed_price"])?$_REQUEST["lux_per_bed_price"]:"";

		$std_final_price=isset($_REQUEST["std_final_price"])?$_REQUEST["std_final_price"]:"";
		$std_regular_price=isset($_REQUEST["std_regular_price"])?$_REQUEST["std_regular_price"]:"";
		$std_per_bed_price=isset($_REQUEST["std_per_bed_price"])?$_REQUEST["std_per_bed_price"]:"";

		$prm_final_price=isset($_REQUEST["prm_final_price"])?$_REQUEST["prm_final_price"]:"";
		$prm_regular_price=isset($_REQUEST["prm_regular_price"])?$_REQUEST["prm_regular_price"]:"";
		$prm_per_bed_price=isset($_REQUEST["prm_per_bed_price"])?$_REQUEST["prm_per_bed_price"]:"";



		$narration=isset($_REQUEST["narration"])?$_REQUEST["narration"]:"";
		$active=isset($_REQUEST["active"])?$_REQUEST["active"]:"";

		$dataset=json_encode($_REQUEST);

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

			if($package!= "")
			{

				$selectQry="select ID,categoryID,subcategoryID,packageID from  pricing where ID='".$edID."' ";

				$checkinsup=mysqli_num_rows($db->TransQry($selectQry,$con));
				if($checkinsup==1)
				{ 
					$qry="update pricing set categoryID='".$category."',subcategoryID='".$subcategory."',packageID='".$package."',planID='".$planID."',lux_final_price='".$lux_final_price."',lux_regular_price='".$lux_regular_price."',lux_per_bed_price='".$lux_per_bed_price."',std_final_price='".$std_final_price."',std_regular_price='".$std_regular_price."',std_per_bed_price='".$std_per_bed_price."',prm_final_price='".$prm_final_price."',prm_regular_price='".$prm_regular_price."',prm_per_bed_price='".$prm_per_bed_price."',narration='".$narration."',active='".$active."',u_date='".$E_Date."' where ID='".$edID."'";
				}
				else if($checkinsup==0)
				{
					 $qry="insert into pricing set categoryID='".$category."',subcategoryID='".$subcategory."',packageID='".$package."',planID='".$planID."',lux_final_price='".$lux_final_price."',lux_regular_price='".$lux_regular_price."',lux_per_bed_price='".$lux_per_bed_price."',std_final_price='".$std_final_price."',std_regular_price='".$std_regular_price."',std_per_bed_price='".$std_per_bed_price."',prm_final_price='".$prm_final_price."',prm_regular_price='".$prm_regular_price."',prm_per_bed_price='".$prm_per_bed_price."',narration='".$narration."',active='".$active."',e_date='".$E_Date."'";
				}
				$res=$db->TransQry($qry,$con);

				if($_POST['add_pricing_all_id'][0] > 0 )
				{  
					$dquery =  "delete from add_on_price where pricing_id='".$edID."' and ID NOT IN (".implode(',',$_POST['add_pricing_all_id']).") "; 
					$db->TransQry($dquery,$con);
				}


				for($i=0;$i<=count($_POST['price_from_to']);$i++)
				{

					if($_POST['price_from_to'][$i]!='' and $_POST['price_from_to'][$i]>0)
					{
						if($_POST['add_pricing_all_id'][$i]==0)
						{
   // $_POST['add_pricing_all_id'][$i];
							$getpID="Select * FROM pricing where active=1 order by ID DESC limit 1"; 
							$run=$db->SelectQry($getpID,$con);	
							$get_lastID_data =mysqli_fetch_assoc($run);
							if($edID!=''){
								$get_lastID = $edID;
							}else{
								$get_lastID = $get_lastID_data['packageID']; 
							}

							$query ="insert into add_on_price SET package_id='".$get_lastID."',pricing_id='".$get_lastID_data['ID']."' ,city = '".$_POST['to_city_price'][$i]."',price = '".$_POST['price_from_to'][$i]."', final_price = '".$_POST['final_price'][$i]."' ";
						}
						else
						{
							$query ="update add_on_price SET pricing_id='".$edID."', package_id = '".$get_lastID."',city = '".$_POST['to_city_price'][$i]."',price = '".$_POST['price_from_to'][$i]."', final_price = '".$_POST['final_price'][$i]."' where ID ='".$_POST['add_pricing_all_id'][$i]."'";
						}
						$pres=$db->TransQry($query,$con);
					}
				}

				if($res || $pres)
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
			}
   // }
		}
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

	/* Get All Pricing Details */
	$qry="Select * FROM pricing order by e_date DESC;";
	$res=$db->SelectQry($qry,$con);	
	$Rows2 = mysqli_num_rows($res);	
	$all_data=array();	
	if($Rows2 >0)	
	{ 	
		$i=0;  	
		while($getdata =mysqli_fetch_assoc($res))   	
		{		  
			if($edID==$getdata["ID"])
			{	
				$category_id = $getdata["categoryID"];
				$subcategory_id = $getdata["subcategoryID"]; 
				$package_id = $getdata["packageID"];
				$planID = $getdata["planID"];
				$r_price = $getdata["r_price"];
				$p_price = $getdata["f_price"];
				$lux_final_price = $getdata["lux_final_price"];
				$lux_regular_price = $getdata["lux_regular_price"];  
				$lux_per_bed_price = $getdata["lux_per_bed_price"];

				$std_final_price = $getdata["std_final_price"];
				$std_regular_price = $getdata["std_regular_price"];
				$std_per_bed_price = $getdata["std_per_bed_price"];

				$prm_final_price = $getdata["prm_final_price"];
				$prm_regular_price = $getdata["prm_regular_price"];
				$prm_per_bed_price = $getdata["prm_per_bed_price"];
				$narration 		= $getdata["narration"];

			}
			$all_data[$i++]=$getdata;

		}	
	} 

	/* GET Package Heading */
	$q="Select * FROM package where active='1' and heading!='' order by e_date DESC";
	$result=$db->SelectQry($q,$con);	
	$Rows12 = mysqli_num_rows($result);	
	$getpack=array();	
	if($Rows12 >0)	
	{ 	
		$i=0;  	
		while($fetch =mysqli_fetch_assoc($result))   	
		{		  
   /* if($edID==$get_allcat["planID"])
   {
   $name = $get_allcat["name"];
   $r_price = $get_allcat["r_price"];
   $p_price = $get_allcat["p_price"];
   $narration = $get_allcat["narration"];
} */
$getpack[$i++]=$fetch;

}	
}
/* GET Hotel Type: Like Luxury Standard etc. */
$qu="Select * FROM package_plan where active='1' and name!='' order by e_date DESC";
$result1=$db->SelectQry($qu,$con);	
$Rows121 = mysqli_num_rows($result1);	
$getplan=array();	
if($Rows121 >0)	
{ 	
	$i=0;  	
	while($fetch1 =mysqli_fetch_assoc($result1))   	
	{		  
   /* if($edID==$get_allcat["planID"])
   {
   $name = $get_allcat["name"];
   $r_price = $get_allcat["r_price"];
   $p_price = $get_allcat["p_price"];
   $narration = $get_allcat["narration"];
} */
$getplan[$i++]=$fetch1;

}	
}
if(isset($del) and $del!='')
{
	$qry="delete from pricing where ID='".$del."'";
	$res=$db->TransQry($qry,$con);
	if($res)
	{
		$msg="Delete Successfully";
		echo '<meta http-equiv="refresh" content="1;URL=?route='.$PageRoute.'" />';
	}
	else
	{
		$msg="Error in Deleting";
	}
}

$StatusArr=array("","");
$StatusArr[$active]='checked="checked" ';
   //unset($db);
?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<section class="content-header">
		<h1>Add New Hotel Detail</h1>
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
				<p class="text-center" style="color:GREEN;font-weight:700;"> <?php if(isset($msg) and $msg!='') echo $msg;?></p>
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
											<option value="<?=$Categ[$i]["ID"]?>" <?php if(isset($category_id) and $category_id!='' and $category_id==$Categ[$i]["ID"]) { ?> selected="selected" <?php }?>><?=$Categ[$i]["name"]?></option>
										<?php } ?>
									</select>
								</div>
							</div>
							<div class="form-group row">
								<label for="example-text-input" class="col-sm-2 col-form-label">Sub Category</label>
								<div class="col-sm-10">
									<select class="form-control select2" data-placeholder="Select Category" name="subcategory" id="subcategory" onchange="getpackage(this.value);">
										<option value="0">None</option>
									</select>
								</div>
							</div>
							<div class="form-group row">
								<label for="example-text-input" class="col-sm-2 col-form-label">Package Type</label>
								<div class="col-sm-10">
									<select class="form-control select2" data-placeholder="Select Package Heading" name="package" id="package_name" >
										<option value="0">Select Package Type</option>
									</select>
								</div>
							</div>
							<div class="form-group row">
								<label for="example-text-input" class="col-sm-2 col-form-label">Luxury Final Price</label>
								<div class="col-sm-2">
									<input class="form-control" placeholder="Luxury Final Price" type="text" value="<?=$lux_final_price;?>" id="lux_final_price" name="lux_final_price">
								</div>
								<label for="example-text-input" class="col-sm-2 col-form-label">Luxury Regular Price</label>
								<div class="col-sm-2">
									<input class="form-control" placeholder="Luxury Regular Price" type="text" value="<?=$lux_regular_price;?>" id="lux_regular_price" name="lux_regular_price">
								</div>
								<label for="example-text-input" class="col-sm-2 col-form-label">4 Luxury Bed price</label>
								<div class="col-sm-2">
									<input class="form-control" placeholder="Bed Prices" type="text" value="<?=$lux_per_bed_price?>" name="lux_per_bed_price" id="lux_per_bed_price">
								</div>
							</div>
							<div class="form-group row">
								<label for="example-text-input" class="col-sm-2 col-form-label">Standard Final Price</label>
								<div class="col-sm-2">
									<input class="form-control" placeholder="Standard Final Price" type="text" value="<?=$std_final_price;?>" id="std_final_price" name="std_final_price">
								</div>
								<label for="example-text-input" class="col-sm-2 col-form-label">Standard Regular Price</label>
								<div class="col-sm-2">
									<input class="form-control" placeholder="Standard Regular Price" type="text" value="<?=$std_regular_price;?>" id="std_regular_price" name="std_regular_price">
								</div>
								<label for="example-text-input" class="col-sm-2 col-form-label">4 Bed Standard price</label>
								<div class="col-sm-2">
									<input class="form-control" placeholder="Bed Prices" type="text" value="<?=$std_per_bed_price?>" name="std_per_bed_price" id="std_per_bed_price">
								</div>
							</div>
							<div class="form-group row">
								<label for="example-text-input" class="col-sm-2 col-form-label">Premium Final Price</label>
								<div class="col-sm-2">
									<input class="form-control" placeholder="premium Final Price" type="text" value="<?=$prm_final_price;?>" id="prm_final_price" name="prm_final_price">
								</div>
								<label for="example-text-input" class="col-sm-2 col-form-label">Premium Regular Price</label>
								<div class="col-sm-2">
									<input class="form-control" placeholder="premium Regular Price" type="text" value="<?=$prm_regular_price;?>" id="prm_regular_price" name="prm_regular_price">
								</div>
								<label for="example-text-input" class="col-sm-2 col-form-label">4 Bed Premium price</label>
								<div class="col-sm-2">
									<input class="form-control" placeholder="Bed Prices" type="text" value="<?=$prm_per_bed_price?>" name="prm_per_bed_price" id="prm_per_bed_price">
								</div>
							</div>
							<!----------------------------Start Here Fields Table Add_On_price Data --------------------------->
							<!-- Fetched data of add_on_table -->
							<?php
							$psqry="Select * FROM add_on_price where pricing_id = '".$edID."' ";
							$run_psqry=$db->SelectQry($psqry,$con);	
							$psizecount = mysqli_num_rows($run_psqry);
							$seriesdetail =mysqli_fetch_assoc($run_psqry);
							?>
							<!-- End Here -->
							<div class="form-group row">
								<label for="example-text-input" class="col-sm-2 col-form-label">City</label>
								<input type="hidden" name="add_pricing_all_id[]" value="<?=$seriesdetail['ID']?>">
								<div class="col-sm-4">
									<select class="form-control" name="to_city_price[]" required>
										<option selected disbled>---Select City---</option>
										<?php
										$query1="select * from state where countryID = 81  order by ID desc "; 
										$run = mysqli_query($con,$query1);
										while($row2 = mysqli_fetch_assoc($run))
										{
											?> 
											<optgroup label="&nbsp;&nbsp;<?=$row2['name']?>" style="font-weight: bold;"></optgroup>
											<?php
											echo $query2 ="select * from city where countryID =81  and stateID ='".$row2['ID']."' order by ID desc "; 
											$run_2 = mysqli_query($con,$query2);
											while($row3 = mysqli_fetch_assoc($run_2))
											{
												?>
												<option value="<?=$row3['ID']?>" <?=($seriesdetail['city'] ==$row3['ID'])?'selected':''?>><?=ucwords($row3['name'])?></option>
											<?php  }
										}
										?>
									</select>
								</div>
								<label for="example-text-input" class="col-sm-2 col-form-label">Price</label>
								<div class="col-md-3">
									<input type="text" name="price_from_to[]" class="form-control" value="<?=$seriesdetail['price']?>" placeholder="Enter Price">
								</div>
								<div class="col-md-1" id="add_more_price">
									<button type="button" style="border-radius: 50%;font-size: 28px;color: #eef5ee;background: #65a061;margin-top: -48%;border: none;" id="add_price_member_based" class="fa fa-plus" aria-hidden="true"></button>
								</div>
							</div>
							<?php 
							$decrement = 2;
							while($seriesdetail =mysqli_fetch_assoc($run_psqry))
							{
								?>
								<div class="remove_field_member_price<?=$decrement?>">
									<div class="form-group row">
										<input type="hidden" name="add_pricing_all_id[]" value="<?=$seriesdetail['ID']?>">
										<label for="example-text-input" class="col-sm-2 col-form-label">City</label>
										<div class="col-sm-4">
											<select class="form-control" name="to_city_price[]" required>
												<option selected disbled>---Select City---</option>
												<?php
												$query1="select * from state where countryID = 81  order by ID desc "; 
												$run = mysqli_query($con,$query1);
												while($row2 = mysqli_fetch_assoc($run))
												{
													?> 
													<optgroup label="&nbsp;&nbsp;<?=$row2['name']?>" style="font-weight: bold;"></optgroup>
													<?php
													$query2 ="select * from city where countryID =81  and stateID ='".$row2['ID']."' order by ID desc "; 
													$run_2 = mysqli_query($con,$query2);
													while($row3 = mysqli_fetch_assoc($run_2))
													{
														?>
														<option value="<?=$row3['ID']?>" <?=($seriesdetail['city'] ==$row3['ID'])?'selected':''?>><?=ucwords($row3['name'])?></option>
													<?php  }
												}
												?>
											</select>
										</div>
										<label for="example-text-input" class="col-sm-2 col-form-label">Price</label>
										<div class="col-md-3">
											<input type="text" name="price_from_to[]" class="form-control" value="<?=$seriesdetail['price']?>" placeholder="Enter Price">
										</div>
										<div class="col-md-1">
											<button type="button" class="fa fa-minus" aria-hidden="true" style="border-radius: 50%;font-size: 29px;color: #eef5ee; background: #f13e5f;border: none;" onclick="remove_member_price(<?=$decrement; ?>)"></button>
										</div>
									</div>
								</div>
								<?php $decrement++; } ?>
								<div id="more_field_member_based_price"></div>
								<!--End Here Fields Table Add_On_price Data -->
								<div class="form-group row">
									<label for="example-text-input" class="col-sm-2 col-form-label">Description</label>
									<div class="col-sm-10">
										<textarea class="form-control" name="narration" placeholder="Narration" ><?=$narration;?></textarea>
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
				<table id="example" class="table table-bordered table-hover display nowrap margin-top-10 table-responsive">
					<thead >
						<tr >
							<th>Package Name</th>
							<th>Luxury Price</th>
							<th>Standard Price</th>
							<th>Premium Price</th>
							<th>Description</th>
							<th>Active</th>
							<th>Action</th>
						</tr>
					</thead>
					<tbody>
						<?php
						for($i=0;$i<count($all_data);$i++)
						{
							?>
							<tr>
								<td><?php 
								$data_pkg="select name from package where ID='".$all_data[$i]["packageID"]."' "; 
								$pkg_run =mysqli_query($con,$data_pkg);
								$fetch_pkg = mysqli_fetch_assoc($pkg_run);
								echo $fetch_pkg['name'];
								?>
							</td>
							<td><?=$all_data[$i]["lux_final_price"]?></td>
							<td><?=$all_data[$i]["std_final_price"]?></td>
							<td><?=$all_data[$i]["prm_final_price"]?></td>
							<td><?=$all_data[$i]["narration"]?></td>
							<td><?php 
							if($all_data[$i]["active"]==1)
							{
								echo '<img height="15" width="15" src="uploads/images/yes.png">';
							}else{
								echo '<img height="15" width="15" src="uploads/images/cross.png">';
							}
							$all_data[$i]["active"]?></td>
							<td><a href="?route=<?=$PageRoute?>&ed=<?=$all_data[$i]["ID"];?>" class="btn btn-success">Edit</a>
								<a href="?route=<?=$PageRoute?>&del=<?=$all_data[$i]["ID"];?>" class="btn btn-danger">Delete</a>
							</td>
						</tr>
					<?php } ?>
				</tbody>
				<tfoot>
					<tr>
						<th>Package Name</th>
						<th>Hotel Type</th>
						<th>Regular Price</th>
						<th>Final Price</th>
						<th>Description</th>
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
</body>
</html>
<script type="text/javascript">
	function getCategory(val) {
		$.ajax({
			type: "POST",
			url: "model/gertResult.php",
			data:'catID='+val,
			success: function(data){
   // alert(data);
   $("#subcategory").html(data);
   // getCity();
}
});
	}

	function getpackage(a) {
		$.ajax({
			type: "POST",
			url: "model/gertResult.php",
			data:'packageID='+a,
			success: function(data){
				/*alert(data);*/
				$("#package_name").html(data);
   // getCity();
}
});
	}

	/*----------------Add more prices for members count add on-------------------*/
	var remove;
	var p_srNo=2;
	$('#add_price_member_based').click(function()
	{
		if (p_srNo >= 20) 
		{
			$("#add_price_member_based").attr("disabled", "disabled");   
		}

		$("#more_field_member_based_price").append('<div class="remove_field_member_price'+p_srNo+'"><div class="form-group row"><label for="example-text-input" class="col-sm-2 col-form-label">City</label><div class="col-sm-4"><select class="form-control" name="to_city_price[]" required><option selected disabled>---Select City---</option><?php $query1="select * from state where countryID = 81 order by ID desc "; $run = mysqli_query($con,$query1);while($row2 = mysqli_fetch_assoc($run)){?> <optgroup label="&nbsp;&nbsp;<?=$row2['name']?>"style="font-weight: bold;"></optgroup><?php $query2 ="select * from city where countryID =81  and stateID ='".$row2['ID']."' order by ID desc "; $run_2 = mysqli_query($con,$query2);while($row3 = mysqli_fetch_assoc($run_2)){ ?><option value="<?=$row3['ID']?>"><?=$row3['name']?></option><?php }}?></select></div><label for="example-text-input" class="col-sm-2 col-form-label">Price</label><div class="col-md-3"><input type="text" name="price_from_to[]" class="form-control" placeholder="Enter Price"></div><div class="col-md-1"><button type="button" class="fa fa-minus" aria-hidden="true" style="border-radius: 50%;font-size: 29px;color: #eef5ee; background: #f13e5f;border: none;" onclick="remove_member_price('+p_srNo+')"></button></div></div></div>');p_srNo++;
	});

	function remove_member_price(id) 
	{
		alert(id);
		$('.remove_field_member_price'+id).remove();
		p_srNo--;
		$('#add_price_member_based').prop('disabled', false);
		/*document.getElementById("add_more").disabled = false;*/
	}

</script>