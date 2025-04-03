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
 
$responseData = $client->get('/controller/PacienteController.php', [ 
    'ope' => 'filterSearch', 
    'page' => $page, 
    'busqueda' => $filter, 
]); 
// var_dump($responseData); 
$records = $responseData['DATA']; 
$totalItems = $responseData['LENGHT']; 
//paginacion
// Calcula el número total de páginas
$totalItems = $responseData['LENGHT'];
$total_pages = ceil($totalItems / $items_per_page);

$max_links = 5;
$half_max_link = floor($max_links / 2);
$start_page = $page - $half_max_link;
$end_page = $page + $half_max_link;

if ($start_page < 1) {
    $end_page += abs($start_page) + 1;
    $start_page = 1;
}
if ($end_page > $total_pages) {
    $start_page -= ($end_page - $total_pages);
    $end_page = $total_pages;
    if ($start_page < 1) {
        $start_page = 1;
    }
}
?> 
    <!-- Main content --> 
<head>
    <title>Pacientes Registrados</title>
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
          <h5>Pacientes Registrados</h5> 
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
          <a href="<?php echo HTTP_BASE; ?>/web/hos/new/0" 
          class="btn btn-primary">Nuevo</a>
          <a href="<?php echo HTTP_BASE; ?>/report/rptpaciente.php" 
          target="_blank"
          class="btn btn-primary">Reporte</a>
        </div>
        <!--  la tablita --> 
        <div class = "card-body"> 
        <table class="table table-bordered"> 
          <thead> 
            <tr> 
              <th style="width: 190px">Opciones</th> 
              <th style="width: 10px">#</th> 
              <th>Nombre</th> 
              <th>ApellidoPat</th> 
              <th>ApellidoMat</th> 
              <th>Direccion</th> 
              <th>Edad</th> 
              <th>Sexo</th> 
              <th>Telefono</th> 
 
            </tr> 
          </thead> 
          <tbody> 
            <?php foreach ($records as $row):?> 
            <tr> 
              <td><a href="<?php echo HTTP_BASE . "/web/hos/view/" . $row['idpaciente'];
               ?>" class="btn btn-success btn-sm">Ver</a>
               <a href="<?php echo HTTP_BASE . "/web/hos/edit/" . $row['idpaciente'];
               ?>" class="btn btn-primary btn-sm">Editar</a>
               <a href="<?php echo HTTP_BASE . "/web/hos/delete/" . $row['idpaciente'];
               ?>" class="btn btn-danger btn-sm">Eliminar</a></td> 
              <td><?php echo $row['idpaciente'];?></td> 
              <td><?php echo $row['nombre'];?></td> 
              <td><?php echo $row['papellido'];?></td> 
              <td><?php echo $row['mapellido'];?></td>
              <td><?php echo $row['direccion'];?></td> 
              <td><?php echo $row['edad'];?></td> 
              <td><?php echo $row['sexo'];?></td> 
              <td><?php echo $row['telefono'];?></td> 
            </tr> 
            <?php endforeach;?> 
          </tbody> 
        </table> 
        </div> 
        <!--  la paginacion --> 
        <div class="card-footer ">

            </div><div class="card-footer clearfix">
                                <ul class="pagination">
                                    <?php if ($page > 1) : ?>
                                        <li class="page-item">
                                            <form action="" method="POST">
                                                <input type="hidden" name="page" value="1">
                                                <button type="submit" class="page-link">Primera</button>
                                            </form>
                                        </li>
                                        <li class="page-item">
                                            <form action="" method="POST">
                                                <input type="hidden" name="page" value="<?php echo ($page - 1); ?>">
                                                <button type="submit" class="page-link">&laquo;</button>
                                            </form>

                                        </li>
                                    <?php endif; ?>
                                    <?php for ($i = $start_page; $i <= $end_page; $i++) : ?>
                                        <li class="page-item <?php echo ($page == $i ? 'active' : '') ?>">
                                            <form action="" method="POST">
                                                <input type="hidden" name="page" value="<?php echo ($i); ?>">
                                                <button type="submit" class="page-link"><?php echo ($i); ?></button>
                                            </form>
                                        </li>
                                    <?php endfor; ?>
                                    <?php if ($page < $total_pages) : ?>
                                        <li class="page-item">
                                            <form action="" method="POST">
                                                <input type="hidden" name="page" value="<?php echo ($page+1);?>">
                                                <button type="submit" class="page-link">&raquo;</button>
                                            </form>
                                        </li>
                                        <li class="page-item">
                                            <form action="" method="POST">
                                                <input type="hidden" name="page" value="<?php echo $total_pages; ?>">
                                                <button type="submit" class="page-link">Ultima </button>
                                            </form>

                                        </li>
                                    <?php endif; ?>


                                </ul>
                            </div>
        </div>
        <!-- /.row (main row) -->
    </div><!-- /.container-fluid -->
</section>
<!-- /.content -->
<!-- <?php require ROOT_VIEW . '/template/footer.php'; ?> -->