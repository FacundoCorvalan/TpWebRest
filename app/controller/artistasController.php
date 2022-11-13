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

    private function getData()
    {
        /* Descodificación de los datos del cuerpo de la solicitud. */
        return json_decode($this->data);
    }


    public function getArtistas($params = null){

        /* Una lista blanca de valores permitidos para los parámetros de consulta. */
        $whiteList = array("id", "nombre_artista", "fecha_nacimiento", "nacionalidad", "informacion", "asc", "desc");
        $mensaje = "Inserte valores validos en la url";
        $codigo = 400;
        try {
            if (!empty($_GET['campo']) && !empty($_GET['valor']) && !empty($_GET['sort']) && !empty($_GET['order'])) { //filtro y orden
                $campo = strtolower($_GET['campo']);
                $valor = strtolower($_GET['valor']);
                $sort = strtolower($_GET['sort']);
                $order = strtolower($_GET['order']);

                if (in_array($campo, $whiteList) && in_array($sort, $whiteList) && in_array($order, $whiteList)) {
                    echo "filtro de $campo = $valor y ordenado $sort - $order";
                    $artistaFiltrado = $this->model->getAll($campo, $valor, $sort, $order);
                    $this->view->response($artistaFiltrado);
                } else {
                    $this->view->response($mensaje, $codigo);
                }

            } else if (!empty($_GET['campo']) && !empty($_GET['valor']) && !empty($_GET['sort']) ) { //filtro y orden asc por default
                $campo = strtolower($_GET['campo']);
                $valor = strtolower($_GET['valor']);
                $sort = strtolower($_GET['sort']);

                if(in_array($campo, $whiteList) && in_array($sort, $whiteList) && $_GET['order']==null){
                    echo "filtro de $campo = $valor  y ordenado $sort - asc por defecto";
                    $artistaFiltrado = $this->model->getAll($campo, $valor, $sort, "asc");
                    $this->view->response($artistaFiltrado);
                }else{
                    $this->view->response($mensaje, $codigo);

                }

            } else if (!empty($_GET['campo']) && !empty($_GET['valor']) ) { //filtro
                $campo = strtolower($_GET['campo']);
                $valor = strtolower($_GET['valor']);

                if(in_array($campo, $whiteList) && $_GET['sort']==null && $_GET['order']==null){
                    echo "solo filtro de $campo = $valor";
                    $artistaFiltrado = $this->model->getAll($campo, $valor, null, null);
                    $this->view->response($artistaFiltrado);
                }else{
                    $this->view->response($mensaje, $codigo);

                }
            } else if (!empty($_GET['sort']) && !empty($_GET['order'])) { //orden
                $sort = strtolower($_GET['sort']);
                $order = strtolower($_GET['order']);
                if($_GET['campo']==null && $_GET['valor']==null && in_array($sort,$whiteList)&&in_array($order,$whiteList)){
                    echo "solo ordenado por $sort - $order";
                    $artistas = $this->model->getAll(null, null, $sort, $order);
                    $this->view->response($artistas);
                }else{
                    $this->view->response($mensaje, $codigo);

                }
            } else if (!empty($_GET['sort'])) { //campo por orden asc por default
                $sort = strtolower($_GET['sort']);
                if(in_array($sort,$whiteList)){
                    echo "Solo ordenado por campo $sort asc por default";
                    $artistas = $this->model->getAll(null, null, $sort, "asc"); //asc como valor por defecto
                    $this->view->response($artistas);
                }else{
                    $this->view->response($mensaje, $codigo);

                }
            } else {
                    echo "sin querys";
                    $artistas = $this->model->getAll();
                    $this->view->response($artistas);
            }
        } catch (Exception $e) {
            $this->view->response($mensaje, $codigo);
        }
    }

    public function getArtista($params = null)
    {
        $id = $params[':ID'];
        $artista = $this->model->get($id);

        // si no existe devuelvo 404
        if ($artista)
            $this->view->response($artista);
        else
            $this->view->response("La tarea con el id=$id no existe", 404);
    }


    public function addArtistas($params = null)
    { //Funcion para agregar artistas
        $artista = $this->getData();
        if (empty($artista->nombre_artista) || empty($artista->fecha_nacimiento) || empty($artista->nacionalidad) || empty($artista->informacion)) {
            $this->view->response("Complete los campos", 400);
        } else {

            $id = $this->model->insert($artista->nombre_artista, $artista->fecha_nacimiento, $artista->nacionalidad, $artista->informacion);
            $artista = $this->model->get($id);
            $this->view->response($artista, 201);
        }
    }

    public function deleteArtista($params = null)
    { //a partir de un id elimina un artista
        $id = $params[':ID'];

        $artista = $this->model->get($id);
        if ($artista) {
            $this->model->delete($id);
            $this->view->response($artista);
        } else {
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
