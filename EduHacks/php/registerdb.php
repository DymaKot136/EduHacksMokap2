<?php
  include("../php/connectDB.php");
  require_once("../php/funcions.php");
  
    if ($_SERVER['REQUEST_METHOD']=="POST"){
        if (strlen($_POST['username']) >= 1 && strlen($_POST['mail']) >= 1 && strlen($_POST['password']) >= 1 && strlen($_POST['repeat_password']) >= 1 ){
            $username = $_POST['username'];
            if(isset($_POST['userFirstName'])){
                $userFirstName = $_POST['userFirstName'];
            }
            if(isset($_POST['userLastName'])){
                $userLastName = $_POST['userLastName'];
            }
            $mail = $_POST['mail'];
            if($_POST['password'] == $_POST['repeat_password']){
                $password = $_POST['password'];
                $password = password_hash($_POST['password'], PASSWORD_DEFAULT );
                $creationDate = date('Y/m/d G:i:s');
                $hash = codeGenerator();
               
                $consultaSQL = "INSERT INTO users(`username`, `mail`, `passHash`, `userFirstName`, `userLastName`, `creationDate`, `active`, `activationCode`) VALUES ('$username','$mail','$password','$userFirstName','$userLastName', '$creationDate', '0' ,'$hash' )";
                $insert = $db->query($consultaSQL);
               
                enviaMailActivacio($mail, $hash);
                

                
                header("Location:../html/registerMailSend.php?mail=".$mail);
             

                $activationCode = 63;
                echo rand(pow(10, $activationCode -1), pow(10, $activationCode)-1);
                
                

            }else{
                header("Location:../register.html");
            }
        }
    }
?>