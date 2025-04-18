<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: PUT, GET, POST");
header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");
header("Content-Type: application/json; charset=UTF-8");

/*
 * login ---> verifica si los datos del usuario son validas o no 
 *      devuelve un mensaje si es incorrecto 
 * register ---> permite crear una cuenta con la que luego puede logearse
 * logout ---> Cierra la sesion del usuario
 */
session_start();

require_once($_SERVER['DOCUMENT_ROOT'] . "/hospital/config/global.php");

require_once(ROOT_DIR . "/model/UsuarioModel.php");


$method = $_SERVER['REQUEST_METHOD'];
$input = json_decode(file_get_contents('php://input'), true);

try {
    $Path_Info = isset($_SERVER['PATH_INFO']) ? $_SERVER['PATH_INFO'] : (isset($_SERVER['ORIG_PATH_INFO']) ? $_SERVER['ORIG_PATH_INFO'] : '');
    $request = explode('/', trim($Path_Info, '/'));
} catch (Exception $e) {
    echo $e->getMessage();
}
switch ($method) {

    case 'POST':
        $p_ope = !empty($input['ope']) ? $input['ope'] : $_POST['ope'];
        if ($p_ope == 'login') {
            login($input);
        } else if ($p_ope == 'register') {
            register($input);
        } else if ($p_ope == 'logout') {
            session_destroy();
        }
        break;
}

function  login($input)
{
    $p_cuenta_correo = !empty($input['cuenta_correo']) ? $input['cuenta_correo'] : $_POST['cuenta_correo'];
    $p_password = !empty($input['password_hash']) ? $input['password_hash'] : $_POST['password_hash'];
    $p_password = hash('sha512', md5($p_password));
    $su   = new UsuarioModel();
    $var = $su->verificarlogin($p_cuenta_correo, $p_password);
    if (count($var['DATA']) > 0) {
        $_SESSION['login'] = $var['DATA'][0];
        echo json_encode($var);
        exit();
    } else {
        $array = array();
        $array['ESTADO'] = false;
        $array['ERROR'] = "Usuario o Contraseña no valida, verifique sus datos, demasiados intentos bloqueara al usuario el acceso al sistema.";
        echo json_encode($var);
        exit();
    }
}
function register($input)
{
    $p_cuenta_correo = !empty($input['cuenta_correo']) ? $input['cuenta_correo'] : $_POST['cuenta_correo'];
    $p_nombre = !empty($input['nombre']) ? $input['nombre'] : $_POST['nombre'];
    $p_password_hash = !empty($input['password_hash']) ? $input['password_hash'] : $_POST['password_hash'];
    $p_password_hash = hash('sha512', md5($p_password_hash));
    $tseg_usuario = new UsuarioModel();
    $var = $tseg_usuario->register($p_cuenta_correo, $p_nombre, $p_password_hash);

    echo json_encode($var);
}
