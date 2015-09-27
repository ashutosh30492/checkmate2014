<?php
//output:
//quesPercentage:- in array
//slotsLeft:- in array
//quesAttemptCount:- in array
//quesCorrectCount:- in array
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
	$query = "select * from q_count where 1";
	$query_result = mysql_query($query);
	confirm_query($query_result);

	$quesAttemptCount = array();
	$quesCorrectCount = array();
	$slotsLeft = array();
	$quesPercentage = array();

	while($row = mysql_fetch_array($query_result)){
		if($row['no_sub']==0){
			array_push($quesPercentage, 0);
			array_push($quesAttemptCount, $row['no_sub']);
			array_push($quesCorrectCount, $row['no_correct']);
			array_push($slotsLeft, $row['slots_left']);
		}
		else {
			array_push($quesPercentage, (($row['no_correct']*100.0)/$row['no_sub']));
			array_push($quesAttemptCount, $row['no_sub']);
			array_push($quesCorrectCount, $row['no_correct']);
			array_push($slotsLeft, $row['slots_left']);	
		}
		
	}
	
	
	$arr = array("quesPercentage" => $quesPercentage, 
				"slotsLeft" => $slotsLeft, 
				"quesAttemptCount" => $quesAttemptCount, 
				"quesCorrectCount" => $quesCorrectCount, 
			);
			
	echo json_encode($arr);
?>