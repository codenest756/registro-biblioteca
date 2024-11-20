<?php 

class Novedades {

    private $table = 'novedades';
    private $conection;

    public function __construct() {
        
    }

    /* Crea la conexion a la BD */
    public function getConection(){
        $dbObj = new Db();
        $this->conection = $dbObj->conection;
    }

    /* Obtiene todos los novedades */
    public function getNovedades(){
        $this->getConection();
        $sql = "SELECT * FROM ".$this->table; 
        $stmt = $this->conection->prepare($sql);
        $stmt->execute();

        return $stmt->fetchAll();
    } 

    /* Obtiene un novedades con el id */
    public function getNovedadesById($cod){
        if(is_null($cod)) return false;
        $this->getConection();
        $sql = "SELECT * FROM ".$this->table. " WHERE cod= ?";
        $stmt = $this->conection->prepare($sql);
        $stmt->execute([$cod]);

        return $stmt->fetch();
    }

    /* Graba un novedades, si ya existe actualice la informacion */
    public function save($param){
        $this->getConection();

        /* Valores por defecto */
        $tipo = $solucion = $descripcion = $fecha = $cod_estudiante = $cod = "";

        /* Revisa si el novedades ya existe */
        $exists = false;
        if(isset($param["cod"]) and $param["cod"] !=''){
            $actualNovedades = $this->getNovedadesById($param["cod"]);
            if(isset($actualNovedades["cod"])){
                $exists = true; 
                /* Valores actuales*/
                $tipo = $actualNovedades["tipo"];
                $descripcion = $actualNovedades["descripcion"];
                $cod = $param ["cod"];
                $cod_estudiante = $actualNovedades["cod_estudiante"];
                $fecha = $actualNovedades["fecha"];
            }
        }


        /* Recibe los valores de la pagina web */
        if(isset($param["tipo"])) $tipo = $param["tipo"];
        if(isset($param["descripcion"])) $descripcion = $param["descripcion"];
        if(isset($param["cod_estudiante"])) $cod_estudiante = $param["cod_estudiante"];
        if(isset($param["fecha"])) $fecha = $param["fecha"];
       

        /* Operaciones de BD */
        if($exists){
            $sql = "UPDATE ".$this->table. " SET tipo =?, descripcion =?, cod_estudiante =?, fecha =? WHERE cod =?";
            $stmt = $this->conection->prepare($sql);
            $res = $stmt->execute([$tipo, $descripcion, $cod_estudiante, $fecha, $cod]);
        }else{
            $sql = "INSERT INTO ".$this->table. " (tipo, descripcion, cod, cod_estudiante, fecha) values(?, ?, ?, ?, ?)";
            $stmt = $this->conection->prepare($sql);
            $stmt->execute([$tipo, $descripcion, $cod, $cod_estudiante, $fecha, ]);
            $cod = $this->conection->lastInsertId();
        }   

        return $cod; 

    }

    /* Elimina un novedades con el id */
    public function deleteNovedadesById($cod){
        $this->getConection();
        $sql = "DELETE FROM ".$this->table. " WHERE cod = ?";
        $stmt = $this->conection->prepare($sql);
        return $stmt->execute([$cod]);
    }

}

?>
