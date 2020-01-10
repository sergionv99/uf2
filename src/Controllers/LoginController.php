<?php


namespace Rentit\Controllers;

use Rentit\Controller;

final class LoginController extends Controller {

    //PARA PUTO LLEGAR AQUÍ HAY QUE PONER EN LA MIERDA DE LA URL LO SIGUIENTE: http://localhost:8084 SEGUIDO DE LO QUE COÑO QUERAMOS

    public function __construct($request) {
        parent::__construct($request);

    }
    public function index() {
        $data = ['title'=>'Log In'];
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



    public function logIn(){
        if (isset($_POST)){
            foreach ($_POST as $value) {
                if ($value==NULL){
                    parent::msg("usuario y/o contraseña no introducidas","login");
                    flush();
                    ob_flush();
                }
            }
            $pass= hash('sha256', $_POST['contrasenya']);
            $params=[':usuari'=>$_POST['usuari'],
                ':passwd' => $pass];

            $sql="SELECT * FROM usuaris WHERE usuari= :usuari AND contrasenya = :passwd;";
            $result = $this->getSingleResult($sql, $params);
            if (is_array($result)){
                session_start();
                $_SESSION['user']=$_POST['usuari'];
                header('location:/');
                return true;
            }else{
                parent::msg("usuario y/o contraseña incorrectas","login");
                flush();
                ob_flush();
            }


        } else{
            return false;
        }
    }
}