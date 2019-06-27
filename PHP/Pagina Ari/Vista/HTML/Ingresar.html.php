<!--
    Pagina Web A.R.I
    Pagina Log in
    Ultima Actualización:11/03/2019
    Integrantes: Mateo Alonso Pabón García,David Agudelo,Juan David Correa García, Juan Esteban Cortés Goméz, Daniel Pineda
-->
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://fonts.googleapis.com/css?family=Montserrat|Roboto+Mono" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="../CSS/style.css">
    <title>A.R.I</title>
</head>
<body>
    <!-- #region Barra de navegación-->
    <nav class="container-fluid menu1">
        <ul class="nav justify-content-center pt-1 pb-1">
            <li class="nav-item">
                <a href="index.html" class="nav-link">Inicio</a>
            </li>
            <li class="nav-item">
                <a href="Contacto.html" class="nav-link">Contacto</a>
            </li>
            <li class="nav-item">
                <a href="#" class="nav-link">Ingresar</a>
            </li>
        </ul>
    </nav>
    <!-- #endregion -->
    <!-- #region Seccion principal-->
    <section>
        <div class="container-fluid blq_2">
            <div class="row">
                <!--Bloque principal-->
                <div class="container col-sm-6 bg-light rounded mx-auto blq_login p-5">
                    <div class="LineaLogin"></div>
                    <h1 class="text-center">Iniciar sesión</h1>
                    <hr>
                    <form action="../../Modelo/login.php" method="POST">
                        <div class="form-group">
                                <label for="email">Usuario</label>
                                <input type="text" name="user" id="user" pattern="{AZ-az-09}" placeholder="Ingrese su usuario" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="Contraseña">Contraseña</label>
                            <input type="password" name="password" id="password"  placeholder="Ingrese su contraseña" class="form-control">
                            <div align="mensaje">
                                <?php if(isset($_GET['error']) && $_GET['error'] == 'true'): ?>
                                <br>
                                <center><h2>Usuario y/o contraseña incorrectos</h2></center>
                                <?php endif; ?>
                            </div>
                        </div>
                        <div class="form-group text-center mt-5">
                            <input type="submit" name="btnEnviar" class="btn btnIngresar text-white">
                            <input type="reset" value="Cancelar" class="btn btn-danger text-white">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
    <!-- #endregion -->
    <!-- #region Video Prueba A.R.I-->
    <div class="container-fluid v_ari">
            <video loop muted autoplay src="../Videos/V_ARI.mp4" class="video_ari"></video>
    </div>
    <!-- #endregion -->
</body>
</html>