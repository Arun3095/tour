<?php 
require_once('../controller/dbclass.php');
$db=new dbclass();
$con=$db->Connection();


  $scid = $_POST['brand']; 

 echo $qry_brand="Select * FROM category where active='1' and parantID='".$scid."' ";
	$run = mysqli_query($con , $qry_brand); ?>
<option disabled selected="">Select Brand Category</option>
 <?php
 while($data = mysqli_fetch_assoc($run))
 {
 	?>
 	<option value="<?=$data['ID']; ?>"<?php if(isset($brand) and $brand==$data["ID"]){ ?> selected="selected" <?php } ?> ><?=$data["name"]?></option>
 	<?php 
 }

?>