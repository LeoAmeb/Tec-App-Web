<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel=stylesheet href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/extras/font-awesome/css/all.css">
    <link rel=stylesheet href="assets/css/styles.css">
</head>
<body>
    <header>
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <a class="navbar-brand" href="index.php">Revoluxion Gaming</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ml-auto">
                    <!--<li class="nav-item">
                        <a class="nav-link" href="platforms.php">Plataformas<span class="sr-only"></span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="games.php">Juegos<span class="sr-only"></span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="location.php">Ubicación<span class="sr-only"></span></a>
                    </li>-->
                    <li class="nav-item">
                        <a class="nav-link" href="history.php">Historial<span class="sr-only"></span></a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">Torneos</a>
                        <div class="dropdown-menu dropdown-menu-right">
                            <a class="dropdown-item" href="tournaments.php">Próximos Torneos</a>
                            <a class="dropdown-item" href="my_tournaments.php">Mis Torneos</a>
                            <a class="dropdown-item" href="invitations.php">invitaciones</a>
                        </div>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">Perfil</a>
                        <div class="dropdown-menu dropdown-menu-right">
                          <a class="dropdown-item" href="myprofile.php">Ver Perfil</a>
                          <a class="dropdown-item" href="session_end.php">Cerrar Sesión</a>
                        </div>
                    </li>
                    <li class="nav-item d-flex money">
                        <i class="fa fa-coins"></i>
                        <p><?php echo $_SESSION['coins'].".00"; ?></p>
                    </li>
                </ul>
            </div>
        </nav>
    </header>
</body>
</html>