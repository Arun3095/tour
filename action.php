<?php 
require_once('main/controller/dbclass.php');
include('include/define.php');
$db=new dbclass();$con=$db->Connection();

if( isset($_POST['search_list']))
{
	$output = '';
	$valueToSearch = mysqli_real_escape_string($con, $_POST["search_list"]);
	if (isset($valueToSearch))
	{ 

	  $query_search = "SELECT * FROM category WHERE name Like '%".$valueToSearch."%' OR slug LIKE '%".$valueToSearch."%' limit 5"; 
		$search_result = mysqli_query($con,$query_search);
		$output .= '<ul>';
		while($row1 = mysqli_fetch_array($search_result))
		{
			$output .= '<li id="'.$row1['ID'].'">'.$row1["name"].' </li>';
		}
		'</ul>';
		echo $output;
	}
	else
	{
		echo 'Record Not Found';
	}
}
/*if(isset($_REQUEST['query']))
{
	 $srchText = $_REQUEST['query'];
	  $QRY="Select * FROM category where active='1' and name like '".%$srchText%."' and image!=''";
	$RUN=$db->SelectQry($QRY,$con);	
	$count = mysqli_num_rows($RUN);	
	if($count>0)
	{
		while($SEARCH = mysqli_fetch_assoc($RUN))
		{
			echo "<span id='selected_val' class='list-group-item list-group-item-action border-1'><img width='42' src='".PATH."main/uploads/category/". $SEARCH['image'] ."'>".$SEARCH['name']."</span>";
		}
	}
	else{
		echo "<p class='list-group-item'>No Record Found</p>";
	}
}*/

?>