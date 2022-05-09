<?php

include("connectDB.php");

session_start();
    if(!isset($_SESSION["nomUsuari"])){
        header("Location:./іndex.php");
    }
    else{
        $nomUsuari = $_SESSION["nomUsuari"];
    }





if ($_SERVER['REQUEST_METHOD']=="POST"){

    $idCtf = $_GET["idCTF"];
    $flag = $_POST["flag"];

    $obtenir_Id_User = "SELECT `iduser` FROM `users` WHERE username = :nom";
    $prepareIdUser = $db->prepare($obtenir_Id_User);
    $prepareIdUser->execute(array(':nom' => $nomUsuari));
    $IdUserArray = $prepareIdUser->fetch(PDO::FETCH_ASSOC);
    $idUser= $IdUserArray["iduser"];


    $GetTrueFlag= "SELECT `flag` FROM `ctfs` WHERE `idctf` = $idCtf;"; 
    $TrueFlagS = $db->prepare($GetTrueFlag);
    $TrueFlagS->execute();
    $TrueFlag = $TrueFlagS->fetchAll();

    if($flag == $TrueFlag[0]["flag"]){
        $resultat = 1;
        $SQL_InserirResultat = "INSERT INTO `check` VALUES ($idUser,$idCtf);";
        $insert = $db->query($SQL_InserirResultat);
        /*header("location:../html/home.php?resultat=$resultat");*/
    }
    else{
        $resultat = 0;
        /*header("location:../html/home.php?resultat=$resultat");*/
        
    }
    
}

else{
    header("Location:../html/home.php");
}

?>