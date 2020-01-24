<?php
   require_once('main/controller/dbclass.php');
   include('include/define.php');
   $db=new dbclass();$con=$db->Connection();
   $localIP = $_SERVER['REMOTE_ADDR'];
   
   $qry="Select * FROM category where active='1' order by ID DESC ";
   $res=$db->SelectQry($qry,$con);	
   $Rows2 = mysqli_num_rows($res);	
   $category=array();	
   if($Rows2 >0)	
   { 	
   	$i=0;  	
   	while($get_cat =mysqli_fetch_assoc($res))   	
   	{		       			
   		$category[$i++]=$get_cat;
   	}	
   }
   
   
   
   /* Get All Activated Adventure Tour Packages Category */
   $qry_13="Select * FROM category where active='1' and parantID='1' and adventure_package='1' order by ID ASC";
   $res_13=$db->SelectQry($qry_13,$con);	
   $Rows2_13 = mysqli_num_rows($res_13);	
   $adventure=array();	
   if($Rows2_13 >0)	
   { 	
	   	$i=0;  	
	   	while($get_cat_13 =mysqli_fetch_assoc($res_13))   	
	   	{		       			
	   		$adventure[$i++]=$get_cat_13;  	
	   	}	
   }
   
   function convertYoutube($video) 
   {
   	return preg_replace("/\s*[a-zA-Z\/\/:\.]*youtu(be.com\/watch\?v=|.be\/)([a-zA-Z0-9\-_]+)([a-zA-Z0-9\/\*\-\_\?\&\;\%\=\.]*)/i","<iframe src=\"//www.youtube.com/embed/$2\" allowfullscreen width='560px' height='315px'></iframe>",$video );
   }          
   
   /* Get All Activated WITH Intenational DESTINATIONS  
   $qry_1="Select * FROM category where active='1' and parantID='2' order by ID ASC ";
   $res_1=$db->SelectQry($qry_1,$con);	
   $Rows2_1 = mysqli_num_rows($res_1);	
   $intnl_tour=array();	
   if($Rows2_1 >0)	
   { 	
   $i=0;  	
   while($get_cat_13 =mysqli_fetch_assoc($res_1))   	
   {		       			
   $intnl_tour[$i++]=$get_cat_13;  	
   }	
   }*/
   
   /* Get All Activated WITH Honeymoon DESTINATIONS  */
   /*$honey_qry_1="Select * FROM category where active='1' and parantID='3' order by ID ASC ";
   $res_honey=$db->SelectQry($honey_qry_1,$con);	
   $Rows_honey = mysqli_num_rows($res_honey);	
   $honey_tour=array();	
   if($Rows_honey >0)	
   { 	
   $i=0;  	
   while($get_cat_honey =mysqli_fetch_assoc($res_honey))   	
   {	     			
   $honey_tour[$i++]=$get_cat_honey;  	
   }	
   }*/
   
   /* Get All Activated WITH  Category DESTINATIONS  */
   /*$qry_11="Select * FROM category where active='1' and parantID='1' and adventure_package='0' order by ID ASC ";
   $res_11=$db->SelectQry($qry_11,$con);	
   $Rows2_11 = mysqli_num_rows($res_11);	
   $india_cat_1=array();	
   if($Rows2_11 >0)	
   { 	
   $i=0;  	
   while($get_cat_133 =mysqli_fetch_assoc($res_11))   	
   {		       			
   $india_cat_1[$i++]=$get_cat_133;  	
   }	
   }			*/
   
   ?>
