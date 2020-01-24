<?php
$db=new dbclass();
$con=$db->Connection();
$edID=isset($_REQUEST["ed"])?$_REQUEST["ed"]:"";

	/* Get All USERS */
	$qry="Select * FROM users where type!=1 order by ID DESC";
	$res=$db->SelectQry($qry,$con);	
	$Rows2 = mysqli_num_rows($res);	
	$all_user=array();	
	if($Rows2 >0)	
	{ 	
		$i=0;  	
		while($get_alluser =mysqli_fetch_assoc($res))   	
		{		  
			if($edID==$get_alluser["categoryID"])
			{
				 $name = $get_alluser["name"];
				 $image = $get_alluser["image"];
				
			}
				$all_user[$i++]=$get_alluser;
  		
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
       All Users
      </h1>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="breadcrumb-item"><a href="#">Users</a></li>
        <li class="breadcrumb-item active">All User</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
     
     <!-- Basic Forms -->
     
      <!-- /.box -->
     <div class="box-body">
	 <?php if(isset($msg) and $msg!='') echo $msg;?>
	 <!--<span id="delmsg" style="text-align:center;color:RED;">Record Deleted</span>-->
              <table id="example" class="table table-bordered table-hover display nowrap margin-top-10 table-responsive">
				<thead>
					<tr>
						
						<th>Name</th>
						<th>Username</th>
						<th>Email</th>
						<th>Mobile</th>
						
						<th>Date</th>
						
						<th>Active</th>
						<th>Action</th>
						
					</tr>
				</thead>
				<tbody>
				<?php
					for($i=0;$i<count($all_user);$i++)
					{
				?>
					<tr>
						
						<td><?=$all_user[$i]["f_name"]?>&nbsp; <?=$all_user[$i]["l_name"]?></td>
						<td><?=$all_user[$i]["name"]?></td>
						
						<td><?=$all_user[$i]["email"]?></td>
						<td><?=$all_user[$i]["phone"]?></td>
						
						<!--<td>
						<?php 
						if(isset($all_user[$i]["image"]) and $all_user[$i]["image"]!='')
						{
						?>
						<img height="40" width="80" src="uploads/productImage/<?=$all_user[$i]["image"]?>"><?php } else{
							
							echo '<img height="15" width="15" src="uploads/images/cross.png">';
						} ?></td>-->
						<td><?php echo date("d-m-Y",strtotime($all_user[$i]["e_date"]))?></td>
						
						<td><?php 
						if($all_user[$i]["active"]==1)
						{
							echo '<img height="15" width="15" src="uploads/images/yes.png">';
						}else{
							echo '<img height="15" width="15" src="uploads/images/cross.png">';
						}
						$all_user[$i]["active"]?></td>
						<td><a href="?route=Add-New&ed=<?=$all_user[$i]["userID"];?>" class="btn btn-success">Edit</a><button onclick="delproduct(<?=$all_user[$i]["userID"]?>)" class="btn btn-danger">Delete</button></td>
						
					</tr>
				<?php } ?>
					
				</tbody>
				<tfoot>
					<tr>
						<th>Name</th>
						<th>Username</th>
						<th>Email</th>
						<th>Mobile</th>
						
						<th>Date</th>
						
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
function delproduct(a)
{
	 $.ajax({
            url: "model/delquery.php",
            data: {	delID:a },
			cache: false,
            type: "POST",
            success: function(data){
				$("#delmsg").html(data);
				// $("#delmsg").fadeOut();
				if(data == 1){
					$("#delmsg").text();
					window.location.href = '?route=product-list';
				}
        else
            console.log("Error");
				
            },
            error: function (){}
        });
    return true;
}
/* $("#p_cat").load("model/DropDownLoad.php?SelectedVal=<?php echo $parantID;?>&Status=0",function(e){
       $('#p_cat').select2();
	   alert("hie");
    }); */
</script>
