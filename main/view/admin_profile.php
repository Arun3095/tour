<?php
$db=new dbclass();
$con=$db->Connection();
$edID=isset($_REQUEST["ed"])?$_REQUEST["ed"]:"";
$delID=isset($_REQUEST["del"])?$_REQUEST["del"]:"";
if($SesUserType==1)
{

	$userID   	 = mt_rand(1000000,9999999);
	$f_name 		 =isset($_REQUEST["f_name"])?$_REQUEST["f_name"]:"";
	$l_name 		 =isset($_REQUEST["l_name"])?$_REQUEST["l_name"]:"";
	$name 	  	 =isset($_REQUEST["name"])?$_REQUEST["name"]:"";
	$email         =isset($_REQUEST["email"])?$_REQUEST["email"]:"";
	$password      =isset($_REQUEST["password"])?$_REQUEST["password"]:"";
	$phone  		 =isset($_REQUEST["phone"])?$_REQUEST["phone"]:"";
	$city 	  	 =isset($_REQUEST["city"])?$_REQUEST["city"]:"";
	$country    	 =isset($_REQUEST["country"])?$_REQUEST["country"]:"";
	$address    	 =isset($_REQUEST["address"])?$_REQUEST["address"]:"";
	$fb_link    	 =isset($_REQUEST["fb_link"])?$_REQUEST["fb_link"]:"";
	$twitter_link  =isset($_REQUEST["twitter_link"])?$_REQUEST["twitter_link"]:"";
	$linkedin_link =isset($_REQUEST["linkedin_link"])?$_REQUEST["linkedin_link"]:"";
	$instagram_link=isset($_REQUEST["instagram_link"])?$_REQUEST["instagram_link"]:"";
	$Image   		 =empty($Image)?"abc.png":$Image;
	$dataset 		 =json_encode($_REQUEST);
	$Image 		 =isset($_REQUEST["old_admin_image"])?$_REQUEST["old_admin_image"]:"";
	$status 		 =isset($_REQUEST["status"])?$_REQUEST["status"]:"";

	if(isset($_REQUEST["submit"]))
	{
		if($status=='on')
		{ 
			$status=1;
		}
		else
		{
			$status=0;
		}

		$ImgArr=explode('.',basename($_FILES['adminImage']['name']));
		if($_FILES['adminImage']['name']!="" )
		{

			if(file_exists("uploads/admin/".$Image))
			{
				unlink("uploads/admin/".$Image);
			}
			$Image=time().'adminImage'.rand().'.'.end($ImgArr);
			$UploadDir="uploads/admin/".$Image;
			move_uploaded_file($_FILES['adminImage']['tmp_name'],$UploadDir);
		}
		
		
		
		if($email!= "")
		{
			$ID=empty($edID)?GUID():$edID;
			$selectQry="select ID from users where ID='".$ID."' ";

			$checkinsup=mysqli_num_rows($db->TransQry($selectQry,$con));
			if($checkinsup==1)
			{
				$qry="update users set userID='".$userID."',name='".$name."',email='".$email."',password='".$password."',phone ='".$phone."',city ='".$city ."',country='".$country."',address = '".$address."',fb_link = '".$fb_link."',twitter_link = '".$twitter_link."',linkedin_link = '".$linkedin_link."',instagram_link = '".$instagram_link."',image='".$Image."',active='".$status."',localIP ='".$_SERVER["REMOTE_ADDR"]."', dataset='".$dataset."' where ID='".$edID."' and type = '1' ";
			}
			else if($checkinsup==0)
			{
				$sel = "select * from users where email = '".$email."' and type = '1'  ";
				$run1	= mysqli_query($con,$sel);
				$count 	= mysqli_num_rows($run1);
				if ($count > 0)
				{
					?>
					<script>
						alert("Admin is Allready Exist");
					</script>
					<?php
					echo '<meta http-equiv="refresh" content="1;URL=?route='.$PageRoute.'" />';
				}

				else
				{
					 $qry="insert into users(userID,name,email,phone,password,address,image,fb_link,twitter_link,linkedin_link,instagram_link,type,active,e_date,localIP)
					values('".$userID."','".$name."','".$email."','".$phone."','".$password."','".$address."','".$Image."','".$fb_link."','".$twitter_link."','".$linkedin_link."','".$instagram_link."','1','1',NOW(),'".$_SERVER["REMOTE_ADDR"]."')"; 

				}
			}

			$res=$db->TransQry($qry,$con);
			if($res)
			{

				$msg="Admin Detail Save Successfully";
				echo '<meta http-equiv="refresh" content="1;URL=?route='.$PageRoute.'" />';

			}
			else
			{
				$msg="Error in saving";
			// echo '<meta http-equiv="refresh" content="1;URL=?route='.$PageRoute.'" />';
			}

		}
		else
		{
			$msg="please enter mandatory field";
		}
	  // }
	} 
}

