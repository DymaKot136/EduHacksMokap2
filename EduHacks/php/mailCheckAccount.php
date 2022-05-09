<?php
  include("../php/connectDB.php");
  session_start();
  require_once("../php/funcions.php");

  $hash = codeGenerator();
  $mail = $_POST['mail'];
  
  $consulta2 = 'SELECT mail FROM users WHERE mail = \''.$_POST['mail'].'\''; 
  $consulta2 = $db->query($consulta2);

  
  if($_SERVER["REQUEST_METHOD"]=="POST"){ 
      if ($consulta2->rowCount()>0) {
        
        enviaMailPassword($mail, $hash);
        header("Location:../html/resetEnviat.php?mail=".$mail);

      }
    
  }

?>




