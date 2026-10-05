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

$rutaOrigen = __DIR__."/contactes31.txt";
if (!file_exists($rutaOrigen)) die("L'arxiu no existeis");

$fOrigen = fopen($rutaOrigen, "r");
if ($fOrigen === false) die("No s'ha pogut obrir l'arxiu");

$lineaMostrar = '<tr><td>%s</td><td>%s %s</td><td>%s</td></tr>';

echo '<table><tr><th colspan="3">PROCESSA CONTACTES</th></tr>';
printf($lineaMostrar,"Nom", "Cognoms","", "Telèfon");

$rutaDesti = __DIR__."/contactes31b.txt";
$fDesti = fopen($rutaDesti,"w");

    while(! feof($fOrigen)) {
        $getline = trim(fgets($fOrigen));
        $arr_line = explode(",",$getline);
        printf($lineaMostrar ,...$arr_line);
        fwrite($fDesti, trim($arr_line[0])."#".trim($arr_line[1].$arr_line[2]). "#".trim($arr_line[3]). "\n");
        
    }

echo "</table>";
    fclose($fDesti);
    fclose($fOrigen);
 

    ?>
</body>
</html>