<?php
	session_start(); ob_start();
	include_once '../../inc/db.php';
	
	$id = $_GET['id'];
    $table = $_GET['table'];
    $row = $table."_id";

	if(isset($_POST['current_password']) && isset($_POST['new_password']) && isset($_POST['r_new_password']) && $_POST['current_password'] != '' || $_POST['new_password'] != '' || $_POST['r_new_password'] != ''){

		$current_password = $_POST['current_password'];
		$new_password = $_POST['new_password'];
		$r_new_password = $_POST['r_new_password'];
		
		$sql = "SELECT password FROM $table WHERE $row=$id";
		$result = $mysql->query($sql);

		if(!$result){
			echo "Somethign wrong in your query\n";
			echo 'Your Erron no'.$mysql->connect_errno.'<br>';
			echo 'Your Error'.$mysql->connect_error.'<br>';
			exit;
		}

		else if($result->num_rows === 1){
			while($user = $result->fetch_assoc()){
				if(md5($current_password) != $user['password']){
					header('Location: change_password.php?error=200');
				}

				else{
					if($new_password != $r_new_password ){
						header('Location: change_password.php?error=300');
					}
					else{
						$sql_2 = "UPDATE $table SET password = md5('$new_password') WHERE $row=$id";
						$result_2 = $mysql->query($sql_2);

						if(!$result_2){
							echo "Somethign wrong in your password change query\n";
							echo 'Your Erron no'.$mysql->connect_errno.'<br>';
							echo 'Your Error'.$mysql->connect_error.'<br>';
							exit;
						}

						else{
							header('Location: change_password.php?notification=100');
						}
					}		
				}

			}
		}
	}
		
?>