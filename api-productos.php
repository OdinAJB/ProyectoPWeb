<?php include("template/cabecera.php");

include_once 'productos.php';
/*
if(isset($_POST['id'])){

    if($id== ''){
        echo json_encode(['statuscode' => 400, 'response' => 'No existe el ID']);
    }else{
        $productos = new Productos();
        $items = $productos->getItemsById($id);

        echo json_encode(['statuscode' => 200, 'items ' => $items]);
    }

}else{
    echo json_encode(['statuscode' => 400, 'response' => 'No hay accion']);
}
/*
?>





<?php include("template/pie.php"); ?>