<?php
//input:-'team_name', 'pass'
//output details
//5:- if input is empty or is not in proper format
//2:- login verification failed
//1:- login verified
?>

<?php
$i=session_start();
if(!$i)
	echo 'error in session contact admin'.'<br/>';
?>

<?php
require_once 'input_verification.php';
require_once 'connect.php';
connect();
?>

<?php
	$errors=array();
	//Valdation
	$required_fields=array('team_name', 'pass');
	$errors = array_merge($errors, check_required_fields($required_fields));
	
	if(empty($errors)){
		$username = trim(mysql_prep($_GET['team_name']));
		$password = trim(mysql_prep($_GET['pass']));
		//$hashed_password=md5($password);
		$hashed_password=($password);
		
		//checking database
		$query = "SELECT `user_id`, `team_name`, `password`
				  FROM `user_details`
				  WHERE `team_name` = '{$username}'
				  AND `password` = '{$hashed_password}'
				  LIMIT 1";
		$result_set = mysql_query($query);
		if(!$result_set){
			echo 2;
			exit;
		}
		
		$found_user = mysql_fetch_array($result_set);
		if(!$found_user){
			echo 2;
			exit;
		}
		
		$query = "SELECT * 
				  FROM `user_point`
				  WHERE `user_id` = '{$found_user['user_id']}'
				  LIMIT 1";
		$result_set_1 = mysql_query($query);
		confirm_query($result_set_1);
		
		$found_user_point = mysql_fetch_array($result_set_1);
		
		
		//initializing session variables
		$_SESSION['user_id'] = $found_user['user_id'];
		$_SESSION['team_name'] = $found_user['team_name'];
		$_SESSION['question_array'] = $found_user_point['question_array'];
		$_SESSION['point'] = $found_user_point['point'];
		
		$_SESSION['multipliers_left'] = array(
			'x2' => $found_user_point['multiplier2x'],
			'x3' => $found_user_point['multiplier3x'],
			'x4' => $found_user_point['multiplier4x'],
			'x5' => $found_user_point['multiplier5x']
		);
		
		$_SESSION['multiplier'] = array();
				
		for($i=0;$i<40;$i=$i+1){
			array_push($_SESSION['multiplier'],$found_user_point['multipliers'][$i]);
		}
		//setting base prices
		$_SESSION['base_prices'] = array();
		$query = "select * from q_bank where 1";
		$result_set_2 = mysql_query($query);
		confirm_query($result_set_2);
		
		while($found_questions = mysql_fetch_array($result_set_2)){
			//echo $found_questions['q_no'] . " " . $found_questions['base_price'] . "<br/>";
			$_SESSION['base_prices'][$found_questions['q_no']] = $found_questions['base_price'];
		}
		
		//if any of the session variable not set page dies
		if(!isset($_SESSION['user_id'])) {die("error 110");}
		if(!isset($_SESSION['point'])) {die("error 112");}
		if(!isset($_SESSION['team_name'])) {die("error 113");}
		if(!isset($_SESSION['question_array'])) {die("error 114");}
		if(!isset($_SESSION['multiplier'])) {die("error 115");}
		if(!isset($_SESSION['multipliers_left'])) {die("error 116");}
		if(!isset($_SESSION['base_prices'])) {die("error 117");}
		
		echo 1;
		exit;
		
	}else{
		echo 5;
	}
	
?>