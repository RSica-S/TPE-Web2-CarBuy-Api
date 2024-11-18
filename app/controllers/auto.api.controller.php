<?php

require_once 'app/models/auto.model.php';
require_once 'app/views/api.view.php';

class CarApiController {

    private $model;
    private $view;

    public function __construct() {
        $this->model = new CarModel();
        $this->view = new APIView();
        $this->data = file_get_contents('php://input');
    }
    
    function getData() {
        return json_decode($this->data);
    }
  
    public function getAll(){
        $autos = $this->model->getAutos();

        return $this->view->response($autos, 200);
    }

    public function getAllCarsOP(){
        $limite = isset($_GET['limit']) ? $_GET['limit'] : null;
        $pagina = isset($_GET['page']) ? $_GET['page'] : 1;
        $sentido = isset($_GET['order_dir']) ? $_GET['order_dir'] : null;
        $filtro = isset($_GET['order_by']) ? $_GET['order_by'] : null;
        if($autos = $this->model->getAutosOP($filtro, $sentido, $limite, $pagina)){
            $this->view->response($autos,200);
        }else{
            $this->view->response("No hay autos para mostrar en esta pagina",404);
        }
    }

    public function get($req){
        $id = $req->params->id;

        $auto = $this->model->getAuto($id);

        if(!$auto){
            return $this->view->response("No existe un auto con el id = $id", 404);
        }

        return $this->view->response($auto, 200);
    }

    public function delete($req){
        $id = $req->params->id;

        $auto = $this->model->getAuto($id);

        if(!$auto){
            return $this->view->response("No existe un auto con el id = $id", 404);
        }
        else{
            $this->model->deleteAuto($id);
            return $this->view->response("Se a eliminado un auto con id = $id", 200);
        }
    }

    public function create($req){ 
        $nombre_auto = $req->body->nombre_auto;
        $descripcion = $req->body->descripcion;
        $precio = $req->body->precio;
        $id_marca = $req->body->id_marca_fk;

        if(empty($nombre_auto) || empty($descripcion) || empty($precio) || empty($id_marca)){
            return $this->view->response("Faltan completar campos", 401);
        }

        $dato = $this->model->createAuto($nombre_auto, $descripcion, $precio, $id_marca);

        return $this->view->response($dato, 200);

    }

    public function update($req){
        $id = $req->params->id;

        $auto = $this->model->getAuto($id);

        if(!$auto){
            return $this->view->response("No existe auto con id = $id", 404);
        }

        $nombre_auto = $req->body->nombre_auto;
        $descripcion = $req->body->descripcion;
        $precio = $req->body->precio;
        $id_marca = $req->body->id_marca_fk;

        if(empty($nombre_auto) || empty($descripcion) || empty($precio) || empty($id_marca)){
            return $this->view->response("Faltan completar campos", 401);
        }

        $idEditado = $this->model->updateAuto($nombre_auto, $descripcion, $precio, $id_marca, $id);

        return $this->view->response("Se modificaron los datos del auto con id = $idEditado", 200);
    }

}
  