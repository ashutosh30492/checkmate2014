<?php
//output:-
//0:- Logout is unsuccessful
//1:- Logout is successful
?>

<?php
session_start();
//destroys session
$i = session_destroy();
if(!$i){
	echo 0;
}else{
	echo 1;
}
?>