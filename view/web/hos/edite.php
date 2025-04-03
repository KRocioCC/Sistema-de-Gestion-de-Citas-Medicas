<?php require ROOT_VIEW . '/template/header.php'; ?>
<?php
$pId = $_GET['id'] ?? null;
$pAccion = $_GET['accion'] ?? null;
// echo $pAccion;
$hosent = new HttpClient(HTTP_BASE);
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $datajson = [
        'idespe' => $_POST['idespe'],
        'iddoctor' => $_POST['iddoctor'],
        'nombre_espe' => $_POST['nombre_espe']
        
    ];
    if ($pAccion == 'EDIT') {
        $result = $hosent->put('/controller/EspecialidadController.php', $datajson);
    } else if ($pAccion == 'NEW') {
        $result = $hosent->post('/controller/EspecialidadController.php', $datajson);
    } else  if ($pAccion == 'DELETE') {
        $result = $hosent->delete('/controller/EspecialidadController.php', $datajson);
    }
    // var_dump($result);
    if ($result["ESTADO"]) {
        echo "<script>alert('Operacion realizada con Exito.');</script>";
        if ($pAccion == 'DELETE') {
            echo "<script>window.location.href = '".HTTP_BASE."/web/hos/liste';</script>";
        }
    } else {
        echo "<script>alert('Hubo un problema, se debe contactar con el adminsitrador.');</script>";
    }
}
if($pAccion == 'NEW')
{
    $record =  [
        'idespe' => '',
        'iddoctor' => '',
        'nombre_espe' => '',
    ];
}else{
    $responseData = $hosent->get('/controller/EspecialidadController.php', [
        'ope' => 'filterId',
        'idespe' => $pId,
    ]);
    $record = $responseData['DATA'][0];
    // var_dump($responseData); // Añade esta línea para depurar
}
// var_dump($record);
?>
<!-- Main content -->
<section class="content">
    <div class="container-fluid">
        <div class="card">
            <div class="card-header">
                <h5> Especialidad</h5>
            </div>
            <div class="card-body">
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Editar Especialidad</h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <form action="" method="post">
                        <div class="card-body">
                            <div class="form-group">
                                <label for="fortxt01">Codigo Especialidad</label>
                                <input id="fortxt01" type="text" class="form-control" placeholder="Codigo Especialidad " name="idespe" 
                                value="<?php echo $record['idespe']; ?>" readonly>
                            </div>
                            <div class="form-group">
                                <label for="fortxt02">id_doctor</label>
                                <input id="fortxt02" type="text" class="form-control" placeholder="iddoctor " name="iddoctor" 
                                value="<?php echo $record['iddoctor']; ?>" 
                                <?php echo (($pAccion == 'VIEW' ? 'readonly' : ($pAccion == 'DELETE' ? 'readonly' : ''))) ?>>
                            </div>
                            <div class="form-group">
                                <label for="fortxt03">nombre_espe</label>
                                <input id="fortxt03" type="text" class="form-control" placeholder="nombre_espe" name="nombre_espe" 
                                value="<?php echo $record['nombre_espe']; ?>" 
                                <?php echo (($pAccion == 'VIEW' ? 'readonly' : ($pAccion == 'DELETE' ? 'readonly' : ''))) ?>>
                            </div>
                        </div>
                        <!-- /.card-body -->

                        <div class="card-footer">
                            <?php if ($pAccion != 'VIEW') :?>
                            <button type="submit" class="btn btn-primary"><?php echo ($pAccion == 'DELETE' ? 'ELIMINAR' : 'GUARDAR'); ?></button>
                            <?php endif;?>
                            <a href="<?php echo HTTP_BASE; ?>/web/hos/liste" class="btn btn-primary">Volver</a>
                        </div>
                    </form>
                </div>
            </div>

        </div>

    </div><!-- /.container-fluid -->
</section>
<!-- /.content -->
<!-- <?php require ROOT_VIEW . '/template/footer.php'; ?> -->