/* Edit Admin Detail */
$qry="Select * FROM users where ID = '$edID'";
$res=$db->SelectQry($qry,$con);
$Rows2 = mysqli_num_rows($res);	
if($Rows2 >0)	
{ 	
	
	$fetch1 =mysqli_fetch_assoc($res);  	
	
	$ID 			    = $fetch1["ID"];
	$f_name 		    = $fetch1["f_name"];
	$l_name 		    = $fetch1["l_name"];
	$name 		    = $fetch1["name"];
	$email		    = $fetch1["email"];
	$password        = $fetch1["password"];
	$phone		    = $fetch1["phone"];
	$city      	    = $fetch1["city"];
	$address   	    = $fetch1["address"];
	$fb_link   	    = $fetch1["fb_link"];
	$twitter_link    = $fetch1["twitter_link"];
	$linkedin_link   = $fetch1["linkedin_link"];
	$instagram_link  = $fetch1["instagram_link"];
	$pin_code    	= $fetch1["pin_code"];
	$image    		= $fetch1["image"];
	$status    		= $fetch1["active"];
	
}

//view All UserRecords 
$qry="Select * FROM users where type = '1' order by ID ASC ";
$res=$db->SelectQry($qry,$con);
$Rows2 = mysqli_num_rows($res);
$all_users=array();	
if($Rows2 >0)	
{ 	
	$i=0;  	
	while($get_allcat =mysqli_fetch_assoc($res))  	
	{		  

		$all_users[$i++]=$get_allcat;

	}	
}

/* delete record query */
if(isset($delID) and $delID!=''){
	$delqry = mysqli_query($con, "DELETE FROM users WHERE ID='".$delID."'"); 
	?>
	<script>alert('Are You Sure You Want To Delete');</script>
	<?php
	$msg="Delete Successfully";
	echo '<meta http-equiv="refresh" content="2;URL=?route='.$PageRoute.'" />';
}

$StatusArr=array("","");
$StatusArr[$status]='checked="checked" ';
unset($db);
?>
<style>
	#loader{height:20px;}
