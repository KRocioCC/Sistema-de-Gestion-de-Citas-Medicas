<?php
session_start();
require_once './config/global.php';
// requiere_once './core/HttpClient.php';
//importando
require_once './core/HttpClient.php';

$request = $_SERVER['REQUEST_URI'];
$request = parse_url($request, PHP_URL_PATH);
$segments = explode('/', trim($request, '/'));

function home() {
    http_response_code(404);
    // cargar la pagina
    require ROOT_DIR . '/view/home.php';
    exit;
}
// PARA VERIFICAR LA SESION
function verificarlogin()
{
    if (!isset($_SESSION['login']['nombre'])) {
        echo '<script>window.location.href="' . HTTP_BASE . '/login"</script>';
    }
}

if ($segments[0] === 'hospital') {
    switch ($segments[1] ?? '') {
        case 'login':
            // importamos de seguridad
            include ROOT_VIEW . '/seguridad/login.php';
            break;
        case 'register':
            include ROOT_VIEW . '/seguridad/register.php';
            break;
        //para eliminar la SESION
        case 'logout':
            session_destroy();
            $clientindex = new HttpClient(HTTP_BASE);
            $result = $clientindex->post('/controller/LoginController.php',  [
                'ope' => 'logout',
            ]);
            //cuando cierra sesion rediriije al login
            echo '<script>window.location.href="' . HTTP_BASE . '/login"</script>';

            break;
        case 'web':
            verificarlogin();
            switch ($segments[2] ?? ''){
                case 'hos':
                    switch ($segments[3] ?? '') {
                        case "regiscita";
                            require ROOT_VIEW . '/web/hos/formrc.php';
                            break;
                    }
                    // PARA PACIENTES
                    switch ($segments[3] ?? ''){
                        
                        case 'list':
                            require ROOT_VIEW . '/web/hos/list.php';
                            break;
                        case 'edit':
                            if (isset($segments[4])) {
                                $_GET['id'] = $segments[4];
                                $_GET['accion'] = 'EDIT';
                                require ROOT_VIEW . '/web/hos/edit.php';
                            } else {
                                home();
                            }
                            break;
                        case 'new':
                            if (isset($segments[4])) {
                                $_GET['id'] = $segments[4];
                                $_GET['accion'] = 'NEW';
                                require ROOT_VIEW . '/web/hos/edit.php';
                            } else {
                                home();
                            }
                            break;
                        case 'delete':
                            if (isset($segments[4])) {
                                $_GET['id'] = $segments[4];
                                $_GET['accion'] = 'DELETE';
                                require ROOT_VIEW . '/web/hos/edit.php';
                            } else {
                                home();
                            }
                            break;
                        case 'view':
                            if (isset($segments[4])) {
                                $_GET['id'] = $segments[4];
                                $_GET['accion'] = 'VIEW';
                                require ROOT_VIEW . '/web/hos/edit.php';
                            } else {
                                home();
                            }
                            break;
                    
                    }
                    // PARA DOCTORES
                    switch ($segments[3] ?? ''){
                        case 'listd':
                            require ROOT_VIEW . '/web/hos/listd.php';
                            break;
                        case 'editd':
                            if (isset($segments[4])) {
                                $_GET['id'] = $segments[4];
                                $_GET['accion'] = 'EDIT';
                                require ROOT_VIEW . '/web/hos/editd.php';
                            } else {
                                home();
                            }
                            break;
                        case 'newd':
                            if (isset($segments[4])) {
                                $_GET['id'] = $segments[4];
                                $_GET['accion'] = 'NEW';
                                require ROOT_VIEW . '/web/hos/editd.php';
                            } else {
                                home();
                            }
                            break;
                        case 'deleted':
                            if (isset($segments[4])) {
                                $_GET['id'] = $segments[4];
                                $_GET['accion'] = 'DELETE';
                                require ROOT_VIEW . '/web/hos/editd.php';
                            } else {
                                home();
                            }
                            break;
                        case 'viewd':
                            if (isset($segments[4])) {
                                $_GET['id'] = $segments[4];
                                $_GET['accion'] = 'VIEW';
                                require ROOT_VIEW . '/web/hos/editd.php';
                            } else {
                                home();
                            }
                            break;
                    }// Citas
                    switch ($segments[3] ?? ''){
                        case 'listc':
                            require ROOT_VIEW . '/web/hos/listc.php';
                            break;
                        case 'editc':
                            if (isset($segments[4])) {
                                $_GET['id'] = $segments[4];
                                $_GET['accion'] = 'EDIT';
                                require ROOT_VIEW . '/web/hos/editc.php';
                            } else {
                                home();
                            }
                            break;
                        case 'newc':
                            if (isset($segments[4])) {
                                $_GET['id'] = $segments[4];
                                $_GET['accion'] = 'NEW';
                                require ROOT_VIEW . '/web/hos/editc.php';
                            } else {
                                home();
                            }
                            break;
                        case 'deletec':
                            if (isset($segments[4])) {
                                $_GET['id'] = $segments[4];
                                $_GET['accion'] = 'DELETE';
                                require ROOT_VIEW . '/web/hos/editc.php';
                            } else {
                                home();
                            }
                            break;
                        case 'viewc':
                            if (isset($segments[4])) {
                                $_GET['id'] = $segments[4];
                                $_GET['accion'] = 'VIEW';
                                require ROOT_VIEW . '/web/hos/editc.php';
                            } else {
                                home();
                            }
                            break;
                    }
                  
                    // PARA ESPECIALIDADES
                    switch ($segments[3] ?? ''){
                        case 'liste':
                            require ROOT_VIEW . '/web/hos/liste.php';
                            break;
                        case 'edite':
                            if (isset($segments[4])) {
                                $_GET['id'] = $segments[4];
                                $_GET['accion'] = 'EDIT';
                                require ROOT_VIEW . '/web/hos/edite.php';
                            } else {
                                home();
                            }
                            break;
                        case 'newe':
                            if (isset($segments[4])) {
                                $_GET['id'] = $segments[4];
                                $_GET['accion'] = 'NEW';
                                require ROOT_VIEW . '/web/hos/edite.php';
                            } else {
                                home();
                            }
                            break;
                        case 'deletee':
                            if (isset($segments[4])) {
                                $_GET['id'] = $segments[4];
                                $_GET['accion'] = 'DELETE';
                                require ROOT_VIEW . '/web/hos/edite.php';
                            } else {
                                home();
                            }
                            break;
                        case 'viewe':
                            if (isset($segments[4])) {
                                $_GET['id'] = $segments[4];
                                $_GET['accion'] = 'VIEW';
                                require ROOT_VIEW . '/web/hos/edite.php';
                            } else {
                                home();
                            }
                            break;
                    }
                
            }
            break;
        default:
            verificarlogin();
            home();
            break;
    }
} else {
   
}
?>