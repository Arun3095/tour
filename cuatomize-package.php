<?php 
require_once('main/controller/dbclass.php');
require_once('include/define.php');
$db=new dbclass();$con=$db->Connection();
$url = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
$link_array = explode('/',$url);
$packID = end($link_array);
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
	
	<link rel="stylesheet" href="<?=PATH?>css/style.css">
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
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
					<div class="text-center hea"><h3><strong>Cuatomize Package</strong></h3></div>
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
							<p>India is dotted with majestic snow-laden mountain peaks, glistening rivers, unexplored wildlife sanctuaries, ancient temples, exquisite monuments, exotic species of flora, fauna, and avifauna, and the infinite number of architectural and manmade marvels. There is no dearth of places for a trip planner in India.</p>
						</div>
					
				</div>
				<div class="row">
					  <div class="com-md-12">
					  	
					  	<div class="cus-form">

					  	<div class="row">
                
                        <label class="col-lg-12 cust-txt-h">Travel Details</label>
                                                
                        <div class="col-sm-6 form-group">
                        	<label class="custop-txt">Tentative Date of Arriva</label>
                            <div class="input-group">
                                <div class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span></div>
                                <input type="date" name="Tentative Date of Arrival" id="destination" class="form-control" placeholder="Tentative Date of Arrival">
                            </div>
                        </div>
                                                                                            
                        <div class="col-sm-6 form-group">
                        	<label class="custop-txt">Departure</label>
                            <div class="input-group">
                                <div class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span></div>
                                <input type="date" name="Departure" id="destination" class="form-control" placeholder="Departure">
                            </div>
                        </div>
                        
                        <div class="col-md-6 col-sm-12">
                            <div class="row">
                                <div class="col-xs-4 form-group custfld-wth">
                                    <label style="font-size:15px;">Adults (12+ years)</label>
                                    <div class="input-group">
                                        <div class="input-group-addon"><span class="glyphicon glyphicon-user"></span></div>
                                        <select class="form-control" name="adults">
                                            <option value="">Select</option>
                                            <option value="1">1</option><option value="2">2</option><option value="3">3</option><option value="4">4</option><option value="5">5</option><option value="6">6</option><option value="7">7</option><option value="8">8</option><option value="9">9</option><option value="10">10</option><option value="11">11</option><option value="12">12</option><option value="13">13</option><option value="14">14</option><option value="15">15</option><option value="16">16</option><option value="17">17</option><option value="18">18</option><option value="19">19</option><option value="20">20</option><option value="21">21</option><option value="22">22</option><option value="23">23</option><option value="24">24</option><option value="25">25</option><option value="26">26</option><option value="27">27</option><option value="28">28</option><option value="29">29</option><option value="30">30</option>                                        </select>
                                    </div>
                                </div>
                            
                                <div class="col-xs-8 custfld-wth">  
                                    <div class="row">   
                                        <label class="col-lg-12 text-center">Children</label>                                                                               
                                        <div class="col-xs-6 form-group custfld1">
                                            <div class="input-group">
                                                <div class="input-group-addon"><span class="glyphicon glyphicon-user"></span></div>
                                                <select class="form-control" name="children">
                                                    <option value="">5-12 years</option>
													<option value="1">1</option><option value="2">2</option><option value="3">3</option><option value="4">4</option><option value="5">5</option><option value="6">6</option><option value="7">7</option><option value="8">8</option><option value="9">9</option><option value="10">10</option><option value="11">11</option><option value="12">12</option><option value="13">13</option><option value="14">14</option><option value="15">15</option><option value="16">16</option><option value="17">17</option><option value="18">18</option><option value="19">19</option><option value="20">20</option>                                                </select>
                                            </div>
                                        </div>
                                                                                                
                                        <div class="col-xs-6 form-group">
                                            <div class="input-group custfld2">
                                                <div class="input-group-addon"><span class="glyphicon glyphicon-user"></span></div>
                                                <select class="form-control" name="infants">
                                                    <option value="">0-5 years</option>
													<option value="1">1</option><option value="2">2</option><option value="3">3</option><option value="4">4</option><option value="5">5</option><option value="6">6</option><option value="7">7</option><option value="8">8</option><option value="9">9</option><option value="10">10</option><option value="11">11</option><option value="12">12</option><option value="13">13</option><option value="14">14</option><option value="15">15</option><option value="16">16</option><option value="17">17</option><option value="18">18</option><option value="19">19</option><option value="20">20</option>                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <div class="col-md-3 col-sm-6 form-group custmg">
                            <div class="input-group">
                                <div class="input-group-addon"><span class="glyphicon glyphicon-home"></span></div>
                                <select class="form-control" name="accom" id="accom">
                                    <option value="">Accommodation Type</option>
                                    <option value="Luxury">Luxury</option>
                                    <option value="5 Star">5 Star</option>
                                    <option value="4 Star">4 Star</option>
                                    <option value="3 Star">3 Star</option>
                                    <option value="Budget">Budget</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-3 col-sm-6 form-group custmg">
                            <div class="input-group">
                                <div class="input-group-addon"><span class="glyphicon glyphicon-piggy-bank"></span></div>
                                <select class="form-control" name="accom" id="accom">
                                    <option value="">Budget</option>
                                    <option value="price-b1">Up to 20,000.00</option>
                                    <option value="price-b2">Up to 30,000.00</option>
                                    <option value="price-b3">Up to 40,000.00</option>
                                    <option value="price-b4">Up to 50,000.00</option>
                                    
                                </select>
                            </div>
                        </div>
                        
                        <div class="clearfix"></div>
                        
                        <label class="col-lg-12 custop-txt">Personal Details</label>
                        
                        <div class="col-sm-6 form-group">
                            <div class="input-group">
                                <div class="input-group-addon"><span class="glyphicon glyphicon-user"></span></div>
                                <input type="text" class="form-control" placeholder="Name" name="Name" id="personal_name" value="">
                            </div>
                        </div>
                                                                                                                                                                    
                        <div class="col-sm-6 form-group">
                            <div class="input-group">
                                <div class="input-group-addon"><span class="glyphicon glyphicon-envelope"></span></div>
                                <input type="text" class="form-control" placeholder="Email" name="Email" value="">
                            </div>
                        </div>
                                                                                                                                                                    
                        <div class="col-sm-6 col-xs-12 form-group">
                            <div class="input-group">
                                <div class="input-group-addon"><span class="glyphicon glyphicon-globe"></span></div>
                                <select class="form-control" id="countryCombo" name="country" onchange="getISDCode(this.value)">
                                    <option value="" selected="">Country of Residence
                                            <script type="text/javascript">
                                                    ShowCountryOption();
                                            </script></option><option value="Afghanistan">Afghanistan</option>
