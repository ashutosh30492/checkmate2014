<?php
//1: error
//0: done
//2: partial error danger user in for login
//	but not for game.
?>

<?php
$i=session_start();
require_once 'input_verification.php';
require_once 'connect.php';
connect();
?>

<?php
	if(isset($_GET['team_name']) && !empty($_GET['pass'])){
		$errors=array();
		//Valdation
		// $required_fields=array('team_name','pass','name1','name2','email1','email2','phone1','phone2');
		$required_fields=array('team_name','pass','name1','email1','phone1');
		$errors = array_merge($errors, check_required_fields($required_fields));
	
		if(empty($error)){
			$password = trim(mysql_prep($_GET['pass']));
			$team_name = trim(mysql_prep($_GET['team_name']));
			$name1 = trim(mysql_prep($_GET['name1']));
			if(isset($name2))
				$name2 = trim(mysql_prep($_GET['name2']));
			else
				$name2 = NULL;
			$phone1 = trim(mysql_prep($_GET['phone1']));
			if(isset($phone2))
				$phone2 = trim(mysql_prep($_GET['phone2']));
			else
				$phone2 = NULL;
			$email1 = trim(mysql_prep($_GET['email1']));
			if(isset($email2))
				$email2 = trim(mysql_prep($_GET['email2']));
			else
				$email2 = NULL;
			
			// echo $password;
			// echo "<br/>";
			// echo $team_name;
			// echo "<br/>";
			// echo $name1;
			// echo "<br/>";
			// echo $name2;
			// echo "<br/>";
			// echo $phone1;
			// echo "<br/>";
			// echo $phone2;
			// echo "<br/>";
			// echo $email1;
			// echo "<br/>";
			// echo $email2;
			// echo "<br/>";
			
			
			$query1 = "INSERT INTO  `user_details` (
				`user_id`, `team_name` , `name1`, `name2` ,
				`phone1`, `phone2`, `email1`, `email2`,
				`password`) 
				VALUES (NULL ,  '{$team_name}',  
				'{$name1}',  '{$name2}',  '{$phone1}',  '{$phone2}',  
				'{$email1}',  '{$email2}',  '{$password}')";
		
			// echo "<br/>";
			// echo $query1;
			
			$query2 = "select user_id from `user_details` 
					where `team_name` = '{$team_name}' AND 
					`name1` LIKE '{$name1}' AND 
					`phone1` LIKE '{$phone1}' AND 
					`password` = '{$password}'";
			// echo $query2;
			
			$query_run1 = mysql_query($query1);
			if($query_run1){
				
				//	echo "inserted";
				$query_run2 = mysql_query($query2);
				$user_id1;
				if($query_run2){
					$result2 = mysql_fetch_array($query_run2);
					// print_r($result2);
					$user_id1 = $result2['user_id'];
				}else{
					echo 1;
					echo mysql_error();
					// echo mysql_error();
					redirect_to('./index.php?q=1&p=r');
				}
				//need to change the multipliers here
				$query3 = "INSERT INTO `user_point` (`user_id`,`question_array`,`point`,`multipliers`,`multiplier2x`,`multiplier3x`,`multiplier4x`,`multiplier5x`) VALUES ('{$user_id1}','0000000000000000000000000000000000000000','0','0000000000000000000000000000000000000000','20','16','9','5')";
				$query_run3 = mysql_query($query3);
				
				if($query_run3){
					// echo "inserted.<br/>";
					echo 0;
					redirect_to('./index.php');
				}else{
					// echo mysql_error();
					$query4 = "DELETE FROM `user_details`
							WHERE user_id = '{$user_id1}'";
					$query_run4 = mysql_query($query4);
					
					if($query_run4){
						// echo "true.<br/>";
						echo 2;

						redirect_to('./index.php?q=1&p=r');
					}
				}
			}else{
				echo 12;
				echo mysql_error();
				// echo mysql_error();
				redirect_to('./index.php?q=1&p=r');
			}
		}
	}else{
		echo "userid or passsword left blank.<br/>";
		exit;
	}
?>