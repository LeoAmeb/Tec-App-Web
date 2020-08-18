<!DOCTYPE html>
<html lang="en">
<?php include "./production/includes/icono.html" ?>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Inicio de Sesión | </title>

    <!-- Bootstrap -->
    <link href="./vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="./vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="./vendors/nprogress/nprogress.css" rel="stylesheet">
    <!-- Animate.css -->
    <link href="./vendors/animate.css/animate.min.css" rel="stylesheet">

    <!-- Custom Theme Style -->
    <link href="./build/css/custom.min.css" rel="stylesheet">
</head>

<body class="login">
    <div>
        <a class="hiddenanchor" id="signup"></a>
        <a class="hiddenanchor" id="signin"></a>

        <div class="login_wrapper">
            <div class="animate form login_form">
                <section class="login_content">
                    <form method="post" action="./production/modulos/backend/B_login.php">
                        <h1>Iniciar Sesión</h1>
                        <div>
                            <input type="text" class="form-control" placeholder="Nombre de Usuario" required="" name="username" />
                        </div>
                        <div>
                            <input type="password" class="form-control" placeholder="Contraseña" required="" name="password" />
                        </div>
                        <div>
                            <button type="submit" class="btn btn-default">Iniciar sesión</button>
                            <a class="reset_pass" href="#">Perdiste tu contraseña?</a>
                        </div>

                        <div class="clearfix"></div>

                        <div class="separator">
                            <p class="change_link">Nuevo en el sitio?
                                <a href="#signup" class="to_register"> Crear cuenta </a>
                            </p>

                            <div class="clearfix"></div>
                            <br />

                            <div>
                                <h1><i class="fa"></i> UPV Team</h1>
                                <p>©2020 Todos los derechos Reservados.</p>
                            </div>
                        </div>
                    </form>
                </section>
            </div>

            <div id="register" class="animate form registration_form">
                <section class="login_content">
                    <form method="post" action="#">
                        <h1>Crear Cuenta</h1>
                        <div>
                            <input type="text" class="form-control" placeholder="Nombre/s" required="" name="nombre" />
                        </div>
                        <div>
                            <input type="text" class="form-control" placeholder="Apellido Paterno" required="" name="apePat" />
                        </div>
                        <div>
                            <input type="text" class="form-control" placeholder="Apellido Materno" required="" name="apeMat" />
                        </div>
                        <div>
                            <input type="text" class="form-control" placeholder="Nombre de Usuario" required="" name="usuario" />
                        </div>
                        <div>
                            <input type="password" class="form-control" placeholder="Contraseña" required="" name="contrasena" />
                        </div>
                        <div>
                            <button type="submit" class="btn btn-default submit">Guardar</button>
                        </div>

                        <div class="clearfix"></div>

                        <div class="separator">
                            <p class="change_link">Ya eres miembro?
                                <a href="#signin" class="to_register"> Iniciar Sesión </a>
                            </p>

                            <div class="clearfix"></div>
                            <br />

                            <div>
                                <h1><i class="fa"></i> UPV Team</h1>
                                <p>©2020 Todos los derechos Reservados.</p>
                            </div>
                        </div>
                    </form>
                </section>
            </div>
        </div>
    </div>
</body>

</html>