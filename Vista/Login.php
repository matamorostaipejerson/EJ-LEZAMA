<!DOCTYPE html>
<html>
<head>
    <title>SISTEMA INTEGRAL JPCL - LOGIN</title>
    <link rel="shortcut icon" href="img/logo.png" type="image/x-icon">   
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <!--Estilos de BootStrap para mejora de apariencia-->
    <link href="css/bootstrap.min.css" rel="stylesheet" />
    <script src="js/bootstrap.min.js"></script>
	<!--Fin de importación-->
    <script src="https://kit.fontawesome.com/047316aeb8.js" crossorigin="anonymous"></script>
    <link href="css/login.css" rel="stylesheet" />
</head>
<body>   
    <div class="badge badge-primary text-wrap" style="width: 6rem;"> 
        <a href="../index.php" target="_self" style="color:white;" class="text-decoration-none">Inicio</a>    
    </div>
    <div class="modal-dialog text-center">
        <div class="col-sm-8 main-section">
            <div class="modal-content">
                <div class="col-12 user-img">                    
                    <img src="img/Login.png" class="img-fluid" alt="Responsive image">
                </div>
                <form  action="../Modelo/Modelo.php" method="post" name="signin-form" class="col-12"> 
                            <i class="fas fa-user-friends"></i>
                            <label for="exampleInputEmail1">Tipo de usuario</label>
                            <div class="form-check" style="width:180px;text-align:left;">
                                <input class="form-check-input" type="radio" name="tipoUsuario" id="flexRadioDefault1" value="admi" checked>
                                <label class="form-check-label" for="flexRadioDefault1">
                                    Administrador
                                </label>
                                <br>
                                <input class="form-check-input" type="radio" name="tipoUsuario" id="flexRadioDefault2" value="secre">
                                <label class="form-check-label" for="flexRadioDefault2">
                                    Secretaria
                                </label>                                
                            </div>   
                            <br>
                            <div class="form-group" id="user-group">
                                <i class="fas fa-user"></i>                                
                                <label for="exampleInputEmail1">Nombre de usuario</label>
                                <input class="form-control" type="text" name="username" placeholder="Ingrese...">
                            </div>
                            <div class="form-group" id="contrasena-group">
                                <i class="fas fa-unlock-alt"></i>
                                <label for="exampleInputPassword1">Password</label>
                                <input type="password" class="form-control" name="password" placeholder="Ingrese Password...">
                            </div>                            
                            <button type="submit" class="btn btn-primary" name="login" value="login">Enviar</button>
                            <br>
                            <br>
                        </form>                
            </div>
        </div>
    </div>    
</div>
</body>
</html>