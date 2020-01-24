<?php
include "../controller/dbclass.php";

$db=new dbclass();
	$con=$db->Connection();

 $id = $_POST['state'];
 $states = "select * from state where countryID = '".$id."' ";
 $run = mysqli_query($con , $states); ?>
 <option disabled >Select State</option>
 <?php
 while($data = mysqli_fetch_assoc($run))
 {
 	
 	echo '<option value="'.$data["ID"].'">'.$data["name"].'</option>';
 	
 }
 ?>