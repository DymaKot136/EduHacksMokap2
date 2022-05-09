<?php
    $conectar_database = 'mysql:dbname=eduhacks;host=localhost:3306';
    $usuario = 'root';
    $password = '';
    try{
        $db = new PDO($conectar_database, $usuario, $password, 
                        array(PDO::ATTR_PERSISTENT => true));
    }catch(PDOException $sms){
        echo 'ALERT! DATABASE ERROR!: ' . $sms->getMessage();
    }
?>
