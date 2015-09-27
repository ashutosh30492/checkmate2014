<?php
//output details
//'user_id' :- element
//'team_name' :- element
//'question_arry' :- array
//'point' :- element
//'multipliers_left' :- array
//'base_prices' :- array
//'multiplier' :- array //i.e. multiplier on the particular question
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
	$arr = array('user_id' => $_SESSION['user_id'],
				'team_name' => $_SESSION['team_name'],
				'question_array' => $_SESSION['question_array'],
				'point' => $_SESSION['point'],
				'multipliers_left' => $_SESSION['multipliers_left'],
				// 'base_prices' => $_SESSION['base_prices'],
				'multiplier' => $_SESSION['multiplier']
	);

	echo json_encode($arr);
?>