<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Eliminacion de registro</title>
</head>
<?php
    if (isset($_POST["rut"])){
        if($_POST["rut"]!=""){
            $rut=$_POST["rut"];
            
            
            $url="https://mpapinotas.herokuapp.com/api/notas/".$rut;
            $ch=curl_init($url);
            
            curl_setopt($ch,CURLOPT_CUSTOMREQUEST,"DELETE");
            
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, false);
            
        }
    }
?>
<body>
    <nav class="navegacion">
        <a href="ingresa.php">Ingreso de notas</a>
        <a href="muestra.php">Muestra notas</a>
        <a href="actualiza.php">Actualiza notas</a>
        <a href="elimina.php">Elimina notas</a>
    </nav>
   

    <form action="" method="post">
        <h1>Eliminacion de Registro</h1>
         <div class="notas">
            <label for="rut">Rut</label>
            <input type="text" name="rut" id="rut">
        </div>
        
        <input type="submit" value="Eliminar">
    </form>
    <?php
        if (isset($_POST["rut"])){
            if($_POST["rut"]!=""){
                $result = curl_exec($ch);
            
                curl_close($ch);
            }
            
        }
    ?>
    
</body>
</html>