<?php
session_start(); 
require_once('main/controller/dbclass.php');
include('include/define.php');
$db=new dbclass();$con=$db->Connection();
$url = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
$link_array = explode('/',$url);
$packID = end($link_array);
$pckg_id = base64_decode($_GET['id']);

/*All  Packages*/
$qry="Select * FROM package where active='1' and childcatID='".$pckg_id."' order by ID ASC";
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

}

/*All  Category*/
$qry_1="Select * FROM category where active='1' and ID='".$pckg_id."' and parantID != '0' order by ID ASC";
$res_1=$db->SelectQry($qry_1,$con);	
$Rows2_1 = mysqli_num_rows($res_1);	
$category_tour =array();
if($Rows2_1 > 0)	
{ 	
	$j=0;  	
	while($get_cat_primary =mysqli_fetch_assoc($res_1))   	
	{		       			
		$category_tour[$j++]=$get_cat_primary;
	}
//echo "<pre/>"; print_r($category);die();
}

$departure_query ="SELECT * from add_on_price";
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

			<!-- end:header-top -->
			<div class="">
				<div class="tb-overlay1"></div>
				<div class="inner-bac" style="background-image: url(<?=PATH?>images/inner-banner.jpg); background-size: cover;">
					<div class="container">
						<div class="text-center hea"><h3><strong><?=$packages[0]['name']?></strong></h3></div>
					</div>
				</div>
			</div>

			<div class="inner-serial">
				<div class="container">
					<div class="row">
						<div class="col-md-12">
							<div class="breadcrum">
								<ul class="list-inline">
									<li><a href="#">Home</a></li>
									<li><?=$category_tour[0]['name']?></li>
								</ul>
							</div>
						</div>
					</div>
				</div>
			</div>



			<!-- Tours Section -->
			<section id="tb-tours" class="tb-section-gray">
				<div class="container">
					<div class="row">
						<div class="col-md-12 ">
							<h3 class="heading-tou" ><?=$category_tour[0]['name']?></h3>
							<p style="display: none;" id="less_detail"><?= $category_tour[0]['narration']; ?><span style="color: orange" onclick="hidefullData();">Read less</span></p>

							<p id="show_detail"><?= substr($category_tour[0]['narration'],0,-1600).'...'?><span style="color: orange" onclick="showfullData();">Read More</span></p>

						</div>
					</div>
					<div class="row">
						<div class="col-md-12">
							<?php 
							$query = "Select package.*,pricing.lux_final_price,pricing.lux_regular_price,pricing.std_final_price,pricing.std_regular_price,pricing.prm_regular_price,pricing.prm_regular_price,pricing.ID as priceID FROM package LEFT JOIN pricing ON pricing.packageID=package.ID where package.active='1' and package.childcatID='".$pckg_id."' order by package.ID DESC";
							$Result = $db->SelectQry($query,$con);
							while($fetch =mysqli_fetch_assoc($Result))   	
							{	

								?>

								<div class="package-box">
									<div class="pack-heading-box1">
										<div class="row">
											<div class="col-md-12">
												<h5 class="pack-heading font-s"><a href="#"><?=$fetch['heading']?></h5>
												</div>
											</div>
										</div>
										<?php
										if ($fetch['deal'] != '') { ?>
											<div class="offers-box">
												<img src="<?=PATH?>images/offers.png">
											</div>
										<?php } ?>
										<div class="row">
											<div class="col-md-4">
												<div class="package-img-box">
													<img class="img-responsive" src="<?=PATH?>main/uploads/category/<?=$fetch['image']?>">
													<div class="log">
														<ul class="list-inline">
															<?php 
															$abcd = explode(',',$fetch["tag"]);
			// print_r($abcd);die();
															foreach($abcd as $key)
															{
																?>
																<li><a><?=$key?> </a></li>

															<?php   }
															?>
														</ul>
													</div>
												</div>
											</div>
											<div class="col-md-5">

												<div class="package-con-box">
													<div class="pack-order-id">
														<!-- <h5 class="pack-oder1">Package ID: <?=$fetch//['childcatID']?></h5> -->
													</div>
													<div>


														<ul>
															<?php 
															$qry1 = "select * FROM icons where ID IN(".$fetch['icons'].")";
															$RUN = $db->SelectQry($qry1,$con);
															while($getIcons =mysqli_fetch_assoc($RUN))   	
															{
																$icon = $getIcons["image"];
																$name = $getIcons["name"];
																$abcd = explode(',',$icon);
// print_r($abcd);//die();
// foreach($abcd as $key)
// { ?>

	<li class="facilityIcon"><p class="iconn" style="margin: 5px 0px;;"><span><?=ucfirst($name)?></span></p><p style="margin: 0;"><img height="45" width="45" src="<?=PATH?>main/uploads/icon/<?=$icon?>"></p></li>	
<?php //}
}
?>
</ul>

</div>
</div>
<div class="pack-select">
	<h5>Choose Your Hotel</h5>
	<div class="pack-sec-btn" onchange="getprice(1,<?=$fetch['ID']?>)" onclick="openCity(event, 'Standard')">
		<input checked type="radio" name="radio1"> Standard </div>
		<div class="pack-sec-btn" onchange="getprice(2,<?=$fetch['ID']?>)" onclick="openCity(event, 'Luxury')">
			<input type="radio" name="radio1"> Luxury </div>

			<div class="pack-sec-btn" onchange="getprice(3,<?=$fetch['ID']?>)" onclick="openCity(event, 'Premium')">
				<input type="radio" name="radio1"> Premium </div>
			</div>
		</div>

		<div class="col-md-3 ">
			<div class="paymenyopt" id="packprice<?=$fetch['ID']?>">
				<span class="ramount">₹ <?=$fetch['std_final_price']?></span><span><strike>₹ <?=$fetch['std_regular_price']?></strike>
				</span>
				<p class="pack-person">Per person</p>
				<a href="<?=PATH?>book-now.php?id=<?=base64_encode($fetch['ID'])?>" class="cus-btn">Book Online</a>
				<a href="#" class="cus-btn" data-toggle="modal" data-target="#myModal">Contact Us</a>
			</div>
		</div>

	</div>
</div>
<?php } ?>	
</div>
</div>
<div class="row detail-info-pckg">
	<div class="col-md-12">
		<h1 class="heading-tou"><?=$category_tour[0]['name'].'&nbsp;Tourism'; ?></h1>
		<p><?=$category_tour[0]['narration']; ?></P>


			<h1 class="heading-tou"><?=$category_tour[0]['name'].'&nbsp;Tourism'; ?></h1>
			<p>Himachal Tour Packages From Ahmedabad Himachal Tour Packages From Bangalore Himachal Tour 	Packages From Chennai Himachal Tour Packages From Delhi Himachal Tour Packages From 	   Kolkata Himachal Tour Packages From Mumbai
			</P>

			<h1 class="heading-tou"><?=$category_tour[0]['name'].'&nbsp;Tourism'; ?></h1>
			<p>Himachal Tour Packages From Ahmedabad Himachal Tour Packages From Bangalore Himachal Tour 	Packages From Chennai Himachal Tour Packages From Delhi Himachal Tour Packages From 	   Kolkata Himachal Tour Packages From Mumbai</P>
			</div>
		</div>
	</div>

