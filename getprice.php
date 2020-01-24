<?php 
require_once('main/controller/dbclass.php');
include('include/define.php');
$db=new dbclass();$con=$db->Connection();

if(isset($_POST['pid']) and $_POST['pid']!='')
{
	$query1 = "Select pricing.* FROM pricing where pricing.active='1' and   pricing.packageID='".$_POST['packageid']."' order by pricing.ID ASC";
	$Result1 = $db->SelectQry($query1,$con);
	$fetch1 =mysqli_fetch_assoc($Result1);
	if($_POST['pid']==1)
	{
		$std = $_POST['pid'];
		?>
		
		<span class="ramount">₹ <?=$fetch1['std_final_price']?></span><span><strike>₹ <?=$fetch1['std_regular_price']?></strike></span>
		
		<p class="pack-person">Per person</p>
		<a href="<?=PATH?>book-now.php/?id=<?=base64_encode($fetch1['packageID'])?>" class="cus-btn">Book Online</a>
		<a href="<?=PATH?>book-now.php/?id=<?=base64_encode($fetch1['packageID'])?>" class="cus-btn">Contact Us</a>
		<?php 
		
		
	}else if($_POST['pid']==2){
		$lux = $_POST['pid'];
		?>
		<span class="ramount">₹ <?=$fetch1['lux_final_price']?></span><span><strike>₹ <?=$fetch1['lux_regular_price']?></strike></span>
		
		<p class="pack-person">Per person</p>
		<a href="<?=PATH?>book-now.php/?id=<?=base64_encode($fetch1['packageID'])?>" class="cus-btn">Book Online</a>
		<a href="<?=PATH?>book-now.php/?id=<?=base64_encode($fetch1['packageID'])?>" class="cus-btn">Contact Us</a>


		
		<?php 
	}else if($_POST['pid']==3){
		$prm = $_POST['pid'];
		?>
		
		
		<span class="ramount">₹ <?=$fetch1['prm_final_price']?></span><span><strike>₹ <?=$fetch1['prm_regular_price']?></strike></span>
		
		<p class="pack-person">Per person</p>
		<a href="<?=PATH?>book-now.php/?id=<?=base64_encode($fetch1['packageID'])?>" class="cus-btn">Book Online</a>
		<a href="<?=PATH?>book-now.php/?id=<?=base64_encode($fetch1['packageID'])?>" class="cus-btn">Contact Us</a>
		<?php
	}
}

/*-----------------Onchange radio button prices && onselect city prices---------------*/
else if(isset($_POST['pid_book']) and $_POST['pid_book']!='')
{
   $query1 = "Select pricing.* FROM pricing where pricing.active='1' and pricing.packageID='".$_POST['packageid_book']."' order by pricing.ID ASC";
	$Result1 = $db->SelectQry($query1,$con);
	$fetch1 =mysqli_fetch_assoc($Result1);
	if($_POST['pid_book']==1)
	{
		$std = $_POST['pid_book'];
		echo $fetch1['std_final_price'];
		echo $fetch1['std_regular_price'];

	}
else if($_POST['pid_book']==2){
		$lux = $_POST['pid_book'];
		echo $fetch1['lux_final_price'];
		echo $fetch1['lux_regular_price'];
		
	}
else if($_POST['pid_book']==3){
		$prm = $_POST['pid_book'];

		echo $fetch1['prm_final_price'];
		echo $fetch1['prm_regular_price'];
		
	}
}

/*-------------------------------Based On Add City Price-------------------------------------*/
else if ($_POST['form_city']) 
{
	
	$city = preg_split("/\,/",$_POST['form_city']);
	if (!empty($city)) 
	{
		
	   $query1_city = "Select pricing.*,aop.price,aop.city FROM pricing left join add_on_price as aop On aop.pricing_id = pricing.ID where pricing.active='1' and aop.ID='".$city[0]."' and pricing.packageID='".$city[2]."' order by pricing.ID ASC";
		$Result_city = $db->SelectQry($query1_city,$con);
		$price_city =mysqli_fetch_assoc($Result_city);
		echo $price_city['price'];

	}
}

/*-------------------------------Based On Add Room Price-------------------------------------*/
else if (isset($_POST['room_city'])) 
{
	$data_all = parse_str($_POST["data_rario"],$output);
	
	$room = $_POST['room_city'];
	if (!empty($room)) 
	{
		if($room > 2){
			$room_pkg = $_POST['room_pkg'];
			$query1_room = "Select * FROM pricing where active='1' and packageID='".$_POST['room_pkg']."' order by pricing.ID ASC";
			$run_room = $db->SelectQry($query1_room,$con);
			$price_room =mysqli_fetch_assoc($run_room);
			if ($output['radio1'] == 3) {
				echo (int)$price_room['prm_per_bed_price'];
			}

			else if ($output['radio1'] == 2) {
				echo (int)$price_room['lux_per_bed_price'];
			}	
			else{
				echo (int)$price_room['std_per_bed_price'];
			}
		}else{
			echo '0';
		}
	}
}


?>