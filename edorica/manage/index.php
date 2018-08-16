<?php
	$page = 'admin';
	include_once "../setup.php";
	include_once "setup.php";
	$level = 2;

	include_once "../scripts/school.php";
	session_start();

	$user_data = check_login();
	$ppic = $edorica->getFile('images/'.$user_data['profile'], 2);

	$School = WEB::getInstance('school');

	//Getting school data
	$scdata = $School->getSchool($user_data['school']);
	$scname = $scdata['name'];
	$scid = $scdata['id'];
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Edorica</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="bower_components/Ionicons/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/AdminLTE.min.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="dist/css/skins/_all-skins.min.css">

  <!-- Custom CSS -->
  <link rel="stylesheet" href="dist/css/style.css">

  <!-- Morris chart -->
  <link rel="stylesheet" href="bower_components/morris.js/morris.css">
  <!-- jvectormap -->
  <link rel="stylesheet" href="bower_components/jvectormap/jquery-jvectormap.css">
  <!-- Date Picker -->
  <link rel="stylesheet" href="bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="bower_components/bootstrap-daterangepicker/daterangepicker.css">
  <!-- bootstrap wysihtml5 - text editor -->
  <link rel="stylesheet" href="plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">

  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

	<header class="main-header">
	    <!-- Logo -->
	    <a href="<?php echo 'index.php' ?>" class="logo">
	      <!-- mini logo for sidebar mini 50x50 pixels -->
	      <span class="logo-mini">Ed</span>
	      <!-- logo for regular state and mobile devices -->
	      <span class="logo-lg"><b></b>Edorica</span>
	    </a>
	    <!-- Header Navbar: style can be found in header.less -->
	    <nav class="navbar navbar-static-top">
	      <!-- Sidebar toggle button-->
	      <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
	        <span class="sr-only">Toggle navigation</span>
	      </a>

	      <div class="navbar-custom-menu">
	        <ul class="nav navbar-nav">
	          <!-- Messages: style can be found in dropdown.less-->
	          <li class="dropdown messages-menu">
	            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
	              <i class="fa fa-envelope-o"></i>
	              <span class="label label-success">4</span>
	            </a>
	            <ul class="dropdown-menu">
	              <li class="header">You have 4 messages</li>
	              <li>
	                <!-- inner menu: contains the actual data -->
	                <ul class="menu">
	                  <li><!-- start message -->
	                    <a href="#">
	                      <div class="pull-left">
	                        <img src="<?php echo $ppic; ?>" class="img-circle" alt="User Image">
	                      </div>
	                      <h4>
	                        Support Team
	                        <small><i class="fa fa-clock-o"></i> 5 mins</small>
	                      </h4>
	                      <p>Why not buy a new awesome theme?</p>
	                    </a>
	                  </li>
	                  <!-- end message -->
	                  <li>
	                    <a href="#">
	                      <div class="pull-left">
	                        <img src="dist/img/user3-128x128.jpg" class="img-circle" alt="User Image">
	                      </div>
	                      <h4>
	                        AdminLTE Design Team
	                        <small><i class="fa fa-clock-o"></i> 2 hours</small>
	                      </h4>
	                      <p>Why not buy a new awesome theme?</p>
	                    </a>
	                  </li>
	                  <li>
	                    <a href="#">
	                      <div class="pull-left">
	                        <img src="dist/img/user4-128x128.jpg" class="img-circle" alt="User Image">
	                      </div>
	                      <h4>
	                        Developers
	                        <small><i class="fa fa-clock-o"></i> Today</small>
	                      </h4>
	                      <p>Why not buy a new awesome theme?</p>
	                    </a>
	                  </li>
	                  <li>
	                    <a href="#">
	                      <div class="pull-left">
	                        <img src="dist/img/user3-128x128.jpg" class="img-circle" alt="User Image">
	                      </div>
	                      <h4>
	                        Sales Department
	                        <small><i class="fa fa-clock-o"></i> Yesterday</small>
	                      </h4>
	                      <p>Why not buy a new awesome theme?</p>
	                    </a>
	                  </li>
	                  <li>
	                    <a href="#">
	                      <div class="pull-left">
	                        <img src="dist/img/user4-128x128.jpg" class="img-circle" alt="User Image">
	                      </div>
	                      <h4>
	                        Reviewers
	                        <small><i class="fa fa-clock-o"></i> 2 days</small>
	                      </h4>
	                      <p>Why not buy a new awesome theme?</p>
	                    </a>
	                  </li>
	                </ul>
	              </li>
	              <li class="footer"><a href="#">See All Messages</a></li>
	            </ul>
	          </li>
	          <!-- Notifications: style can be found in dropdown.less -->
	          <li class="dropdown notifications-menu">
	            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
	              <i class="fa fa-bell-o"></i>
	              <span class="label label-warning">10</span>
	            </a>
	            <ul class="dropdown-menu">
	              <li class="header">You have 10 notifications</li>
	              <li>
	                <!-- inner menu: contains the actual data -->
	                <ul class="menu">
	                  <li>
	                    <a href="#">
	                      <i class="fa fa-users text-aqua"></i> 5 new members joined today
	                    </a>
	                  </li>
	                  <li>
	                    <a href="#">
	                      <i class="fa fa-warning text-yellow"></i> Very long description here that may not fit into the
	                      page and may cause design problems
	                    </a>
	                  </li>
	                  <li>
	                    <a href="#">
	                      <i class="fa fa-users text-red"></i> 5 new members joined
	                    </a>
	                  </li>
	                  <li>
	                    <a href="#">
	                      <i class="fa fa-shopping-cart text-green"></i> 25 sales made
	                    </a>
	                  </li>
	                  <li>
	                    <a href="#">
	                      <i class="fa fa-user text-red"></i> You changed your username
	                    </a>
	                  </li>
	                </ul>
	              </li>
	              <li class="footer"><a href="#">View all</a></li>
	            </ul>
	          </li>
	          <!-- Tasks: style can be found in dropdown.less -->
	          <li class="dropdown tasks-menu">
	            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
	              <i class="fa fa-flag-o"></i>
	              <span class="label label-danger">9</span>
	            </a>
	            <ul class="dropdown-menu">
	              <li class="header">You have 9 tasks</li>
	              <li>
	                <!-- inner menu: contains the actual data -->
	                <ul class="menu">
	                  <li><!-- Task item -->
	                    <a href="#">
	                      <h3>
	                        Design some buttons
	                        <small class="pull-right">20%</small>
	                      </h3>
	                      <div class="progress xs">
	                        <div class="progress-bar progress-bar-aqua" style="width: 20%" role="progressbar"
	                             aria-valuenow="20" aria-valuemin="0" aria-valuemax="100">
	                          <span class="sr-only">20% Complete</span>
	                        </div>
	                      </div>
	                    </a>
	                  </li>
	                  <!-- end task item -->
	                  <li><!-- Task item -->
	                    <a href="#">
	                      <h3>
	                        Create a nice theme
	                        <small class="pull-right">40%</small>
	                      </h3>
	                      <div class="progress xs">
	                        <div class="progress-bar progress-bar-green" style="width: 40%" role="progressbar"
	                             aria-valuenow="20" aria-valuemin="0" aria-valuemax="100">
	                          <span class="sr-only">40% Complete</span>
	                        </div>
	                      </div>
	                    </a>
	                  </li>
	                  <!-- end task item -->
	                  <li><!-- Task item -->
	                    <a href="#">
	                      <h3>
	                        Some task I need to do
	                        <small class="pull-right">60%</small>
	                      </h3>
	                      <div class="progress xs">
	                        <div class="progress-bar progress-bar-red" style="width: 60%" role="progressbar"
	                             aria-valuenow="20" aria-valuemin="0" aria-valuemax="100">
	                          <span class="sr-only">60% Complete</span>
	                        </div>
	                      </div>
	                    </a>
	                  </li>
	                  <!-- end task item -->
	                  <li><!-- Task item -->
	                    <a href="#">
	                      <h3>
	                        Make beautiful transitions
	                        <small class="pull-right">80%</small>
	                      </h3>
	                      <div class="progress xs">
	                        <div class="progress-bar progress-bar-yellow" style="width: 80%" role="progressbar"
	                             aria-valuenow="20" aria-valuemin="0" aria-valuemax="100">
	                          <span class="sr-only">80% Complete</span>
	                        </div>
	                      </div>
	                    </a>
	                  </li>
	                  <!-- end task item -->
	                </ul>
	              </li>
	              <li class="footer">
	                <a href="#">View all tasks</a>
	              </li>
	            </ul>
	          </li>
	          <!-- User Account: style can be found in dropdown.less -->
	          <li class="dropdown user user-menu">
	            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
	              <img src="<?php echo $edorica->getFile('images/'.$user_data['profile'], 2); ?>" class="user-image" alt="User Image">
	              <span class="hidden-xs"><?php echo $user_data['fname']." $user_data[lname]"; ?></span>
	            </a>
	            <ul class="dropdown-menu">
	              <!-- User image -->
	              <li class="user-header">
	                <img src="<?php echo $ppic; ?>" class="img-circle" alt="User Image">

	                <p>
	                	<?php echo $user_data['fname']." $user_data[lname] - $user_data[duty]"; ?>
	                  <small class="school"><?php echo $scname; ?></small>
	                </p>
	              </li>
	              <!-- Menu Body -->
	              <li class="user-body">
	                <div class="row">
	                  <div class="col-xs-4 text-center">
	                    <a href="#">Followers</a>
	                  </div>
	                  <div class="col-xs-4 text-center">
	                    <a href="#">Sales</a>
	                  </div>
	                  <div class="col-xs-4 text-center">
	                    <a href="#">Friends</a>
	                  </div>
	                </div>
	                <!-- /.row -->
	              </li>
	              <!-- Menu Footer-->
	              <li class="user-footer">
	                <div class="pull-left">
	                  <a href="#" class="btn btn-default btn-flat">Profile</a>
	                </div>
	                <div class="pull-right">
	                  <a href="logout.php" class="btn btn-default btn-flat">Sign out</a>
	                </div>
	              </li>
	            </ul>
	          </li>
	          <!-- Control Sidebar Toggle Button -->
	          <li>
	            <a href="#" data-toggle="control-sidebar"><i class="fa fa-gears"></i></a>
	          </li>
	        </ul>
	      </div>
	    </nav>
	</header>
 	<!-- Left side column. contains the logo and sidebar -->
	<aside class="main-sidebar">
	    <!-- sidebar: style can be found in sidebar.less -->
	    <section class="sidebar">
	      <!-- Sidebar user panel -->
	      <div class="user-panel">
	        <div class="pull-left image">
	          <img src="<?php echo $ppic; ?>" class="img-circle" alt="User Image">
	        </div>
	        <div class="pull-left info">
	          <p><?php echo $user_data['fname']." $user_data[lname]"; ?></p>
	          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
	        </div>
	      </div>
	      <!-- search form -->
	      <form action="#" method="get" class="sidebar-form">
	        <div class="input-group">
	          <input type="text" name="q" class="form-control" placeholder="Search...">
	          <span class="input-group-btn">
	                <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
	                </button>
	              </span>
	        </div>
	      </form>
	      <!-- /.search form -->
	      <!-- sidebar menu: : style can be found in sidebar.less -->
	    <ul class="sidebar-menu" data-widget="tree">
	        <li class="header">MAIN NAVIGATION</li>
	        <li><a href="edit.php"><i class="fa fa-book"></i> <span>Edit Information</span></a></li>

	        <!-- <li class="active treeview">
	          <a href="#">
	            <i class="fa fa-dashboard"></i> <span>Dashboard</span>
	            <span class="pull-right-container">
	              <i class="fa fa-angle-left pull-right"></i>
	            </span>
	          </a>
	        </li>
	        <li class="treeview">
	          <a href="#">
	            <i class="fa fa-folder"></i> <span>Examples</span>
	            <span class="pull-right-container">
	              <i class="fa fa-angle-left pull-right"></i>
	            </span>
	          </a>
	          <ul class="treeview-menu">
	            <li><a href="#"><i class="fa fa-circle-o"></i> Invoice</a></li>
	            <li><a href="#"><i class="fa fa-circle-o"></i> Profile</a></li>
	            <li><a href="#"><i class="fa fa-circle-o"></i> Login</a></li>
	            <li><a href="#"><i class="fa fa-circle-o"></i> Register</a></li>
	            <li><a href="#"><i class="fa fa-circle-o"></i> Lockscreen</a></li>
	            <li><a href="#"><i class="fa fa-circle-o"></i> 404 Error</a></li>
	            <li><a href="#"><i class="fa fa-circle-o"></i> 500 Error</a></li>
	            <li><a href="#"><i class="fa fa-circle-o"></i> Blank Page</a></li>
	            <li><a href="#"><i class="fa fa-circle-o"></i> Pace Page</a></li>
	          </ul>
	        </li>
	        <li class="treeview">
	          <a href="#">
	            <i class="fa fa-share"></i> <span>Multilevel</span>
	            <span class="pull-right-container">
	              <i class="fa fa-angle-left pull-right"></i>
	            </span>
	          </a>
	          <ul class="treeview-menu">
	            <li><a href="#"><i class="fa fa-circle-o"></i> Level One</a></li>
	            <li class="treeview">
	              <a href="#"><i class="fa fa-circle-o"></i> Level One
	                <span class="pull-right-container">
	                  <i class="fa fa-angle-left pull-right"></i>
	                </span>
	              </a>
	              <ul class="treeview-menu">
	                <li><a href="#"><i class="fa fa-circle-o"></i> Level Two</a></li>
	                <li class="treeview">
	                  <a href="#"><i class="fa fa-circle-o"></i> Level Two
	                    <span class="pull-right-container">
	                      <i class="fa fa-angle-left pull-right"></i>
	                    </span>
	                  </a>
	                  <ul class="treeview-menu">
	                    <li><a href="#"><i class="fa fa-circle-o"></i> Level Three</a></li>
	                    <li><a href="#"><i class="fa fa-circle-o"></i> Level Three</a></li>
	                  </ul>
	                </li>
	              </ul>
	            </li>
	            <li><a href="#"><i class="fa fa-circle-o"></i> Level One</a></li>
	          </ul>
	        </li> -->
	        
	        <li class="header">LABELS</li>
	        <li><a href="#"><i class="fa fa-circle-o text-red"></i> <span>Important</span></a></li>
	        <li><a href="#"><i class="fa fa-circle-o text-yellow"></i> <span>Warning</span></a></li>
	        <li><a href="#"><i class="fa fa-circle-o text-aqua"></i> <span>Information</span></a></li>
	      </ul>
	    </section>
	    <!-- /.sidebar -->
	</aside>

  	<!-- Content Wrapper. Contains page content -->
	<div class="content-wrapper">
	    <!-- Content Header (Page header) -->
	    <section class="content-header">
	      <h1>
	        Dashboard
	        <small>Control panel</small>
	      </h1>
	      <ol class="breadcrumb">
	        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
	        <li class="active">Dashboard</li>
	      </ol>
	    </section>	    

	    <!-- Main content -->
	    <section class="content">
	      	<!-- Small boxes (Stat box) -->
		    <div class="row">
		        <div class="col-lg-3 col-xs-6">
		          <!-- small box -->
		          <div class="small-box bg-aqua">
		            <div class="inner">
		              <h3>150</h3>

		              <p>New Orders</p>
		            </div>
		            <div class="icon">
		              <i class="ion ion-bag"></i>
		            </div>
		            <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
		          </div>
		        </div>
		        <!-- ./col -->
		        <div class="col-lg-3 col-xs-6">
		          <!-- small box -->
		          <div class="small-box bg-green">
		            <div class="inner">
		              <h3>53<sup style="font-size: 20px">%</sup></h3>

		              <p>Bounce Rate</p>
		            </div>
		            <div class="icon">
		              <i class="ion ion-stats-bars"></i>
		            </div>
		            <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
		          </div>
		        </div>
		        <!-- ./col -->
		        <div class="col-lg-3 col-xs-6">
		          <!-- small box -->
		          <div class="small-box bg-yellow">
		            <div class="inner">
		              <h3>44</h3>

		              <p>User Registrations</p>
		            </div>
		            <div class="icon">
		              <i class="ion ion-person-add"></i>
		            </div>
		            <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
		          </div>
		        </div>
		        <!-- ./col -->
		        <div class="col-lg-3 col-xs-6">
		          <!-- small box -->
		          <div class="small-box bg-red">
		            <div class="inner">
		              <h3>65</h3>

		              <p>Unique Visitors</p>
		            </div>
		            <div class="icon">
		              <i class="ion ion-pie-graph"></i>
		            </div>
		            <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
		          </div>
		        </div>
		        <!-- ./col -->
		    </div>
		      <!-- /.row -->
		      <!-- Main row -->
			<div class="row">
				<section class="col-lg-6 connectedSortable">
		          	<!-- Chat box -->
			        <div class="box box-success">
			            <div class="box-header">
			            	<h3 class="wlcm-text box-title">Welcome, <?php echo $user_data['fname']; ?></h3>
			            </div>
			            <div class="box-body">
			            	<p><a target="_blank" href="<?php echo $School->link($scdata['id']); ?>"><?php echo $scname; ?></a></p>
			            </div>
			        </div>
		        </section>
			</div>
		    <div class="row">
		        <!-- Left col -->
		        <section class="col-lg-7 connectedSortable">
		        	<div class="box box-info">
			            <div class="box-header with-border">
			            	<h3 class="wlcm-text box-title"><?php echo $scname; ?> Information</h3>
			            </div>
			            <div class="box-body">
			            	<div>
			            		<p>Name: <?php echo $scname; ?></p>
			            		<p>Location: <?php echo $School->location($scdata['location']); ?></p>
			            		<p>Gender: <?php echo $School->sex($scdata['sex']); ?></p>
			            		<p>Type: <?php echo $School->printcategory($scid); ?></p>
			            		<p>Ownership status: <?php echo ucwords($scdata['owner']); ?></p>
			            		<p>Facilities: <?php echo $School->facilities($scid); ?></p>
			            		<?php
			            			$cats = $School->getcategory(375);
			            			if(array_keys($cats, "Secondary school", false) || array_keys($cats, "Primary school", false)){
			            				?>
			            					<p>National exam code: <?php echo $scdata['code']; ?></p>
			            				<?php
			            			}
			            		?>			            		
			            	</div>
			            	<a type="button" href="edit.php" class="btn btn-block btn-primary pull-right"><i class="fa fa-edit"></i>Edit</a>
			            </div>
			        </div>			        

		        </section>
		        <?php die(); ?>
		        <!-- /.Left col -->
		        <!-- right col (We are only adding the ID to make the widgets sortable)-->
		        <section class="col-lg-5 connectedSortable">
		          <!-- solid sales graph -->
		          <div class="box box-solid bg-teal-gradient">
		            <div class="box-header">
		              <i class="fa fa-th"></i>

		              <h3 class="box-title">Sales Graph</h3>

		              <div class="box-tools pull-right">
		                <button type="button" class="btn bg-teal btn-sm" data-widget="collapse"><i class="fa fa-minus"></i>
		                </button>
		                <button type="button" class="btn bg-teal btn-sm" data-widget="remove"><i class="fa fa-times"></i>
		                </button>
		              </div>
		            </div>
		            <div class="box-body border-radius-none">
		              <div class="chart" id="line-chart" style="height: 250px;"></div>
		            </div>
		            <!-- /.box-body -->
		            <div class="box-footer no-border">
		              <div class="row">
		                <div class="col-xs-4 text-center" style="border-right: 1px solid #f4f4f4">
		                  <input type="text" class="knob" data-readonly="true" value="20" data-width="60" data-height="60"
		                         data-fgColor="#39CCCC">

		                  <div class="knob-label">Mail-Orders</div>
		                </div>
		                <!-- ./col -->
		                <div class="col-xs-4 text-center" style="border-right: 1px solid #f4f4f4">
		                  <input type="text" class="knob" data-readonly="true" value="50" data-width="60" data-height="60"
		                         data-fgColor="#39CCCC">

		                  <div class="knob-label">Online</div>
		                </div>
		                <!-- ./col -->
		                <div class="col-xs-4 text-center">
		                  <input type="text" class="knob" data-readonly="true" value="30" data-width="60" data-height="60"
		                         data-fgColor="#39CCCC">

		                  <div class="knob-label">In-Store</div>
		                </div>
		                <!-- ./col -->
		              </div>
		              <!-- /.row -->
		            </div>
		            <!-- /.box-footer -->
		          </div>
		          <!-- /.box -->

		          <!-- Calendar -->
		          <div class="box box-solid bg-green-gradient">
		            <div class="box-header">
		              <i class="fa fa-calendar"></i>

		              <h3 class="box-title">Calendar</h3>
		              <!-- tools box -->
		              <div class="pull-right box-tools">
		                <!-- button with a dropdown -->
		                <div class="btn-group">
		                  <button type="button" class="btn btn-success btn-sm dropdown-toggle" data-toggle="dropdown">
		                    <i class="fa fa-bars"></i></button>
		                  <ul class="dropdown-menu pull-right" role="menu">
		                    <li><a href="#">Add new event</a></li>
		                    <li><a href="#">Clear events</a></li>
		                    <li class="divider"></li>
		                    <li><a href="#">View calendar</a></li>
		                  </ul>
		                </div>
		                <button type="button" class="btn btn-success btn-sm" data-widget="collapse"><i class="fa fa-minus"></i>
		                </button>
		                <button type="button" class="btn btn-success btn-sm" data-widget="remove"><i class="fa fa-times"></i>
		                </button>
		              </div>
		              <!-- /. tools -->
		            </div>
		            <!-- /.box-header -->
		            <div class="box-body no-padding">
		              <!--The calendar -->
		              <div id="calendar" style="width: 100%"></div>
		            </div>
		            <!-- /.box-body -->
		            <div class="box-footer text-black">
		              <div class="row">
		                <div class="col-sm-6">
		                  <!-- Progress bars -->
		                  <div class="clearfix">
		                    <span class="pull-left">Task #1</span>
		                    <small class="pull-right">90%</small>
		                  </div>
		                  <div class="progress xs">
		                    <div class="progress-bar progress-bar-green" style="width: 90%;"></div>
		                  </div>

		                  <div class="clearfix">
		                    <span class="pull-left">Task #2</span>
		                    <small class="pull-right">70%</small>
		                  </div>
		                  <div class="progress xs">
		                    <div class="progress-bar progress-bar-green" style="width: 70%;"></div>
		                  </div>
		                </div>
		                <!-- /.col -->
		                <div class="col-sm-6">
		                  <div class="clearfix">
		                    <span class="pull-left">Task #3</span>
		                    <small class="pull-right">60%</small>
		                  </div>
		                  <div class="progress xs">
		                    <div class="progress-bar progress-bar-green" style="width: 60%;"></div>
		                  </div>

		                  <div class="clearfix">
		                    <span class="pull-left">Task #4</span>
		                    <small class="pull-right">40%</small>
		                  </div>
		                  <div class="progress xs">
		                    <div class="progress-bar progress-bar-green" style="width: 40%;"></div>
		                  </div>
		                </div>
		                <!-- /.col -->
		              </div>
		              <!-- /.row -->
		            </div>
		          </div>
		          <!-- /.box -->

		        </section>
		        <!-- right col -->
		    </div>
	      <!-- /.row (main row) -->
	    </section>
	    <!-- /.content -->
	</div>
  	<!-- /.content-wrapper -->
	<footer class="main-footer">
	    <div class="pull-right hidden-xs">
	      <b>Version</b> 2.4.0
	    </div>
	    <strong>Copyright &copy; 2014-2016 <a href="https://adminlte.io">Almsaeed Studio</a>.</strong> All rights
	    reserved.
	</footer>

  	<!-- Control Sidebar -->
	<aside class="control-sidebar control-sidebar-dark">
	    <!-- Create the tabs -->
	    <ul class="nav nav-tabs nav-justified control-sidebar-tabs">
	      <li><a href="#control-sidebar-home-tab" data-toggle="tab"><i class="fa fa-home"></i></a></li>
	      <li><a href="#control-sidebar-settings-tab" data-toggle="tab"><i class="fa fa-gears"></i></a></li>
	    </ul>
	    <!-- Tab panes -->
	    <div class="tab-content">
	      <!-- Home tab content -->
	      <div class="tab-pane" id="control-sidebar-home-tab">
	        <h3 class="control-sidebar-heading">Recent Activity</h3>
	        <ul class="control-sidebar-menu">
	          <li>
	            <a href="javascript:void(0)">
	              <i class="menu-icon fa fa-birthday-cake bg-red"></i>

	              <div class="menu-info">
	                <h4 class="control-sidebar-subheading">Langdon's Birthday</h4>

	                <p>Will be 23 on April 24th</p>
	              </div>
	            </a>
	          </li>
	          <li>
	            <a href="javascript:void(0)">
	              <i class="menu-icon fa fa-user bg-yellow"></i>

	              <div class="menu-info">
	                <h4 class="control-sidebar-subheading">Frodo Updated His Profile</h4>

	                <p>New phone +1(800)555-1234</p>
	              </div>
	            </a>
	          </li>
	          <li>
	            <a href="javascript:void(0)">
	              <i class="menu-icon fa fa-envelope-o bg-light-blue"></i>

	              <div class="menu-info">
	                <h4 class="control-sidebar-subheading">Nora Joined Mailing List</h4>

	                <p>nora@example.com</p>
	              </div>
	            </a>
	          </li>
	          <li>
	            <a href="javascript:void(0)">
	              <i class="menu-icon fa fa-file-code-o bg-green"></i>

	              <div class="menu-info">
	                <h4 class="control-sidebar-subheading">Cron Job 254 Executed</h4>

	                <p>Execution time 5 seconds</p>
	              </div>
	            </a>
	          </li>
	        </ul>
	        <!-- /.control-sidebar-menu -->

	        <h3 class="control-sidebar-heading">Tasks Progress</h3>
	        <ul class="control-sidebar-menu">
	          <li>
	            <a href="javascript:void(0)">
	              <h4 class="control-sidebar-subheading">
	                Custom Template Design
	                <span class="label label-danger pull-right">70%</span>
	              </h4>

	              <div class="progress progress-xxs">
	                <div class="progress-bar progress-bar-danger" style="width: 70%"></div>
	              </div>
	            </a>
	          </li>
	          <li>
	            <a href="javascript:void(0)">
	              <h4 class="control-sidebar-subheading">
	                Update Resume
	                <span class="label label-success pull-right">95%</span>
	              </h4>

	              <div class="progress progress-xxs">
	                <div class="progress-bar progress-bar-success" style="width: 95%"></div>
	              </div>
	            </a>
	          </li>
	          <li>
	            <a href="javascript:void(0)">
	              <h4 class="control-sidebar-subheading">
	                Laravel Integration
	                <span class="label label-warning pull-right">50%</span>
	              </h4>

	              <div class="progress progress-xxs">
	                <div class="progress-bar progress-bar-warning" style="width: 50%"></div>
	              </div>
	            </a>
	          </li>
	          <li>
	            <a href="javascript:void(0)">
	              <h4 class="control-sidebar-subheading">
	                Back End Framework
	                <span class="label label-primary pull-right">68%</span>
	              </h4>

	              <div class="progress progress-xxs">
	                <div class="progress-bar progress-bar-primary" style="width: 68%"></div>
	              </div>
	            </a>
	          </li>
	        </ul>
	        <!-- /.control-sidebar-menu -->

	      </div>
	      <!-- /.tab-pane -->
	      <!-- Stats tab content -->
	      <div class="tab-pane" id="control-sidebar-stats-tab">Stats Tab Content</div>
	      <!-- /.tab-pane -->
	      <!-- Settings tab content -->
	      <div class="tab-pane" id="control-sidebar-settings-tab">
	        <form method="post">
	          <h3 class="control-sidebar-heading">General Settings</h3>

	          <div class="form-group">
	            <label class="control-sidebar-subheading">
	              Report panel usage
	              <input type="checkbox" class="pull-right" checked>
	            </label>

	            <p>
	              Some information about this general settings option
	            </p>
	          </div>
	          <!-- /.form-group -->

	          <div class="form-group">
	            <label class="control-sidebar-subheading">
	              Allow mail redirect
	              <input type="checkbox" class="pull-right" checked>
	            </label>

	            <p>
	              Other sets of options are available
	            </p>
	          </div>
	          <!-- /.form-group -->

	          <div class="form-group">
	            <label class="control-sidebar-subheading">
	              Expose author name in posts
	              <input type="checkbox" class="pull-right" checked>
	            </label>

	            <p>
	              Allow the user to show his name in blog posts
	            </p>
	          </div>
	          <!-- /.form-group -->

	          <h3 class="control-sidebar-heading">Chat Settings</h3>

	          <div class="form-group">
	            <label class="control-sidebar-subheading">
	              Show me as online
	              <input type="checkbox" class="pull-right" checked>
	            </label>
	          </div>
	          <!-- /.form-group -->

	          <div class="form-group">
	            <label class="control-sidebar-subheading">
	              Turn off notifications
	              <input type="checkbox" class="pull-right">
	            </label>
	          </div>
	          <!-- /.form-group -->

	          <div class="form-group">
	            <label class="control-sidebar-subheading">
	              Delete chat history
	              <a href="javascript:void(0)" class="text-red pull-right"><i class="fa fa-trash-o"></i></a>
	            </label>
	          </div>
	          <!-- /.form-group -->
	        </form>
	      </div>
	      <!-- /.tab-pane -->
	    </div>
	</aside>
	  <!-- /.control-sidebar -->
	  <!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->
	<div class="control-sidebar-bg"></div>
</div>
<!-- ./wrapper -->

<!-- jQuery 3 -->
<script src="bower_components/jquery/dist/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="bower_components/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button);
</script>
<!-- Bootstrap 3.3.7 -->
<script src="bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- Morris.js charts -->
<script src="bower_components/raphael/raphael.min.js"></script>
<script src="bower_components/morris.js/morris.min.js"></script>
<!-- Sparkline -->
<script src="bower_components/jquery-sparkline/dist/jquery.sparkline.min.js"></script>
<!-- jvectormap -->
<script src="plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
<script src="plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
<!-- jQuery Knob Chart -->
<script src="bower_components/jquery-knob/dist/jquery.knob.min.js"></script>
<!-- daterangepicker -->
<script src="bower_components/moment/min/moment.min.js"></script>
<script src="bower_components/bootstrap-daterangepicker/daterangepicker.js"></script>
<!-- datepicker -->
<script src="bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
<!-- Bootstrap WYSIHTML5 -->
<script src="plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
<!-- Slimscroll -->
<script src="bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="bower_components/fastclick/lib/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.min.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="dist/js/pages/dashboard.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="dist/js/demo.js"></script>
</body>
</html>