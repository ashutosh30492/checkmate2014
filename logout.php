<?php
//output:-
//0:- Logout is unsuccessful
//1:- Logout is successful
?>

<?php

$i=session_start();
if(!$i)
	echo 'error in session contact admin'.'<br/>';
?>

<?php
// require_once 'connect.php';
require_once 'input_verification.php';
// connect();
?>

<?php
	// if(!isset($_SESSION['username']) && empty($_SESSION['username'])) {
		// redirect_to('index.php?q=1');
	// }
?>

<?php
//destroys session
$i = session_destroy();
if(!$i){
	echo 0;
}else{
	echo 1;
}
redirect_to('index.php?q=3');
?>