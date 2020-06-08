<?php


namespace Rentit\Controllers;


use Rentit\Controller;

final class PropertieController extends Controller
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




    public function propertie()
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
            $param=[":email"=>$_SESSION['user']];
            $sql="SELECT id FROM users WHERE email=:email";
            $result = $this->getSingleResult($sql,$param);


           $id_user = (int)$result['id'];

            $params=
                [   ':title' => $_POST['title'],
                    ':type' => $_POST['type'],
                    ':state' => $_POST['state'],
                    ':city' => $_POST['city'],
                    ':province' => $_POST['province'],
                    ':cp' => $_POST['cp'],
                    ':description' => $_POST['description'],
                    ':price' => $_POST['price'],
                    ':id' => $id_user,
                    ':area' => $_POST['area']];


                $sql="INSERT INTO properties (title, price, description, state, type, city, cp, province, area, user_id) 
                VALUES (:title, :price, :description, :state, :type, :city,:cp, :province, :area, :id);";
                $result = $this->getSingleResult($sql, $params);



//            $sql="INSERT INTO properties ( `idTipusOferta`, `idTipusProducte`, `titulo`, `descripcio`, `preu`, `m2`, `idPropietari`, `direccio`, `cp`, `poblacio`, `provincia`)
//            VALUES (".$_POST['select'].", ".$_POST['select2'].", '".$_POST['tit']."', '".$_POST['desc']."', ".$_POST['precio'].", ".$_POST['m2'].", ".$result['id'].", 'dsdsfdsf', 08850, '".$_POST['pob']."', 'bcn');";
//            $result = $this->getSingleResult($sql, "");

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
    public function ficha()
    {

    }
}