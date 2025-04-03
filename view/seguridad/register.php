<?php
$registration_date = date('Y-m-d');  

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $ope = 'register';
    $p_cuenta_correo = $_POST['cuenta_correo'];
    $p_nombre = $_POST['nombre'];
    $p_password_hash = $_POST['pass'];
    $p_password_hash1 = $_POST['pass1'];
    
    // Validar
    try {
        $data = [
            'ope' => $ope,
            'cuenta_correo' => $p_cuenta_correo,
            'nombre' => $p_nombre,
            'password_hash' => $p_password_hash,
            'registration_date' => $registration_date,  
        ];
        $context = stream_context_create([
            'http' => [
                'method' => 'POST',
                'header' => 'Content-Type: application/json',
                'content' => json_encode($data),
            ]
        ]);
        
        $url = HTTP_BASE . "/controller/LoginController.php";
        $response = file_get_contents($url, false, $context);
        $result = json_decode($response, true);
        
        if ($result["ESTADO"]) {
            echo "<script>alert('Se realizó la operación de manera exitosa');</script>";
        } else {
            echo "<script>alert('Hubo un problema, contactarse con el Administrador de Sistemas');</script>";
        }
    } catch (Exception $e) {
        echo "<script>alert('Hubo un problema, contactarse con el Administrador de Sistemas');</script>";
    }
}
?>
<html>
  
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>REGISTRO</title>

    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&amp;display=fallback">
    <link rel="stylesheet" href="http://127.0.0.1/hospital/public/adminlte/plugins/fontawesome-free/css/all.min.css">
    <link rel="stylesheet" href="http://127.0.0.1/hospital/public/adminlte/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
    <link rel="stylesheet" href="http://127.0.0.1/hospital/public/adminlte/dist/css/adminlte.min.css?v=3.2.0">
</head>
<body class="register-page" style="min-height: 443.03px;">
    <div class="register-box">
        <div class="card shadow-2-strong"  style="border-radius: 1rem;">
            <div class="card-header text-center">
                <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-login-form/lotus.webp"
                style="width: 185px;" alt="logo"> <br>
                 <a class="h1"><b>REGISTRATE</b></a>
                <h6>HOSPITAL</h6> <br>
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
                        <input type="text" class="form-control" placeholder="Nombre" name="nombre">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-user"></span>
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
                    <div class="input-group mb-3">
                        <input type="password" class="form-control" placeholder="Repite Contraseña" name="pass1">
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
                            class="btn btn-primary btn-block fa-lg gradient-custom-2 mb-3">Registrar</button>
                        </div>
                    </div>
                </form>
                 <!-- Direccionando a register.php -->
                  <div class="text-end">
                    
                  </div>
                 <a href="<?php echo HTTP_BASE . '/login'; ?>" class="text-end">Ya tengo cuenta, iniciar sesión</a>
               
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
        
    }
    .login-box, .register-box {
        width: 450px;
        }
        

</style>

</html>
