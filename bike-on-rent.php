<?php 
require_once('main/controller/dbclass.php');
include('include/define.php');
$db=new dbclass();$con=$db->Connection();
$url = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
$link_array = explode('/',$url);
$packID = end($link_array);
$localIP = $_SERVER['REMOTE_ADDR'];

$reg_rent_id = $_GET['reg_rent'];

if (isset($_POST['bike_rent_submit'])) 
{       

  $userID     = mt_rand(1000000,9999999);
  $name    =    $_POST['name'];
  $rent_id     = $_POST['rent_id'];
  $contact    =    $_POST['contact'];
  $city   =  $_POST['city'];
  $destination      =    $_POST['destination'];
  $vehicle_model = $_POST['vehicle_model'];
  $arrival_date = $_POST['arrival_date'];
  $departure_date = $_POST['departure_date'];

  $insert = "insert into registered_vehicles(userID,rent_id,name,contact,city,destination,vehicle_model,arrival_date,departure_date,type,active,localIP) values('".$userID."','".$rent_id."','".$name."','".$contact."','".$city."','".$destination."','".$vehicle_model."','".$arrival_date."','".$departure_date."',2,1,'".$localIP."')";
  $ins = $db->TransQry($insert, $con);
  if($ins){

                $msg = "<label class='success'>Your information save successfully. !</label>";// exit;
                // echo '<meta http-equiv="refresh" content="1;URL=book-now" />';
                echo '<meta http-equiv="refresh" content="2" />' ?><script>setTimeout(refresh, 2);</script>;<?php
             }
             else
             {
               $msg = "<label class='success'>Something Went Wrong. !</label>";
               echo '<meta http-equiv="refresh" content="2" />' ?><script>setTimeout(refresh, 2);</script>;<?php
            }

         }

   ?>
