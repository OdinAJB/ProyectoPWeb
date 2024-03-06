<?php include("template/cabecera.php");
//include("baseData2.php");

/*
class Productos{
    public function post($id){
        $query = $this->connect()->prepare('SELECT * FROM productos WHERE id=:id');
        $query->execute(['id'=>$id]);
    
        return[
            'id'            => $row['id'],
            'nombre'        => $row['nombre'],
            'informacion'   => $row['informacion'],
            'imagen'        => $row{'imagen'},
        ];
 
    }
}
*/

?>



<?php
include("administrador/config/baseData.php");
$sentenciaSQL= $conexion->prepare("SELECT * FROM productos");
$sentenciaSQL->execute();
$listaProductos=$sentenciaSQL->fetchAll(PDO::FETCH_ASSOC);
?>

   
<?php foreach($listaProductos as $producto) {?>
<div class="col-md-3">    
<div class="card">
    <img class="card-img-top" src="./img/<?php echo $producto['imagen'];?>" alt="">

    <div class="card-body">
        <h4 class="card-title"><?php echo $producto['nombre'];?></h4>
        <a>Descripcion:<br><?php echo$producto['informacion']?></a>
    </div>
    <button type="submit" class="btn mt-4" name="Agregar" value="Agregar">Agregar al carrito</button>
 
</div>
</div>
<?php } ?>

<?php include("template/pie.php"); ?>