<?php
$registration_date = date('Y-m-d'); 
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    
    try {
        $data = [
            'ope' => 'login',
            'cuenta_correo' => $_POST['cuenta_correo'],
            'password_hash' => $_POST['pass'],
            'registration_date' => $registration_date,  
        ];
        $client = new HttpClient(HTTP_BASE);
        $result = $client->post('/controller/LoginController.php', $data);
        if (isset($result['ESTADO']) && $result['ESTADO'] && isset($result['DATA']) && !empty($result['DATA'])) {
            $_SESSION['login'] = $result['DATA'][0];

            if (isset($_SESSION['login']['nombre'])) {
                echo "<script>alert('Acceso Autorizado');</script>";
                echo '<script>window.location.href ="' . HTTP_BASE . '/index.php";</script>';
            } else {
                echo "<script>alert('Acceso No Autorizado');</script>";
            }
        } else {
            echo "<script>alert('Hubo un problema, contactarse con el Administrador de Sistemas');</script>";
        }
    } catch (Exception $e) {
        echo "<script>alert('Hubo un problema, contactarse con el Administrador de Sistemas');</script>";
    }
}
?>

<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>LOGIN</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <link rel="stylesheet" href="http://127.0.0.1/hospital/public/adminlte/plugins/fontawesome-free/css/all.min.css">
    <link rel="stylesheet" href="http://127.0.0.1/hospital/public/adminlte/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
    <link rel="stylesheet" href="http://127.0.0.1/hospital/public/adminlte/dist/css/adminlte.min.css?v=3.2.0">
</head>
<body class="login-page " style="min-height: 1000px;">
    <div class="login-box">
        <div class="card shadow-2-strong"  style="border-radius: 1rem;">
            <div class="card-header text-center">
                <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-login-form/lotus.webp"
                style="width: 185px;" alt="logo"> <br>
                <a class="h1"><b>Iniciar Sesión</b></a>
                <br>
                <h6>HOSPITAL</h6>
            </div>
            
            <div class="card-body">
                <form action="" method="post">
                    <div class="input-group mb-3">
                        <input type="email" class="form-control" placeholder="Correo Electrónico" name="cuenta_correo" required="">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-envelope"></span>
                            </div>
                        </div>
                    </div>
                    <div class="input-group mb-3">
                        <input type="password" class="form-control" placeholder="Contraseña" name="pass" required="">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-lock"></span>
                            </div>
                        </div>
                    </div>
                    <!-- Campo readonly para mostrar la fecha de registro -->
                    <div class="input-group mb-3">
                        <input type="text" class="form-control" placeholder="Fecha de Registro" name="registration_date" value="<?php echo htmlspecialchars($registration_date); ?>" readonly>
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-calendar"></span>
                            </div>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="col-4">
                            <button data-mdb-button-init data-mdb-ripple-init type="submit" 
                            class="btn btn-primary btn-block fa-lg gradient-custom-2 mb-3">Iniciar Sesión</button>
                        </div>
                    </div>
                </form>
                 <!-- Direccionando a register.php -->
                <div class="d-flex align-items-center justify-content-center pb-4">
                    <a  type="button" data-mdb-button-init data-mdb-ripple-init class="btn btn-outline-danger" 
                    href="http://127.0.0.1/hospital/register">Registrarse</a>
                  </div>
               
            </div>
        </div>
    </div>
    <!-- Para estilos -->
<style>
    .btn-primary {
        border-color: #ffffff;
    }
    .gradient-custom-2 {
        background: #fccb90;
        background: -webkit-linear-gradient(to right, #ee7724, #d8363a, #dd3675, #b44593);
        background: linear-gradient(to right, #ee7724, #d8363a, #dd3675, #b44593);
    }
    @media (min-width: 768px) {
        .gradient-form {
        height: 100vh !important;
        }
    }
    @media (min-width: 769px) {
        .gradient-custom-2 {
            border-top-right-radius: .3rem;
            border-bottom-right-radius: .3rem;
        }
        
    }/**background: linear-gradient(to right, #ee7724, #d8363a, #dd3675, #b44593);;
        height: 700px; */
    .login-box, .register-box {
        width: 450px;
        }
        

</style>
    <script src="http://127.0.0.1/hospital/public/adminlte/plugins/jquery/jquery.min.js"></script>
    <script src="http://127.0.0.1/hospital/public/adminlte/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="http://127.0.0.1/hospital/public/adminlte/dist/js/adminlte.min.js?v=3.2.0"></script>
</body>
</html>
