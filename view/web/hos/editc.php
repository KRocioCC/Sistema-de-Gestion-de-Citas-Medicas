<?php require ROOT_VIEW . '/template/header.php'; ?>
<?php
$pId = $_GET['id'] ?? null;
$pAccion = $_GET['accion'] ?? null;
//echo $pAccion;
$hosent = new HttpClient(HTTP_BASE);

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $datajson = [
        'idcita' => $_POST['idcita'],
        'idpaciente' => $_POST['idpaciente'],
        'iddoctor' => $_POST['iddoctor'],
        'fechacita' => $_POST['fechacita'],
        'motivo' => $_POST['motivo']
    ];
    
    if ($pAccion == 'EDIT') {
        $result = $hosent->put('/controller/CitaController.php', $datajson);
    } else if ($pAccion == 'NEW') {
        $result = $hosent->post('/controller/CitaController.php', $datajson);
    } else if ($pAccion == 'DELETE') {
        $result = $hosent->delete('/controller/CitaController.php', $datajson);
    }
    
    if ($result["ESTADO"]) {
        echo "<script>alert('Operacion realizada con Exito.');</script>";
        if ($pAccion == 'DELETE') {
            echo "<script>window.location.href = '".HTTP_BASE."/web/hos/listc';</script>";
        }
    } else {
        echo "<script>alert('Hubo un problema, se debe contactar con el administrador.');</script>";
    }
}

if ($pAccion == 'NEW') {
    $record = [
        'idcita' => '',
        'idpaciente' => '',
        'iddoctor' => '',
        'fechacita' => '',
        'motivo' => ''
    ];
} else {
    $responseData = $hosent->get('/controller/CitaController.php', [
        'ope' => 'filterId',
        'idcita' => $pId
    ]);
    
    // Verificamos que $responseData['DATA'] esté definido y no esté vacío
    if (isset($responseData['DATA']) && !empty($responseData['DATA'])) {
        $record = $responseData['DATA'][0];
    } else {
        // Proporcionamos valores predeterminados en caso de que no haya datos disponibles
        $record = [
           'idcita' => '',
            'idpaciente' => '',
            'iddoctor' => '',
            'fechacita' => '',
            'motivo' => ''
        ];
    }
}
?>
<!-- Main content -->
<section class="content">
    <div class="container-fluid">
        <div class="card">
            <div class="card-header">
                <h5> Cita</h5>
            </div>
            <div class="card-body">
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Agendar Cita</h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <form action="" method="post">
                        <div class="card-body">
                            <div class="form-group">
                                <label for="fortxt01">Codigo Cita</label>
                                <input id="fortxt01" type="text" class="form-control" placeholder="Codigo Cita" name="idcita" 
                                value="<?php echo $record['idcita']; ?>" readonly>
                            </div>
                            <div class="form-group">
                                <label for="fortxt02">Codigo Paciente</label>
                                <input id="fortxt02" type="text" class="form-control" placeholder="codigo Paciente " name="idpaciente" 
                                value="<?php echo $record['idpaciente']; ?>"
                                <?php echo (($pAccion == 'VIEW' || $pAccion == 'DELETE') ? 'readonly' : ''); ?>>
                            </div>
                            <div class="form-group">
                                <label for="fortxt03">Codigo Doctor</label>
                                <input id="fortxt03" type="text" class="form-control" placeholder="iddoctor " name="iddoctor" 
                                value="<?php echo $record['iddoctor']; ?>" 
                                <?php echo (($pAccion == 'VIEW' || $pAccion == 'DELETE') ? 'readonly' : ''); ?>>
                            </div>
                            <div class="form-group">
                                <label for="fortxt03">Fecha Cita</label>
                                <input id="fortxt03" type="text" class="form-control" placeholder="fechacita " name="fechacita"
                                 value="<?php echo $record['fechacita']; ?>" 
                                <?php echo (($pAccion == 'VIEW' || $pAccion == 'DELETE') ? 'readonly' : ''); ?>>
                            </div>
                            <div class="form-group">
                                <label for="fortxt06">Motivo</label>
                                <input id="fortxt06" type="text" class="form-control" placeholder="motivo " name="motivo"
                                 value="<?php echo $record['motivo']; ?>" 
                                 <?php echo (($pAccion == 'VIEW' || $pAccion == 'DELETE') ? 'readonly' : ''); ?>>
                            </div>
                        </div>
                        <!-- /.card-body -->
                        <div class="card-footer">
                            <?php if ($pAccion != 'VIEW') : ?>
                            <button type="submit" class="btn btn-primary"><?php echo ($pAccion == 'DELETE' ? 'ELIMINAR' : 'GUARDAR'); ?></button>
                            <?php endif; ?>
                            <a href="<?php echo HTTP_BASE; ?>/web/hos/listc" class="btn btn-primary">Volver</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div><!-- /.container-fluid -->
</section>
<!-- /.content -->
<!-- <?php require ROOT_VIEW . '/template/footer.php'; ?> -->
