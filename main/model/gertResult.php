<?php
 
require"../controller/dbclass.php";

$db=new dbclass();

$con=$db->connection();

if(isset($_POST['catID']))
{
	
	$qry1="Select * FROM category where active=1 and parantID='".$_POST['catID']."' and adventure_package=0 order by name ASC";
	$get_subcat=$db->SelectQry($qry1,$con);	
	
	$optionHtml = "";
	foreach ($get_subcat as $subcat) {
		$selected = (isset($_POST['previously_selected_subcat']) && $_POST['previously_selected_subcat'] !='' && $subcat["ID"]==$_POST["previously_selected_subcat"]) ?  "selected" : "";
		$optionHtml .= "<option value='".$subcat["ID"]."' $selected >".$subcat["name"]."</option>";
	}
	echo $optionHtml;
}


if(isset($_REQUEST['packageID']))
{

 echo $qry_package="Select * FROM package where active=1 and childcatID='".$_REQUEST['packageID']."' order by name ASC"; 
	$get_package=$db->SelectQry($qry_package,$con);	
	$exist_1 = mysqli_num_rows($get_package);	
	if($exist_1 >0)	
	{ 
		
    foreach ($get_package as $package_1) {
        ?>
		<option value="<?=$package_1["ID"]; ?>"<?php if(isset($_REQUEST['packageID']) and $_REQUEST['packageID']!='' and $_REQUEST['packageID']==$package_1["ID"]) { ?> selected="selected" <?php }?>><?=$package_1["name"]; ?></option>
<?php
    }	
	} 
}






?>