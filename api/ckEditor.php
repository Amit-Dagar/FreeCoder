<?php
$file = $_FILES['file']['name'];
    if (!empty($file)) {
        $target_dir = 'article_images/';
        $thumb_dir  = 'article_thumbs/';
        if (file_exists($target_dir)) {
            
            $target_dir = 'article_images/';
            $thumb_dir  = 'article_thumbs/';
            
        } else {
            
            mkdir($target_dir, 0777, true);
            mkdir($thumb_dir, 0777, true);
            
        }
        $target_file = $target_dir . $file;
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
            $url  = $thumb_dir . $file;

            $size = filesize($_FILES["file"]["tmp_name"]) / 1024 / 1024;
            if ($size > 2 && $size < 6)
                $filename = compress_image($_FILES["file"]["tmp_name"], $url, 7);
            elseif ($size > 6)
                $filename = compress_image($_FILES["file"]["tmp_name"], $url, 5);
            elseif ($size > 1 && $size < 2)
                $filename = compress_image($_FILES["file"]["tmp_name"], $url, 8);
            elseif ($size > 0.5 && $size < 1)
                $filename = compress_image($_FILES["file"]["tmp_name"], $url, 10);
            else
                $filename = compress_image($_FILES["file"]["tmp_name"], $url, 50);
            if (move_uploaded_file($_FILES["file"]["tmp_name"], $target_file)) {
                unlink($target_file);
                echo '/api/'.$url;
            }
        }
    }
?>