<?php
	
	session_start();
	
	require_once('main/controller/dbclass.php');
	$db=new dbclass();$con=$db->Connection();

  $localIP = $_SERVER['REMOTE_ADDR'];
  $cdate = date('Y-m-d H:i:s');
  // print_r($_SESSION["UserData"]);
	if($_SESSION["ADMData"]["userID"]!='')
	{
		
		$ulogin_insert= "insert into user_login (userID,e_date,localIP) values ('".$_SESSION["ADMData"]["userID"]."',NOW(),'".$localIP."')";
		$db->TransQry($ulogin_insert,$con);
		 $utype = $_SESSION["ADMData"]["type"];
		 // print_r($utype);die();
		if($utype==1)
		{
			$msg="Login Successfully";
			header("location:main/");exit();
	
		}
		else if($utype==0)
		{
			
			header('Location:index.php');
			/* else{
			// echo $_SESSION["UserData"]["userID"];exit;
			$msg="Login Successfully";
			header('Location:product-list.php');exit; 
			} */
		}
	}
?>