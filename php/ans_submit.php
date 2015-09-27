<?php
//input:-
//q_no,ans

//output:-
//5:- incorrect or improper input
//if correct:- [1,(a),(b),(c),(d)]
//if incorrect:- [2,(a), (b), (c),(d)]
//	a is percentage
//	b is no_sub 
//	c is no_correct
//	d:- array
//		updated_question_array
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
	$required_fields=array('q_no','ans');
	$errors = array_merge($errors, check_required_fields($required_fields));
	
	if(empty($error)){
		$qno = trim(mysql_prep($_GET['q_no']));
		$ans = trim(mysql_prep($_GET['ans']));
		
		$query = "select * from `q_bank` where `q_no` = '{$qno}' limit 1";
		$result_query = mysql_query($query);
		confirm_query($result_query);
		$question = mysql_fetch_array($result_query);
		
		$array = array();
		//checking if the answer is correct
		if($question['answer'] == $_GET['ans']){
			//answer is correct.
			
			//updating q_count
			$result_query = mysql_query("update `q_count` set `no_sub` = `no_sub`+1, `no_correct`=`no_correct`+1, `slots_left` = `slots_left`-1  where `q_no` = {$qno}");
			confirm_query($result_query);
			
			//incrementing points
			$_SESSION['question_array'][$qno-1] = '1';
			//$_SESSION['point'] = $_SESSION['point']+($question['base_price']*$_SESSION['multiplier'][$qno-1]);
			$_SESSION['point'] = $_SESSION['point']+($question['base_price']*$_SESSION['multiplier'][$qno-1]);
			
			$query_result = mysql_query("update `user_point` set `point` = '{$_SESSION['point']}', `question_array`='{$_SESSION['question_array']}' where `user_id` = {$_SESSION['user_id']}");
			confirm_query($result_query);
			
			$array['result'] = 1;
			$array['point'] = $_SESSION['point'];
			
		}else{
			//answer is wrong.
			$result_query = mysql_query("update `q_count` set `no_sub` = `no_sub`+1 where `q_no` = {$qno}");
			confirm_query($result_query);
			
			//decrementing the points
			// $_SESSION['point'] = $_SESSION['point'] - ( $question['base_price']/(6-($_SESSION['multiplier'][$qno-1])) );
			$_SESSION['point'] = $_SESSION['point'] - ( ($question['base_price']/5)*$_SESSION['multiplier'][$qno-1]);
			
			$query_result = mysql_query("update `user_point` set `point` = '{$_SESSION['point']}' where `user_id` = {$_SESSION['user_id']}");
			confirm_query($result_query);
			
			$array['result'] = 2;
			$array['point'] = $_SESSION['point'];
		}
		
		$query = "select * from `q_count` where `q_no` = '{$qno}' limit 1";
		$result_query = mysql_query($query);
		confirm_query($result_query);
		$question = mysql_fetch_array($result_query);
		
		$array['percentage'] = (($question['no_correct']*100.0)/$question['no_sub']);
		$array['no_sub'] = $question['no_sub'];
		$array['no_correct'] = $question['no_correct'];
		$array['question_array'] = $_SESSION['question_array'];
		
		echo json_encode($array);
		exit;
		
	}else{
		echo 5;
		exit;
	}
?>