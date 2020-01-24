      <?php
      session_start();
      require_once('main/controller/dbclass.php');
      include('include/define.php');
      include('functions/functions.php');
      $db=new dbclass();$con=$db->Connection();
      $localIP = $_SERVER['REMOTE_ADDR'];
      $url = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
      $link_array = explode('/',$url);
      $packID = end($link_array);
      $book_id = base64_decode($_GET['id']); 

      /*All Packages*/
      $qry="Select package.*,pricing.lux_final_price,pricing.lux_regular_price,pricing.std_final_price,pricing.std_regular_price,pricing.prm_regular_price,pricing.prm_final_price,pricing.ID as priceID FROM package LEFT JOIN pricing ON pricing.packageID=package.ID where package.active='1' and package.ID='".$book_id."' order by package.ID DESC";
      $res=$db->SelectQry($qry,$con);  
      $Rows2 = mysqli_num_rows($res);  
      $packages=array();   
      if($Rows2 >0)  
      {  
         $i=0;    
         while($get_cat =mysqli_fetch_assoc($res))    
         {                    
            $packages[$i++]=$get_cat;
         }
         /*echo "<pre/>"; print_r($packages[0]['icons']);die();  */
      }

      if (isset($_POST['submit_caculate_price_btn'])) 
      {
         $userID     = mt_rand(1000000,9999999);
         $from_city = $_POST['from_city'];
         $to_city = $_POST['to_city'];
         $traveller_rooms = json_encode($_POST['travel_room']);
         $tour_facility = json_encode($packages[0]['icons']);
         $tour_name = $packages[0]['name'];
               // $number = $_POST['number'];
               // $number_child = $_POST['number_child'];
               // $number_bed = $_POST['number_bed'];
               // $number_infant = $_POST['number_infant'];
         $travelling_date = $_POST['travelling_date'];
         $traveller_mobile = $_POST['traveller_mobile'];
         $traveller_email = $_POST['traveller_email'];
         $terms_conditions = $_POST['terms_conditions'];
         if ($terms_conditions == 'on') {
          $terms_conditions = 1;
       }
       else
       {
         $terms_conditions = null;
      }

      $check_user = "select email from book_now where email='".$traveller_email."'";
      $check_exist=$db->TransQry($check_user,$con);
      $fetched = mysqli_fetch_assoc($check_exist);
      if(mysqli_num_rows($check_exist)>0)
      {
       $msg = "<label class='error'>Email is already exist!</label>"; 
       echo '<meta http-equiv="refresh" content="2" />' ?><script>setTimeout(refresh, 2);</script>;<?php
    }
    else if ($fetched['email'] == '')
    {
      $insert = "insert into book_now(category_id,package_id,userID,tour_name,email,phone,from_city,to_city,traveller_rooms,travel_date,tour_total_price,tour_facility,terms_conditions,active,localIP) values('".$packages[0]['category_id']."','".$book_id."','".$userID."','".$tour_name."','".$traveller_email."','".$traveller_mobile."','".$from_city."','".$to_city."','".$traveller_rooms."','".$travelling_date."','".$_SESSION['final_cost']."','".$tour_facility."','".$terms_conditions."',1,'".$localIP."')";
      $ins = $db->TransQry($insert, $con);
      if($ins){
         $msg = "<label class='success'>Your information save successfully. !</label>";
                     // echo '<meta http-equiv="refresh" content="1;URL=book-now" />';
         echo '<meta http-equiv="refresh" content="2" />' ?><script>setTimeout(refresh, 2);</script>;<?php
      }
      else
      {
         $_SESSION['err']="ERROR!!!";
      }
   }
   else
   {
      echo "<label class='error'>All Field are mendatory</label>";
   }
}

/*pricing table data*/
$pricing_query ="SELECT * from pricing where packageID = '".$book_id."' ";
$run_pricing = mysqli_query($con,$pricing_query);
$count_pricing= mysqli_num_rows($run_pricing);
$pricing = array();
while($fetched_pricing = mysqli_fetch_assoc($run_pricing)) 
{
   array_push($pricing, $fetched_pricing);
}

