<?php
include('../api/config.php');
$ip=$_SERVER['REMOTE_ADDR'];
$sql="SELECT ip FROM counter WHERE ip='$ip'";
$result=$conn->query($sql);
if($result->num_rows>0)
{
}
else {
  $sql="INSERT INTO counter(ip,posted) VALUES('$ip',now())";
  if($conn->query($sql)===true)
  {

  }
}
?>
<footer class="footer">
    2018 © Freecoder.in
</footer>
