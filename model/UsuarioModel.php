<?php
include_once "../core/ModelBasePDO.php";
class UsuarioModel extends ModeloBasePDO
{
    public function __construct()
    {
        parent::__construct();
    }
    public function findall()
    {
        $sql = "SELECT  cuenta_correo ,  nombre ,  password_hash, registration_date   FROM sessiones_login; ";
        $param = array();
        return parent::gselect($sql, $param);
    }
    public function findid($p_cuenta_correo)
    {
        $sql = "SELECT   cuenta_correo ,  nombre ,  password_hash, registration_date   FROM sessiones_login
        WHERE cuenta_correo = :p_cuenta_correo;  ";
        $param = array();
        array_push($param, [':p_cuenta_correo', $p_cuenta_correo, PDO::PARAM_STR]);
        return parent::gselect($sql, $param);
    }
    public function findpaginateall($p_filtro, $p_limit, $p_offset)
    {
        $sql = "SELECT  cuenta_correo ,  nombre ,  password_hash   
        FROM sessiones_login
        WHERE upper(concat(IFNULL(cuenta_correo,''),IFNULL(nombre,''),IFNULL(password_hash,''))) like concat('%',upper(IFNULL(:p_filtro,'')),'%') 
        limit :p_limit
        OFFSET :p_offset  ";
        $param = array();
        array_push($param, [':p_filtro', $p_filtro, PDO::PARAM_STR]);
        array_push($param, [':p_limit', $p_limit, PDO::PARAM_INT]);
        array_push($param, [':p_offset', $p_offset, PDO::PARAM_INT]);
        $var = parent::gselect($sql, $param);

        $sqlCount = "SELECT concat(1) as cant
        FROM sessiones_login
        WHERE upper(concat(IFNULL(cuenta_correo,''),IFNULL(nombre,''),IFNULL(password_hash,'')))
         like concat('%',upper(IFNULL(:p_filtro,'')),'%')";
        $param = array();
        array_push($param, [':p_filtro', $p_filtro, PDO::PARAM_STR]);
        $var1 = parent::gselect($sqlCount, $param);
        $var['LENGTH'] = $var1['DATA'][0]['cant'];
        return $var;
    }
    public function verificarlogin($p_cuenta_correo, $p_password_hash)
    {
        $sql = "SELECT cuenta_correo, nombre
     FROM sessiones_login
     WHERE
     cuenta_correo = :p_cuenta_correo AND 
     password_hash = :p_password_hash";
        $param = array();
        array_push($param, [':p_cuenta_correo', $p_cuenta_correo, PDO::PARAM_STR]);
        array_push($param, [':p_password_hash', $p_password_hash, PDO::PARAM_STR]);
        return parent::gselect($sql, $param);
    }
    public function register($p_cuenta_correo, $p_nombre, $p_password_hash)
    {
        $sql = "INSERT INTO  sessiones_login ( cuenta_correo ,  nombre ,  password_hash, registration_date ) 
        VALUES ( :p_cuenta_correo ,  :p_nombre ,  :p_password_hash, NOW());";
        $param = array();
        array_push($param, [':p_cuenta_correo', $p_cuenta_correo, PDO::PARAM_STR]);
        array_push($param, [':p_nombre', $p_nombre, PDO::PARAM_STR]);
        array_push($param, [':p_password_hash', $p_password_hash, PDO::PARAM_STR]);

        return parent::ginsert($sql, $param);
    }
    public function update($p_cuenta_correo, $p_nombre, $p_password_hash)
    {
        $sql = " UPDATE  sessiones_login  SET 
         nombre =  :p_nombre, 
         password_hash = :p_password_hash        
        WHERE  cuenta_correo = :p_cuenta_correo ";
        $param = array();
        array_push($param, [':p_cuenta_correo', $p_cuenta_correo, PDO::PARAM_STR]);
        array_push($param, [':p_nombre', $p_nombre, PDO::PARAM_STR]);
        array_push($param, [':p_password_hash', $p_password_hash, PDO::PARAM_STR]);
        return parent::gupdate($sql, $param);
    }
    public function delete($p_cuenta_correo)
    {
        $sql = "DELETE FROM  sessiones_login  WHERE  cuenta_correo = :p_cuenta_correo";
        $param = array();
        array_push($param, [':p_cuenta_correo', $p_cuenta_correo, PDO::PARAM_STR]);
        return parent::gdelete($sql, $param);
    }
}
