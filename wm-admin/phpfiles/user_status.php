<?php
include('../../api/config.php');
$id=$_POST['id'];
$sql="SELECT * FROM users WHERE id=$id";
$result=$conn->query($sql);
while($row=$result->fetch_assoc())
{
  if($row['status']=='active')
  {
    $sql="UPDATE users SET status='deactive' where id=$id";
    if($conn->query($sql)===true)
    {
      echo 'yes';
    }
    else {
      echo 'no';
    }
  }
  else {
    $sql="UPDATE users SET status='active' where id=$id";
    if($conn->query($sql)===true)
    {
      echo 'yes';
    }
    else {
      echo 'no';
    }
  }
}
 ?>
