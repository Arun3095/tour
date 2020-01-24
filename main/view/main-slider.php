<?php
$db=new dbclass();
$con=$db->Connection();
$edID=isset($_REQUEST["ed"])?$_REQUEST["ed"]:"";
$dt = new DateTime();
 $E_Date = $dt->format('Y-m-d h:i:s');
if($SesUserType==0)
{
	$s_title=isset($_REQUEST["s_title"])?$_REQUEST["s_title"]:"";
	$status=isset($_REQUEST["status"])?$_REQUEST["status"]:"";
	$narration=isset($_REQUEST["desc"])?$_REQUEST["desc"]:"";

	
	$Image=empty($Image)?"abc.png":$Image;
	$dataset=json_encode($_REQUEST);
	$Image=isset($_REQUEST["old_image"])?$_REQUEST["old_image"]:"";
	$msg="";
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
		// echo $dataset;exit;
		   $check_exist="select sliderID from main_slider where s_title='".$s_title."'";
		    $check_exist=mysqli_num_rows($db->TransQry($check_exist,$con));
		    if($check_exist>0)
		  {
			  $msg="$s_title Already Exist";
			  echo '<meta http-equiv="refresh" content="2;URL=main-slider.php" />';
		  }
		else{  
		$ImgArr=explode('.',basename($_FILES['s_image']['name']));
		if($_FILES['s_image']['name']!="" )
	  {
		 
		if(file_exists("uploads/slider/".$Image))
		{
		  unlink("uploads/slider/".$Image);
		}
	   // $pName = str_replace(' ', '_', $p_name);
	    $Image=time().'m_slider'.rand().'.'.end($ImgArr);
		$UploadDir="uploads/slider/".$Image;
		move_uploaded_file($_FILES['s_image']['tmp_name'],$UploadDir);
	  }
		if($s_title!= "" and $_FILES['s_image']['name']!='')
		{
			
		  $sliderID=empty($edID)?GUID():$edID;
		 
		  $selectQry="select sliderID from main_slider where sliderID='".$sliderID."' ";
		
		  $checkinsup=mysqli_num_rows($db->TransQry($selectQry,$con));
		  if($checkinsup==1)
		  {
			$qry="update category set sliderID='".$sliderID."',s_title='".$s_title."',image='".$Image."',status='".$status."'";
		  }
		  else if($checkinsup==0)
		  {
			  $qry="insert into main_slider set sliderID='".$sliderID."',s_title='".$s_title."',image='".$Image."',narration='".$narration."',status='".$status."',e_date='".$E_Date."',localIP='".$E_Date."',jsondata='".$dataset."' ";
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
		  $msg="please enter mendetory field";
		}
	  }
	  }
}

$StatusArr=array("","");
$StatusArr[$status]='checked="checked" ';
unset($db);
?>


  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
       Add New Slider Image
      </h1>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="breadcrumb-item"><a href="#">View</a></li>
        <li class="breadcrumb-item active">Main Slider</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
     
     <!-- Basic Forms -->
      <div class="box box-default">
        <div class="box-header with-border">
          <h3 class="box-title">Add Slider Image</h3>

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
				  <label for="example-text-input" class="col-sm-2 col-form-label">Title</label>
				  <div class="col-sm-10">
					<input class="form-control" placeholder="Slider Title" type="text" value="" id="s_title" name="s_title">
				  </div>
				</div>
				<div class="form-group row">
				  <label for="example-text-input" class="col-sm-2 col-form-label">Description</label>
				  <div class="col-sm-10">
					
					<textarea name="desc" id="desc" class="form-control"></textarea>
				  </div>
				</div>
				<div class="form-group row">
				  <label for="example-text-input" class="col-sm-2 col-form-label">Slider Image</label>
				  <div class="col-sm-10">
					<input class="" type="file" value="" id="s_image" name="s_image">
					<input type="hidden" name="old_image" id="old_image" value="<?=$Image?>">
				  </div>
				</div>
				
				
				<div class="form-group row">
				  <label for="example-text-input" class="col-sm-2 col-form-label">Active</label>
				  <div class="col-sm-10">
					
					<input type="checkbox" id="status" name="status" class="filled-in chk-col-green" checked />
					<label for="status"></label>
					
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
						<th>Brand Name</th>
						<th>Category Name</th>
						<th>Category Image</th>
						<th>Active</th>
						<th>Action</th>
						
					</tr>
				</thead>
				<tbody>
					<tr>
						<td>Tiger Nixon</td>
						<td>System Architect</td>
						<td>Edinburgh</td>
						<td>active</td>
						<td><a class="btn btn-success">Edit</a><a class="btn btn-danger">Delete</a></td>
						
					</tr>
					
					
				</tbody>
				<tfoot>
					<tr>
						<th>Brand Name</th>
						<th>Category Name</th>
						<th>Category Image</th>
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
