<?php

$review = $_GET['review'];

$ip = $_SERVER['REMOTE_ADDR'];

$search_key = $_GET['search_key'];

include 'config.php';

$sql="SELECT review FROM review WHERE ip_address='$ip' AND search_key='$search_key'";

$result=$conn->query($sql);

if($result->num_rows>0)

{

	while ($row=$result->fetch_assoc()) {

		echo 3;

	}

}

else

{

	$sql="INSERT INTO review(search_key,ip_address,review) VALUES('$search_key','$ip','$review')";

	if($conn->query($sql) === true)

	{
		if($review == 1)
		{
			echo 1;
		}
		else
			echo 2;
	}

	else

		echo 4;



}

?>