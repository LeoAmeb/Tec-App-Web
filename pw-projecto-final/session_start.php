<?php
include 'connection.php';
if(isset($_POST['login'])){
    try{
        $sql = "SELECT id, username, password, coins FROM gamers WHERE username=? AND password=? AND role=?";
        $stmt =  $conn->prepare($sql);
        $stmt->execute([
            $_POST['username'],
            $_POST['password'],
            0
        ]);
        if($stmt->rowCount()==1){
            session_start();
            $user = $stmt->fetch(PDO::FETCH_ASSOC);
            $_SESSION['id'] = $user['id'];
            $_SESSION['username'] = $user['username'];
            $_SESSION['coins'] = (int)$user['coins'];
            echo $user['username'];
        }
    }catch(PDOException $e){
        echo $e;
    }
}
?>