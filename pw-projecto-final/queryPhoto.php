<?php
    include 'connection.php';

    session_start();
    $file = $_FILES["image"]["tmp_name"];
    $temp = explode(".", $_FILES["image"]["name"]);
    $newfilename = $_SESSION['username'].'_img' . '.' . end($temp);
    $dir = "assets/img/profiles/". $newfilename;
    // now you have access to the file being uploaded
    //perform the upload operation.
    if(move_uploaded_file($file, $dir)){
        $sql = "UPDATE gamers SET photo=? WHERE id=?";
        $stmt = $conn->prepare($sql);
        $stmt->execute([
            $newfilename,
            $_SESSION['id']
        ]);
        if($stmt){
            echo "success";
        }else{
            echo "queck";
        }
    }
?>