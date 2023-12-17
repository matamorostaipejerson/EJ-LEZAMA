<?php
    require_once('../Config/config.php');
    $conn = new mysqli(constant('DB_HOST'),constant('DB_USER'),constant('DB_PASS'),constant('DB')); 

    if(!$conn){
        die("No se puede conectar a la base de datos". $conn->error);
    }
    
    class Conexion{

        private $host;
	    private $db;
	    private $user;
	    private $pass;
	    public $conection;

        public function __construct(){
            $this->host = constant('DB_HOST');
		    $this->db = constant('DB');
		    $this->user = constant('DB_USER');
		    $this->pass = constant('DB_PASS');
            try {
                $this->conection = new PDO('mysql:host='.$this->host.'; dbname='.$this->db, $this->user, $this->pass);
            } catch (PDOException $e) {
                echo $e->getMessage();
            exit();
        }    
        }       

        public function obtenerUsuario(){
            $query = $this->cone->query('SELECT usu_codigo,usu_password FROM usuario');
            $retorno = [];
            $i=0;
            while($fila = $query->fetch_assoc()){
                $retorno[$i]=$fila;
                $i++;        
            }
            return $retorno;
        }

        public function registrarUsuario(){
            $query = $this->cone->query('INSERT INTO usuario(id_usuario,usu_codigo) VALUE(:codigo,:usucodigo)');
            $retorno = [];
            /*$i=0;
            while($fila = $query->fetch_assoc()){
                $retorno[$i]=$fila;
                $i++;        
            }*/
            return $retorno;
        }
    }    
?>