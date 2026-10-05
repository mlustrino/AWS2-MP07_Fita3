<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contactes</title>
<style> table, td {
    border: 1px solid black;
    border-collapse: collapse;
    padding: 5px;
    text-align: left;}
    th{
    border: 1px solid black;
    border-collapse: collapse;
    padding: 5px;
    text-align: center;} </style>


</head>
<body>
    <?php

 # codi PHP per mostrar els errors al browser
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$rutaOrigen = __DIR__."/ex34.txt";
if (!file_exists($rutaOrigen)) die("L'arxiu no existeis");

$fOrigen = fopen($rutaOrigen, "r");
if ($fOrigen === false) die("No s'ha pogut obrir l'arxiu");

    while(! feof($fOrigen)) {
        $getline = trim(fgets($fOrigen));

        if (str_starts_with($getline, "##")){
            $titol = trim(substr($getline, 2));
            echo "<h1>".$titol."</h1>\n";

        }else{
            echo $getline."\n";

        }
    }




    fclose($fOrigen);
 

    ?>
</body>
</html>