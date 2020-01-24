<?php 
require"../controller/dbclass.php";
$db=new dbclass();
$con=$db->Connection();
if(isset($_REQUEST['delID']) and $_REQUEST['delID']!=''){
  $delqry = mysqli_query($con, "DELETE FROM product WHERE ID='".$_REQUEST['delID']."'"); 
  // echo "Delete Successfully";
  if($delqry){
  echo 1; }
  // echo '<meta http-equiv="refresh" content="2;URL=?route=product-list" />';
}
?>