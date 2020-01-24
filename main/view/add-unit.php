<?php
$db=new dbclass();
$con=$db->Connection();
$edID=isset($_REQUEST["ed"])?$_REQUEST["ed"]:"";
if($SesUserType==1)
{
	$unit=isset($_REQUEST["unit"])?$_REQUEST["unit"]:"";
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
		   $check_exist="select categoryID from unit where name='".$unit."'";
		    $check_exist=mysqli_num_rows($db->TransQry($check_exist,$con));
		    if($check_exist>0)
		  {
			  $msg="$unit Already Exist";
			  echo '<meta http-equiv="refresh" content="2;URL=?route='.$PageRoute.'" />';
		  }
		else{  
		
	   
		if($unit!= "")
		{
			$localIP = 1;
		  $unitID=empty($edID)?GUID():$edID;
		 
		  $selectQry="select unitID from unit where unitID='".$unitID."' ";
		
		  $checkinsup=mysqli_num_rows($db->TransQry($selectQry,$con));
		  if($checkinsup==1)
		  {
			$qry="update unit set unitID='".$unitID."',name='".$unit."',active='".$active."',u_date='".$E_Date."',localIP='".$localIP."',dataset='".$dataset."' where unitID='".$unitID."'";
		  }
		  else if($checkinsup==0)
		  {
			 echo $qry="insert into unit set unitID='".$unitID."',name='".$unit."',active='".$active."',e_date='".$E_Date."',localIP='".$localIP."',dataset='".$dataset."' ";
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
		  $msg="Please Enter Category";
		}
	  }
	  }
}
/* Get All Activated category */
$qry="Select * FROM unit order by ID DESC;";
	$res=$db->SelectQry($qry,$con);	
	$Rows2 = mysqli_num_rows($res);	
	$unit=array();	
	if($Rows2 >0)	
	{ 	
		$i=0;  	
		while($get_unit =mysqli_fetch_assoc($res))   	
		{		       			
			$unit[$i++]=$get_unit;  	
		}	
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
       Add New Category
      </h1>
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
		<form name="u_form" method="post" enctype="multipart/form-data">
		<p class="text-center" style="color:GREEN;font-weight:700;"> <?php if(isset($msg) and $msg!='') echo $msg;?></p>
        <div class="box-body">
          <div class="row">
            <div class="col-12">
            	<div class="form-group row">
				  <label for="example-text-input" class="col-sm-2 col-form-label">Unit Name</label>
				  <div class="col-sm-10">
					<input class="form-control" placeholder="Unit Name" type="text" value="" id="unit" name="unit">
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
						
						<th>Unit Name</th>
						<th>Active</th>
						<th>Action</th>
						
					</tr>
				</thead>
				<tbody>
				<?php
					for($i=0;$i<count($unit);$i++)
					{
				?>
					<tr>
						
						<td><?=$unit[$i]["name"]?></td>
						<td><?php 
						if($unit[$i]["active"]==1)
						{
							echo '<img height="15" width="15" src="uploads/images/yes.png">';
						}else{
							echo '<img height="15" width="15" src="uploads/images/cross.png">';
						}
						$unit[$i]["active"]?></td>
						<td><a class="btn btn-success">Edit</a><a class="btn btn-danger">Delete</a></td>
						
					</tr>
				<?php } ?>
					
				</tbody>
				<tfoot>
					<tr>
						
						<th>Unit Name</th>
						
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

