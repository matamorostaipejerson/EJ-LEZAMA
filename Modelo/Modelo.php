<?php            
session_start(); // Iniciar sesión

$conn = new mysqli('localhost', 'root', '', 'sistemaintegraljpcl');
$conn->set_charset("utf8");

$tipousuario = $_POST['tipoUsuario'];
$_SESSION['tipousuario'] = $tipousuario; // Almacenar tipo de usuario en sesión
$codtipousuario = '';
$username = $_POST['username'];
$password = $_POST['password'];

if ($tipousuario == 'admi') {
    $codtipousuario = '10001';
}
if ($tipousuario == 'secre') {
    $codtipousuario = '10002';
}

$query = "SELECT * FROM usuario WHERE usu_codigo = '$username' AND usu_password = '$password' AND id_perfilusuario = '$codtipousuario'";
$resultado = $conn->query($query);

//Obteniendo el codigo de usuario logueado
$query2 = "SELECT id_personal FROM usuario WHERE usu_codigo = '$username' AND usu_password = '$password'";
$resultado2 = $conn->query($query2);
$valor = null;
if ($fila = $resultado2->fetch_assoc()) {
    $valor = $fila["id_personal"];
}

//Obtener el nombre y apellido de usuario
$query3 = "SELECT per_nombre, per_apepaterno FROM personal WHERE id_personal = '$valor'";
$resultado3 = $conn->query($query3);
$valor1 = null;
if ($fila3 = $resultado3->fetch_assoc()) {
    $valor1 = $fila3["per_nombre"] . " " . $fila3["per_apepaterno"];
}

if ($resultado->num_rows == 0) {
    $_GET['variable'] = 'No existe usuario, revise campos';
    //Enviar resultado al campo input líneas abajo
} else {        
    $_GET['variable'] = 'Ingreso Correcto, redirigiendo...';
    sleep(3); //Espera 3 segundos para redireccionar
    unset($_SESSION["idUsuarioLogueado"]);
    unset($_SESSION["nombreUsuario"]);
    session_start();
    $_SESSION["idUsuarioLogueado"] = $valor;
    $_SESSION["nombreUsuario"] = $valor1;
    if ($tipousuario == 'admi') {
        header('Location: ../Vista/abogado.php');
        exit;
    }
    if ($tipousuario == 'secre') {
        header('Location: ../Vista/secretaria.php');
        exit;
    }
}
?>
