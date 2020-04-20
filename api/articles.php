<?php
	include('config.php');
	$data=array();

	//Categories
	if(isset($_GET['menu']))
	{
		$sql="SELECT name FROM category";
		$result=$conn->query($sql);
		if($result->num_rows>0)
		{
			while($row=$result->fetch_assoc())
			{
				array_push($data,$row);
			}
		}
		else
		{
			$data=array(array('name'=>"error"));
		}
		echo json_encode($data);
	}
	if(isset($_GET['menu_data']))
	{
		$name = $_GET['menu_data'];
		$sql="SELECT * FROM category WHERE name='$name'";
		$result=$conn->query($sql);
		if($result->num_rows>0)
		{
			while($row=$result->fetch_assoc())
			{
				array_push($data,$row);
			}
		}
		else
		{	
			$data=array(array('name'=>"error"));
		}
		echo json_encode($data);
	}
	//All active articles
	if(isset($_GET['active']))
	{
		$sql="SELECT id from articles WHERE article_status=1";
		$result=$conn->query($sql);
		echo $result->num_rows;
	}	//Articles
	if(isset($_GET['article']))
	{

		$page=$_GET['page'];
		$start=($page-1)*12;
		$end=$page*12;
		if($_GET['article']=='all' && isset($_GET['page']))
		{
			$sql="SELECT * from articles WHERE article_status=1 ORDER BY id DESC LIMIT $start, $end";
		}
		elseif ($_GET['article']=='latest_articles') {
			$sql="SELECT * from articles WHERE article_status=1 ORDER BY id DESC LIMIT 6";
		}
		else{
			$category=$_GET['article'];
			strtoupper($category);
			$sql="SELECT * FROM articles where article_status=1 AND category1='$category' OR category2='$category' OR category3='$category' OR category4='$category'  ORDER BY id DESC LIMIT $start, $end";
		}
		
		$result=$conn->query($sql);
		if($result->num_rows>0)
		{
			while($row=$result->fetch_assoc())
			{
				array_push($data,$row);
			}
		}
		else
		{
			$data['error']="NO record found!";
		}
		echo json_encode($data);
	}
	if(isset($_GET['all_article']))
	{
		if($_GET['all_article']=='all')
		{
			$sql="SELECT * from articles WHERE article_status=1 ";
		}
		else
		{
			$category=$_GET['all_article'];
			strtoupper($category);
			$sql="SELECT * from articles WHERE article_status=1 AND category1='$category'";
		}
			$result=$conn->query($sql);
			if($result->num_rows>0)
			{
				while($row=$result->fetch_assoc())
				{
					array_push($data,$row);
				}
			}
			else
			{
				$data['error']="NO record found!";
			}
			echo json_encode($data);		
	}
	if(isset($_GET['article_data']))
	{
		$key=$_GET['article_data'];
		$sql = "select search_key,category1,title,meta_description,meta_keyword,article_image,article_body,post_date,fname,lname,email,picture,designation from articles JOIN users on articles.user_id=users.id WHERE articles.search_key='$key'";		
		$result=$conn->query($sql);
		if($result->num_rows>0)
		{
			while($row=$result->fetch_assoc())
			{
				array_push($data,$row);
			}
		}
		else
		{
			$data['error']="NO record found!";
		}
		echo json_encode($data);
	}
	if(isset($_GET['search']))
	{
		$key=$_GET['search'];
		$sql="SELECT search_key,title,meta_description,article_image from articles WHERE meta_description LIKE '%$key%' LIMIT 10";
		$result=$conn->query($sql);
		if($result->num_rows>0)
		{
			while($row=$result->fetch_assoc())
			{
				array_push($data,$row);
			}
		}
		else
			$data = array(array('title'=>'error'));

		echo json_encode($data);
	}
	if(isset($_GET['search_page']))
	{
		$key=$_GET['search_page'];
		$sql="SELECT search_key,title,meta_description,article_image from articles WHERE meta_description LIKE '%$key%'";
		$result=$conn->query($sql);
		if($result->num_rows>0)
		{
			while($row=$result->fetch_assoc())
			{
				array_push($data,$row);
			}
		}
		else
			$data = array(array('title'=>'error'));

		echo json_encode($data);
	}
	if(isset($_GET['meme']))
	{
		$sql="SELECT * from meme ORDER BY id DESC";

		$result=$conn->query($sql);
		if($result->num_rows>0)
		{
			while($row=$result->fetch_assoc())
			{
				array_push($data,$row);
			}
		}
		else
		{
			$data['error']="NO record found!";
		}
		echo json_encode($data);
	}
?>