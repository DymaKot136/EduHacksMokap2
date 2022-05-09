<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>WAF Security Test</title>
</head>
<body>
    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
        <p>
            Introdueix el nom:
            <br>
            Nom: <input type="text" name="nom">
            <br>
            <input type="submit" value="Enviar">
        </p>
    </form>
</body>
</html>






<?php
    $cadena_connexio = 'mysql:dbname=eduhacks;host=localhost:3306';
    $usuari = 'root';
    $passwd = '';
    try{
        //Creem una connexió persistent a BDs
        $db = new PDO($cadena_connexio, $usuari, $passwd, 
                        array(PDO::ATTR_PERSISTENT => true));
    }catch(PDOException $e){
        echo 'Error amb la BDs: ' . $e->getMessage();
    }
    $nom = $_POST["nom"];
    $mysqli->query("SELECT * FROM users WHERE nom = $nom;");

?>




