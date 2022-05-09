<?php
    $nomUsuari = $_POST["nomUsuari"];
    session_start();
    session_destroy();
    setcookie($nomUsuari, "cookie", time() - (3600*24),"/");
    header("Location:../html/index.php");
?>

