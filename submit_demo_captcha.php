<?php
error_reporting(0);
session_start();

if(($_REQUEST['captcha'] == $_SESSION['vercode'])){
	//Here you can write your sql insert statement. 
	
	echo 1;
}else{
	echo 0;
}

?>