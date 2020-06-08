<?php


namespace Rentit\Controllers;


use Rentit\Controller;

/**
 * @method msg(string $string)
 */
final class RegisterController extends Controller {
    //PARA PUTO LLEGAR AQUÍ HAY QUE PONER EN LA MIERDA DE LA URL LO SIGUIENTE: http://localhost:8084 SEGUIDO DE LO QUE COÑO QUERAMOS

    public function __construct($request) {
        parent::__construct($request);

    }
    public function index() {
        $data = ['title'=>'Registrate'];
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

    public function register(){
        if (isset($_POST)){

            foreach ($_POST as $value) {
                if ($value==NULL){
                    parent::msg("hay algun campo vacio","register");
                    flush();
                    ob_flush();
                }
            }

            $pass= hash('sha256', $_POST['contrasenya']);
            $params=
                [':password' => $pass,
                ':email' => $_POST['email'],
                ':name' => $_POST['name'],
                ':surname' => $_POST['surname']];
            //todo: comprobar si el usuario ya existe


            if ($this->comprobar()){


                $sql="INSERT INTO users (name, surname, password, email) 
                VALUES (:name, :surname, :password, :email);";
                $result = $this->getSingleResult($sql, $params);

                if (!is_array($result)){
                    session_start();
                    $_SESSION['user']=$_POST['name'];
                    header('location:/');
                    return true;
                }else{
                    parent::msg("error al registrarse","register");
                    flush();
                    ob_flush();
                }
            } else {

                parent::msg("datos no validos","register");
                flush();
                ob_flush();

            }
        } else{
            return false;
        }
    }

    public function comprobar(){

        $params=
            [':mail' => $_POST['email']];

        $sql="SELECT * FROM usuaris WHERE mail=:mail";

        return !is_array($result = $this->getSingleResult($sql, $params));
    }
}