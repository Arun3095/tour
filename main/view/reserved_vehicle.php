<?php
$db=new dbclass();
$con=$db->Connection();
$edID=isset($_REQUEST["ed"])?$_REQUEST["ed"]:"";
$del=isset($_REQUEST["del"])?$_REQUEST["del"]:"";
// All Reserved Vehicle List
			$reserved_vehicle = "SELECT * FROM registered_vehicles where active='1' ";
			$run 		   =  mysqli_query($con,$reserved_vehicle);
			$count 	   	   = mysqli_num_rows($run);
			$reserved = array();
			if ($count > 0) 
			{
				$i=0;
				while($fetched_query = mysqli_fetch_assoc($run))
				{
					$reserved[$i++]=$fetched_query;
				}

			}

	/* delete record query */
	if(isset($del) and $del!=''){
	  $delqry = mysqli_query($con, "DELETE FROM registered_vehicles WHERE ID='".$del."'"); 
	  $msg="Delete Successfully";
	  echo '<meta http-equiv="refresh" content="1;URL=?route='.$PageRoute.'" />';
	}


?>
<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <section class="content-header">
      <h1>Vehicle Reservation List</h1>
      
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="breadcrumb-item"><a href="#">Category</a></li>
        <li class="breadcrumb-item active">Vehicle List</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">

     <div class="box-body">

	 <center><p class="text-center" style="color:green;font-weight:700;"><?php if(isset($msg) and $msg!='') echo $msg;?></p></center>
	 <!-- <span  style="text-align:center;color:RED;">Record Deleted</span> -->
              <table id="example" class="table table-bordered table-hover display nowrap margin-top-10 table-responsive">
				<thead>
					<tr>
						<th>Name</th>
						<th>Contact</th>
						<th>Type</th>
						<th>City</th>
						<th>Destination</th>
						<th>Vehicle Model</th>
						<!-- <th>Passenger</th> -->
						<th>Entry Day</th>
						<th>Leave Day</th>
						<th>Action</th>
						
					</tr>
				</thead>
				<tbody>
				<?php
					for($i=0;$i<count($reserved);$i++)
					{
				?>
					<tr>
						<td><?=$reserved[$i]["name"] ?></td>
						<td><?=$reserved[$i]["contact"]?></td>
						<td>
						 	<?php if($reserved[$i]["type"]== '1' ) 
							{
								echo "Car"; 
							}
							else
							{
								echo "Bike";
							}

						?>
						</td>
						<td><?=$reserved[$i]["city"]?></td>
						<td><?php if($reserved[$i]["destination"]!= '' ) 
								{
									echo $reserved[$i]["destination"]; 
								}
								
							?>
						</td>
						<td><?=$reserved[$i]["vehicle_model"]?></td>
						<!-- <td><?=$reserved[$i]["passenger"]?></td> -->
						<td><?=$reserved[$i]["arrival_date"]?></td>
						<td><?=$reserved[$i]["departure_date"]?></td>
						

						<td><a href="?route=<?=$PageRoute?>&del=<?=$reserved[$i]["ID"];?>" class="btn btn-danger">Delete</a></td></td>
						
						
					</tr>
				<?php } ?>
					
				</tbody>
				<tfoot>
					<tr>
						<th>Name</th>
						<th>Contact</th>
						<th>City</th>
						<th>Destination</th>
						<th>Vehicle Model</th>
						<!-- <th>Passenger</th> -->
						<th>Entry Day</th>
						<th>Leave Day</th>
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
function delorder(a)
{
	 $.ajax({
            url: "model/DelOrder.php",
            data: {	delID:a },
			cache: false,
            type: "POST",
            success: function(data){
				$("#delmsg").html(data);
				// $("#delmsg").fadeOut();
				if(data == 1){
					$("#delmsg").text();
					alert('Are You Sure Want To Delete');
					window.location.href = '?route=order-list';
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

  
$('#myModal').modal({ show: false});

   /*  function status_order_report(id){
       $.ajax({
          type: "POST",
          url: "model/modal-oder-api.php",
          data: {theId:id},
          success: function(data){
          	alert(data);
          	console.log(data);

        $('#myModal').modal("show");// this triggers your modal to display
           },

    });

 } */
</script>

