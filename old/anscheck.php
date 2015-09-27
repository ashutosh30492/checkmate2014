<?php
require_once 'connect.php';
connect();                                                    
?>
<?php
$qn = $_GET['qno'];
$ans = $_GET['ans'];
$question_query = "SELECT answer FROM point_question	WHERE question_no = '$qn' LIMIT 1";
$result=mysql_query($question_query);
$q_row = mysql_fetch_row($result);
if($q_row[0]==$ans){
	echo 1;
}
else{
	echo 0;
}

?>