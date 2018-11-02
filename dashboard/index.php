<?php 

	include_once('../inc/std_queries.php'); 
	session_start(); ob_start();

  $user_type = $_SESSION['user_type'];

	if(isset($_SESSION['isLoggedIn']) && $_SESSION['isLoggedIn'] ==='yes'):
?>

<!DOCTYPE html>

<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Dashboard</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="../bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="../bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="../bower_components/Ionicons/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../dist/css/AdminLTE.min.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="../dist/css/skins/_all-skins.min.css">
  <!-- Morris chart -->
  <link rel="stylesheet" href="../bower_components/morris.js/morris.css">
  <!-- jvectormap -->
  <link rel="stylesheet" href="../bower_components/jvectormap/jquery-jvectormap.css">
  <!-- Date Picker -->
  <link rel="stylesheet" href="../bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="../bower_components/bootstrap-daterangepicker/daterangepicker.css">
  <!-- bootstrap wysihtml5 - text editor -->
  <link rel="stylesheet" href="../plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="../https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="../https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <!-- Google Font -->
  <link rel="stylesheet" href="../https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

  <header class="main-header">
    <!-- Logo -->
    <a href="index.php" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b>A</b>LT</span>
      <!-- logo for regular state and mobile devices -->
      <?php if($_SESSION['user_type'] === 'admin'):?>
        <span class="logo-lg"><b>Admin</b></span>
      <?php elseif($_SESSION['user_type'] === 'teacher'):?>
        <span class="logo-lg"><b>Teacher</b></span>
      <?php elseif($_SESSION['user_type'] === 'student'):?>
        <span class="logo-lg"><b>Student</b></span>
      <?php elseif($_SESSION['user_type'] === 'parent'):?>
        <span class="logo-lg"><b>Parent</b></span>
      <?php endif;?>
    </a>

    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->
      <a href="../#" class="sidebar-toggle" data-toggle="push-menu" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>

      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          <!-- User Account: style can be found in dropdown.less -->
          <li class="dropdown user user-menu">
            <a href="../#" class="dropdown-toggle" data-toggle="dropdown">
              <img src="../dist/img/<?php echo $user_type;?>.jpg" class="user-image" alt="User Image">
              <span class="hidden-xs"><?php echo $_SESSION['fname']." ".$_SESSION['lname'];?></span>
            </a>
            <ul class="dropdown-menu">
              <!-- User image -->
              <li class="user-header">
                <img src="../dist/img/<?php echo $user_type;?>.jpg" class="img-circle" alt="User Image">

                <p>
                  <?php echo $_SESSION['fname']." ".$_SESSION['lname'];?> - Admin
                  <small>Member since Nov. 2012</small>
                </p>
              </li>
              <!-- Menu Body -->
              <li class="user-body">
                <div class="row">
                  <div class="col-xs-4 text-center">
                    <a href="../#">Followers</a>
                  </div>
                  <div class="col-xs-4 text-center">
                    <a href="../#">Sales</a>
                  </div>
                  <div class="col-xs-4 text-center">
                    <a href="../#">Friends</a>
                  </div>
                </div>
                <!-- /.row -->
              </li>
              <!-- Menu Footer-->
              <li class="user-footer">
                <div class="pull-left">
                  <a href="profile.php" class="btn btn-default btn-flat">Profile</a>
                </div>
                <div class="pull-right">
                  <a href="signout.php" class="btn btn-default btn-flat">Sign out</a>
                </div>
              </li>
            </ul>
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
          <img src="../dist/img/<?php echo $user_type;?>.jpg" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p>
            <?php echo $_SESSION['fname']." ".$_SESSION['lname'];?>
          </p>
          <a href="../#"><i class="fa fa-circle text-success"></i> Online</a>
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
        <li class="active">
          <a href="index.php"><i class="fa fa-dashboard"></i>Dashboard</a>
        </li>
        
        <li class="active treeview menu-open">
          <a href="#">
            <i class="fa fa-list-alt" aria-hidden="true"></i> <span>Modules</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <?php if($user_type === 'admin'): ?>
            
            <li><a href="table.php?table=admin"><i class="fa fa-circle-o"></i>Admins</a></li>
            <li><a href="table.php?table=teacher"><i class="fa fa-circle-o"></i>Teachers</a></li>
            <li><a href="table.php?table=student"><i class="fa fa-circle-o"></i>Students</a></li>
            <li><a href="table.php?table=parent"><i class="fa fa-circle-o"></i>Parents</a></li>
            <li><a href="table.php?table=classroom"><i class="fa fa-circle-o"></i>Classrooms</a></li>
            
            <?php elseif($user_type === 'teacher'): ?>
            
            <li><a href="table.php?table=teacher"><i class="fa fa-circle-o"></i>Teachers</a></li>
            <li><a href="table.php?table=student"><i class="fa fa-circle-o"></i>Students</a></li>
            <li><a href="table.php?table=parent"><i class="fa fa-circle-o"></i>Parents</a></li>
            <li><a href="tables/table.php?table=classroom"><i class="fa fa-circle-o"></i>Classrooms</a></li>

            <?php endif; ?>
            
            <li><a href="table.php?table=grade"><i class="fa fa-circle-o"></i>Grades</a></li>
            
            <li><a href="table.php?table=classroom_student"><i class="fa fa-circle-o"></i>Classroom Wise Students</a></li>
            <li><a href="table_form.php?table=course"><i class="fa fa-circle-o"></i>Courses</a></li>
            <li><a href="table_form.php?table=attendance"><i class="fa fa-circle-o"></i>Attendances</a></li>
            <li><a href="table.php?table=exam"><i class="fa fa-circle-o"></i>Exams</a></li>
            <li><a href="table.php?table=exam_type"><i class="fa fa-circle-o"></i>Exam Types</a></li>
            <li><a href="table_form.php?table=exam_result"><i class="fa fa-circle-o"></i>Exam Results</a></li>
          </ul>
        </li>

        <?php if($user_type === 'admin'): ?>
        <li class="active treeview menu-open">
          <a href="#">
            <i class="fa fa-list-alt" aria-hidden="true"></i> <span>Profiles</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="view/view_profile.php?table=admin"><i class="fa fa-circle-o"></i>Admin</a></li>
            <li><a href="view/view_profile.php?table=teacher"><i class="fa fa-circle-o"></i>Teacher</a></li>
            <li><a href="view/view_profile.php?table=student"><i class="fa fa-circle-o"></i>Student</a></li>
          </ul>
        </li>
        <?php endif;?>

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
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <!-- Small boxes (Stat box) -->
      <div class="row">
        <?php if($user_type === 'admin'):?>
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-aqua">
            <div class="inner">
              <h3><?php echo $admins->num_rows; ?></h3>
              <p>Admin</p>
            </div>
            <div class="icon">
              <i class="ion-ios-people"></i>
            </div>
            <a href="tables/table.php?table=admin" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <?php endif;?>

        <?php if($user_type === 'admin' || $user_type === 'teacher'):?>
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-yellow">
            <div class="inner">
              
              <?php if($user_type === 'admin'):?>
              <h3><?php echo $teachers->num_rows; ?></h3>
              <?php endif;?>
              
              <p>Teachers</p>
            </div>
            <div class="icon">
              <i class="ion-ios-people"></i>
            </div>
            <a href="tables/table.php?table=teacher" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        

        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-red">
            <div class="inner">
              
              <?php if($user_type === 'admin'):?>
              <h3><?php echo $students->num_rows; ?></h3>
              <?php endif;?>

              <p>Students</p>
            </div>
            <div class="icon">
              <i class="ion-ios-people"></i>
            </div>
            <a href="tables/table.php?table=student" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        

        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-navy">
            <div class="inner">

              <?php if($user_type === 'admin'):?>
              <h3><?php echo $parents->num_rows; ?></h3>
              <?php endif;?>

              <p>Parents</p>
            </div>
            <div class="icon">
              <i class="ion-ios-people"></i>
            </div>
            <a href="tables/table.php?table=parent" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>

        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-olive">
            <div class="inner">

              <?php if($user_type === 'admin'):?>
              <h3><?php echo $classrooms->num_rows; ?></h3>
              <?php endif;?>

              <p>Classrooms</p>
            </div>
            <div class="icon">
              <i class="ion-ios-monitor"></i>
            </div>
            <a href="tables/table.php?table=classroom" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <?php endif;?>
        
        
        
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-blue">
            <div class="inner">
              
              <?php if($user_type === 'admin'):?>
              <h3><?php echo $cs->num_rows; ?></h3>
              <?php endif;?>
              
              <p>Classroom Wise Students</p>
            </div>
            <div class="icon">
              <i class="ion-ios-compose"></i>
            </div>

            <?php if($user_type === 'parent'):?>
            <a href="tables/table.php?table=classroom_student&id=<?php echo $_SESSION['id'];?>" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
            <?php elseif($user_type === 'student'):?>
            <a href="tables/table.php?table=classroom_student&id=<?php echo $_SESSION['id'];?>" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>

            <?php else:?>
            <a href="tables/table.php?table=classroom_student" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>

            <?php endif;?>
          </div>
        </div>

        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-black">
            <div class="inner">
              
              <?php if($user_type === 'admin'):?>
              <h3><?php echo ($attendances->num_rows/10); ?></h3>
              <?php endif;?>

              <p>Days Attendances</p>
            </div>
            <div class="icon">
              <i class="ion-calendar"></i>
            </div>
            <a href="tables/table_form.php?table=attendance" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>

        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-fuchsia">
            <div class="inner">

              <?php if($user_type === 'admin'):?>
              <h3><?php echo $courses->num_rows; ?></h3>
              <?php endif;?>

              <p>Courses</p>
            </div>
            <div class="icon">
              <i class="ion-document"></i>
            </div>
            <a href="tables/table_form.php?table=course" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-purple">
            <div class="inner">

              <?php if($user_type === 'admin'):?>
              <h3><?php echo $exams->num_rows; ?></h3>
              <?php endif;?>

              <p>Yearly Exams</p>
            </div>
            <div class="icon">
              <i class="ion-compose"></i>
            </div>
            <a href="tables/table.php?table=exam" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-orange">
            <div class="inner">

              <?php if($user_type === 'admin'):?>
              <h3><?php echo $exam_types->num_rows; ?></h3>
              <?php endif;?>

              <p>Exam Types</p>
            </div>
            <div class="icon">
              <i class="ion-android-clipboard"></i>
            </div>
            <a href="tables/table.php?table=exam_type" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>

        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-maroon">
            <div class="inner">

              <?php if($user_type === 'admin'):?>
              <h3><?php echo $exam_results->num_rows; ?></h3>
              <?php endif;?>

              <p>Exam Results</p>
            </div>
            <div class="icon">
              <i class="ion-android-checkbox"></i>
            </div>
            <a href="tables/table_form.php?table=exam_result" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>

        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-teal">
            <div class="inner">
              
              <?php if($user_type === 'admin'):?>
              <h3><?php echo $grades->num_rows; ?></h3>
              <?php endif;?>

              <p>Grades</p>
            </div>
            <div class="icon">
              <i class="ion-document-text"></i>
            </div>
            <a href="tables/table.php?table=grade" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>  
        <!-- ./col -->
      </div>
      <!-- /.row -->
      <!-- Main row -->
      

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <footer class="main-footer">
    <div class="pull-right hidden-xs">
      <b>Version</b> 2.4.0
    </div>
    <strong>Copyright &copy; 2014-2018 <a href="https://bit.ly/2jefQY2">Sadman Abedin</a>.</strong> All rights
    reserved.
  </footer>

