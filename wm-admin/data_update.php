<?php
require_once('../api/config.php');
if(isset($_POST['data'])){
$title=$_POST['title'];
$p1=$_POST['paragraph1'];
$p2=$_POST['paragraph2'];
$tag=$_POST['tag'];
$id=$_POST['id'];
$sql="UPDATE uploads SET title='$title',paragraph1='$p1',paragraph2='$p2',tag='$tag' where id='$id'";
if($conn->query($sql)===true)
{
	echo 'yes';
}else
	echo 'no';
}
if(isset($_POST['cat'])){
$title=$_POST['title'];
$name=$_POST['name'];
$des=$_POST['description'];
$keyword=$_POST['tag'];
$id=$_POST['id'];
$sql="UPDATE category SET name='$name',title='$title',description='$des',keyword='$keyword' where id='$id'";
if($conn->query($sql)===true)
{
	echo 'yes';
}else
	echo 'no';
}
?>
