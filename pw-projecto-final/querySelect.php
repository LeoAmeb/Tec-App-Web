<?php
include 'connection.php';

if(isset($_POST['getGames'])){
    try{
        $sql = "SELECT p.id as 'id', p.name as 'platform', v.title as 'title', v.image as 'image' FROM videogames v JOIN consoleVideogames cv ON v.id=cv.videogames_id JOIN consoles c ON cv.consoles_id=c.id JOIN platforms p ON c.id_platform=p.id GROUP BY p.id, p.name, v.title, v.image";
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        while($row=$stmt->fetch(PDO::FETCH_ASSOC)){
            ?>
            <div class="game">
                <?php
                if($row['id']==1){
                    ?>
                    <div class="console color_1">
                        <p><?php echo $row['platform'];?></p>
                    </div>
                    <?php
                }else if($row['id']==2){
                    ?>
                    <div class="console color_2">
                        <p><?php echo $row['platform'];?></p>
                    </div>
                    <?php
                }
                else if($row['id']==3){
                    ?>
                    <div class="console color_3">
                        <p><?php echo $row['platform'];?></p>
                    </div>
                    <?php
                }
                else{
                    ?>
                    <div class="console color_4">
                        <p><?php echo $row['platform'];?></p>
                    </div>
                    <?php
                }
                ?>
                <div class="image-container">
                    <img class="game-img" src="<?php echo "assets/img/videogames/".$row['image'];?>" alt="">
                </div>
                <small style="font-size:14px"><?php echo $row['title']; ?></small>
            </div>
            <?php
        }
    }catch(PDOException $e){
        echo $e;
    }
}

if(isset($_POST['getTournaments'])){
    $date = date("Y-m-d");
    $sql = "SELECT id,title,date,hour,quantity_max_gamers as quantity, description, modality, face_to_face FROM `tournaments` WHERE date>?";
    $stmt = $conn->prepare($sql);
    $stmt->execute([$date]);
    if($stmt->rowCount()>=1){
        ?>
        <table class="table">
            <thead>
                <tr>
                <th scope="col">Título</th>
                <th scope="col">Fecha</th>
                <th scope="col">Hora</th>
                <th scope="col">Modalidad</th>
                <th scope="col">Tipo</th>
                <th scope="col-1"></th>
                </tr>
            </thead>
        <?php

        while($row=$stmt->fetch(PDO::FETCH_ASSOC)){

            ?>
                <tbody>
                    <tr>
                    <td><?php echo $row['title'];?></td>
                    <td><?php echo $row['date'];?></td>
                    <td><?php echo $row['hour'];?></td>
                    <td><?php echo $row['modality'];?></td>
                    <td><?php echo $row['face_to_face'];?></td>
                    <td><button type="button" class="btn btn-login w-100" onclick="moreInfo(<?php echo $row['id'];?>);" >Ver más</button></td>
                    </tr>
                </tbody>
            <?php
        }
        ?>
        </table>
        <?php
    }else{?>
        <div class="alert alert-danger" role="alert" style="text-align:center">
            Actualmente no hay torneos disponibles. Vuelva en otro momento.
        </div>
    <?php
    }
}

if(isset($_POST['getMyT'])){
    session_start();
    $sql = "SELECT t.id,title,date,hour,quantity_max_gamers as quantity, description, modality, face_to_face FROM tournaments t JOIN participants p ON t.id=p.tournaments_id WHERE p.gamers_id = ? ORDER BY t.date DESC, t.hour;";
    $stmt = $conn->prepare($sql);
    $stmt->execute([$_SESSION['id']]);
    
    if($stmt->rowCount()>=1){
        ?>
            <table class="table">
                <thead>
                    <tr>
                    <th scope="col">Título</th>
                    <th scope="col">Fecha</th>
                    <th scope="col">Hora</th>
                    <th scope="col">Modalidad</th>
                    <th scope="col">Tipo</th>
                    <th scope="col-1"></th>
                    </tr>
                </thead>
        <?php
        while($row=$stmt->fetch(PDO::FETCH_ASSOC)){
            ?>
                <tbody>
                    <tr>
                    <td><?php echo $row['title'];?></td>
                    <td><?php echo $row['date'];?></td>
                    <td><?php echo $row['hour'];?></td>
                    <td><?php echo $row['modality'];?></td>
                    <td><?php echo $row['face_to_face'];?></td>
                    <td><button type="button" class="btn btn-login w-100" onclick="moreInfo(<?php echo $row['id'];?>);" >Ver más</button></td>
                    </tr>
                </tbody>
            <?php
        }
    }else{?>
    <div class="alert alert-danger" role="alert" style="text-align:center">
        Actualmente no cuentas con una lista de torneos en los que hayas participado.
    </div>
    <?php
    }
    ?>
    </table>
    <?php
}

