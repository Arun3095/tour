<?php
$db=new dbclass();
$con=$db->Connection();
$edID=isset($_REQUEST["ed"])?$_REQUEST["ed"]:"";

	/* Get All category */
	$qry="Select p.*,c.name as cat_name FROM product p left join category c ON c.categoryID=p.categoryID order by e_date DESC";
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
				 $name = $get_allcat["p_name"];
				 $image = $get_allcat["image"];
				
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
       Product List
      </h1>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="breadcrumb-item"><a href="#">Product</a></li>
        <li class="breadcrumb-item active">Product List</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
     
     <!-- Basic Forms -->
     
      <!-- /.box -->
     <div class="box-body">
	 <?php if(isset($msg) and $msg!='') echo $msg;?>
	 <span id="delmsg" style="text-align:center;color:RED;">Record Deleted</span>
              <table id="example" class="table table-bordered table-hover display nowrap margin-top-10 table-responsive">
				<thead>
					<tr>
						
						<th>Category Name</th>
						<th>Product Name</th>
						<th>Product Image</th>
						<th>Entry Date</th>
						
						<th>Shipping</th>
						<th>Sale</th>
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
						
						<td><?=$all_cat[$i]["cat_name"]?></td>
						<td><?=$all_cat[$i]["p_name"]?></td>
						
						<td>
						<?php 
						if(isset($all_cat[$i]["image"]) and $all_cat[$i]["image"]!='')
						{
						?>
						<img height="40" width="80" src="uploads/productImage/<?=$all_cat[$i]["image"]?>"><?php } else{
							
							echo '<img height="15" width="15" src="uploads/images/cross.png">';
						} ?></td>
						<td><?=$all_cat[$i]["e_date"]?></td>
						<td><?=$all_cat[$i]["is_shipping"]?></td>
						<td><?=$all_cat[$i]["is_sale"]?></td>
						<td><?php 
						if($all_cat[$i]["active"]==1)
						{
							echo '<img height="15" width="15" src="uploads/images/yes.png">';
						}else{
							echo '<img height="15" width="15" src="uploads/images/cross.png">';
						}
						$all_cat[$i]["active"]?></td>
						<td><a href="?route=product&ed=<?=$all_cat[$i]["productID"];?>" class="btn btn-success">Edit</a><button onclick="delproduct(<?=$all_cat[$i]["ID"]?>)" class="btn btn-danger">Delete</button></td>
						
					</tr>
				<?php } ?>
					
				</tbody>
				<tfoot>
					<tr>
						<th>Category Name</th>
						<th>Product Name</th>
						<th>Product Image</th>
						<th>Entry Date</th>
						
						<th>Shipping</th>
						<th>Sale</th>
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
