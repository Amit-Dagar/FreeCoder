<?php
session_start();
include 'config.php';
$data=array();
if(isset($_SESSION['user']))
{
	$id=$_SESSION['user'];
	$sql="SELECT * FROM users where id=$id";
	$result = $conn->query($sql);
	if($result->num_rows>0)
	{
		while ($row=$result->fetch_assoc()) {
			array_push($data, $row);
		}
	}
	echo json_encode($data);
}
else
{
	$data = array(array('email' => "error"));
	echo json_encode($data);
}
?>