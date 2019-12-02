<?php
$db_host='localhost';
$db_name='empresa';
$db_usuario='root';
$db_contra='';

    $conexion =mysqli_connect($db_host,$db_usuario,$db_contra) or die('No se ha podido conectar a la base de datos');
    mysqli_select_db($conexion,$db_name) or die('No se encuentra la base de datos');
    mysqli_set_charset($conexion,"utf8");
    
    function br(){
        for($i=0;$i<2;$i++){
            echo "<br>";
        }
    } 


    //FUNCIONES EJERCICIO 2
    function historial($usuario){
        $file = fopen("registro.txt","a");
        $msg ="La persona que hizo login es " . $usuario . " La fecha en la que hizo el login " . date("Y/m/d") . "<br>";
        fwrite($file,$msg);
        fclose($file);
    }
    
    function verHistorial(){

        $file =fopen("registro.txt","r") or die('notfound');
        echo fread($file,filesize("registro.txt"));
        fclose($file);
    }

  //FUNCION EJERCICIO 1

   function consulta($conexion,$sql){

              $show =mysqli_query($conexion,$sql);
             while($fila_registro = mysqli_fetch_array($show,MYSQLI_ASSOC)){
        
     echo '<table> ';
     echo '<tr>';        
           echo  '<th>'. $fila_registro['usuario'] . '</th>' ;
           echo  '<th>'. $fila_registro['pass'] . '</th>' ;
           echo  '<th>'. $fila_registro['nombre'] . '</th>' ;
           echo  '<th>'. $fila_registro['apellido1'] . '</th>' ;
           echo  '<th>'. $fila_registro['apellido2'] . '</th>' ;
           echo  '<th>'. $fila_registro['telefono'] . '</th>' ;
           echo  '<th>'. $fila_registro['total_gastado'] . '</th>' ;
     echo '<tr>';
     echo '</table>';
     
             } 
   }
   
?>
    
