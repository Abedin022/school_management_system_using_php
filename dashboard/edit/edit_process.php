<?php
	session_start(); ob_start();
	include_once '../../inc/db.php';
	$table = $_GET['table'];
	$id = $_GET['id'];

	if($table === 'admin' || $table === 'teacher' || $table === 'student' || $table === 'parent'){
		if(isset($_POST['fname']) && isset($_POST['lname']) && isset($_POST['phone']) && isset($_POST['mobile']) && isset($_POST['dob']) && isset($_POST['new_password']) && isset($_POST['r_new_password']) && $_POST['fname']!='' || $_POST['lname']!='' || $_POST['phone']!= '' || $_POST['mobile']!='' || $_POST['dob']!='' || $_POST['new_password'] != '' || $_POST['r_new_password'] != ''){

	    	
	    	/*echo $id;
	    	die();*/
	    	$primary_key = $table."_id";
			$fname = $_POST['fname'];
			$lname = $_POST['lname'];
			$phone = $_POST['phone'];
			$dob = $_POST['dob'];
			$mobile = $_POST['mobile'];
			$new_password = $_POST['new_password'];
			$r_new_password = $_POST['r_new_password'];

			if($new_password != $r_new_password ){
				header('Location: edit_admin.php?error=200');
			}
			
			else {
				$sql = "UPDATE $table SET fname='$fname', lname='$lname', password=md5('$new_password'), dob ='$dob', phone='$phone', mobile='$mobile' WHERE $primary_key = '$id'";

				$result = $mysql->query($sql);
				
				/*var_dump($result);
				die();*/

				if(!$result){
					echo "Somethign wrong in your query\n";
					echo 'Your Erron no'.$mysql->connect_errno.'<br>';
					echo 'Your Error'.$mysql->connect_error.'<br>';
					exit;
				}
				else{

					// edit succesful
					header("Location: edit.php?notification=100&table=$table");		
				}
			}
		}
		else{
			echo 'Give right input';
		}
	}
	else if($table==='attendance'){
		if(isset($_POST['student_id']) && isset($_POST['status']) && isset($_POST['remark']) && $_POST['student_id']!='' || $_POST['status']!= '' || $_POST['remark']!=''){

			$status = $_POST['status'];
			$remark = $_POST['remark'];
			$date = $_GET['date'];

			$sql = "UPDATE attendance SET attendance_status='$status', remark='$remark' WHERE student_id='$id' and date='$date'";

			$result = $mysql->query($sql);
			
			/*var_dump($result);
			die();*/

			if(!$result){
				echo "Somethign wrong in your query\n";
				echo 'Your Erron no'.$mysql->connect_errno.'<br>';
				echo 'Your Error'.$mysql->connect_error.'<br>';
				exit;
			}
			else{

				// edit succesful
				header("Location: edit.php?notification=100&table=$table");		
			}
		}
		else{
			echo 'Give right input';
		}
	}

	else if($table==='classroom'){
		if(isset($_POST['grade_id']) && isset($_POST['room_number']) && isset($_POST['section']) && isset($_POST['status']) && isset($_POST['remarks']) && isset($_POST['teacher_id']) && $_POST['grade_id']!='' || $_POST['room_number']!='' || $_POST['section']!= '' || $_POST['status']!='' || $_POST['remarks']!='' || $_POST['teacher_id']!=''){

			$grade_id = $_POST['grade_id'];
			$room_number = $_POST['room_number'];
			$section = $_POST['section'];
			$status = $_POST['status'];
			$remarks = $_POST['remarks'];
			$teacher_id = $_POST['teacher_id'];

			$sql = "UPDATE classroom SET grade_id='$grade_id', room_number='$room_number', section ='$section', status='$status', remarks='$remarks', teacher_id = '$teacher_id' WHERE classroom_id='$id'";

			$result = $mysql->query($sql);
			
			/*var_dump($result);
			die();*/

			if(!$result){
				echo "Somethign wrong in your query\n";
				echo 'Your Erron no'.$mysql->connect_errno.'<br>';
				echo 'Your Error'.$mysql->connect_error.'<br>';
				exit;
			}
			else{

				// edit succesful
				header("Location: edit.php?notification=100&table=$table");		
			}
		}
		else{
			echo 'Give right input';
		}
	}

	else if($table==='classroom_student'){
		if(isset($_POST['student_id']) && $_POST['student_id']!=''){

			$student_id = $_POST['student_id'];

			$sql = "UPDATE classroom_student SET student_id='$student_id' WHERE classroom_student_id='$id'";

			$result = $mysql->query($sql);
			
			/*var_dump($result);
			die();*/

			if(!$result){
				echo "Somethign wrong in your query\n";
				echo 'Your Erron no'.$mysql->connect_errno.'<br>';
				echo 'Your Error'.$mysql->connect_error.'<br>';
				exit;
			}
			else{

				// edit succesful
				header("Location: edit.php?notification=100&table=$table");		
			}
		}
		else{
			echo 'Give right input';
		}
	}

	else if($table==='course'){
		if(isset($_POST['course_code']) && isset($_POST['name']) && isset($_POST['description']) && isset($_POST['grade_id']) && $_POST['course_code']!='' || $_POST['name']!= '' || $_POST['description']!='' || $_POST['grade_id']!=''){


			$course_code = $_POST['course_code'];
			$name = $_POST['name'];
			$grade_id = $_POST['grade_id'];
			$description = $_POST['description'];
			$sql = "UPDATE course SET course_code='$course_code', name = '$name', description='$description', grade_id = '$grade_id' WHERE course_id='$id'";

			$result = $mysql->query($sql);
			

			if(!$result){
				echo "Somethign wrong in your query\n";
				echo 'Your Erron no'.$mysql->connect_errno.'<br>';
				echo 'Your Error'.$mysql->connect_error.'<br>';
				exit;
			}
			else{

				// edit succesful
				header("Location: edit.php?notification=100&table=$table");		
			}
		}
		else{
			echo 'Give right input';
		}
	}

	else if($table==='exam'){
		if(isset($_POST['exam_type_id']) && isset($_POST['name']) && isset($_POST['start_date']) && $_POST['exam_id']!='' || $_POST['exam_type_id']!='' || $_POST['name']!= '' || $_POST['start_date']!=''){

			$exam_type_id = $_POST['exam_type_id'];
			$name = $_POST['name'];
			$start_date = $_POST['start_date'];

			$sql = "UPDATE exam SET exam_type_id='$exam_type_id', name = '$name', start_date = '$start_date' WHERE exam_id='$id'";

			$result = $mysql->query($sql);
			
			/*var_dump($result);
			die();*/

			if(!$result){
				echo "Somethign wrong in your query\n";
				echo 'Your Erron no'.$mysql->connect_errno.'<br>';
				echo 'Your Error'.$mysql->connect_error.'<br>';
				exit;
			}
			else{

				// edit succesful
				header("Location: edit.php?notification=100&table=$table");		
			}
		}
		else{
			echo 'Give right input';
		}
	}

	else if($table==='exam_type'){
		if(isset($_POST['name']) && isset($_POST['description']) && $_POST['name']!= '' || $_POST['description']!=''){

			$name = $_POST['name'];
			$description = $_POST['description'];

			$sql = "UPDATE exam_type SET name = '$name', descr = '$description' WHERE exam_type_id='$id'";

			$result = $mysql->query($sql);
			
			/*var_dump($result);
			die();*/

			if(!$result){
				echo "Somethign wrong in your query\n";
				echo 'Your Erron no'.$mysql->connect_errno.'<br>';
				echo 'Your Error'.$mysql->connect_error.'<br>';
				exit;
			}
			else{

				// edit succesful
				header("Location: edit.php?notification=100&table=$table");		
			}
		}
		else{
			echo 'Give right input';
		}
	}
	else if($table==='exam_result'){
		if(isset($_POST['marks']) && $_POST['marks']!= ''){

			$marks = $_POST['marks'];

			$sql = "UPDATE exam_result SET marks = '$marks' WHERE exam_result_id='$id'";

			$result = $mysql->query($sql);
			
			/*var_dump($result);
			die();*/

			if(!$result){
				echo "Somethign wrong in your query\n";
				echo 'Your Erron no'.$mysql->connect_errno.'<br>';
				echo 'Your Error'.$mysql->connect_error.'<br>';
				exit;
			}
			else{

				// edit succesful
				header("Location: edit.php?notification=100&table=$table");		
			}
		}
		else{
			echo 'Give right input';
		}
	}

	else if($table==='grade'){
		if(isset($_POST['name']) && isset($_POST['description']) && $_POST['name']!= '' || $_POST['description']!=''){

			$name = $_POST['name'];
			$description = $_POST['description'];

			$sql = "UPDATE grade SET name = '$name', descr = '$description' WHERE grade_id='$id'";

			$result = $mysql->query($sql);
			
			/*var_dump($result);
			die();*/

			if(!$result){
				echo "Somethign wrong in your query\n";
				echo 'Your Erron no'.$mysql->connect_errno.'<br>';
				echo 'Your Error'.$mysql->connect_error.'<br>';
				exit;
			}
			else{

				// edit succesful
				header("Location: edit.php?notification=100&table=$table");		
			}
		}
		else{
			echo 'Give right input';
		}
	}

?>