<?php

session_start();

include('config.php');

if (isset($_SESSION['user'])) {
    if(isset($_POST['title']))
    {
        $user_id = $_SESSION['user'];

        $title            = $_POST['title'];

        $article_body     = $_POST['editor1'];

        $category1  = $_POST['category1'];

        $category2  = $_POST['category2'];

        $category3  = $_POST['category3'];

        $category4  = $_POST['category4'];

        $sql = "INSERT INTO articles(user_id,title,category1,category2,category3,category4,article_body,article_status,post_date) VALUES($user_id,'$title','$category1','$category2','$category3','$category4','$article_body',2,now())";

        if($conn->query($sql))
        {
            echo 1;
        }
        else
        {
            echo 2;
        }
    }
}

?>