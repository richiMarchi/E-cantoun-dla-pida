<!DOCTYPE html>
<html lang="it">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"><script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <script defer src="https://use.fontawesome.com/releases/v5.0.6/js/all.js"></script>
    <link rel="stylesheet" href="css/index.css" type="text/css">
    <title>E cantoun dla pida</title>
    <style>
    .jumbotron {

        background-image: url('cecisuper.png') ;

        height: 100%;


        background-position: center;
        background-repeat: repeat;
        background-size: cover;
        margin-bottom: 50px;
      }

      #log{
        margin-bottom: 50px;
      }
    </style>
  </head>

<div class="container-fluid">
  <body >
    <main>
      <div class="jumbotron jumbotron-fluid">
        <div class="container">
          <h1 class="text-center ">E Cantoun Dla Pida</h1>
          <p class="text-center font-italic">La pida se parsot la pis un po ma tot</p>
        </div>
      </div>
<div class="row">
  <div class="col-md-6">
      <section>
        <script src="js/sha512.js"></script>
        <script src="js/form.js"></script>
        <form id="log" action="php/process_login.php" method="post">
          <h2 class="text-center">Login</h2>
            <p><label for="utenteS">E-mail </label><input type="email" name="user" value="" id="utenteS" placeholder="E-mail"></p>
            <p><label for="password">Password </label><input type="password" name="password" id="password" value="" placeholder="Password"></p>
            <div id="errore"><p><?php
              if(isset($_GET['error']) && $_GET['error']==="error"){
              ?><p style="color:red;">E-mail o password errate</p><?php
              }
             ?>
           </p></div>
          <button type="submit" class="btn btn-primary" name="signin" onclick="formhash(this.form, this.form.password);">Accedi</button>
          <!--<button type="button" name="register">Register</button>-->
        </form>
      </section>
    </div>
    <div class="col-md-6">
      <aside>
        <form id="reg" action="php/registration.php" method="post">
          <h2 class="text-center">Non ancora registrato? Registrati subito!</h2>
          <p><label for="mail">E-mail </label><input type="email" name="indirizzo" value="" id="mail"><?php if(isset($_GET['error']) && $_GET['error']==="reg"){
            ?><span id="erroreregistrazione" style="color:red;"><?php echo "    E-mail già usata."; ?></span><?php
          } ?></p>
          <p><label for="pass">Password </label><input type="password" name="Password" value="" id="pass"></p>
          <p><label for="nome">Nome </label><input type="text" name="nome" value="" id="nome"></p>
          <p> <label for="cognome">Cognome </label><input type="text" name="cognome" value="" id="cognome"></p>
          <p> <label for="telefono">Telefono </label><input type="tel" name="telefono" value="" id="telefono"> </p>
          <button type="submit" class="btn btn-primary" name="registrazione" onclick="formhash(this.form, this.form.Password);">Registrati subito!</button>
          <?php if (isset($_GET['success'])){
            ?><p style="color:#6495ed;">Registrazione effettuata con successo!</p><?php
          }?>
        </form>
      </aside>
    </div>
</div>
    </main>
  </body>
</div>
</html>
