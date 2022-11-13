<?php
class artistasModel
{
    private $db;

    public function __construct()
    {
        $this->db = new PDO('mysql:host=localhost;' . 'dbname=db_artistas;charset=utf8', 'root', '');
    }

    public function getAll($campo = null, $valor = null, $sort = null, $order = null)
    {

        if ($campo != null && $valor != null && $sort != null && $order != null) { //filtrado y ordenado
            $query = $this->db->prepare("SELECT * FROM `artistas` WHERE $campo = ? ORDER BY `artistas`.`$sort` $order");
            $query->execute([$valor]);
        } else if ($campo != null && $valor != null) {//filtrado
            $query = $this->db->prepare("SELECT * FROM `artistas` WHERE $campo = ?");
            $query->execute([$valor]);
        } else if ($sort != null && $order != null) {//ordenado
            $query = $this->db->prepare("SELECT * FROM `artistas` ORDER BY $sort  $order");
            $query->execute();
        } else {//sin querys
            $query = $this->db->prepare("SELECT * FROM `artistas`");
            $query->execute();
        }

        $artistas = $query->fetchAll(PDO::FETCH_OBJ);
        return $artistas;
    }

    public function get($id)
    {
        //Obtengo la informacion individual de cada artista para mostrarla junto con sus discos
        $query = $this->db->prepare("SELECT * FROM db_artistas.artistas WHERE id = ?");
        $query->execute([$id]);
        $datoArtista = $query->fetch(PDO::FETCH_OBJ);
        return $datoArtista;
    }

    public function insert($nombre_artista, $fecha_nacimiento, $nacionalidad, $info)
    {
        //insertar un nuevo artista a partir del formulario
        $query = $this->db->prepare("INSERT INTO artistas (nombre_artista, fecha_nacimiento, nacionalidad, informacion) VALUES(?,?,?,?)");
        $query->execute([$nombre_artista, $fecha_nacimiento, $nacionalidad, $info]);
        return $this->db->lastInsertId();
    }




    public function delete($id)
    {
        $query = $this->db->prepare("DELETE FROM artistas WHERE artistas.id = ?");
        $query->execute([$id]);
    }
}
