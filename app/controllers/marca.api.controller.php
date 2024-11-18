<?php

require_once 'app/models/marca.model.php';
require_once 'app/views/api.view.php';

class MarcaApiController {

    private $model;
    private $view;

    public function __construct() {
        $this->model = new MarcaModel();
        $this->view = new APIView();
        $this->data = file_get_contents('php://input');
    }

    function getData() {
        return json_decode($this->data);
    }
  
    public function getAll(){
        $marcas = $this->model->getMarcas();

        return $this->view->response($marcas, 200);
    }

    public function getAllBrandsOP(){
        $limite = isset($_GET['limit']) ? $_GET['limit'] : null;
        $pagina = isset($_GET['page']) ? $_GET['page'] : 1;
        $sentido = isset($_GET['order_dir']) ? $_GET['order_dir'] : null;
        $filtro = isset($_GET['order_by']) ? $_GET['order_by'] : null;
        if($marcas = $this->model->getMarcasOP($filtro, $sentido, $limite, $pagina)){
            $this->view->response($marcas,200);
        }else{
            $this->view->response("No hay marcas para mostrar en esta pagina",404);
        }
    }

    public function get($req){
        $id = $req->params->id;

        $marca = $this->model->getMarca($id);

        if(!$marca){
            return $this->view->response("No existe la marca con el id = $id", 404);
        }

        return $this->view->response($marca, 200);
    }

    public function delete($req){
        $id = $req->params->id;

        $marca = $this->model->getMarca($id);

        if(!$marca){
            return $this->view->response("No existe la marca con el id = $id", 404);
        }
        else{
            $this->model->deleteMarca($id);
            return $this->view->response("Se a eliminado la marca con id = $id", 200);
        }
    }

    public function create($req){ 
        $nombre_marca = $req->body->nombre_marca;
        $img = $req->body->img_marca;
        
        if(empty($nombre_marca) || empty($img)){
            return $this->view->response("Faltan completar campos", 401);
        }
        
        $dato = $this->model->createMarca($nombre_marca, $img);

        return $this->view->response($dato, 200);

    }

    public function update($req){
        $id = $req->params->id;

        $marca = $this->model->getMarca($id);

        if(!$marca){
            return $this->view->response("No existe la marca con id = $id", 404);
        }

        $nombre_marca = $req->body->nombre_auto;
        $img = $req->body->img_marca;

        if(empty($nombre_marca) || empty($img)){
            return $this->view->response("Faltan completar campos", 401);
        }

        $idEditado = $this->model->updateMarca($nombre_marca, $img, $id);

        return $this->view->response("Se modificaron los datos de la marca con id = $idEditado", 200);
    }
}
  