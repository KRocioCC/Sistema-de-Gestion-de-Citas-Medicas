<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Hospital</title>
  
  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
  
  <!-- Estilos personalizados -->
  <link rel="stylesheet" href="../public/css/styles.css">

  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?php echo URL_RESOURCES; ?>adminlte/plugins/fontawesome-free/css/all.min.css">
  
  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo URL_RESOURCES; ?>adminlte/dist/css/adminlte.min.css">
  
  <style>
    .navbar-custom {
      background-color: #f1e8f4;
      padding: 1rem 2rem; /* Ajusta el padding para hacer el navbar más grueso */
    }
    
    .navbar-custom .nav-link {
      font-size: 1.1rem; /* Ajusta el tamaño de la fuente si es necesario */
    }
    
    .navbar-custom .navbar-brand img {
      max-width: 60px; 
      height: auto; 
    }
    
    
  </style>
</head>
<body>
  <nav class="navbar navbar-expand-lg navbar-light navbar-custom navbar-fixed-top">
    <div class="container-fluid">
      <a class="navbar-brand" href="/hospital/home.php">
        <!-- <img src="<?php echo URL_RESOURCES; ?>adminlte/dist/img/image.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">   -->
      </a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <a href="/hospital" class="nav-link active" style="color: #7B5BAB; font-weight: bold;">
            Home
            <span class="badge bg-danger"></span>
            </a>
          </li>


          <li class="nav-item">
            <a href="<?php echo HTTP_BASE;?>/logout" class="nav-link active">
              <i class="fas fa-sign-out-alt nav-icon"></i>
              Salir Sesión
              <span class="badge bg-danger">IS</span>
            </a>
          </li>
          <li class="nav-item">
            <a href="<?php echo HTTP_BASE;?>/web/hos/list" class="nav-link active">
              Pacientes
              <span class="badge bg-primary">RegisPac</span>
            </a>
          </li>
          <li class="nav-item">
            <a href="<?php echo HTTP_BASE;?>/web/hos/listc" class="nav-link active">
              Citas Agendadas
              <span class="badge bg-primary">Regiscita</span>
            </a>
          </li>
          <li class="nav-item">
            <a href="<?php echo HTTP_BASE;?>/web/hos/listd" class="nav-link active">
              Doctores
            </a>
          </li>
          <li class="nav-item">
            <a href="<?php echo HTTP_BASE;?>/web/hos/liste" class="nav-link active">
              Especialidades
            </a>
          </li>
          
        </ul>
        <form class="d-flex" role="search">
          <input class="form-control me-2" type="search" placeholder="Buscar" aria-label="Search">
          <button class="btn btn-outline-success" type="submit">Buscar</button>
        </form>
      </div>
    </div>
  </nav>
  
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
