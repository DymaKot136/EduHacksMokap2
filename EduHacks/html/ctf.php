<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Registre EduHacks</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="../css/ctf.css">
    </head>s
    <body>
      

      <div class="login-box">
        <h2>Creador de CTF</h2>

        <form action="../php/inserirCTF.php"  method="POST" enctype="multipart/form-data">
          <div class="user-box">
            <input type="text" name="titol" required="">
            <label>Títol</label>
          </div>
          <div class="user-box">
            <input type="text" name="descripcio">
            <label>Descripció</label>
          </div>
          <div class="user-box">
            <input type="text" name="flag">
            <label>Flag</label>
          </div>
          <div class="user-box">
            <input type="number" name="puntuacio">
            <label>Puntuacio</label>
          </div>
          <div class="user-box">
            <input type="text" name="categoryName">
            <label>Categoria</label>
          </div>
          <div class="user-box">
          <label for="iFile"></label>
          <input id="iFile" name="archivo" type="file"/>
          </div>
        
          <div>
            <input class="accedeix" type="submit" name="register" >
        </div>
        </form>
      </div>
      
    </body>
</html>