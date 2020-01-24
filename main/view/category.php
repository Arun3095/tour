	<?php
	$db=new dbclass();
	$con=$db->Connection();
	$edID=isset($_REQUEST["ed"])?$_REQUEST["ed"]:"";
	$del=isset($_REQUEST["del"])?$_REQUEST["del"]:"";
	$parantID=isset($_REQUEST["p_cat"])?$_REQUEST["p_cat"]:"";
	if($SesUserType==1)
	{
		$cat_name1=isset($_REQUEST["cat_name"])?$_REQUEST["cat_name"]:"";
		$slug=create_slug($cat_name1);
		$cat_name = strtolower($cat_name1);
		$narration= mysqli_real_escape_string($con,$_REQUEST["narration"]);
		// $brand_package=isset($_REQUEST["brand"])?$_REQUEST["brand"]:"";
		$adventure_package=isset($_REQUEST["adventure_package"])?$_REQUEST["adventure_package"]:"";
		$most_popular=isset($_REQUEST["most_popular"])?$_REQUEST["most_popular"]:"";
		$active=isset($_REQUEST["active"])?$_REQUEST["active"]:"";
		
		$Image=empty($Image)?"abc.png":$Image;
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

			if($adventure_package=='on')
			{ 
				$adventure_package=1;
			}
			else
			{
				$adventure_package=0;
			}
			if($most_popular=='on')
			{ 
				$most_popular=1;
			}
			else
			{
				$most_popular=0;
			}
			/*  $check_exist="select categoryID from category where name='".$cat_name."'";
			    $check_exist=mysqli_num_rows($db->TransQry($check_exist,$con));
			    if($check_exist>0)
			  {
				  $msg="$cat_name Already Exist";
				 // echo '<meta http-equiv="refresh" content="2;URL=?route='.$PageRoute.'" />';
			  }
			  else{ */  
			  	$ImgArr=explode('.',basename($_FILES['catImage']['name']));
			  	if($_FILES['catImage']['name']!="" )
			  	{

			  		if(file_exists("uploads/category/".$Image))
			  		{
			  			unlink("uploads/category/".$Image);
			  		}
			  		$Image=time().'catImage'.rand().'.'.end($ImgArr);
			  		$UploadDir="uploads/category/".$Image;
			  		move_uploaded_file($_FILES['catImage']['tmp_name'],$UploadDir);
			  	}

			  	if($cat_name!= "")
			  	{


			  		$categoryID=empty($edID)?GUID():$edID;

			  		$selectQry="select ID from category where ID='".$edID."' ";

			  		$checkinsup=mysqli_num_rows($db->TransQry($selectQry,$con));
			  		if($checkinsup==1)
			  		{
			  			$qry="update category set parantID='".$parantID."',name='".$cat_name."',slug='".$slug."',narration='".$narration."',adventure_package='".$adventure_package."',most_popular='".$most_popular."',image='".$Image."',icon='".$Icon."',active='".$active."',u_date='".$E_Date."',dataset='".$dataset."' where ID='".$edID."'"; 
			  		}
			  		else if($checkinsup==0)
			  		{
			  			$qry="insert into category set parantID='".$parantID."',name='".$cat_name."',slug='".$slug."',narration='".$narration."',image='".$Image."',adventure_package='".$adventure_package."',most_popular='".$most_popular."',icon='".$Icon."',active='".$active."',e_date='".$E_Date."',dataset='".$dataset."' "; 
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
			  		$msg="Please Enter Category";
			  	}
		  // }
			  }
			}
			/* Get All Activated category */
			$qry="Select * FROM category where active='1' and parantID='0' order by ID ASC";
			$res=$db->SelectQry($qry,$con);	
			$Rows2 = mysqli_num_rows($res);	
			$category=array();	
			if($Rows2 >0)	
			{ 	
				$i=0;  	
				while($get_cat =mysqli_fetch_assoc($res))   	
				{		       			
					$category[$i++]=$get_cat;  	
				}	
			}

			/* Get All Activated category_1 */
			function brand_pacakage($parantID){
				$db=new dbclass();
				$con=$db->Connection();
				$qry="Select * FROM category where active='1' and parantID='".$parantID."' group by name ASC";
				$res_1=$db->SelectQry($qry,$con);	
				$Rows2 = mysqli_num_rows($res_1);	
				$category_1=array();	
				if($Rows2 >0)	
				{ 	
					$j=0;  	
					while($get_cat_1 =mysqli_fetch_assoc($res_1))   	
					{		       			
						$category_1[$j++]=$get_cat_1;
					}	
				}
				return $category_1;
			}
			/* Get All category */
			$qry="Select * FROM category where parantID!='' order by ID DESC";
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
						$catID = $get_allcat["ID"];
						$name = $get_allcat["name"];
						$image = $get_allcat["image"];
						$p_cat = $get_allcat["parantID"];
						$narration = $get_allcat["narration"];
						$adventure_package = $get_allcat["adventure_package"];
						$most_popular = $get_allcat["most_popular"];
					}
					$all_cat[$i++]=$get_allcat;
					
				}	
			}

			/*---------------------Mrked as Most Popular-------------------------*/
			if (isset($_REQUEST['most_popular_btn']))
			{
				
				if (isset($_REQUEST['mp_id'])) 
				{
					$block_user_Id =  implode(',', $_REQUEST['mp_id']);

					$block_query = "UPDATE category SET most_popular='1'  WHERE ID IN($block_user_Id)";
					$not_popular_query = "UPDATE category SET most_popular='0'  WHERE ID NOT IN($block_user_Id)";
					$update = mysqli_query($con, $block_query);
					mysqli_query($con, $not_popular_query);
					if ($update) { ?>
						<script>confirm('Are You Sure Want To Mark As Popular')</script>
						<?php
						$msg =  "Marked As Poular ";
						echo '<meta http-equiv="refresh" content="2;URL=?route='.$PageRoute.'" />';
					}
				}
				else if (empty($_REQUEST['mp_id'])) {
					$popular = "UPDATE category SET most_popular='0'";
					$update_1 = mysqli_query($con, $popular);
					if ($update_1) { ?>
						<script>confirm('You have Not Select Any One Marked As Popular')</script>
						<?php
						echo '<meta http-equiv="refresh" content="2;URL=?route='.$PageRoute.'" />';
					}
				}
				
			}

				/*if ($all_cat[0]['most_popular'] == 1) 
				{
					
					$block_query = "UPDATE category SET most_popular='0'  WHERE ID NOT IN($block_user_Id)";
					$block_query = "UPDATE category SET most_popular='0'  WHERE ID IN($block_user_Id)";
					$update =  mysqli_query($con, $block_query);
					if ($update) { ?>
						<script>confirm('Are You Sure Want To Mark As Not Popular')</script>
						<?php
						$msg =  " Not Marked As Poular ";
						echo '<meta http-equiv="refresh" content="2;URL=?route='.$PageRoute.'" />';
					}

				}
				else if($all_cat[0]['most_popular'] == 0)
				{
					
					$block_query = "UPDATE category SET most_popular='1'  WHERE ID IN($block_user_Id)";
					$update =  mysqli_query($con, $block_query);
					if ($update) { ?>
						<script>confirm('Are You Sure Want To Mark As Popular')</script>
						<?php
						$msg =  "Mark As Popular Successfully";
						echo '<meta http-equiv="refresh" content="2;URL=?route='.$PageRoute.'" />';
					}
				}*/



				/*----------------------------------End------------------------------*/

				/* delete record query */
				if(isset($del) and $del!='')
				{
					$query_del= mysqli_query($con,"SELECT * FROM  category WHERE ID= '".$del."' ");
					$row_del  = mysqli_fetch_array($query_del);
					$Image= $row_del['image'];
					unlink("uploads/category/".$Image);

					$delqry = mysqli_query($con, "DELETE FROM category WHERE ID='".$del."'"); 
					$msg="Delete Successfully";
					echo '<meta http-equiv="refresh" content="2;URL=?route=category" />';
				}



				$StatusArr=array("","");
				$StatusArr[$active]='checked="checked" ';
				unset($db);
				?>
				<script type="text/javascript">
					function brandpacakage(a)
					{
			    // alert(a);
			    $.ajax({
			    	url: "https://vridhisoftech.in/tour/main/view/subcategory.php",
			    	data: { brand:a },
			    	cache: false,
			    	type: "POST",
			    	success: function(data){
			    		/*alert(data);*/
			    		$('#brand_category_id').html(data);
			    	}
			    });
			}
		</script>
		<!-- Content Wrapper. Contains page content -->
		<div class="content-wrapper">
			<!-- Content Header (Page header) -->
			<section class="content-header">
			<h1>Add New Category</h1>
				<ol class="breadcrumb">
				   <li class="breadcrumb-item"><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
					<li class="breadcrumb-item"><a href="#">Forms</a></li>
					<li class="breadcrumb-item active">Category</li>
				</ol>
			</section>

			<!-- Main content -->
			<section class="content">

				<!-- Basic Forms -->
				<div class="box box-default">
					<div class="box-header with-border">
						<h3 class="box-title">Add Category</h3>

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
										<label for="example-text-input" class="col-sm-2 col-form-label">Select Parent Category</label>
										<div class="col-sm-10">
											<select class="form-control select2"  name="p_cat" id="p_cat" onchange="brandpacakage(this.value)">
												<option value="0">None</option>
												<?php
												for($i=0;$i<count($category);$i++)
												{
													?>
													<option value="<?=$category[$i]["ID"]?>" <?php if(isset($p_cat) and $p_cat==$category[$i]["ID"]){ ?> selected="selected" <?php } ?> ><?=$category[$i]["name"]?></option>
												<?php } ?>
											</select>
										</div>
									</div>

									<div class="form-group row">
										<label for="example-text-input" class="col-sm-2 col-form-label">Category Name</label>
										<div class="col-sm-10">
											<input class="form-control" placeholder="Category Name" type="text" value="<?=$name;?>" id="cat_name" name="cat_name">
										</div>
									</div>
									<div class="form-group row">
										<label for="example-text-input" class="col-sm-2 col-form-label">Category Image</label>
										<div class="col-sm-10">
											<input class="" type="file" value="" id="cat_image" name="catImage">
											<input type="hidden" name="old_cat_image" id="old_cat_image" value="<?=$image?>">
											<?php if(isset($edID) and $edID!=''){ ?>
												<img src="uploads/category/<?=$image?>" height='70'>
											<?php } ?>
										</div>
									</div>
									<div class="form-group row">
										<label for="example-text-input" class="col-sm-2 col-form-label">Description</label>
										<div class="col-sm-10">
											<textarea class="form-control" name="narration" placeholder="Narration" ><?=$narration;?></textarea>

										</div>
									</div>
									<div class="form-group row">
										<label for="example-text-input" class="col-sm-2 col-form-label">Adventure Package</label>
										<div class="col-sm-10">

											<input type="checkbox" id="adventure_package" name="adventure_package" class="filled-in chk-col-green" <?php if(isset($adventure_package) and $adventure_package>0){echo " checked=\"checked\"";}?> />
											<label for="adventure_package"></label>

										</div>
									</div>
									<div class="form-group row">
										<label for="example-text-input" class="col-sm-2 col-form-label">Most Popular</label>
										<div class="col-sm-10">
											<input type="checkbox" id="most_popular" name="most_popular" class="filled-in chk-col-green" <?php if(isset($most_popular) and $most_popular>0){echo " checked=\"checked\"";}?> />
											<label for="most_popular"></label>

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
									<th>Category Name</th>
									<th>SubCategory Name</th>
									<th>Category Image</th>
									<th>Most Popular</th>
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
										<td><?=$i+1; ?></td>
										<td><?php if($all_cat[$i]["ID"] == '1' || $all_cat[$i]["ID"]== '2' || $all_cat[$i]["ID"]== '3') { echo $all_cat[$i]["name"] ?>
										<?php } ?></td> 
										<td><?=$all_cat[$i]["name"]?></td>

										<td>
											<?php 
											if(isset($all_cat[$i]["image"]) and $all_cat[$i]["image"]!='')
											{
												?>
												<img height="40" width="80" src="uploads/category/<?=$all_cat[$i]["image"]?>"><?php } else{
													echo '<img height="15" width="15" src="uploads/images/cross.png">';
												} ?>
											</td>
											<td><input type="checkbox" class="filled-in chk-col-green" id="<?=$all_cat[$i]["ID"] ?>" value="<?=$all_cat[$i]["ID"] ?>" name="mp_id[]"  <?php if(isset($all_cat[$i]["most_popular"]) and $all_cat[$i]["most_popular"]>0){echo " checked=\"checked\"";}?> >
												<label for="<?=$all_cat[$i]["ID"] ?>" name='mp_id[]'></label>
											</td>
											<input type="hidden" name="varname_most_popular" value="<?=$all_cat[$i]["ID"] ?>">
											<td><?php 
											if($all_cat[$i]["active"]==1)
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
										<input type="submit" class="btn btn-success" name="most_popular_btn" value="Mark As Popular">
									</tr>
									<tr>
										<th>Sr .No</th>
										<th>Category Name</th>
										<th>SubCategory Name</th>
										<th>Category Image</th>
										<th>Most Popular</th>
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
			CKEDITOR.replace( 'narration' );
		</script>
