<?php
session_start();
?>

<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="image float-left">
          <img src="images/user2-160x160.jpg" class="rounded-circle" alt="User Image">
        </div>
        <div class="info float-left">
          <p><?=$_SESSION["ADMData"]['name']?></p>
          <?php 
          if (!$_SESSION["ADMData"]) { ?>
           <a href="#"><i class="fa fa-circle text-warning"></i> Offline</a>
         <?php } ?>
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
		 
      </div>
      
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">
        
        <li class="active">
          <a href="index.php">
            <i class="fa fa-dashboard"></i> <span>Dashboard</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
        </li>

        <li class="treeview">
          <a href="#">
            <i class="fa fa-list-alt"></i>
            <span>Category</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="?route=category">Category</a></li>
        </ul>
      </li>

      <li class="treeview">
          <a href="#">
            <i class="fa fa-list-alt"></i>
            <span>Tour Package Details</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="?route=tour-package">Tour Package Details</a></li>
            <li><a href="?route=pricing">Hotel Pricing</a></li>
        </ul>
      </li>

        <li class="treeview">
          <a href="#">
            <i class="fa fa-files-o"></i>
            <span>Catelog</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="?route=onrent">Add Wheeler on Rent</a></li>
            <li><a href="?route=testimonials">Testimonials</a></li>
            <li><a href="?route=gallery">Gallery</a></li>
           </ul>
        </li> 

        <li class="treeview">
          <a href="#">
            <i class="fa fa-tag"></i>
            <span>Tags</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="?route=tag">Tag</a></li>
            <li><a href="?route=departure">Departure City</a></li>
            <li><a href="?route=facility_icons">Facility Icons</a></li>
        </ul>
      </li>

       <li class="treeview">
          <a href="#">
            <i class="fa fa-user"></i>
            <span>Clients</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="?route=contacted">Clients</a></li>
             <li><a href="?route=bookings-list">Bookings list</a></li>
        </ul>
      </li>

       <li class="treeview">
          <a href="#">
            <i class="fa fa-list"></i>
            <span>Reserved Vehicle List</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="?route=reserved_vehicle">Reserved Vehicle</a></li>
        </ul>
      </li>

       <li class="treeview">
          <a href="#">
            <i class="fa fa-cog"></i>
            <span>Setting</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="?route=admin_profile">Profile</a></li>
            <li><a href="?route=country">Country</a></li>
            <li><a href="?route=state">State</a></li>
            <li><a href="?route=city">City</a></li>
        </ul>
      </li>

        
		</ul>
    </section>
    <!-- /.sidebar -->
    <div class="sidebar-footer">
		<!-- item-->
    		<a href="#" class="link" data-toggle="tooltip" title="" data-original-title="Settings"><i class="fa fa-cog fa-spin"></i></a>
    		<!-- item-->
    		<a href="#" class="link" data-toggle="tooltip" title="" data-original-title="Email"><i class="fa fa-envelope"></i></a>
    		<!-- item-->
    		<a href="?route=logout" class="link" data-toggle="tooltip" title="" data-original-title="Logout"><i class="fa fa-power-off"></i></a>
	</div>
  </aside>