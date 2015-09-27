<?php
$i=session_start();
if(!$i)
	echo 'error in session contact admin'.'<br/>';
?>

<?php
require_once 'input_verification.php';
require_once 'connect.php';
connect();

if(isset($_GET['team_name']) && !empty($_GET['pass'])){
		
		$errors=array();
		//Valdation
		$required_fields=array('team_name', 'pass');
		$errors = array_merge($errors, check_required_fields($required_fields));
		$username = trim(mysql_prep($_GET['team_name']));
		$password = trim(mysql_prep($_GET['pass']));
		//$hashed_password=md5($password);
		$hashed_password=($password);
		if(empty($errors)){
			//checking database
			$query = "SELECT user_id, team_name, password
					  FROM checkmate14.user_details
					  WHERE team_name = '{$username}'
					  AND password = '{$hashed_password}'
					  LIMIT 1";
			$result_set = mysql_query($query);
			confirm_query($result_set);
				// username/password authenticated
				// and only 1 match
			
				$found_user = mysql_fetch_array($result_set);
			
			$query = "SELECT * 
					  FROM user_point
					  WHERE user_id = '{$found_user['user_id']}'
					  LIMIT 1";
				$result_set_1 = mysql_query($query);
				confirm_query($result_set_1);
				
				$found_user_point = mysql_fetch_array($result_set_1);
				
				$_SESSION['user_id'] = $found_user['user_id'];
				$_SESSION['team_name'] = $found_user['team_name'];
				$_SESSION['question_array'] = $found_user_point['question_array'];
				$_SESSION['point'] = $found_user_point['point'];

				$_SESSION['multiplier'] = array();
				$_SESSION['wrong_attempt'] = array();
				
				for($i=0;$i<40;$i=$i+1){
					array_push($_SESSION['multiplier'],$found_user_point['multipliers'][$i]);
				}
				//print_r($_SESSION['multiplier']);
				$_SESSION['multipliers_left'] = array(
					'x2' => $found_user_point['multiplier2x'],
					'x3' => $found_user_point['multiplier3x'],
					'x4' => $found_user_point['multiplier4x'],
					'x5' => $found_user_point['multiplier5x']
				);
				//print_r($_SESSION['multipliers_left']);
				for($i=0;$i<40;$i=$i+1){
					array_push($_SESSION['wrong_attempt'],$found_user_point['wrong_attempt'][$i]);
				}
				
				if(!isset($_SESSION['user_id'])) {die("error 110");}
				if(!isset($_SESSION['point'])) {die("error 112");}
				if(!isset($_SESSION['team_name'])) {die("error 113");}
				if(!isset($_SESSION['question_array'])) {die("error 114");}
				if(!isset($_SESSION['multiplier'])) {die("error 115");}
				if(!isset($_SESSION['wrong_attempt'])) {die("error 116");}
				if(!isset($_SESSION['multipliers_left'])) {die("error 117");}
				
				//echo "success"."<br/>";
				//redirect_to("game.php");
				
				$final = array(
					"user_id" => $_SESSION['user_id'],
					"points" => $_SESSION['point'],
					"team_name" => $_SESSION['team_name'],
					"question_array" => $_SESSION['question_array'],
					"multiplier" => $_SESSION['multiplier'],
					"wrong_attempt" => $_SESSION['wrong_attempt'],
					"multipliers_left" => $_SESSION['multipliers_left']
				);
				
				echo json_encode($final);
		}
		else{
			echo 'error occurred. <br/>' ;
		}
	}else{
	echo "data not received"."<br/>";
}
?>