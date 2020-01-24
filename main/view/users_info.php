<?php
require_once('main/controller/dbclass.php');
include('include/define.php');
$db=new dbclass();$con=$db->Connection();

require_once 'vendor/autoload.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
$localIP = $_SERVER['REMOTE_ADDR'];

if( isset($_POST['faq_submit']))
	{
		$name		= mysqli_real_escape_string($con,$_POST['name']);
		$email		= mysqli_real_escape_string($con,$_POST['email']);
		$mobile		= mysqli_real_escape_string($con,$_POST['mobile_no']);
		$message	= mysqli_real_escape_string($con,$_POST['message']);

echo $qry="insert into contacted_users(name,email,phone,course,message,type,edate,localIP) values('".$name."','".$email."','".$mobile."','".$message."','".$_SERVER['REMOTE_ADDR']."')";
		$insert = $db->TransQry($qry,$con);
		if($insert)
		{
			/* ID: info@uniqueerp.co.in
			pass: Vridhi@95 */
			$mail = new PHPMailer(true);                             // Passing `true` enables exceptions
	try {
    //Server settings
  // $mail->SMTPDebug = 2;                                 // Enable verbose debug output
    $mail->isSMTP();                                      // Set mailer to use SMTP
    $mail->Host = 'sg3plcpnl0179.prod.sin3.secureserver.net';  // Specify main and backup SMTP servers
    $mail->SMTPAuth = true;                               // Enable SMTP authentication
    $mail->Username = 'arun@vridhisoftech.in';               // SMTP username
    $mail->Password = 'Vridhi@95';                           // SMTP password
    $mail->SMTPSecure = 'tls';                           // Enable TLS encryption, `ssl` also accepted
    $mail->Port = 587;                                   // TCP port to connect to

    //Recipients
    $mail->setFrom('arun@vridhisoftech.in', 'Hills Traveller');
    $mail->addAddress("arun@vridhisoftech.in");    // Add a recipient

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
    // print_r($mail->send());die();
 	echo '<label class="success">Thank you, One of our team member will get back to you</label>';
 	          // echo '<meta http-equiv="refresh" content="5;URL=contact.php" />';
	} catch (Exception $e) {
	    echo 'Message could not be sent. Mailer Error: ', $mail->ErrorInfo;
	}
			
			
			// echo '<label class="success">Data save successfully</label>';
			echo '<meta http-equiv="refresh" content="5" />' ?><script>setTimeout(refresh, 5);</script>;<?php
		}
	
		
	} 