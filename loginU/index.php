<?php
session_start();
include("baseData2.php");

//Existe

if(isset($_POST["login"])){

  $txtEmail=(isset($_POST['txtEmail']))?$_POST['txtEmail']:"";
  $txtPassword=(isset($_POST['txtPassword']))?$_POST['txtPassword']:"";
  $txtNombre=(isset($_POST['txtNombre']))?$_POST['txtNombre']:"";

  $sentenciaSQL=$conexion->prepare("SELECT * FROM usuarios where correo=:correo");

  $sentenciaSQL->bindParam("correo", $txtEmail, PDO::PARAM_STR);


  
  $sentenciaSQL->execute();

  $numeroRegistos=$sentenciaSQL->rowCount();

  if($numeroRegistos>=1){
    header('Location:../index.php');
    //Cookies
    $_SESSION["correo"] = $_POST["txtEmail"];
    $_SESSION["pass"] = $_POST["txtPassword"];
    
    setcookie("correo", $txtCorreo, time() + (86400 * 30), "/");
   




  }
  }else{
  
  }





//Guardar info
$txtNombre=(isset($_POST['txtNombre']))?$_POST['txtNombre']:"";
$txtCorreo=(isset($_POST['txtCorreo']))?$_POST['txtCorreo']:"";
$txtPass=(isset($_POST['txtPass']))?$_POST['txtPass']:"";
$registro=(isset($_POST['registro']))?$_POST['registro']:"";

switch($registro){
    
  case "registrarse":
      $sentenciaSQL= $conexion->prepare("INSERT INTO usuarios (nombre, correo, pass) VALUES (:nombre, :correo, :pass);");
      $sentenciaSQL->bindParam(':nombre', $txtNombre);
      $sentenciaSQL->bindParam(':correo', $txtCorreo);
      $sentenciaSQL->bindParam(':pass', $txtPass);
      $sentenciaSQL->execute();
      header("Location: index.php");
      break;
}

?>



<!doctype html>
<html lang="en">
<head>
  <title>Webleb</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="stylesheet" href="https://unicons.iconscout.com/release/v2.1.9/css/unicons.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.0/css/bootstrap.min.css">
  <link rel="stylesheet" href="stilos.css">
</head>
<body>

  <div class="section">
  <a href="../index.php">Volver</a>
    <div class="container">
      <div class="row full-height justify-content-center">
        <div class="col-12 text-center align-self-center py-5">
          <div class="section pb-5 pt-5 pt-sm-2 text-center">
            <h6 class="mb-0 pb-3"><span>Log In </span><span>Sign Up</span></h6>
            <input class="checkbox" type="checkbox" id="reg-log" name="reg-log" />
            <label for="reg-log"></label>
            <div class="card-3d-wrap mx-auto">
              <div class="card-3d-wrapper">
                <div class="card-front">
                  <div class="center-wrap">
                    <div class="section text-center">
                      <form method="post">
                        <h4 class="mb-4 pb-3" name="LogIN">Log In
                        </h4>
                        <div class="form-group">
                          <input type="email" class="form-style" placeholder="Email" name="txtEmail">
                          <i class="input-icon uil uil-at"></i>
                        </div>
                        <div class="form-group mt-2">
                          <input type="password" class="form-style" placeholder="Password" name="txtPassword">
                          <i class="input-icon uil uil-lock-alt"></i>
                        </div>
                        <button type="submit" class="btn mt-4" name="login" value="login" >Login</button>
                        <p class="mb-0 mt-4 text-center"><a href="https://www.youtube.com/watch?v=qg7EetT-sHQ" class="link">Olvidaste tu contraseña?
                            </a></p>
                      </form>
                    </div>
                  </div>
                </div>
                <div class="card-back">
                  <div class="center-wrap">
                    <div class="section text-center">
                      <form method="post">
                        <h4 class="mb-3 pb-3">Sign Up</h4>
                        <div class="form-group">
                          <input type="text" class="form-style" placeholder="Nombre" id="txtNombre" name="txtNombre">
                          <i class="input-icon uil uil-user"></i>
                        </div>
                        <div class="form-group mt-2">
                          <input type="email" class="form-style" placeholder="Correo" id="txtCorreo" name="txtCorreo">
                          <i class="input-icon uil uil-at"></i>
                        </div>
                        <div class="form-group mt-2">
                          <input type="password" class="form-style" placeholder="Contraseña" id="txtPass" name="txtPass">
                          <i class="input-icon uil uil-lock-alt"></i>
                        </div>
                        <button type="submit" href="index.php" class="btn mt-4" name="registro" value="registrarse" >Registrarse</button>
                      </form>
                    </div>
                    </form>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</body>
</html>


