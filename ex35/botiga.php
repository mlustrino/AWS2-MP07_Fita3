<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
 # codi PHP per mostrar els errors al browser
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

    if (isset($_POST["prods"])){
        echo "<p>A la cistella hi ha:</p>\n";
        echo "<ul>\n";

        $file = fopen("comandes.txt","w");
        $contingut = "MaxLustino";

        foreach($_POST["prods"] as $elem){
            $contingut = "$contingut,$elem";
        }

        printf("Contingut %s",$contingut);
        fwrite($file,$contingut);
        fclose($file);
        echo "</ul>";


    }else{
        $file = fopen("productes.txt", "r");
?>

<form action="botiga.php" method="post">

    <?php 
    while(! feof($file)) {
        $line = fgets($file);
        if (trim($line) === '') continue;
        printf('<input type="checkbox" id="%1$s" name="prods[]" value="%1$s">
	        <label for="%1$s">%2$s</label><br>',
            trim($line),
            ucfirst(trim($line))
        );
        }
?>
	<input type="submit">
</form>


    <?php 
    }

?>



</body>
</html>