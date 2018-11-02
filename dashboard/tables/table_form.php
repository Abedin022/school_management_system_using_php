<?php 
  include_once '../../inc/db.php';
  session_start(); ob_start(); 
  
  $table = $_GET['table'];
  $user_type = $_SESSION['user_type']; 
  if(isset($_SESSION['isLoggedIn']) && $_SESSION['isLoggedIn'] ==='yes'):
?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title><?php echo $table;?> form</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="../../bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="../../bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="../../bower_components/Ionicons/css/ionicons.min.css">
  <!-- DataTables -->
  <link rel="stylesheet" href="../../bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../../dist/css/AdminLTE.min.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="../../dist/css/skins/_all-skins.min.css">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <!-- Google Font -->
  <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

  <header class="main-header">
    <!-- Logo -->

    <a href="../index.php" class="logo">
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
      <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </a>

      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          <!-- User Account: style can be found in dropdown.less -->
          <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <img src="../../dist/img/<?php echo $_SESSION['user_type'];?>.jpg" class="user-image" alt="User Image">
              <span class="hidden-xs">
                <?php echo $_SESSION['fname']." ".$_SESSION['lname'];?>
              </span>
            </a>
            <ul class="dropdown-menu">
              <!-- User image -->
              <li class="user-header">
                <img src="../../dist/img/<?php echo $_SESSION['user_type'];?>.jpg" class="img-circle" alt="User Image">

                <p>
                  <?php echo $_SESSION['fname']." ".$_SESSION['lname'];?> - Admin
                  <small>Member since Nov. 2012</small>
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
                  <a href="../profile.php" class="btn btn-default btn-flat">Profile</a>
                </div>
                <div class="pull-right">
                  <a href="../signout.php" class="btn btn-default btn-flat">Sign out</a>
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
          <img src="../../dist/img/<?php echo $_SESSION['user_type'];?>.jpg" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p>
            <?php echo $_SESSION['fname']." ".$_SESSION['lname'];?>
          </p>
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
        <li class="active">
          <a href="../index.php"><i class="fa fa-dashboard"></i>Dashboard</a>
        </li>

        <?php if($user_type === 'admin' || ($user_type === 'teacher' && ($table==='attendance' || $table === 'exam_result') ) ):?>

        <li class="active treeview menu-open">
          <a href="#">
            <i class="fa fa-edit"></i> <span><?php echo $table;?></span>
            <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="../register/register.php?table=<?php echo $table;?>"><i class="fa fa-circle-o"></i>Add</a></li>
            <li><a href="../edit/check_edit.php?&table=<?php echo $table;?>"><i class="fa fa-circle-o"></i>Edit</a></li>
            <li><a href="../delete/check_delete.php?&table=<?php echo $table;?>"><i class="fa fa-circle-o"></i>Delete</a></li>
            
          </ul>
        </li>
        <?php endif;?>
        
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
            <li><a href="table.php?table=classroom"><i class="fa fa-circle-o"></i>Classrooms</a></li>

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
            <li><a href="../view/view_profile.php?table=admin"><i class="fa fa-circle-o"></i>Admin</a></li>
            <li><a href="../view/view_profile.php?table=teacher"><i class="fa fa-circle-o"></i>Teacher</a></li>
            <li><a href="../view/view_profile.php?table=student"><i class="fa fa-circle-o"></i>Student</a></li>
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
        <?php echo $table;?>
      </h1>
      <ol class="breadcrumb">
        <li><a href="../index.php"><i class="fa fa-dashboard"></i>Home</a></li>
        
        <li class="active"><a href="#"><?php echo $table."s";?></a></li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <!-- left column -->
        <div class="col-md-6">
          <!-- general form elements -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">View <?php echo $table;?></h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->

            <?php if (($_SESSION['user_type'] === 'parent' || $_SESSION['user_type'] === 'student') && $table === 'attendance'):?>

            <form action="table.php?table=<?php echo $table;?>&id=<?php echo $_SESSION['id'];?>" role="form" method="post">
            
            <?php else:?>
            
            <form action="table.php?table=<?php echo $table;?>" role="form" method="post">
            <?php endif;?>
            
              <div class="box-body">
                
                <?php if($table === 'exam_result'):?>

                <div class="form-group has-feedback"">
                  <label>Select Year</label>
                  <select class="form-control" placeholder="Select Year" name="year">
                    <option value="2010" name="2010">2010</option>
                    <option value="2011" name="2011">2011</option>
                    <option value="2012" name="2012">2012</option>
                    <option value="2013" name="2013">2013</option>
                    <option value="2014" name="2014">2014</option>
                    <option value="2015" name="2015">2015</option>
                    <option value="2016" name="2016">2016</option>
                    <option value="2017" name="2017">2017</option>
                    <option value="2018" name="2018">2018</option>
                  </select>
                </div>
                
                <div class="form-group has-feedback"">
                  <label>Select Term</label>
                  <select class="form-control" placeholder="Select Term" name="term">
                    <option value="1" name="1">1st Term</option>
                    <option value="2" name="2">2nd Term</option>
                    <option value="3" name="3">Annual</option>
                  </select>
                </div>

                <div class="form-group has-feedback"">
                  <label>Select Grade</label>
                  <select class="form-control" placeholder="Select Grade" name="grade">
                    <option value="1" name="1">1st Grade</option>
                    <option value="2" name="2">2nd Grade</option>
                    <option value="3" name="3">3rd Grade</option>
                    <option value="4" name="4">4th Grade</option>
                    <option value="5" name="5">5th Grade</option>
                    <option value="6" name="6">6th Grade</option>
                    <option value="7" name="7">7th Grade</option>
                    <option value="8" name="8">8th Grade</option>
                    <option value="9" name="9">9th Grade</option>
                    <option value="10" name="10">10th Grade</option>
                  </select>
                </div>
                
                <div class="form-group has-feedback"">
                  <label>Select Subject</label>
                  <select class="form-control" placeholder="Select Subject" name="subject">
                    <option value="all_subjects" name="all_subjects">--All Subjects--</option>
                    <option value="Mathematics" name="Mathematics">Mathematics</option>
                    <option value="Science" name="Science">Science</option>
                    <option value="Religion" name="Religion">Religion</option>
                    <option value="Sociology" name="Sociology">Sociology</option>
                    <option value="Bengali" name="Bengali">Bengali</option>
                    <option value="English" name="English">English</option>
                  </select>
                </div>
                
                <div class="form-group has-feedback"">
                  <label for="exampleInputID">Enter Student ID</label>
                  <input type="text" class="form-control" id="exampleInputID" placeholder="Enter Student ID" name="id">
                  <span class="glyphicon glyphicon-user form-control-feedback"></span>
                </div>


                <?php elseif($table === 'attendance'):?>

                <div class="form-group has-feedback"">
                  <label>Select Date</label>
                  <input type="date" name="date" placeholder="Select Date">
                </div>

                <h4>OR</h4>

                <div class="form-group has-feedback"">
                  <label>Select Month</label>
                  <select class="form-control" placeholder="Select Grade" name="month">
                    <option value="1" name="1">January</option>
                    <option value="2" name="2">February</option>
                    <option value="3" name="3">March</option>
                    <option value="4" name="4">April</option>
                    <option value="5" name="5">May</option>
                    <option value="6" name="6">June</option>
                    <option value="7" name="7">July</option>
                    <option value="8" name="8">August</option>
                    <option value="9" name="9">September</option>
                    <option value="10" name="10">October</option>
                    <option value="11" name="11">November</option>
                    <option value="12" name="12">December</option>
                  </select>
                </div>

                <div class="form-group has-feedback"">
                  <label for="exampleInputID">Enter Student ID</label>
                  <input type="text" class="form-control" id="exampleInputID" placeholder="Enter Student ID" name="id">
                  <span class="glyphicon glyphicon-user form-control-feedback"></span>
                </div>
                
                <?php elseif($table === 'course'):?>

                <div class="form-group has-feedback"">
                  <label>Select Grade</label>
                  <select class="form-control" placeholder="Select Grade" name="grade">
                    <option value="1" name="1">1st Grade</option>
                    <option value="2" name="2">2nd Grade</option>
                    <option value="3" name="3">3rd Grade</option>
                    <option value="4" name="4">4th Grade</option>
                    <option value="5" name="5">5th Grade</option>
                    <option value="6" name="6">6th Grade</option>
                    <option value="7" name="7">7th Grade</option>
                    <option value="8" name="8">8th Grade</option>
                    <option value="9" name="9">9th Grade</option>
                    <option value="10" name="10">10th Grade</option>
                  </select>
                </div>

                <?php endif;?>

              </div>
              <!-- /.box-body -->

              <div class="box-footer">
                <button type="submit" class="btn btn-primary">View</button>
                <h3>OR</h3>
                <a href="../index.php"><button type="button" class="btn btn-primary">Back To Dashboard</button></a>
              </div>
            </form>
          </div>
          <!-- /.box -->
        </div>
        <!--/.col (left) -->
        
      </div>
      <!-- /.row -->
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
<script src="../../bower_components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="../../bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- DataTables -->
<script src="../../bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="../../bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
<!-- SlimScroll -->
<script src="../../bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="../../bower_components/fastclick/lib/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="../../dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="../../dist/js/demo.js"></script>
<!-- page script -->
<script>
  $(function () {
    $('#example1').DataTable()
    $('#example2').DataTable({
      'paging'      : true,
      'lengthChange': false,
      'searching'   : false,
      'ordering'    : true,
      'info'        : true,
      'autoWidth'   : false
    })
  })
</script>
</body>
</html>
<?php 
  else:
    header('Location:../../login.php?error=420');
  endif;
?>