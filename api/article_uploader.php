<?php

session_start();

include('config.php');

if (isset($_SESSION['webmaster'])) {

    $id = $_POST['id'];

    $search_key       = $_POST['search_key'];

    $title            = $_POST['title'];

    $meta_keyword     = $_POST['meta_keyword'];

    $meta_description = $_POST['meta_description'];

    $article_cover    = time().'.'.pathinfo($_FILES['article_cover']['name'],PATHINFO_EXTENSION);

    $article_body     = $_POST['editor1'];

    $category1  = $_POST['category1'];

    $category2  = $_POST['category2'];

    $category3  = $_POST['category3'];

    $category4  = $_POST['category4'];

    if ($_FILES['article_cover']['name'] != "") {

        $target_dir = 'article_cover_images/';

        $thumb_dir  = 'article_cover_thumbs/';

        if (file_exists($target_dir)) {

            

            $target_dir = 'article_cover_images/';

            $thumb_dir  = 'article_cover_thumbs/';

            

        } else {

            

            mkdir($target_dir, 0777, true);

            mkdir($thumb_dir, 0777, true);

            

        }

        $target_file = $target_dir . $article_cover;

        $FileType    = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

        if ($FileType == 'png' || $FileType == 'jpg' || $FileType == 'gif' || $FileType == 'heif' || $FileType == 'jpeg' || $FileType == 'svg') {

            $upload = 0;

            function compress_image($source_url, $destination_url, $quality)

            {

                $info = getimagesize($source_url);

                

                if ($info['mime'] == 'image/jpeg')

                    $image = imagecreatefromjpeg($source_url);

                

                elseif ($info['mime'] == 'image/gif')

                    $image = imagecreatefromgif($source_url);

                elseif ($info['mime'] == 'image/png')

                    $image = imagecreatefrompng($source_url);

                else

                    $image = imagecreatefromfile($source_url);

                

                imagejpeg($image, $destination_url, $quality);

                $GLOBALS['upload'] = 1;

                return $destination_url;

            }

            $url  = $thumb_dir . $article_cover;



            $size = filesize($_FILES["article_cover"]["tmp_name"]) / 1024 / 1024;

            if ($size > 2 && $size < 6)

                $filename = compress_image($_FILES["article_cover"]["tmp_name"], $url, 7);

            elseif ($size > 6)

                $filename = compress_image($_FILES["article_cover"]["tmp_name"], $url, 5);

            elseif ($size > 1 && $size < 2)

                $filename = compress_image($_FILES["article_cover"]["tmp_name"], $url, 8);

            elseif ($size > 0.5 && $size < 1)

                $filename = compress_image($_FILES["article_cover"]["tmp_name"], $url, 10);

            else

                $filename = compress_image($_FILES["article_cover"]["tmp_name"], $url, 50);

            if (move_uploaded_file($_FILES["article_cover"]["tmp_name"], $target_file)) {

                $var=1;

            }

        }

    }
    else
    {
        $var=2;
    }
        if($var == 1)
        {
            $sql = "UPDATE articles set search_key='$search_key',category1='$category1',category2='$category2',category3='$category3', category4='$category4',title='$title',meta_description='$meta_description',meta_keyword='$meta_keyword',article_image='$article_cover',article_body='$article_body',article_status=1 WHERE id=$id";
        }
        else
        {
            $sql = "UPDATE articles set search_key='$search_key',category1='$category1',category2='$category2',category3='$category3', category4='$category4',title='$title',meta_description='$meta_description',meta_keyword='$meta_keyword',article_body='$article_body',article_status=1 WHERE id=$id";
        }
        if ($conn->query($sql) === true) {
            if($var==1)
            {
                unlink($target_file);
            }
            echo 1;
        }
        else
        {
            echo $conn->error;
        }
}

?>