<?php
require_once('../api/config.php');
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
<script async src="/js/googletagmanager.js?id=UA-131792924-1"></script>
<script>
    window.dataLayer = window.dataLayer || [];

    function gtag() {
        dataLayer.push(arguments);
    }
    gtag('js', new Date());

    gtag('config', 'UA-131792924-1');
</script>
            <footer class="footer">
                2019 © All Right Reserved by freecoder.in
            </footer>
			<script type="text/javascript" src="https://cdn.ywxi.net/js/1.js" async></script>
