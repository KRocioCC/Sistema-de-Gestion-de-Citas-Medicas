<?php
require_once('../core/ModelBasePDO.php');

class DoctorModel extends ModeloBasePDO
{
    public function __construct()
    {
        parent::__construct();
    }

    public function findAll()
    {
        $sql = "SELECT iddoctor, nombre, papellido, mapellido, direccion, edad, sexo, telefono FROM doctor;";
        $param = array();
        return parent::gselect($sql, $param);
    }

    public function findID($p_iddoctor)
    {
        $sql = 'SELECT iddoctor, nombre, papellido, mapellido, direccion, edad, sexo, telefono FROM doctor WHERE iddoctor = :p_iddoctor;';
        $params = array();
        array_push($params, [':p_iddoctor', $p_iddoctor, PDO::PARAM_INT]);
        return parent::gselect($sql, $params);
    }

    public function findPaginateAll($p_limit, $p_offset, $p_busqueda)
    {
        $sql = "SELECT iddoctor, nombre, papellido, mapellido, direccion, edad, sexo, telefono FROM doctor WHERE UPPER(CONCAT(IFNULL(iddoctor,''), IFNULL(nombre,''), IFNULL(papellido,''), IFNULL(mapellido,''), IFNULL(direccion,''), IFNULL(edad,''), IFNULL(sexo,''), IFNULL(telefono,''))) LIKE CONCAT('%', UPPER(IFNULL(:p_busqueda,'')), '%') LIMIT :p_limit OFFSET :p_offset;";
        $params = array();
        array_push($params, [':p_limit', $p_limit, PDO::PARAM_INT]);
        array_push($params, [':p_offset', $p_offset, PDO::PARAM_INT]);
        array_push($params, [':p_busqueda', $p_busqueda, PDO::PARAM_STR]);
        $var = parent::gselect($sql, $params);

        $sqlCount = "SELECT COUNT(1) as cant FROM doctor WHERE UPPER(CONCAT(IFNULL(iddoctor,''), IFNULL(nombre,''), IFNULL(papellido,''), IFNULL(mapellido,''), IFNULL(direccion,''), IFNULL(edad,''), IFNULL(sexo,''), IFNULL(telefono,''))) LIKE CONCAT('%', UPPER(IFNULL(:p_busqueda,'')), '%')";
        $params = array();
        array_push($params, [':p_busqueda', $p_busqueda, PDO::PARAM_STR]);
        $var1 = parent::gselect($sqlCount, $params);
        $var['LENGHT'] = $var1['DATA'][0]['cant'];
        return $var;
    }

    public function insert(
        $p_nombre,
        $p_papellido,
        $p_mapellido,
        $p_direccion,
        $p_edad,
        $p_sexo,
        $p_telefono
    ) {
        $sql = "INSERT INTO doctor (nombre, papellido, mapellido, direccion, edad, sexo, telefono) VALUES (:p_nombre, :p_papellido, :p_mapellido, :p_direccion, :p_edad, :p_sexo, :p_telefono);";
        $params = array();
        array_push($params, [':p_nombre', $p_nombre, PDO::PARAM_STR]);
        array_push($params, [':p_papellido', $p_papellido, PDO::PARAM_STR]);
        array_push($params, [':p_mapellido', $p_mapellido, PDO::PARAM_STR]);
        array_push($params, [':p_direccion', $p_direccion, PDO::PARAM_STR]);
        array_push($params, [':p_edad', $p_edad, PDO::PARAM_INT]);
        array_push($params, [':p_sexo', $p_sexo, PDO::PARAM_STR]);
        array_push($params, [':p_telefono', $p_telefono, PDO::PARAM_STR]);

        return parent::ginsert($sql, $params);
    }

    public function update(
        $p_iddoctor,
        $p_nombre,
        $p_papellido,
        $p_mapellido,
        $p_direccion,
        $p_edad,
        $p_sexo,
        $p_telefono
    ) {
        $sql = "UPDATE doctor SET nombre = :p_nombre, papellido = :p_papellido, mapellido = :p_mapellido, direccion = :p_direccion, edad = :p_edad, sexo = :p_sexo, telefono = :p_telefono WHERE iddoctor = :p_iddoctor;";
        $params = array();
        array_push($params, [':p_iddoctor', $p_iddoctor, PDO::PARAM_INT]);
        array_push($params, [':p_nombre', $p_nombre, PDO::PARAM_STR]);
        array_push($params, [':p_papellido', $p_papellido, PDO::PARAM_STR]);
        array_push($params, [':p_mapellido', $p_mapellido, PDO::PARAM_STR]);
        array_push($params, [':p_direccion', $p_direccion, PDO::PARAM_STR]);
        array_push($params, [':p_edad', $p_edad, PDO::PARAM_INT]);
        array_push($params, [':p_sexo', $p_sexo, PDO::PARAM_STR]);
        array_push($params, [':p_telefono', $p_telefono, PDO::PARAM_STR]);

        return parent::gupdate($sql, $params);
    }

    public function delete($p_iddoctor)
    {
        $sql = "DELETE FROM doctor WHERE iddoctor = :p_iddoctor;";
        $params = array();
        array_push($params, [':p_iddoctor', $p_iddoctor, PDO::PARAM_INT]);
        return parent::gdelete($sql, $params);
    }
}

?>