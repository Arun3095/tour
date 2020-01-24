<?php
class dbclass {
	public function connection()
	{
		$host='localhost';
		$user='root';
		$pass=''; 
		$database='tour';
		$con9=mysqli_connect($host,$user,$pass,$database) or die(mysqli_error());
		return $con9;
	
	}
	public function SelectQry($qry,$con)
	{
		$res=mysqli_query($con,$qry);
		if( $res == false ) 
		{
		 	die(mysqli_error($con));
		}
		return $res;
	}
	public function TransQry($qry,$con)
	{
		$res=0;
		$res=mysqli_query($con,$qry);
		return $res;
	}
}
 $locaip = $_SERVER['REMOTE_ADDR'];
 date_default_timezone_set('Asia/Kolkata');
$dt = new DateTime();
$E_Date = $dt->format('Y-m-d h:i:s');
?>
	