</section>
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
							<label for="checkbox"><input type="checkbox" name="terms_conditions" id="terms_conditions" class="filled-in chk-col-green" onclick="checked_or_not()"></label>I hereby accept the Privacy Policy and authorize Hills Traveller and its representatives to contact me.
						</div>
					</div>

					<!-- Modal footer -->
					<div class="modal-footer">
						<div class="form-group">
							<input type="submit" name="submit_model" id="submit_model" class="btn btn-success" value="Submit"  disabled>
						</div>
					</form>
				</div>

			</div>
		</div>
	</div>

</div>
<?php include('include/footer.php');?>		
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Zebra_datepicker/1.9.13/css/default/zebra_datepicker.min.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/Zebra_datepicker/1.9.13/zebra_datepicker.min.js"></script>
<script>
	function getprice(a,b)
	{

		$.ajax({
			type: 'POST',
			url: '<?=PATH?>getprice.php',
			data: {pid:a,packageid:b},
			beforeSend: function(){
				$("#error").fadeOut();
			},
			success: function(data){
				$('#packprice'+b).html(data);
			}
		});
	}

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

	/*checked to read Terms & conditions*/
	function checked_or_not()
	{
		if ($('#terms_conditions').prop('checked'))
		{
			$('#submit_model').prop('disabled', false);
		}
		else {
alert("Please Read Our Terms & Condtions Policy"); //not checked
$('#submit_model').prop('disabled', true);
}
}

</script>
<script type="text/javascript">
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

	function showfullData()
	{
		$("#less_detail").show();
		$("#show_detail").hide();
	}

	function hidefullData()
	{
		$("#less_detail").hide();
		$("#show_detail").show();
	}



</script>
</body>

</html>

