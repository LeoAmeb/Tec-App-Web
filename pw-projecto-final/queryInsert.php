<?php
include 'connection.php';

//Show videogames
if(isset($_POST['signup'])){
    try{
        $sql_s = "SELECT username, email FROM gamers WHERE username=? OR email=?";
        $stmt_s = $conn->prepare($sql_s);
        $stmt_s->execute([
            $_POST['user'],
            $_POST['email']
        ]);
        if($stmt_s->rowCount()==1){
            echo "used";
        }else{
            $sql = "INSERT INTO gamers (name,last_name,birthdate,gender,email,username,password,role) VALUES (?,?,?,?,?,?,?,?)";
            $stmt = $conn->prepare($sql);
            $stmt->execute([
                $_POST['name'],
                $_POST['lname'],
                $_POST['date'],
                $_POST['gender'],
                $_POST['email'],
                $_POST['user'],
                $_POST['pass'],
                '1'
            ]);
            if ($stmt) {
                echo "success";
            }
        }
    }catch(PDOException $e){
        echo $e;
    }
}

if(isset($_POST['signin'])){
    session_start();
    if (isset($_SESSION['username'])) {
        $sql = "CALL sign_into_tournament(?,?)";
        $stmt = $conn->prepare($sql);
        $stmt->execute([
            $_SESSION['id'],
            $_POST['id']
        ]);
        if($stmt){
            echo 1;
        }
    }else{
        echo 0;
    }
}

if(isset($_POST['updateUser'])){
    try{
        session_start();
        $sql = "UPDATE gamers SET name=?,last_name=?,birthdate=?,gender=?,youtube=?,twitter=?,facebook=?,twitch=?,mixer=? WHERE id=?";
        $stmt = $conn->prepare($sql);
        $stmt->execute([
            $_POST['name'],
            $_POST['lname'],
            $_POST['date'],
            $_POST['gender'],
            $_POST['youtube'],
            $_POST['twitter'],
            $_POST['facebook'],
            $_POST['twitch'],
            $_POST['mixer'],
            $_SESSION['id']
            ]);
        if($stmt){
            echo "success";
        }else{
            echo "error";
        }
    }catch(PDOException $e){
        echo $e;
    }
}

if(isset($_POST['sendI'])){
    $n = 4;
    session_start();
    try{
        $sql = "SELECT pf.team_id as team_id FROM playsFor pf JOIN teams t ON pf.team_id=t.id WHERE pf.player_id = ? AND t.tournament_id=?";
        $stmt = $conn->prepare($sql);
        $stmt->execute([
            $_SESSION['id'],
            $_POST['tournament_id']
        ]);
        $team_id = $stmt->fetch(PDO::FETCH_ASSOC);

        $query = "SELECT COUNT(pf.team_id) as players, tr.modality as moda FROM playsFor pf JOIN teams t ON pf.team_id=t.id JOIN tournaments tr ON t.tournament_id=tr.id WHERE pf.team_id=? GROUP BY pf.team_id, tr.modality";
        $ojo = $conn->prepare($query);
        $ojo->execute([
            $team_id['team_id']
        ]);
        $datos = $ojo->fetch(PDO::FETCH_ASSOC);
        if($datos['moda']=="Duos"){
            $n = 2;
        }
        if($datos['players']<$n){
            $sql2 = "INSERT INTO invitations (user_receiver_id, participants_gamers_id, participants_tournaments_id, team_id) VALUES(?,?,?,?)";
            $stmt2 = $conn->prepare($sql2);
            $stmt2->execute([
                $_POST['id'],
                $_SESSION['id'],
                $_POST['tournament_id'],
                $team_id['team_id']
            ]);
            if($stmt2){
                echo "success";
            }
        }else{
            echo "max";
        }
    }catch(PDOException $e){
        echo $e;
    }
}

//SELECT pf.team_id FROM playsFor pf JOIN teams t ON pf.team_id=t.id WHERE pf.player_id = 1353 AND t.tournament_id=3 

?>