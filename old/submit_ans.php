
<?php
//return reference 
//[0,(*),(*)] if the user have extended maximum number of wrong attempts for the question
//[1,(updated_point),(updated_question_array)]
//[2,(updated_wrong_attempt),(*)]
?>

<?php
$i=session_start();
require_once 'input_verification.php';
require_once 'connect.php';
connect();
?>

<?php
	$final = array();
	$errors=array();
	//Valdation
	$required_fields=array('qno','ans');
	$errors = array_merge($errors, check_required_fields($required_fields));
	
	if(empty($error)){
		$qno = $_GET['qno'];
		
		$query = "select * from `q_bank` where `q_no` = '{$qno}' limit 1";
		$result_query = mysql_query($query);
		confirm_query($result_query);
		
		$question = mysql_fetch_array($result_query);
		
		$query = "select * from user_point where user_id = '{$_SESSION['user_id']}' limit 1";
		$result_query = mysql_query($query);
		confirm_query($result_query);
		
		$user_data = mysql_fetch_array($result_query);
		//checking number of wrong attempts
		

		if($_SESSION['wrong_attempt'][$qno-1] < $question['max_wrong']){
			if($question['answer'] == $_GET['ans']){
				$result_query = mysql_query("update q_count set `no_sub` = `no_sub`+1, `no_correct`=`no_correct`+1, `slots_left` = `slots_left`-1  where `q_no` = {$qno}");
				confirm_query($result_query);
				
				$user_data['point'] = $user_data['point'] + ($question['base_price']*$_SESSION['multiplier'][$qno-1]);
				$_SESSION['question_array'][$qno-1] = '1';
				$_SESSION['point'] = $_SESSION['point']+($question['base_price']*$_SESSION['multiplier'][$qno-1]);
				
				//$query_result = mysql_query("update user_point set `point` = `point`+{$_SESSION['point']} 
				//				`question_array`='{$_SESSION['question_array']}' where `user_id` == {$user_data['user_id']}");
				$query_result = mysql_query("update user_point set `point` = {$user_data['point']},
								`question_array`='{$_SESSION['question_array']}' where `user_id` == {$user_data['user_id']}");
				confirm_query($result_query);
				
				array_push($final,1);
				array_push($final,$_SESSION['point']);
				array_push($final,$_SESSION['question_array']);
				
			}else{
				//increment no. of wrong attempts
				mysql_query("update q_count set 'no_sub' = 'no_sub'+1 where 'q_no' = {$qno}");
				$_SESSION['wrong_attempt'][$qno-1] = $_SESSION['wrong_attempt'][$qno-1] + 1;
				
				$str = "";
				foreach($_SESSION['wrong_attempt'] as $a){
					$str .= $a;
				}
				echo $str."<br/>";
				if(!mysql_query("update user_point set `wrong_attempt` = '{$str}' where `user_id`= {$user_data['user_id']}")){
					die("query execution error.<br/>".mysql_error());
				}
				
				array_push($final,2);
				array_push($final, $_SESSION['wrong_attempt']);
			}
		
		}else{
			array_push($final,0);
		}
		
		echo json_encode($final);
	}else{
		echo "data not received or improper entry.<br/>";
	}
?>