</div>
<!-- ./wrapper -->

<!-- jQuery 3 -->
<script src="../bower_components/jquery/dist/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="../bower_components/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button);
</script>
<!-- Bootstrap 3.3.7 -->
<script src="../bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- Morris.js charts -->
<script src="../bower_components/raphael/raphael.min.js"></script>
<script src="../bower_components/morris.js/morris.min.js"></script>
<!-- Sparkline -->
<script src="../bower_components/jquery-sparkline/dist/jquery.sparkline.min.js"></script>
<!-- jvectormap -->
<script src="../plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
<script src="../plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
<!-- jQuery Knob Chart -->
<script src="../bower_components/jquery-knob/dist/jquery.knob.min.js"></script>
<!-- daterangepicker -->
<script src="../bower_components/moment/min/moment.min.js"></script>
<script src="../bower_components/bootstrap-daterangepicker/daterangepicker.js"></script>
<!-- datepicker -->
<script src="../bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
<!-- Bootstrap WYSIHTML5 -->
<script src="../plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
<!-- Slimscroll -->
<script src="../bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="../bower_components/fastclick/lib/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="../dist/js/adminlte.min.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="../dist/js/pages/dashboard.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="../dist/js/demo.js"></script>
</body>
</html>
<?php else:
    header('Location:../login.php?error=420');
  endif;
?>
