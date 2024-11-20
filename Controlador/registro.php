
<?php 

require_once "Modelo/registro.php";

class registroController{
    public $page_title;
    public $view;

    public function __construct() {
        $this->view = 'list_registro';
        $this->page_title = 'LISTADO DE REGISTRO';
        $this->registroObj = new registro();
    }

    /* Mostrar todos los registros */
    public function list(){
        $this->page_title = 'Listado de registro';
        return $this->registroObj->getregistro();
    }

    /* Carga los datos de un registro para editar */
    public function edit($cod_registro = null){
        $this->page_title = 'Editar registro';
        $this->view = 'edit_registro';
        /* Si el registro existe carga todos los datos */
        if(isset($_GET["cod_registro"])) $cod_registro = $_GET["cod_registro"];
        return $this->registroObj->getregistroById($cod_registro);
    }

    /* Crea o ctualiza un registro */
    public function save(){
        $this->view = 'edit_registro';
        $this->page_title = 'Editar registro';
        $cod_registro = $this->registroObj->save($_POST);
        $result = $this->registroObj->getregistroById($cod_registro);
        $_GET["response"] = true;
        return $result;
    }

    /* Confirma el borrado */
    public function confirmDelete(){
        $this->page_title = 'Eliminar registro';
        $this->view = 'confirm_delete_registro';
        return $this->registroObj->getregistroById($_GET["cod_registro"]);
    }

    /* Eliminar */
    public function delete(){
        $this->page_title = 'Listado de registro';
        $this->view = 'delete_registro';
        return $this->registroObj->deleteregistroById($_POST["cod_registro"]);
    }

}

?>
