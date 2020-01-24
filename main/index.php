<?php
session_start();
// print_r($_SESSION["ADMData"]);
require_once('controller/dbclass.php');
date_default_timezone_set('Asia/Kolkata');
$dt = new DateTime();
$E_Date = $dt->format('Y-m-d h:i:s');

if(!isset($_SESSION["ADMData"]))
{
	header("location:../index.php");
}

error_log("Error message\n", 3, "error/errorlog.log");
error_reporting(0);
// print_r($_SESSION["ADMData"]);exit();
$SesUserName=$_SESSION["ADMData"]["name"];
$SesFullName=$_SESSION["ADMData"]["email"];
$SesMobile=$_SESSION["ADMData"]["phone"];
$SesImage=$_SESSION["ADMData"]["image"];
// $SesFTPassChangeFlg=$_SESSION["ADMData"]["PassChangeFlg"];
$SesValidUpto=$_SESSION["ADMData"]["valid_upto"];
 $SesUserType=$_SESSION["ADMData"]["type"];//exit;
 $userid=$_SESSION["ADMData"]["userID"];//exit;
$PageRoute=isset($_REQUEST["route"])?$_REQUEST["route"]:"";//hexit;
if(strtoupper($PageRoute)==strtoupper("logout"))
{
	session_destroy();
	header("location:../index.php");
}
if(empty($PageRoute))
{
	if($SesUserType==1)
	{
		 $PageRoute="Dashboard_Admin";
	}
  else if($SesUserType==0)
	{
		$PageLinkVal="../index";
	}
	else
	{
		$PageLinkVal="Dashboard_Staff";
	} 
}
	function GUID()
	{
		if (function_exists('com_create_guid') === true)
		{
			return trim(com_create_guid(), '{}');
		}

    	return sprintf('%04X%04X-%04X-%04X-%04X-%04X%04X%04X', mt_rand(0, 65535), mt_rand(0, 65535), mt_rand(0, 65535), mt_rand(16384, 20479), mt_rand(32768, 49151), mt_rand(0, 65535), mt_rand(0, 65535), mt_rand(0, 65535));
	}
	/* create slug */
	/*  function create_slug($string){
   $slug=preg_replace('/[^A-Za-z0-9-]+/', '-', $string);
   return $slug; 
} */
 function create_slug($string) {
    //Lower case everything
    $string = strtolower($string);
    //Make alphanumeric (removes all other characters)
    $string = preg_replace("/[^a-z0-9_\s-]/", "", $string);
    //Clean up multiple dashes or whitespaces
    $string = preg_replace("/[\s-]+/", " ", $string);
    //Convert whitespaces and underscore to dash
    $string = preg_replace("/[\s_]/", "-", $string);
    
    return $string;
} 

?>


<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

	<?php
  	 require"view/Header.php";
  	 ?>
    
  
  
  	<?php require("view/LeftSlider.php");?>
   
  
  
    <?php
		 if(file_exists("view/".$PageRoute.".php"))
		{
			require("view/".$PageRoute.".php");
		}
		else
		{
			require"view/404.php";
		} 

	?>
	


  <!-- Content Wrapper. Contains page content -->
 
  <!-- /.content-wrapper -->
 <footer class="main-footer">
    <div class="pull-right d-none d-sm-inline-block">
      <b>Powered By</b> Hills Traveler
    </div>
	Copyright &copy; 2019 <a href="#">Hills Traveler</a>. All Rights Reserved.
  </footer>
<div class="control-sidebar-bg"></div>
</div>
<!-- ./wrapper -->

	<!-- jQuery 3 -->
	<script src="assets/vendor_components/jquery/dist/jquery.min.js"></script>
	
	<!-- popper -->
	<script src="assets/vendor_components/popper/dist/popper.min.js"></script>
	
	<!-- Bootstrap 4.0-->
	<script src="assets/vendor_components/bootstrap/dist/js/bootstrap.min.js"></script>
	
	<!-- Select2 -->
	<script src="assets/vendor_components/select2/dist/js/select2.full.js"></script>
	
	<!-- InputMask -->
	<script src="assets/vendor_plugins/input-mask/jquery.inputmask.js"></script>
	<script src="assets/vendor_plugins/input-mask/jquery.inputmask.date.extensions.js"></script>
	<script src="assets/vendor_plugins/input-mask/jquery.inputmask.extensions.js"></script>
	
	<!-- date-range-picker -->
	<script src="assets/vendor_components/moment/min/moment.min.js"></script>
	<script src="assets/vendor_components/bootstrap-daterangepicker/daterangepicker.js"></script>
	
	<!-- bootstrap datepicker -->
	<script src="assets/vendor_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
	
	<!-- bootstrap color picker -->
	<script src="assets/vendor_components/bootstrap-colorpicker/dist/js/bootstrap-colorpicker.min.js"></script>
	
	<!-- bootstrap time picker -->
	<script src="assets/vendor_plugins/timepicker/bootstrap-timepicker.min.js"></script>
	
	<!-- SlimScroll -->
	<script src="assets/vendor_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
	
	<!-- iCheck 1.0.1 -->
	<script src="assets/vendor_plugins/iCheck/icheck.min.js"></script>
	
	<!-- FastClick -->
	<script src="assets/vendor_components/fastclick/lib/fastclick.js"></script>
	
	<!-- minimal_admin App -->
	<script src="js/template.js"></script>
	
	<!-- minimal_admin for demo purposes -->
	<script src="js/demo.js"></script>
	
	<!-- minimal_admin for advanced form element -->
	<script src="js/pages/advanced-form-element.js"></script>
	
	<script src="assets/vendor_components/datatables.net/js/jquery.dataTables.min.js"></script>
	<script src="assets/vendor_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
	<script src="assets/vendor_plugins/DataTables-1.10.15/media/js/jquery.dataTables.min.js"></script>
    <script src="js/pages/data-table.js"></script>
    <script src="assets/vendor_plugins/DataTables-1.10.15/extensions/Buttons/js/dataTables.buttons.min.js"></script>
    <script src="assets/vendor_plugins/DataTables-1.10.15/extensions/Buttons/js/buttons.flash.min.js"></script>
    <script src="assets/vendor_plugins/DataTables-1.10.15/ex-js/jszip.min.js"></script>
    <script src="assets/vendor_plugins/DataTables-1.10.15/ex-js/pdfmake.min.js"></script>
    <script src="assets/vendor_plugins/DataTables-1.10.15/ex-js/vfs_fonts.js"></script>
    <script src="assets/vendor_plugins/DataTables-1.10.15/extensions/Buttons/js/buttons.html5.min.js"></script>
    <script src="assets/vendor_plugins/DataTables-1.10.15/extensions/Buttons/js/buttons.print.min.js"></script>
	