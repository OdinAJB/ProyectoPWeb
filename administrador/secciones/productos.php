<?php include("../template/cabecera.php");?>
<?php

$txtID=(isset($_POST['txtID']))?$_POST['txtID']:"";
$txtNombre=(isset($_POST['txtNombre']))?$_POST['txtNombre']:"";
$txtInfo=(isset($_POST['txtInfo']))?$_POST['txtInfo']:"";
$txtImagen=(isset($_FILES['txtImagen']['name']))?$_FILES['txtImagen']['name']:"";
$accion=(isset($_POST['accion']))?$_POST['accion']:"";

include("../config/baseData.php");

switch($accion){

    case "Agregar":
        $sentenciaSQL= $conexion->prepare("INSERT INTO productos (nombre, informacion, imagen) VALUES (:nombre, :informacion, :imagen);");
        $sentenciaSQL->bindParam(':nombre', $txtNombre);
        
        $fecha=new DateTime();
        $nombreArchivo=($txtImagen!="")?$fecha->getTimestamp()."_".$_FILES["txtImagen"]["name"]:"imagen.jpg";
        
        $tmpImagen=$_FILES["txtImagen"]["tmp_name"];

        if($tmpImagen!=""){

            move_uploaded_file($tmpImagen, "../../img/".$nombreArchivo);
        }

        $sentenciaSQL->bindParam(':informacion', $txtInfo);
        $sentenciaSQL->bindParam(':imagen', $nombreArchivo);
        $sentenciaSQL->execute();
        header("Location:productos.php");
        
        break;

    case "Modificar":
        $sentenciaSQL= $conexion->prepare("UPDATE  productos SET nombre=:nombre WHERE id=:id");
        $sentenciaSQL->bindParam(':id', $txtID);
        $sentenciaSQL->bindParam(':nombre', $txtNombre);
        $sentenciaSQL->execute();

        $sentenciaSQL= $conexion->prepare("UPDATE  productos SET informacion=:informacion WHERE id=:id");
        $sentenciaSQL->bindParam(':id', $txtID);
        $sentenciaSQL->bindParam(':informacion', $txtInfo);
        $sentenciaSQL->execute();
        
        if($txtImagen!=""){

            $fecha=new DateTime();
            $nombreArchivo=($txtImagen!="")?$fecha->getTimestamp()."_".$_FILES["txtImagen"]["name"]:"imagen.jpg";
            $tmpImagen=$_FILES["txtImagen"]["tmp_name"];

            move_uploaded_file($tmpImagen, "../../img/".$nombreArchivo);
            
            $sentenciaSQL= $conexion->prepare("SELECT imagen FROM productos WHERE id=:id");
            $sentenciaSQL->bindParam(':id', $txtID);
            $sentenciaSQL->execute();
            $productos=$sentenciaSQL->fetch(PDO::FETCH_LAZY);
        
            if(isset($productos["imagen"]) &&($productos["imagen"]!="imagen.jpg") ){
                
                if(file_exists("../../img/". $productos["imagen"])){
                    
                    unlink("../../img/". $productos["imagen"]);
                } 
            }



            $sentenciaSQL= $conexion->prepare("UPDATE  productos SET imagen=:imagen WHERE id=:id");
            $sentenciaSQL->bindParam(':id', $txtID);
            $sentenciaSQL->bindParam(':imagen', $nombreArchivo );
            $sentenciaSQL->execute();
        }
        header("Location:productos.php");
 
        break;

    case "Cancelar":
        header("Location:productos.php");
        break;

    case "Seleccionar":
        $sentenciaSQL= $conexion->prepare("SELECT * FROM productos WHERE id=:id");
        $sentenciaSQL->bindParam(':id', $txtID);
        $sentenciaSQL->execute();
        $productos=$sentenciaSQL->fetch(PDO::FETCH_LAZY);
        
        $txtNombre=$productos['nombre'];
        $txtImagen=$productos['imagen'];
        $txtInfo=$productos['informacion'];
        break;
    
    case "Borrar":
        $sentenciaSQL= $conexion->prepare("SELECT imagen FROM productos WHERE id=:id");
        $sentenciaSQL->bindParam(':id', $txtID);
        $sentenciaSQL->execute();
        $productos=$sentenciaSQL->fetch(PDO::FETCH_LAZY);
        
        if(isset($productos["imagen"]) &&($productos["imagen"]!="imagen.jpg") ){
            if(file_exists("../../img/". $productos["imagen"])){

                unlink("../../img/". $productos["imagen"]);
            }
        }

        $sentenciaSQL= $conexion->prepare("DELETE FROM productos WHERE id=:id");
        $sentenciaSQL->bindParam(':id', $txtID);
        $sentenciaSQL->execute();
        
        header("Location:productos.php");

         break;

}

