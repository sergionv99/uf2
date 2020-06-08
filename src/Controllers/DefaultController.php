<?php


namespace Rentit\Controllers;

use Rentit\Controller;

final class DefaultController extends Controller {

    //PARA PUTO LLEGAR AQUÍ HAY QUE PONER EN LA MIERDA DE LA URL LO SIGUIENTE: http://localhost:8084 SEGUIDO DE LO QUE COÑO QUERAMOS

    public function __construct($request) {
        parent::__construct($request);

    }
    public function index() {

        $total = $this->allproperties();

        $data = ['title'=>'NUEVOCASAS','html'=>'','propiedades'=>$total];

        $this->render($data);
    }

    function error() { throw new \Exception("[ERROR::]:Non existent method"); }

    public function allproperties(){
        $sql = "SELECT * FROM properties";
        $total = $this->getResults($sql);
        return $total;
    }

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

}