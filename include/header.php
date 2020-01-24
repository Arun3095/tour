<?php 
require_once('main/controller/dbclass.php');
include('include/define.php');
$db=new dbclass();
$con=$db->Connection();

/* Get All Activated category */
$qry="Select * FROM category where active='1' and parantID='0' order by ID ASC";
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

/* Get All Activated category_1 */
function submenu($parantID){
	$db=new dbclass();
    $con=$db->Connection();
    $qry="Select * FROM category where active='1' and parantID='".$parantID."' and adventure_package!=1 group by name ASC";
	$res_1=$db->SelectQry($qry,$con);	
	$Rows2 = mysqli_num_rows($res_1);	
	$category_1=array();	
	if($Rows2 >0)	
	{ 	
		$j=0;  	
		while($get_cat_1 =mysqli_fetch_assoc($res_1))   	
		{		       			
			$category_1[$j++]=$get_cat_1;
		}	
	}
	return $category_1;
}
 

// All Pacakges
 $package_query = "SELECT * FROM package where active='1' and childcatID!='0' ";
	$run 		   =  mysqli_query($con,$package_query);
	$count 	   	   = mysqli_num_rows($run);
	$package = array();
	if ($count > 0) 
	{
		$k=0;
		while($fetched_query = mysqli_fetch_assoc($run))
		{
			$package[$k++]=$fetched_query;
		}
	}


	/* Get All Activated Car Vehicle */
$qry_onrent="Select * FROM onrent where type=1 and active='1' order by ID ASC";
	$res_onrent =$db->SelectQry($qry_onrent,$con);	
	$Rows_onrent = mysqli_num_rows($res_onrent);	
	$cars=array();	
	if($Rows_onrent >0)	
	{ 	
		$i=0;  	
		while($get_car =mysqli_fetch_assoc($res_onrent))   	
		{		       			
			$cars[$i++]=$get_car;
		}	
	}


/* Get All Activated Bike Vehicle */
$qry_bike="Select * FROM onrent where type=2 and active='1' order by ID ASC";
	$res_bike =$db->SelectQry($qry_bike,$con);	
	$Rows_onrent = mysqli_num_rows($res_bike);	
	$bikes=array();	
	if($Rows_onrent >0)	
	{ 	
		$i=0;  	
		while($get_bike =mysqli_fetch_assoc($res_bike))   	
		{		       			
			$bikes[$i++]=$get_bike;
		}	
	}

?>


<!--Start of Tawk.to Script-->
<script type="text/javascript">
var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();
(function(){
var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0];
s1.async=true;
s1.src='https://embed.tawk.to/5d4d04aa7d27204601ca1209/default';
s1.charset='UTF-8';
s1.setAttribute('crossorigin','*');
s0.parentNode.insertBefore(s1,s0);
})();
</script>
<link href="https://fonts.googleapis.com/css?family=Lobster&display=swap&subset=latin-ext" rel="stylesheet">
<style>

.top{
    background: #4a4a4a;
    border-bottom: 1px solid #e07932;
    padding: 6px 0px 0px 0;
    position: fixed;
    top: 0px;
    z-index: 99;
    width: 100%;
}
.top ul{
    margin: 0;
    padding: 3px 0;
}
.top ul li a{
    color: #fff;
	font-size: 13px;
    text-decoration: none;
    font-weight: 500;
}
.bor {
    position: relative;
    left: 3px;
}
.pl{
    padding-left: 0;
}
.pr{
    padding-right: 0;
}
.sub1 {
    width: 200px !important;
    position: absolute !important;
    left: 91.5% !important;
}

.navbar-default .navbar-brand {
    color: #e07932;
    font-family: arial;
    font-weight: 900;
    font-size: 25px;
}
.navbar-nav > li > a {
    padding-top: 20px;
    padding-bottom: 20px;
    text-transform: uppercase;
    font-size: 14px;
    border-bottom: none !important;
    font-weight: 500;
    color: #fff!important;
}

