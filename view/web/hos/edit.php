<?php require ROOT_VIEW . '/template/header.php'; ?>
<?php
$pId = $_GET['id'] ?? null;
$pAccion = $_GET['accion'] ?? null;
$hosent = new HttpClient(HTTP_BASE);

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $datajson = [
        'idpaciente' => $_POST['idpaciente'],
        'nombre' => $_POST['nombre'],
        'papellido' => $_POST['papellido'],
        'mapellido' => $_POST['mapellido'],
        'direccion' => $_POST['direccion'],
        'edad' => $_POST['edad'],
        'sexo' => $_POST['sexo'],
        'telefono' => $_POST['telefono']
    ];

    if ($pAccion == 'EDIT') {
        $result = $hosent->put('/controller/PacienteController.php', $datajson);
    } else if ($pAccion == 'NEW') {
        $result = $hosent->post('/controller/PacienteController.php', $datajson);
    } else if ($pAccion == 'DELETE') {
        $result = $hosent->delete('/controller/PacienteController.php', $datajson);
    }

    //var_dump($result);
    if ($result["ESTADO"]) {
        echo "<script>alert('Operación realizada con éxito.');</script>";
        if ($pAccion == 'DELETE') {
            echo "<script>window.location.href = '".HTTP_BASE."/web/hos/list';</script>";
        }
    } else {
        echo "<script>alert('Hubo un problema, se debe contactar con el administrador.');</script>";
    }
}

if ($pAccion == 'NEW') {
    $record = [
        'idpaciente' => '',
        'nombre' => '',
        'papellido' => '',
        'mapellido' => '',
        'direccion' => '',
        'edad' => '',
        'sexo'=> '',
        'telefono' => '',
    ];
} else {
    $responseData = $hosent->get('/controller/PacienteController.php', [
        'ope' => 'filterId',
        'idpaciente' => $pId,
    ]);
    $record = $responseData['DATA'][0];
}
?>

<!-- Main content -->
<section class="content-wrapper">
    <div class="container-fluid">
        <div class="card">
            <div class="card-header">
                <h5> Paciente</h5>
            </div>
            <div class="card-body">
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Registrar Paciente</h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <form action="" method="post">
                        <div class="card-body">
                            <div class="form-group">
                                <label for="fortxt01">Código Paciente</label>
                                <input id="fortxt01" type="text" class="form-control" placeholder="Código Paciente" name="idpaciente" 
                                value="<?php echo $record['idpaciente']; ?>" readonly>
                            </div>
                            <div class="form-group">
                                <label for="fortxt02">Nombre</label>
                                <input id="fortxt02" type="text" class="form-control" placeholder="Nombre" name="nombre" 
                                value="<?php echo $record['nombre']; ?>" 
                                <?php echo (($pAccion == 'VIEW' ? 'readonly' : ($pAccion == 'DELETE' ? 'readonly' : ''))) ?>>
                            </div>
                            <div class="form-group">
                                <label for="fortxt03">Apellido Paterno</label>
                                <input id="fortxt03" type="text" class="form-control" placeholder="Apellido Paterno" name="papellido" 
                                value="<?php echo $record['papellido']; ?>" 
                                <?php echo (($pAccion == 'VIEW' ? 'readonly' : ($pAccion == 'DELETE' ? 'readonly' : ''))) ?>>
                            </div>
                            <div class="form-group">
                                <label for="fortxt03">Apellido Materno</label>
                                <input id="fortxt03" type="text" class="form-control" placeholder="Apellido Materno" name="mapellido" 
                                value="<?php echo $record['mapellido']; ?>" 
                                <?php echo (($pAccion == 'VIEW' ? 'readonly' : ($pAccion == 'DELETE' ? 'readonly' : ''))) ?>>
                            </div>
                            <div class="form-group">
                                <label for="fortxt06">Dirección</label>
                                <input id="fortxt06" type="text" class="form-control" placeholder="Dirección" name="direccion" 
                                value="<?php echo $record['direccion']; ?>" <?php echo (($pAccion == 'VIEW' ? 'readonly' : ($pAccion == 'DELETE' ? 'readonly' : ''))) ?>>
                            </div>
                            <div class="form-group">
                                <label for="fortxt04">Edad</label>
                                <input id="fortxt04" type="text" class="form-control" placeholder="Edad" name="edad" 
                                value="<?php echo $record['edad']; ?>" <?php echo (($pAccion == 'VIEW' ? 'readonly' : ($pAccion == 'DELETE' ? 'readonly' : ''))) ?>>
                            </div>
                            <div class="form-group">
                                <label for="fortxt01">Sexo</label>
                                <input id="fortxt04" type="text" class="form-control" placeholder="Sexo" name="sexo" 
                                value="<?php echo $record['sexo']; ?>" <?php echo (($pAccion == 'VIEW' ? 'readonly' : ($pAccion == 'DELETE' ? 'readonly' : ''))) ?>>
                            </div>
                            <div class="form-group">
                                <label for="fortxt05">Teléfono</label>
                                <input id="fortxt05" type="text" class="form-control" placeholder="Teléfono" name="telefono" 
                                value="<?php echo $record['telefono']; ?>" <?php echo (($pAccion == 'VIEW' ? 'readonly' : ($pAccion == 'DELETE' ? 'readonly' : ''))) ?>>
                            </div>
                        </div>
                        <!-- /.card-body -->

                        <div class="card-footer">
                            <?php if ($pAccion != 'VIEW') :?>
                            <button type="submit" class="btn btn-primary"><?php echo ($pAccion == 'DELETE' ? 'ELIMINAR' : 'GUARDAR'); ?></button>
                            <?php endif;?>
                            <a href="<?php echo HTTP_BASE; ?>/web/hos/list" class="btn btn-primary">Volver</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div><!-- /.container-fluid -->
</section>
<!-- /.content -->
<!-- <?php require ROOT_VIEW . '/template/footer.php'; ?> -->
