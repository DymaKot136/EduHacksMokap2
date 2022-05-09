<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title></title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="../css/email.css">
    </head>
    <body>
      <h1 class="title" data-text="Edu Hacks"><span>Edu Hacks</span></h1>
      <div class="login-box">
        <h2>Revisa la teva bustia!</h2>
        <h2>Hem enviat un correu electronic a
          
          <?php
            echo "<br><h2>".$_GET["mail"]."</h2>";    
          ?>

      <h2>per confirmar la teva identitat!</h2>
      </div>
    </body>
</html>



