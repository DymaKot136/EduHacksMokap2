<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Restablir la contrasenya</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="../css/resetPasswordSend.css">
    </head>

    <body>
      <h1 class="title" data-text="Edu Hacks"><span>Edu Hacks</span></h1>
      <div class="login-box">
        <h2>Reestableix la contrasenya</h2>  
        <form method="POST">
            <div class="user-box">
              <input type="password" name="password" required="">
              <label>Contrasenya</label>
            </div>
            <div class="user-box">
              <input type="password" name="repeat_password" required="">
              <label>Repeteix la Contrasenya</label>
            </div>
            <input class="accedeix " type="submit" name="submit" value="ENVIA">
            <br><br><br>
        </form>
      </div>
  </body>

 </html>

 <?php
  include("../php/connectDB.php");
  require_once("../php/funcions.php");

  if ($_SERVER['REQUEST_METHOD']=="POST"){
      if ((strlen($_POST['password']) >= 1 && strlen($_POST['repeat_password']) >= 1) && ($_POST['password'] == $_POST['repeat_password'])){
            
        $password = $_POST['password'];
        $password = password_hash($_POST['password'], PASSWORD_DEFAULT );

        $hash = codeGenerator();
        $correo = $_GET["mail"];


        $actualitzarPassword = 'UPDATE users SET passHash = \''."$password".'\' WHERE mail = \''."$correo".'\'';
        $update = $db->query($actualitzarPassword);

        $UpdateRPC = 'UPDATE users SET resetPassCode = \''."$hash".'\' WHERE mail = \''."$correo".'\'';
        $insert = $db->query($UpdateRPC);

        header("Location:./resetOK.html");
  
      }else{
              header("Location:./resetPassword.php");
      }
   }
?>