if(isset($_POST['getHistory'])){
    session_start();
    
    $sql = "SELECT r.date as date, r.hour_init as i_h, r.hour_end as e_h, p.name as console, c.number_console as number, r.total as total,r.payment as payment
    FROM rents r
    JOIN consoles c ON r.id_console=c.id
    JOIN platforms p ON c.id_platform=p.id
    WHERE r.gamers_id = ?";

    $stmt = $conn->prepare($sql);
    $stmt->execute([$_SESSION['id']]);
    if($stmt->rowCount()>=1){
        ?>
        <table class="table">
            <thead>
                <tr>
                <th scope="col">Fecha</th>
                <th scope="col">Hora de inicio</th>
                <th scope="col">Hora de finalización</th>
                <th scope="col">Consola</th>
                <th scope="col">Número</th>
                <th scope="col-1">Total</th>
                <th scope="col-1">Método de pago</th>
                </tr>
            </thead>
        <?php

        while($row=$stmt->fetch(PDO::FETCH_ASSOC)){
            ?>
                <tbody>
                    <tr>
                    <td><?php echo $row['date'];?></td>
                    <td><?php echo $row['i_h'];?></td>
                    <td><?php echo $row['e_h'];?></td>
                    <td><?php echo $row['console'];?></td>
                    <td><?php echo $row['number'];?></td>
                    <td><?php echo $row['title'];?></td>
                    <td><?php echo $row['total'];?></td>
                    <td><?php echo $row['payment'];?></td>
                    </tr>
                </tbody>
            <?php
        }
        ?>
        </table>
        <?php
    }else{?>
        <div class="alert alert-danger" role="alert" style="text-align:center">
            Actualmente no cuentas con un registro de renta en nuestro establecimiento
        </div>
    <?php
    }
}


