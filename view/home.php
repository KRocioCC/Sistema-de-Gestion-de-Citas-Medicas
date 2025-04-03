<!-- importamos header y footer -->
<?php require ROOT_VIEW.'/template/header.php'; ?>

<style>
body {
  background-color: #faf8fb; /* Cambia este color al que prefieras */
  /* padding-top: 80px; Ajusta este valor al alto del navbar */
}
.card {
    transition: transform 0.3s ease, box-shadow 0.3s ease;
    margin-bottom: 40px;
   
}

.card:hover {
    transform: translateY(-30px); /* Eleva la tarjeta hacia arriba */
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2); /* Agrega sombra para un efecto de elevación */
}


.card-title {
    color: #a64d79;
    font-size: 1.2rem;
    text-align: center;
    font-weight: bold;
}


.card-text {
  text-align: justify;
}

.container h2 {
  margin-top: 40px;
  margin-bottom: 40px;
  font-weight: 700;
}

.custom-logo {
  max-width: 150px;
  height: 130px;
}

.custom-img-container {
  display: flex;
  justify-content: center;
}

.custom-img {
  max-width: 300px;
  height: 150px;
}

.text-center {
  font-weight: normal;
  
}

.text {
  font-weight: normal;
}


.carousel-container {
  margin: 0 auto;
  padding: 10px;
  max-width: 97%;
}
.titulo {
  font-weight: bold;


}
.contacto {
    display: flex;
    justify-content: center; /* Centra horizontalmente el contenido */
    align-items: center; /* Centra verticalmente el contenido */
    height: 40%; /* Asegura que el contenedor ocupe todo el espacio vertical disponible */
    padding: 0px; /* Añade padding opcional */
    background : white;
}

.card-body {
    display: flex;
    flex-direction: column;
    justify-content: center; /* Centra el contenido verticalmente dentro de la tarjeta */
    align-items: center; /* Centra el contenido horizontalmente dentro de la tarjeta */
    text-align: center; /* Centra el texto dentro de la tarjeta */
}
.texto-contacto {
    font-size: 1.8rem; /* Ajusta el tamaño de la fuente según tus necesidades */
    line-height: 1.5; /* Ajusta el espaciado entre líneas para mejorar la legibilidad */
    color: #333; /* Cambia el color del texto si es necesario */
}


</style>

<!-- Content Header (Page header) -->
<div class="content-header">
  <div class="container-fluid">
    <div class="row align-items-center mb-2">

      <div class="col-md-2">
        <img src="<?php echo URL_RESOURCES; ?>adminlte/dist/img/logo.jpg" class="img-fluid custom-logo" alt="Logo Hospital">
      </div><!-- /.col -->
      <div class="col-md-8 text-center">
        <h2 class="titulo">HOSPITAL DE CLINICAS LA PAZ</h2>
        <h3 class="text">Sistema de gestión de citas médicas</h3>
      </div><!-- /.col -->
    </div><!-- /.row -->
  </div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->

<!-- Main content -->
<div class="carousel-container">
  <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
    <ol class="carousel-indicators">
      <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
      <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
      <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
    </ol>
    <div class="carousel-inner">
    <div class="carousel-item">
        <img class="d-block w-100" src="<?php echo URL_RESOURCES; ?>adminlte/dist/img/hospi3.jpg" alt="Second slide" width="1230" height="550">
      </div>
      <div class="carousel-item active">
        <img class="d-block w-100" src="<?php echo URL_RESOURCES; ?>adminlte/dist/img/Cirugia.jpg" alt="First slide" width="1230" height="550">
      </div>
      
      <div class="carousel-item">
        <img class="d-block w-100" src="<?php echo URL_RESOURCES; ?>adminlte/dist/img/hospi4.jpg" alt="Third slide" width="1230" height="550">
      </div>
    </div>
    <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="sr-only">Previous</span>
    </a>
    <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="sr-only">Next</span>
    </a>
  </div>
</div>
<!-- /.content -->

<!-- Sección de Funcionalidades Principales -->
<div class="container mt-5">
  <h2 class="text-center">Funcionalidades Principales</h2>
  <div class="row text-center mt-4">
    <div class="col-md-4 mb-3">
      <div class="card border-info">
        <div class="card-body">
          <h3 class="card-title">Gestión de Citas</h3>
          <p class="card-text">
            La gestión de citas permite al hospital programar, modificar y cancelar las citas médicas de manera eficiente. lo que facilita la organización 
            y reduce el número de no presentaciones. 
            El administrador puede asignar citas a diferentes médicos, ajustar horarios y gestionar los recursos disponibles. 
            Este sistema facilita la organización general
          </p>
        </div>
      </div>
    </div>
    <div class="col-md-4 mb-3">
      <div class="card border-info">
        <div class="card-body">
          <h3 class="card-title">Registro de Pacientes</h3>
          <p class="card-text">
            El registro de pacientes ofrece una forma sencilla y organizada de mantener una base de datos actualizada con toda 
            la información relevante de los pacientes, incluyendo datos personales y detalles de contacto. 
            Esta funcionalidad permite a los profesionales de la salud acceder rápidamente a la información del paciente y 
            gestionar los datos de manera segura.
          </p>
        </div>
      </div>
    </div>
    <div class="col-md-4 mb-3">
      <div class="card border-info">
        <div class="card-body">
        <h3 class="card-title">Generación de Reportes</h3>
          <p class="card-text">
            La generación de reportes ofrece una visión detallada sobre la gestión de citas, la asistencia de 
            pacientes y el rendimiento de los servicios médicos. Los informes pueden personalizarse para mostrar datos relevantes 
            sobre diferentes aspectos de la operación del hospital, ayudando en la toma de decisiones informadas y en la mejora 
            continua de los procesos.
          </p>
        </div>
      </div>
    </div>
  </div>
