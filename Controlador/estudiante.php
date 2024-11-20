
<?php 

require_once "Modelo/estudiante.php";

class estudianteController{
    public $page_title;
    public $view;

    public function __construct() {
        $this->view = 'list_estudiante';
        $this->page_title = 'LISTADO DE ESTUDIANTES';
        $this->estudianteObj = new estudiante();
    }

    /* Mostrar todos los estudiantes */
    public function list(){
        $this->page_title = 'Listado de estudiantes';
        return $this->estudianteObj->getEstudiante();
    }

    public function filtro($cod_estudiante = null){
        $this->page_title = 'Listado de estudiantes';
        if(isset($_POST["cod_estudiante"])) $cod_estudiante = $_POST["cod_estudiante"];
        return $this->estudianteObj->getEstudianteBydoc($cod_estudiante);
    }

    /* Carga los datos dde un estudiante para editar */
    public function edit($cod_estudiante = null){
        $this->page_title = 'Editar estudiante';
        $this->view = 'edit_estudiante';
        /* Si el estudiante existe carga todos los datos */
        if(isset($_GET["cod_estudiante"])) $cod_estudiante = $_GET["cod_estudiante"];
        return $this->estudianteObj->getestudianteById($cod_estudiante);
    }

    /* Crea o ctualiza un estudiante */
    public function save(){
        $this->view = 'edit_estudiante';
        $this->page_title = 'Editar estudiante';
        $cod_estudiante = $this->estudianteObj->save($_POST);
        $result = $this->estudianteObj->getestudianteById($cod_estudiante);
        $_GET["response"] = true;
        return $result;
    }

    /* Confirma el borrado */
    public function confirmDelete(){
        $this->page_title = 'Eliminar estudiante';
        $this->view = 'confirm_delete_estudiante';
        return $this->estudianteObj->getestudianteById($_GET["cod_estudiante"]);
    }

    /* Eliminar */
    public function delete(){
        $this->page_title = 'Listado de estudiante';
        $this->view = 'delete_estudiante';
        return $this->estudianteObj->deleteestudianteById($_POST["cod_estudiante"]);
    }

}

?>
