<?php
//input:-qno via get method
//output:
//2:- incorrect input format
//if input format is correct then
//qno -> question number
//level -> level of the question
//content -> the actual contained of the question
//base_price -> the base price of the question
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
	$required_fields=array('qno');
	$qno = trim(mysql_prep($_GET['qno']));
	$errors = array_merge($errors, check_required_fields($required_fields));
	
	if(empty($errors)){
		$query = "select * from `q_bank` where `q_no` = {$qno}";
		$result_set = mysql_query($query);
		confirm_query($result_set);
		
		$question = mysql_fetch_array($result_set);
		
		$array = array(
			'qno' => $question['q_no'],
			'level' => $question['level'],
			'content' => $question['q_content'],
			'base_price' => $question['base_price']
		);
		
		echo json_encode($array);
		exit;
	}else{
		echo 2;
		exit;
	}
?>



<?php
//$qn = $_GET['qno'];
//$question_query = "SELECT * FROM point_question	WHERE question_no = '$qn' LIMIT 1";
//$result=mysql_query($question_query);
//$q_row = mysql_fetch_row($result);
//echo json_encode($q_row);
?>
