<?php
$db=new dbclass();
$con=$db->Connection();
$del=isset($_REQUEST["del"])?$_REQUEST["del"]:"";

/* Get All Activated category */
	$qry="Select * FROM book_now order by ID DESC;";
	$res=$db->SelectQry($qry,$con);	
	$Rows2 = mysqli_num_rows($res);	
	$data=array();	
	if($Rows2 >0)	
	{ 	
		$i=0;  	
		while($get_cat =mysqli_fetch_assoc($res))   	
		{		       			
			$data[$i++]=$get_cat;  	
		}	
	}
if(isset($del) and $del!='')
{
	$qry = "delete from book_now where ID='".$del."'";
	$res=$db->TransQry($qry,$con);
	if($res)
	{
		 $msg="Delete Record Successfully";
		 echo '<meta http-equiv="refresh" content="1;URL=?route='.$PageRoute.'" />';
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
      <h1>Contacted Person</h1>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="breadcrumb-item"><a href="#">Forms</a></li>
        <li class="breadcrumb-item active">Contacted Person</li>
      </ol>
    </section>
    <!-- Main content -->
    <section class="content">
     
     <!-- Basic Forms -->
    
      <!-- /.box -->
     <div class="box-body">
     	<p class="text-center" style="color:green;font-weight:700;"> <?php if(isset($msg) and $msg!='') echo $msg;?></p>
              <table id="example" class="table table-bordered table-hover display nowrap margin-top-10 table-responsive">
				<thead>
					<tr>
						
						<!-- <th>Name</th> -->
						<th>Email</th>
						<th>Phone</th>
						<th>Date</th>
						
						<th>Action</th>
						
					</tr>
				</thead>
				<tbody>
				<?php
					for($i=0;$i<count($data);$i++)
					{
				?>
					<tr>
						
						<!-- <td><?=$data[$i]["name"]?></td> -->
						<td><?=$data[$i]["email"]?></td>
						<td><?=$data[$i]["phone"]?></td>
						<td><?=$data[$i]["travel_date"]?></td>
						
						
						
						<td><a href="?route=<?=$PageRoute?>&del=<?=$data[$i]["ID"];?>" class="btn btn-Danger">Delete</a></td>
						
					</tr>
				<?php } ?>
					
				</tbody>
				<tfoot>
					<tr>
						<!-- <th>Name</th> -->
						<th>Email</th>
						<th>Phone</th>
						<th>Date</th>
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
