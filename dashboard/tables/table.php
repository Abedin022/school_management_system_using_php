<?php 
  include_once '../../inc/db.php';
  session_start(); ob_start();

  $table = $_GET['table'];
  $primary_key = $table."_id";
  $user_type = $_SESSION['user_type']; 
  if(isset($_SESSION['isLoggedIn']) && $_SESSION['isLoggedIn'] ==='yes'):
?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title><?php echo $table;?></title>
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
        <li class="active"><a href="#"><?php echo $table.'s';?></a></li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title"><?php echo "All ".$table."s";?></h3>
            </div>
            <!-- /.box-header -->

            <div class="box-body">

              <?php
                if($table === 'exam_result' || $table === 'attendance'){
                  $grade_point = 0;
                  $id_1 = $_POST['id'];
                  $null_id = ($id_1 === '') ? True : False;

                  $sql_1 = "SELECT * FROM student where student_id = '$id_1'";
                  
                  $result_1 = $mysql->query($sql_1);    
                  while($user_1 = $result_1->fetch_assoc()){
                    
                    echo "<h3><b>Student ID :</b> ".$user_1['student_id']."</h3>";
                    echo "<h3><b>Name : </b>".$user_1['fname']." ".$user_1['lname']."</h3>";
                    echo "<h3><b> Grade : </b>".$user_1['grade_id']."</h3>";
                  }
                }
              ?>

              <table id="example1" class="table table-bordered table-striped">
                <thead>
                  <tr>
                    
                    <?php if(($user_type === 'admin' && !($table === 'exam_result' && $null_id === True)) || ($user_type === 'teacher' && ($table === 'attendance' || ($table === 'exam_result' && $null_id === False) ) ) ):?>
                    <?php?>
                    <th><?php echo $table." ID";?></th>
                    <?php endif;?>

                    <?php if($table === 'admin' || $table === 'teacher' || $table === 'student' || $table === 'parent' ):?>
                    
                    <th>Email</th>
                    <th>First name</th>
                    <th>Last Name</th>
                    <th>Date of Birth</th>
                    <th>Phone</th>
                    <th>Mobile</th>
                    
                    <?php elseif($table === 'attendance'):?>

                    <th>Date</th>
                    <th>Status</th>
                    <th>Remark</th>

                    <?php elseif($table === 'classroom'):?>

                    <th>Grade</th>
                    <th>Room Number</th>
                    <th>Section</th>
                    <th>Status</th>
                    <th>Remarks</th>
                    <th>Class Teacher</th>

                    <?php elseif($table === 'classroom_student'):?>

                    <th>Classroom</th>
                    <th>Student ID</th>
                    <th>First Name</th>
                    <th>Last Name</th>

                    <?php elseif($table === 'course'):?>

                    <th>Course Code</th>
                    <th>Name</th>
                    <th>Description</th>
                    <th>Grade ID</th>
                    <th>Course Teacher</th>

                    <?php elseif($table === 'exam'):?>

                    <th>Exam Type</th>
                    <th>Name</th>
                    <th>Start Date</th>

                    <?php elseif($table === 'exam_type'):?>

                    <th>Name</th>
                    <th>Description</th>

                    <?php elseif($table === 'grade'):?>
                    
                    <th>Name</th>
                    <th>Description</th>


                    <?php elseif($table === 'exam_result'):?>

                    <?php if($null_id === True):?>

                    <th>Name</th>
                    <?php
                      $grade_id = $_POST['grade'];
                      $name = $_POST['subject'];
                      if($name === 'all_subjects'){
                        $sql_2 = "SELECT * FROM course where grade_id = '$grade_id'";
                      }else{
                        $sql_2 = "SELECT * FROM course where grade_id = '$grade_id' and name = '$name'";
                      }
                      $result_2 = $mysql->query($sql_2);
                      $course_code = array();    
                      while($user_2 = $result_2->fetch_assoc()){
                    ?>
                    <th>
                      <?php 
                      array_push($course_code, $user_2['course_id']);
                      echo $user_2['name'];
                      ?>
                    </th>
                    <?php }?>
                    
                    <?php else:?>
                    <th>Course ID</th>
                    <th>Course Name</th>
                    <th>Marks</th>
                    <th>Grade</th>
                    <?php endif;?>
                    <?php endif;?>
            
                    
                    <?php if(($user_type === 'admin') || ($user_type === 'teacher' && ($table === 'attendance' || ($table === 'exam_result' && $null_id === False)))):?>
                    <th></th>
                    <th></th>
                    <th></th>

                    <?php elseif($user_type === 'teacher' && $table === 'student'):?>
                    <th></th>
                    <?php endif;?>
                  </tr>
                </thead>
                <tbody>
                    <?php 

                      if($table === 'admin' || $table === 'teacher' || $table === 'student' || $table === 'parent' || $table === 'exam' || $table === 'exam_type' || $table === 'grade'){
                        $sql = "SELECT * FROM $table";
                      }

                      else if($table === 'attendance'){
                        if(isset($_POST['id'])) {
                          
                          $id = $_POST['id'];

                          $null_id = ($id === '') ? True : False;

                          if($id != ''){

                            if(isset($_POST['date']) && $_POST['date']!=''){

                              $date = $_POST['date'];
                              if($user_type === 'parent' && isset($_GET['id'])){
                                $id= $_GET['id'];
                                $sql = "SELECT * FROM attendance LEFT JOIN student USING(student_id) where date='$date' and parent_id='$id'";
                              }

                              else if($user_type === 'student' && isset($_GET['id'])){
                                $id= $_GET['id'];
                                $sql = "SELECT * FROM attendance LEFT JOIN student USING(student_id) where date='$date' and student_id='$id'";
                              }

                              else{
                                $sql = "SELECT * FROM attendance a LEFT JOIN student s USING(student_id) where date='$date' and student_id='$id'";
                              }
                            }

                            else if(isset($_POST['month']) && $_POST['month']!=''){

                              $month = $_POST['month'];

                              if($user_type === 'parent' && isset($_GET['id'])){
                                $id= $_GET['id'];
                                $sql = "SELECT * FROM attendance LEFT JOIN student USING(student_id) where MONTH(date)='$month' and parent_id='$id'";
                              }

                              else if($user_type === 'student' && isset($_GET['id'])){
                                $id= $_GET['id'];
                                $sql = "SELECT * FROM attendance LEFT JOIN student USING(student_id) where MONTH(date)='$month' and student_id='$id'";
                              }

                              else{
                                $sql = "SELECT * FROM attendance a LEFT JOIN student s USING(student_id) where MONTH(date)='$month' and student_id='$id'";
                              }
                            }
                          }

                          else {
                            if(isset($_POST['date']) && $_POST['date']!=''){

                              $date = $_POST['date'];
                              $sql = "SELECT * FROM attendance LEFT JOIN student USING(student_id) where date='$date'";
                            }

                            else if(isset($_POST['month']) && $_POST['month']!=''){

                              $month = $_POST['month'];
                              $sql = "SELECT * FROM attendance LEFT JOIN student USING(student_id) where MONTH(date)='$month'";
                            }
                          }
                        }

                      }

                      else if($table === 'classroom'){
                        
                        if ($user_type === 'teacher' && isset($_GET['id'])) {
                          $id = $_GET['id'];
                          $sql = "SELECT * FROM classroom where teacher_id='$id'";
                        }

                        else{
                          $sql = "SELECT * FROM classroom LEFT JOIN teacher USING(teacher_id)";
                        }
                      }

                      else if($table === 'classroom_student'){
                        if ($_SESSION['user_type'] === 'student' && isset($_GET['id'])) {
                          $id = $_GET['id'];
                          $sql = "SELECT * FROM classroom_student LEFT JOIN student USING(student_id) where student_id='$id'";
                        }

                        else if ($_SESSION['user_type'] === 'parent' && isset($_GET['id'])) {
                          $id = $_GET['id'];
                          $sql = "SELECT * FROM classroom_student LEFT JOIN student USING(student_id) where parent_id='$id'";
                        }

                        else {
                          $sql = "SELECT * FROM classroom_student LEFT JOIN student USING(student_id)";   
                        }
                      }

                      else if($table === 'course'){
                        if(isset($_POST['grade']) && $_POST['grade']!=''){
                          $grade_id = $_POST['grade'];
                          $sql = "SELECT * FROM course LEFT JOIN teacher USING(teacher_id) WHERE grade_id='$grade_id'";
                        }
                      }

                      else if($table === 'exam_result'){

                        if(isset($_POST['student_id']) && $_POST['student_id']!=''){
                          $id = $_POST['student_id'];
                          $sql = "SELECT * FROM exam_result e LEFT JOIN student s USING(student_id) WHERE student_id='$id'";
                        }

                        else if(isset($_POST['year']) && isset($_POST['term']) && isset($_POST['grade']) && isset($_POST['subject']) && isset($_POST['id']) && $_POST['year']!='' || $_POST['term']!= '' || $_POST['grade']!='' || $_POST['subject']!='') {
                          
                          $year = $_POST['year'];
                          $term = $_POST['term'];
                          $student_id = $_POST['id'];
                          $name = $_POST['subject'];
                          $grade_id = $_POST['grade'];
                          $exam_id = $year."0".$term;

                          if($student_id != ''){
                            if($name === 'all_subjects'){

                              $sql = "SELECT * FROM exam_result e LEFT JOIN student s USING(student_id) LEFT JOIN course c USING(course_id) WHERE exam_id='$exam_id' and e.grade_id='$grade_id' and s.student_id = '$student_id'";
                            }
                            else{
                              $sql = "SELECT * FROM exam_result e LEFT JOIN student s USING(student_id) LEFT JOIN course c USING(course_id) WHERE exam_id='$exam_id' and e.grade_id='$grade_id' and c.name='$name' and s.student_id = '$student_id'";
                            }
                          }
                          else{
                            
                            $sql = "SELECT * FROM student where grade_id='$grade_id'";
                          }
                          
                        }
                      }

                      $result = $mysql->query($sql);
                      
                      if(!$result){
                        echo "Somethign wrong in your query\n";
                        echo 'Your Erron no'.$mysql->connect_errno.'<br>';
                        echo 'Your Error'.$mysql->connect_error.'<br>';
                        exit;
                      }
                      while($user = $result->fetch_assoc()):
                    ?>
                  <tr>
                    
                    <?php if(($user_type === 'admin'  && !($table === 'exam_result' && $null_id === True)) || ($user_type === 'teacher' && ($table === 'attendance' || ($table === 'exam_result' && $null_id === False) ))):?>
                    <td><?php echo $user[$primary_key];?></td>
                    <?php endif;?>

                    <?php if($table === 'admin' || $table === 'teacher' || $table === 'student' || $table === 'parent'):?>

                    <td><?php echo $user['email'];?></td>
                    <td><?php echo $user['fname'];?></td>
                    <td><?php echo $user['lname'];?>
                    </td>
                    <td><?php echo $user['dob'];?></td>
                    <td><?php echo $user['phone'];?></td>
                    <td><?php echo $user['mobile'];?></td>
                    
                    <?php if($user_type === 'admin'):?>
                    
                    <td><a href="../details/details.php?id=<?php echo $user[$primary_key];?>&table=<?php echo $table;?>"><button type="button" class="btn btn-primary">View Details</button></a></td>
                    
                    <?php elseif($user_type === 'teacher' && $table === 'student'):?>
                    <td><a href="../report/report.php?id=<?php echo $user['parent_id'];?>"><button type="button" class="btn btn-info">Report</button></a></td>
                    
                    <?php endif;?>

                    <?php elseif($table === 'attendance'):?>

                    <td><?php echo $user['date'];?></td>

                    <?php if($null_id === True):?>
                    <td><?php echo $user['fname']." ".$user['lname'];?></td>
                    <?php endif;?>

                    <td>
                      <?php 
                      $status =  ($user['attendance_status'] === '1') ? 'Present' : 'Absent';
                      echo $status;
                      ?>
                        
                    </td>
                    <td><?php echo $user['remark'];?></td>
                    
                    <?php elseif($table === 'classroom'):?>

                    <td><?php echo $user['grade_id'];?></td>
                    <td><?php echo $user['room_number'];?></td>
                    <td><?php echo $user['section'];?>
                    </td>
                    <td>
                      <?php 
                        $status = ($user['status'] === '1') ? 'Active' : 'Inactive';
                        echo $status;
                      ?>
                      
                    </td>
                    <td><?php echo $user['remarks'];?></td>
                    <td><?php echo $user['fname']." ".$user['lname'];?></td>

                    <?php elseif($table === 'classroom_student'):?>
                    
                    <td><?php echo $user['classroom_id'];?></td>
                    <td><?php echo $user['student_id'];?></td>
                    <td><?php echo $user['fname'];?></td>
                    <td><?php echo $user['lname'];?></td>

                    <?php elseif($table === 'course'):?>

                    <td><?php echo $user['course_code'];?></td>
                    <td><?php echo $user['name'];?></td>

                    <td><?php echo $user['description'];?></td>
                    <td><?php echo $user['grade_id'];?></td>
                    <td><?php echo $user['fname']." ".$user['lname'];?></td>

                    <?php elseif($table === 'exam'):?>

                    <td><?php echo $user['exam_type_id'];?></td>
                    <td><?php echo $user['name'];?></td>
                    <td><?php echo $user['start_date'];?></td>

                    <?php elseif($table === 'exam_type'):?>

                    <td><?php echo $user['name'];?></td>
                    <td><?php echo $user['descr'];?></td>

                    <?php elseif($table === 'exam_result'):?>
                    
                    <?php if($null_id === True):?>

                    <td><?php echo $user['fname']." ".$user['lname'];?></td>
                    
                    <?php 
                      $cc = 0;
                      $s_id = $user['student_id'];
                      
                      /*echo $s_id."<br>".$c_id."<br>".$exam_id."<br>".$grade_id."<br>";
                      exit;*/
                      while($cc < count($course_code)){
                        $c_id = $course_code[$cc];
                        $cc+=1;

                        $sql_1 = "SELECT marks FROM exam_result WHERE exam_id='$exam_id' and grade_id='$grade_id' and course_id='$c_id' and student_id = '$s_id'";

                        $result_1 = $mysql->query($sql_1);
                        while($user_1 = $result_1->fetch_assoc()):
                    ?>
                    <td><?php echo $user_1['marks'];?></td>

                    <?php 
                      endwhile;
                      }
                    ?>

                    <?php else:?>
                    
                    <td><?php echo $user['course_id'];?></td>
                    <td><?php echo $user['name'];?></td>
                    
                    <td><?php echo $user['marks'];?></td>
                    <td>
                      <?php 
                        if ($user['marks']< 40){
                          echo 'F';
                        }
                        elseif ($user['marks']>= 40 && $user['marks']<=49){
                          echo 'C';
                          $grade_point += 1;
                        }
                        elseif ($user['marks']>= 50 && $user['marks']<=59){
                          echo 'B';
                          $grade_point += 2;
                        }
                        elseif ($user['marks']>= 60 && $user['marks']<=69){
                          echo 'B+';
                          $grade_point += 3;
                        }
                        elseif ($user['marks']>= 70 && $user['marks']<=79){
                          echo 'A';
                          $grade_point += 4;
                        }
                        elseif ($user['marks']>= 80 && $user['marks']<=100){
                          echo 'A+';
                          $grade_point += 5;
                        }
                      ?>
                    </td>
                    <?php endif;?>
                    <?php elseif($table === 'grade'):?>
                    
                    <td><?php echo $user['name'];?></td>
                    <td><?php echo $user['descr'];?></td>
                    
                    <?php endif;?>
                    
                    <?php if(($user_type === 'admin'  && !($table === 'exam_result' && $null_id === True)) || ($user_type === 'teacher' && ($table === 'attendance' || ($table === 'exam_result' && $null_id === False)))):?>
                    
                    <td>
                      <div class="btn-group">
                        <button type="button" class="btn btn-warning btn-sm dropdown-toggle" data-toggle="dropdown">
                            Action <span class="caret"></span>
                        </button>
                        <ul class="dropdown-menu dropdown-default pull-right" role="menu">
                          <li>
                            <a href="../edit/edit.php?id=<?php echo $user[$primary_key];?>&table=<?php echo $table;?>">Edit
                            </a>
                          </li>
                            <li class="divider"></li>

                            <li>
                              <a href="../delete/delete.php?id=<?php echo $user[$primary_key];?>&table=<?php echo $table;?>">Delete</a>
                            </li>
                        </ul>
                      </div>
                    </td>
                    <?php endif;?>

                  </tr>
                  <?php endwhile; ?>                
                </tbody>
                <tfoot>
                  <tr>

                    <?php if(($user_type === 'admin' && !($table === 'exam_result' && $null_id === True)) || ($user_type === 'teacher' && ($table === 'attendance' || ($table === 'exam_result' && $null_id === False) ) ) ):?>
                    <th><?php echo $table." ID";?></th>
                    <?php endif;?>

                    <?php if($table === 'admin' || $table === 'teacher' || $table === 'student' || $table === 'parent'):?>

                    <th>Email</th>
                    <th>First name</th>
                    <th>Last Name</th>
                    <th>Date of Birth</th>
                    <th>Phone</th>
                    <th>Mobile</th>
                    
                    <?php elseif($table === 'attendance'):?>

                    <th>Date</th>
                    <th>Status</th>
                    <th>Remark</th>

                    <?php elseif($table === 'classroom'):?>

                    <th>Grade ID</th>
                    <th>Room Number</th>
                    <th>Section</th>
                    <th>Status</th>
                    <th>Remarks</th>
                    <th>Teachers</th>

                    <?php elseif($table === 'classroom_student'):?>

                    <th>Classroom ID</th>
                    <th>Student ID</th>
                    <th>First Name</th>
                    <th>Last Name</th>

                    <?php elseif($table === 'course'):?>

                    <th>Course Code</th>
                    <th>Name</th>
                    <th>Description</th>
                    <th>Grade ID</th>
                    <th>Course Teacher</th>

                    <?php elseif($table === 'exam'):?>

                    <th>Exam Type ID</th>
                    <th>Name</th>
                    <th>Start Date</th>

                    <?php elseif($table === 'exam_type'):?>

                    <th>Name</th>
                    <th>Description</th>

                    <?php elseif($table === 'exam_result'):?>

                    <?php if($null_id === True):?>

                    <th>Name</th>

                    <?php
                      $grade_id = $_POST['grade'];
                      $name = $_POST['subject'];
                      if($name === 'all_subjects'){
                        $sql_2 = "SELECT * FROM course where grade_id = '$grade_id'";
                      }else{
                        $sql_2 = "SELECT * FROM course where grade_id = '$grade_id' and name = '$name'";
                      }
                      $result_2 = $mysql->query($sql_2);    
                      while($user_2 = $result_2->fetch_assoc()){
                    ?>

                    <th><?php echo $user_2['name']?></th>
                    <?php }?>
                    
                    <?php else:?>
                    <th>Course ID</th>
                    <th>Course Name</th>
                    <th>Marks</th>
                    <th>Grade</th>
                    <?php endif;?>

                    <?php elseif($table === 'grade'):?>
                    
                    <th>Name</th>
                    <th>Description</th>

                    <?php endif;?>

                    <th></th>

                    <?php if(($user_type === 'admin'  && !($table === 'exam_result' && $null_id === True)) || ($user_type === 'teacher' && ($table === 'attendance' || ($table === 'exam_result' && $null_id === False)))):?>
                    <th></th>
                    <th></th>

                    <?php endif;?>
                  </tr>
                </tfoot>
              </table>

              <?php
                if($table === 'exam_result' && $name === 'all_subjects' && $student_id != ''){

                  $gpa = $grade_point /  $result->num_rows;

                  if ($gpa < 1)
                    echo '<h3>Grade Average : F</h3>';
                  elseif ($gpa >= 1 && $gpa < 2 )
                    echo '<h3>Grade Average : C</h3>';
                  elseif ($gpa >= 2 && $gpa < 3 )
                    echo '<h3>Grade Average : B</h3>';
                  elseif ($gpa >= 3 && $gpa < 4 )
                    echo '<h3>Grade Average : B+</h3>';
                  elseif ($gpa >= 4 && $gpa < 5 )
                    echo '<h3>Grade Average : A</h3>';
                  elseif ($gpa == 5)
                    echo '<h3>Grade Average : A+</h3>';

                }
              ?>

              <a href="../index.php"><button type="button" class="btn btn-primary">Back To Dashboard</button></a>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
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