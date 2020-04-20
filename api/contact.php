<?php
include "config.php";
echo $_GET['email'];
// if(isset($_POST['email'])) 
// {
// 	$email = $_POST['email'];
// 	$message  = $_POST['message'];
// 	$sql = "INSERT INTO contact(email,message,post_date) VALUES('$email','$message',now())";
// 	if($conn->query($sql) === true)
// 	{
// 		echo 1;
// 	}
// 	else
// 	{
// 		echo 2;
// 	}
// }
?>