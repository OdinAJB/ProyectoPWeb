<?php
//session_star();
  /*if(!isset($_SESSION['usuario'])){
    header("Locarion:../index.php")
  }else{
    $host="localhost";
    $bd="administrador";
    $usuario="root";
    $contraseña="";
    //crear conexion
    $conn= new mysqli($host, $bd, $usuario, $contraseña, $bd);
    //verificar conexion
    if(!$conn){
      die("Conexcion fallida: ". mysqloi_connect_error());
    }
    //verificar usuario
    $username="Paco";
    $sentenciaSQL= $conexion->prepare("SELECT * FROM administrador WHERE usuario=$username");
    $result = $conn->query($sentenciaSQL);

    //verificar regreso de datos
    if($result->num_rows >0){
      echo "Los datos de usuario exiten en la base de datos";
    }else{
      echo "El usuario no existe en la base de datos";
    }
  }
*/



?>

<!doctype html>
<html lang="en">
  <head>
    <title>Title</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  </head>
  <body>
    <?php $url="http://".$_SERVER['HTTP_HOST']."/ProyectoPWeb"?>

    <nav class="navbar navbar-expand navbar-light bg-light">
        <div class="nav navbar-nav">
            <a class="nav-item nav-link active" href="#">Administrador del sitio <span class="sr-only">(current)</span></a>
            <a class="nav-item nav-link" href="<?php echo $url;?>/administrador/inicio.php">Inicio</a>
            <a class="nav-item nav-link" href="<?php echo $url;?>/administrador/secciones/productos.php">Administrador productos</a>
            <a class="nav-item nav-link" href="<?php echo $url;?>/administrador/secciones/clientes.php">Checar clientes</a>
            <a class="nav-item nav-link" href="<?php echo $url;?>/administrador/secciones/cerrar.php">Cerrar sesion de administrador</a>
            <a class="nav-item nav-link" href="<?php echo $url;?>">Ver sitio web</a>
        </div>
    </nav>
    <div class="container">
        <br><br>
        <div class="row">