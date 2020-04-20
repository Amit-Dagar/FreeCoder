<?php
session_start();
include 'config.php';
if (isset($_SESSION['user'])) {
    $id     = $_SESSION['user'];
    $sql    = "SELECT * FROM users where id=$id";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            if ($_POST['password'] == '') {
                $password = $row['password'];
            } else {
                $password = md5($_POST['password']);
            }
            if ($_POST['fname'] == '') {
                $fname = $row['fname'];
            } else {
                $fname = $_POST['fname'];
            }
            if ($_POST['lname'] == '') {
                $lname = $row['lname'];
            } else {
                $lname = $_POST['lname'];
            }
            if ($_POST['phno'] == '') {
                $phno = $row['phno'];
            } else {
                $phno = $_POST['phno'];
            }
            $picture  = $_FILES['picture']['name'];
            if ($picture == '') {
                $picture  = $row['picture'];
                $pic_data = 1;
            } else {
                $picture  = time() . '.' . pathinfo($_FILES['picture']['name'], PATHINFO_EXTENSION);
                $pic_data = upload($picture, $row['picture']);
            }
            if ($pic_data == 1) {
                $sql = "UPDATE users set fname='$fname', lname='$lname', picture='$picture', phno='$phno',password='$password' where id='$id'";
                if ($conn->query($sql) === true) {
                    echo 1;
                } else
                    echo 2;
            }
        }
    }
} 
else {
    echo 3;
}

function upload($file, $old_file)
{
    if (!empty($file)) {
        $target_dir = 'users_images/';
        $thumb_dir  = 'users_thumbs/';
        if (file_exists($target_dir)) {
            $target_dir = 'users_images/';
            $thumb_dir  = 'users_thumbs/';
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
            $size = filesize($_FILES["picture"]["tmp_name"]) / 1024 / 1024;
            if ($size > 2 && $size < 6)
                $filename = compress_image($_FILES["picture"]["tmp_name"], $url, 7);
            elseif ($size > 6)
                $filename = compress_image($_FILES["picture"]["tmp_name"], $url, 5);
            elseif ($size > 1 && $size < 2)
                $filename = compress_image($_FILES["picture"]["tmp_name"], $url, 8);
            elseif ($size > 0.5 && $size < 1)
                $filename = compress_image($_FILES["picture"]["tmp_name"], $url, 10);
            else
                $filename = compress_image($_FILES["picture"]["tmp_name"], $url, 50);
            if (move_uploaded_file($_FILES["picture"]["tmp_name"], $target_file)) {
                unlink($target_file);
                unlink('users_thumbs/' . $old_file);
                return 1;
            } else {
                return 2;
            }
        }
    }
}
?>