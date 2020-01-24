<?php
$db=new dbclass();
$con=$db->Connection();
$edID=isset($_REQUEST["ed"])?$_REQUEST["ed"]:"";

if($SesUserType==0)
{
	echo $main_category=isset($_REQUEST["category"])?$_REQUEST["category"]:"";
	$brand_name=isset($_REQUEST["brand_name"])?$_REQUEST["brand_name"]:"";
	$slug=create_slug($brand_name);
	$active=isset($_REQUEST["active"])?$_REQUEST["active"]:0;
	
	$dataset=json_encode($_REQUEST);
	$Image=isset($_REQUEST["oldimage"])?$_REQUEST["oldimage"]:"";
	$msg="";

	if(isset($_REQUEST["submit"]))
	{
		
		if($main_category!= "")
		{
			
		  $edID=empty($edID)?GUID():$edID;
		 
		 echo $selectQry="select ID from brand where ID='".$edID."' ";
		  $checkinsup=mysqli_num_rows($db->TransQry($selectQry,$con));
		  if($checkinsup==1)
		  {
			echo $qry="update category set categoryID='".$main_category."',name='".$brand_name."',active='".$active."' ,dataset='".$dataset."' where ID='".$ID."'";exit();
		  }
		  else if($checkinsup==0)
		  {
			  echo $qry="insert into brand set categoryID='".$main_category."',name='".$brand_name."',active='".$active."',dataset='".$dataset."' ";exit();
		  }
		  $res=$db->TransQry($qry,$con);
		  if($res)
		  {
			$msg="Save Successfully";
			echo '<meta http-equiv="refresh" content="2;URL=brand.php" />';
			// echo '<meta http-equiv="refresh" content="2;URL=?route='.$PageRoute.'" />';
		  }
		  else
		  {
			$msg="Error in saving";
		  }
		}
		else
		{
		  $msg="please enter brand name";
		}
	  }
}

/* Get All Activated category */
$qry="Select * FROM category where active='1' and parantID='0' order by ID ASC";
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
	$qry="Select * FROM brand order by edate DESC;";
	$res=$db->SelectQry($qry,$con);	
	$Rows2 = mysqli_num_rows($res);	
	$all_brand_cat=array();	
	if($Rows2 >0)	
	{ 	
		$i=0;  	
		while($get_allcat =mysqli_fetch_assoc($res))   	
		{		  
			
			$all_brand_cat[$i++]=$get_allcat;
  		
		}	
	}





$StatusArr=array("","");
$StatusArr[$active]='checked="checked" ';
unset($db);
?>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
       Add New Brand
      </h1>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="breadcrumb-item"><a href="#">View</a></li>
        <li class="breadcrumb-item active">Brand</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
     
     <!-- Basic Forms -->
      <div class="box box-default">
        <div class="box-header with-border">
          <h3 class="box-title">Add Brand</h3>

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
				  <select class="form-control select2"  name="category" id="category" >
                  <option value="0">None</option>
				<?php
					for($i=0;$i<count($category);$i++)
					{
				?>
				  <option value="<?=$category[$i]["ID"]?>" <?php if(isset($main_category) and $main_category==$category[$i]["categoryID"]){ ?> selected="selected" <?php } ?> ><?=$category[$i]["name"]?></option>
				<?php } ?>
                </select>
				  </div>
				</div>
				<div class="form-group row">
				  <label for="example-text-input" class="col-sm-2 col-form-label">Brand Name</label>
				  <div class="col-sm-10">
					<input class="form-control" placeholder="Enter Brand Category Name" type="text" value="" id="brand_name" name="brand_name">
				  </div>
				</div>
				<div class="form-group row">
				  <label for="example-text-input" class="col-sm-2 col-form-label">Brand Image</label>
				  <div class="col-sm-10">
					<input class="" type="file" value="" id="brandImage" name="brandImage">
					<input type="hidden" name="oldimage" id="oldimage" value="<?=$Image?>">
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
						<th>Sr .No</th>
						<th>Category Name</th>
						<th>Category Image</th>
						<th>Active</th>
						<th>Action</th>
						
					</tr>
				</thead>
				<tbody>
				<?php
					for($i=0;$i<count($all_brand_cat);$i++)
					{
				?>
					<tr>
						<td><?=$i ?></td>
						<td><?=$all_brand_cat[$i]["name"]?></td>
						
						<td><?php 
						if($all_brand_cat[$i]["active"]==1)
						{
							echo '<img height="15" width="15" src="uploads/images/yes.png">';
						}else{
							echo '<img height="15" width="15" src="uploads/images/cross.png">';
						}
						$all_brand_cat[$i]["active"]?></td>
						<td><a href="?route=<?=$PageRoute?>&ed=<?=$all_brand_cat[$i]["ID"];?>" class="btn btn-success">Edit</a><a href="?route=<?=$PageRoute?>&del=<?=$all_brand_cat[$i]["ID"];?>" class="btn btn-danger">Delete</a></td>
						
					</tr>
				<?php } ?>
					
				</tbody>
				<tfoot>
					<tr>
						<th>Sr .No</th>
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
