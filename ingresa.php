<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Ingreso de registro</title>
</head>
<?php
    if (isset($_POST["rut"]) && isset($_POST["nota1"]) && isset($_POST["nota2"]) && isset($_POST["nota3"])){
        if($_POST["rut"]!="" && $_POST["nota1"]!="" && $_POST["nota2"]!="" && $_POST["nota3"]!=""){
            $rut=$_POST["rut"];
            $nota1=$_POST["nota1"];
            $nota2=$_POST["nota2"];
            $nota3=$_POST["nota3"];

            $array=array(
                "notNota1"=>$nota1,
                "notNota2"=>$nota2,
                "notNota3"=>$nota3,
                "notRut"=>$rut
            );
            $json=json_encode($array);
            $url="https://mpapinotas.herokuapp.com/api/notas/";
            $ch=curl_init($url);
            
            curl_setopt($ch,CURLOPT_POST,1);
            curl_setopt($ch,CURLOPT_POSTFIELDS,$json);
            curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type:application/json'));
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
        <h1>Ingreso de Registro</h1>
         <div class="notas">
            <label for="rut">Rut</label>
            <input type="text" name="rut" id="rut">
        </div>
        
       
        <div class="notas">
            <label for="nota1">Nota1</label>
            <input type="text" name="nota1" id="nota1" placeholder="7.0">
        </div>
        <div class="notas">
            <label for="nota2">Nota2</label>
            <input type="text" name="nota2" id="nota2" placeholder="7.0">
        </div>
        <div class="notas">
            <label for="nota3">Nota3</label>
            <input type="text" name="nota3" id="nota3" placeholder="7.0">
        </div>
        <input type="submit" value="Registrar">
    </form>
    <?php
        if (isset($_POST["rut"]) && isset($_POST["nota1"]) && isset($_POST["nota2"]) && isset($_POST["nota3"])){
            if($_POST["rut"]!="" && $_POST["nota1"]!="" && $_POST["nota2"]!="" && $_POST["nota3"]!=""){
                $result = curl_exec($ch);
            
                curl_close($ch);
            }
            
        }
        
    ?>
    
</body>
</html>