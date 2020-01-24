<?php
require"../controller/dbclass.php";
$db=new dbclass();
$con=$db->connection();

?>
<option value="">----Select <?=$parantID?>----</option>
<?php

$parantID=isset($_REQUEST["parantID"])?$_REQUEST["parantID"]:"";
$SelectedVal=isset($_REQUEST["SelectedVal"])?$_REQUEST["SelectedVal"]:"";
$Status=isset($_REQUEST["Status"])?$_REQUEST["Status"]:"0";
echo $qry="select name,categoryID from category where active in (".$Status.") ".(empty($parantID)?"":" And parantID='".$parantID."'")." order by name ASC;";
$res=$db->SelectQry($qry,$con);
while($row=mysqli_fetch_array($res))
{
	if($row["categoryID"]==$SelectedVal)
	{
	?>
		<option value="<?php echo $row["categoryID"];?>" selected><?php echo $row["name"];?></option>
	<?php
	}
	else
	{
	?>
		<option value="<?php echo $row["categoryID"];?>"><?php echo $row["name"];?></option>
	<?php
	}
}
?>