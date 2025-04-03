<?php
require_once('../core/ModelBasePDO.php');

class EspecialidadModel extends ModeloBasePDO
{
    public function __construct()
    {
        parent::__construct();
    }

    public function findAll()
    {
        $sql = "SELECT idespe, iddoctor, nombre_espe FROM especialidad;";
        $param = array();
        return parent::gselect($sql, $param);
    }

    public function findID($p_idespe)
    {
        $sql = 'SELECT idespe, iddoctor, nombre_espe FROM especialidad
         WHERE idespe = :p_idespe;';
        $params = array();
        array_push($params, [':p_idespe', $p_idespe, PDO::PARAM_INT]);
        return parent::gselect($sql, $params);
    }

    public function findPaginateAll($p_limit, $p_offset, $p_busqueda)
    {
        $sql = "SELECT idespe, iddoctor, nombre_espe FROM especialidad 
        WHERE UPPER(CONCAT(IFNULL(idespe,''),IFNULL(iddoctor,''),IFNULL(nombre_espe,''))) LIKE CONCAT('%', UPPER(IFNULL(:p_busqueda,'')), '%') LIMIT :p_limit OFFSET :p_offset;";
        $params = array();
        array_push($params, [':p_limit', $p_limit, PDO::PARAM_INT]);
        array_push($params, [':p_offset', $p_offset, PDO::PARAM_INT]);
        array_push($params, [':p_busqueda', $p_busqueda, PDO::PARAM_STR]);
        $var = parent::gselect($sql, $params);

        $sqlCount = "SELECT COUNT(1) as cant 
        FROM especialidad 
        WHERE UPPER(CONCAT(IFNULL(idespe,''),IFNULL(iddoctor,''),IFNULL(nombre_espe,''))) LIKE CONCAT('%', UPPER(IFNULL(:p_busqueda,'')), '%')";
        $params = array();
        array_push($params, [':p_busqueda', $p_busqueda, PDO::PARAM_STR]);
        $var1 = parent::gselect($sqlCount, $params);
        $var['LENGHT'] = $var1['DATA'][0]['cant'];
        return $var;
    }

    public function insert($_iddoctor, $p_nombre_espe)
    {
        $sql = "INSERT INTO especialidad(iddoctor, nombre_espe) 
        VALUES (:p_iddoctor, :p_nombre_espe);";
        $params = array();
        array_push($params, [':p_iddoctor', $p_iddoctor, PDO::PARAM_INT]);
        array_push($params, [':p_nombre_espe', $p_nombre_espe, PDO::PARAM_STR]);
        return parent::ginsert($sql, $params);
    }

    public function update($p_idespe, $p_iddoctor, $p_nombre_espe)
    {
        $sql = "UPDATE especialidad 
        SET 
        iddoctor = :p_iddoctor,
        nombre_espe = :p_nombre_espe 
        WHERE idespe = :p_idespe;";
        $params = array();
        array_push($params, [':p_idespe', $p_idespe, PDO::PARAM_INT]);
        array_push($params, [':p_iddoctor', $p_iddoctor, PDO::PARAM_INT]);
        array_push($params, [':p_nombre_espe', $p_nombre_espe, PDO::PARAM_STR]);
        return parent::gupdate($sql, $params);
    }

    public function delete($p_idespe)
    {
        $sql = "DELETE FROM especialidad 
        WHERE idespe = :p_idespe;";
        $params = array();
        array_push($params, [':p_idespe', $p_idespe, PDO::PARAM_INT]);
        return parent::gdelete($sql, $params);
    }
}

?>