</style>
<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<section class="content-header">
		<h1>
			Admin Information
		</h1>
		<ol class="breadcrumb">
			<li class="breadcrumb-item"><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
			<li class="breadcrumb-item"><a href="#">Profile</a></li>
			<li class="breadcrumb-item active">Admin</li>
		</ol>
	</section>

	<!-- Main content -->
	<section class="content">

		<!-- Basic Forms -->
		<div class="box box-default">
			<div class="box-header with-border">
				<h3 class="box-title">Admin Profile</h3>

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
								<label for="example-text-input" class="col-sm-2 col-form-label">Admin Name</label>
								<div class="col-sm-10">
									<input class="form-control" placeholder="Admin Name" type="text" id="name" name="name" value="<?=$name;?>" required>
								</div>
							</div>


							<div class="form-group row">
								<label for="example-text-input" class="col-sm-2 col-form-label">Admin Email </label>
								<div class="col-sm-10">
									<input class="form-control" placeholder="Email " type="text" value="<?=$email;?>" id="email" name="email">
								</div>
							</div>

							<div class="form-group row">
								<label for="example-text-input" class="col-sm-2 col-form-label">Password </label>
								<div class="col-sm-10">
									<input class="form-control" placeholder="password " type="password" value="<?=$password;?>" id="password" name="password">
								</div>
							</div>

							<div class="form-group row">
								<label for="example-text-input" class="col-sm-2 col-form-label">Admin Phone </label>
								<div class="col-sm-10">
									<input class="form-control" placeholder="Phone" type="text" value="<?=$phone;?>" id="phone" name="phone" maxlength='10'>
								</div>
							</div>

							<div class="form-group row">
								<label for="example-text-input" class="col-sm-2 col-form-label">Address </label>
								<div class="col-sm-10">
									<input class="form-control" placeholder="Address" type="text" value="<?=$address;?>" id="couponaddress_limit" name="address">
								</div>
							</div>

							<div class="form-group row">
								<label for="example-text-input" class="col-sm-2 col-form-label">Facebook Social Url </label>
								<div class="col-sm-10">
									<input class="form-control" placeholder="Enter Fb link" type="text" value="<?=
									$fb_link;?>" id="fb_link" name="fb_link">
								</div>
							</div>

							<div class="form-group row">
								<label for="example-text-input" class="col-sm-2 col-form-label">Twitter Social Url </label>
								<div class="col-sm-10">
									<input class="form-control" placeholder="Enter Twitter link" type="text" value="<?=$twitter_link;?>" id="twitter_link" name="twitter_link">
								</div>
							</div>

							<div class="form-group row">
								<label for="example-text-input" class="col-sm-2 col-form-label"> Linkedin Social Url </label>
								<div class="col-sm-10">
									<input class="form-control" placeholder="Enter Linkedin link" type="text" value="<?=$linkedin_link;?>" id="linkedin_link" name="linkedin_link">
								</div>
							</div>

							<div class="form-group row">
								<label for="example-text-input" class="col-sm-2 col-form-label"> Instagram Social Url </label>
								<div class="col-sm-10">
									<input class="form-control" placeholder="Enter Instagram link" type="text" value="<?=$instagram_link;?>" id="instagram_link" name="instagram_link">
								</div>
							</div>

							<div class="form-group row">
								<label for="example-text-input" class="col-sm-2 col-form-label">Admin Logo</label>
								<div class="col-sm-10">
									<input class="" type="file" value="" id="admin_image" name="adminImage">
									<input type="hidden" name="old_admin_image" id="old_admin_image" value="<?=$image?>">
									<?php if(isset($edID) and $edID!=''){ ?>
										<img src="uploads/admin/<?=$image?>" height='70'>
									<?php } ?>
									<div style="color:red" id="error1"></div>
								</div>
							</div>

							<div class="form-group row">
								<label for="example-text-input" class="col-sm-2 col-form-label">Active</label>
								<div class="col-sm-10">
									<input type="checkbox" id="status" name="status" class="filled-in chk-col-green" checked >

									<label for="status"></label>
								</div>
							</div>


							<div class="form-group row">
								<div class="col-sm-8">
									<input style="font-size: 18px;width: 7em;" class="btn btn-primary" type="submit" value="SUBMIT" id="submit" name="submit">
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
				<thead>
					<tr>
						<th>Admin ID</th>
						<th>Name</th>
						<th>Email</th>
						<th>Phone</th>
						<th>Image</th>
						<th>Address</th>
						<th>Active</th>
						<th>Action</th>
					</tr>
				</thead>
				<tbody>
					<?php
					for($i=0;$i<count($all_users);$i++)
					{
						?>
						<tr>
							<td><?=$all_users[$i]["userID"]?></td>
							<td><?=$all_users[$i]["name"]?></td>
							<td><?=$all_users[$i]["email"]?></td>
							<td><?=$all_users[$i]["phone"]?></td>
							<td><img height="40" width="80" src="uploads/admin/<?=$all_users[$i]["image"]?>"></td>
							<td><?=$all_users[$i]["address"]?></td>
							<td><?php 
							if($all_users[$i]["active"]==1)
							{
								echo '<img height="15" width="15" src="uploads/images/yes.png">';
							}else{
								echo '<img height="15" width="15" src="uploads/images/cross.png">';
							}
							$all_users[$i]["active"]?></td>
							<td><a href="?route=<?=$PageRoute?>&ed=<?=$all_users[$i]["ID"];?>" class="btn btn-success">Edit</a><a href="?route=<?=$PageRoute?>&del=<?=$all_users[$i]["ID"];?>" class="btn btn-danger">Delete</a></td>

						</tr>
					<?php } ?>
					
				</tbody>
				<tfoot>
					<tr>
						<th>Admin ID</th>
						<th>Admin Name</th>
						<th>Email</th>
						<th>Phone</th>
						<th>Image</th>
						<th>Address</th>
						<th>Active</th>
						<th>Action</th>
						
					</tr>
				</tfoot>
			</table>


		</div>

	</section>
	<!-- /.content -->
</div>

</section>
<!-- /.content -->
</div>

</body>

</html>

<script type="text/javascript">
	/* Image validation */
	var a=0;
//binds to onchange event of your input field
$('#admin_image').bind('change', function() {

	var ext = $('#admin_image').val().split('.').pop().toLowerCase();
	if ($.inArray(ext, ['png','jpg','jpeg']) == -1){

		$('#error1').html("Invalid Image Format! Image Format Must Be PNG, JPG or JPEG.");
		$('#error1').slideDown("slow");
		this.value = '';

		a=0;
	}else{
		$('#error1').slideUp("slow");
		var picsize = (this.files[0].size);
		if (picsize > 1000000){

			$('#error1').html("file size must be below 1mb");
			$('#error1').slideDown("slow");
			this.value = '';
			a=0;
		}else{
			a=1;
			$('#error1').slideUp("slow");
		}
		if (a==1){
			$('input:submit').attr('disabled',false);
		}
	}
});
</script>