<?php
if($_POST){

    if(($_POST['usuario']=="Paco")&&($_POST['password']=="KratosCool")){
        $_SESSION['usuario']="ok";
        $_SESSION['nombreUsuario']="Paco";
        header('Location:inicio.php');
    }else{
        echo '<script language="javascript">alert("Error: Usuario o contraseña incorrectos");</script>';
    }
        
} 
?>
<!doctype html>
<html lang="en">
  <head>
    <title>Administrador</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  </head>
  <body>
      
    <div class="container">
        <div class="row">

        <div class="col-md-4">
            
        </div>
            <div class="col-md-4">
<br><br><br><br>
                <div class="card">
                    <div class="card-header">
                        Login
                    </div>
                    <div class="card-body">
                        <form method="POST">

                        <div class = "form-group">
                        <label>Usuario</label>
                        <input type="text" class="form-control" name="usuario" placeholder="Escribe tu usuario ">                    
                        </div>

                        <div class="form-group">
                        <label>Contraseña</label>
                        <input type="password" class="form-control" name="password"  placeholder="Escribe tu contraseña">
                        </div>
                        <button type="submit" class="btn btn-primary">Entrar como administrador</button>
                        
                        </form>
                    </div>

                </div>

            </div>
            
        </div>
    </div>
    
  </body>
</html>