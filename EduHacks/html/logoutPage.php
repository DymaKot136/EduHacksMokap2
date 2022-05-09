<?php
    session_start();
if(!isset($_SESSION["nomUsuari"])){
    header("Location:./іndex.php");
  }

else{
    $nomUsuari = $_SESSION["nomUsuari"];
}
?>

<!DOCTYPE html>
<html>
    
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title></title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="../css/welcome.css">
    </head>

    <body>

        <a class="logout" href="../php/logout.php">
        <span></span>
        <span></span>
        <span></span> 
        <span></span>
        Tanca la sessió
        </a>

        <h1 class="title" data-text="Fins Aviat!"><span>Fins Aviat!</span></h1>

        <?php
            echo "<br><h1 class='salutaciones'>$nomUsuari</h1>";    
        ?>
        
    </body>

</html>