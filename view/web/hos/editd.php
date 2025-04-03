<?php require ROOT_VIEW . '/template/header.php'; ?>
<?php
$pId = $_GET['id'] ?? null;
$pAccion = $_GET['accion'] ?? null;
//echo $pAccion;
$hosent = new HttpClient(HTTP_BASE);
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $datajson = [
        'iddoctor' => $_POST['iddoctor'],
        'nombre' => $_POST['nombre'],
        'papellido' => $_POST['papellido'],
        'mapellido' => $_POST['mapellido'],
        'direccion' => $_POST['direccion'],
        'edad' => $_POST['edad'],
        'sexo' => $_POST['sexo'],
        'telefono' => $_POST['telefono']
        
    ];
    if ($pAccion == 'EDIT') {
        $result = $hosent->put('/controller/DoctorController.php', $datajson);
    } else if ($pAccion == 'NEW') {
        $result = $hosent->post('/controller/DoctorController.php', $datajson);
    } else  if ($pAccion == 'DELETE') {
        $result = $hosent->delete('/controller/DoctorController.php', $datajson);
    }
    //var_dump($result);--------------------------------------------------------------------------------------------------
    if ($result["ESTADO"]) {
        echo "<script>alert('Operacion realizada con Exito.');</script>";
        if ($pAccion == 'DELETE') {
            echo "<script>window.location.href = '".HTTP_BASE."/web/hos/listd';</script>";
        }
    } else {
        echo "<script>alert('Hubo un problema, se debe contactar con el adminsitrador.');</script>";
    }
}
if($pAccion == 'NEW')
{
    $record =  [
        'iddoctor' => '',
        'nombre' => '',
        'papellido' => '',
        'mapellido' => '',
        'direccion' => '',
        'edad' => '',
        'sexo'=> '',
        'telefono' => '',
        
        
    ];
}else{
    $responseData = $hosent->get('/controller/DoctorController.php', [
        'ope' => 'filterId',
        'iddoctor' => $pId,
    ]);
    $record = $responseData['DATA'][0];
}
//var_dump($record);
?>
<!-- Main content -->
<section class="content-wrapper">
    <div class="container-fluid">
        <div class="card">
            <div class="card-header">
                <h5> Doctor</h5>
            </div>
            <div class="card-body">
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Registrar Doctor</h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <form action="" method="post">
                        <div class="card-body">
                            <div class="form-group">
                                <label for="fortxt01">Codigo Doctor</label>
                                <input id="fortxt01" type="text" class="form-control" placeholder="Codigo Doctor " name="iddoctor" value="<?php echo $record['iddoctor']; ?>" readonly>
                            </div>
                            <div class="form-group">
                                <label for="fortxt02">Nombre</label>
                                <input id="fortxt02" type="text" class="form-control" placeholder="Nombre " name="nombre" value="<?php echo $record['nombre']; ?>" 
                                <?php echo (($pAccion == 'VIEW' ? 'readonly' : ($pAccion == 'DELETE' ? 'readonly' : ''))) ?>>
                            </div>
                            <div class="form-group">
                                <label for="fortxt03">Apellido Paterno</label>
                                <input id="fortxt03" type="text" class="form-control" placeholder="papellidos " name="papellido" value="<?php echo $record['papellido']; ?>" 
                                <?php echo (($pAccion == 'VIEW' ? 'readonly' : ($pAccion == 'DELETE' ? 'readonly' : ''))) ?>>
                            </div>
                            <div class="form-group">
                                <label for="fortxt03">Apellido Materno</label>
                                <input id="fortxt03" type="text" class="form-control" placeholder="mapellidos " name="mapellido" value="<?php echo $record['mapellido']; ?>" 
                                <?php echo (($pAccion == 'VIEW' ? 'readonly' : ($pAccion == 'DELETE' ? 'readonly' : ''))) ?>>
                            </div>
                            <div class="form-group">
                                <label for="fortxt06">Direccion</label>
                                <input id="fortxt06" type="text" class="form-control" placeholder="Direccion " name="direccion" value="<?php echo $record['direccion']; ?>" <?php echo (($pAccion == 'VIEW' ? 'readonly' : ($pAccion == 'DELETE' ? 'readonly' : ''))) ?>>
                            </div>
                            <div class="form-group">
                                <label for="fortxt04">Edad</label>
                                <input id="fortxt04" type="text" class="form-control" placeholder="Edad " name="edad" value="<?php echo $record['edad']; ?>" <?php echo (($pAccion == 'VIEW' ? 'readonly' : ($pAccion == 'DELETE' ? 'readonly' : ''))) ?>>
                            </div>
                            <div class="form-group">
                                <label for="fortxt01">Sexo</label>
                                <input id="fortxt04" type="text" class="form-control" placeholder="Sexo " name="sexo" value="<?php echo $record['sexo']; ?>" <?php echo (($pAccion == 'VIEW' ? 'readonly' : ($pAccion == 'DELETE' ? 'readonly' : ''))) ?>>
                            </div>
                            <div class="form-group">
                                <label for="fortxt05">Telefono</label>
                                <input id="fortxt05" type="text" class="form-control" placeholder="Telefono" name="telefono" value="<?php echo $record['telefono']; ?>" <?php echo (($pAccion == 'VIEW' ? 'readonly' : ($pAccion == 'DELETE' ? 'readonly' : ''))) ?>>
                            </div>
                        </div>
                        <!-- /.card-body -->

                        <div class="card-footer">
                            <?php if ($pAccion != 'VIEW') :?>
                            <button type="submit" class="btn btn-primary"><?php echo ($pAccion == 'DELETE' ? 'ELIMINAR' : 'GUARDAR'); ?></button>
                            <?php endif;?>
                            <a href="<?php echo HTTP_BASE; ?>/web/hos/listd" class="btn btn-primary">Volver</a>
                        </div>
                    </form>
                </div>
            </div>

        </div>

    </div><!-- /.container-fluid -->
</section>
<!-- /.content -->
<?php require ROOT_VIEW . '/template/footer.php'; ?>