<?php
$db=new dbclass();
$con=$db->Connection();
$edID=isset($_REQUEST["ed"])?$_REQUEST["ed"]:"";
$del=isset($_REQUEST["del"])?$_REQUEST["del"]:"";
$parantID=isset($_REQUEST["p_cat"])?$_REQUEST["p_cat"]:"";

if($SesUserType==1)
{
	$subcategory=isset($_REQUEST["subcategory"])?$_REQUEST["subcategory"]:"";
	$cat_name1=isset($_REQUEST["cat_name"])?$_REQUEST["cat_name"]:"";
		$cat_name = strtolower($cat_name1);

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
		/*  $check_exist="select categoryID from category where name='".$cat_name."'";
		    $check_exist=mysqli_num_rows($db->TransQry($check_exist,$con));
		    if($check_exist>0)
		  {
			  $msg="$cat_name Already Exist";
			 // echo '<meta http-equiv="refresh" content="2;URL=?route='.$PageRoute.'" />';
		  }
		else{ */  
		$ImgArr=explode('.',basename($_FILES['catImage']['name']));
		if($_FILES['catImage']['name']!="" )
	  {
		 
		if(file_exists("uploads/category/".$Image))
		{
		  unlink("uploads/category/".$Image);
		}
	    $Image=time().'catImage'.rand().'.'.end($ImgArr);
		$UploadDir="uploads/category/".$Image;
		move_uploaded_file($_FILES['catImage']['tmp_name'],$UploadDir);
	  }
	   
		if($cat_name!= "")
		{
			
		  $categoryID=empty($edID)?GUID():$edID;
		 
		  $selectQry="select categoryID from category where categoryID='".$categoryID."' ";
		
		  $checkinsup=mysqli_num_rows($db->TransQry($selectQry,$con));
		  if($checkinsup==1)
		  {
			 $qry="update category set parantID='".$parantID."',name='".$cat_name."',image='".$Image."',active='".$active."',u_date='".$E_Date."' where categoryID='".$categoryID."'";
		  }
		  else if($checkinsup==0)
		  {
			 $qry="insert into category set categoryID='".$categoryID."',top_category='".$parantID."',parantID='".$subcategory."',name='".$cat_name."',image='".$Image."',active='".$active."',e_date='".$E_Date."',dataset='".$dataset."' ";
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
$qry="Select * FROM category where active='1' and parantID='0' order by name ASC;";
	$res=$db->SelectQry($qry,$con);	
	$Rows2 = mysqli_num_rows($res);	
	$category=array();	
	if($Rows2 >0)	
	{ 	
		$i=0;  	
		while($get_cat =mysqli_fetch_assoc($res))   	
		{		       			
			$category[$i++]=$get_cat;  	
		}	
	}
	/* Get All Child  category */
	$qry="Select * FROM category where active='1' and top_category!='' order by name ASC;";
	$res=$db->SelectQry($qry,$con);	
	$Rows2 = mysqli_num_rows($res);	
	$all_cat=array();	
	if($Rows2 >0)	
	{ 	
		$i=0;  	
		while($get_allcat =mysqli_fetch_assoc($res))   	
		{		  
			if($edID==$get_allcat["categoryID"])
			{
				 $parantID = $get_allcat["parantID"];
				 $name = $get_allcat["name"];
				 $image = $get_allcat["image"];
				 $cat_icon = $get_allcat["icon"];
				 $top_cat = $get_allcat["top_category"];
			}
		$all_cat[$i++]=$get_allcat;
  		
		}	
	}
/* delete record query */
if(isset($del) and $del!=''){
  $delqry = mysqli_query($con, "DELETE FROM category WHERE categoryID='".$del."'"); 
  $msg="Delete Successfully";
  echo '<meta http-equiv="refresh" content="2;URL=?route=child-category" />';
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
       Add Child Category
      </h1>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="breadcrumb-item"><a href="#">Forms</a></li>
        <li class="breadcrumb-item active">Child Category</li>
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
		<form name="c_form" method="post" enctype="multipart/form-data">
		<p class="text-center" style="color:GREEN;font-weight:700;"> <?php if(isset($msg) and $msg!='') echo $msg;?></p>
        <div class="box-body">
          <div class="row">
            <div class="col-12">
			<div class="form-group row">
				  <label for="example-text-input" class="col-sm-2 col-form-label">Select Parent Category</label>
				  <div class="col-sm-10">
					
				<select onchange="getSubCategory(this.value);"  class="form-control select2"  name="p_cat" id="p_cat">
                  <option value="0">None</option>
				<?php
					for($i=0;$i<count($category);$i++)
					{
				?>
				  <option value="<?=$category[$i]["categoryID"]?>" <?php if(isset($top_cat) and $top_cat==$category[$i]["categoryID"]){ ?> selected="selected" <?php }?> ><?=$category[$i]["name"]?></option>
				<?php } ?>
                </select>
				  </div>
				</div>
				<div class="form-group row">
				  <label for="example-text-input" class="col-sm-2 col-form-label">Sub Category</label>
				  <div class="col-sm-10">
					
				<select class="form-control select2" multiple="multiple" data-placeholder="Select Category" name="subcategory" id="subcategory">
                  <option value="0">None</option>
				
                </select>
				  </div>
				</div>
            	<div class="form-group row">
				  <label for="example-text-input" class="col-sm-2 col-form-label">Category Name</label>
				  <div class="col-sm-10">
					<input class="form-control" placeholder="Category Name" type="text" value="<?=$name;?>" id="cat_name" name="cat_name">
				  </div>
				</div>
				
				<div class="form-group row">
				  <label for="example-text-input" class="col-sm-2 col-form-label">Category Image</label>
				  <div class="col-sm-10">
					<input class="" type="file" value="" id="cat_image" name="catImage">
					<input type="hidden" name="old_cat_image" id="old_cat_image" value="<?=$image?>">
					 <?php if(isset($edID) and $edID!=''){ ?>
                        <img src="uploads/category/<?=$image?>" height='70'>
                      <?php } ?>
				  </div>
				</div>
				<div class="form-group row">
				  <label for="example-text-input" class="col-sm-2 col-form-label">Category Icon</label>
				  <div class="col-sm-10">
					<input class="" type="file" value="" id="cat_icon" name="cat_icon">
					<input type="hidden" name="old_icon" id="old_icon" value="<?=$cat_icon?>">
					 <?php if(isset($edID) and $edID!='' and $cat_icon!=0){ ?>
                        <img src="uploads/category/icon/<?=$cat_icon?>" height='70'>
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
						
						<th>Category Name</th>
						<th>Category Image</th>
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
						<td><img height="40" width="80" src="uploads/category/<?=$all_cat[$i]["image"]?>"></td>
						
						<td><?php 
						if($all_cat[$i]["active"]==1)
						{
							echo '<img height="15" width="15" src="uploads/images/yes.png">';
						}else{
							echo '<img height="15" width="15" src="uploads/images/cross.png">';
						}
						$all_cat[$i]["active"]?></td>
						<td><a href="?route=<?=$PageRoute?>&ed=<?=$all_cat[$i]["categoryID"];?>" class="btn btn-success">Edit</a><a href="?route=<?=$PageRoute?>&del=<?=$all_cat[$i]["categoryID"];?>" class="btn btn-danger">Delete</a></td>
						
					</tr>
				<?php } ?>
					
				</tbody>
				<tfoot>
					<tr>
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

function getSubCategory(val) {
	// alert(val);
	$.ajax({
	type: "POST",
	url: "model/gertResult.php",
	data:'catID='+val,
	success: function(data){
		// alert(data);
		$("#subcategory").html(data);
		// getCity();
	}
	});
}
</script>
