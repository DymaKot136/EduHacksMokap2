<?php
    session_start();
if(!isset($_SESSION["nomUsuari"])){
    header("Location:./іndex.php");
  }

else{
    $nomUsuari = $_SESSION["nomUsuari"];
}

include("../php/connectDB.php");

$obtenerContador = "SELECT count(DISTINCT `categoryName`) as contador FROM `ctfs`  WHERE `categoryName` <> '';";
$contadorCategorias = $db->prepare($obtenerContador);
$contadorCategorias->execute();
$contador = $contadorCategorias->fetch(PDO::FETCH_ASSOC);
$cont = $contador['contador'];

$ConsultarCategorias = "SELECT  DISTINCT `categoryName` FROM `ctfs`  WHERE `categoryName` <> '';";
$categorias = $db->prepare($ConsultarCategorias);
$categorias->execute();


$GetBestCategory = "SELECT `categoryName`, count(*) as `total` FROM `ctfs` GROUP BY `categoryName` ORDER BY 2 DESC LIMIT 1;";
$BestCategoryCtf = $db->prepare($GetBestCategory);
$BestCategoryCtf->execute();
$BestCategory = $BestCategoryCtf->fetch(PDO::FETCH_ASSOC);
$MillorCategoria = $BestCategory["categoryName"];
$total = $BestCategory["total"];


$GetBestCtfs = "SELECT * FROM ctfs WHERE `categoryName` = '$MillorCategoria';";
$BestCtfs = $db->prepare($GetBestCtfs);
$BestCtfs->execute();
$BestCTFS = $BestCtfs->fetchAll();
?>

