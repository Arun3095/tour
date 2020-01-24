<?php
$db=new dbclass();
$con=$db->Connection();
$edID=isset($_REQUEST["ed"])?$_REQUEST["ed"]:"";
$del=isset($_REQUEST["del"])?$_REQUEST["del"]:"";
$parantID=isset($_REQUEST["p_cat"])?$_REQUEST["p_cat"]:"";
if($SesUserType==1)
{
	$name1=isset($_REQUEST["name"])?$_REQUEST["name"]:"";
	$slug=create_slug($name1);
	$name = strtolower($name1);
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
		
	   
		if($name!= "")
		{

		  $selectQry="select ID from tag where ID='".$edID."' ";
		
		  $checkinsup=mysqli_num_rows($db->TransQry($selectQry,$con));
		  if($checkinsup==1)
		  {
			 $qry="update tag set name='".$name."',slug='".$slug."',active='".$active."',u_date='".$E_Date."' where ID='".$edID."'";
		  }
		  else if($checkinsup==0)
		  {
			 $qry="insert into tag set name='".$name."',slug='".$slug."',active='".$active."',e_date='".$E_Date."',dataset='".$dataset."' ";
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
		  $msg="Please Enter Category";
		}
	  // }
	  }
}
/* Get All Activated category */
$qry="Select * FROM tag where active='1' order by ID DESC;";
	$res=$db->SelectQry($qry,$con);	
	$Rows2 = mysqli_num_rows($res);	
	$Data=array();	
	if($Rows2 >0)	
	{ 	
		$i=0;  	
		while($get_cat =mysqli_fetch_assoc($res))   	
		{		       			
			$category[$i++]=$get_cat;  	
		}	
	}
	/* Get All category */
	$qry="Select * FROM tag order by e_date DESC;";
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
				 $name = $get_allcat["name"];
				 $image = $get_allcat["image"];
				 $p_cat = $get_allcat["parantID"];
			}
		$all_cat[$i++]=$get_allcat;
  		
		}	
	}

/* delete record query */
if(isset($del) and $del!=''){
  $delqry = mysqli_query($con, "DELETE FROM tag WHERE ID='".$del."'"); 
  $msg="Delete Successfully";
  echo '<meta http-equiv="refresh" content="0;URL=?route=tag" />';
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
       Add New Tag
      </h1>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="breadcrumb-item"><a href="#">Forms</a></li>
        <li class="breadcrumb-item active">Tag</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
     
     <!-- Basic Forms -->
      <div class="box box-default">
        <div class="box-header with-border">
          <h3 class="box-title">Add Tag</h3>

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
				  <label for="example-text-input" class="col-sm-2 col-form-label">Tag Name</label>
				  <div class="col-sm-10">
					<input class="form-control" placeholder="Tag Name" type="text" value="<?=$name;?>" id="name" name="name">
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
						<th>Tag Name</th>
						<th>Active</th>
						<th>Action</th>
						
					</tr>
				</thead>
				<tbody>
				<?php
					for($i=1;$i<count($all_cat);$i++)
					{
				?>
					<tr>
						<td><?=$i ;?></td>
						<td><?=$all_cat[$i]["name"]?></td>
						
						
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
						<th>Sr No.</th>
						<th>Tag Name</th>
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
