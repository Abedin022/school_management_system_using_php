<?php 
  session_start(); ob_start();
  include_once '../../inc/db.php';
  $table = $_GET['table'];
  $user_type = $_SESSION['user_type'];
  if(isset($_SESSION['isLoggedIn']) && $_SESSION['isLoggedIn'] ==='yes' && ( $_SESSION['user_type'] === 'admin' || ($_SESSION['user_type'] === 'teacher' && ($table === 'attendance' || $table === 'exam_result') ) ) ): 
?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Edit Form</title>
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
      <?php if($_SESSION['user_type'] === 'admin'):?>
        <span class="logo-lg"><b>Admin</b></span>
      <?php elseif($_SESSION['user_type'] === 'teacher'):?>
        <span class="logo-lg"><b>Teacher</b></span>
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
              <img src="../../dist/img/admin.jpg" class="user-image" alt="User Image">
              <span class="hidden-xs">
                <?php echo $_SESSION['fname']." ".$_SESSION['lname']."<br>";?>
              </span>
            </a>
            <ul class="dropdown-menu">
              <!-- User image -->
              <li class="user-header">
                <img src="../../dist/img/admin.jpg" class="img-circle" alt="User Image">

                <p>
                  <?php echo $_SESSION['fname']." ".$_SESSION['lname']."<br>";?> - Admin
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
          <img src="../../dist/img/admin.jpg" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p><?php echo $_SESSION['fname']." ".$_SESSION['lname']."<br>";?></p>
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
          <?php if($_SESSION['user_type'] === 'admin'): ?>
          <a href="../index.php"><i class="fa fa-dashboard"></i>Dashboard</a>
          <?php elseif($_SESSION['user_type'] === 'teacher'): ?>
          <a href="../index.php"><i class="fa fa-dashboard"></i>Teacher</a>
          <?php endif;?>
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
        Edit your Data
      </h1>
      <ol class="breadcrumb">
        <?php if($_SESSION['user_type'] === 'admin'): ?>
        <li><a href="../index.php"><i class="fa fa-dashboard"></i> Home</a></li>
        
        <?php elseif($_SESSION['user_type'] === 'teacher'): ?>
        <li><a href="../teacher_index.php"><i class="fa fa-dashboard"></i> Home</a></li>
        
        <?php endif;?>

        <li><a href="../tables/<?php echo $_GET['table'];?>.php"><?php echo $_GET['table'];?></a></li>
        <li class="active"><a href="#">Edit</a></li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <!-- left column -->
        <div class="col-md-8">
          <!-- general form elements -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Edit form</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <?php if(isset($_GET['notification']) && $_GET['notification'] === '100' ) :?>

            <div class="alert alert-success alert-dismissible">
              <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
              <h4><i class="icon fa fa-ban"></i> Alert!</h4>
              <h3>Data Updated Successfully!</h3>
            </div>
            <div class="box-footer">
              <?php if($table === 'exam_result' || $table === 'attendance' || $table === 'course'):?>

              <a href="../tables/table_form.php?table=<?php echo $table;?>"><button type="button" class="btn btn-primary">View Data</button></a>
              
              <?php else:?>

              <a href="../tables/table.php?table=<?php echo $table;?>"><button type="button" class="btn btn-primary">View Data</button></a>
              
              <?php endif;?>
              <h3>OR</h3>
              <a href="../index.php"><button type="button" class="btn btn-primary">Back To Dashboard</button></a>
            </div>

            <?php elseif(isset($_GET['error']) && $_GET['error'] === '200' ) :?>

            <div class="alert alert-danger alert-dismissible">
              <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
              <h4><i class="icon fa fa-ban"></i> Alert!</h4>
              <h3>
                New Password Not Matched
              </h3>

            </div>

            <div class="box-footer">
              <a href="edit_process.php?id=<?php echo $id?>&table=<?php echo $table?>"><button type="button" class="btn btn-warning">Edit Again</button></a>
              <a href="../tables/<?php echo $table.".php";?>"><button type="button" class="btn btn-primary">View Data</button></a>
              <a href="../index.php"><button type="button" class="btn btn-primary">Back To Dashboard</button></a>
            </div>

            <?php else: ?>
            <?php
              
              $id = (isset($_GET['id'])) ? $_GET['id'] : $_POST['id'];
              $primary_key = $table."_id";

              if($table === 'attendance' && isset($_POST['id']) && isset($_POST['date'])){
                $date = $_POST['date']; 
                $sql = "SELECT * FROM $table WHERE student_id ='$id' and date='$date'";
              }
                                
              else{
                
                $sql = "SELECT * FROM $table WHERE $primary_key ='$id'";
              }
              $result = $mysql->query($sql);
              while($user = $result->fetch_assoc()):
            ?>

            <?php if ($table === 'attendance'):?>
            <form action="edit_process.php?id=<?php echo $id;?>&table=<?php echo $table;?>&date=<?php echo $date;?>" role="form" method="post">
            
            <?php else:?>

            <form action="edit_process.php?id=<?php echo $id;?>&table=<?php echo $table;?>" role="form" method="post">
            <?php endif;?>
              
              <div class="box-body">
                <h3><?php echo '<b>ID :  </b>'.$user[$primary_key];?></h3>
                <?php if($table === 'admin' || $table === 'teacher' || $table === 'parent' || $table === 'student'):?>
                
                <h3><?php echo '<b>Email :  </b>'.$user['email'];?></h3>
                <div class="form-group has-feedback"">
                  <label for="exampleInputFname">First Name</label>
                  <input type="text" class="form-control" id="exampleInputFname" value="<?php echo $user['fname'];?>" name="fname">
                  <span class="glyphicon glyphicon-user form-control-feedback"></span>
                </div>

                <div class="form-group has-feedback"">
                  <label for="exampleInputLname">Last Name</label>
                  <input type="text" class="form-control" id="exampleInputLname" value="<?php echo $user['lname'];?>" name="lname">
                  <span class="glyphicon glyphicon-user form-control-feedback"></span>
                </div>

                <div class="form-group has-feedback"">
                  <label for="exampleInputDOB">Date of Birth</label>
                  <input type="date" class="form-control" id="exampleInputDOB" value="<?php echo $user['dob'];?>" name="dob">
                  <span class="glyphicon glyphicon-calendar form-control-feedback"></span>
                </div>
                
                <div class="form-group has-feedback"">
                  <label for="exampleInputPhone">Phone</label>
                  <input type="text" class="form-control" id="exampleInputPhone" value="<?php echo $user['phone'];?>" name="phone">
                  <span class="glyphicon glyphicon-phone-alt form-control-feedback"></span>
                </div>

                <div class="form-group has-feedback"">
                  <label for="exampleInputMobile">Mobile</label>
                  <input type="text" class="form-control" id="exampleInputMobile" value="<?php echo $user['mobile'];?>" name="mobile">
                  <span class="glyphicon glyphicon-phone form-control-feedback"></span>
                </div>

                <div class="form-group has-feedback"">
                  <label for="exampleInputNewPassword">New Password</label>
                  <input type="password" class="form-control" id="exampleNewPassword" placeholder="Enter New Password" name="new_password">
                  <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                </div>

                <div class="form-group has-feedback"">
                  <label for="exampleInputRNewPassword">Retype New Password</label>
                  <input type="password" class="form-control" id="exampleRNewPassword" placeholder="Retype New Password" name="r_new_password">
                  <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                </div>
                
                <?php elseif($table === 'attendance'):?>
                  
                <h3><?php echo "<b>Date: </b>".$user['date'];?></h3>
                <h3><?php echo "<b>Student ID: </b>".$user['student_id'];?></h3>
                
                <div class="form-group has-feedback"">
                  <label for="exampleInputStatus">Status</label>
                  <input type="text" class="form-control" id="exampleInputStatus" value="<?php echo $user['attendance_status'];?>" name="status">
                  <span class="glyphicon glyphicon glyphicon-ok form-control-feedback"></span>
                </div>

                <div class="form-group has-feedback"">
                  <label for="exampleInputRemarks">Remarks</label>
                  <input type="text" class="form-control" id="exampleInputRemarks" value="<?php echo $user['remark'];?>" name="remark">
                  <span class="glyphicon glyphicon glyphicon-star form-control-feedback"></span>
                </div>

                <?php elseif($table === 'classroom'):?>

                <div class="form-group has-feedback"">
                  <label for="exampleInputGradeID">Grade ID</label>
                  <input type="text" class="form-control" id="exampleInputGradeID" value="<?php echo $user['grade_id'];?>" name="grade_id">
                  <span class="glyphicon glyphicon glyphicon-pencil form-control-feedback"></span>
                </div>

                <div class="form-group has-feedback"">
                  <label for="exampleInputRoomNumber">Room Number</label>
                  <input type="text" class="form-control" id="exampleInputRoomNumber" value="<?php echo $user['room_number'];?>" name="room_number">
                  <span class="glyphicon glyphicon glyphicon-home form-control-feedback"></span>
                </div>

                <div class="form-group has-feedback"">
                  <label for="exampleInputSection">Section</label>
                  <input type="text" class="form-control" id="exampleInputSection" value="<?php echo $user['section'];?>" name="section">
                  <span class="glyphicon glyphicon glyphicon-home form-control-feedback"></span>
                </div>
                
                <div class="form-group has-feedback"">
                  <label for="exampleInputStatus">Status</label>
                  <input type="text" class="form-control" id="exampleInputStatus" value="<?php echo $user['status'];?>" name="status">
                  <span class="glyphicon glyphicon glyphicon-ok form-control-feedback"></span>
                </div>

                <div class="form-group has-feedback"">
                  <label for="exampleInputRemarks">Remarks</label>
                  <input type="text" class="form-control" id="exampleInputRemarks" value="<?php echo $user['remarks'];?>" name="remarks">
                  <span class="glyphicon glyphicon glyphicon-star form-control-feedback"></span>
                </div>

                <div class="form-group has-feedback"">
                  <label for="exampleInputTeacherID">Teacher ID</label>
                  <input type="text" class="form-control" id="exampleInputTeacherID" value="<?php echo $user['teacher_id'];?>" name="teacher_id">
                  <span class="glyphicon glyphicon-user form-control-feedback"></span>
                </div>
                
                <?php elseif($table === 'course'):?>

                <div class="form-group has-feedback"">
                  <label for="exampleInputCourseCode">Course Code</label>
                  <input type="text" class="form-control" id="exampleInputCourseCode" value="<?php echo $user['course_code'];?>" name="course_code">
                  <span class="glyphicon glyphicon-file form-control-feedback"></span>
                </div>

                <div class="form-group has-feedback"">
                  <label for="exampleInputName">Name</label>
                  <input type="text" class="form-control" id="exampleInputName" value="<?php echo $user['name'];?>" name="name">
                  <span class="glyphicon glyphicon-bookmark form-control-feedback"></span>
                </div>
                
                <div class="form-group has-feedback"">
                  <label for="exampleInputDescription">Description</label>
                  <input type="text" class="form-control" id="exampleInputDescription" value="<?php echo $user['description'];?>" name="description">
                  <span class="glyphicon glyphicon-book form-control-feedback"></span>
                </div>

                <div class="form-group has-feedback"">
                  <label for="exampleInputGradeID">Grade ID</label>
                  <input type="text" class="form-control" id="exampleInputGradeID" value="<?php echo $user['grade_id'];?>" name="grade_id">
                  <span class="glyphicon glyphicon-tags form-control-feedback"></span>
                </div>

                <?php elseif($table === 'classroom_student'):?>

                <div class="form-group has-feedback"">
                  <label for="exampleInputStudentID">Student ID</label>
                  <input type="text" class="form-control" id="exampleInputStudentID" value="<?php echo $user['student_id'];?>" name="student_id">
                  <span class="glyphicon glyphicon-user form-control-feedback"></span>
                </div>

                <?php elseif($table === 'exam'):?>

                <div class="form-group has-feedback"">
                  <label for="exampleInputExamTypeID">Course Code</label>
                  <input type="text" class="form-control" id="exampleInputExamTypeID" value="<?php echo $user['exam_type_id'];?>" name="exam_type_id">
                  <span class="glyphicon glyphicon-file form-control-feedback"></span>
                </div>

                <div class="form-group has-feedback"">
                  <label for="exampleInputName">Name</label>
                  <input type="text" class="form-control" id="exampleInputName" value="<?php echo $user['name'];?>" name="name">
                  <span class="glyphicon glyphicon-bookmark form-control-feedback"></span>
                </div>
                
                <div class="form-group has-feedback"">
                  <label for="exampleInputStartDate">Start Date</label>
                  <input type="date" class="form-control" id="exampleInputStartDate" value="<?php echo $user['start_date'];?>" name="start_date">
                  <span class="glyphicon glyphicon-calendar form-control-feedback"></span>
                </div>

                <?php elseif($table === 'exam_type'):?>
                
                <div class="form-group has-feedback"">
                  <label for="exampleInputName">Name</label>
                  <input type="text" class="form-control" id="exampleInputName" value="<?php echo $user['name'];?>" name="name">
                  <span class="glyphicon glyphicon-bookmark form-control-feedback"></span>
                </div>
                
                <div class="form-group has-feedback"">
                  <label for="exampleInputDescription">Description</label>
                  <input type="text" class="form-control" id="exampleInputDescription" value="<?php echo $user['descr'];?>" name="description">
                  <span class="glyphicon glyphicon-file form-control-feedback"></span>
                </div>

              <?php elseif($table === 'exam_result'):?>
                
                <h3><?php echo "<b>Exam ID: </b>".$user['exam_id'];?></h3>
                <h3><?php echo "<b>Exam Type ID: </b>".$user['exam_type_id'];?></h3>
                <h3><?php echo "<b>Course ID: </b>".$user['course_id'];?></h3>

                <div class="form-group has-feedback"">
                  <label for="exampleInputMarks">Marks</label>
                  <input type="text" class="form-control" id="exampleInputMarks" value="<?php echo $user['marks'];?>" name="marks">
                  <span class="glyphicon glyphicon-bookmark form-control-feedback"></span>
                </div>
                

                <?php elseif($table === 'grade'):?>

                <div class="form-group has-feedback"">
                  <label for="exampleInputName">Name</label>
                  <input type="text" class="form-control" id="exampleInputName" value="<?php echo $user['name'];?>" name="name">
                  <span class="glyphicon glyphicon-bookmark form-control-feedback"></span>
                </div>
                
                <div class="form-group has-feedback"">
                  <label for="exampleInputDescription">Description</label>
                  <input type="text" class="form-control" id="exampleInputDescription" value="<?php echo $user['descr'];?>" name="description">
                  <span class="glyphicon glyphicon-file form-control-feedback"></span>
                </div>
                <?php endif;?>

                <?php 
                  endwhile;
                ?>
              </div>
              <!-- /.box-body -->

              <div class="box-footer">
                <button type="submit" class="btn btn-primary">Update</button>
              </div>

              <?php endif; ?>
            
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
<!-- FastClick -->
<script src="../../bower_components/fastclick/lib/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="../../dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="../../dist/js/demo.js"></script>
</body>
</html>
<?php else:
  header('Location:../../login.php?error=420');
endif;
 ?>