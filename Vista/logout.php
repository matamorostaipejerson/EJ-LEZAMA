<?php
    session_start();
    session_destroy();
    echo 'Cerrado de sesión satisfactoriamente!';
    set_time_limit(2000);
    echo '<script language="javascript">
            alert("Cerrando sesiones y volviendo al inicio");
            window.location="../index.php";
          </script>';   
?>