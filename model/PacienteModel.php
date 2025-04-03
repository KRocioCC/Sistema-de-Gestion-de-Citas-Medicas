<?php
require_once('../core/ModelBasePDO.php');
class PacienteModel extends ModeloBasePDO
{
    public function __construct()
    {
        parent::__construct();
    }
    public function findAll()
    {
        $sql = "SELECT `idpaciente`, `nombre`, `papellido`, `mapellido`,
        `direccion`, `edad`, `sexo`, `telefono` 
        FROM `paciente`;";

        $param = array();
        return parent::gselect($sql, $param);
    }

    public function findID($p_idpaciente)
    {
        $sql = 'SELECT `idpaciente`, `nombre`, `papellido`, `mapellido`,
        `direccion`, `edad`, `sexo`, `telefono` 
        FROM `paciente`
        WHERE idpaciente = :p_idpaciente; ';
        $params = array();
        array_push($params, [':p_idpaciente', $p_idpaciente, PDO::PARAM_INT]);
        return parent::gselect($sql, $params);
    }
    public function findPaginateAll($p_limit, $p_offset, $p_busqueda){
        $sql = "SELECT `idpaciente`, `nombre`, `papellido`, `mapellido`,
        `direccion`, `edad`, `sexo`, `telefono` 
        FROM `paciente`
        WHERE UPPER(CONCAT(IFNULL(idpaciente,''),IFNULL(nombre,''),
                         IFNULL(papellido,''),IFNULL(mapellido,''),
                         IFNULL(direccion,''),
                           IFNULL(edad,''),IFNULL(sexo,''),
                           IFNULL(telefono,''))) 
        like CONCAT('%',UPPER(IFNULL(:p_busqueda,'')),'%')
        LIMIT :p_limit
        OFFSET :p_offset;";
        $params = array();
        array_push($params, [':p_limit', $p_limit, PDO::PARAM_INT]);
        array_push($params, [':p_offset', $p_offset, PDO::PARAM_INT]);
        array_push($params, [':p_busqueda', $p_busqueda, PDO::PARAM_STR]);
        $var = parent::gselect($sql, $params);
        $sqlCount = "SELECT COUNT(1) as cant
        FROM paciente 
        WHERE UPPER(CONCAT(IFNULL(idpaciente,''),IFNULL(nombre,''),
                         IFNULL(papellido,''),IFNULL(mapellido,''),
                         IFNULL(direccion,''),
                           IFNULL(edad,''),IFNULL(sexo,''),
                           IFNULL(telefono,''))) 
        like CONCAT('%',UPPER(IFNULL(:p_busqueda,'')),'%')
        ";
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
        $sql = "INSERT INTO paciente(nombre, papellido, mapellido, direccion, edad, 
        sexo, telefono)
        VALUES (:p_nombre, :p_papellido, :p_mapellido,:p_direccion, :p_edad,
        :p_sexo, :p_telefono);";
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
        $p_idpaciente,
        $p_nombre,
        $p_papellido,
        $p_mapellido,
        $p_direccion,
        $p_edad,
        $p_sexo,
        $p_telefono
    ) {
        $sql = "UPDATE paciente
        SET nombre=:p_nombre, 
        papellido=:p_papellido,
        mapellido=:p_mapellido,
        direccion=:p_direccion,
        edad=:p_edad,
        sexo=:p_sexo,
        telefono=:p_telefono 
        WHERE idpaciente=:p_idpaciente; ";
        $params = array();
        array_push($params, [':p_idpaciente', $p_idpaciente, PDO::PARAM_INT]);
        array_push($params, [':p_nombre', $p_nombre, PDO::PARAM_STR]);
        array_push($params, [':p_papellido', $p_papellido, PDO::PARAM_STR]);
        array_push($params, [':p_mapellido', $p_mapellido, PDO::PARAM_STR]);
        array_push($params, [':p_direccion', $p_direccion, PDO::PARAM_STR]);
        array_push($params, [':p_edad', $p_edad, PDO::PARAM_INT]);
        array_push($params, [':p_sexo', $p_sexo, PDO::PARAM_STR]);
        array_push($params, [':p_telefono', $p_telefono, PDO::PARAM_STR]);
        return parent::gupdate($sql, $params);
    }
    public function delete($p_idpaciente)
    {
        $sql = "DELETE FROM paciente WHERE idpaciente = :p_idpaciente; ";
        $params = array();
        array_push($params, [':p_idpaciente', $p_idpaciente, PDO::PARAM_INT]);
        return parent::gdelete($sql, $params);
    }
    
}