<html lang="en">
   <head>
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <title>Welcome To Hills Traveler</title>
      <!--Favicon-->
      <link rel="shortcut icon" href="<?=PATH?>images/favicon.ico" type="image/x-icon">
      <link rel="icon" href="<?=PATH?>images/favicon.ico" type="image/x-icon">
      <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
      <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,700,300' rel='stylesheet' type='text/css'>
      <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
      <!-- Animate.css -->
      <link rel="stylesheet" href="<?=PATH?>css/animate.css">
      <!-- Owl Carsoul.css -->
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/owl-carousel/1.3.3/owl.carousel.min.css">
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/owl-carousel/1.3.3/owl.theme.min.css">
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
      <link rel="stylesheet" href="<?=PATH?>css/slick.css" />
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
   </head>
   <body>
      <div id="tb-wrapper">
      <div id="tb-page">
      <?php include('include/header.php');?>
      <div class="row">
         <div class="min1">
            <div id="myCarousel" class="carousel slide" data-ride="carousel">
               <!-- Indicators -->
               <ol class="carousel-indicators">
                  <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
                  <li data-target="#myCarousel" data-slide-to="1"></li>
                  <li data-target="#myCarousel" data-slide-to="2"></li>
                  <li data-target="#myCarousel" data-slide-to="3"></li>
                  <li data-target="#myCarousel" data-slide-to="4"></li>
               </ol>
               <!-- Wrapper for slides -->
               <div class="carousel-inner" role="listbox">
                  <div class="item active">
                     <img src="<?=PATH?>images/slider/banner1.jpg">
                  </div>
                  <div class="item">
                     <img src="<?=PATH?>images/slider/banner2.jpg">
                  </div>
                  <div class="item">
                     <img src="<?=PATH?>images/slider/banner3.jpg">
                  </div>
                  <div class="item">
                     <img src="<?=PATH?>images/slider/banner4.jpg">
                  </div>
                  <div class="item">
                     <img src="<?=PATH?>images/slider/banner5.jpg">
                  </div>
               </div>
            </div>
            <div class="container">
               <div class="form-box">
                  <div class="form-box1">
                     <!-- <h4>Book Domestic & International Holiday Packages</h4> -->
                     <form name='search' method='post' action="searching.php">
                        <div class="form-group clearfix">
                           <div class="col-sm-4 pad">
                              <input type="text" name="search_destination" id="search_destination" class="form-control pad1"  placeholder="Find Holidays by Destination e.g. Himalaya, Europe/Theme e.g. Family, Honeymoon">
                           </div>
                           <div class="col-sm-3 pad">
                              <select class="form-control pad1">
                                 <option> Budget per person </option>
                                 <option> Less than ₹30,000 </option>
                                 <option> ₹30,000 to ₹1 Lac </option>
                                 <option> ₹1 Lac to ₹2 Lac </option>
                                 <option> More than ₹2 Lac </option>
                              </select>
                           </div>
                           <div class="col-sm-3 pad">
                              <select class="form-control pad1" name="month_name">
                                 <option>-- Select Month --</option>
                                 <option value="January"> January </option>
                                 <option value="February"> February </option>
                                 <option value="March"> March </option>
                                 <option value="April"> April </option>
                                 <option value="May"> May </option>
                                 <option value="June"> June </option>
                                 <option value="July"> July </option>
                                 <option value="August"> August </option>
                                 <option value="September"> September </option>
                                 <option value="October"> October </option>
                                 <option value="November"> November </option>
                                 <option value="December"> December</option>
                              </select>
                           </div>
                           <div class="col-sm-2">
                              <button type="submit" class="btn btn-success pad1" name="searching_btn">Search</button>
                           </div>
                        </div>
                        <div id="livesearch"></div>
                     </form>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <!-- The social media icon bar -->
      <div class="icon-bar">
         <a style="background:#25d366" href="#" class="Whatsapp"><i class="fa fa-whatsapp"></i></a>
         <a  href="#" class="facebook"><i class="fa fa-facebook"></i></a>   
         <a style="background:#8a3ab9" href="#" class="instagram"><i class="fa fa-instagram"></i></a> 
         <a href="#" class="linkedin"><i class="fa fa-linkedin"></i></a>
         <a href="#" class="youtube"><i class="fa fa-youtube"></i></a> 
      </div>
      <section>
         <div class="container">
         <?php
            $qry_heading="Select * from category where active='1' and parantID='0' and ID ='1' order by ID ASC";
            $runheading = mysqli_query($con,$qry_heading);
            $ind_heading = mysqli_fetch_assoc($runheading);
            
            ?>
         <center>
            <h3 class="heading-tou" style="text-transform:uppercase;">Astounding destinations in India awaits</h3>
         </center>
         <div style="display: none;" id="less_detail">
            <p><?= $ind_heading['narration']; ?><span style="color: orange" onclick="hidefullData();">Read less</span></p>
         </div>
         <div id="show_detail">
            <p><?= substr($ind_heading['narration'],0,-900).'...'?><span style="color: orange" onclick="showfullData();">Read More</span></p>
         </div>
         <div class="slide-bx">
            <?php 
               $qry_11="Select * FROM category where active='1' and parantID='1' and adventure_package='0' order by ID ASC ";
               $res_11=$db->SelectQry($qry_11,$con);	
               while($india =mysqli_fetch_assoc($res_11))   	
               { 
               	?>
            <div id="slide">
               <div class="pro-con-box">
                  <a href="<?=PATH?>hills-traveler-packages.php/?id=<?=base64_encode($india['ID'])?>"><img src="<?=PATH?>main/uploads/category/<?=$india['image']?>"></a>
                  <div class="con-box-cl">
                     <div class="pro-title">
                        <a href="<?=PATH?>hills-traveler-packages.php/?id=<?=base64_encode($india['ID'])?>">
                           <h4><?=$india['name']?></h4>
                        </a>
                     </div>
                     <div class="pro-con-para">
                        <h5>Starting from</h5>
                        <?php
                           $price_query= "SELECT * FROM pricing where active=1 and subcategoryID='".$india['ID']."' order by std_final_price "; 
                           $run_price = $db->SelectQry($price_query,$con);	
                           $lowest_price_india =mysqli_fetch_assoc($run_price);
                           ?>
                        <h3 class="price">₹<?=$lowest_price_india['std_final_price']?>/-</h3>
                     </div>
                  </div>
               </div>
            </div>
            <?php } ?>
         </div>
         <div class="container">
            <?php
               $qry_heading_2="Select * from category where active='1' and parantID='0' and ID ='2' order by ID ASC";
               $runheading_2 = mysqli_query($con,$qry_heading_2);
               $intl_heading = mysqli_fetch_assoc($runheading_2);
               ?>
            <center>
               <h3 class="heading-tou" style="text-transform:uppercase;">Enticing International Travel Packages</h3>
            </center>
            <div style="display: none;" id="less_detail_intl">
               <p><?= $intl_heading['narration']; ?><span style="color: orange" onclick="hidefullData_1();">Read less</span></p>
            </div>
            <div id="show_detail_intl">
               <p><?= substr($intl_heading['narration'],0,-1000).'...'?><span style="color: orange" onclick="showfullData_1();">Read More</span></p>
            </div>
            <div class="slide-bx">
               <?php 
                  /* Get All Activated WITH Intenational DESTINATIONS  */
                  $qry_1="Select * FROM category where active='1' and parantID='2' order by ID ASC ";
                  $res_1=$db->SelectQry($qry_1,$con);	
                  $Rows2_1 = mysqli_num_rows($res_1);	
                  while($intnl =mysqli_fetch_assoc($res_1))   	
                  {		       			
                  	?>
               <div id="slide">
                  <div class="pro-con-box">
                     <a href="<?=PATH?>hills-traveler-packages.php/?id=<?=base64_encode($intnl['ID'])?>"><img src="<?=PATH?>main/uploads/category/<?=$intnl['image']?>"></a>
                     <div class="con-box-cl">
                        <div class="pro-title">
                           <a href="<?=PATH?>hills-traveler-packages.php/?id=<?=base64_encode($intnl['ID'])?>">
                              <h4><?=$intnl['name']?></h4>
                           </a>
                        </div>
                        </a>
                        <div class="pro-con-para">
                           <h5>Starting from</h5>
                           <?php 
                              $price_intl= "SELECT * FROM pricing where active=1 and subcategoryID='".$intnl['ID']."' order by std_final_price "; 
                              $run_price_1 = $db->SelectQry($price_intl,$con);	
                              $lowest_price =mysqli_fetch_assoc($run_price_1);
                              ?>
                           <h3 class="price">₹<?=$lowest_price['std_final_price']?>/-</h3>
                        </div>
                     </div>
                  </div>
               </div>
               <?php } ?>
            </div>
         </div>
         <div class="container">
            <?php
               $qry_heading_3="Select * from category where active='1' and parantID='0' and ID ='3' order by ID ASC";
               $runheading_3 = mysqli_query($con,$qry_heading_3);
               $honeymoon_heading = mysqli_fetch_assoc($runheading_3);
               ?>
            <center>
               <h3 class="heading-tou" style="text-transform:uppercase;">Plunge In For a Lifetime Experience</h3>
            </center>
            <div style="display: none;" id="less_detail_honeymoon">
               <p><?= $honeymoon_heading['narration']; ?><span style="color: orange" onclick="hidefullData_2();">Read less</span></p>
            </div>
            <div id="show_detail_honeymoon">
               <p><?= substr($honeymoon_heading['narration'],0,-1020).'...'?><span style="color: orange" onclick="showfullData_2();">Read More</span></p>
            </div>
            <div class="slide-bx">
               <?php 
                  $honey_qry_1="Select * FROM category where active='1' and parantID='3' order by ID ASC ";
                  $res_honey=$db->SelectQry($honey_qry_1,$con);	
                  while($honey =mysqli_fetch_assoc($res_honey))   	
                  {	     			
                  	?>
               <div id="slide">
                  <div class="pro-con-box">
                     <a href="<?=PATH?>hills-traveler-packages.php/?id=<?=base64_encode($honey['ID'])?>">
                        <img src="<?=PATH?>main/uploads/category/<?=$honey['image']?>">
                        <div class="con-box-cl">
                           <div class="pro-title">
                     <a href="<?=PATH?>hills-traveler-packages.php/?id=<?=base64_encode($honey['ID'])?>"><h4><?=$honey['name']?></h4></a>
                     </div></a>
                     <div class="pro-con-para">
                     <h5>Starting from</h5>
                     <?php
                        $price_honey= "SELECT * FROM pricing where active=1 and subcategoryID='".$honey['ID']."' order by std_final_price "; 
                        $run_price_2 = $db->SelectQry($price_honey,$con);	
                        $honey_price =mysqli_fetch_assoc($run_price_2);
                        ?>
                     <h3 class="price">₹<?=$honey_price['std_final_price']?>/-</h3>
                     </div>
                     </div>
                  </div>
               </div>
               <?php } ?>
            </div>
         </div>
         <div class="container">
            <?php
               $qry_heading_3="Select * from category where active='1' and parantID='0' and ID ='3' order by ID ASC";
               $runheading_3 = mysqli_query($con,$qry_heading_3);
               $honeymoon_heading = mysqli_fetch_assoc($runheading_3);
               ?>
            <center>
               <h3 class="heading-tou" style="text-transform:uppercase;">Hill Traveler’s Premium Packages</h3>
            </center>
            <div style="display: none;" id="less_detail_special">
               <p><?= $category[0]['narration']; ?><span style="color: orange" onclick="hidefullData_3();">Read less</span></p>
            </div>
            <div id="show_detail_special">
               <p><?= substr($category[0]['narration'],0,-900).'...'?><span style="color: orange" onclick="showfullData_3();">Read More</span></p>
            </div>
            <div class="slide-bx">
               <?php 
                  $qry="Select * FROM category where active='1' and most_popular='1' order by ID DESC ";
                  $res=$db->SelectQry($qry,$con);	
                  while($most_imp =mysqli_fetch_assoc($res))   	
                  {		       				
                  	?>
               <div id="slide">
                  <div class="pro-con-box">
                     <a href="<?=PATH?>hills-traveler-packages.php/?id=<?=base64_encode($most_imp['ID'])?>"><img src="<?=PATH?>main/uploads/category/<?=$most_imp['image']?>"></a>
                     <div class="con-box-cl">
                        <div class="pro-title">
                           <a href="<?=PATH?>hills-traveler-packages.php/?id=<?=base64_encode($most_imp['ID'])?>">
                              <h4><?=$most_imp['name']?></h4>
                           </a>
                        </div>
                        </a>
                        <div class="pro-con-para">
                           <h5>Starting from</h5>
                           <?php
                              $price_most= "SELECT * FROM pricing where active=1 and subcategoryID='".$most_imp['ID']."' order by std_final_price "; 
                              $run_price_3 = $db->SelectQry($price_most,$con);	
                              $most_popular_price =mysqli_fetch_assoc($run_price_3);
                              ?>
                           <h3 class="price">₹<?=$most_popular_price['std_final_price']?>/-</h3>
                        </div>
                     </div>
                  </div>
               </div>
               <?php } ?>
            </div>
         </div>
      </section>
      <!--Why Choose Us-->
      <section class="why-bg" id="why_us">
         <div class="tb-overlay"></div>
         <div class="container">
            <div class="row">
               <div class="col-md-8 col-md-offset-2 text-center heading-section animate-box">
                  <h3 class="text-white">Adventure Holidays Packages</h3>
               </div>
            </div>
         </div>
         <div class="container">
            <div class="row">
               <!-- single travel start -->
               <?php 
                  foreach ($adventure as $adventures  ) { ?>
               <div class="col-md-4 col-sm-6">
                  <div class="single-travel">
                     <div class="media">
                        <div class="media-body travel-content">
                           <img src="<?=PATH?>main/uploads/category/<?=$adventures['image']?>">
                           <h4><?=ucwords($adventures['name']);?></h4>
                        </div>
                     </div>
                  </div>
               </div>
               <?php } ?>
               <!-- single travel end -->
            </div>
         </div>
      </section>
      <!-- Facts Section-->
      <section class="facts">
         <div class="container">
            <div class="row">
               <div class="col-md-12">
                  <div class="group-title animate-box">
                     <h3 class="heading-tou" style="text-transform: uppercase;text-align:center;">Why to hold hands with Hill travelers</h3>
                     <p class="con-tou"></p>
                  </div>
               </div>
               <div class="col-md-12">
                  <div class="facts-box">
                     <div class="facts-in-box">
                        <img src="<?=PATH?>images/icon1.png">
                        <h3 class="facts-h" style="text-transform: uppercase;">Reliable advisers:</h3>
                        <p style="text-transform:capitalize">with so many years in travel and tourism we understand the core heart of a traveler. To make your holidays perfect we are always pulling up our socks</p>
                     </div>
                     <div class="facts-in-box">
                        <img src="<?=PATH?>images/icon2.png">
                        <h3 class="facts-h" style="text-transform: uppercase;">Receptive team:</h3>
                        <p style="text-transform:capitalize">A team that tries hard to understands all your queries and comes up with out of the box solutions. So never in doubt, we are just a shout away.</p>
                     </div>
                     <div class="facts-in-box">
                        <img src="<?=PATH?>images/icon3.png">
                        <h3 class="facts-h" style="text-transform: uppercase;">Lifetime experience:</h3>
                        <p style="text-transform:capitalize">It’s not about a trip. It’s “the-memorable trip” that you are going to remember life long. To gain a luxury feel and travel to places by not being in a hurry!</p>
                     </div>
                     <div class="facts-in-box">
                        <img src="<?=PATH?>images/icon4.png">
                        <h3 class="facts-h" style="text-transform: uppercase;">Effortless moves:</h3>
                        <p style="text-transform:capitalize">You can travel to any tourist place with us. We offer the best packages keeping the diverse travelers and their favorite destinations in mind.</p>
                     </div>
                     <div class="facts-in-box">
                        <img src="<?=PATH?>images/icon5.png">
                        <h3 class="facts-h">Recognize & Connect</h3>
                        <p style="text-transform:capitalize">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,</p>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </section>
      <section class="our_testimonials">
         <div class="container">
            <div class="row">
               <div class="col-md-8 col-md-offset-2 text-center heading-section animate-box">
                  <h3 class="text-white">WHAT OUR CLIENTS SAY ABOUT US</h3>
               </div>
            </div>
         </div>
         <div class="container">
            <div class="row">
               <div class="col-md-6">
                  <div class="testi-monial">
                     <?php 
                        $testimonial_query = "select * from testimonials where active='1' order by ID DESC LIMIT 3  "; 
                        $run_teml = mysqli_query($con,$testimonial_query);
                        while ($testi = mysqli_fetch_assoc($run_teml)) { ?> 
                     <div class="slide">
                        <div class="testimonial">
                           <div class="pic">
                              <img src="<?=PATH?>main/uploads/testimony/<?=$testi['image']?>" alt="testimonial-img">
                           </div>
                           <p class="description">
                              <?=$testi['description']?>
                           </p>
                           <h3 class="title"><?=$testi['name']?></h3>
                           <small class="post">- Tourist</small>
                        </div>
                     </div>
                     <?php } ?>
                  </div>
               </div>
               <div class="col-md-6">
                  <div class="testi-monial">
                     <div class="slide">
                        <div class="testimonial">
                           <div class="pic">
                              <img src="<?=PATH?>main/uploads/testimony/1571919100Pimage1845720505.jpg" alt="testimonial-img">
                           </div>
                           <p class="description">
                              Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.
                           </p>
                           <h3 class="title">Arun</h3>
                           <small class="post">- Tourist</small>
                        </div>
                     </div>
                     <div class="slide">
                        <div class="testimonial">
                           <div class="pic">
                              <img src="<?=PATH?>main/uploads/testimony/1571919100Pimage1845720505.jpg" alt="testimonial-img">
                           </div>
                           <p class="description">
                              Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.
                           </p>
                           <h3 class="title">Arun</h3>
                           <small class="post">- Tourist</small>
                        </div>
                     </div>
                     <div class="slide">
                        <div class="testimonial">
                           <div class="pic">
                              <img src="<?=PATH?>main/uploads/testimony/1571919100Pimage1845720505.jpg" alt="testimonial-img">
                           </div>
                           <p class="description">
                              Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.
                           </p>
                           <h3 class="title">Arun</h3>
                           <small class="post">- Tourist</small>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </section>
      <!-- Footer Section-->
      <section class="home-page-form">
         <div class="container">
            <div class="col-md-12">
               <div class="home-page-form-box" style="background: linear-gradient(rgba(46, 45, 47, 0.68), rgb(2, 2, 2)),url(images/cover_bg_2.jpg)">
                  <div class="h-page-tagline">
                     <h1>PLAN YOUR HOLIDAYS WITH OUR ASSISTANCE, JUST FILL IN YOUR DETAILS.</h1>
                  </div>
                  <div class="h-page-contact-form">
                     <?php if(isset($msg) and $msg!='') echo $msg; ?>
                     <form name="Faq" id="Faq" method="post" action="register.php">
                        <div class="form-group">
                           <input type="text" class="form-control" name="name" id="name" placeholder="Enter Name" required>
                        </div>
                        <div class="form-group">
                           <input type="email" name="email" class="form-control" id="email" placeholder="Enter Email" required>
                        </div>
                        <div class="form-group">
                           <input type="text" class="form-control" placeholder="Contact Number" name="mobile_no" id="mobile_no" maxlength="10" required>
                        </div>
                        <div class="form-group">
                           <textarea class="form-control" name="message" placeholder="Message Type Here"></textarea>
                        </div>
                        <button type="submit" name="faq_submit" class="btn btn-warning">Submit</button>
                     </form>
                  </div>
               </div>
            </div>
         </div>
      </section>
      <?php include('include/footer.php');?>	
      <script type="text/javascript">
         $(document).ready(function(){
         	$("#testimonial-slider").owlCarousel({
         		items:1,
         		itemsDesktop:[1000,1],
         		itemsDesktopSmall:[979,1],
         		itemsTablet:[768,1],
         		pagination: true,
         		autoPlay:true, 
         	});
         });
         $(document).ready(function(){
         	$("#testimonial-slider1").owlCarousel({
         		items:1,
         		itemsDesktop:[1000,1],
         		itemsDesktopSmall:[979,1],
         		itemsTablet:[768,1],
         		pagination: true,
         		autoPlay:true,
         
         	});
         });
         			// 		$(document).ready(function(){
         			//     $("#box-slid").owlCarousel({
         			//         items:6,
         			//         itemsDesktop:[1000,6],
         			//         itemsDesktopSmall:[979,6],
         			//         itemsTablet:[768,4],
         			//         pagination: true,
         			//         autoPlay:true
         			//     });
         			// });
         
         
         			$(".slide-bx").slick({
         				autoplay: false,
         				autoplaySpeed: 3600,
         				dots: false,
         				arrows: true,
         				slidesToShow: 5,
         				slidesToScroll: 1,
         				infinite: !0,
         				margin: 5,
         				responsive: [{
         					breakpoint: 1200,
         					settings: {
         						slidesToShow: 1
         					}
         				}, {
         					breakpoint: 992,
         					settings: {
         						slidesToShow: 3
         					}
         				}, {
         					breakpoint: 768,
         					settings: {
         						slidesToShow: 3,
         						slidesToScroll: 1
         					}
         				}, {
         					breakpoint: 670,
         					settings: {
         						slidesToShow: 2,
         						slidesToScroll: 1
         					}
         				}]
         			});
         
         			$(".testi-monial").slick({
         				autoplay: false,
         				autoplaySpeed: 3000,
         				dots: true,
         				arrows: false,
         				slidesToShow: 1,
         				slidesToScroll: 1,
         				infinite: !0,
         				margin: 5,
         				responsive: [{
         					breakpoint: 1200,
         					settings: {
         						slidesToShow: 1
         					}
         				}, {
         					breakpoint: 992,
         					settings: {
         						slidesToShow: 1
         					}
         				}, {
         					breakpoint: 768,
         					settings: {
         						slidesToShow: 1,
         						slidesToScroll: 1
         					}
         				}, {
         					breakpoint: 670,
         					settings: {
         						slidesToShow: 1,
         						slidesToScroll: 1
         					}
         				}]
         			});
         
         
         
         			/*Read More Deatil About Tourism*/
         			function showfullData()
         			{
         				$("#less_detail").show();
         				$("#show_detail").hide();
         			}
         			function showfullData_1()
         			{
         				$("#less_detail_intl").show();
         				$("#show_detail_intl").hide();
         			}
         			function showfullData_2()
         			{
         				$("#less_detail_honeymoon").show();
         				$("#show_detail_honeymoon").hide();
         			}
         			function showfullData_3()
         			{
         				$("#less_detail_special").show();
         				$("#show_detail_special").hide();
         			}
         
         			function hidefullData()
         			{
         				$("#less_detail").hide();
         				$("#show_detail").show();
         			}
         			function hidefullData_1()
         			{
         				$("#less_detail_intl").hide();
         				$("#show_detail_intl").show();
         			}
         			function hidefullData_2()
         			{
         				$("#less_detail_honeymoon").hide();
         				$("#show_detail_honeymoon").show();
         			}
         			function hidefullData_3()
         			{
         				$("#less_detail_special").hide();
         				$("#show_detail_special").show();
         			}
         
         			/*End Here */
      </script>
   </body>
</html>