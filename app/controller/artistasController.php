<?php
require_once './app/model/artistasModel.php';
require_once './app/view/artistasView.php';
require_once './app/helpers/auth.helper.php';

class artistasController
{
    private $model;
    private $view;

    public function __construct()
    {
        $this->model = new artistasModel();
        $this->view = new artistasView();

         // lee el body del request
         $this->data = file_get_contents("php://input");

    }

    private function getData() {
        /* Descodificación de los datos del cuerpo de la solicitud. */
        return json_decode($this->data);
    }


    public function getArtistas($params = null)
    {
        /* Está convirtiendo el valor de valor y order a minúsculas. */
        //var_dump($_GET['sort']);
        
        if(!empty($_GET['sort'])&&!empty($_GET['order'])){
            $sort =strtolower( $_GET['sort']);
            $order=strtolower($_GET['order']);
                var_dump($sort);
                var_dump($order);
            $artistas = $this->model->getAll($sort,$order);

            
            
        }else if(empty($_GET['sort'])&&!empty($_GET['order'])){
            $order=strtolower($_GET['order']);
            var_dump($order);
            $artistas = $this->model->getAll(null,$order);
        }else{
            $artistas = $this->model->getAll();
        }
        $this->view->response($artistas);
    }

    public function getArtista($params = null){
        $id = $params[':ID'];
        $artista = $this->model->get($id);

        // si no existe devuelvo 404
        if ($artista)
            $this->view->response($artista);
        else 
            $this->view->response("La tarea con el id=$id no existe", 404);


    }
   

    public function addArtistas($params = null){//Funcion para agregar artistas
        $artista = $this->getData();
        if(empty($artista->nombre_artista) || empty($artista->fecha_nacimiento) || empty($artista->nacionalidad) || empty($artista->informacion)) {
            $this->view->response("Complete los campos", 400);
        }
        else {

            $id = $this->model->insert($artista->nombre_artista, $artista->fecha_nacimiento, $artista->nacionalidad, $artista->informacion);
            $artista = $this->model->get($id);
            $this->view->response($artista,201);
        }
    }

    public function deleteArtista($params = null){//a partir de un id elimina un artista
        $id = $params[':ID'];

        $artista = $this->model->get($id);
        if($artista){
            $this->model->delete($id);
            $this->view->response($artista);
        }else{
            $this->view->response("La tarea con el id=$id no existe", 404);
        }
        

    }
    // public function getIdsByDisco(){//Funcion utilizada  para el formulario de alta este
    //     session_start();
    //     $datos_disco = $this->model->artistaJoinDisco();
    //     $this->view->getIdArtistas($datos_disco);
    // }

    // public function formEditar($id){//Funcion utilizada  para el formulario de modificar, obtiene el id del artista para asi poder utilizarlo en el select
    //     $authHelper = new AuthHelper();
    //     $authHelper->checkLoggedIn();
    //     $datos_disco = $this->model->artistaJoinDisco();
    //     $this->view->formModifyDiscos($datos_disco,$id);

    // }

    // public function formEditarArtista($id){//Formulario para editar artistas
    //     $authHelper = new AuthHelper();
    //     $authHelper->checkLoggedIn();
    //     $datosArtistas = $this->model->getListArtistas();
    //     $this->view->formModifyArtistas($datosArtistas,$id);
    // }




    
}
