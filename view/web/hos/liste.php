<?php require ROOT_VIEW.'/template/header.php'; ?>
<?php
$page = 1;
$ope = 'filterSearch';
$filter = '';
$items_per_page = 10;
$total_pages = 1;
$response = "";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $page = isset($_POST['page']) ? $_POST['page'] : 1;
    $filter = urlencode(trim(isset($_POST['filter']) ? $_POST['filter'] : ''));
}

$client = new HttpClient(HTTP_BASE);
$page = isset($_POST['page']) ? $_POST['page'] : 1;
$filter = isset($_POST['filter']) ? $_POST['filter'] : '';

$responseData = $client->get('/controller/EspecialidadController.php', [
    'ope' => 'filterSearch',
    'page' => $page,
    'busqueda' => $filter,
]);

// Debug para ver los datos obtenidos
//var_dump($responseData);

$records = $responseData['DATA'];
$totalItems = $responseData['LENGHT'];
?>

<head>
    <title>Especialidades Registradas</title>
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
            <div class="card">
                <!-- el encabezado -->
                <div class="card-header">
                    <h5>Especialidades Registradas</h5>
                </div>
                <div class="card-header">
                    <form action="" method="POST">
                        <div class="input-group">
                            <input type="search" class="form-control form-control-lg" placeholder="Buscar" name="filter" value="<?php echo(isset($filter)?$filter:'')?>">
                            <div class="input-group-append">
                                <button type="submit" class="btn btn-lg btn-default">
                                    <i class="fa fa-search"></i>
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="card-header">
                    <a href="<?php echo HTTP_BASE; ?>/web/hos/newe/0" 
                    class="btn btn-primary">Nuevo</a>
                    <a href="<?php echo HTTP_BASE; ?>/report/rptespecialidad.php" 
                    target="_blank"
                    class="btn btn-primary">Reporte</a>
                </div>
                <!-- la tabla -->
                <div class="card-body">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th style="width: 190px">Opciones</th>
                                <th style="width: 10px">ID ESP</th>
                                <th>ID Doctor</th>
                                <th>Nombre de la Especialidad</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($records as $row): ?>
                            <tr>
                                <td>
                                    <a href="<?php echo HTTP_BASE . "/web/hos/viewe/" . $row['idespe']; ?>" class="btn btn-success btn-sm">Ver</a>
                                    <a href="<?php echo HTTP_BASE . "/web/hos/edite/" . $row['idespe']; ?>" class="btn btn-primary btn-sm">Editar</a>
                                    <a href="<?php echo HTTP_BASE . "/web/hos/deletee/" . $row['idespe']; ?>" class="btn btn-danger btn-sm">Eliminar</a>
                                </td>
                                <td><?php echo $row['idespe'];?></td>
                                <td><?php echo $row['iddoctor'];?></td>
                                <td><?php echo $row['nombre_espe'];?></td>
                            </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
                <!-- la paginacion -->
                <div class="card-footer">
                    <!-- Aquí puedes agregar la paginación si es necesario -->
                </div>
            </div>
        </div> <!-- /.container-fluid -->
    </section>
    <!-- /.content -->


<?php require ROOT_VIEW.'/template/footer.php'; ?>