<!DOCTYPE html>
<html>
    
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>EduHacks Home</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="../css/home.css">
        <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css" rel="stylesheet">
        <link rel="stylesheet" href="../css/PintarCTFS.css">
    </head>

    <body>
        <nav>   
            <input type="checkbox" id="check">
            <label for="check" class="checkbtn">
                <i class="fas fa-bars"></i>
            </label>         
            <a href="../html/home.php" class="home">
                <h1 class="title" data-text="EduHacks"><span>EduHacks</span></h1>
            </a>
            <ul>
                <li><a href="../html/logoutPage.php">Perfil</a></li>
                <li><a href="../html/ctf.php">Crear CTFS</a></li>
                <li><a href="../html/ctf.php">Puntuació</a></li>
            </ul>    
        </nav>
        <section class="principio">
            <h2 class="saludos">Hey Hola Què Tal</h2>
            <br><br>
        <?php
            echo "<br><h1 data-text='$nomUsuari'><span>$nomUsuari</span></h1>";    
        ?>
            <br><br>
        </section>
        <div class="separar">
            <h1 class="titol2">Lets Go to capture some flags! </h1>
        </div>
        <div class="joc">
            <div class="categorias">
                <div class="flotante">
                    <ul>
                        <?php
                            for ($i=0; $i<$cont; $i++) { 
                    
                                $categoriasCtf = $categorias->fetch(PDO::FETCH_ASSOC); 
                                $categoria = $categoriasCtf['categoryName'];
                                echo "<a href='home.php?contingut=$categoria'>$categoria</a></br></br>";
                            }
                                
                        ?>
                    </ul>
                </div>
            </div>
            <div id="ctfs">
                <?php
                        if(isset($_GET["contingut"])){
                            $actual = $_GET["contingut"];
                            echo"<h3 class='millorCtfs'>CATEGORIA ACTUAL: $actual</h3>";
                            echo"<br><br>"; 
                        }
                        else{
                            $actual = $MillorCategoria;
                            echo"<h3 class='millorCtfs'>CATEGORIA MÉS POPULAR:$MillorCategoria</h3>";
                            echo"<br><br>";  
                        }
            echo "<div class='ctfs2'>";

                        $GetCategoryUser = "SELECT `categoryName`, count(*) as `total` FROM `ctfs` WHERE `categoryName` = '$actual' ORDER BY 2 DESC LIMIT 1;";
                        $GetCategory = $db->prepare($GetCategoryUser);
                        $GetCategory->execute();
                        $Categorys = $GetCategory->fetch(PDO::FETCH_ASSOC);
                        $CategoriaUser = $Categorys["categoryName"];
                        $totalUser = $Categorys["total"];

                        $GetUserCtfs = "SELECT * FROM ctfs WHERE `categoryName` = '$actual';";
                        $UserCtfs = $db->prepare($GetUserCtfs);
                        $UserCtfs->execute();
                        $UserCtf = $UserCtfs->fetchAll();
                        
                        if(isset($_GET["contingut"])){
                            
                            for ($k=0; $k < $totalUser ; $k++) { 
                                echo "<div class='ctf'>";
                                echo "<h3 class='titol'>".$UserCtf[$k]["title"]."</h3>";
                                echo"<div>";
                                    echo"<p class='descripcio'>";
                                        echo $UserCtf[$k]["description"];
                                    echo "</p>";
                                    if(!$UserCtf[$k]["fileName"] == ""){
                                         echo"<a href='".$UserCtf[$k]["filePath"]."'"."download=".$UserCtf[$k]["fileName"]."><h2 class='accedir'>Descarregar Contingut</h2></a>";
                                    }
                                        echo "<form class='formulari' method='POST' action='../php/ValidarFlag.php?idCTF=".$UserCtf[$k]["idctf"]."'>";
                                        /*NO TOCAR PLS
                                        
                                        if(isset($_GET["resultat"])){
                                            $resultat = $_GET["resultat"];
                                            if ($resultat == 0){echo"FLAG NO VALIDA!";}else{echo "FLAG CORRECTA!";}
                                            echo"<input type='text' name='flag' required='' placeholder='Introduiex la Flag'>";
                                        }
                                        else{
                                            echo"<input type='text' name='flag' required='' placeholder='Introduiex la Flag'>";
                                        }*/  
                                             echo"<input type='text' name='flag' required='' placeholder='Introduiex la Flag'>";     
                                        echo "</form>";
                                        echo "<br><br>";
                                        echo "<p class='puntuacio'>Puntuació: ".$UserCtf[$k]["score"]."</p>";

                                echo "</div>";
                            echo "</div>";
                            }
                        }

                        else{
                        ?>

                           <?php for ($i=0; $i < $total ; $i++) { 
                               echo "<div class='ctf'>";
                               echo "<h3 class='titol'>".$BestCTFS[$i]["title"]."</h3>";
                               echo"<div>";
                                   echo"<p class='descripcio'>";
                                       echo $BestCTFS[$i]["description"];
                                   echo "</p>";
                                   if(!$BestCTFS[$i]["fileName"] == ""){
                                        echo"<a href='".$BestCTFS[$i]["filePath"]."'"."download=".$BestCTFS[$i]["fileName"]."><h2 class='accedir'>Descarregar Contingut</h2></a>";
                                   }
                                   echo "<form class='formulari' method='POST' action='../php/ValidarFlag.php?idCTF=".$BestCTFS[$i]["idctf"]."'>";
                                   /* NO TOCAR PLS ! ! !
                                   if(isset($_GET["resultat"])){
                                       $resultat = $_GET["resultat"];
                                       if ($resultat == 0){echo"FLAG NO VALIDA!";}else{echo "FLAG CORRECTA!";}
                                       echo"<input type='text' name='flag' required='' placeholder='Introduiex la Flag'>";
                                   }
                                   else{
                                       echo"<input type='text' name='flag' required='' placeholder='Introduiex la Flag'>";
                                   }*/  
                                        echo"<input type='text' name='flag' required='' placeholder='Introduiex la Flag'>";     
                                   echo "</form>";
                                       echo "<p class='puntuacio'>Puntuació: ".$BestCTFS[$i]["score"]."</p>";

                               echo "</div>";
                           echo "</div>";
                            }
                        }?>
    
                </div>
            </div>
        </div>
       
    </body>

    <footer>
        <div id="footer">
            <br><br><br><br><br>
            <p>EduHacks &copy; 2022 By Axel Ariza and Dmytro Bromirskyi</p>
        </div>
    </footer>


</html>