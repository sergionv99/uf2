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
        $param=$this->request->getParams();
        $data["html"]=$this->cargaDatos($param['inmueble']);
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

    private function cargaDatos($id){

        $params=[':id'=>$id];

        $sql="SELECT titulo, idTipusProducte as 'tipo', descripcio, direccio, poblacio, idTipusOferta as 'oferta' FROM productes WHERE id=:id;";
        $result = $this->getSingleResult($sql, $params);

        $param=[':id'=>$result["oferta"]];

        $sql="SELECT nom FROM tipus_oferta WHERE id=:id;";
        $resultado1 = $this->getSingleResult($sql, $param);
        $result["oferta"]=$resultado1["nom"];

        $param=[':id'=>$result["tipo"]];

        $sql="SELECT nom FROM tipus_producte WHERE id=:id;";
        $resultado1 = $this->getSingleResult($sql, $param);
        $result["tipo"]=$resultado1["nom"];


        $html="<table>";

        foreach ($result as $key => $value){

            $html.="<tr>";
            $html.="<td>".$key."</td><td>".$value."</td>";
            $html.="</tr>";

        }
        $html.="</table>";

        return $html;
    }
}