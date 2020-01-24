<?php
session_start();
require_once('main/controller/dbclass.php');
$db=new dbclass();$con=$db->Connection();
/* get all Category */
function allCategory()
{
	$db=new dbclass();$con=$db->Connection();
	$query = "select ID,parantID,name from category where active='1' and parantID!='' and parantID='0'";
	$RUN = $db->SelectQry($query,$con);
	$Rows2 = mysqli_num_rows($RUN);	
	$left_cat=array();
	if($Rows2 >0)	
	{ 	
		$i=0;  	
		while($fetch =mysqli_fetch_assoc($RUN))   	
		{		       			
			$left_cat[$i]=$fetch; 
			$query11 = "select parantID,name,ID from category where active=1 and parantID='".$fetch['ID']."'";
			$Result1 = $db->SelectQry($query11,$con);
			$y=0;
			while($fetch2 =mysqli_fetch_assoc($Result1)){
				$left_cat[$i]["subcat"][$y]=$fetch2; 			
			// echo "<pre/>";print_r($left_cat);
			$query12 = "select parantID,name,ID from category where active=1 and parantID='".$fetch2['ID']."'";
			$Result2 = $db->SelectQry($query12,$con);
			$x=0;
			$left_cat[$i]["subcat"][$y]["subcat1"]=array();
			while($fetch3 =mysqli_fetch_assoc($Result2)){
				$left_cat[$i]["subcat"][$y]["subcat1"][$x++]=$fetch3; 
			}
			$y++;
			}
			$i++;
		}
		// echo "<pre/>";print_r($left_cat);		
		
	}
	return $left_cat;
}

	// All Packages get Function
	// function package()
	// {
	// 		$package_query = "SELECT * FROM package where active='1' ";
	// 		$run 		   =  mysqli_query($con,$package_query);
	// 		$count 	   	   = mysqli_num_rows($run);
	// 		$package = array();
	// 		if ($count > 0) 
	// 		{
	// 			$i=0;
	// 			while($fetched_query = mysqli_fetch_assoc($run))
	// 			{
	// 				$package[$i++]=$fetched_query;
	// 			}

	// 		}
	// 		return $package;
	// }



	// All Reserved Vehicle List Function
	function reserved_vehicle()
	{
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
			return $reserved;
	}


?>