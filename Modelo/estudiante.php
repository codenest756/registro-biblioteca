<?php 

class Estudiante {

    private $table = 'estudiante';
    private $conection;

    public function __construct() {
        
    }

    /* Crea la conexion a la BD */
    public function getConection(){
        $dbObj = new Db();
        $this->conection = $dbObj->conection;
    }

    /* Obtiene todos los estudiantes */
    public function getEstudiante(){
        $this->getConection();
        $sql = "SELECT * FROM ".$this->table; 
        $stmt = $this->conection->prepare($sql);
        $stmt->execute();

        return $stmt->fetchAll();
    } 

    /* Obtiene un estudiante con el id */
    public function getEstudianteById($cod_estudiante){
        if(is_null($cod_estudiante)) return false;
        $this->getConection();
        $sql = "SELECT * FROM ".$this->table. " WHERE cod_estudiante= ?";
        $stmt = $this->conection->prepare($sql);
        $stmt->execute([$cod_estudiante]);

        return $stmt->fetch();
    }

    /* Obtiene un estudiante con el id */
    public function getEstudianteBydoc($documento_estudiante){
        if(is_null($documento_estudiante)) return false;
        $this->getConection();
        $sql = "SELECT * FROM ".$this->table. " WHERE documento_estudiante LIKE ?";
        $stmt = $this->conection->prepare($sql);
        $stmt->execute(array('%'.$documento_estudiante.'%'));

        return $stmt->fetchAll();
    }

    /* Graba un esudiante, si ya existe actualice la informacion */
    public function save($param){
        $this->getConection();

        /* Valores por defecto */
        $nombre_estudiante = $documento_estudiante = "";

        /* Revisa si el estudiante ya existe */
        $exists = false;
        if(isset($param["cod_estudiante"]) and $param["cod_estudiante"] !=''){
            $actualEstudiante = $this->getEstudianteById($param["cod_estudiante"]);
            if(isset($actualEstudiante["cod_estudiante"])){
                $exists = true; 
                /* Valores actuales*/
                $cod_estudiante = $param["cod_estudiante"];
                $nombre_estudiante = $actualEstudiante["nombre_estudiante"];
                $documento_estudiante = $actualEstudiante["documento_estudiante"];
            }
        }

        /* Recibe los valores de la pagina web */
        if(isset($param["nombre_estudiante"])) $nombre_estudiante = $param["nombre_estudiante"];
        if(isset($param["documento_estudiante"])) $documento_estudiante= $param["documento_estudiante"];

        /* Operaciones de BD */
        if($exists){
            $sql = "UPDATE ".$this->table. " SET nombre_estudiante=?, documento_estudiante=? WHERE cod_estudiante=?";
            $stmt = $this->conection->prepare($sql);
            $res = $stmt->execute([$nombre_estudiante, $documento_estudiante, $cod_estudiante]);
        }else{
            $sql = "INSERT INTO ".$this->table. " (nombre_estudiante, documento_estudiante) values(?, ?)";
            $stmt = $this->conection->prepare($sql);
            $stmt->execute([$nombre_estudiante, $documento_estudiante]);
            $cod_estudiante = $this->conection->lastInsertId();
        }   

        return $cod_estudiante; 

    }

    /* Elimina un estudiante con el id */
    public function deleteEstudianteById($cod_estudiante){
        $this->getConection();
        $sql = "DELETE FROM ".$this->table. " WHERE cod_estudiante = ?";
        $stmt = $this->conection->prepare($sql);
        return $stmt->execute([$cod_estudiante]);
    }

}

?>