/*All Departure City*/
$departure_query ="SELECT aop.*,city.name,pricing.lux_per_bed_price as lpbp,pricing.std_per_bed_price as spbp,pricing.prm_per_bed_price as ppbp,pricing.packageID FROM add_on_price as aop left join city ON city.ID =aop.city left join pricing ON pricing.ID =aop.pricing_id where pricing.packageID !='' and pricing.packageID = '".$book_id."' and aop.pricing_id = '".$pricing[0]['ID']."'  ";
$run = mysqli_query($con,$departure_query);
$count_departure = mysqli_num_rows($run);
$departure = array();
while($fetched_departure = mysqli_fetch_assoc($run)) 
{
   array_push($departure, $fetched_departure);
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
   <link rel="shortcut icon" href="<?=PATH?>images/favicon.ico" type="image/x-icon">
   <link rel="icon" href="<?=PATH?>images/favicon.ico" type="image/x-icon">
   <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,700,300' rel='stylesheet' type='text/css'>
   <!-- Animate.css -->
   <link rel="stylesheet" href="<?=PATH?>css/animate.css">
   <!-- Owl Carsoul.css -->
   <link rel="stylesheet" href="<?=PATH?>css/owl.carousel.min.css">
   <!-- Font Awesome5 Fonts-->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
   <!-- Icomoon Icon Fonts-->
   <link rel="stylesheet" href="<?=PATH?>css/icomoon.css">
   <!-- Bootstrap  -->
   <link rel="stylesheet" href="<?=PATH?>css/bootstrap.css">
   <!-- Superfish -->
   <link rel="stylesheet" href="<?=PATH?>css/superfish.css">
   <!-- Magnific Popup -->
   <link rel="stylesheet" href="<?=PATH?>css/magnific-popup.css">
   <!-- Date Picker -->
   <link rel="stylesheet" href="<?=PATH?>css/bootstrap-datepicker.min.css">
   <!-- CS Select -->
   <link rel="stylesheet" href="<?=PATH?>css/cs-select.css">
   <link rel="stylesheet" href="<?=PATH?>css/cs-skin-border.css">
   <link rel="stylesheet" href="<?=PATH?>css/style.css">
   <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
</head>
<body>
   <div id="tb-wrapper">
      <div id="tb-page">
         <?php include('include/header.php');?>
         <div class="row">
            <div class="" style="background-image: url(<?=PATH?>images/Banner11.jpg);  min-height: 260px;  max-height: 260px; background-size: 100% ;">
               <div class="container">
                  <div class="text-center hea">
                     <h3><strong><?=$packages[0]['name']?></strong></h3>
                  </div>
               </div>
            </div>
         </div>
         <div class="container">
            <div class="row">
               <div class="text-center" id="error_traveller"></div>
               <form name="calculate_price" id="calculate_price" method="post">
                  <div class="col-md-12">
                     <div class="breadcrum">
                        <ul class="list-inline">
                           <li><a href="#">Home</a></li>
                           <li><b><?=$packages[0]['name']?></b></li>
                        </ul>
                     </div>
                  </div>
                  <div class="col-md-9">
                     <input type="hidden" name="" value="<?=$packages[0]['childcatID']?>">
                     <input type="hidden" name="" value="<?=$packages[0]['ID']?>">
                     <h3 class="top-hd"><?=$packages[0]['name']?></h3>
                     <div class="box-tab-top">
                        <div class="day-spa">
                           <img class="img-responsive" src="<?=PATH?>main/uploads/category/<?=$packages[0]['image']?>">
                           <p><?=$packages[0]['night']?><br><span>Nights</span></p>
                           <h5><?=$packages[0]['days']?><br><span>Day</span></h5>
                        </div>
                        <div class="port-po">
                           <h4 class="m-heading"><span><i class="" aria-hidden="true"></i></span></h4>
                           <div class="package-con-box1">
                              <ul>
                                 <?php 
                                 $qry1 = "select * FROM icons where ID IN(".$packages[0]['icons'].")";
                                 $RUN = $db->SelectQry($qry1,$con);
                                 while($getIcons =mysqli_fetch_assoc($RUN))      
                                 {
                                    $icon = $getIcons["image"];
                                    $name = $getIcons["name"];
                                    $id = $getIcons["ID"];
                                    $abcd = explode(',',$icon);
                                    ?>
                                    <div class="packg-iocn-box">
                                       <p class="packg-iocn-box" style="margin: 5px 0px;;"><span><?=ucfirst($name)?></span></p>
                                       <p style="margin: 0;"><img height="45" width="45" src="<?=PATH?>main/uploads/icon/<?=$icon?>"></p>
                                    </div>
                                    <?php 
                                 }
                                 ?>
                              </ul>
                           </div>
                           <div class="pack-select">
                              <h5>Choose Your Hotel</h5>
                              <div class="pack-sec-btn" onchange="getprice(1,<?=$packages[0]['ID']?>)" onclick="openCity(event, 'Standard')">
                                 <input checked type="radio" name="radio1" value="1" id="Standard_pi"> Standard 
                              </div>
                              <div class="pack-sec-btn" onchange="getprice(2,<?=$packages[0]['ID']?>)" onclick="openCity(event, 'Luxury')">
                                 <input type="radio" name="radio1" value="2" id="Luxury_pi"> Luxury 
                              </div>
                              <div class="pack-sec-btn" onchange="getprice(3,<?=$packages[0]['ID']?>)" onclick="openCity(event, 'Premium')">
                                 <input type="radio" name="radio1" value="3" id="Premium_pi"> Premium 
                              </div>
                           </div>
                        </div>
                     </div>
                     <div class="border"></div>
                     <div class="book-box">
                        <ul class="nav nav-tabs">
                           <li class="active"> 
                              <a href="#1" id="1-tab" role="tab" data-toggle="tab" aria-controls="1" aria-expanded="true">
                                 Calculate Price
                              </a>
                           </li>
                           <li> 
                              <a href="#2" role="2-tab" id="2-tab" data-toggle="tab" aria-controls="2" aria-expanded="false">
                                 Overview
                              </a>
                           </li>
                           <li> 
                              <a href="#3" role="3-tab" id="3-tab" data-toggle="tab" aria-controls="3" aria-expanded="false">
                                 Inclusions & Exclusions
                              </a>
                           </li>
                           <li> 
                              <a href="#4" role="3-tab" id="3-tab" data-toggle="tab" aria-controls="4" aria-expanded="false">
                                 Highlights
                              </a>
                           </li>
                        </ul>
                        <div class="tab-content-box tab-content">
                           <div role="tabpanel" class="tab-pane fade clearfix active in" id="1" aria-labelledby="1-tab">
                              <div class="contents">
                                 <div class="booking-box">
                                    <h4 class="heading">Fill in your details.</h4>
                                    <p class="text-center" style="color:green;font-weight:700;"> <?php if(isset($msg) and $msg!='') echo $msg;?></p>
                                    <div class="select-d-box">
                                       <h5><span><i class="fa fa-location-arrow" aria-hidden="true"></i></span>Departure City</h5>
                                    </div>
                                    <div class="select-d-box">
                                       <select id="from_city" name="from_city" onchange="Get_City_price(this.value)">
                                          <option selected disabled>Select City Here</option>
                                          <?php foreach($departure as $city) { ?>
                                          <option value="<?=$city['ID']?>,<?=$city['city']?>,<?=$city['packageID']?>"><?=$city['name']?></option>
                                         <?php } ?>
                                       </select>
                                    </div>

                                 </div>
                                 <h4 class="m-heading"><span><i class="fa fa-user" aria-hidden="true"></i></span> Select Travellers</h4>
                                 <div class="select-tra">
                                    <div class="select-tra-box">
                                       <h3>Room 1</h3>
                                       <button type="button" id="add_room" >Add Room</button>
                                    </div>
                                    <div class="select-tra-box">
                                       <h5>Adult</h5>
                                       <div class="inc-dec">
                                          <button type="button" value="minus" class="minus" id="decrease_minus1" onclick="adultValue(this.value,1)">-</button>
                                          <input name="travel_room[]" type="text" id="number1" value="1">
                                          <button type="button" value="plus" class="plus" id="increase_plus1" onclick="adultValue(this.value,1)">+</button>
                                       </div>
                                       <p class="inc-bot">12+ Years</p>
                                    </div>
                                    <div class="select-tra-box">
                                       <h5>Child(With bed)</h5>
                                       <div class="inc-dec">
                                          <button type="button" class="minus" id="decrease_minus_child1" value="minus_child" onclick="childValue_bed(this.value,1)">-</button>
                                          <input name="travel_room[]" value="0" type="text" id="number_child1">
                                          <button type="button" class="plus" id="increase_plus_child1" value="plus_child" onclick="childValue_bed(this.value,1)">+</button>
                                       </div>
                                       <p class="inc-bot">(blow-12 Years)</p>
                                    </div>
                                    <div class="select-tra-box">
                                       <h5>Child(Without bed)</h5>
                                       <div class="inc-dec">
                                          <button type="button" value="minus_without_bed" class="minus" id="decrease_minus_bed1" onclick="child_without_bed(this.value,1)">-</button>
                                          <input type="text" value="0" id="number_bed1" name="travel_room[]">
                                          <button type="button" value="plus_without_bed" class="plus" id="increase_plus_bed1" onclick="child_without_bed(this.value,1)">+</button>
                                       </div>
                                       <p class="inc-bot">(below-12 Years)</p>
                                    </div>
                                    <div class="select-tra-box">
                                       <h5>Infant</h5>
                                       <div class="inc-dec">
                                          <button type="button" value="minus_infant" class="minus" id="decrease_minus_infant1" onclick="infant(this.value,1)">-</button>
                                          <input type="text" value="0" name="travel_room[]" id="number_infant1">
                                          <button type="button" class="plus" id="increase_plus_infant1" value="plus_infant" onclick="infant(this.value,1)">+</button>
                                       </div>
                                       <p class="inc-bot">(0-2)</p>
                                    </div>
                                    &emsp;
                                    <div id="room_field"></div>
                                 </div>
                                 <div class="slect-date-tra">
                                    <label class="m-heading"><span><i class="fa fa-calendar" aria-hidden="true"></i></span> Select Date of Travel</label>
                                    <input type="text" name="travelling_date" id="travelling_date" placeholder="Travel Date.." required>
                                 </div>
                                 <div class="slect-date-tra">
                                    <label class="m-heading"><span><i class="fa fa-volume-control-phone" aria-hidden="true"></i></span> Your Contact Details</label>
                                    <input type="text" name="traveller_mobile" id="traveller_mobile" placeholder="Mobile no" required>
                                    <input type="email" name="traveller_email" id="traveller_email" placeholder="Email id" required>
                                 </div>
                                 <div class="calculate-pri">
                                    <p>Your booking details will be sent on these contact details.</p>
                                    <div class="form-group">
                                     <label for="checkbox"><input type="checkbox" name="terms_conditions" id="terms_conditions" onclick="checked_or_not()"></label> I accept the Privacy Policy & Terms & Conditions</div>
                                     <button type="button">Calculate Package Price</button>
                                  </div>
                               </div>
                            </div>

                            <div role="tabpanel" class="tab-pane fade clearfix" id="2" aria-labelledby="2-tab">
                              <div class="contents">
                              <p><b><?php $packages_days = json_decode($packages[0]['day1']);
                                 echo $packages_days;
                              ?></b></p>
                              </div>
                           </div>
                           <div role="tabpanel" class="tab-pane fade clearfix" id="3" aria-labelledby="3-tab">
                              <div class="contents">
                                 <p><b><?=$packages[0]['package_include']?></b></p>
                              </div>
                           </div>
                           <div role="tabpanel" class="tab-pane fade clearfix" id="4" aria-labelledby="4-tab">
                              <div class="contents">
                                 <p><b><?=$packages[0]['Narration']?></b></p>
                              </div>
                           </div>

                        </div>
                     </div>
                     <ul class="nav nav-tabs bottomtabs">
                        <li class=""> 
                           <a href="#9" id="9-tab" role="tab" data-toggle="tab" aria-controls="9" aria-expanded="true">
                              Payment Term
                           </a>
                        </li>
                        <li> 
                           <a href="#8" role="8-tab" id="8-tab" data-toggle="tab" aria-controls="8" aria-expanded="false">
                              Cancellation Policy
                           </a>
                        </li>
                        <li> 
                           <a href="#7" role="7-tab" id="7-tab" data-toggle="tab" aria-controls="7" aria-expanded="false">
                              Terms & Conditions
                           </a>
                        </li>
                     </ul>
                     <div class="tab-content-box tab-content">
                        <div role="tabpanel" class="tab-pane fade clearfix " id="9" aria-labelledby="9-tab">
                           <div class="contents">
                              <p><b>Booking Amount </b> At the time of booking you must be in possession of original passport(s) valid for travel. You are urged to read complete details of the tour, itinerary, price inclusions, exclusions, terms and conditions and the like in the brochure before filling and signing the official Booking Form. On payment of the non-refundable interest free booking amount mentioned in the Online Portal/Website you will be issued an official receipt from us. The tour cost and the booking amount mentioned in the online portal is only indicative in nature and a final tour cost and booking amount is subject to change depending upon the tour itinerary opted by the Tour participant. The Booking Form, Invoice and the Receipt shall be binding on the parties and shall constitute a contract between the parties. The interest free non-refundable booking amount paid by you will be adjusted towards the cost of the tour. Please also refer to relevant section of booking conditions for rules of forfeiture of booking amount.Hence the balance payment has to reach us as per the schedule mentioned in your Invoice or at least 30 days prior to departure of your tour whichever is earlier.Please note: A 2% payment gateway charge will be levied on the balance payment made using credit/debit card. </p>
                           </div>
                        </div>
                        <div role="tabpanel" class="tab-pane fade clearfix" id="8" aria-labelledby="8-tab">
                           <div class="contents">
                              <p><b>Cancellation</b>
                                 If you want to cancel your tour booking for any reason, you must intimate in writing to the Company and deliver it to the concerned officer you are dealing with at the sales outlet where you booked and obtain an acknowledgment. The letter must clearly mention the names of all passengers who want their bookings to be cancelled. The computation of the period of notice of cancellation shall commence only from the time the written request reached the Company at its sales office during working hours. In case of cancellation, the following cancellation charges would apply: 
                              </p>
                           </div>
                        </div>
                        <div role="tabpanel" class="tab-pane fade clearfix" id="7" aria-labelledby="7-tab">
                           <div class="contents">
                              <p><b>Where to Book</b>  Your own trusted travel agents can book you on SOTC Holidays of India. If you are booking through your Travel Agent, please make all payments to them and they will pay us on your behalf. There is no additional cost to you, so do take advantage of your own Travel Agent’s professional advice and service. You can also book through SOTC Holidays of India branch offices located across the country. </p>
                           </div>
                        </div>
                     </div>
                  </div>

                  <div class="col-md-3">
                     <div class="order-booking-right">
                        <h5>Total Price</h5>
                        <div class="paymenyopt1">
                           <center>
                              <h3 class="" id="packprice">
                                 
                                 <span id="package_final_price" class="ramount1">₹<?=$packages[0]["std_final_price"]?></span>
                                 <br>
                                 <span id="gst_include" style="font-size: 12px; color: #5a5a5a;">Including With Gst</span>
                              </h3>
                              <input type="submit" name="submit_caculate_price_btn" id="booking_now" class="booking-btn" value="Book Now"  onclick="checked_or_not()">

                              <p>Call us </p>
                              <button class="booking-btn">+91 3216547895</button>
                              <button class="booking-btn" data-toggle="modal" data-target="#myModal">Want to call Us</button>
                              <hr>
                              <a href="../pdf_file.php?ID=<?=base64_encode($book_id)?>"><p>Here Your Pdf </p></a>
                           </center>
                        </div>
                     </div>
                  </div>
               </form>
            </div>
         </div>
         <div class="container">
           <!-- The Modal -->
           <div class="modal" id="myModal">
             <div class="modal-dialog">
               <div class="modal-content">

                 <!-- Modal Header -->
                 <div class="modal-header">
                   <h4 class="modal-title">Get the Best Holiday Planned by Experts!</h4>
                   <button type="button" class="close" id="close" data-dismiss="modal">&times;</button>
                </div>

                <!-- Modal body -->
                <div class="modal-body">
                 <h5>Enter your contact details and we will plan the best holiday suiting all your requirements.</h5>
                 <form method="post" action="../register.php" >
                  <div class="form-group">
                     <label for="Email">Email:</label>
                     <input type="email" name="email" id="email" class="form-control" placeholder="Enter Email" required>
                  </div>
                  <div class="form-group">
                     <label for="Contact">Contact:</label>
                     <input type="text" name="mobile_no" id="mobile_no" class="form-control" placeholder="Enter Contact No" maxlength="10" required> 
                  </div>
                  <div class="form-group">
                     <label for="checkbox"><input type="checkbox" name="terms_conditions_modal" id="terms_conditions_modal" class="filled-in chk-col-green" onclick="checked_or_not()"></label>I hereby accept the Privacy Policy and authorize Hills Traveller and its representatives to contact me.
                  </div>
               </div>

               <!-- Modal footer -->
               <div class="modal-footer">
                <div class="form-group">
                 <input type="submit" name="contact_now" id="contact_now" class="btn btn-success" value="Submit"  disabled>
              </div>
           </form>
        </div>

     </div>
  </div>
</div>
</form>
</div>
<!-- Footer Starting -->
<?php include('include/footer.php');?>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Zebra_datepicker/1.9.13/css/default/zebra_datepicker.min.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/Zebra_datepicker/1.9.13/zebra_datepicker.min.js"></script>
<script type="text/javascript">
               // select travellers 1st Adult
               function adultValue(btype,did) {
                if(btype =='plus')
                {
                   var a = $("#number"+did).val();
                   var aa = $("#number_child"+did).val();
                   var aaa = $("#number_bed"+did).val();
                   var aaaa = $("#number_infant"+did).val();
                   var total_4 = parseInt(a) +parseInt(aa) +parseInt(aaa)+parseInt(aaaa);
                            //t(total_4);
                            if (total_4 >= 4)
                            { 
                              $("#increase_plus_child"+did).attr("disabled", "disabled");
                              $("#increase_plus_bed"+did).attr("disabled", "disabled");
                              $("#increase_plus_infant"+did).attr("disabled", "disabled");
                              
                           }else{

                            a++;
                            if (a>2) 
                            {
                                 Get_room_price(a);
                            }
                  
                            else if (a == 4) 
                            {
                             $("#increase_plus"+did).attr("disabled", "disabled");
                          }
                          $("#number"+did).val(a);
                          document.getElementById("decrease_minus"+did).disabled = false;
                       }

                    }else{

                      var b = $("#number"+did).val();
                         //alert(b)
                         if (b > 1) 
                         {
                            b--;
                            if (b < 3) 
                           { 
                              /*alert(b);*/
                              Get_room_price(b);
                           }
                            $("#number"+did).val(b);
                            $("#increase_plus"+did).removeAttr("disabled");
                            $("#increase_plus_child"+did).removeAttr("disabled");
                            $("#increase_plus_bed"+did).removeAttr("disabled");
                            $("#increase_plus_infant"+did).removeAttr("disabled");


                         }else {
                          
                            $("#decrease_minus"+did).attr("disabled", "disabled");
                         }

                      }  

                   }


                   /*-----------------select travellers 2nd child with bed----------------------*/
                   function childValue_bed(btype,did) {
                     if (btype =='plus_child' ) 
                     {
                        var main_a = $("#number"+did).val();
                        var a = $("#number_child"+did).val();
                        var aa = $("#number_bed"+did).val();
                        var aaa = $("#number_infant"+did).val();
                        var total_4 = parseInt(main_a) +parseInt(a)+parseInt(aa)+parseInt(aaa);
                      //alert(total_4);
                      if (main_a >= 4) {
                        $("#increase_plus_child"+did).attr("disabled", "disabled");
                     }
                     else if (total_4 >= 4)
                     { 
                        //alert("You Can Not Add More Than Four");
                        $("#increase_plus_bed"+did).attr("disabled", "disabled");
                        $("#increase_plus_infant"+did).attr("disabled", "disabled");
                        // document.getElementById("increase_plus_bed").disabled = false;
                     }

                     else
                     {
                      a++;
                      if (a && a >= 4) {
                       $("#increase_plus_child"+did).attr("disabled", "disabled");
                    }
                    $("#number_child"+did).val(a);
                    document.getElementById("decrease_minus_child"+did).disabled = false;
                 }
              }
              else
              {
               var b = $("#number_child"+did).val();
               if (b && b >= 1) {
                 b--;
                 $("#number_child"+did).val(b);
                 $("#increase_plus_child"+did).removeAttr("disabled");
                 $("#increase_plus_bed"+did).removeAttr("disabled");
                 $("#increase_plus_infant"+did).removeAttr("disabled");
              }
              else {
                 $("#decrease_minus_child"+did).attr("disabled", "disabled");

              }
           }
        }



        /*---------------select travellers 3rd child without bed----------------*/
        function child_without_bed(btype,did) {
         if (btype == "plus_without_bed") {
            var main_a = $("#number"+did).val();
            var aa = $("#number_child"+did).val();
            var a = $("#number_bed"+did).val();
            var aaa = $("#number_infant"+did).val();
            var total_4 = parseInt(main_a) +parseInt(a) +parseInt(aa)+parseInt(aaa);
                      //alert(total_4);
                      if (main_a >= 4) {
                        $("#increase_plus_bed"+did).attr("disabled", "disabled");
                        //alert('SAM DHANWANTRI');
                     }

                     else if (total_4 >= 4)
                     { 
                        //alert("Max Only Four");
                        $("#increase_plus_child"+did).attr("disabled", "disabled");
                        $("#increase_plus_infant"+did).attr("disabled", "disabled");
                        document.getElementById("increase_plus_child"+did).disabled = false;
                     }

                     else{
                      a++;
                      if (a && a >= 4) {
                       $("#increase_plus_bed"+did).attr("disabled", "disabled");
                    }
                    $("#number_bed"+did).val(a);
                    document.getElementById("decrease_minus_bed").disabled = false;
                 }
              }
              else
              {
               var b = $("#number_bed"+did).val();
               if (b && b >= 1) {
                 b--;
                 $("#number_bed"+did).val(b);
                 $("#increase_plus_child"+did).removeAttr("disabled");
                 $("#increase_plus_bed"+did).removeAttr("disabled");
                 $("#increase_plus_infant"+did).removeAttr("disabled");
              }
              else {
                 $("#decrease_minus_bed"+did).attr("disabled", "disabled");
              }
           }
        }


        /*-------------------select travellers 4th infant---------------------*/
        function infant(btype,did) {
         if (btype =="plus_infant") {
            var main_a = $("#number"+did).val();
            var a = $("#number_infant"+did).val();
            var aa = $("#number_child"+did).val();
            var aaa = $("#number_bed"+did).val();
            var total_4 = parseInt(main_a) +parseInt(a) +parseInt(aa)+parseInt(aaa);

            if (main_a >= 4) {
               $("#increase_plus_infant"+did).attr("disabled", "disabled");
                        //alert('Arun Dhanwantri');
                     }

                     else if (total_4 >= 4)
                     { 
                        //alert("Only Four Persons Allow");
                        $("#increase_plus_child"+did).attr("disabled", "disabled");
                        $("#increase_plus_infant"+did).attr("disabled", "disabled");
                        document.getElementById("increase_plus_child"+did).disabled = false;
                     }

                     else{
                      a++;
                      if (a && a >= 4) {
                       $("#increase_plus_infant"+did).attr("disabled", "disabled");
                    }
                    $("#number_infant"+did).val(a);
                    document.getElementById("decrease_minus_infant"+did).disabled = false;
                 }
              }
              else
              {
               var b = $("#number_infant"+did).val();
               if (b && b >= 1) {
                 b--;
                 $("#number_infant"+did).val(b);
                 document.getElementById("increase_plus_infant"+did).disabled = false;
              }
              else {
                 $("#decrease_minus_infant"+did).attr("disabled", "disabled");
              }
           }
        }

        /*--------------------DYNAMIC FIELDS FOR ADDING ROOMS-----------------*/
        var remove;
        var srNo=2;


        $('#add_room').click(function()
        {
         if (srNo >= 2) 
         {
            $("#add_room").attr("disabled", "disabled");
         }

                                    //alert(srNo);

                                    $("#room_field").append('<div class="select-tra_1" id="select-tra_1'+srNo+'"><div class="select-tra-box" id="select-tra-box'+srNo+'" type="button"><h3>Room'+srNo+' </h3><button type="button" id="remove'+srNo+'" onclick="remove('+srNo+')">Remove</button></div><div class="select-tra-box"><h5>Adult</h5><div class="inc-dec"><button type="button" class="minus" value="minus" id="decrease_minus'+srNo+'" onclick="adultValue(this.value,'+srNo+')">-</button><input name="travel_room[]" type="text" id="number'+srNo+'" value="1"><button type="button" class="plus" value="plus" id="increase_plus'+srNo+'" onclick="adultValue(this.value,'+srNo+')">+</button></div><p class="inc-bot">12+ Years</p></div><div class="select-tra-box"><h5>Child(With bed)</h5><div class="inc-dec"><button type="button" class="minus" value="minus_child" id="decrease_minus_child'+srNo+'" onclick="childValue_bed(this.value,'+srNo+')">-</button><input name="travel_room[]" value="0" type="text" id="number_child'+srNo+'"><button type="button" class="plus" value="plus_child" id="increase_plus_child'+srNo+'" onclick="childValue_bed(this.value,'+srNo+')">+</button></div><p class="inc-bot">(blow-12 Years)</p></div><div class="select-tra-box"><h5>Child(Without bed)</h5><div class="inc-dec"><button type="button" class="minus" value="minus_without_bed" id="decrease_minus_bed'+srNo+'" onclick="child_without_bed(this.value,'+srNo+')">-</button><input type="text" value="0" id="number_bed'+srNo+'" name="travel_room[]"><button type="button" class="plus" value="plus_without_bed" id="increase_plus_bed'+srNo+'" onclick="child_without_bed(this.value,'+srNo+')">+</button></div><p class="inc-bot">(blow-12 Years)</p></div><div class="select-tra-box"><h5>Infant</h5><div class="inc-dec"><button type="button" value="minus_infant" class="minus" id="decrease_minus_infant'+srNo+'" onclick="infant(this.value,'+srNo+')">-</button><input type="text" name="travel_room[]" value="0" id="number_infant'+srNo+'"><button type="button" class="plus" value="plus_infant" id="increase_plus_infant'+srNo+'" onclick="infant(this.value,'+srNo+')">+</button></div><p class="inc-bot">(0-2)</p></div></div>&emsp;');

                                    srNo++;


                                 });

        function remove(id)
        {
         console.log($(".select-tra").length);
         $('#select-tra_1'+id).remove();
         srNo--;
         $('#add_room').prop('disabled', false);
          /*document.getElementById("add_room").disabled = false;*/
        }

               // select traveller Date Function 
               $('#travelling_date').Zebra_DatePicker({
                  direction: 1,
                  format: 'd-m-Y',
                  show_icon: false,

               });
               /*checked to read Terms & conditions*/
               function checked_or_not()
               {
                 if ($('#terms_conditions').prop('checked') || $('#terms_conditions_modal').prop('checked'))
                 {
                  $('#booking_now').prop('disabled', false); 
                  $('#contact_now').prop('disabled', false);
               }
               else {
                        alert("Please Read Our Terms & Conditions Policy"); //not checked
                        $('#booking_now').prop('disabled', true);
                        $('#contact_now').prop('disabled', true);
                     }
                  }
                  /*End here*/

/*----------------------------GET base std & luxury & oremium price 1 ---------------------------*/
   var get_price = <?=$packages[0]["std_final_price"]?>;
   var city_price = 0;
   var room_price = 0;

                  function getprice(a,b)
                  {    
                     $.ajax({
                           type: 'POST',
                           url: '<?=PATH?>getprice.php',
                           data: {pid_book:a,packageid_book:b},
                           beforeSend: function(){
                              $("#error").fadeOut();
                        },
                        success: function(data){
                           get_price = data;
                           get_total_price();
                        }
                     }); 
                  }


/*--------------------------------GET base Onselect City price 2 -------------------------------*/
                  function Get_City_price(a)
                  {    
                        $.ajax({
                           type: 'POST',
                           url: '<?=PATH?>getprice.php',
                           data: {form_city:a},
                           beforeSend: function(){
                              $("#error").fadeOut();
                        },
                        success: function(data){
                          city_price = data;
                           get_total_price();
                        }
                     }); 
                  }
   /*--------------------------------GET base Onselect Room price 3 -------------------------------*/
                  function Get_room_price(a,b)
                  {  
                    var data_rario = $("#calculate_price").serialize();
                     var pakage = <?=$packages[0]["ID"]?>;
                     /*alert(pakage);*/
                        $.ajax({
                           type: 'POST',
                           url: '<?=PATH?>getprice.php',
                           data: {room_city:a,room_pkg:pakage,data_rario:data_rario},
                           beforeSend: function(){
                              $("#error").fadeOut();
                        },
                        success: function(data){
                           /*alert(data);*/
                           room_price = data;
                           get_total_price();
                           /*get_total_lessing_price();*/
                        }

                     }); 
                  }
                  function get_total_price(){
                     var total = parseInt(get_price)+parseInt(city_price)+parseInt(room_price);
                     if(isNaN(total)){
                        /*var total_less = parseInt(get_price)+parseInt(city_price);*/
                        $('#package_final_price').html('0');
                     }else{
                        $('#package_final_price').html(total);
                     }
                  }
                 
   /*-----------------------------Set Total Price---------------------------------*/

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
                    /*document.getElementById(cityName).style.display = "block";*/
                    evt.currentTarget.className += " active";
                 }



                 var Tabs = function($) {
                    return {

                      init: function() {
                        this.cacheDom();
                        this.setupAria();
                        this.appendIndicator();
                        this.bindEvents();
                     },

                     cacheDom: function() {
                        this.$el = $('.tabs');
                        this.$tabList = this.$el.find('ul');
                        this.$tab = this.$tabList.find('li');
                        this.$tabFirst = this.$tabList.find('li:first-child a');
                        this.$tabLink = this.$tab.find('a');
                        this.$tabPanel = this.$el.find('section');
                        this.$tabPanelFirstContent = this.$el.find('section > *:first-child');
                        this.$tabPanelFirst = this.$el.find('section:first-child');
                        this.$tabPanelNotFirst = this.$el.find('section:not(:first-of-type)');
                     },

                     bindEvents: function() {
                        this.$tabLink.on('click', function(){
                          this.changeTab();
                          this.animateIndicator($(event.currentTarget));
                       }.bind(this));
                        this.$tabLink.on('keydown', function() {
                          this.changeTabKey();
                       }.bind(this));
                     },

                     changeTab: function() {
                        var self = $(event.target);
                        event.preventDefault();
                        this.removeTabFocus();
                        this.setSelectedTab(self);
                        this.hideAllTabPanels();
                        this.setSelectedTabPanel(self);
                     },

                     animateIndicator: function(elem) {
                        var offset = elem.offset().left;
                        var width = elem.width();    
                        var $indicator = this.$tabList.find('.indicator');

                        console.log(elem.width());

                        $indicator.transition({ 
                          x: offset,
                          width: elem.width()
                       })
                     },

                     appendIndicator: function() {
                        this.$tabList.append('<div class="indicator"></div>');
                     },

                     changeTabKey: function() {
                        var self = $(event.target),
                        $target = this.setKeyboardDirection(self, event.keyCode);

                        if ($target.length) {
                          this.removeTabFocus(self);
                          this.setSelectedTab($target);
                       }
                       this.hideAllTabPanels();
                       this.setSelectedTabPanel($(document.activeElement));
                       this.animateIndicator($target);
                    },

                    hideAllTabPanels: function() {
                     this.$tabPanel.attr('aria-hidden', 'true');
                  },

                  removeTabFocus: function(self) {
                     var $this = self || $('[role="tab"]');

                     $this.attr({
                       'tabindex': '-1',
                       'aria-selected': null
                    });
                  },

                  selectFirstTab: function() {
                     this.$tabFirst.attr({
                       'aria-selected': 'true',
                       'tabindex': '0'
                    });
                  },

                  setupAria: function() {
                     this.$tabList.attr('role', 'tablist');
                     this.$tab.attr('role', 'presentation');
                     this.$tabLink.attr({
                       'role': 'tab',
                       'tabindex': '-1'
                    });
                     this.$tabLink.each(function() {
                       var $this = $(this);

                       $this.attr('aria-controls', $this.attr('href').substring(1));
                    });
                     this.$tabPanel.attr({
                       'role': 'tabpanel'
                    });
                     this.$tabPanelFirstContent.attr({
                       'tabindex': '0'
                    });
                     this.$tabPanelNotFirst.attr({
                       'aria-hidden': 'true'
                    });
                     this.selectFirstTab();
                  },

                  setKeyboardDirection: function(self, keycode) {
                     var $prev = self.parents('li').prev().children('[role="tab"]'),
                     $next = self.parents('li').next().children('[role="tab"]');

                     switch (keycode) {
                       case 37:
                       return $prev;
                       break;
                       case 39:
                       return $next;
                       break;
                       default:
                       return false;
                       break;
                    }
                 },

                 setSelectedTab: function(self) {
                  self.attr({
                    'aria-selected': true,
                    'tabindex': '0'
                 }).focus();
               },

               setSelectedTabPanel: function(self) {
                  $('#' + self.attr('href').substring(1)).attr('aria-hidden', null);
               },

            };
         }(jQuery);

         Tabs.init();
      </script>
   </body>
   </html>