if(isset($_POST['getProfile'])){
    session_start();
    $sql = "SELECT name, last_name, birthdate, gender, photo, youtube, twitter,facebook, twitch, mixer FROM gamers g WHERE id=?";
    $stmt = $conn->prepare($sql);
    $stmt->execute([$_SESSION['id']]);
    $user = $stmt->fetch(PDO::FETCH_ASSOC);
    $gender = '';
    $gender2 = '';
    $g = '';
    $g2 = '';
    $image = 'assets/img/profiles/';
    if($user['gender']=='M'){
        $gender='Masculino';
        $g='M';
        $gender2='Femenino';
        $g2='F';
    }else{
        $gender='Femenino';
        $g='F';
        $gender2='Masculino';
        $g2='M';
    }
    if($user['photo']==null){
        $image=$image."default.png";
    }else{
        $image=$image.$user['photo'];
    }
    ?>
        <div class="img-picture">
            <div>
                <img class="my-picture" src="<?php echo $image;?>" alt="">
                <h4 id="username" class="username"><?php echo $_SESSION['username'];?></h4>
            </div>
        </div>
        <div class="img-picture update-photo">
           <input type="file" id="profilePicture" accept="image/*">
           <button onclick="updatePhoto()" type="button" class="btn btn-primary">Actualizar foto</button>
        </div>
        <div class="d-flex m-auto row">
            <div class="personal-info col">
                <div class="full-name d-flex">
                    <div class="p-info">
                        <label for="">Nombre *</label><br>
                        <input type="text" class="form-field" id="name" value="<?php echo $user['name'];?>" readonly>
                    </div>
                    <div class="p-info">
                        <label for="">Apellido *</label><br>
                        <input type="text" class="form-field" id="lname" value="<?php echo $user['last_name'];?>" readonly>
                    </div>
                </div>

                <div class="full-name d-flex">
                    <div class="p-info">
                        <label for="">Fecha de nacimiento *</label><br>
                        <input type="date" class="form-field" id="date" value="<?php echo $user['birthdate'];?>" readonly>
                    </div>
                    <div class="p-info">
                        <label for="">Género *</label><br>
                        <select name="gender" id="gender" class="form-field" readonly>
                                <option selected value="<?php echo $g; ?>"><?php echo $gender; ?></option>
                                <option value="<?php echo $g2; ?>"><?php echo $gender2; ?></option>
                            </select>
                    </div>
                </div>
            </div>
            <div class="gamer-info col">
                <div class="full-name d-flex">
                    <div class="p-info">
                        <label for="">Youtube</label><br>
                        <input type="text" id="yt" class="form-field" value="<?php echo $user['youtube'];?>" readonly>
                    </div>
                    <div class="p-info">
                        <label for="">Twitter</label><br>
                        <input type="text" id="tt" class="form-field" value="<?php echo $user['twitter'];?>" readonly>
                    </div>
                </div>
                <div class="full-name d-flex">
                    <div class="p-info">
                        <label for="">Facebook</label><br>
                        <input type="text" id="fb" class="form-field" value="<?php echo $user['facebook'];?>" readonly>
                    </div>
                    <div class="p-info">
                        <label for="">Twitch</label><br>
                        <input type="text" id="tw" class="form-field" value="<?php echo $user['twitch'];?>" readonly>
                    </div>
                    <div class="p-info">
                        <label for="">Mixer</label><br>
                        <input type="text" id="mx" class="form-field" value="<?php echo $user['mixer'];?>" readonly>
                    </div>
                </div>
            </div>
        </div>
        <div class="img-picture">
            <button class="btn btn-login" onclick="editProfile()" id="editProfile" style="width:40%">Editar perfil</button>
        </div>
    <?php
}


