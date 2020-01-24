<?php
$db=new dbclass();
$con=$db->Connection();
$edID=isset($_REQUEST["ed"])?$_REQUEST["ed"]:"";
if($SesUserType==1)
{
	$pack_name=isset($_REQUEST["pack_name"])?$_REQUEST["pack_name"]:"";
	$r_price=isset($_REQUEST["r_price"])?$_REQUEST["r_price"]:"";
	$p_price=isset($_REQUEST["p_price"])?$_REQUEST["p_price"]:"";
	$narration=isset($_REQUEST["narration"])?$_REQUEST["narration"]:"";
	// $narration=mysqli_real_escape_string($narration,$con);
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
		
		if($pack_name!= "")
		{
			
		  $planID=empty($edID)?GUID():$edID;
		 
		  $selectQry="select planID from  package where planID='".$planID."' ";
		
		  $checkinsup=mysqli_num_rows($db->TransQry($selectQry,$con));
		  if($checkinsup==1)
		  {
			 $qry="update  package_plan set name='".$pack_name."',narration='".$narration."',r_price='".$r_price."',f_price='".$p_price."',active='".$active."',e_date='".$E_Date."' where planID='".$planID."'";
		  }
		  else if($checkinsup==0)
		  {
			 $qry="insert into  package_plan set planID='".$planID."',name='".$pack_name."',narration='".$narration."',r_price='".$r_price."',f_price='".$p_price."',active='".$active."',e_date='".$E_Date."'";
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
$qry="Select * FROM package_plan where active='1' order by ID DESC;";
	$res=$db->SelectQry($qry,$con);	
	$Rows2 = mysqli_num_rows($res);	
	$package=array();	
	if($Rows2 >0)	
	{ 	
		$i=0;  	
		while($get_cat =mysqli_fetch_assoc($res))   	
		{		       			
			$package[$i++]=$get_cat;  	
		}	
	}
	/* Get All category */
	$qry="Select * FROM package_plan order by e_date DESC;";
	$res=$db->SelectQry($qry,$con);	
	$Rows2 = mysqli_num_rows($res);
	$all_cat=array();	
	if($Rows2 >0)	
	{ 	
		$i=0;  	
		while($get_allcat =mysqli_fetch_assoc($res))   	
		{		  
			if($edID==$get_allcat["planID"])
			{
				 $name = $get_allcat["name"];
				 $r_price = $get_allcat["r_price"];
				 $p_price = $get_allcat["p_price"];
				 $narration = $get_allcat["narration"];
			}
		$all_cat[$i++]=$get_allcat;
  		
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
       Add New Hotel Detail
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
		<p class="text-center" style="color:GREEN;font-weight:700;"> <?php if(isset($msg) and $msg!='') echo $msg;?></p>
        <div class="box-body">
          <div class="row">
            <div class="col-12">
            	<div class="form-group row">
				  <label for="example-text-input" class="col-sm-2 col-form-label">Hotel Type</label>
				  <div class="col-sm-10">
					<input class="form-control" placeholder="Tour Package Name" type="text" value="<?=$name;?>" id="pack_name" name="pack_name">
				  </div>
				</div>
				<div class="form-group row">
				  <label for="example-text-input" class="col-sm-2 col-form-label">Regular Price</label>
				  <div class="col-sm-10">
					<input class="form-control" placeholder="regular Price" type="text" value="<?=$r_price;?>" id="r_price" name="r_price">
				  </div>
				</div>
				<div class="form-group row">
				  <label for="example-text-input" class="col-sm-2 col-form-label">Final Price</label>
				  <div class="col-sm-10">
					<input class="form-control" placeholder="Final Price" type="text" value="<?=$p_price;?>" id="p_price" name="p_price">
				  </div>
				</div>
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
				<thead>
					<tr>
						
						<th>Plan Name</th>
						<th>Regular Price</th>
						<th>Final Price</th>
						<th>Description</th>
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
						<td><?=$all_cat[$i]["r_price"]?></td>
						<td><?=$all_cat[$i]["f_price"]?></td>
						<td><?=$all_cat[$i]["narration"]?></td>
						
						<td><?php 
						if($all_cat[$i]["active"]==1)
						{
							echo '<img height="15" width="15" src="uploads/images/yes.png">';
						}else{
							echo '<img height="15" width="15" src="uploads/images/cross.png">';
						}
						$all_cat[$i]["active"]?></td>
						<td><a href="?route=<?=$PageRoute?>&ed=<?=$all_cat[$i]["planID"];?>" class="btn btn-success">Edit</a><a class="btn btn-danger">Delete</a></td>
						
					</tr>
				<?php } ?>
					
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
<script type="text/javascript">

/* $("#p_cat").load("model/DropDownLoad.php?SelectedVal=<?php echo $parantID;?>&Status=0",function(e){
       $('#p_cat').select2();
	   alert("hie");
    }); */
</script>
