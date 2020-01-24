<?php
// server should keep session data for AT LEAST 1 hour
ini_set('session.gc_maxlifetime', 3600);

// each client should remember their session id for EXACTLY 1 hour
session_set_cookie_params(3600);

session_start(); // ready to go!
include('include/define.php');
require_once('main/controller/dbclass.php');
$obj=new dbclass();
$con=$obj->Connection();
$UserName=isset($_REQUEST["UserName"])?$_REQUEST["UserName"]:"";
$Password=isset($_REQUEST["password"])?$_REQUEST["password"]:"";
date_default_timezone_set("Asia/Kolkata");
$date=date("Y-m-d");
echo $msg="";

if(isset($_POST["login"]))
{
        if(!empty($UserName) and !empty($Password))
        {
          
       $query="select * from users where email='".$UserName."' and password='".$Password."' and type='1'";
        $res=$obj->SelectQry($query,$con);
          $existrow=mysqli_num_rows($res);
          if($existrow==1)
          {
            $row=mysqli_fetch_array($res);
            if($row['active']==1 and $row['valid_upto']>=$date)
            {
            // print_r($row);exit;
              if($row['password']==$Password)
              {
                
                $_SESSION["ADMData"]=$row;
                $utype = $_SESSION["ADMData"]["type"];
             // print_r($_SESSION["ADMData"]);exit;
          if($utype==1)
          {
            ?>
           
            <script>window.open("main/","_self");</script>
        
     <?php    
    }
        }
      else
          {
            $msg="UserName or Password Is wrong";
          }
        }
          else
            {
              $msg="Access Denied! Please Contact Administrator";
            }
          }
        else
          {
            $msg="User Name Or Password does not Exist";
          }
        }
      else
        {
          $msg="User Name or Password cannot be blank";
        }   
  echo "<script>alert('".$msg."');</script>";
} 
  
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Admin Log In  </title>
<!-- Bootstrap -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link href="<?=PATH?>css/bootstrap.css" rel="stylesheet">
<link rel="stylesheet" href="<?=PATH?>css/style.css">

<!-- Resource style -->

</head>
<body>

<style>
  .left-sidebar.contact-form input {
    border: 2px solid #f78536;
}

.left-sidebar.contact-form {
background: rgba(0, 0, 0, 0.6);
    padding: 40px 25px;
    margin: 6% auto;
    width: 430px;
    border-radius: 10px;
}
.left-sidebar.contact-form h4 {
    font-size: 30px;
    color: #f78536;
}
</style>  
<section class="why-bg" style=" height: 100vh;">

  
  <div class="row">
    <div class="container">
      <div class="row login-register">
        <div class="col-md-12">
          <div class="left-sidebar contact-form">
            <h4 class="text-muted text-center text-uppercase"><strong>HILLS TRAVELER</strong> </h4>
           <div class="text-center" id="errorin"></div>
		   <form name="login" id="l1"  method="post" >
			<div class="form-horizontal">
              <div class="form-group">
                <div class="col-sm-12">
                  <p>Email *</p>
                  <input type="email" name="UserName" id="uemail" class="form-control">
                </div>
              </div>
			
              <div class="form-group">
                <div class="col-sm-12">
                  <p>Password *</p>
                  <input type="password" name="password" id="password" class="form-control">
                </div>
              </div>
              <div class="form-group">
                <div class="col-md-12 text-center">
                  <span>
                  <input type="submit" name="login" class="btn btn-primary" value="Login">
                  </span> </div>
              </div>
			  
             
            </div>
			</form>
          </div>
        </div>
       </div>
    </div>
  </div>
 
</section>