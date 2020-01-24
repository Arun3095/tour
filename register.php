		<?php 
		session_start();
		require_once('main/controller/dbclass.php');
		$db=new dbclass();$con=$db->Connection();
		require_once 'vendor/autoload.php';
		use PHPMailer\PHPMailer\PHPMailer;
		use PHPMailer\PHPMailer\Exception;

		$localIP	= $_SERVER['REMOTE_ADDR'];
		function GUID()
		{
			if (function_exists('com_create_guid') === true)
			{
				return trim(com_create_guid(), '{}');
			}

			return sprintf('%04X%04X-%04X-%04X-%04X-%04X%04X%04X', mt_rand(0, 65535), mt_rand(0, 65535), mt_rand(0, 65535), mt_rand(16384, 20479), mt_rand(32768, 49151), mt_rand(0, 65535), mt_rand(0, 65535), mt_rand(0, 65535));
		}
		/* Login Code */
		if(isSet($_POST['email']) && isSet($_POST['passwd']) && trim($_POST['typed'])=='Login'){
			$uname		= mysqli_real_escape_string($con,$_POST['email']);
			$password	= mysqli_real_escape_string($con,$_POST['passwd']);

			$qry="SELECT * FROM users WHERE email='$uname' AND password='$password'";
			$login = $db->TransQry($qry,$con);

			if(mysqli_num_rows($login)>0){
				$fetch	= mysqli_fetch_array($login);

				if($fetch['active']=='0'){
					echo "<label class='error'>Access Denied. Please Contact to Administrator.</label>";
				}
				else{
		// print_r($fetch);exit;
			$_SESSION["UserData"]=$fetch;//exit;
			// print_r($_SESSION["UserData"]);exit;
			if($fetch['image']!=''){
					$_SESSION['profile_pic']	= $fetch['image'];//exit;
				}
				else{
					$_SESSION['profile_pic']	= 'user.png';//exit;
				}
				echo 1;

			}	
		}
		else{
			echo "<label class='error'>Invalid email or password.</label>";
		}
	}
	/* register Code */
	else if(trim($_POST['typed'])=='register'){
		$name = $_REQUEST['name'];
		$email = $_REQUEST['email'];
		$mobile = $_REQUEST['mobile'];
		$userID = GUID();

		$check_user = "select email from users where email='".$email."'";
		$check_exist=$db->TransQry($check_user,$con);
		if(mysqli_num_rows($check_exist)>0)
		{
			echo "<label class='error'>Email is already exist!</label>"; 
		// echo '<meta http-equiv="refresh" content="2;URL=login-register.php" />';
		}
		else if($name!='' and $email!='' and $mobile!=''){
			$insert = "insert into users(userID,type,name,email,phone,e_date,active,localIP) values('".$userID."',0,'".$name."','".$email."','".$mobile."',NOW(),1,'".$localIP."')";
			$ins = $db->TransQry($insert, $con);
			if($ins){
				echo "<label class='success'>Data save successfully. !</label>"; exit;
		// echo '<meta http-equiv="refresh" content="2;URL=login-register.php" />';
			}
			else{
				$_SESSION['err']="ERROR!!!";
			}

		}else{
			echo "<label class='error'>All Field are mendatory</label>";
		}

	}
	else if(trim($_POST['typed'])=='Edit Account'){
		$detail = loginuser();

		// echo $detail[0]['name'];exit;
		$fname = $_REQUEST['fname'];
		$lname = $_REQUEST['lname'];
		$email = $_REQUEST['email'];
		$cpass = $_REQUEST['cpass'];
		$npass = $_REQUEST['npass'];
		$confirmpass = $_REQUEST['confirmpass'];
		$userID = GUID();

		$check_user = "select email,password,userID from users where email='".$detail[0]['email']."'";
		$check_exist=$db->TransQry($check_user,$con);
		if(mysqli_num_rows($check_exist)>0)
		{
			$fetch	= mysqli_fetch_array($check_exist);
			if($cpass!=$fetch['password'])
			{
				echo "<label class='error'>Wrong Current Password</label>";
			}
			else if($npass!=$confirmpass)
			{
				echo "<label class='error'>Your Confirm Password Not Match</label>";
			}
			else if($email!='' and $cpass!='' and $npass!='' and $confirmpass!='')
			{
				$update_acc = "update  users SET f_name='".$fname."',l_name='".$lname."',email='".$email."',password='".$confirmpass."' where userID='".$fetch['userID']."'";
				$ins = $db->TransQry($update_acc, $con);
				if($ins)
				{
					echo "<label class='success'>Your Account Detail Updated Successfully. !</label>";
					echo '<meta http-equiv="refresh" content="2;URL=edit-account.php" />';
				}
				else
				{
					$_SESSION['err']="ERROR!!!";
				}
			}

		}
		else{
			echo "<label class='error'>User Detail Not Exist Please Contact to Administrator</label>";
		}

	}

	else if(trim($_POST['typed'])=='Edit Address'){
		$detail = loginuser();
		$fname = $_REQUEST['fname'];
		$lname = $_REQUEST['lname'];
		$cname = $_REQUEST['cname'];
		$u_address = $_REQUEST['u_address'];
		$u_address2 = $_REQUEST['u_address2'];
		$u_city = $_REQUEST['u_city'];
		$u_country = $_REQUEST['u_country'];
		$pin_code = $_REQUEST['pin_code'];
		$userID = GUID();

		$check_user = "select email,password,userID from users where email='".$detail[0]['email']."'";
		$check_exist=$db->TransQry($check_user,$con);
		if(mysqli_num_rows($check_exist)>0)
		{
			$fetch	= mysqli_fetch_array($check_exist);
		/* if($email!='' and $cpass!='' and $npass!='' and $confirmpass!='')
		{ */
			$update_acc = "update  users SET f_name='".$fname."',l_name='".$lname."',c_name='".$cname."',country='".$u_country."',city='".$u_city."',address='".$u_address."',address2='".$u_address2."' ,pin_code='".$pin_code."' where userID='".$fetch['userID']."'";
			$ins = $db->TransQry($update_acc, $con);
			if($ins)
			{
				echo "<label class='success'>Your Account Detail Saved Successfully. !</label>";
				echo '<meta http-equiv="refresh" content="2;URL=edit-address.php" />';
			}
			else
			{
				$_SESSION['err']="ERROR!!!";
			}
		// }

		}
		else{
			echo "<label class='error'>User Detail Not Exist Please Contact to Administrator</label>";
		}

	}

	/* Calculate Form Submision */


	else if(trim($_POST['typed'])=='Billing'){
		$fname = $_REQUEST['fname'];
		$lname = $_REQUEST['lname'];
		$email = $_REQUEST['email'];
		$mobile = $_REQUEST['mobile'];
		$cname = $_REQUEST['cname'];
		$address1 = $_REQUEST['address1'];
		$address2 = $_REQUEST['address2'];
		$city = $_REQUEST['city'];
		$state = $_REQUEST['state'];
		$pincode = $_REQUEST['pincode'];
		$acpass = '12345';
		$userID = GUID();

		$check_user = "select email from users where email='".$email."'";
		$check_exist=$db->TransQry($check_user,$con);
		if(mysqli_num_rows($check_exist)>0)
		{
			echo "<label class='error'>Email is already exist!</label>"; 
		// echo '<meta http-equiv="refresh" content="2;URL=login-register.php" />';
		}
		else if($fname!='' and $email!='' and $mobile!=''){
			$insert = "insert into users(userID,type,f_name,l_name,email,phone,c_name,password,address,address2,state,city,pin_code,e_date,active,localIP) values('".$userID."',0,'".$fname."','".$lname."','".$email."','".$mobile."','".$cname."','".$acpass."','".$address1."','".$address2."','".$state."','".$city."','".$pincode."',NOW(),1,'".$localIP."')";
			$ins = $db->TransQry($insert, $con);
			if($ins){

		echo "<label class='success'>Your information save successfully. !</label>";// exit;
		echo '<meta http-equiv="refresh" content="2;URL=book-now.php" />';
	}
	else{
		$_SESSION['err']="ERROR!!!";
	}

}else{
	echo "<label class='error'>All Field are mendatory</label>";
}

}
/* ORDER SUBMIT */
else if(trim($_POST['typed'])=='Order Now')
{
	$detail = loginuser();
	$cod = $_REQUEST['cod'];
	$pau = $_REQUEST['pau'];
	$creditcard = $_REQUEST['creditcard'];
	$debitcard = $_REQUEST['debitcard'];
	$netbank = $_REQUEST['netbank'];
	$accept = $_REQUEST['accept'];
	$orderID = GUID();
		// echo $detail[0]['userID'];
	$total_price=0;
	foreach ($_SESSION["cart_item"] as $item){
		$item_price = $item["quantity"]*$item["price"];
		$ship_price = $item["ship_price"];
		$total_price += ($item["price"]*$item["quantity"]);
		$TotalPrice = $total_price + $ship_price;


		$insert = "insert into orders(orderID,userID,productID,quantity,weight,slug,sub_total,total_amt,pay_mode,pay_status,o_status,e_date,active,localIP) values('".$orderID."','".$detail[0]['userID']."','".$item["productID"]."','".$item["quantity"]."','".$item["weight"]."','".$item["slug"]."','".$total_price."','".$TotalPrice."','".$cod."','1','1',NOW(),1,'".$localIP."')";
		$ins = $db->TransQry($insert, $con);
		if($ins){

		echo "<label class='success'>Your information save successfully. !</label>";// exit;
		echo '<meta http-equiv="refresh" content="2;URL=order-complete.php" />';
	}
	else{
		$_SESSION['err']="ERROR!!!";
	}  
}
}
/* Apply Coupon Code */
else if(trim($_POST['typed'])=='Coupon Code')
{
	$coupcode		= mysqli_real_escape_string($con,$_POST['coupcode']);
	$qry="SELECT * FROM coupon WHERE coupon='".$coupcode."' AND active='1'";
	$getcoupon = $db->TransQry($qry,$con);

	if(mysqli_num_rows($getcoupon)>0)
	{
		// $detail = loginuser();
		// echo $detail[0]['userID'];
		$carctval = getcartval();
		$total_price=0;

		foreach ($_SESSION["cart_item"] as $item)
		{
			$item_price = $item["quantity"]*$item["price"];
			$ship_price = $item["ship_price"];
			$productID = $item["productID"];
			$total_price += ($item["price"]*$item["quantity"]);
			$TotalPrice = $total_price + $ship_price;
		}
				// echo $total_price;
		// echo "<pre/>";print_r($carctval);
		$fetch	= mysqli_fetch_assoc($getcoupon);
		$exp=$fetch['exp_date'];
		$start=$fetch['start_date'];
		$product_id=$fetch['productID'];
		$current=date('Y-m-d');
		$exp_date=strtotime($exp);
		$current_date=strtotime($current);
		$_SESSION['no_used']=$fetch['used']; 
		// $_SESSION['discount']=$fetch['d_price'];
		// $_SESSION['min_discount']=$fetch['min_dis_on'];

		if($exp_date < $current_date)
		{
			echo "<label class='error'>Coupon Code Expired!</label>";
			$_SESSION['discount']=0;
		}

		if($fetch['active']=='0'){
			echo "<label class='error'>This code is not active.</label>";
			$_SESSION['discount']=0;
		}else if($fetch['coupon']!=$coupcode){
			echo "<label class='error'>Invalid coupon code.</label>";
			$_SESSION['discount']=0;
		}
		else if($fetch['min_dis_on']>$total_price){
			echo "<label class='error'>Total Amount is less for this Offer.</label>";
			$_SESSION['discount']=0;
		}
		/* else if($product_id!=$productID OR $_SESSION["cart_item"]!=''){
		echo "<label class='error'>Not available for this product</label>";
		$_SESSION['discount']=0;
	} */
	else
	{
		$_SESSION['coupon']=$fetch['coupon'];



		if(!isset($_SESSION["UserData"]))
		{ 
			if(!isset($_SESSION['discount'])){
				$_SESSION['discount']=$fetch['d_price'];
				$_SESSION['min_discount']=$fetch['min_dis_on'];
				echo "<label class='success'>Coupon code added Successfully</label>";
				echo '<meta http-equiv="refresh" content="2;url=view_cart.php" />';

			// header('location:view_cart.php');exit;
			// echo "cart should be update(write code for update cart)";
			}else{
				echo "<label class='error'>already added this coupon</label>";
			}
		}
		else
		{
			$abcd =$_SESSION["UserData"];
			$sql1="select * from orders where userID='".$abcd['userID']."' and coupon='".$_SESSION['coupon']."' ";
			$sql = $db->TransQry($sql1,$con);
			$used=mysqli_num_rows($sql);
			if($used>=$fetch['used'])
			{
				$_SESSION['discount']=0;
				echo "<label class='error'>Coupon code already used!</label>";
			}	
			else
			{
				if(isset($_SESSION['discount']))
				{
					$_SESSION['discount']=$fetch['d_price'];
					$_SESSION['min_discount']=$fetch['min_dis_on'];
		           // echo "cart should be update(write code for update cart) not used this coupon by this user";
					echo "<label class='success'>Coupon code added Successfully</label>";
					echo '<meta http-equiv="refresh" content="2;url=view_cart.php" />';
		           // echo 1; 
				}else{
					echo "Already used this coupon code";
				}
			}
		}
	}
}
else{
	echo "<label class='error'>Invalid Coupon Code!</label>";
}

		/* 
		$detail = loginuser();
		$coupcode = $_REQUEST['coupcode'];
		$orderID = GUID();
		// echo $detail[0]['userID'];
		$total_price=0;
		foreach ($_SESSION["cart_item"] as $item){
				$item_price = $item["quantity"]*$item["price"];
				$ship_price = $item["ship_price"];
				$total_price += ($item["price"]*$item["quantity"]);
				$TotalPrice = $total_price + $ship_price;


		echo $insert = "insert into orders(orderID,userID,productID,quantity,weight,slug,sub_total,total_amt,pay_mode,pay_status,o_status,e_date,active,localIP) values('".$orderID."','".$detail[0]['userID']."','".$item["productID"]."','".$item["quantity"]."','".$item["weight"]."','".$item["slug"]."','".$total_price."','".$TotalPrice."','".$cod."','1','1',NOW(),1,'".$localIP."')";
		$ins = $db->TransQry($insert, $con);
		if($ins){

		echo "<label class='success'>Your information save successfully. !</label>";// exit;
		echo '<meta http-equiv="refresh" content="2;URL=order-complete.php" />';
		}
		else{
		$_SESSION['err']="ERROR!!!";
		}  
	} */
}

