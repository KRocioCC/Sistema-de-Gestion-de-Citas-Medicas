<?php
require_once('../core/ModelBasePDO.php');
class CitaModel extends ModeloBasePDO
{
    public function __construct()
    {
        parent::__construct();
    }
    public function findAll()
    {
        $sql = "SELECT `idcita`, `idpaciente`, `iddoctor`, `fechacita`, `motivo` 
        FROM `cita` ;";

        $param = array();
        return parent::gselect($sql, $param);
    }

    public function findID($p_idcita)
    {
        $sql = 'SELECT `idcita`, `idpaciente`, `iddoctor`, `fechacita`, `motivo` 
        FROM `cita`
        WHERE idpaciente = :p_idcita; ';
        $params = array();
        array_push($params, [':p_idcita', $p_idcita, PDO::PARAM_INT]);
        return parent::gselect($sql, $params);
    }
    public function findPaginateAll($p_limit, $p_offset, $p_busqueda){
        $sql = "SELECT `idcita`, `idpaciente`, `iddoctor`, `fechacita`, `motivo` 
        FROM `cita`
        WHERE UPPER(CONCAT(IFNULL(idcita,''),IFNULL(idpaciente,''),
                         IFNULL(iddoctor,''),IFNULL(fechacita,''),
                         IFNULL(motivo,'')))
                          
        like CONCAT('%',UPPER(IFNULL(:p_busqueda,'')),'%')
        LIMIT :p_limit
        OFFSET :p_offset;";
        $params = array();
        array_push($params, [':p_limit', $p_limit, PDO::PARAM_INT]);
        array_push($params, [':p_offset', $p_offset, PDO::PARAM_INT]);
        array_push($params, [':p_busqueda', $p_busqueda, PDO::PARAM_STR]);
        $var = parent::gselect($sql, $params);
        $sqlCount = "SELECT COUNT(1) as cant
        FROM cita 
        WHERE UPPER(CONCAT(IFNULL(idcita,''),IFNULL(idpaciente,''),
                         IFNULL(iddoctor,''),IFNULL(fechacita,''),
                         IFNULL(motivo,'')
                          )) 
        like CONCAT('%',UPPER(IFNULL(:p_busqueda,'')),'%')
        ";
        $params = array();
       
        array_push($params, [':p_busqueda', $p_busqueda, PDO::PARAM_STR]);
        $var1 = parent::gselect($sqlCount, $params);
        $var['LENGHT'] = $var1['DATA'][0]['cant'];
        return $var;
    }
    public function insert(
        $p_idpaciente,
        $p_iddoctor,
        $p_fechacita,
        $p_motivo) {
        $sql = "INSERT INTO `cita`( `idpaciente`, `iddoctor`, `fechacita`, `motivo`)
         VALUES (:p_idpaciente, :p_iddoctor,:p_fechacita,:p_motivo);";
        $params = array();
        array_push($params, [':p_idpaciente', $p_idpaciente, PDO::PARAM_STR]);
        array_push($params, [':p_iddoctor', $p_iddoctor, PDO::PARAM_STR]);
        array_push($params, [':p_fechacita', $p_fechacita, PDO::PARAM_STR]);
        array_push($params, [':p_motivo', $p_motivo, PDO::PARAM_STR]);
        
        return parent::ginsert($sql, $params);
    }
    public function update(
        $p_idcita,
        $p_idpaciente,
        $p_iddoctor,
        $p_fechacita,
        $p_motivo
       
    ) {
        $sql = "UPDATE cita
        SET idpaciente=:p_idpaciente, 
        iddoctor=:p_iddoctor,
        fechacita=:p_fechacita,
        motivo=:p_motivo 
        WHERE idpaciente=:p_idcita; ";
        $params = array();
        array_push($params, [':p_idcita', $p_idcita, PDO::PARAM_INT]);
        array_push($params, [':p_idpaciente', $p_idpaciente, PDO::PARAM_STR]);
        array_push($params, [':p_iddoctor', $p_iddoctor, PDO::PARAM_STR]);
        array_push($params, [':p_fechacita', $p_fechacita, PDO::PARAM_STR]);
        array_push($params, [':p_motivo', $p_motivo, PDO::PARAM_STR]);
        
        return parent::gupdate($sql, $params);
    }
    public function delete($p_idcita)
    {
        $sql = "DELETE FROM cita WHERE idpaciente = :p_idcita; ";
        $params = array();
        array_push($params, [':p_idcita', $p_idcita, PDO::PARAM_INT]);
        return parent::gdelete($sql, $params);
    }
    
}
