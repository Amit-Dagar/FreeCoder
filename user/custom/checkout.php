<?php
session_start();
include('../../api/config.php');
if(isset($_SESSION['user']))
{
	$id=$_SESSION['user'];
	$sql4="SELECT * FROM uploads WHERE uid=$id AND status='accepted'";
	$result=$conn->query($sql4);
	$amount=1*$result->num_rows;
	$th_val=0;
	$debited_amount=0;
	$sql="SELECT * FROM checkout where uid=$id AND status='y'";
	$result=$conn->query($sql);
	if($result->num_rows>0)
	{
		while($row=$result->fetch_assoc())
		{
			$debited_amount+=$row['credits'];
		}
	}
	$amount=$amount-$debited_amount;
	if($amount>=20)
	{
		if($amount>=20 && $amount<40)
			$th_val=20;
		elseif($amount>=40 && $amount<80)
			$th_val=40;
		elseif($amount>=80 && $amount<100)
			$th_val=80;
		elseif($amount>=100 && $amount<150)
		{
			$th_val=100;
		}
		elseif($amount>=150 && $amount<200)
		{
			$th_val=150;
		}
		elseif($amount>=200 && $amount<500)
		{
			$th_val=200;
		}
		elseif($amount>=500 && $amount<1000)
			$th_val=500;
		elseif($amount>=1000 && $amount<1500)
			$th_val=1000;
		elseif($amount>=1500 && $amount<2000)
		{
			$th_val=1500;
		}
		elseif($amount>=2000)
			$th_val=2000;
		else{}
	}
	else{
		echo 1;
		return;
	}
	if($amount>=20)
	{
		$sql="SELECT * FROM checkout WHERE uid=$id AND status='p'";
		$result=$conn->query($sql);
		if($result->num_rows>0)
		{
			echo 0;
		}
		else
		{
			$sql="INSERT INTO checkout(uid,credits,req_date,status) VALUES($id,$th_val,now(),'p')";
			if($conn->query($sql)===true)
			{
				echo 2;
			}
		}
	}
}
else
	echo'<script>window.location.href="https://freecoder.in/user/login.php";</script>';
?>