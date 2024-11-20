
<?php 

require_once "Modelo/novedades.php";

class novedadesController{
    public $page_title;
    public $view;

    public function __construct() {
        $this->view = 'list_novedades';
        $this->page_title = 'LISTADO DE NOVEDADES';
        $this->novedadesObj = new novedades();
    }

    /* Mostrar todos los novedades */
    public function list(){
        $this->page_title = 'Listado de novedades';
        return $this->novedadesObj->getnovedades();
    }

    /* Carga los datos de un novedades para editar */
    public function edit($cod = null){
        $this->page_title = 'Editar novedades';
        $this->view = 'edit_novedades';
        /* Si el novedades existe carga todos los datos */
        if(isset($_GET["cod"])) $cod = $_GET["cod"];
        return $this->novedadesObj->getnovedadesById($cod);
    }

    /* Crea o ctualiza un novedades */
    public function save(){
        $this->view = 'edit_novedades';
        $this->page_title = 'Editar novedades';
        $cod= $this->novedadesObj->save($_POST);
        $result = $this->novedadesObj->getnovedadesById($cod);
        $_GET["response"] = true;
        return $result;
    }

    /* Confirma el borrado */
    public function confirmDelete(){
        $this->page_title = 'Eliminar novedades';
        $this->view = 'confirm_delete_novedades';
        return $this->novedadesObj->getnovedadesById($_GET["cod"]);
    }

    /* Eliminar */
    public function delete(){
        $this->page_title = 'Listado de novedades';
        $this->view = 'delete_novedades';
        return $this->novedadesObj->deletenovedadesById($_POST["cod"]);
    }

}

?>
