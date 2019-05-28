<!DOCTYPE html>
<html>
  <head>
    
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"><script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <title>E cantoun dla pida</title>


    <style>
      .navbar{
        margin-bottom: 50px;
      }
      #left, #right{
        margin-top: 50px;
        margin-right: 1%;
        margin-left: 1%;
      }
      body{
        font-style: italic;
      }



      form{
        margin-right: 1%;
      }
      select,input{
        border-radius: 7px;
      }


    </style>
  </head>
<div class="container-fluid">
  <body class="bg-light">
    <nav class="navbar navbar-expand-md bg-dark navbar-dark ">
      <a class="navbar-brand text-center" href="#">E cantoun dla pida</a>
    </nav>

    <div class="row ">
      <div class="col-sm-12">
        <h1 id="titolo" class="text-center ">Scrivi un messaggio a <?php echo $_POST["nome"] ?>:</h1>
      </div>
    </div>
    <?php
    $email= $_POST["email"];
     ?>


      <form action="php/updateAvviso.php" method="post">
        <div class="form-group">
          <label for="avvisi"></label>

          <textarea class="form-control" rows="5" id="comment" name="id"></textarea>
          <button class="btn btn-primary float-left mt-2" type="submit" name="addCart" >Invia</button>
        </div>
      </form>


  </body>
</html>

</div>
