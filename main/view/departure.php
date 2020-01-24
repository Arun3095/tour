<?php
$db=new dbclass();
$con=$db->Connection();
$edID=isset($_REQUEST["ed"])?$_REQUEST["ed"]:"";
$del=isset($_REQUEST["del"])?$_REQUEST["del"]:"";

if($SesUserType==1)
{
	$name=isset($_REQUEST["name"])?$_REQUEST["name"]:""; 
	$package=isset($_REQUEST["package"])?$_REQUEST["package"]:"";
	$slug=create_slug($name);
	$cost=isset($_REQUEST["cost"])?$_REQUEST["cost"]:"";
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
		
	   
		if($name!= "")
		{

		  $selectQry="select ID from departure_city where ID='".$edID."' ";
		
		  $checkinsup=mysqli_num_rows($db->TransQry($selectQry,$con));
		  if($checkinsup==1)
		  {
			 $qry="update departure_city set name='".$name."',package_id='".$package."',slug='".$slug."',cost='".$cost."',active='".$active."' where ID='".$edID."'";
		  }
		  else if($checkinsup==0)
		  {
			 $qry="insert into departure_city set name='".$name."',package_id='".$package."',slug='".$slug."',cost='".$cost."',active='".$active."' ";
		  }
		  $res=$db->TransQry($qry,$con);
		  if($res)
		  {
			$msg="Save Successfully";
			echo '<meta http-equiv="refresh" content="0;URL=?route='.$PageRoute.'" />';
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
/* Get All Activated category */
$qry="Select * FROM package where active='1' order by ID DESC";
	$res=$db->SelectQry($qry,$con);	
	$Rows2 = mysqli_num_rows($res);	
	$package=array();	
	if($Rows2 >0)	
	{ 	
		$i=0;  	
		while($get_pkg =mysqli_fetch_assoc($res))   	
		{		       			
			array_push($package, $get_pkg);
		}

	}
	/* Get All category */
	$qry="Select * FROM departure_city order by ID DESC";
	$res=$db->SelectQry($qry,$con);	
	$Rows2 = mysqli_num_rows($res);	
	$all_departure=array();	
	if($Rows2 >0)	
	{ 	
		$i=0;  	
		while($get_alldeparture =mysqli_fetch_assoc($res))   	
		{	
			if($edID==$get_alldeparture["ID"])
			{
				 $name = $get_alldeparture["name"];
				 $cost = $get_alldeparture["cost"];
			}
		$all_departure[$i++]=$get_alldeparture;
  		
		}	
	}

/* delete record query */
if(isset($del) and $del!=''){
  $delqry = mysqli_query($con, "DELETE FROM departure_city WHERE ID='".$del."'"); 
  $msg="Delete Successfully";
  echo '<meta http-equiv="refresh" content="0;URL=?route='.$PageRoute.'" />';
}

$StatusArr=array("","");
$StatusArr[$active]='checked="checked" ';
unset($db);
?>
<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>Add New Departure City</h1>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="breadcrumb-item"><a href="#">Tags</a></li>
        <li class="breadcrumb-item active">Departure City</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
     
     <!-- Basic Forms -->
      <div class="box box-default">
        <div class="box-header with-border">
          <h3 class="box-title">Add Departure</h3>

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
            		<label for="example-text-input" class="col-sm-2 col-form-label">Departure Cost</label>
            		<div class="col-sm-10">
            			<select name="package" id="package" class="form-control">
            				<option value="0">Select Package</option>
            				<?php foreach ($package as $pkg) { ?>
            					<option value="<?=$pkg['ID']?>"><?=$pkg['name']?></option>	
            				<?php } ?>
            				
            			</select>
            		</div>
            	</div>

            	<div class="form-group row">
				  <label for="example-text-input" class="col-sm-2 col-form-label">Departure Name</label>
				  <div class="col-sm-10">
					<input class="form-control" placeholder="Departure City Name" type="text" value="<?=$name;?>" id="name" name="name">
				  </div>
				</div>

				<div class="form-group row">
				  <label for="example-text-input" class="col-sm-2 col-form-label">Departure Cost</label>
				  <div class="col-sm-10">
					<input class="form-control" placeholder="Enter Cost" type="text" value="<?=$cost;?>" id="cost" name="cost">
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
						<th>Departure Name</th>
						<th>Cost</th>
						<th>Active</th>
						<th>Action</th>
						
					</tr>
				</thead>
				<tbody>
				<?php
					for($i=0;$i<count($all_departure);$i++)
					{
				?>
					<tr>
						<td><?=$i+1 ;?></td>
						<td><?=$all_departure[$i]["name"]?></td>
						<td><?=$all_departure[$i]["cost"]?></td>
						<td><?php 
						if($all_departure[$i]["active"]==1)
						{
							echo '<img height="15" width="15" src="uploads/images/yes.png">';
						}else{
							echo '<img height="15" width="15" src="uploads/images/cross.png">';
						}
						$all_departure[$i]["active"]?></td>
						<td><a href="?route=<?=$PageRoute?>&ed=<?=$all_departure[$i]["ID"];?>" class="btn btn-success">Edit</a>&nbsp;
							<a href="?route=<?=$PageRoute?>&del=<?=$all_departure[$i]["ID"];?>" class="btn btn-Danger">Delete</a>
						</td>
						
					</tr>
				<?php } ?>
					
				</tbody>
				<tfoot>
					<tr>
						<th>Sr No.</th>
						<th>Departure Name</th>
						<th>Cost</th>
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
