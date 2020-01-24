<?php
$db=new dbclass();
$con=$db->Connection();
$edID=isset($_REQUEST["ed"])?$_REQUEST["ed"]:"";
$del=isset($_REQUEST["del"])?$_REQUEST["del"]:"";
if($SesUserType==1)
{
	
	$type=isset($_REQUEST["type"])?$_REQUEST["type"]:"";
	$name=isset($_REQUEST["name"])?$_REQUEST["name"]:"";
	
	// $narration=isset($_REQUEST["narration"])?$_REQUEST["narration"]:"";
	$narration=mysqli_real_escape_string($con,$_REQUEST["narration"]);
	// $off_price=isset($_REQUEST["off_price"])?$_REQUEST["off_price"]:"";
	$off_price=mysqli_real_escape_string($con,$_REQUEST["off_price"]);
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
		/*  $check_exist="select rentID from category where name='".$pack_name."'";
		    $check_exist=mysqli_num_rows($db->TransQry($check_exist,$con));
		    if($check_exist>0)
		  {
			  $msg="$pack_name Already Exist";
			 // echo '<meta http-equiv="refresh" content="2;URL=?route='.$PageRoute.'" />';
		  }
		else{ */  
		$ImgArr=explode('.',basename($_FILES['image']['name']));
		if($_FILES['image']['name']!="" )
	  {
		 
		if(file_exists("uploads/rent/".$Image))
		{
		  unlink("uploads/rent/".$Image);
		}
	    $Image=time().'image'.rand().'.'.end($ImgArr);
		$UploadDir="uploads/rent/".$Image;
		move_uploaded_file($_FILES['image']['tmp_name'],$UploadDir);
	  }
	   
		if($Image!= "")
		{
			
		  $selectQry="select ID from  onrent where ID='".$edID."' ";
		  $checkinsup=mysqli_num_rows($db->TransQry($selectQry,$con));
		  if($checkinsup==1)
		  {
			 $qry="update  onrent set type='".$type."',name='".$name."',image='".$Image."',Narration='".$narration."',off_price='".$off_price."',active='".$active."',e_date='".$E_Date."' where rentID='".$edID."'";
		  }
		  else if($checkinsup==0)
		  {
			 $qry="insert into  onrent set rentID='".$rentID."',type='".$type."',name='".$name."',image='".$Image."',Narration='".$narration."',off_price='".$off_price."',active='".$active."',e_date='".$E_Date."'";
			
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
		  $msg="Please Enter Image";
		}
	  // }
	  }
}
/* Get All Activated category */
$qry="Select * FROM onrent where active='1' order by ID DESC;";
	$res=$db->SelectQry($qry,$con);	
	$Rows2 = mysqli_num_rows($res);	
	$data=array();	
	if($Rows2 >0)	
	{ 	
		$i=0;  	
		while($get_cat =mysqli_fetch_assoc($res))   	
		{		       			
			$data[$i++]=$get_cat;  	
		}	
	}
	/* Get All category */
	$qry="Select * FROM onrent order by e_date DESC;";
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
				 $type = $get_allcat["type"];
				 $name = $get_allcat["name"];
				 $image = $get_allcat["image"];
				 $off_price = $get_allcat["off_price"];
				 $p_price = $get_allcat["p_price"];
				 $narration = $get_allcat["Narration"];
			}
		$all_cat[$i++]=$get_allcat;
  		
		}	
	}

	/* delete record query */
if(isset($del) and $del!='')
{
	$query_del= mysqli_query($con,"SELECT * FROM  onrent WHERE ID= '".$del."' ");
	  $row_del  = mysqli_fetch_array($query_del);
	  $Image= $row_del['image'];
	  unlink("uploads/rent/".$Image);

	  $delqry = mysqli_query($con, "DELETE FROM onrent WHERE ID='".$del."'"); 
	  $msg="Delete Successfully";
	 echo '<meta http-equiv="refresh" content="1;URL=?route='.$PageRoute.'" />';
}


$StatusArr=array("","");
$StatusArr[$active]='checked="checked" ';
unset($db);
?>
<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
      Add Wheeler on Rent
      </h1>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="breadcrumb-item"><a href="#">Forms</a></li>
        <li class="breadcrumb-item active">Add Wheeler on Rent</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
     
     <!-- Basic Forms -->
      <div class="box box-default">
        <div class="box-header with-border">
          <h3 class="box-title">Add Wheeler on Rent</h3>

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
				  <label for="example-text-input" class="col-sm-2 col-form-label">Wheeler Type</label>
				  <div class="col-sm-10">
					<select class="form-control select2" data-placeholder="Select Vehicle" name="type" id="type">
                  <option value="0">Select Vehicle</option>
                  <option value="1"<?php if($type ==1) { echo 'selected'; } ?>>CAR</option>
                  <option value="2"<?php if($type ==2) { echo 'selected'; } ?>>BIKE</option>
				
                </select>
				  </div>
				</div>
				
				
				<div class="form-group row">
				  <label for="example-text-input" class="col-sm-2 col-form-label">Wheeler Name</label>
				  <div class="col-sm-10">
					<input class="form-control" placeholder="Wheeler Name" type="text" value="<?=$name;?>" id="name" name="name">
				  </div>
				</div>
				
				<div class="form-group row">
				  <label for="example-text-input" class="col-sm-2 col-form-label">Description</label>
				  <div class="col-sm-10">
				  <textarea class="form-control" name="narration" placeholder="Narration" ><?=$narration;?></textarea>
					
				  </div>
				</div>

				<div class="form-group row">
				  <label for="example-text-input" class="col-sm-2 col-form-label">Season Off Description</label>
				  <div class="col-sm-10">
				  <textarea class="form-control" name="off_price" placeholder="Off price" ><?=$off_price;?></textarea>
					
				  </div>
				</div>
				
				<div class="form-group row">
				  <label for="example-text-input" class="col-sm-2 col-form-label">Image</label>
				  <div class="col-sm-10">
					<input class="" type="file" value="" id="image" name="image">
					<input type="hidden" name="old_cat_image" id="old_cat_image" value="<?=$image?>">
					 <?php if(isset($edID) and $edID!=''){ ?>
                        <img src="uploads/rent/<?=$image?>" height='70'>
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
              <table id="example" class="table table-bordered table-hover display nowrap margin-top-10 table-responsive">
				<thead>
					<tr>
						
						<th>Vehicle Name</th>
						<th>Vehicle Image</th>
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
						
						<td><?=$all_cat[$i]["name"]?></td>
						<td><img height="40" width="80" src="uploads/rent/<?=$all_cat[$i]["image"]?>"></td>
						
						<td><?php 
						if($all_cat[$i]["active"]==1)
						{
							echo '<img height="15" width="15" src="uploads/images/yes.png">';
						}else{
							echo '<img height="15" width="15" src="uploads/images/cross.png">';
						}
						$all_cat[$i]["active"]?></td>
						
						<td><a href="?route=<?=$PageRoute?>&ed=<?=$all_cat[$i]["ID"];?>" class="btn btn-success">Edit</a>
						<a href="?route=<?=$PageRoute?>&del=<?=$all_cat[$i]["ID"];?>" class="btn btn-danger">Delete</a>
						</td>
						
					</tr>
				<?php } ?>
					
				</tbody>
				<tfoot>
					<tr>
						<th>Vehicle Name</th>
						<th>Vehicle Image</th>
						
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

/* $("#p_cat").load("model/DropDownLoad.php?SelectedVal=<?php echo $parantID;?>&Status=0",function(e){
       $('#p_cat').select2();
	   alert("hie");
    }); */
</script>
