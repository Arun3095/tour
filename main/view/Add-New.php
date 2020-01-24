<?php
$db=new dbclass();
$con=$db->Connection();
$edID=isset($_REQUEST["ed"])?$_REQUEST["ed"]:"";
if($SesUserType==1)
{
	$username=isset($_REQUEST["username"])?$_REQUEST["username"]:"";
	$fname=isset($_REQUEST["fname"])?$_REQUEST["fname"]:"";
	$lname=isset($_REQUEST["lname"])?$_REQUEST["lname"]:"";
	$email=isset($_REQUEST["email"])?$_REQUEST["email"]:"";
	$mobile=isset($_REQUEST["mobile"])?$_REQUEST["mobile"]:"";
	$password=isset($_REQUEST["password"])?$_REQUEST["password"]:"";
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
	 
		
	   
		if($username!= "" and $email!= "" and $mobile!= "" and $password!= "")
		{
			
		  $userID=empty($edID)?GUID():$edID;
		 
		  $selectQry="select userID from users where userID='".$userID."' ";
		
		  $checkinsup=mysqli_num_rows($db->TransQry($selectQry,$con));
		  if($checkinsup==1)
		  {
			echo $qry="update users set f_name='".$fname."',l_name='".$lname."',name='".$username."',email='".$email."',phone='".$mobile."',active='".$active."',u_date=NOW(),dataset='".$dataset."' where userID='".$userID."'";
		  }
		  else if($checkinsup==0)
		  {
			 echo $qry="insert into users set userID='".$userID."',f_name='".$fname."',l_name='".$lname."',name='".$username."',email='".$email."',phone='".$mobile."',active='".$active."',e_date=NOW(),dataset='".$dataset."' ";
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
		  $msg="Please Enter in Required Field";
		}
	  // }
	  }
}
$qry="Select * FROM users order by e_date DESC;";
	$res=$db->SelectQry($qry,$con);	
	$Rows2 = mysqli_num_rows($res);	
	$usr=array();	
	if($Rows2 >0)	
	{ 	
		$i=0;  	
		while($get_usr =mysqli_fetch_assoc($res))   	
		{		  
			if($edID==$get_usr["userID"])
			{
				 $uname = $get_usr["name"];
				 $fname = $get_usr["f_name"];
				 $lname = $get_usr["l_name"];
				 $email = $get_usr["email"];
				 $m = $get_usr["phone"];
				 
			}
			$usr[$i++]=$get_allcat;
  		
		}	
	}
$StatusArr=array("","");
$StatusArr[$active]='checked="checked" ';
unset($db);
?>
<style>
.err{color:RED;font-weight:600;}
</style>
<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>Add New User</h1>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="breadcrumb-item"><a href="#">All User</a></li>
        <li class="breadcrumb-item active">New User</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
     
     <!-- Basic Forms -->
      <div class="box box-default">
        <div class="box-header with-border">
          <h3 class="box-title">Add New User</h3>

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
				  <label for="example-text-input" class="col-sm-2 col-form-label">Username <span class="err">*</span></label>
				  <div class="col-sm-10">
					<input class="form-control" placeholder="Username" type="text" value="<?=$uname;?>" id="username" name="username">
				  </div>
				</div>
				<div class="form-group row">
				  <label for="example-text-input" class="col-sm-2 col-form-label">First Name <span class="err">*</span></label>
				  <div class="col-sm-10">
					<input class="form-control" placeholder="First Name" type="text" value="<?=$fname;?>" id="fname" name="fname">
				  </div>
				</div>
				<div class="form-group row">
				  <label for="example-text-input" class="col-sm-2 col-form-label">Last Name <span class="err">*</span></label>
				  <div class="col-sm-10">
					<input class="form-control" placeholder="Last Name" type="text" value="<?=$lname;?>" id="lname" name="lname">
				  </div>
				</div>
				<div class="form-group row">
				  <label for="example-text-input" class="col-sm-2 col-form-label">Email <span class="err">*</span></label>
				  <div class="col-sm-10">
					<input class="form-control" placeholder="Email" type="text" value="<?=$email;?>" id="email" name="email">
				  </div>
				</div>
				<div class="form-group row">
				  <label for="example-text-input" class="col-sm-2 col-form-label">Mobile <span class="err">*</span></label>
				  <div class="col-sm-10">
					<input class="form-control" placeholder="Mobile" type="text" value="<?=$mobile;?>" id="mobile" name="mobile">
				  </div>
				</div>
				<div class="form-group row">
				  <label for="example-text-input" class="col-sm-2 col-form-label">Password <span class="err">*</span></label>
				  <div class="col-sm-10">
					<input class="form-control" placeholder="Password" type="password" value="<?=$password;?>" id="password" name="password">
				  </div>
				</div>
				
				<!--<div class="form-group row">
				  <label for="example-text-input" class="col-sm-2 col-form-label">Profile Image</label>
				  <div class="col-sm-10">
					<input class="" type="file" value="" id="cat_image" name="catImage">
					<input type="hidden" name="old_cat_image" id="old_cat_image" value="<?=$image?>">
					 <?php if(isset($edID) and $edID!=''){ ?>
                        <img src="uploads/category/<?=$image?>" height='70'>
                      <?php } ?>
				  </div>
				</div>-->
				
				
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

      
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  
  
	
</body>

</html>
<script type="text/javascript">

/* $("#p_cat").load("model/DropDownLoad.php?SelectedVal=<?php echo $parantID;?>&Status=0",function(e){
       $('#p_cat').select2();
	   alert("hie");
    }); */
</script>