if(isset($_POST['getTournament'])){
    #Tournament info
    $sql = "SELECT t.id as id, t.title as title, date, hour, quantity_max_gamers as quantity, v.title as game, v.image as game_image, description, modality, face_to_face, COUNT(p.gamers_id) as participants
    FROM tournaments t
    JOIN participants p ON t.id=p.tournaments_id
    JOIN videogames v ON t.id_videogame=v.id
    WHERE t.id=?";
    
    $stmt = $conn->prepare($sql);
    $stmt->execute([$_POST['id']]);

    $row = $stmt->fetch(PDO::FETCH_ASSOC);

    setlocale(LC_ALL,"es_MX.UTF-8");
    $date = DateTime::createFromFormat("Y-m-d", $row['date']);

    ?>
    <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle" style="text-align:center;"><?php echo $row['title']; ?></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body row">
                <div class="description col">
                    <h6>Descripción</h6>
                    <p><?php echo $row['description'];?></p>
                    <div class="game d-flex" style="align-content: space-around;">
                        <div class="image-container">
                            <img class="game-img" src="<?php echo "assets/img/videogames/".$row['game_image']; ?>" alt="">
                        </div>
                    </div>
                </div>
                <div class="info col">
                    <div class="row">
                        <div class="date col">
                            <h6>Fecha</h6>
                            <p><?php echo strftime("%e de %B de %Y",$date->getTimestamp()); ?></p>
                        </div>
                        <div class="date col">
                            <h6>Hora</h6>
                            <p><?php echo date('h:i A',$row['hour']); ?></p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="modality col">
                            <h6>Modalidad</h6>
                            <p><?php echo $row['face_to_face'];?></p>
                        </div>
                        <div class="type col">
                            <h6>Modo de juego</h6>
                            <p><?php echo $row['modality'];?></p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="awards col">
                            <h6>Premios</h6>
                            <?php

                                $sql = "SELECT r.positions as pos, r.reward as reward FROM rewards r WHERE r.id_tournament=?";
                                $stmt = $conn->prepare($sql);
                                $stmt->execute([$_POST['id']]);

                                while($awards=$stmt->fetch(PDO::FETCH_ASSOC)){
                                    echo "<p>".$awards['pos'].". ".$awards['reward']."</p>";
                                }
                            ?>
                        </div>
                        <div class="players col">
                            <h6>Gamers inscritos</h6>
                            <h6><?php echo $row['participants']."/".$row['quantity']; ?></h6>
                            <?php
                                $cupo = false;
                                if($row['participants']<$row['quantity']){
                                    $cupo = true;
                                }
                            ?>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                <?php
                    session_start();
                    $sql2 = "SELECT COUNT(*) as result FROM participants p WHERE p.gamers_id = ? AND p.tournaments_id = ?";
                    $stmt2 = $conn->prepare($sql2);
                    $stmt2->execute([
                        $_SESSION['id'],
                        $_POST['id']
                        ]);
                    $result = $stmt2->fetch(PDO::FETCH_ASSOC);
                    if($result['result']=='0' && $cupo){?>
                        <button type="button" class="btn btn-login" onclick="signin(<?php echo $_POST['id'];?>)">Inscribirse</button>
                    <?php
                    }
                    if($row['modality']!='Solo' && isset($_SESSION['id'])){
                        echo '<button type="button" class="btn btn-login" onclick="inviteToTeam(\''.$_POST['id'].'\',\''.$row['modality'].'\');">Invitar a Team</button>';
                    }
                ?>
            </div>
            </div>
        </div>
    </div>
<?php
}

if(isset($_POST['inputText'])){
    session_start();
    $sql = "SELECT id,username,name,last_name FROM gamers g WHERE g.id !=:id AND g.id NOT IN (SELECT gamers_id FROM participants) AND g.id NOT IN (SELECT player_id FROM playsFor) AND g.id NOT IN (SELECT user_receiver_id FROM invitations WHERE participants_tournaments_id = :t_id) AND username LIKE CONCAT('',:input,'%')";
    $stmt = $conn->prepare($sql);
    $stmt->execute(
        ['id' => $_SESSION['id'],
        't_id' => $_POST['t'],
        'input' => $_POST['input']
        ]);
        ?>
            <table class="table" id="myTable">
                <thead>
                    <tr>
                    <th scope="col">Usuario</th>
                    <th scope="col">Nombre</th>
                    <th scope="col">Apellido(s)</th>
                    <th scope="col"></th>
                    </tr>
                </thead>
                <tbody>
                
        <?php
    while($row=$stmt->fetch(PDO::FETCH_ASSOC)){
    ?>
        <tr>
            <td scope="col"><?php echo $row['username'];?></td>
            <th scope="col"><?php echo $row['name'];?></th>
            <th scope="col"><?php echo $row['last_name'];?></th>
            <td scope="col"><button class="btn btn-primary w-100" onclick="sendInvitation(<?php echo $row['id']; ?>);">Invitar</button></td>
        </tr>

    <?php
    }
    ?>

            </tbody>
        </table>

    <?php
}


if(isset($_POST['members'])){
    session_start();
    $sql = "SELECT CONCAT(name,' ',last_name) as name FROM gamers g JOIN playsFor pf ON g.id=pf.player_id JOIN participants p ON g.id=p.gamers_id WHERE pf.team_id = ? AND g.id!=? AND p.tournaments_id=?";
    $stmt = $conn->prepare($sql);
    $stmt->execute([
        $_SESSION['id'],
        $_SESSION['id'],
        $_POST['t_id']
    ]);
    while($row=$stmt->fetch(PDO::FETCH_ASSOC)){
        ?>
            <h4><?php echo $row['name'] ?><h4>
        <?php
    }

}

?>