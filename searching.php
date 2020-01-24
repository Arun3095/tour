<?php
   require_once('main/controller/dbclass.php');
   include('include/define.php');
   $db=new dbclass();
   $con=$db->Connection();

   if (isset($_POST['searching_btn'])) {
       $search=isset($_POST["search_destination"])?$_POST["search_destination"]:"";

      $searchin_field = "SELECT * FROM category WHERE MATCH(name, slug) AGAINST('".$search."' IN NATURAL LANGUAGE MODE) AND adventure_package !=1 ";
       $res_search=$db->SelectQry($searchin_field,$con);
       $data_search = mysqli_num_rows($res_search); 
       $all_searches = array();
       if ($data_search > 0) {
            while ($search_list = mysqli_fetch_assoc($res_search)) {
               array_push($all_searches, $search_list);
            }
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
            <!-- end:header-top -->
            <div class=" ">
               <div class="tb-overlay1"></div>
               <div class=""
                  style="background-image: url(<?=PATH?>images/inner-banner.jpg);  min-height: 260px;  max-height: 260px; background-size: 100% 100%;">
                  <div class="text-center hea">
                     <h3><strong>Search List Of Tour's</strong></h3>
                  </div>
               </div>
            </div>
            <!-- Tours Section -->
            <section id="tb-tours" class="tb-section-gray">
               <div class="container">
                  <div class="row">
                     <div class="col-md-12 text-center heading-section animate-box">
                        <h3 style="color:#e07932;">WELCOME TO HILLS TRAVELER</h3>
                        <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.</p>
                     </div>
                  </div>
                  <div class="row">

                   <div class="slide-bx">
                     
                      <?php foreach ($all_searches as $all_search) { ?>

                     <div id="slide">
                        <div class="col-md-3">
                        <div class="pro-con-box">
                           <a href="<?=PATH?>hills-traveler-packages.php/?id=<?=base64_encode($all_search['ID'])?>"><img src="<?=PATH?>main/uploads/category/<?=$all_search['image']?>"></a>
                           <div class="con-box-cl">
                              <div class="pro-title">
                                 <a href="<?=PATH?>hills-traveler-packages.php/?id=<?=base64_encode($all_search['ID'])?>">
                                    <h4><?=$all_search['name']?></h4>
                                 </a>
                              </div>
                              <div class="pro-con-para">
                                 <h5>Starting from</h5>
                                 <?php
                                    $price_query= "SELECT * FROM pricing where active=1 and subcategoryID='".$all_search['ID']."' order by std_final_price "; 
                                    $run_price = $db->SelectQry($price_query,$con); 
                                    $lowest_price_india =mysqli_fetch_assoc($run_price);
                                    ?>
                                 <h3 class="price">₹<?=$lowest_price_india['std_final_price']?>/-</h3>
                              </div>
                           </div>
                        </div>
                     </div>
                      </div>
                     <?php } ?>
                </div>
               </div>
            </div>
         </div>
      </section>
            <!-- Footer Section-->
       <?php include('include/footer.php');?>
   </body>
</html>