<?php
//input:- 'qno','multiplier'
//output:- 'remanning multiplier' and 'question_multiplier_list'
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
	$final = array();
	$errors=array();
	//Valdation
	$required_fields=array('qno','multiplier');
	$errors = array_merge($errors, check_required_fields($required_fields));
	
	if(empty($error)){
		$final = array();
		if($_SESSION['multipliers_left']["x"."{$_GET['multiplier']}"] == 0){
				$final = array("multiplier_left" => $_SESSION['multipliers_left'],
								"multiplier" => $_SESSION['multiplier']
								);
				echo json_encode($final);
		}else{
			$_SESSION['multipliers_left']["x"."{$_GET['multiplier']}"] = $_SESSION['multipliers_left']["x"."{$_GET['multiplier']}"] - 1;
			$_SESSION['multiplier'][$_GET['qno']-1] = $_GET['multiplier'];
			$var = $_SESSION['multipliers_left']["x"."{$_GET['multiplier']}"];
			$name = "multiplier".$_GET['multiplier']."x";
			//echo $name;
			$str = "";
			foreach($_SESSION['multiplier'] as $a){
				$str .= $a;
			}
			
			//echo $str."<br/>";
			$query = "update `user_point` set `{$name}` = '{$var}', `multipliers` = '{$str}' where `user_id`= {$_SESSION['user_id']}";
			$run = mysql_query($query);
			if($run){
				// array_push($final, $_SESSION['multipliers_left']);
				// array_push($final, $_SESSION['multiplier']);
				$final = array("multiplier_left" => $_SESSION['multipliers_left'],
								"multiplier" => $_SESSION['multiplier']
								);
				// echo json_encode($final);
				
				echo json_encode($final);
				
			}else{
				echo mysql_error()."<br/>";
			}
		}
	}else{
		echo "data not received or improper entry.<br/>";
	}
?><?php
//input:- q_no,bid
//output:-
//update multipler_left and mutlipler_quesiton
?>