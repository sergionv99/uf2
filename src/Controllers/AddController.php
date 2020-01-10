<?php


namespace Rentit\Controllers;


use Rentit\Controller;

final class AddController extends Controller
{
    //PARA PUTO LLEGAR AQUÍ HAY QUE PONER EN LA MIERDA DE LA URL LO SIGUIENTE: http://localhost:8084/user/index SEGUIDO DE LO QUE COÑO QUERAMOS
    public function __construct($request)
    {
        parent::__construct($request);
    }
    public function index() {
        $data = ['title'=>'Añadir producto'];
        $this->getDB();
        $this->render($data);
    }

    function error() { throw new \Exception("[ERROR::]:Non existent method"); }

    public function getSingleResult($sql, $params = null) {
        $db=$this->getDB();
        $sentencia = $this->query($db, $sql, $params);
        $resultados = $this->row_extract_one($sentencia);
        return $resultados;
    }

    public function getResults($sql, $params = null) {
        $db=$this->getDB();
        $sentencia = $this->query($db, $sql, $params);
        $resultados = $this->row_extracts($sentencia);
        return $resultados;
    }

    public function add()
    {
        if (isset($_POST)){;
            foreach ($_POST as $value) {
                if ($value==NULL){
                    parent::msg("hay algun campo vacio","add");
                    flush();
                    ob_flush();
                }
            }
            session_start();
            $param=[":usuari"=>$_SESSION['user']];
            $sql="SELECT id FROM usuaris WHERE usuari=:usuari;";
            $result = $this->getSingleResult($sql,$param);

            $sql="INSERT INTO productes ( `idTipusOferta`, `idTipusProducte`, `titulo`, `descripcio`, `preu`, `m2`, `idPropietari`, `direccio`, `cp`, `poblacio`, `provincia`) 
            VALUES (".$_POST['select'].", ".$_POST['select2'].", '".$_POST['tit']."', '".$_POST['desc']."', ".$_POST['precio'].", ".$_POST['m2'].", ".$result['id'].", 'dsdsfdsf', 08850, '".$_POST['pob']."', 'bcn');";
            $result = $this->getSingleResult($sql, "");
            if (!is_array($result)){
                header('location:/');
                return true;
            }else{
                parent::msg("error al subir el anuncio","register");
                flush();
                ob_flush();
            }

        }
    }
}