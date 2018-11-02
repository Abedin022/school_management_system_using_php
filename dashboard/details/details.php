<?php 
  session_start(); ob_start();
  include_once '../../inc/db.php';
  
  $user_type = $_SESSION['user_type'];
  
  $id = $_GET['id'];
  $table = $_GET['table'];
  $primary_key = $table."_id";

  if(isset($_SESSION['isLoggedIn']) && $_SESSION['isLoggedIn'] ==='yes'): 
?>
<?php
  $sql = "SELECT * FROM $table where $primary_key = '$id'";
  $result = $mysql->query($sql);

  if(!$result){
    echo "Somethign wrong in your query\n";
    echo 'Your Erron no'.$mysql->connect_errno.'<br>';
    echo 'Your Error'.$mysql->connect_error.'<br>';
    exit;
  }
  while($user = $result->fetch_assoc()):
?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Deatils</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="../../bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="../../bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="../../bower_components/Ionicons/css/ionicons.min.css">
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
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

  <header class="main-header">
    <!-- Logo -->
    <a href="../index.php" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b>A</b>LT</span>
      <!-- logo for regular state and mobile devices -->
      <?php if($user_type === 'admin'):?>
        <span class="logo-lg"><b>Admin</b></span>
      <?php elseif($user_type === 'teacher'):?>
        <span class="logo-lg"><b>Teacher</b></span>
      <?php elseif($user_type === 'student'):?>
        <span class="logo-lg"><b>Student</b></span>
      <?php elseif($user_type === 'parent'):?>
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
              <img src="../../dist/img/<?php echo $user_type;?>.jpg" class="user-image" alt="User Image">
              <span class="hidden-xs">
                <?php echo $_SESSION['fname']." ".$_SESSION['lname']."<br>";?>
              </span>
            </a>
            <ul class="dropdown-menu">
              <!-- User image -->
              <li class="user-header">
                <img src="../../dist/img/<?php echo $user_type;?>.jpg" class="img-circle" alt="User Image">

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
          <img src="../../dist/img/<?php echo $user_type;?>.jpg" class="img-circle" alt="User Image">
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
          <a href="../index.php"><i class="fa fa-dashboard"></i>Dashboard</a>
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
            
            <li><a href="../tables/table.php?table=admin"><i class="fa fa-circle-o"></i>Admins</a></li>
            <li><a href="../tables/table.php?table=teacher"><i class="fa fa-circle-o"></i>Teachers</a></li>
            <li><a href="../tables/table.php?table=student"><i class="fa fa-circle-o"></i>Students</a></li>
            <li><a href="../tables/table.php?table=parent"><i class="fa fa-circle-o"></i>Parents</a></li>
            <li><a href="../tables/table.php?table=classroom"><i class="fa fa-circle-o"></i>Classrooms</a></li>

            <?php elseif($user_type === 'teacher'): ?>
            
            <li><a href="../tables/table.php?table=teacher"><i class="fa fa-circle-o"></i>Teachers</a></li>
            <li><a href="../tables/table.php?table=student"><i class="fa fa-circle-o"></i>Students</a></li>
            <li><a href="../tables/table.php?table=parent"><i class="fa fa-circle-o"></i>Parents</a></li>
            <li><a href="../tables/table.php?table=classroom"><i class="fa fa-circle-o"></i>Classrooms</a></li>

            <?php endif; ?>
            
            <li><a href="../tables/table.php?table=grade"><i class="fa fa-circle-o"></i>Grades</a></li>
            
            <li><a href="../tables/table.php?table=classroom_student"><i class="fa fa-circle-o"></i>Classroom Wise Students</a></li>
            <li><a href="../tables/table_form.php?table=course"><i class="fa fa-circle-o"></i>Courses</a></li>
            <li><a href="../tables/table_form.php?table=attendance"><i class="fa fa-circle-o"></i>Attendances</a></li>
            <li><a href="../tables/table.php?table=exam"><i class="fa fa-circle-o"></i>Exams</a></li>
            <li><a href="../tables/table.php?table=exam_type"><i class="fa fa-circle-o"></i>Exam Types</a></li>
            <li><a href="../tables/table_form.php?table=exam_result"><i class="fa fa-circle-o"></i>Exam Results</a></li>
          </ul>
        </li>

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

      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Details
      </h1>
      <ol class="breadcrumb">
        <li><a href="../index.php"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active"><a href="#">User Details</a></li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">

      <div class="row">
        <div class="col-md-3">

          <!-- Profile Image -->
          <div class="box box-primary">
            <div class="box-body box-profile">
              <img class="profile-user-img img-responsive img-circle" src="../../dist/img/<?php echo $table;?>.jpg" alt="User profile picture">

              <h3 class="profile-username text-center">
                <?php echo $user['fname']." ".$user['lname']."<br>";?>
              </h3>

              <p class="text-muted text-center"><?php echo $table;?></p>

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

              <li><a href="#general_settings" data-toggle="tab">General Settings</a></li>
              <?php if($table === 'student'):?>
              <li><a href="#course" data-toggle="tab">Courses</a></li>
              <li><a href="#result" data-toggle="tab">Result</a></li>
              <li><a href="#attendance" data-toggle="tab">Attendance</a></li>
              <li><a href="#parent_info" data-toggle="tab">Parent Info</a></li>

              <?php elseif($table === 'parent'):?>
              <li><a href="#children_info" data-toggle="tab">Children Info</a></li>
              
              <?php elseif($table === 'teacher'):?>
              <li><a href="#ins_course" data-toggle="tab">Courses</a></li>

              <?php endif;?>
            
            </ul>
            <div class="tab-content">
              <div class="active tab-pane" id="basic_info">
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
                  <tr>
                  <td><a href="../edit/edit.php?id=<?php echo $user[$primary_key];?>&table=<?php echo $table;?>"><button type="button" class="btn btn-warning">Edit Info</button></a></td>
                  </tr>
                </table>
                
              </div>
              <!-- /.tab-pane -->

              <div class="tab-pane" id="general_settings">
                <table class="table table-hover">
                  <tr>
                    <td class="info">Change Password</td>
                    <td class="info">
                      <a href="../change/change_password.php?id=<?php echo $id;?>&table=<?php echo $table;?>"><button class="btn btn-primary">Go</button></a>
                    </td>
                  </tr>
                </table>
              </div>
              
              <?php if($table === 'student'):?>
              
              <div class="tab-pane" id="course">
                <table class="table table-hover">
                  <thead>
                    <tr>
                      <th>Course Code</th>
                      <th>Name</th>
                      <th>Description</th>
                    </tr>
                  </thead>
                  <?php
                    $id_2 = $user['grade_id'];
                    $sql_2 = "SELECT * FROM course WHERE grade_id='$id_2'";
                    $result_2 = $mysql->query($sql_2);

                    if(!$result){
                      echo "Somethign wrong in your query\n";
                      echo 'Your Erron no'.$mysql->connect_errno.'<br>';
                      echo 'Your Error'.$mysql->connect_error.'<br>';
                      exit;
                    }
                    while($user_2 = $result_2->fetch_assoc()):
                  ?>
                  <tr>
                    <td><?php echo $user_2['course_code'];?></td>
                    <td><?php echo $user_2['name'];?></td>
                    <td><?php echo $user_2['description'];?></td>
                  </tr>

                  <?php endwhile;?>
                  <tfoot>
                    <tr>
                      <th>Course Code</th>
                      <th>Name</th>
                      <th>Description</th>
                    </tr>
                  </tfoor>
                </table>   
              </div>

              <div class="tab-pane" id="result">
                <table class="table table-hover">
                  <thead>
                    <tr>
                      <th>Student ID</th>
                      <th>Exam ID</th>
                      <th>Course Code</th>
                      <th>Subject's Name</th>
                      <th>Marks</th>
                    </tr>
                  </thead>
                  <?php
                    $id_3= $user['student_id'];
                    $sql_3 = "SELECT * FROM exam_result LEFT JOIN course USING(course_id) WHERE student_id='$id_3'";
                    $result_3 = $mysql->query($sql_3);

                    if(!$result_3){
                      echo "Somethign wrong in your query\n";
                      echo 'Your Erron no'.$mysql->connect_errno.'<br>';
                      echo 'Your Error'.$mysql->connect_error.'<br>';
                      exit;
                    }
                    while($user_3 = $result_3->fetch_assoc()):
                  ?>
                  <tr>
                    <td><?php echo $user_3['student_id'];?></td>
                    <td><?php echo $user_3['exam_id'];?></td>
                    <td><?php echo $user_3['course_code'];?></td>
                    <td><?php echo $user_3['name'];?></td>
                    <td><?php echo $user_3['marks'];?></td>
                  </tr>

                  <?php endwhile;?>
                  <tfoot>
                    <tr>
                      <th>Student ID</th>
                      <th>Exam ID</th>
                      <th>Course Code</th>
                      <th>Subject's Name</th>
                      <th>Marks</th>
                    </tr>
                  </tfoot>
                </table>
                
              </div>

              <div class="tab-pane" id="attendance">
                <table class="table table-hover">
                  <thead>
                    <tr>
                      <th>Date</th>
                      <th>Student ID</th>
                      <th>Name</th>
                      <th>Status</th>
                      <th>Remarks</th>
                    </tr>
                  </thead>
                  <?php
                    $id_4= $user['student_id'];
                    $sql_4 = "SELECT * FROM attendance LEFT JOIN student USING(student_id) WHERE student_id='$id_4'";
                    $result_4 = $mysql->query($sql_4);

                    if(!$result_4){
                      echo "Somethign wrong in your query\n";
                      echo 'Your Erron no'.$mysql->connect_errno.'<br>';
                      echo 'Your Error'.$mysql->connect_error.'<br>';
                      exit;
                    }
                    while($user_4 = $result_4->fetch_assoc()):
                  ?>
                  <tr>
                    <td><?php echo $user_4['date'];?></td>
                    <td><?php echo $user_4['student_id'];?></td>
                    <td><?php echo $user_4['fname']." ".$user_4['lname'];?></td>
                    <td>
                      <?php 
                        $status = ($user_4['attendance_status'] === '1') ? 'Present' : 'Absent';
                        echo $status;
                      ?>
                    </td>
                    <td><?php echo $user_4['remark'];?></td>
                  </tr>

                  <?php endwhile;?>
                  <tfoot>
                    <tr>
                      <th>Date</th>
                      <th>Student ID</th>
                      <th>Name</th>
                      <th>Status</th>
                      <th>Remarks</th>
                    </tr>
                  </tfoot>
                </table>
                
              </div>

              <div class="tab-pane" id="parent_info">
                <?php
                  $id_5 = $user['parent_id'];
                  $sql_5 = "SELECT * FROM parent WHERE parent_id='$id_5'";
                  $result_5 = $mysql->query($sql_5);

                  if(!$result_5){
                    echo "Somethign wrong in your query\n";
                    echo 'Your Erron no'.$mysql->connect_errno.'<br>';
                    echo 'Your Error'.$mysql->connect_error.'<br>';
                    exit;
                  }
                  while($user_5 = $result_5->fetch_assoc()):
                ?>
                <table class="table table-hover">
                  <tr>
                    <td class="info">Name</td>
                    <td class="info">
                      <?php echo $user_5['fname']." ".$user_5['lname']."<br>";?>
                    </td>
                  </tr>

                  <tr>
                    <td class="info">Email</td>
                    <td class="info">
                      <?php echo $user_5['email']."<br>";?>
                    </td>
                  </tr>

                  <tr>
                    <td class="info">Phone</td>
                    <td class="info">
                      <?php echo $user_5['phone']."<br>";?>
                    </td>
                  </tr>

                  <tr>
                    <td class="info">Mobile</td>
                    <td class="info">
                      <?php echo $user_5['mobile']."<br>";?>
                    </td>
                  </tr>
                  
                  <tr>
                    <td class="info">Status</td>
                    <td class="info">
                      <?php echo $user_5['status']."<br>";?>
                    </td>
                  </tr>

                  <tr>
                    <td class="info">Last Login Date</td>
                    <td class="info">
                      <?php echo $user_5['last_login_date']."<br>";?>
                    </td>
                  </tr>

                  <tr>
                    <td class="info">Last Login IP</td>
                    <td class="info">
                    <?php echo $user_5['last_login_ip']."<br>";?>
                    </td>
                  </tr>
                  <?php endwhile;?>
                </table>
                
              </div>
              
              <?php elseif($table === 'parent'):?>
              <div class="tab-pane" id="children_info">
                <?php
                  $count = 0;
                  $id_6 = $user['parent_id'];
                  $sql_6 = "SELECT * FROM student WHERE parent_id='$id_6'";
                  $result_6 = $mysql->query($sql_6);

                  if(!$result_6){
                    echo "Somethign wrong in your query\n";
                    echo 'Your Erron no'.$mysql->connect_errno.'<br>';
                    echo 'Your Error'.$mysql->connect_error.'<br>';
                    exit;
                  }
                  while($user_6 = $result_6->fetch_assoc()):
                    $count+=1;
                ?>
                
                <table class="table table-hover">
                  <h3>Children : <?php echo $count;?></h3>
                  <tr>
                    <td class="info">Name</td>
                    <td class="info">
                      <?php echo $user_6['fname']." ".$user_6['lname']."<br>";?>
                    </td>
                  </tr>

                  <tr>
                    <td class="info">Email</td>
                    <td class="info">
                      <?php echo $user_6['email']."<br>";?>
                    </td>
                  </tr>

                  <tr>
                    <td class="info">Grade ID</td>
                    <td class="info">
                      <?php echo $user_6['grade_id']."<br>";?>
                    </td>
                  </tr>

                  <tr>
                    <td class="info">Phone</td>
                    <td class="info">
                      <?php echo $user_6['phone']."<br>";?>
                    </td>
                  </tr>

                  <tr>
                    <td class="info">Mobile</td>
                    <td class="info">
                      <?php echo $user_6['mobile']."<br>";?>
                    </td>
                  </tr>
                  
                  <tr>
                    <td class="info">Status</td>
                    <td class="info">
                      <?php echo $user_6['status']."<br>";?>
                    </td>
                  </tr>

                  <tr>
                    <td class="info">Last Login Date</td>
                    <td class="info">
                      <?php echo $user_6['last_login_date']."<br>";?>
                    </td>
                  </tr>

                  <tr>
                    <td class="info">Last Login IP</td>
                    <td class="info">
                    <?php echo $user_6['last_login_ip']."<br>";?>
                    </td>
                  </tr>
                  <?php endwhile;?>
                </table>
                
              </div>

            <?php elseif($table === 'teacher'):?>
              <div class="tab-pane" id="ins_course">
                <table class="table table-hover">
                  <thead>
                    <tr>
                      <th>Course Code</th>
                      <th>Name</th>
                      <th>Description</th>
                    </tr>
                  </thead>
                  <?php
                    $id_7 = $user['teacher_id'];
                    $sql_7 = "SELECT * FROM course LEFT JOIN teacher USING(teacher_id) WHERE teacher_id='$id_7'";
                    $result_7 = $mysql->query($sql_7);

                    if(!$result_7){
                      echo "Somethign wrong in your query\n";
                      echo 'Your Erron no'.$mysql->connect_errno.'<br>';
                      echo 'Your Error'.$mysql->connect_error.'<br>';
                      exit;
                    }
                    while($user_7 = $result_7->fetch_assoc()):
                  ?>
                  <tr>
                    <td><?php echo $user_7['course_code'];?></td>
                    <td><?php echo $user_7['name'];?></td>
                    <td><?php echo $user_7['description'];?></td>
                  </tr>

                  <?php endwhile;?>
                  <tfoot>
                    <tr>
                      <th>Course Code</th>
                      <th>Name</th>
                      <th>Description</th>
                    </tr>
                  </tfoor>
                </table>   
              </div>
              <?php endif;?>
              <!-- /.tab-pane -->
              <a href="../index.php"><button type="button" class="btn btn-primary">Back To Dashboard</button></a>
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
<script src="../../bower_components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="../../bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- FastClick -->
<script src="../../bower_components/fastclick/lib/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="../../dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="../../dist/js/demo.js"></script>
</body>
</html>
<?php 
endwhile;
else:
  header('Location:../index.php?error=100');
endif;
 ?>