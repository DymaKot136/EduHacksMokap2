<?php
    include("../php/connectDB.php");

    $ConsultadarrerCtf = "SELECT * FROM `ctfs` ORDER BY `idctf` DESC LIMIT 1;";
    $darrerCtf = $db->prepare($ConsultadarrerCtf);
    $darrerCtf->execute();
    $CTF = $darrerCtf->fetch(PDO::FETCH_ASSOC);
    
   /* include("../php/connectDB.php");
    $obtenerContador = "SELECT count(`categoryName`) FROM `ctfs` WHERE `categoryName` != '';";
    $contadorCategorias->$db(prepare($obtenerContador));
    $contadorCategorias->execute();
    $contador = $contadorCategorias->fetch(PDO::FETCH_ASSOC);

    for ($i=0; $i < $contador; $i++) { 
        $ConsultarCategorias = "SELECT `categoryName` FROM `ctfs` WHERE `categoryName` != '';";
        $categorias->$db(prepare($ConsultarCategorias));
        $categorias->execute();
        $categoriasCtf = $categorias->fetch(PDO::FETCH_ASSOC); 
        $categoria = $categoriasCtf['categoryName'];

        echo $categoria;
    }
*/

    
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EduHacks Home</title>
    <link rel="stylesheet" href="../css/indexProva.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../css/flagCtf.css">
    
</head>
   
<body>
    <nav>   
        <input type="checkbox" id="check">
        <label for="check" class="checkbtn">
            <i class="fas fa-bars"></i>
        </label>         
        <a href="./indexProva.html" class="home">
            <h1 class="title" data-text="Edu Hacks"><span>Edu Hacks</span></h1>
        </a>
        <ul>
            <li><a class="active" href="../html/login.php">Iniciar Sessió</a></li>
            <li><a href="../html/register.html">Registre</a></li>
            <li><a href="#primer">CTF</a></li>
            <li><a href="#segon">Informació</a></li>
        </ul>    
    </nav>
    <section class="section1">
        <br>
        <br>
        <br>
        <br>
        <div>
            <p class="titulo">Benvingut a Edu Hacks!</p>
        </div>
        <br>
        <br>
        <br>
        <br>
        <div class="seccio1">
            <br>
            
            <p>Vols aprendre hacking ètic? T'agrada la ciberseguretat? Vols pasar
                una estona divertida? <br/> <br/> Si la teva resposta
                és un sí! <br><br>
            <h2 data-text="AQUESTA PAGINA WEB ES PER TU!"><span>Aquesta pagina web és per tú!</span></h2>
            </p>
        </div>
    </section>
    <div class="separar">
        <div class="uno">
            <img id="uno" src="../img/lados.gif" alt="" width="100%" height="110%">
        </div>
        <div class="dos">
        
                <div id="primer" class="sub1-subparte2">
                    <h2>Que són els CTF?</h2>
                </div>
                <div class="sub2-subparte2">
                    <p>
                        Els CTF o Capture The Flag són una sèrie de desafiaments informàtics enfocats a la seguretat.
                        Tenen com a objectiu aprendre i millorar les competències d'un Hacker o equips de Hackers.
                    </p>
                </div> 
        </div>
        <div class="tres">
            <img id="dos" src="../img/lados.gif" alt="" width="100%" height="110%">
        </div>
        
    <section class="section2">
      <div class="parte2">
        <div class="subparte1">
            <div class="sub-parte1">
            </br>
                <img src="../img/ctfs.jpg" alt="" width="600px">
                <div>
                    <a href="./ctf.php"><p>Començar a jugar Ara !</p></a> 
                </div>
            </div>
            
        </div>
        <div class="subparte2">
            <p class="enigma">FES CLICK AQUÍ I CREA EL TEU PROPI CTF!</p>
        </div>
    </div>
    </section>

    <div class="separar2">
        <p>
            Competeix amb jugadors de tot el mon! 
            I demostra, que ets el millor!
       </p>
    </div>
    
    <?php
        $titolCtf = $CTF["title"];
        $descripcioCtf = $CTF["description"];
        $flagCtf = $CTF["flag"];
        $categoria = $CTF["categoryName"]
    ?>

    <section class="section3"> 
        <div class="sub1-section3">
            <div class="sub2-section3">
                <h2 class="titolCTF"><?php echo $titolCtf; ?></h2>
                <div class="sub3-section3">
                    <p>
                       <?php echo $descripcioCtf;?> 
                    </p>
                    <div class="user-box">
                        <p><?php echo $categoria; ?></p> 
                    </div>
                    
                </div>
            </div>
        </div>
    </section>

    <div class="separar3">
        <p id="segon">
            Sobre Nosaltres
       </p>
    </div>
        
    <section class="section4">
        <div class="sub1-section3">
            <div class="sub2-section4">
                <h2>Edu Hacks Dyma i Axel</h2>
                <div class="sub3-section3">
                    <p class="sobre-nosaltres">Som  un  grup  de  dos  alumnes  del  cicle  superior  ASIX, Dmytro Bromiskyi  i Axel Ariza,  estem  compromesos  a  realitzar  un 
                        projecte  digne  de  l'aprovació  del  nostre  professor  David  Gònzalez.  Ens  serveix  amb  una  aprovació  de  la  nota  del  curs,
                        no  fa  falta  la  teva  aprovació  personal  que  sabem  que  és  molt  díficil  d'aconseguir. Dit  aixó  aquest  projecte  de  PHP  
                        està  enfocat  en  la  creació  de  reptes  Capture  The  Flag,  i  la  seva  posterior  resolució  del  repte.
                    </p>
                </div>
            </div>
        </div>
    </section>
    
</body>
</html>