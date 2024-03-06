<?php include("../template/cabecera.php");?>

<?php 
include("../config/baseData.php");
$sentenciaSQL= $conexion->prepare("SELECT * FROM usuarios");
$sentenciaSQL->execute();
$listaclientes=$sentenciaSQL->fetchAll(PDO::FETCH_ASSOC); 


?>
<h3><b>USUARIOS</b></h3>
<table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Correo</th>
                <th>Contraseña</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($listaclientes as $usuarios){ ?>
            <tr>
                <td><?php echo $usuarios['id']; ?></td>
                <td><?php echo $usuarios['nombre']; ?></td>
                <td><?php echo $usuarios['correo']; ?></td>
                <td><?php echo $usuarios['pass']; ?></td>
            </tr>
            <?php } ?>