</style>
<!--End of Tawk.to Script-->
 <header class="top">
                <div class="container">
                	<div class="row">
                		<div class="col-md-6">
	                    <ul class="list-inline">
	                        
	                        <li>
	                            <i class="icons fa fa-phone"></i>&nbsp
	                            <a href="#" class="link"> +91 3216547895</a>
	                        </li>
	                        <li>
	                            <i class="icons fa fa-envelope"></i>&nbsp
	                            <a href="#" class="link"> hills@hillstraveler.com</a>
	                        </li>
	                    </ul>
	                </div>
	                    <div class="col-md-6">
	                    	<ul class="list-inline pull-right">
		                        <li><a href="#">About us <span class="bor">|</span></a></li>  
		                        <li><a href="#">Blogs <span class="bor">|</span></a></li>
		                        <li><a href="<?=PATH?>gallery.php">Gallery <span class="bor">|</span></a></li>
		                        <li><a href="#">Career <span class="bor">|</span></a></li>   
		                    </ul>
	                    </div>
	                </div>
                   
                </div>
            </header> 
		<header id="tb-header-section" class="sticky-banner">
			<nav class="navbar navbar-default">
			  <div class="container">
			  <div class="min1"> 
			    <div class="navbar-header">
			      <div type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
			        <span class="sr-only">Toggle navigation</span>
			        <span class="icon-bar"></span>
			        <span class="icon-bar"></span>
			        <span class="icon-bar"></span>
			      </div>
			      <a class="navbar-brand" href="<?=PATH?>">HILLS TRAVELER</a>
			    </div> 
			    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">

			      <ul class="nav navbar-nav navbar-right">
			      	<?php for($k=0;$k<count($category);$k++) { ?>
				      <li class="min">
				      	 <a class="js-scroll-trigger" href="#"><?=ucwords($category[$k]['name'])?><i class="fa fa-angle-down angle"></i></a>
                          <?php 

                              $submenuarr =  submenu($category[$k]['ID']);
                             if(!empty($submenuarr))
                             {
                                 
                               $subm=0;
                              $didcnt =intval(count($submenuarr)/4);

                          ?>
				      	 <ul class="submenu">
			        		<li class="col-sm-12">  
		        			   <p class="tex"><?=ucwords($category[$k]['name'])?>&nbsp; Package </p>
		        				<ul class="mega1">
		        					<?php

		        					 for($m=1;$m<count($submenuarr) ;$m++) { ?>
		        					
			        				<li><i class="fa fa-angle-right ang"></i> <a href="hills-traveler-packages.php/?id=<?=base64_encode($submenuarr[$m]['ID'])?>"> <?=ucwords($submenuarr[$m]['name'])?></a></li> 
			        			<?php 

			        			    if(($m)%$didcnt ==0 && $m > 0 )
			        			   	{ 
			        			   		echo '</ul>

			        			   		<ul class="mega1">'; ucwords($subm++);
			        			   		
			        			   		if($subm==4){ break; }
			        			    } 


			        			    } ?>
			        				
			        			</ul>
			        			  
				        	</li>
			        		
			        	</ul>
                         <?php } ?>


				      </li>
                    <?php } ?>  
					<li class="min"><a class="js-scroll-trigger" href="customize-package.php">CUSTOMIZE YOUR TOUR</a></li>
					
					<li class="min"><a class="js-scroll-trigger" href="#">More <i class="fa fa-angle-down angle"></i></a>
						<ul class="submenu sub1">
			        				<li class="col-sm-12">
				        				<ul class="mega">
					        				<li><i class="fa fa-angle-right ang"></i> <a href="<?=PATH?>car-booking.php">Car on Rent </a></li>
			        						<li><i class="fa fa-angle-right ang"></i> <a href="<?=PATH?>bike-on-rent.php">Bike on Rent </a></li>
											<li><i class="fa fa-angle-right ang"></i> <a href="#">Visa Assistance </a></li>
											<li><i class="fa fa-angle-right ang"></i> <a href="#">Foreign Exchange</a></li>
											<li><i class="fa fa-angle-right ang"></i> <a href="#">Travel Insurance</a></li>
					        		</ul>   
						        </li>
			        		</ul>  
						</li>
                   
                   </ul> 
			           
			    </div>
			    </div> 
			  </div> 
			</nav>
		</header>