<?php
	session_start(); ob_start();
	include_once 'inc/db.php';
	if(isset($_POST['email']) && isset($_POST['password']) && isset($_POST['user_type']) && $_POST['password']!='' || $_POST['email']!='' || $_POST['user_type']!= ''){
		$email = $_POST['email'];
		$password = $_POST['password'];
		$user_type = $_POST['user_type'];

		$sql = "SELECT * FROM $user_type WHERE email='$email' AND password=md5('$password')";
		
		$result = $mysql->query($sql);

		/*var_dump($result);
		die();*/
		
		if(!$result){
			echo "Somethign wrong in your query\n";
			echo 'Your Erron no'.$mysql->connect_errno.'<br>';
			echo 'Your Error'.$mysql->connect_error.'<br>';
			exit;
		}
		
		if($result->num_rows === 1){
			// login successful
			$_SESSION['isLoggedIn']='yes';
			$row = $user_type."_id";
			while($user = $result->fetch_assoc()){
				$_SESSION['user_type'] = $user_type;
				$_SESSION['id']= $user[$row];
				$_SESSION['email']= $user['email'];
				$_SESSION['fname']= $user['fname'];
				$_SESSION['lname']= $user['lname'];
				$_SESSION['dob']= $user['dob'];
				$_SESSION['phone']= $user['phone'];
				$_SESSION['mobile']= $user['mobile'];
				$_SESSION['status']= $user['status'];
				$_SESSION['last_login_date']= $user['last_login_date'];
				$_SESSION['last_login_ip']= $user['last_login_ip'];
 
				header('Location: dashboard/');
					
			}	
		}
		else{

			// login unsuccesful
			header('Location: login.php?error=100');		
		}
	}
	else{
		echo 'Give right input';
	}
		
?>