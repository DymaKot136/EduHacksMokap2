<?php

    include("../php/connectDB.php");

    $ConsultadarrerCtf = "SELECT `fileName`,`filePath` FROM `ctfs` WHERE `title` = 'Una prova molt bona (o no..)';";
    $darrerCtf = $db->prepare($ConsultadarrerCtf);
    $darrerCtf->execute();
    $CTF = $darrerCtf->fetch(PDO::FETCH_ASSOC);

    $nomOriginal = $CTF['fileName'];
    $nomCod = $CTF['filePath'];

    $ruta="C:/Users/dymab/OneDrive - Educem/Escritorio/HelloWorld/EduHacks/uploads/";

    $nomAcanviar = $ruta.$nomOriginal;
    $nomQueTeAra = $ruta.$nomCod;

    copy($nomQueTeAra, $nomAcanviar)

 ?>

