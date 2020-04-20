<?php
include('../../api/config.php');
$id=$_POST['id'];
$sql="SELECT * FROM articles WHERE id=$id";
$result=$conn->query($sql);
while($row=$result->fetch_assoc())
{
  if($row['article_status']==1)
  {
    $sql="UPDATE articles SET article_status=2 where id=$id";
    if($conn->query($sql)===true)
    {
      echo 'yes';
    }
    else {
      echo 'no';
    }
  }
  else {
    $sql="UPDATE articles SET article_status=1 where id=$id";
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
