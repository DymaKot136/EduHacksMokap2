<?php 
    include("../php/connectDB.php");
    require_once("../php/funcions.php");

    session_start();
    if(!isset($_SESSION["nomUsuari"])){
        header("Location:./іndex.php");
    }
    else{
        $nomUsuari = $_SESSION["nomUsuari"];
    }

      if ($_SERVER['REQUEST_METHOD']=="POST"){
        if (strlen($_POST['titol']) >= 5 && strlen($_POST['titol']) <= 50 && strlen($_POST['descripcio']) >= 20 && strlen($_POST['descripcio']) <= 255 && strlen($_POST['flag']) >= 5 && strlen($_POST['flag']) <= 50 && ($_POST['puntuacio']) >= 0 ){
            $titol = $_POST['titol'];
            $descripcio = $_POST['descripcio'];
            $flag = $_POST['flag'];
            $categoria = $_POST['categoryName'];
            $puntuacio = $_POST['puntuacio'];
           
            $obtenir_Id_User = "SELECT `iduser` FROM `users` WHERE username = :nom";
            $resetear = $db->prepare($obtenir_Id_User);
            $resetear->execute(array(':nom' => $nomUsuari));
            $fila = $resetear->fetch(PDO::FETCH_ASSOC);
            
            $idUser= $fila["iduser"];
            $consultaSQL = "INSERT INTO categorys(`categoryName`) VALUES ('$categoria')";
            $insert = $db->query($consultaSQL);
            
            $nomOriginal = $_FILES["archivo"]["name"];
            $nomCod = hash('sha256',$_FILES["archivo"]["name"]);
            $ruta = "\uploads".$nomOriginal;
            $rutaCod = "../uploads/".$nomCod;
            
            $consultaSQL = "INSERT INTO ctfs(`title`, `description`, `flag`, `iduser`, `fileName`, `filePath`,`categoryName`,`score`) VALUES ('$titol','$descripcio','$flag', '$idUser','$nomOriginal','$rutaCod','$categoria','$puntuacio')";
            $insert = $db->query($consultaSQL);

            move_uploaded_file($_FILES["archivo"]["tmp_name"],$rutaCod);

            header("Location:../html/home.php");

        }
        else{
                header("Location:../html/ctf.php");
            }
      }
?>