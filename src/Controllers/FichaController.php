<?php


namespace Rentit\Controllers;


use http\Env\Request;
use Rentit\Controller;

class FichaController extends Controller{

    public function __construct($request) {
        parent::__construct($request);

    }
    public function index($inmueble=null) {

        $data = ['title'=>'Ficha del anuncio','html'=>''];
        $this->render($data);
    }

    function error() { throw new \Exception("[ERROR::]:Non existent method"); }


    public function getSingleResult($sql, $params = null)
    {
        $db=$this->getDB();
        $sentencia = $this->query($db, $sql, $params);

        $resultados = $this->row_extract_one($sentencia);
        return $resultados;
    }

    public function getResults($sql, $params = null)
    {
        $db=$this->getDB();
        $sentencia = $this->query($db, $sql, $params);

        $resultados = $this->row_extracts($sentencia);
        return $resultados;
    }

    private function inmueble($id){

        $sql = "SELECT * FROM properties where id =".$id;

    }
}