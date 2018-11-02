<?php 
  session_start(); ob_start();
  include_once '../inc/db.php';
  $user_type = $_SESSION['user_type'];
  if(isset($_SESSION['isLoggedIn']) && $_SESSION['isLoggedIn'] ==='yes'): 
?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Profile</title>
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

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
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
              <img src="../dist/img/<?php echo $user_type;?>.jpg" class="user-image" alt="User Image">
              <span class="hidden-xs">
                <?php echo $_SESSION['fname']." ".$_SESSION['lname']."<br>";?>
              </span>
            </a>
            <ul class="dropdown-menu">
              <!-- User image -->
              <li class="user-header">
                <img src="../dist/img/<?php echo $user_type;?>.jpg" class="img-circle" alt="User Image">

                <p>
                  <?php echo $_SESSION['fname']." ".$_SESSION['lname'];?>- <?php echo $user_type;?>
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
                  <a href="#" class="btn btn-default btn-flat">Profile</a>
                </div>
                <div class="pull-right">
                  <a href="signout.php" class="btn btn-default btn-flat">Sign out</a>
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
          <img src="../dist/img/<?php echo $user_type;?>.jpg" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p>
            <?php echo $_SESSION['fname']." ".$_SESSION['lname']."<br>";?>
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
            
            <li><a href="tables/table.php?table=admin"><i class="fa fa-circle-o"></i>Admins</a></li>
            <li><a href="tables/table.php?table=teacher"><i class="fa fa-circle-o"></i>Teachers</a></li>
            <li><a href="tables/table.php?table=student"><i class="fa fa-circle-o"></i>Students</a></li>
            <li><a href="tables/table.php?table=parent"><i class="fa fa-circle-o"></i>Parents</a></li>
            <li><a href="tables/table.php?table=classroom"><i class="fa fa-circle-o"></i>Classrooms</a></li>

            <?php elseif($user_type === 'teacher'): ?>
            
            <li><a href="tables/table.php?table=teacher"><i class="fa fa-circle-o"></i>Teachers</a></li>
            <li><a href="tables/table.php?table=student"><i class="fa fa-circle-o"></i>Students</a></li>
            <li><a href="tables/table.php?table=parent"><i class="fa fa-circle-o"></i>Parents</a></li>
            <li><a href="tables/table.php?table=classroom"><i class="fa fa-circle-o"></i>Classrooms</a></li>

            <?php endif; ?>
            
            <li><a href="tables/table.php?table=grade"><i class="fa fa-circle-o"></i>Grades</a></li>
            
            <li><a href="tables/table.php?table=classroom_student"><i class="fa fa-circle-o"></i>Classroom Wise Students</a></li>
            <li><a href="tables/table_form.php?table=course"><i class="fa fa-circle-o"></i>Courses</a></li>
            <li><a href="tables/table_form.php?table=attendance"><i class="fa fa-circle-o"></i>Attendances</a></li>
            <li><a href="tables/table.php?table=exam"><i class="fa fa-circle-o"></i>Exams</a></li>
            <li><a href="tables/table.php?table=exam_type"><i class="fa fa-circle-o"></i>Exam Types</a></li>
            <li><a href="tables/table_form.php?table=exam_result"><i class="fa fa-circle-o"></i>Exam Results</a></li>
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
        User Profile
      </h1>
      <ol class="breadcrumb">
        <li><a href="index.php"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active"><a href="#">User profile</a></li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">

      <div class="row">
        <div class="col-md-3">

          <!-- Profile Image -->
          <div class="box box-primary">
            <div class="box-body box-profile">
              <img class="profile-user-img img-responsive img-circle" src="../dist/img/<?php echo $user_type;?>.jpg" alt="User profile picture">

              <h3 class="profile-username text-center">
                <?php echo $_SESSION['fname']." ".$_SESSION['lname']."<br>";?>
              </h3>

              <p class="text-muted text-center"><?php echo $user_type;?></p>

              <ul class="list-group list-group-unbordered">
                <li class="list-group-item">
                  <b>Followers</b> <a class="pull-right">1,322</a>
                </li>
                <li class="list-group-item">
                  <b>Following</b> <a class="pull-right">543</a>
                </li>
                <li class="list-group-item">
                  <b>Friends</b> <a class="pull-right">13,287</a>
                </li>
              </ul>

              <a href="#" class="btn btn-primary btn-block"><b>Follow</b></a>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
          
        </div>
        <!-- /.col -->
        <div class="col-md-9">
          <div class="nav-tabs-custom">
            <ul class="nav nav-tabs">
              <li class="active"><a href="#basic_info" data-toggle="tab">Basic Info</a></li>
              <li><a href="#timeline" data-toggle="tab">Timeline</a></li>
              <li><a href="#general_settings" data-toggle="tab">General Settings</a></li>
              
              <?php if($user_type === 'student'):?>
              <li><a href="#parent_info" data-toggle="tab">Parent Info</a></li>
              <?php endif;?>
            
            </ul>
            <div class="tab-content">
              <div class="active tab-pane" id="basic_info">
                <table class="table table-hover">
                  <tr>
                    <td class="info">Name</td>
                    <td class="info">
                      <?php echo $_SESSION['fname']." ".$_SESSION['lname']."<br>";?>
                    </td>
                    <td class="warning"><button type="button" class="btn btn-warning">Edit</button></td>
                  </tr>

                  <tr>
                    <td class="info">Email</td>
                    <td class="info">
                      <?php echo $_SESSION['email']."<br>";?>
                    </td>
                  </tr>

                  <tr>
                    <td class="info">Phone</td>
                    <td class="info">
                      <?php echo $_SESSION['phone']."<br>";?>
                    </td>
                    <td class="warning"><button type="button" class="btn btn-warning">Edit</button></td>
                  </tr>

                  <tr>
                    <td class="info">Mobile</td>
                    <td class="info">
                      <?php echo $_SESSION['mobile']."<br>";?>
                    </td>
                    <td class="warning"><button type="button" class="btn btn-warning">Edit</button></td>
                  </tr>
                  
                  <tr>
                    <td class="info">Status</td>
                    <td class="info">
                      <?php echo $_SESSION['status']."<br>";?>
                    </td>
                    <td class="warning"><button type="button" class="btn btn-warning">Edit</button></td>
                  </tr>

                  <tr>
                    <td class="info">Last Login Date</td>
                    <td class="info">
                      <?php echo $_SESSION['last_login_date']."<br>";?>
                    </td>
                    <td class="warning"><button type="button" class="btn btn-warning">Edit</button></td>
                  </tr>

                  <tr>
                    <td class="info">Last Login IP</td>
                    <td class="info">
                    <?php echo $_SESSION['last_login_ip']."<br>";?>
                    </td>
                    <td class="warning"><button type="button" class="btn btn-warning">Edit</button></td>
                  </tr>

                </table>
                
              </div>
              <!-- /.tab-pane -->
              <div class="tab-pane" id="timeline">
                <!-- The timeline -->
                <ul class="timeline timeline-inverse">
                  <!-- timeline time label -->
                  <li class="time-label">
                        <span class="bg-red">
                          10 Feb. 2014
                        </span>
                  </li>
                  <!-- /.timeline-label -->
                  <!-- timeline item -->
                  <li>
                    <i class="fa fa-envelope bg-blue"></i>

                    <div class="timeline-item">
                      <span class="time"><i class="fa fa-clock-o"></i> 12:05</span>

                      <h3 class="timeline-header"><a href="#">Support Team</a> sent you an email</h3>

                      <div class="timeline-body">
                        Etsy doostang zoodles disqus groupon greplin oooj voxy zoodles,
                        weebly ning heekya handango imeem plugg dopplr jibjab, movity
                        jajah plickers sifteo edmodo ifttt zimbra. Babblely odeo kaboodle
                        quora plaxo ideeli hulu weebly balihoo...
                      </div>
                      <div class="timeline-footer">
                        <a class="btn btn-primary btn-xs">Read more</a>
                        <a class="btn btn-danger btn-xs">Delete</a>
                      </div>
                    </div>
                  </li>
                  <!-- END timeline item -->
                  <!-- timeline item -->
                  <li>
                    <i class="fa fa-user bg-aqua"></i>

                    <div class="timeline-item">
                      <span class="time"><i class="fa fa-clock-o"></i> 5 mins ago</span>

                      <h3 class="timeline-header no-border"><a href="#">Sarah Young</a> accepted your friend request
                      </h3>
                    </div>
                  </li>
                  <!-- END timeline item -->
                  <!-- timeline item -->
                  <li>
                    <i class="fa fa-comments bg-yellow"></i>

                    <div class="timeline-item">
                      <span class="time"><i class="fa fa-clock-o"></i> 27 mins ago</span>

                      <h3 class="timeline-header"><a href="#">Jay White</a> commented on your post</h3>

                      <div class="timeline-body">
                        Take me to your leader!
                        Switzerland is small and neutral!
                        We are more like Germany, ambitious and misunderstood!
                      </div>
                      <div class="timeline-footer">
                        <a class="btn btn-warning btn-flat btn-xs">View comment</a>
                      </div>
                    </div>
                  </li>
                  <!-- END timeline item -->
                  <!-- timeline time label -->
                  <li class="time-label">
                        <span class="bg-green">
                          3 Jan. 2014
                        </span>
                  </li>
                  <!-- /.timeline-label -->
                  <!-- timeline item -->
                  <li>
                    <i class="fa fa-camera bg-purple"></i>

                    <div class="timeline-item">
                      <span class="time"><i class="fa fa-clock-o"></i> 2 days ago</span>

                      <h3 class="timeline-header"><a href="#">Mina Lee</a> uploaded new photos</h3>

                      <div class="timeline-body">
                        <img src="http://placehold.it/150x100" alt="..." class="margin">
                        <img src="http://placehold.it/150x100" alt="..." class="margin">
                        <img src="http://placehold.it/150x100" alt="..." class="margin">
                        <img src="http://placehold.it/150x100" alt="..." class="margin">
                      </div>
                    </div>
                  </li>
                  <!-- END timeline item -->
                  <li>
                    <i class="fa fa-clock-o bg-gray"></i>
                  </li>
                </ul>
              </div>
              <div class="tab-pane" id="general_settings">
                <table class="table table-hover">
                  <tr>
                    <td class="info">Change Password</td>
                    <td class="info">
                      <a href="change/change_password.php?id=<?php echo $_SESSION['id'];?>&table=<?php echo $_SESSION['user_type'];?>"><button class="btn btn-primary">Go</button></a>
                    </td>
                  </tr>
                </table>
              </div>
              <?php if($user_type === 'student'):?>
              <div class="tab-pane" id="parent_info">
                <?php
                  $id = $_SESSION['parent_id'];
                  $sql = "SELECT * FROM parent WHERE parent_id='$id'";
                  $result = $mysql->query($sql);

                  if(!$result){
                    echo "Somethign wrong in your query\n";
                    echo 'Your Erron no'.$mysql->connect_errno.'<br>';
                    echo 'Your Error'.$mysql->connect_error.'<br>';
                    exit;
                  }
                  while($user = $result->fetch_assoc()):
                ?>
                <table class="table table-hover">
                  <tr>
                    <td class="info">Name</td>
                    <td class="info">
                      <?php echo $user['fname']." ".$user['lname']."<br>";?>
                    </td>
                  </tr>

                  <tr>
                    <td class="info">Email</td>
                    <td class="info">
                      <?php echo $user['email']."<br>";?>
                    </td>
                  </tr>

                  <tr>
                    <td class="info">Phone</td>
                    <td class="info">
                      <?php echo $user['phone']."<br>";?>
                    </td>
                  </tr>

                  <tr>
                    <td class="info">Mobile</td>
                    <td class="info">
                      <?php echo $user['mobile']."<br>";?>
                    </td>
                  </tr>
                  
                  <tr>
                    <td class="info">Status</td>
                    <td class="info">
                      <?php echo $user['status']."<br>";?>
                    </td>
                  </tr>

                  <tr>
                    <td class="info">Last Login Date</td>
                    <td class="info">
                      <?php echo $user['last_login_date']."<br>";?>
                    </td>
                  </tr>

                  <tr>
                    <td class="info">Last Login IP</td>
                    <td class="info">
                    <?php echo $user['last_login_ip']."<br>";?>
                    </td>
                  </tr>
                  <?php endwhile;?>
                </table>
                
              </div>
              <?php endif;?>
              <!-- /.tab-pane -->
            </div>
            <!-- /.tab-content -->
          </div>
          <!-- /.nav-tabs-custom -->
        </div>
        <!-- /.col -->
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
<script src="../bower_components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="../bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- FastClick -->
<script src="../bower_components/fastclick/lib/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="../dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="../dist/js/demo.js"></script>
</body>
</html>
<?php else:
  header('Location:../index.php?error=100');
endif;
 ?>