<option value="Albania">Albania</option>
<option value="Algeria">Algeria</option>
<option value="American Samoa">American Samoa</option>
<option value="Andorra">Andorra</option>
<option value="Angola">Angola</option>
<option value="Anguilla">Anguilla</option>
<option value="Antarctica">Antarctica</option>
<option value="Antigua and Barbuda">Antigua and Barbuda</option>
<option value="Argentina">Argentina</option>
<option value="Armenia">Armenia</option>
<option value="Aruba">Aruba</option>
<option value="Ascension">Ascension</option>
<option value="Australia">Australia</option>
<option value="Austria">Austria</option>
<option value="Azerbaijan">Azerbaijan</option>
<option value="Bahamas">Bahamas</option>
<option value="Bahrain">Bahrain</option>
<option value="Bangladesh">Bangladesh</option>
<option value="Barbados">Barbados</option>
<option value="Belarus">Belarus</option>
<option value="Belgium">Belgium</option>
<option value="Belize">Belize</option>
<option value="Benin">Benin</option>
<option value="Bermuda">Bermuda</option>
<option value="Bhutan">Bhutan</option>
<option value="Bolivia">Bolivia</option>
<option value="Bosnia and Herzegovina">Bosnia and Herzegovina</option>
<option value="Botswana">Botswana</option>
<option value="Brazil">Brazil</option>
<option value="British Virgin Islands">British Virgin Islands</option>
<option value="Brunei">Brunei</option>
<option value="Bulgaria">Bulgaria</option>
<option value="Burkina Faso">Burkina Faso</option>
<option value="Burundi">Burundi</option>
<option value="Cambodia">Cambodia</option>
<option value="Cameroon">Cameroon</option>
<option value="Canada">Canada</option>
<option value="Cape Verde Islands">Cape Verde Islands</option>
<option value="Cayman Islands">Cayman Islands</option>
<option value="Central African Republic">Central African Republic</option>
<option value="Chad">Chad</option>
<option value="Chatham Island (New Zealand)">Chatham Island (New Zealand)</option>
<option value="Chile">Chile</option>
<option value="China">China</option>
<option value="Christmas Island">Christmas Island</option>
<option value="Cocos Islands">Cocos Islands</option>
<option value="Colombia">Colombia</option>
<option value="Comoros">Comoros</option>
<option value="Congo">Congo</option>
<option value="Cook Islands">Cook Islands</option>
<option value="Costa Rica">Costa Rica</option>
<option value="Croatia">Croatia</option>
<option value="Cuba">Cuba</option>
<option value="Cyprus">Cyprus</option>
<option value="Czech Republic">Czech Republic</option>
<option value="Denmark">Denmark</option>
<option value="Diego Garcia">Diego Garcia</option>
<option value="Djibouti">Djibouti</option>
<option value="Dominica">Dominica</option>
<option value="Dominican Republic">Dominican Republic</option>
<option value="Easter Island">Easter Island</option>
<option value="Ecuador">Ecuador</option>
<option value="Egypt">Egypt</option>
<option value="El Salvador">El Salvador</option>
<option value="Equatorial Guinea">Equatorial Guinea</option>
<option value="Eritrea">Eritrea</option>
<option value="Estonia">Estonia</option>
<option value="Ethiopia">Ethiopia</option>
<option value="Falkland Islands">Falkland Islands</option>
<option value="Faroe Islands">Faroe Islands</option>
<option value="Fiji">Fiji</option>
<option value="Finland">Finland</option>
<option value="France">France</option>
<option value="French Antilles">French Antilles</option>
<option value="French Guyana">French Guyana</option>
<option value="French Polynesia">French Polynesia</option>
<option value="Fyrom (Macedonia)">Fyrom (Macedonia)</option>
<option value="Gabon">Gabon</option>
<option value="Gambia">Gambia</option>
<option value="Georgia">Georgia</option>
<option value="Germany">Germany</option>
<option value="Ghana">Ghana</option>
<option value="Gibraltar">Gibraltar</option>
<option value="Greece">Greece</option>
<option value="Greenland">Greenland</option>
<option value="Grenada and Carriacuou">Grenada and Carriacuou</option>
<option value="Grenadin Islands">Grenadin Islands</option>
<option value="Guadeloupe">Guadeloupe</option>
<option value="Guam">Guam</option>
<option value="Guantanamo Bay">Guantanamo Bay</option>
<option value="Guatemala">Guatemala</option>
<option value="Guiana">Guiana</option>
<option value="Guinea">Guinea</option>
<option value="Guinea-Bissau">Guinea-Bissau</option>
<option value="Guyana">Guyana</option>
<option value="Haiti">Haiti</option>
<option value="Honduras">Honduras</option>
<option value="Hong Kong">Hong Kong</option>
<option value="Hungary">Hungary</option>
<option value="Iceland">Iceland</option>
<option value="India">India</option>
<option value="Indonesia">Indonesia</option>
<option value="Iran">Iran</option>
<option value="Iraq">Iraq</option>
<option value="Ireland">Ireland</option>
<option value="Israel">Israel</option>
<option value="Italy">Italy</option>
<option value="Ivory Coast">Ivory Coast</option>
<option value="Jamaica">Jamaica</option>
<option value="Japan">Japan</option>
<option value="Jerusalem">Jerusalem</option>
<option value="Jordan">Jordan</option>
<option value="Kazakhstan">Kazakhstan</option>
<option value="Kenya">Kenya</option>
<option value="Kiribati">Kiribati</option>
<option value="South Korea">South Korea</option>
<option value="Kuwait">Kuwait</option>
<option value="Kygyzstan">Kygyzstan</option>
<option value="Laos">Laos</option>
<option value="Latvia">Latvia</option>
<option value="Lebanon">Lebanon</option>
<option value="Lesotho">Lesotho</option>
<option value="Liberia">Liberia</option>
<option value="Libya">Libya</option>
<option value="Liechtenstein">Liechtenstein</option>
<option value="Lithuania">Lithuania</option>
<option value="Luxembourg">Luxembourg</option>
<option value="Macau">Macau</option>
<option value="Macedonia">Macedonia</option>
<option value="Madagascar">Madagascar</option>
<option value="Malawi">Malawi</option>
<option value="Malaysia">Malaysia</option>
<option value="Maldives">Maldives</option>
<option value="Mali">Mali</option>
<option value="Malta">Malta</option>
<option value="Mariana Islands">Mariana Islands</option>
<option value="Marshall Islands">Marshall Islands</option>
<option value="Martinique">Martinique</option>
<option value="Mauritania">Mauritania</option>
<option value="Mauritius">Mauritius</option>
<option value="Mayotte">Mayotte</option>
<option value="Mexico">Mexico</option>
<option value="Micronesia,  Federated States">Micronesia,  Federated States</option>
<option value="Midway Islands">Midway Islands</option>
<option value="Miquelon">Miquelon</option>
<option value="Moldova">Moldova</option>
<option value="Monaco">Monaco</option>
<option value="Mongolia">Mongolia</option>
<option value="Montserrat">Montserrat</option>
<option value="Morocco">Morocco</option>
<option value="Mozambique">Mozambique</option>
<option value="Myanmar">Myanmar</option>
<option value="Namibia">Namibia</option>
<option value="Nauru">Nauru</option>
<option value="Nepal">Nepal</option>
<option value="Netherlands">Netherlands</option>
<option value="Neth. Antilles">Neth. Antilles</option>
<option value="Nevis">Nevis</option>
<option value="New Caledonia">New Caledonia</option>
<option value="New Zealand">New Zealand</option>
<option value="Nicaragua">Nicaragua</option>
<option value="Niger">Niger</option>
<option value="Nigeria">Nigeria</option>
<option value="Niue">Niue</option>
<option value="Norfolk Island">Norfolk Island</option>
<option value="North Korea">North Korea</option>
<option value="Norway">Norway</option>
<option value="Oman">Oman</option>
<option value="Pakistan">Pakistan</option>
<option value="Palau">Palau</option>
<option value="Panama">Panama</option>
<option value="Papua New Guinea">Papua New Guinea</option>
<option value="Paraguay">Paraguay</option>
<option value="Peru">Peru</option>
<option value="Philippines">Philippines</option>
<option value="Poland">Poland</option>
<option value="Portugal">Portugal</option>
<option value="Principe">Principe</option>
<option value="Puerto Rico">Puerto Rico</option>
<option value="Qatar">Qatar</option>
<option value="Reunion Island">Reunion Island</option>
<option value="Romania">Romania</option>
<option value="Russia">Russia</option>
<option value="Rwanda">Rwanda</option>
<option value="St. Helena">St. Helena</option>
<option value="St. Kitts">St. Kitts</option>
<option value="St. Lucia">St. Lucia</option>
<option value="St Pierre et Miquelon">St Pierre et Miquelon</option>
<option value="St. Vincent">St. Vincent</option>
<option value="Saipan">Saipan</option>
<option value="San Marino">San Marino</option>
<option value="Sao Tome">Sao Tome</option>
<option value="Saudi Arabia">Saudi Arabia</option>
<option value="Senegal Republic">Senegal Republic</option>
<option value="Serbia">Serbia</option>
<option value="Seychelles">Seychelles</option>
<option value="Sierra Leone">Sierra Leone</option>
<option value="Singapore">Singapore</option>
<option value="Slovakia">Slovakia</option>
<option value="Slovenia">Slovenia</option>
<option value="Solomon Islands">Solomon Islands</option>
<option value="Somalia">Somalia</option>
<option value="South Africa">South Africa</option>
<option value="Spain">Spain</option>
<option value="Sri Lanka">Sri Lanka</option>
<option value="Sudan">Sudan</option>
<option value="Suriname">Suriname</option>
<option value="Swaziland">Swaziland</option>
<option value="Sweden">Sweden</option>
<option value="Switzerland">Switzerland</option>
<option value="Syria">Syria</option>
<option value="Taiwan">Taiwan</option>
<option value="Tajikistan">Tajikistan</option>
<option value="Tanzania">Tanzania</option>
<option value="Thailand">Thailand</option>
<option value="Togo">Togo</option>
<option value="Tokelau">Tokelau</option>
<option value="Tonga">Tonga</option>
<option value="Trinidad and Tobago">Trinidad and Tobago</option>
<option value="Tunisia">Tunisia</option>
<option value="Turkey">Turkey</option>
<option value="Turkmenistan">Turkmenistan</option>
<option value="Turks and Caicos Islands">Turks and Caicos Islands</option>
<option value="Tuvalu">Tuvalu</option>
<option value="Uganda">Uganda</option>
<option value="Ukraine">Ukraine</option>
<option value="United Arab Emirates">United Arab Emirates</option>
<option value="United Kingdom">United Kingdom</option>
<option value="United States">United States</option>
<option value="Uruguay">Uruguay</option>
<option value="U.S. Virgin Islands">U.S. Virgin Islands</option>
<option value="Uzbekistan">Uzbekistan</option>
<option value="Vanuatu">Vanuatu</option>
<option value="Vatican city">Vatican city</option>
<option value="Venezuela">Venezuela</option>
<option value="Vietnam">Vietnam</option>
<option value="Wake Island">Wake Island</option>
<option value="Wallis &amp; Futuna Islands">Wallis &amp; Futuna Islands</option>
<option value="Western Samoa">Western Samoa</option>
<option value="Yemen">Yemen</option>
<option value="Yugoslavia">Yugoslavia</option>
<option value="Zaire">Zaire</option>
<option value="Zambia">Zambia</option>
<option value="Zanzibar">Zanzibar</option>
<option value="Zimbabwe">Zimbabwe</option>

                                    
                                </select>
                            </div>
                        </div>
                        
                        <div class="col-sm-6 col-xs-12 form-group">
                            <div class="input-group">
                                <div class="input-group-addon"><span class="glyphicon glyphicon-earphone"></span></div>
                                <div class="row">
                                    <div class="col-xs-5 enpcd"><input type="text" class="form-control enrds" placeholder="Code" name="code" value=""></div>
                                    <div class="col-xs-7 enph"><input type="text" class="form-control" placeholder="Phone No." name="Phone" id="personal_phone" value=""></div>
                                </div>
                            </div>
                        </div>
                        
                        <div class="col-lg-12 form-group"><textarea class="form-control" name="add_info" id="add_info" rows="3" placeholder="Where you want to go e.g. North India, South India or special interests like Ayurveda, wildlife, Beach, Culture etc."></textarea></div>
                                                                                                                        
                        <div class="col-sm-6 form-group">
                            <div class="row">
                                <div class="col-sm-6 col-xs-7">
                                    <div class="input-group">
                                        <div class="input-group-addon"><span class="glyphicon glyphicon-qrcode"></span></div>
                                        <input type="text" class="form-control cpbrd" name="captcha" placeholder="Enter Code">
                                    </div>
                                </div>
                            	<div class="col-sm-6 col-xs-5"><img src="https://www.indianholiday.com/captcha.php?1574489090" width="65" height="25" class="imgcap img-responsive" alt="Captcha"></div>
                            </div>
                        </div>
                                                                                                                    
                        <div class="col-sm-6"><input type="submit" name="submit" class="btn btn-warning" value="Submit"></div>
                   
                    </div>
					  </div>
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
	
	<!-- Main JS -->
	<script src="<?=PATH?>js/main.js"></script>
	<script>
	function getmore(a)
	{
		// alert(a);
		if(a=='adult')
		{
			$("#more_adult").show();
		}else{
			$("#more_adult").hide();
		}
		
		
	}function getmore1(a)
	{
		// alert(a);
		
		if(a=='c')
		{
			$("#more_child").show();
		}else{
			$("#more_child").hide();
		}
		
	}
	
	 function getprice(a,b)
	{
		// alert(a);
		// alert(b);
		$.ajax({
        type: 'POST',
        url: '<?=PATH?>getprice.php',
        data: {pid:a,packageid:b},
		beforeSend: function(){
			$("#error").fadeOut();
			// $("#packprice").html('<span class="glyphicon glyphicon-transfer"></span> loading ...');
			},
       success: function(data){
			// alert(data);
		$('#packprice').html(data);
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
  document.getElementById(cityName).style.display = "block";
  evt.currentTarget.className += " active";
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
</script>
	</body>

</html>

