<?php


namespace Rentit\Controllers;

use Rentit\Controller;

final class LoginController extends Controller {


    public function __construct($request) {
        parent::__construct($request);

    }
    public function index() {
        $data = ['title'=>'NUEVOCASAS'];
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
            $params=[':email'=>$_POST['email'],
                ':passwd' => $pass];

            $sql="SELECT * FROM users WHERE email = :email AND password = :passwd;";
            $result = $this->getSingleResult($sql, $params);

            if (is_array($result)){
                session_start();
                $_SESSION['user']=$_POST['email'];
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
    public function logout(){

        session_start();

        unset($_SESSION['user']);

            return header('Location: /');

    }
}