/* Search Product */
else if(trim($_POST['typed'])=='search')
{
	$search = $_REQUEST['search'];

	if($search!='')
	{
		header('Location: product-ajax.php?search='.$search); //exit();
	}

}


if( isset($_POST['faq_submit']) || isset($_POST['submit_model']) || isset($_POST['contact_now']))
{
	if (isset($_POST['submit_model'])) 
	{
		$type = 1;
		$email		= mysqli_real_escape_string($con,$_POST['email']);
		$mobile		= mysqli_real_escape_string($con,$_POST['mobile_no']);
		$terms_conditions	= mysqli_real_escape_string($con,$_POST['terms_conditions']);
		if ($terms_conditions == 'on') {
			$terms_conditions = 1;
		}
		else
		{
			$terms_conditions = null;
		}
	}
	elseif (isset($_POST['contact_now']))
	{
		$type = 2;
		$email		= mysqli_real_escape_string($con,$_POST['email']);
		$mobile		= mysqli_real_escape_string($con,$_POST['mobile_no']);
		$terms_conditions	= mysqli_real_escape_string($con,$_POST['terms_conditions_modal']);
		if ($terms_conditions == 'on') {
			echo $terms_conditions = 1;
		}
		else
		{
			$terms_conditions = null;
		}
	}
	else
	{
		$type 		= 0;
		$name		= mysqli_real_escape_string($con,$_POST['name']);
		$email		= mysqli_real_escape_string($con,$_POST['email']);
		$mobile		= mysqli_real_escape_string($con,$_POST['mobile_no']);
		$message	= mysqli_real_escape_string($con,$_POST['message']);
	}

	$qry_mail="insert into contacted_users(type,name,email,mobile_no,message,terms_conditions,localIP) values('".$type."','".$name."','".$email."','".$mobile."','".$message."','".$terms_conditions."','".$_SERVER['REMOTE_ADDR']."')";
	$insert = mysqli_query($con,$qry_mail); 
	if($insert)
	{
		/* ID: info@uniqueerp.co.in
		pass: Vridhi@95 */
		$mail = new PHPMailer(true);                             // Passing `true` enables exceptions
		try {
		                       // Enable verbose debug output
			$mail->isSMTP();  
		    $mail->SMTPDebug = 2;                                      // Set mailer to use SMTP
		    $mail->Host = 'sg3plcpnl0179.prod.sin3.secureserver.net';  // Specify main and backup SMTP servers
		    $mail->SMTPAuth = true;                               	   // Enable SMTP authentication
		    $mail->Username = 'info@uniqueerp.co.in';               // SMTP username
		    $mail->Password = 'Vridhi@95';                           // SMTP password
		    $mail->SMTPSecure = 'tls';                           // Enable TLS encryption, `ssl` also accepted
		    $mail->Port = 587;   									// TCP port to connect to
		    $mail->CharSet = "UTF-8";                                

		    //Recipients
		    $mail->setFrom('info@uniqueerp.co.in', 'Hills Traveller');
		    $mail->addAddress($email);    // Add a recipient

		    //Content
		    $mail->isHTML(true);                                  // Set email format to HTML
		    $mail->Subject = 'Hills Traveller';
		    $mail->Body    = "<html>
		    <head>
		    <title>Contact Of Hills Traveller</title>
		    </head>
		    <body>
		    <center><h1>Hills Traveller</h1> </center>
		    <center>
		    <table style='border:1px solid; width: 440px; height: 300px; font-size: 17px;'>

		    <tr>
		    <th style='background-color:#4CAF50;'>Name:</th>
		    <td style='background: linear-gradient(#D3CCE3,#E9E4F0); text-align:center;'>$name</td>
		    </tr>

		    <tr>
		    <th style='background-color:#4CAF50;'>Email:</th>
		    <td style='background: linear-gradient(#D3CCE3,#E9E4F0); text-align:center;'>$email</td>
		    </tr>

		    <tr>
		    <th style='background-color:#4CAF50;'> Subject:</th>
		    <td style='background: linear-gradient(#D3CCE3,#E9E4F0); text-align:center;'>$mobile</td>
		    </tr>


		    <tr>
		    <th style='background-color:#4CAF50;'> Message</th>
		    <td style='background: linear-gradient(#D3CCE3,#E9E4F0); text-align:center;'>$message</td>
		    </tr>

		    </table>
		    </center>
		    </body>
		    </html>";
		        // 
		    $mail->send();
		    $msg= '<label class="success" style="color:green;">Thank you, One of our team member will get back to you</label>';
		    echo '<meta http-equiv="refresh" content="3;URL=index.php" />';
		} catch (Exception $e) {
			echo 'Message could not be sent. Mailer Error: ', $mail->ErrorInfo;
		}

		// echo '<label class="success">Data save successfully</label>';
		echo '<meta http-equiv="refresh" content="3;URL=index.php" />';
		/*echo '<meta http-equiv="refresh" content="3" />' ?><script>setTimeout(refresh, 3);</script>;<?php*/
	}
}


if( isset($_POST['search_destination']))
{
	$output = '';
	$valueToSearch = mysqli_real_escape_string($con, $_POST["search_destination"]);
	if ($valueToSearch) 
	{
		$query_search = "SELECT * FROM category WHERE CONCAT(ID, name, slug, parantID) LIKE '%".$valueToSearch."%' limit 5"; 
		$search_result = mysqli_query($con,$query_search);
		$output .= '<ul>';
		while($row1 = mysqli_fetch_array($search_result))
		{
			$output .= '<li>'.$row1["name"].' </li>';
		}
		'</ul';
		echo $output;
	}
	else
	{
		echo 'Record Not Found';
	}
}
?>





