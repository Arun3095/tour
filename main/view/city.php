<?php
$db=new dbclass();
$con=$db->Connection();
$edID=isset($_REQUEST["ed"])?$_REQUEST["ed"]:"";
$del=isset($_REQUEST["del"])?$_REQUEST["del"]:"";
if($SesUserType==1)
{
	$countryID=isset($_REQUEST["countryID"])?$_REQUEST["countryID"]:"";
	$stateID=isset($_REQUEST["stateID"])?$_REQUEST["stateID"]:"";
	$city_name=isset($_REQUEST["city_name"])?$_REQUEST["city_name"]:"";
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
		
		
		if($city_name!= "")
		{
			
		 $selectQry="select ID from city where ID='".$edID."' ";
		  $checkinsup=mysqli_num_rows($db->TransQry($selectQry,$con));
		  if($checkinsup==1)
		  { 
			 $qry="update city set countryID='".$countryID."', stateID='".$stateID."',  name='".$city_name."',status='".$active."' where ID='".$edID."'";
		  }
		  else if($checkinsup==0)
		  {
			echo $qry="insert into city set countryID='".$countryID."', stateID='".$stateID."', name='".$city_name."',status='".$active."' ";
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
			/*echo '<meta http-equiv="refresh" content="0;URL=?route='.$PageRoute.'" />';*/
		  }
		}
		else
		{
		  $msg="please Enter City name";
		}
	  }
   }

/* Get All category */
	$qry="Select * FROM city order by ID DESC";
	$res=$db->SelectQry($qry,$con);	
	$Rows2 = mysqli_num_rows($res);	
	$all_city=array();	
	if($Rows2 >0)	
	{ 	
		$i=0;  	
		while($get_allcat =mysqli_fetch_assoc($res))   	
		{		  
			if($edID==$get_allcat["ID"])
			{   
				$ID = $get_allcat["ID"];
				$countryID = $get_allcat["countryID"];
				$stateID = $get_allcat["stateID"];
				$name = $get_allcat["name"];
			}
			$all_city[$i++]=$get_allcat;
		}	
	}

	/* delete record query */
	if(isset($del) and $del!='')
	{
		$delqry = mysqli_query($con, "DELETE FROM city WHERE ID='".$del."'"); 
		$msg="Delete Successfully";
		echo '<meta http-equiv="refresh" content="2;URL=?route='.$PageRoute.'" />';
	}

$StatusArr=array("","");
$StatusArr[$active]='checked="checked" ';
unset($db);
?>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>Add New city</h1>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="breadcrumb-item"><a href="#">View</a></li>
        <li class="breadcrumb-item active">city</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
     <!-- Basic Forms -->
      <div class="box box-default">
        <div class="box-header with-border">
          <h3 class="box-title">Add city</h3>

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
				<label for="example-text-input" class="col-sm-2 col-form-label">Country Name</label>
				  <div class="col-sm-10">
				  	<select name="countryID" id="countryID" class="form-control select2" onchange="select_state(this.value);">
				  		<option disabled selected="">Select Country</option>
				  		<?php
				  		$country = "select * from country where status= 1";
				  		$run = mysqli_query($con ,$country);
				  		while($country_data = mysqli_fetch_assoc($run))
				  		{    
				  			?>
				  			<option value="<?php echo $country_data['ID'] ?>"<?php if(isset($country_data['ID']) and $country_data['ID']==$countryID){ ?> selected="selected" <?php }?>><?php echo $country_data['name'] ?></option>
				  		<?php  } ?>
				  	</select>
				  </div>
			</div>

			<div class="form-group row">
				  <label for="example-text-input" class="col-sm-2 col-form-label">State Name</label>
				  <div class="col-sm-10">
				  	<select name="stateID" id="state_ID" class="form-control select2" >
				  	</select>
				  </div>
			</div>

			<div class="form-group row">
				  <label for="example-text-input" class="col-sm-2 col-form-label">City Name</label>
				  <div class="col-sm-10">
				  	<input class="form-control" placeholder="City Name" type="text" value="<?=$name;?>" id="city_name" name="city_name">
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
						<th>Sr.No</th>
						<th>city</th>
						<th>Active</th>
						<th>Action</th>
					</tr>
				</thead>
				<tbody>
				<?php
					for($i=0;$i<count($all_city);$i++)
					{
				?>
					<tr>
						<td><?=$i+1 ?></td>
						<td><?=$all_city[$i]["name"]?></td>
						<td><?php 
						if($all_city[$i]["status"]==1)
						{
							echo '<img height="15" width="15" src="uploads/images/yes.png">';
						}else{
							echo '<img height="15" width="15" src="uploads/images/cross.png">';
						}
						$all_city[$i]["status"]?></td>
						<td><a href="?route=<?=$PageRoute?>&ed=<?=$all_city[$i]["ID"];?>" class="btn btn-success">Edit</a>&nbsp;<a href="?route=<?=$PageRoute?>&del=<?=$all_city[$i]["ID"];?>" class="btn btn-danger">Delete</a></td>
						
					</tr>
				<?php } ?>
					
				</tbody>
				<tfoot>
					<tr>
						<th>Sr.No</th>
						<th>City</th>
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
	// Dynamic Select City city
         function select_state(a)
         {
            alert(a);
          $.ajax({
                url: "view/get_state.php",
                type:'POST',
                data:{state: a},
                success: function(data)
                {
                  $('#state_ID').html(data);
                }
              });
         
         }    
</script>