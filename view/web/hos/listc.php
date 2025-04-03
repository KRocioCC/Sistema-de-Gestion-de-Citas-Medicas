<?php require ROOT_VIEW.'/template/header.php';?>
<?php  
 
$page = 1; 
$ope = 'filterSearch'; 
$filter = ''; 
$items_per_page = 10; 
$total_pages = 1; 
$response =""; 
if ($_SERVER['REQUEST_METHOD'] == 'POST') { 
    $page = isset($_POST['page']) ? $_POST['page'] : 1; 
    $filter = urlencode(trim(isset($_POST['filter']) ? $_POST['filter'] : '')); 
} 
$client = new HttpClient(HTTP_BASE); 
$page = isset($_POST['page']) ? $_POST['page'] : 1; 
$filter = isset($_POST['filter']) ? $_POST['filter'] : ''; 
 
$responseData = $client->get('/controller/CitaController.php', [ 
    'ope' => 'filterSearch', 
    'page' => $page, 
    'busqueda' => $filter, 
]); 
// var_dump($responseData); 
$records = $responseData['DATA']; 
$totalItems = $responseData['LENGHT']; 
?> 
    <!-- Main content --> 
<head>
    <title>Citas Registradas</title>
    <style>
        h5 {
            font-weight: bold;
            text-align: center;
            font-size: 30px;
            color: navy; /* Azul marino */
        }
        th {
            color: navy;
            text-align: center;
        }
    </style>
</head>

    <section class="content"> 
 
    <div class="container-fluid"> 
      <div class = "card"> 
        <!--  el encabezado --> 
        <div class = "card-header"> 
          <h5>Citas Agendadas</h5> 
        </div> 
        <div class = "card-header"> 
          <form action="" method = "POST"> 
            <div class="input-group"> 
                  <input type="search" class="form-control form-control-lg"  
                  placeholder="Buscar" name = "filter" 
                  value="<?php echo(isset($filter)?$filter:'')?>"> 
                  <div class="input-group-append"> 
                      <button type="submit" class="btn btn-lg btn-default"> 
                          <i class="fa fa-search"></i> 
                      </button> 
                  </div>  
            </div> 
          </form> 
        </div> 
        <div class="card-header">
          <a href="<?php echo HTTP_BASE; ?>/web/hos/newc/0" 
          class="btn btn-primary">Nuevo</a>
          <a href="<?php echo HTTP_BASE; ?>/report/rptcita.php" 
          target="_blank"
          class="btn btn-primary">Reporte</a>
        </div>
        <!--  la tablita --> 
        <div class = "card-body"> 
        <table class="table table-bordered"> 
          <thead> 
            <tr> 
              <th style="width: 190px">Opciones</th> 
              <!--<th style="width: 10px">#</th> -->
              <th>Idcita</th> 
              <th>Idpaciente</th> 
              <th>Iddoctor</th> 
              <th>Fecha cita</th> 
              <th>Motivo</th> 
              
 
            </tr> 
          </thead> 
          <tbody> 
            <?php foreach ($records as $row):?> 
            <tr> 
              <td><a href="<?php echo HTTP_BASE . "/web/hos/view/" . $row['idcita'];
               ?>" class="btn btn-success btn-sm">Ver</a>
               <a href="<?php echo HTTP_BASE . "/web/hos/editc/" . $row['idcita'];
               ?>" class="btn btn-primary btn-sm">Editar</a>
               <a href="<?php echo HTTP_BASE . "/web/hos/delete/" . $row['idcita'];
               ?>" class="btn btn-danger btn-sm">Eliminar</a></td> 
              <td><?php echo $row['idcita'];?></td> 
              <td><?php echo $row['idpaciente'];?></td> 
              <td><?php echo $row['iddoctor'];?></td> 
              <td><?php echo $row['fechacita'];?></td>
              <td><?php echo $row['motivo'];?></td> 
            </tr> 
            <?php endforeach;?> 
          </tbody> 
        </table> 
        </div> 
        <!--  la paginacion --> 
        <div class = "card-footer"> 
 
        </div> 

    </div> <!-- /.container-fluid --> 
    </section> 
    <!-- /.content --> 


<!-- <?php require ROOT_VIEW.'/template/footer.php';?> -->