<?php
$db=new dbclass();
$con=$db->Connection();
$edID=isset($_REQUEST["ed"])?$_REQUEST["ed"]:"";
if($SesUserType==1)
{

	$heading=isset($_REQUEST["heading"])?$_REQUEST["heading"]:"";
	$planID=isset($_REQUEST["planid"])?$_REQUEST["planid"]:"";
	$r_price=isset($_REQUEST["r_price"])?$_REQUEST["r_price"]:"";
	$f_price=isset($_REQUEST["f_price"])?$_REQUEST["f_price"]:"";
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
		
		if($heading!= "" and $planID!= "" and $r_price!= "")
		{
			
		  $pricingID=empty($edID)?GUID():$edID;
		 
		  $selectQry="select pricingID from pricing where pricingID='".$pricingID."' ";
		
		  $checkinsup=mysqli_num_rows($db->TransQry($selectQry,$con));
		  if($checkinsup==1)
		  {
			 $qry="update  pricing set packageID='".$heading."',planID='".$planID."',r_price='".$r_price."',f_price='".$f_price."',narration='".$narration."',active='".$active."',u_date='".$E_Date."' where pricingID='".$pricingID."'";
		  }
		  else if($checkinsup==0)
		  {
			 $qry="insert into  pricing set pricingID='".$pricingID."',packageID='".$heading."',planID='".$planID."',r_price='".$r_price."',f_price='".$f_price."',narration='".$narration."',active='".$active."',e_date='".$E_Date."'";
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
/* Get All Activated Pricing */
/* $qry="Select * FROM pricing where active='1' order by ID DESC;";
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
	} */
	
	/* Get All Pricing Details */
	 $qry="Select * FROM pricing order by e_date DESC;";
	$res=$db->SelectQry($qry,$con);	
	$Rows2 = mysqli_num_rows($res);	
	$all_data=array();	
	if($Rows2 >0)	
	{ 	
		$i=0;  	
		while($getdata =mysqli_fetch_assoc($res))   	
		{		  
			if($edID==$getdata["pricingID"])
			{
				 $planID = $getdata["planID"];
				 $r_price = $getdata["r_price"];
				 $p_price = $getdata["f_price"];
				 $narration = $getdata["narration"];
			}
		$all_data[$i++]=$getdata;
  		
		}	
	} 
	
	/* GET Package Heading */
	$q="Select * FROM package where active='1' and heading!='' order by e_date DESC";
	$result=$db->SelectQry($q,$con);	
	$Rows12 = mysqli_num_rows($result);	
	$getpack=array();	
	if($Rows12 >0)	
	{ 	
		$i=0;  	
		while($fetch =mysqli_fetch_assoc($result))   	
		{		  
			/* if($edID==$get_allcat["planID"])
			{
				 $name = $get_allcat["name"];
				 $r_price = $get_allcat["r_price"];
				 $p_price = $get_allcat["p_price"];
				 $narration = $get_allcat["narration"];
			} */
		$getpack[$i++]=$fetch;
  		
		}	
	}
	/* GET Hotel Type: Like Luxury Standard etc. */
	$qu="Select * FROM package_plan where active='1' and name!='' order by e_date DESC";
	$result1=$db->SelectQry($qu,$con);	
	$Rows121 = mysqli_num_rows($result1);	
	$getplan=array();	
	if($Rows121 >0)	
	{ 	
		$i=0;  	
		while($fetch1 =mysqli_fetch_assoc($result1))   	
		{		  
			/* if($edID==$get_allcat["planID"])
			{
				 $name = $get_allcat["name"];
				 $r_price = $get_allcat["r_price"];
				 $p_price = $get_allcat["p_price"];
				 $narration = $get_allcat["narration"];
			} */
		$getplan[$i++]=$fetch1;
  		
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
       Add Tour Detail
      </h1>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="breadcrumb-item"><a href="#">Forms</a></li>
        <li class="breadcrumb-item active"> Add Tour Detail</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
     
     <!-- Basic Forms -->
      <div class="box box-default">
        <div class="box-header with-border">
          <h3 class="box-title"> Add Tour Detail</h3>

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
				  <label for="example-text-input" class="col-sm-2 col-form-label">Package Name</label>
				  <div class="col-sm-10">
					<select class="form-control select2" data-placeholder="Select Package Heading" name="heading" id="heading">
                  <option value="0">Select Package Name</option>
                <?php
					for($i=0;$i<count($getpack);$i++)
					{
				?>
				 <option value="<?=$getpack[$i]["packageID"]?>"><?=$getpack[$i]["heading"]?></option>
				<?php } ?>
                </select>
				  </div>
				</div>
				<div class="form-group row">
				  <label for="example-text-input" class="col-sm-2 col-form-label">Regular Price</label>
				  <div class="col-sm-10">
					<input class="form-control" placeholder="regular Price" type="text" value="<?=$r_price;?>" id="r_price" name="r_price">
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
						
						<th>Package Name</th>
						<th>Hotel Type</th>
						<th>Regular Price</th>
						<th>Final Price</th>
						<th>Description</th>
						<th>Active</th>
						<th>Action</th>
						
					</tr>
				</thead>
				<tbody>
				<?php
					for($i=0;$i<count($all_data);$i++)
					{
				?>
					<tr>
						
						<td><?=$all_data[$i]["name"]?></td>
						<td><?=$all_data[$i]["r_price"]?></td>
						<td><?=$all_data[$i]["f_price"]?></td>
						<td><?=$all_data[$i]["narration"]?></td>
						
						<td><?php 
						if($all_data[$i]["active"]==1)
						{
							echo '<img height="15" width="15" src="uploads/images/yes.png">';
						}else{
							echo '<img height="15" width="15" src="uploads/images/cross.png">';
						}
						$all_data[$i]["active"]?></td>
						<td><a href="?route=<?=$PageRoute?>&ed=<?=$all_data[$i]["planID"];?>" class="btn btn-success">Edit</a>
						<a href="?route=<?=$PageRoute?>&delID=<?=$all_data[$i]["planID"];?>" class="btn btn-danger">Delete</a></td>
						
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
