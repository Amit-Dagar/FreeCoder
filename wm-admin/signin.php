<?php
session_start();if(isset($_POST['password'])){
require_once('../api/config.php');
$pass=md5($_POST['password']);
$email=md5($_POST['email']);
$sql="select * from admin where name='$email' AND code='$pass'";
$result=$conn->query($sql);
if($result->num_rows>0)
{
	echo 'yes';
	$_SESSION['webmaster']=$email;
}else{
	echo 'no';}}
?>
