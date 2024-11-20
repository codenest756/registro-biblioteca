<?php 

class Registro {

    private $table = 'registro';
    private $conection;

    public function __construct() {
        
    }

    /* Crea la conexion a la BD */
    public function getConection(){
        $dbObj = new Db();
        $this->conection = $dbObj->conection;
    }

    /* Obtiene todos los registros */
    public function getregistro(){
        $this->getConection();
        $sql = "SELECT * FROM ".$this->table; 
        $stmt = $this->conection->prepare($sql);
        $stmt->execute();

        return $stmt->fetchAll();
    } 

    /* Obtiene un registro con el id */
    public function getregistroById($cod_registro){
        if(is_null($cod_registro)) return false;
        $this->getConection();
        $sql = "SELECT * FROM ".$this->table. " WHERE cod_registro= ?";
        $stmt = $this->conection->prepare($sql);
        $stmt->execute([$cod_registro]);

        return $stmt->fetch();
    }

    /* Graba un registro, si ya existe actualice la informacion */
    public function save($param){
        $this->getConection();

        /* Valores por defecto */
        $cod_estudiante ="";

        /* Revisa si el registro ya existe */
        $exists = false;
        if(isset($param["cod_registro"]) and $param["cod_registro"] !=''){
            $actualRegistro = $this->getRegistroById($param["cod_registro"]);
            if(isset($actualRegistro["cod_registro"])){
                $exists = true; 
                /* Valores actuales*/
                $cod_registro = $param["cod_registro"];
                $cod_estudiante = $actualRegistro["cod_estudiante"]; 
            }
        }

        /* Recibe los valores de la pagina web */
        if(isset($param["cod_estudiante"])) $cod_estudiante = $param["cod_estudiante"];

        /* Operaciones de BD */
        if($exists){
            $sql = "UPDATE ".$this->table. " SET cod_estudiante=? WHERE=?";
            $stmt = $this->conection->prepare($sql);
            $res = $stmt->execute([$cod_estudiante]);
        }else{
            $sql = "INSERT INTO ".$this->table. " (cod_estudiante, fecha) values(?,  NOW())";
            $stmt = $this->conection->prepare($sql);
            $stmt->execute([$cod_estudiante]);
            $cod_registro = $this->conection->lastInsertId();
        }   

        return $cod_registro;   

    }

    /* Elimina un registro con el id */
    public function deleteRegistroById($cod_registro){
        $this->getConection();
        $sql = "DELETE FROM ".$this->table. " WHERE cod_registro = ?";
        $stmt = $this->conection->prepare($sql);
        return $stmt->execute([$cod_registro]);
    }

}

?>
