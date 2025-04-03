<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: PUT, GET, POST");
header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");
header("Content-Type: application/json; charset=UTF-8");


session_start();

require_once($_SERVER['DOCUMENT_ROOT'] . "/hospital/config/global.php");

require_once(ROOT_DIR . "/model/CitaModel.php");



$method = $_SERVER['REQUEST_METHOD'];
$input = json_decode(file_get_contents('php://input'), true);

try {
    $Path_Info = isset($_SERVER['PATH_INFO']) ? $_SERVER['PATH_INFO'] : 
    (isset($_SERVER['ORIG_PATH_INFO']) ? $_SERVER['ORIG_PATH_INFO'] : '');
    $request = explode('/', trim($Path_Info, '/'));
} catch (Exception $e) {
    echo $e->getMessage();
}
switch ($method) {
    case 'GET': //consulta

        $p_ope = !empty($input['ope']) ? $input['ope'] : $_GET['ope'];
        if (!empty($p_ope)) {

            if ($p_ope == 'filterId') {
                filterId($input);
            } elseif ($p_ope == 'filterSearch') {
                filterPaginateAll($input);
            } elseif ($p_ope ==  'filterall') {
                filterAll($input);
            }
        }

        break;
    case 'POST': //inserta
        insert($input);
        break;
    case 'PUT': //actualiza
        update($input);
        break;
    case 'DELETE': //elimina
       
        delete($input);
        break;
    default: //metodo NO soportado
        echo 'METODO NO SOPORTADO';
        break;
}
function filterAll($input){
    $tobj = new CitaModel();
    $var = $tobj->findAll();
    echo json_encode($var);
}
function filterId($input){
    $p_idcita = !empty($input['idcita'])?$input['idcita']:
    $_GET['idcita'];
    $tobj = new CitaModel();
    $var = $tobj->findID($p_idcita);
    echo json_encode($var);
}
function  filterPaginateAll($input)
{
    $page = !empty($input['page'])?$input['page']:
    $_GET['page'];
    $p_busqueda = !empty($input['busqueda'])?$input['busqueda']:
    $_GET['busqueda'];
    $nro_record_page = 10;
    $p_limit = 10;
    $p_offset = 0;
    $p_offset = abs(($page - 1) * $nro_record_page);
    $tobj = new CitaModel();
    $var = $tobj->findPaginateAll($p_limit, $p_offset, $p_busqueda);
    echo json_encode($var);

}
function insert($input){
    // $p_idcita = !empty($input['idcita'])?$input['idcita']:$_POST['idcita'];
    $p_idpaciente = !empty($input['idpaciente'])?$input['idpaciente']:$_POST['idpaciente'];
    $p_iddoctor= !empty($input['iddoctor'])?$input['iddoctor']:$_POST['iddoctor'];
    $p_fechacita = !empty($input['fechacita'])?$input['fechacita']:$_POST['fechacita'];
    $p_motivo = !empty($input['motivo'])?$input['motivo']:$_POST['motivo'];
   
    $tobj = new CitaModel();
    $var = $tobj->insert(
        $p_idpaciente,
        $p_iddoctor,
        $p_fechacita,
        $p_motivo
       );
    echo json_encode($var);
}
function update($input){
    
    $p_idcita = !empty($input['idcita'])?$input['idcita']:$_POST['idcita'];
    $p_idpaciente = !empty($input['idpaciente'])?$input['idpaciente']:$_POST['idpaciente'];
    $p_iddoctor= !empty($input['iddoctor'])?$input['iddoctor']:$_POST['iddoctor'];
    $p_fechacita = !empty($input['fechacita'])?$input['fechacita']:$_POST['fechacita'];
    $p_motivo = !empty($input['motivo'])?$input['motivo']:$_POST['motivo'];
    
    $tobj = new CitaModel();
    $var = $tobj->update(
        $p_idcita,
        $p_idpaciente,
        $p_iddoctor,
        $p_fechacita,
        $p_motivo
            );
    echo json_encode($var);
}
function delete($input){
    $p_idcita = !empty($input['idcita'])?$input['idcita']:$_POST['idcita'];
    $tobj = new PacienteModel();
    $var = $tobj->delete($p_idcita);
    echo json_encode($var);
}