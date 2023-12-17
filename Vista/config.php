<?php	   
      try {
        $db = new PDO('mysql:host=localhost;dbname=sistemaintegraljpcl;charset=utf8mb4', 'root', '');
        echo 'Conectado a '.$db->getAttribute(PDO::ATTR_CONNECTION_STATUS);
      } catch(PDOException $ex) {
        echo 'Error conectando a la Base de Datos!!! '.$ex->getMessage(); 
      }
?>