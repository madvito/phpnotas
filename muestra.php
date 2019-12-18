<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Mostrar notas</title>
</head>
<?php
            if (isset($_GET["rut"])){
                if (strlen($_GET["rut"])>0){
                    $rut=$_GET["rut"];
                    $url="https://mpapinotas.herokuapp.com/api/notas/".$rut;
                }else{
                    $url="https://mpapinotas.herokuapp.com/api/notas/";
                }
                $resp=file_get_contents($url);
                $resp_array=json_decode($resp,true);
            }
            
            
        ?>
<body>
    <nav class="navegacion">
        <a href="ingresa.php">Ingreso de notas</a>
        <a href="muestra.php">Muestra notas</a>
        <a href="actualiza.php">Actualiza notas</a>
        <a href="elimina.php">Elimina notas</a>
    </nav>
    <h1>Mostrar Notas</h1>
    <p>Para buscar un registro especifico, ingrese un rut al campo, dejar vacío para mostrar todos los registros</p>
    
    <form action="" method="get">
        <div class="buscador">
            <label for="rut">Rut</label><input type="text" name="rut" id="rut" placeholder="1-9">
        </div>
        <div>
            <label for="sinrut">Buscar sin ingresar rut</label><input type="checkbox" name="sinrut" id="sinrut" value="sin">
        </div>
        <div>
            <input type="submit" value="Buscar">
        </div>
        
    </form>
    <div class="res">
        <?php
            $string="";
            if (isset($_GET["sinrut"]) && $_GET["rut"]==""){
                foreach ($resp_array as $reg) {
                    $con=0;
                    print '<div>';
                   $string= 'RUT<input type="text" name="rut'.$con.'" id="rut'.$con.'" value="'.$reg["notRut"].'">NOTA1<input type="text" name="nota1'.$con.'" id="nota1'.$con.'" value="'.$reg["notNota1"].'">NOTA2<input type="text" name="nota2'.$con.'" id="nota2'.$con.'" value="'.$reg["notNota2"].'">NOTA3<input type="text" name="nota3'.$con.'" id="nota3'.$con.'" value="'.$reg["notNota3"].'">';
                   print $string; 
                   print '</div>';
                    
                 }
            }else{
                if(isset($_GET["rut"]) && !isset($_GET["sinrut"])){
                    if($_GET["rut"]!=""){
                        print '<div>';
                        $string= 'RUT<input type="text" name="rut0" id="rut" value="'.$resp_array["notRut"].'">NOTA1<input type="text" name="nota1" id="nota1" value="'.$resp_array["notNota1"].'">NOTA2<input type="text" name="nota2" id="nota2" value="'.$resp_array["notNota2"].'">NOTA3<input type="text" name="nota3" id="nota3" value="'.$resp_array["notNota3"].'">';
                        print $string; 
                        print '</div>';
                    }
                   
                }
            }
            
            //print $resp_array[0];
        ?>
    </div>
</body>
</html>