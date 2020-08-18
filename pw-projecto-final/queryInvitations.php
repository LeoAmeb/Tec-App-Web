<?php
include 'connection.php';

if(isset($_POST['getInvitations'])){
    session_start();
    try{
    $sql = "SELECT g.username as username, t.title as title FROM invitations i JOIN gamers g ON i.participants_gamers_id=g.id JOIN tournaments t ON i.participants_tournaments_id=t.id WHERE i.user_receiver_id=? AND accepted IS NULL";
    $stmt = $conn->prepare($sql);
    $stmt->execute([
        $_SESSION['id']
    ]);

    ?>
        <table class="table" id="myTable">
            <thead>
                <tr>
                <th scope="col">Información</th>
                <th scope="col"></th>
                <th scope="col"></th>
                </tr>
            </thead>
            <tbody>
    <?php

    while($row=$stmt->fetch(PDO::FETCH_ASSOC)){
    ?>
        <tr>
            <td scope="col"><?php echo 'El gamer '.$row['username'].' te ha enviado una invitación para participar en el torneo de '.$row['title'];?></td>
            <th scope="col"><button class="btn btn-primary">Aceptar</button></th>
            <th scope="col"><button class="btn btn-login">Rechazar</button></th>
        </tr>

    <?php
    }
    ?>

            </tbody>
        </table>

    <?php

    }catch(PDOException $e){
        echo $e;
    }
}


?>