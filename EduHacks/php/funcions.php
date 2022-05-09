<?php

    require '../vendor/autoload.php';
    use PHPMailer\PHPMailer\PHPMailer;


    function codeGenerator(){

        $num = rand(7,754863);
        $hash = hash('sha256',$num);
        return $hash;
    }

    function enviaMailActivacio($correo, $hash){
        $asunto = 'Confirma el teu correu en EduHacks';
        #$mensaje = 'Activa el teu compte a EduHakcs <a href="">AQUI!</a>';
        $mensaje = 'Activa el teu compte a EduHakcs <a href="http:/10.0.7.127/html/mailConfirmat.php?code='.$hash.'&mail='.$correo.'">AQUI!</a>';
        

        $mail = new PHPMailer();
        $mail->IsSMTP();

        //Configuració del servidor de Correu
        //Modificar a 0 per eliminar msg error
        $mail->SMTPDebug = 0;
        $mail->SMTPAuth = true;
        $mail->SMTPSecure = 'tls';
        $mail->Host = 'smtp.gmail.com';
        $mail->Port = 587;
        
        //Credencials del compte GMAIL
        $mail->Username = 'falso.MuyFalso@gmail.com';
        $mail->Password = 'NoHackersPls';

        //DAVIIIDD!!! POSA LES CREDENCIAAALS!! 

        //Dades del correu electrònic
        $mail->SetFrom("EduHacksDymaAxel@gmail.com"."Edu Hacks");
        $mail->Subject = ($asunto);
        $mail->MsgHTML($mensaje);
        $mail->addAttachment("fitxer.pdf");
        
        //Destinatari
        $address = $correo;
        $mail->AddAddress($address, 'Test');

        //Enviament
        $result = $mail->Send();
        $msg = "Correu enviat";
        if(!$result){
            $msg =  'Error: ' . $mail->ErrorInfo;
        }
        echo $msg;
    }




    function enviaMailPassword($correo, $hash){
        $asunto = 'Confirma el teu correu en EduHacks';
        #$mensaje = 'Activa el teu compte a EduHakcs <a href="">AQUI!</a>';
        $mensaje = 'Per restablir la teva contrasenya, segueix aquest <a href="http:/10.0.7.127/html/resetPassword.php?resetPassCode='.$hash.'&mail='.$correo.'">link!</a>';
        

        $mail = new PHPMailer();
        $mail->IsSMTP();

        //Configuració del servidor de Correu
        //Modificar a 0 per eliminar msg error
        $mail->SMTPDebug = 0;
        $mail->SMTPAuth = true;
        $mail->SMTPSecure = 'tls';
        $mail->Host = 'smtp.gmail.com';
        $mail->Port = 587;
        
        //Credencials del compte GMAIL
        $mail->Username = 'falso.MuyFalso@gmail.com';
        $mail->Password = 'NoHackersPls';

        //Dades del correu electrònic
        $mail->SetFrom("EduHacksDymaAxel@gmail.com"."Edu Hacks");
        $mail->Subject = ($asunto);
        $mail->MsgHTML($mensaje);
        $mail->addAttachment("fitxer.pdf");
        
        //Destinatari
        $address = $correo;
        $mail->AddAddress($address, 'Test');

        //Enviament
        $result = $mail->Send();
        $msg = "Correu enviat";
        if(!$result){
            $msg =  'Error: ' . $mail->ErrorInfo;
        }
        echo $msg;
    }
    
    function enviaMailBenvinguda($correo, $hash){
        $asunto = 'Benvingut a EduHacks!';
        #$mensaje = 'Activa el teu compte a EduHakcs <a href="">AQUI!</a>';
        $mensaje = 'Felicitats! La teva registració a EduHacks ha siguit exitosa! Ja pots iniciar sessió aqui --> <a href="http:/10.0.7.127/html/resetPassword.php?resetPassCode='.$hash.'&mail='.$correo.'">Iniciar sessió ja mateix!</a>';
        

        $mail = new PHPMailer();
        $mail->IsSMTP();

        //Configuració del servidor de Correu
        //Modificar a 0 per eliminar msg error
        $mail->SMTPDebug = 0;
        $mail->SMTPAuth = true;
        $mail->SMTPSecure = 'tls';
        $mail->Host = 'smtp.gmail.com';
        $mail->Port = 587;
        
        //Credencials del compte GMAIL
        $mail->Username = 'falso.MuyFalso@gmail.com';
        $mail->Password = 'NoHackersPls';

        //Dades del correu electrònic
        $mail->SetFrom("EduHacksDymaAxel@gmail.com"."Edu Hacks");
        $mail->Subject = ($asunto);
        $mail->MsgHTML($mensaje);
        $mail->addAttachment("fitxer.pdf");
        
        //Destinatari
        $address = $correo;
        $mail->AddAddress($address, 'Test');

        //Enviament
        $result = $mail->Send();
        $msg = "Correu enviat";
        if(!$result){
            $msg =  'Error: ' . $mail->ErrorInfo;
        }
        echo $msg;
    }
?>