$sentenciaSQL= $conexion->prepare("SELECT * FROM productos");
$sentenciaSQL->execute();
$listaProductos=$sentenciaSQL->fetchAll(PDO::FETCH_ASSOC); 


?>

<div class="col-md-5">
    
    <div class="card">
        <div class="card-header">
            Datos del Producto
        </div>
        <div class="card-body">

        <form method="POST" enctype="multipart/form-data" >

        <form>
    <div class = "form-group">
    <label for="txtID">ID</label>
    <input type="text" required readonly class="form-control" name="txtID" value="<?php echo $txtID?>"  id="txtID" placeholder="ID">
    </div>

    <form>
    <div class = "form-group">
    <label for="txtNombre">Nombre producto</label>
    <input type="text" required class="form-control" name="txtNombre" value="<?php echo $txtNombre?>"  id="txtNombre" placeholder="Nombre del producto">
    </div>  
    
    <form>
    <div class = "form-group">
    <label for="txtInfo">Descripcion</label>
    <input type="text" class="form-control" name="txtInfo" value="<?php echo $txtInfo?>" id="txtInfo"  placeholder="Descripcion del producto">
    </div>

    <form>
    <div class = "form-group">
    <label for="txtImagen">Imagen</label>

   <br>

    <?php  if($txtImagen!=""){ ?>
        
           <img class="img-thumbnail roundend" src="../../img/<?php echo $txtImagen?>" width="50" alt="" srcset="">

    <?php }  ?>

    <input type="file" class="form-control" name="txtImagen" id="txtImagen" placeholder="Imagen">
    </div>

    <div class="btn-group" role="group" aria-label="">
        <button type="submit" name="accion" <?php echo ($accion=="Seleccionar")?"disabled":""; ?> value="Agregar" class="btn btn-success">Agregar Producto</button>
        <button type="submit" name="accion" <?php echo ($accion!="Seleccionar")?"disabled":""; ?> value="Modificar" class="btn btn-warning">Modificar</button>
        <button type="submit" name="accion" value="Cancelar" class="btn btn-info">Cancelar</button>
    </div>
    </form>
        </div>
        
    </div>


    
    
    

</div>
<div class="col-md-7">
    
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Imagen</th>
                <th>Informacion</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($listaProductos as $productos){ ?>
            <tr>
                <td><?php echo $productos['id']; ?></td>
                <td><?php echo $productos['nombre']; ?></td>
                <td>

                    <img class="img-thumbnail roundend" src="../../img/<?php echo $productos['imagen']; ?>" width="50" alt="" srcset="">

                    
                </td>
                <td><?php echo $productos['informacion']; ?></td>

                <td>
                <form method="post">
                    <input type="hidden" name="txtID" id="txtID" value="<?php echo $productos['id']; ?>"/>   

                    <input type="submit"name="accion" value="Seleccionar" class="btn btn-primary"/>

                    <input type="submit"name="accion" value="Borrar" class="btn btn-danger"/>

                </form>
                
                </td>
            
            </tr>
            <?php } ?>
        </tbody>
    </table>

</div>


<?php include("../template/pie.php");?>