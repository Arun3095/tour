<?php
$db=new dbclass();
$con=$db->Connection();
$edID=isset($_REQUEST["ed"])?$_REQUEST["ed"]:"";
$delID=isset($_REQUEST["del"])?$_REQUEST["del"]:"";
if($SesUserType==1)
{

	$heading=isset($_REQUEST["heading"])?$_REQUEST["heading"]:"";
	$name=isset($_REQUEST["name"])?$_REQUEST["name"]:"";
	echo $description=mysqli_real_escape_string($con,$_REQUEST["description"]);
	$video_link=isset($_REQUEST["video_link"])?$_REQUEST["video_link"]:"";
	$Image=empty($Image)?"abc.png":$Image;
	$Image=isset($_REQUEST["oldimage"])?$_REQUEST["oldimage"]:"";
	$active=isset($_REQUEST["active"])?$_REQUEST["active"]:"";
	
	
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

		 $ImgArr4=explode('.',basename($_FILES['Pimage']['name']));
		if($_FILES['Pimage']['name']!="" )
	  {
		 
		if(file_exists("uploads/testimony/".$Image))
		{
		  unlink("uploads/testimony/".$Image);
		}
	   $Image=time().'Pimage'.rand().'.'.end($ImgArr4);
		$UploadDir="uploads/testimony/".$Image;
		move_uploaded_file($_FILES['Pimage']['tmp_name'],$UploadDir);
	  }
	
		
		if($name!= "")
		{
			
		  /*$ID=empty($edID)?GUID():$edID;*/
		 
		  $selectQry="select ID from testimonials where ID='".$edID."' ";
		
		  $checkinsup=mysqli_num_rows($db->TransQry($selectQry,$con));
		  if($checkinsup==1)
		  {
			echo $qry="update testimonials set name='".$name."',heading='".$heading."',video_link='".$video_link."',description='".$description."',image='".$Image."',active='".$active."' where ID='".$edID."'";
		  }
		  else if($checkinsup==0)
		  {
			echo $qry="insert into testimonials set name='".$name."',heading='".$heading."',description='".$description."',video_link='".$video_link."',image='".$Image."',active='".$active."'";
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
		  $msg="Something is Missing";
		}
	  // }
	  }
}


	
/* GET Package Heading */
$q="Select * FROM testimonials where active='1' and name!='' order by ID DESC";
	$result=$db->SelectQry($q,$con);	
	$Rows12 = mysqli_num_rows($result);	
	$getpack=array();	
	if($Rows12 >0)	
	{ 	
		$i=0;  	
		while($fetch =mysqli_fetch_assoc($result))   	
		{		  
			$getpack[$i++]=$fetch;
		}	
	}
	/* GET Hotel Type: Like Luxury Standard etc. */
	$qu="Select * FROM testimonials where active='1' order by ID DESC";
	$result1=$db->SelectQry($qu,$con);	
	$Rows121 = mysqli_num_rows($result1);	
	$testimony=array();	
	if($Rows121 >0)	
	{ 	
		$i=0;  	
		while($fetch1 =mysqli_fetch_assoc($result1))   	
		{		  
			$testimony[$i++]=$fetch1;
		}	
	}

/* delete record query */
	if(isset($del) and $del!='')
	{
	  $query_del= mysqli_query($con,"SELECT * FROM  testimonials WHERE ID= '".$del."' ");
	  $row_del  = mysqli_fetch_array($query_del);
	  $Image= $row_del['image'];
	  unlink("uploads/testimony/".$Image);

	  $delqry = mysqli_query($con, "DELETE FROM testimonials WHERE ID='".$del."'");?> 
	  <!-- $msg="Delete Successfully"; -->
	  <script>
	  	alert('Deleted Successfully');
	  </script>
	  <?php
	  echo '<meta http-equiv="refresh" content="1;URL=?route=testimonials" />';
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
       Add Testimonial
      </h1>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="breadcrumb-item"><a href="#">Forms</a></li>
        <li class="breadcrumb-item active"> Add Testimonial</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
     
     <!-- Basic Forms -->
      <div class="box box-default">
        <div class="box-header with-border">
          <h3 class="box-title">Add Testimonial</h3>

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
					<input class="form-control" placeholder="Heading" type="text" value="<?=$heading;?>" id="heading" name="heading">
				  </div>
				</div>
				<div class="form-group row">
				  <label for="example-text-input" class="col-sm-2 col-form-label">Name</label>
				  <div class="col-sm-10">
					<input class="form-control" placeholder="Name" type="text" value="<?=$name;?>" id="name" name="name">
				  </div>
				</div>

				<div class="form-group row">
				  <label for="example-text-input" class="col-sm-2 col-form-label">Video Link</label>
				 <div class="col-sm-10">
					<input class="form-control" placeholder="Video Url Here" type="text" value="<?=$video_link?>" id="video_link" name="video_link">
				  </div>
				</div>
				
				<div class="form-group row">
				  <label for="example-text-input" class="col-sm-2 col-form-label">Description</label>
				  <div class="col-sm-10">
				  <textarea class="form-control" name="description" placeholder="Enter Decription Here" ><?=$Description?></textarea>
					
				  </div>
				</div>

				<div class="form-group row">
				  <label for="example-text-input" class="col-sm-2 col-form-label">Testimony Image</label>
				  <div class="col-sm-10">
					<input class="" type="file" value="" id="Pimage" name="Pimage">
					<input type="hidden" name="oldimage" id="oldimage" value="<?=$Image?>">
					<?php if(isset($edID) and $edID!='' and $Image!=''){ ?>
                        <img src="uploads/testimony/<?=$Image?>" height='70'>
						
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
						<th>Sr No.</th>
						<th>Name</th>
						<th>Description</th>
						<th>Image</th>
						<th>Active</th>
						<th>Action</th>
						
					</tr>
				</thead>
				<tbody>
				<?php
					for($i=0;$i<count($testimony);$i++)
					{
				?>
					<tr>
						<td><?=$i;?></td>
						<td><?=$testimony[$i]["name"]?></td>
						<td><?=$testimony[$i]["description"]?></td>
						<td><img height="40" width="70" src="uploads/testimony/<?=$testimony[$i]["image"]?>">
						</td>
						<td><?php 
						if($testimony[$i]["active"]==1)
						{
							echo '<img height="15" width="15" src="uploads/images/yes.png">';
						}else{
							echo '<img height="15" width="15" src="uploads/images/cross.png">';
						}
						$testimony[$i]["active"]?></td>
						<td><a href="?route=<?=$PageRoute?>&ed=<?=$testimony[$i]["ID"];?>" class="btn btn-success">Edit</a>
						<a href="?route=<?=$PageRoute?>&delID=<?=$testimony[$i]["ID"];?>" class="btn btn-danger">Delete</a></td>
						
					</tr>
				<?php } ?>
					
				</tbody>
				<tfoot>
					<tr>
						<th>Sr No.</th>
						<th>Name</th>
						<th>Description</th>
						<th>Image</th>
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
