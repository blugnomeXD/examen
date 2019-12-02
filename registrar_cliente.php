<?php

include ('biblioteca.php');

$usuario_form = filter_input(INPUT_GET, 'usuario',FILTER_SANITIZE_STRING);
$password = filter_input(INPUT_GET, 'password',FILTER_SANITIZE_STRING);
$nombre = filter_input(INPUT_GET, 'nombre',FILTER_SANITIZE_STRING);
$apellido1 = filter_input(INPUT_GET, 'apellido1',FILTER_SANITIZE_STRING); 
$apellido2 = filter_input(INPUT_GET, 'apellido2',FILTER_SANITIZE_STRING); 
$telefono = filter_input(INPUT_GET, 'telefono',FILTER_SANITIZE_STRING);
$total_gastado = $_GET['total_gastado'];

$consulta = "SELECT *  FROM clientes WHERE usuario ='$usuario_form'";
$registro = "INSERT INTO clientes VALUES  ('$usuario_form','$password','$nombre','$apellido1','$apellido2','$telefono',$total_gastado)";
 
$rest_consulta = mysqli_query($conexion,$consulta);
$fila = mysqli_fetch_array($rest_consulta,MYSQLI_ASSOC);
 
    if($fila==true){
        echo 'El usuario ya existe ';   
        br();
        echo "<a href='nuevo_cliente.html'>Volver a la web de registro</a>";
        br();
        echo "<a href='index.html'>Volver a la web de inicio</a>";
     }else{

        $rest_registro = mysqli_query($conexion,$registro);
        $show_user=mysqli_query($conexion,$consulta);

        consulta($conexion,$consulta);
      echo "<a href='index.html'>Volver a la web de inicio</a>";
     }
     mysqli_close($conexion);
?>