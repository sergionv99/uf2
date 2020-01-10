<?php


namespace Rentit\Controllers;

use Rentit\Controller;

final class DefaultController extends Controller {

    //PARA PUTO LLEGAR AQUÍ HAY QUE PONER EN LA MIERDA DE LA URL LO SIGUIENTE: http://localhost:8084 SEGUIDO DE LO QUE COÑO QUERAMOS

    public function __construct($request) {
        parent::__construct($request);

    }
    public function index() {

        $data = ['title'=>'Construcciones para todos','html'=>''];

        $data["html"]=$this->cargaDatos();
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

    private function cargaDatos(){
        $sql= "SELECT * FROM productes ORDER BY id;";
        $resultados = $this->getResults($sql,"");

        $html= "<table><tr>";

        $i=0;
        session_start();
        $mas_info="";

        foreach ($resultados as $inmueble){
            $i++;
            if ($i==0){
                $html.="<tr>";
            }
            if (isset($_SESSION['user'])){
                $id=$inmueble['id'];
                $mas_info="<br/><a href='/ficha/index/inmueble/".$id."'>Mas Info</a>";
            }
            $html.="<td>Titulo: ".$inmueble['titulo']."<br/>Poblacion: ".$inmueble['poblacio'].$mas_info."</td>";
            if ($i==2){
                $html.="</tr>";
                $i=0;
            }
        }
        $html.="</table>";
        return $html;
    }
}