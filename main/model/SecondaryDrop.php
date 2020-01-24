<?php
require"../controller/dbclass.php";
$db=new dbclass();
$con=$db->connection();
$Type=isset($_REQUEST["Type"])?$_REQUEST["Type"]:0;
if($Type=='25')
{
	$value="Subject";
}
?>
<option value="">----Select <?=$value?>----</option>
<?php
$UnderID=isset($_REQUEST["UnderID"])?$_REQUEST["UnderID"]:"";
$SelectedVal=isset($_REQUEST["SelectedVal"])?$_REQUEST["SelectedVal"]:"";
$Status=isset($_REQUEST["Status"])?$_REQUEST["Status"]:"0";
$qry="select Name,RowID from master_common_secondry where FType=".$Type." and Inactive in (".$Status.") ".(empty($UnderID)?"":" And UnderID='".$UnderID."'")." order by Name ASC;";
$res=$db->SelectQry($qry,$con);
while($row=mysqli_fetch_array($res))
{
	if($row["RowID"]==$SelectedVal)
	{
	?>
	<option value="<?php echo $row["RowID"];?>" selected><?php echo $row["Name"];?></option>
	<?php
	}
	else
	{
	?>
	<option value="<?php echo $row["RowID"];?>"><?php echo $row["Name"];?></option>
	<?php
	}
}
?>