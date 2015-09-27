
<?php
require_once 'connect.php';
connect();                                                    
?>
<?php
$qn = $_GET['qno'];
$question_query = "SELECT * FROM point_question	WHERE question_no = '$qn' LIMIT 1";
$result=mysql_query($question_query);
$q_row = mysql_fetch_row($result);
echo json_encode($q_row);
?>