<!DOCTYPE html>
<html lang="en">
   <head>
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <title>Welcome To Hills Traveler</title>
      <!--Favicon-->
      <link rel="shortcut icon" href="<?PATH?>images/favicon.ico" type="image/x-icon">
      <link rel="icon" href="<?PATH?>images/favicon.ico" type="image/x-icon">
      <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,700,300' rel='stylesheet' type='text/css'>
      <!-- Animate.css -->
      <link rel="stylesheet" href="<?PATH?>css/animate.css">
      <!-- Owl Carsoul.css -->
      <link rel="stylesheet" href="<?PATH?>css/owl.carousel.min.css">
      <!-- Font Awesome5 Fonts-->
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
      <!-- Icomoon Icon Fonts-->
      <link rel="stylesheet" href="<?PATH?>css/icomoon.css">
      <!-- Bootstrap  -->
      <link rel="stylesheet" href="<?PATH?>css/bootstrap.min.css">
      <!-- Superfish -->
      <link rel="stylesheet" href="<?PATH?>css/superfish.css">
      <!-- Magnific Popup -->
      <link rel="stylesheet" href="<?PATH?>css/magnific-popup.css">
      <!-- Date Picker -->
      <link rel="stylesheet" href="<?PATH?>css/bootstrap-datepicker.min.css">
      <!-- CS Select -->
      <link rel="stylesheet" href="<?PATH?>css/cs-select.css">
      <link rel="stylesheet" href="<?PATH?>css/cs-skin-border.css">
      <link rel="stylesheet" href="<?PATH?>css/style.css">
      <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css">
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
      <style>
         .hea h3 {
         color: #fff;
         margin-top: 10%;
         padding: 2px 0px 25px;
         font-size: 40px;
         text-shadow: 2px 2px 2px #000;
         }
         /*----------------------form login- signup css star----*/
         form.form h3 {
         text-align: center;
         padding-bottom: 30px;
         font-size: 30px;
         font-weight: 600;
         }
         .form {
         width: 100%;
         padding: 25px 35px 15px 1px;
         }
         .nav-btn button {
         width: 49%;
         height: 40px;
         border: none;
         text-decoration: none;
         font-size: 20px;
         font-weight: 600;
         letter-spacing: 1px;
         background: #4f5050ad;
         }
         .nav-btn a {
         color: white;
         }
         button.active {
         background: #09f9a8b0;
         }
         .sing-btn button {
         width: 49%;
         height: 40px;
         color: #9e2e2e;
         font-size: 13px;
         font-weight: 600;
         }
         button.fb-btn {
         background: #3b5998;
         border: none;
         color: white;
         width: 50%;
         float: left;
         height: 40px;
         font-size: 13px;
         text-align: center;
         outline: none;
         }
         button.google-btn {
         background: #CC3333;
         border: none;
         color: white;
         width: 50%;
         height: 40px;
         font-size: 13px;
         text-align: center;
         outline: none;
         }
         form.form p a {
         color: #009a00;
         text-decoration: none;
         margin-left: 10px;
         }
         .tab {
         overflow: hidden;
         }
         .tab button {
         width: 50%;
         height: 60px;
         font-size: 14px;
         text-align: center;
         background: #eaae21;
         color: white;
         float: left;
         outline: 1px solid;
         cursor: pointer;
         border: none;
         }
         .tab button img {
         margin-bottom: 10px;
         width: 45px;
         }
         .tab button span {
         margin-bottom: -8px;
         font-size: 22px;
         display: block;
         }
         .tab button.active {
         background-color: #d9534f;
         }
         .tab h3 {
         font-weight: 600;
         text-align: center;
         font-size: 35px
         letter-spacing: 2px;
         color: white;
         }
         .tabcontent {
         display: none;
         border-top: none;
         font-size: 12px;
         }
         .checkbox input {
         height: 20px;
         width: 16px;
         }
         .radio input {
         height: 20px;
         width: 16px;
         top: -4px;
         }
         .checkbox p {
         position: relative;
         top: -5px;
         right: -41px;
         }
         .pagination>.active>a, .pagination>.active>a:focus, .pagination>.active>a:hover, .pagination>.active>span, .pagination>.active>span:focus, .pagination>.active>span:hover {
         z-index: 3;
         color: #fff;
         cursor: default;
         background-color: #83b900;
         border-color: #83b900;
         }
         .checkbox input[type="checkbox"] {
         margin-left: 0px !important;
         top: -4px;
         }
         .checkbox label input {
         position: relative;
         left: 0;
         }
         .frm-hadding {
         color: white;
         width: 100%;
         padding: 10px 0px 0px 20px;
         }
         .login-form {
         width: 90%;
         float: right;
         background: #fff;
         margin-top: 44px;
         }
         .login-form h2 {
         text-align: center;
         margin-top: 0px;
         font-size: 20px;
         font-weight: 600;
         margin-bottom: 15px;
         background: #d95450;
         padding: 15px;
         color: #fff;
         }
         .loging-form-img {
         float: left;
         width: 344px;
         padding: 0px 0px;
         margin-top: 10%;
         }
         .loging-form-img img {
         width: 100%;
         }
         .radio input {
         position: relative;
         top: 1px;
         }
         .form input {
         font-weight: 500;
         font-size: 15px;
         }
         .radio {
         line-height: 14px;
         background: white;
         padding: 5px 5px 5px 10px;
         font-size: 14px;
         position: relative;
         border: 1px solid #cacaca;
         border-radius: 5px;
         }
         .form-icn {
         font-size: 20px;
         color: #3e3e3e;
         }
         .btn1 {
         margin-top: 30px;
         }
         .form-control{
         font-weight: 500;
         }
         .tab1 button {
         width: 100px;
         height: 40px;
         margin-top: 40px;
         font-weight: 500;
         text-transform: uppercase;
         }
         .tab1 {
         border-bottom: 3px solid #d9534f;
         }
         .pak-box1 {
         border: 1px solid #c3c3c3;
         margin-bottom: 20px;
         margin-top: 10px;
         box-shadow: 0px 0px 10px #e4e4e4;
         }
         .pak-img {
         border-bottom: 3px solid #d9534f;
         margin-bottom: 8px;
         }
         .pak-con {
         padding: 10px;
         border-bottom: 3px solid #c3c3c3;
         }
         .pak-con h5 {
         font-size: 20px;
         color: #d9534f;
         font-weight: 600;
         margin-bottom: 10px;
         }
         .pak-con p {
         font-size: 14px;
         line-height: 21px;
         margin-bottom: 10px;
         }
         .pak-con h4 {
         margin-bottom: 10px;
         font-size: 16px;
         line-height: 22px;
         color: #d9534f;
         }
         .pak-img img {
         width: 100%;
         }
         .tab1 h3 {
         margin-top: 20px;
         margin-bottom: 20px;
         font-weight: 600;
         font-size: 30px;
         }
         /*-------------------------end form css------------------*/
      </style>
   </head>
   <body>
      <div id="tb-wrapper">
         <div id="tb-page">
            <?php include('include/header.php');?>
            <div class="row">
               <div class="" style="background-image: url(<?PATH?>xtreme-sports-banner.jpg);  min-height: 460px; background-size: 100% 100%;">
                  <div class="container">
                     <div class="col-md-6"></div>
                     <div class="col-md-6">
                        <div class="login-form">
                           <h2>BOOK YOUR BIKE</h2>
                           <div>
                              <form class="form-horizontal form" method="post">
                                 <p class="text-center" style="color:green;font-weight:700;"> <?php if(isset($msg) and $msg!='') echo $msg;?></p>
                                 <div class="form-group">
                                    <label class="control-label col-sm-2"><span class="form-icn"><i class="fas fa-city" aria-hidden="true"></i></span></label>
                                    <div class="col-sm-10">
                                       <select id="city" class="form-control" name="city" required>
                                          <option selected disbled>---Select City---</option>
                                          <?php
                                             $query1 ="select * from mast_state where countryID = 81  order by stateID desc "; 
                                             $run = mysqli_query($con,$query1);
                                             while($row2 = mysqli_fetch_assoc($run))
                                             {
                                             ?> 
                                          <optgroup label="&nbsp;&nbsp;<?=$row2['state']?>"></optgroup>
                                          <?php
                                             $query2 ="select * from mast_city where countryID =81  and stateID ='".$row2['stateID']."' order by cityID desc "; 
                                             $run_2 = mysqli_query($con,$query2);
                                             while($row3 = mysqli_fetch_assoc($run_2))
                                             {
                                             ?>
                                          <option value="<?=$row2['stateID']?>"><?=$row3['city']?></option>
                                          <?php      }
                                             }
                                             ?>
                                       </select>
                                    </div>
                                 </div>
                                 <div class="form-group">
                                    <label class="control-label col-sm-2"><span class="form-icn"><i class="fa fa-motorcycle" aria-hidden="true"></i></span></label>
                                    <div class="col-sm-10">
                                       <select class="form-control" name="vehicle_model" required>
                                          <option selected disabled>---Select Bike Model---</option>
                                          <option value="Apache">Apache</option>
                                          <option value="Avenger">Avenger</option>
                                          <option value="Bullet">Bullet</option>
                                          <option value="R-15">R-15</option>
                                          <option value="Gixer">Gixer</option>
                                       </select>
                                    </div>
                                 </div>
                                 <div class="form-group">
                                    <label class="control-label col-sm-2"><span class="form-icn"><i class="fa fa-calendar" aria-hidden="true"></i></span></label>
                                    <div class="col-sm-5">
                                       <label class="">From</label>
                                       <input type="text" class="form-control" id="arrival_date"  name="arrival_date">
                                    </div>
                                    <div class="col-sm-5">
                                       <label class="">To</label>
                                       <input type="text" class="form-control" id="departure_date"  name="departure_date">
                                    </div>
                                 </div>
                                 <div class="form-group">
                                    <label class="control-label col-sm-2"><span class="form-icn"><i class="fa fa-phone" aria-hidden="true"></i></span></label>
                                    <div class="col-sm-5">
                                       <input type="text" class="form-control" placeholder="Mobile No" name="contact" pattern="[789][0-9]{9}" maxlength="10" required>
                                    </div>
                                    <div class="col-sm-5">
                                       <input type="text" class="form-control" placeholder="Name" name="name" required>
                                    </div>
                                 </div>
                                 <div class="form-group btn1">
                                    <div class="col-sm-offset-2 col-sm-10 text-center">
                                       <button type="submit" name="bike_rent_submit" class="btn btn-warning">Submit</button>
                                    </div>
                                 </div>
                              </form>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
         <div class="container">
            <div class="row">
               <div class="col-md-12">
                  <div class="tab1">
                     <h3>Fleets</h3>
                  </div>
                  <div>
                     <div class="row">
                        <?php 
                           $onrent_query= "SELECT * FROM onrent where type=2 and active=1";
                           $run = mysqli_query($con,$onrent_query);
                           while($onrent = mysqli_fetch_assoc($run)) { ?>
                        <div class="col-md-3">
                           <div class="pak-box1">
                              <a href="?reg_rent=<?=$onrent['ID']?>#reg_vehicle">
                                 <div class="pak-img">
                                    <img src="<?=PATH?>main/uploads/rent/<?=$onrent['image']?>">
                                 </div>
                              </a>
                              <div class="pak-con">
                                 <h5><?=$onrent['name'] ?></h5>
                                 <p><?=$onrent['Narration'] ?>&ensp;<a href="#">More learn...</a></p>
                                 <h4><?=$onrent['off_price'] ?></h4>
                                 <!-- <div class="text-center"><a href="?reg_rent=<?=$onrent['ID']?>#reg_vehicle" class="btn btn-warning" >Book Now</a></div> -->
                                 <div class="text-center"><a href="#reg_vehicle_modal" class="btn btn-warning modaluario" data-a="<?=$onrent['ID']?>&type=<?=$onrent['type']?>" data-toggle="modal" data-backdrop='static' data-keyboard='false' title='Editar usuario'>Book Now</a></div>
                              </div>
                           </div>
                        </div>
                     </div>
                     <?php } ?>
                  </div>
               </div>
            </div>
         </div>
         <!-- Modal For Pop Up -->
         <!-- Modal -->
         <div id="reg_vehicle_modal" class="modal fade" role="dialog">
            <!--  <div class="modal fade" id="myModal" role="dialog"> -->
            <div class="modal-dialog">
               <!-- Modal content-->
               <div class="modal-content">
               </div>
            </div>
         </div>
         <!-- Footer main Start -->
         <?php include "include/footer.php"; ?>
      </div>
      <!-- END tb-page -->
      <!-- END tb-wrapper -->
      <!-- jQuery -->
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Zebra_datepicker/1.9.13/css/default/zebra_datepicker.min.css">
      <script src="https://cdnjs.cloudflare.com/ajax/libs/Zebra_datepicker/1.9.13/zebra_datepicker.min.js"></script>
      <script>
         $(document).ready(function(){
         $('#arrival_date').Zebra_DatePicker({
         direction: true,
         pair: $('#arrival_date'),
         format:'d.m.Y H:i'
         
         });
         
         $('#departure_date').Zebra_DatePicker({
         format:'d.m.Y H:i',
         direction: 1
           });
         });
         
         /*------------------Modal register rent------------*/
         $('.modaluario').click(function(){
              var ID=$(this).attr('data-a');
              $.ajax({url:"modal_reg_rent.php?ID="+ID,cache:false,success:function(result){
                  $(".modal-content").html(result);
              }});
          });
         
         function openCity(evt, cityName) {
          var i, tabcontent, tablinks;
          tabcontent = document.getElementsByClassName("tabcontent");
          for (i = 0; i < tabcontent.length; i++) {
            tabcontent[i].style.display = "none";
          }
          tablinks = document.getElementsByClassName("tablinks");
          for (i = 0; i < tablinks.length; i++) {
            tablinks[i].className = tablinks[i].className.replace(" active", "");
          }
          document.getElementById(cityName).style.display = "block";
          evt.currentTarget.className += " active";
         }
      </script>
   </body>
</html>