</div>


<!-- Sección de Uso del Sistema -->
<div class="container mt-5">
  <h2 class="text-center">Cómo Usar el Sistema</h2>
  <div class="row mt-4">
    <div class="col-md-6 mb-3">
      <div class="card">
        <div class="card-body">
          <h4 class="card-title">Programar una Cita</h4>
          <p class="card-text">Cada paciente y médico tiene un id en los registros del sistema, 
            Seleccione el paciente y el médico que requiera la cita, elija la fecha, motivo y confirme la cita.</p>
        </div>
      </div>
    </div>
    <div class="col-md-6 mb-3">
      <div class="card">
        <div class="card-body">
          <h4 class="card-title">Modificar una Cita</h4>
          <p class="card-text">En el menú seleccione "citas agendadas" y encuentre la cita que necesita modificar,
            presione en "editar", realice los cambios necesarios y guarde la actualización.</p>
        </div>
      </div>
    </div>
  </div>
  <div class="row mt-4">
    <div class="col-md-6 mb-3">
      <div class="card">
        <div class="card-body">
          <h4 class="card-title">Cancelar una Cita</h4>
          <p class="card-text">Seleccione citas agendadas en el menú,
            busque la cita en especifico a cancelar y presione "eliminar" y 
            se realizará con éxito la eliminación de esa cita.</p>
        </div>
      </div>
    </div>
    <div class="col-md-6 mb-3">
      <div class="card">
        <div class="card-body">
          <h4 class="card-title">Generar Reportes</h4>
          <p class="card-text">Acceda a la sección de reportes, seleccione el reporte que desee
            ya sea de pacientes, doctores, citas médicas o especialidades y genere el documento necesario.</p>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- Sección de Equipo Médico -->
<div class="container mt-5">
  <h2 class="text-center">Nuestro Equipo Médico</h2>
  <div class="row text-center mt-4">
    <div class="col-md-3 mb-3">
      <div class="card">
        <img class="card-img-top" src="<?php echo URL_RESOURCES; ?>adminlte/dist/img/doctor3.jpg"  width="30" height="200" alt="Doctor 1">
        <div class="card-body">
          <h5 class="card-title">Dr. Pedro Gómez</h5>
          <p class="card-text">Cardiólogo</p>
        </div>
      </div>
    </div>
    <div class="col-md-3 mb-3">
      <div class="card">
      <img class="card-img-top" src="<?php echo URL_RESOURCES; ?>adminlte/dist/img/doctora.jpg"  width="30" height="200" alt="Doctor 2">
        <div class="card-body">
          <h5 class="card-title">Dra. Ana Martínez</h5>
          <p class="card-text">Pediatra</p>
        </div>
        </div>
    </div>
    <div class="col-md-3 mb-3">
      <div class="card">
      <img class="card-img-top" src="<?php echo URL_RESOURCES; ?>adminlte/dist/img/doctor2.jpg"  width="30" height="200" alt="Doctor 3">
        <div class="card-body">
          <h5 class="card-title">Dr. Marco Rodriguez</h5>
          <p class="card-text">Neurocirujano</p>
        </div>
      </div>
    </div>
    <div class="col-md-3 mb-3">
      <div class="card">
      <img class="card-img-top" src="<?php echo URL_RESOURCES; ?>adminlte/dist/img/doctor1.jpg"  width="30" height="200" alt="Doctor 4">
        <div class="card-body">
          <h5 class="card-title">Dra. Luis Chavez</h5>
          <p class="card-text">Traumatologo</p>
        </div>
      </div>
    </div>
  </div>
</div>


<!-- Sección de Contacto para Soporte -->

      <div class="contacto">
        <div class="card-body text-center">
          <h2 class="texto-contacto">Contacto para Soporte</h2>
          <p>Si necesita ayuda con el sistema, por favor contacte al equipo de soporte técnico.</p>
          <p>Email: soporte@hospitalclinicaslapaz.bo</p>
          <p>Teléfono: +591 2 1234567</p>
        </div>
      </div>


<!-- /.content-wrapper -->
<!-- <?php require ROOT_VIEW.'/template/footer.php'; ?> -->
