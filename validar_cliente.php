<?php
    include('biblioteca.php');

    $usuario =filter_input(INPUT_POST, 'usuario', FILTER_SANITIZE_STRING);
    $password =filter_input(INPUT_POST, 'password', FILTER_SANITIZE_STRING);

    $consulta ="SELECT usuario,pass FROM clientes WHERE usuario ='$usuario' AND pass ='$password'";
    $allusers = "SELECT * FROM clientes";
    $showUser ="SELECT * FROM clientes WHERE usuario ='$usuario' AND pass ='$password'";
   
    $rest_consulta =mysqli_query($conexion,$consulta);
    $fila = mysqli_fetch_array($rest_consulta,MYSQLI_ASSOC);
    
    //Modificar
    if($fila==true){
        if($usuario=='admin'){
            echo "<h1>Tus datos de cuenta</h1>";
        
                       consulta($conexion,$allusers);
                       historial($usuario);
           echo "<hr>";
           echo "<h1> REGISTRO DE ENTRADA DEL LOGIN </h1>";
           verHistorial();
        }else{

                echo "<h1>Tus datos de cuenta</h1>";

                     consulta($conexion,$showUser);

                     historial($usuario);    
                     
                     echo "<form name='formulario' method='post' action='validar_cliente.php'>
                     Dinero <input type='text' name='dinero' > 
                    <input type='submit'></form>";
                    $dinero=$_POST['dinero'];
            
                    $update = "UPDATE clientes SET total_gastado = total_gastado+($dinero) WHERE usuario ='$usuario' AND pass='$password'";
           }            
        
        }
    
    if($fila<=0){

        echo "No es un usuario registrado <br><br>  ";
        echo "<a href='nuevo_cliente.html'>Registrarse Aqui</a>";
    }
    mysqli_close($conexion);
?>