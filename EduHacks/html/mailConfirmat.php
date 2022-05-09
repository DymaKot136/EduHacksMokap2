<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title></title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="../css/mailConfirmat.css">
    </head>

    <body>
      <h1 class="title" data-text="Edu Hacks"><span>Edu Hacks</span></h1>
      <div class="login-box">  
        <h2>El teu correu:</h2>

        <?php
              echo "<br><h2>".$_GET["mail"]."</h2>";    
        ?>
        <h2>ha sigut activat! Ara pots iniciar sesió:</h2>
      <a class="registre" href="./login.php">
        Incia sessió
      </a>

<?php

  include("../php/connectDB.php");
  include("../php/funcions.php");
  
  $consulta2 = 'SELECT activationCode, mail FROM users WHERE activationCode = \''.$_GET['code'].'\''; 
  $consulta2 = $db->query($consulta2);
  if($_SERVER["REQUEST_METHOD"]=="GET"){ 
    if ($consulta2->rowCount()>0) {

      $mail = $_GET['mail'];
      $hash = codeGenerator();
      enviaMailBenvinguda($mail, $hash);
      
      $consulta3 = "UPDATE users SET `active` = 1 WHERE mail ='".$_GET['mail']."'";
      $update = $db->query($consulta3);

    
    }
  }

?>

