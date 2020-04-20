<?php
include('../../api/config.php');
$id=$_POST['id'];
$sql="SELECT * FROM requirements WHERE id=$id";
$result=$conn->query($sql);
while($row=$result->fetch_assoc())
{
  if($row['action']=='Resolved')
  {
    $sql="UPDATE requirements SET action='Pending' where id=$id";
    if($conn->query($sql)===true)
    {
      echo 'yes';
    }
    else {
      echo 'no';
    }
  }
  else {
    $sql="UPDATE requirements SET action='Resolved' where id=$id";
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
