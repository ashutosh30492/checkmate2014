<?php
$i=session_start();
require_once 'input_verification.php';
require_once 'connect.php';
connect();
?>

<?php
if(isset($_GET['team_name']) && !empty($_GET['pass'])){
	$final = array();
	$errors=array();
	//Valdation
	$required_fields=array('team_name','pass','name1','name2','email1','email2','phone1','phone2');
	$errors = array_merge($errors, check_required_fields($required_fields));
	
	if(empty($error)){
		$password = trim(mysql_prep($_GET['pass']));
		$team_name = trim(mysql_prep($_GET['team_name']));
		$name1 = trim(mysql_prep($_GET['name1']));
		$name2 = trim(mysql_prep($_GET['name2']));
		$phone1 = trim(mysql_prep($_GET['phone1']));
		$phone2 = trim(mysql_prep($_GET['phone2']));
		$email1 = trim(mysql_prep($_GET['email1']));
		$email2 = trim(mysql_prep($_GET['email2']));
		
		
		
		$query1 = "INSERT INTO  `user_details` (
				`user_id` ,
				`team_name` ,
				`name1` ,
				`name2` ,
				`phone1` ,
				`phone2` ,
				`email1` ,
				`email2` ,
				`password`
				)
				VALUES (
				NULL ,  '{$team_name}',  '{$name1}',  '{$name2}',  {$phone1},  {$phone2},  '{$email1}',  '{$email2}',  '{$password}')";
		
		$query2 = "INSERT INTO `user_point` (`user_id`,`question_array`,`point`,`multipliers`,`multiplier2x`,`multiplier3x`,`multiplier4x`,`multiplier5x`) VALUES (NULL,0000000000000000000000000000000000000000,0,0000000000000000000000000000000000000000,20,16,9,5)";
		
		//$run = mysql_query($query1);
		$run = 1;
		if($run){
			// if(!mysql_query($query2)){
			// 	$query3 = "DELETE FROM `user_details`
			// 			WHERE user_id IN (select user_id from `user_details` 
			// 							where `team_name` = $team_name AND `name1` LIKE '{$name1}' AND `name2` LIKE '{$name2}' AND `password` = '{$password}'
			// 			)";
			// 	mysql_query($query3);
			// 	echo mysql_error();
			// 	echo 1;
			// 	sleep(3000);
			// }
			// echo mysql_error();
			// echo 'Redirecting to index.php';
			// echo '<br />Login here with teamname as username';
			// sleep(3000);
			// redirect_to('index.php');
		}
	}
	else{
		echo "some error occurred.<br/>";
	}
}else{
	echo "team name or password left blank.<br/>";
}

?>