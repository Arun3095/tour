<?php
$db=new dbclass();
$con=$db->Connection();
$edID=isset($_REQUEST["ed"])?$_REQUEST["ed"]:"";
$del=isset($_REQUEST["del"])?$_REQUEST["del"]:"";
// All booking Vehicle List
			$book_now = "SELECT * FROM book_now where active='1' order by ID DESC ";
			$run 		   =  mysqli_query($con,$book_now);
			$count 	   	   = mysqli_num_rows($run);
			$booking = array();
			if ($count > 0) 
			{
				$i=0;
				while($fetched_query = mysqli_fetch_assoc($run))
				{
					$booking[$i++]=$fetched_query;
				}

			}

	/* delete record query */
	if(isset($del) and $del!=''){
	  $delqry = mysqli_query($con, "DELETE FROM book_now WHERE ID='".$del."'"); 
	  $msg="Delete Successfully";
	  echo '<meta http-equiv="refresh" content="1;URL=?route='.$PageRoute.'" />';
	}


?>
<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <section class="content-header">
      <h1>Booking List</h1>
      
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="breadcrumb-item"><a href="#">Category</a></li>
        <li class="breadcrumb-item active">Booking List</li>
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
						<th>Email</th>
						<th>Contact</th>
						<th>From</th>
						<th>To</th>
						<th>Travelling Date</th>
						
						<th>Action</th>
						
					</tr>
				</thead>
				<tbody>
				<?php
					for($i=0;$i<count($booking);$i++)
					{
				?>
					<tr>
						<td><?=$booking[$i]["email"] ?></td>
						<td><?=$booking[$i]["phone"]?></td>
						<td><?=$booking[$i]["from_city"]?></td>
						<td><?=$booking[$i]["to_city"]?></td>
						<td><?=$booking[$i]["travel_date"]?></td>
						<td><a href="?route=<?=$PageRoute?>&del=<?=$booking[$i]["ID"];?>" class="btn btn-danger">Delete</a></td></td>
						
						
					</tr>
				<?php } ?>
					
				</tbody>
				<tfoot>
					<tr>
						<th>Email</th>
						<th>Contact</th>
						<th>From</th>
						<th>To</th>
						<th>Travelling Date</th>
						<th>Action</th>
					</tr>
				</tfoot>
			</table>
          </div>
    </section>
    <!-- /.content -->
  </div>
   
</body>

</html>
