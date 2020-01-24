<?php 
require_once('main/controller/dbclass.php');
require_once('include/define.php');
$db=new dbclass();$con=$db->Connection();
$url = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
$link_array = explode('/',$url);
$packID = end($link_array);


$gallery_query = "select * from gallery where status='1' order by ID DESC "; 
$run_gallery = mysqli_query($con,$gallery_query);
$count = mysqli_num_rows($run_gallery);
$gallery = array();
if ($count > 0) 
{
	while($fetched_gallery = mysqli_fetch_assoc($run_gallery))
	{
		array_push($gallery, $fetched_gallery);
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
	
	<link href='https://fonts.googleapis.com/css?family=Open+Sans:400,700,300' rel='stylesheet' type='text/css'>
	
	<!-- Animate.css -->
	<link rel="stylesheet" href="<?=PATH?>css/animate.css">
	<!-- Owl Carsoul.css -->
	<link rel="stylesheet" href="<?=PATH?>css/owl.carousel.min.css">
	<!-- Font Awesome5 Fonts-->
	
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
	<link rel="stylesheet" href="<?=PATH?>css/lightweightLightbox.css">
	<link rel="stylesheet" href="<?=PATH?>css/style.css">

	<!-- Modernizr JS -->
	<script src="<?=PATH?>js/modernizr-2.6.2.min.js"></script>

	</head>
	<body>
		<div id="tb-wrapper">
		<div id="tb-page">

	<?php include('include/header.php');?>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
		<!-- end:header-top -->
	
		<div class=" ">
			<div class="tb-overlay1"></div>
			<div class="inner-bac" style="background-image: url(<?=PATH?>images/customize-banner.jpg); background-size: cover;">
			
			<div class="container">
					<div class="text-center hea"><h3><strong>Gallery</strong></h3></div>
				</div>
			</div>

		</div>


		<section>
			<div class="container">
				<div class="row">
					
						<div class="custo-text">
							<h1>Customize Your Trip - Best Holiday Itinerary Planner</h1>
							<h4>Handcrafted plans by experts with details that even guidebooks miss!</h4>
							<p>Planning a trip? Worried about how to do it? So here we are to help you out to plan your trip to India. We offer the best family tours and honeymoon packages. With our vacation planner in India, you can get customizable holiday packages among varied themes.</p>
							
						</div>
					
				</div>

                <div class="row">
                    
                    <div class="lightbox-container">
                    	<?php foreach ($gallery as $galleries) { ?>
                        <div class="box">
                          <img alt="<?=$galleries['name']?>" class="lightbox-image" src="<?=PATH?>main/uploads/gallery/<?=$galleries['image']?>" />
                      </div>
                  <?php } ?>
                       <!--  <div class="box">
                            <img alt="An example image 2" class="lightbox-image" src="https://unsplash.it/1200/800?image=973" />
                        </div>
                        <div class="box">
                            <img alt="An example image 3" class="lightbox-image" src="https://unsplash.it/1200/800?image=972" />
                        </div>
                        <div class="box">
                          <img alt="An example image 4" class="lightbox-image" src="https://unsplash.it/1200/800?image=971" />
                        </div>
                        <div class="box">
                            <img alt="An example image 5" class="lightbox-image" src="https://unsplash.it/1200/800?image=970" />
                        </div>
                        <div class="box">
                          <img alt="An example image 1" class="lightbox-image" src="https://unsplash.it/1200/800?image=974" />
                      </div>
                        <div class="box">
                            <img alt="An example image 2" class="lightbox-image" src="https://unsplash.it/1200/800?image=973" />
                        </div>
                        <div class="box">
                            <img alt="An example image 3" class="lightbox-image" src="https://unsplash.it/1200/800?image=972" />
                        </div>
                        <div class="box">
                          <img alt="An example image 4" class="lightbox-image" src="https://unsplash.it/1200/800?image=971" />
                        </div>
                        <div class="box">
                            <img alt="An example image 5" class="lightbox-image" src="https://unsplash.it/1200/800?image=970" />
                        </div>
                        <div class="box">
                          <img alt="An example image 1" class="lightbox-image" src="https://unsplash.it/1200/800?image=974" />
                      </div>
                        <div class="box">
                            <img alt="An example image 2" class="lightbox-image" src="https://unsplash.it/1200/800?image=973" />
                        </div>
                        <div class="box">
                            <img alt="An example image 3" class="lightbox-image" src="https://unsplash.it/1200/800?image=972" />
                        </div>
                        <div class="box">
                          <img alt="An example image 4" class="lightbox-image" src="https://unsplash.it/1200/800?image=971" />
                        </div>
                        <div class="box">
                            <img alt="An example image 5" class="lightbox-image" src="https://unsplash.it/1200/800?image=970" />
                        </div> -->
                    </div>
                </div>
				
			</div>
		</section>



		<!-- Footer Section-->
		<?php include('include/footer.php');?>
		
	

	

	</div>
	<!-- END tb-page -->

	</div>
	<!-- END tb-wrapper -->

	<!-- jQuery -->


	<script src="<?=PATH?>js/jquery.min.js"></script>
	<!-- jQuery Easing -->
	<script src="<?=PATH?>js/jquery.easing.1.3.js"></script>
	<!-- Bootstrap -->
	<script src="<?=PATH?>js/bootstrap.min.js"></script>
	<!-- Waypoints -->
	<script src="<?=PATH?>js/jquery.waypoints.min.js"></script>
	<script src="<?=PATH?>js/sticky.js"></script>
	<!-- Owl Carsoul -->
	<script type="text/javascript" src="<?=PATH?>js/owl.carousel.min.js"></script>

	<!-- Stellar -->
	<script src="<?=PATH?>js/jquery.stellar.min.js"></script>
	<!-- Superfish -->
	<script src="<?=PATH?>js/hoverIntent.js"></script>
	<script src="<?=PATH?>js/superfish.js"></script>
	<!-- Magnific Popup -->
	<script src="<?=PATH?>js/jquery.magnific-popup.min.js"></script>
	<script src="<?=PATH?>js/magnific-popup-options.js"></script>
	<!-- Date Picker -->
	<script src="<?=PATH?>js/bootstrap-datepicker.min.js"></script>
	<!-- CS Select -->
	<script src="<?=PATH?>js/classie.js"></script>
	<script src="<?=PATH?>js/selectFx.js"></script>
	<script src="<?=PATH?>js/lightweightLightbox.min.js"></script>
	<!-- Main JS -->
	<script src="<?=PATH?>js/main.js"></script>

<script type="text/javascript">
    $(".lightbox-container").lightweightLightbox();
</script>


	</body>

</html>

