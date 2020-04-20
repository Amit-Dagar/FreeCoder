<?php
require_once('../api/config.php');
if(isset($_POST['data'])){
	$id=$_POST['id'];
	$sql="delete from uploads where id='$id'";
	if($conn->query($sql)===true)
	{
		echo 'yes';
	}else
		echo 'no';
}
if(isset($_POST['cat'])){
	$id=$_POST['id'];
	$sql="delete from category where id='$id'";
	if($conn->query($sql)===true)
	{
		echo 'yes';
	}else
		echo 'no';
}
?>
