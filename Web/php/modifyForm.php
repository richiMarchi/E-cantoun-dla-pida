<script>
function showMenu(str){
    var xhttp;
    xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {
        document.getElementById("tabella").innerHTML = this.responseText;
      }
    };
    xhttp.open("GET", "modifyForm.php?q="+str, true);
    xhttp.send();
  }
</script>
<?php
if(isset($_REQUEST["q"])){
      $q = $_REQUEST["q"];
      if($q==="piadina"){
        showPiada();
      } elseif($q==="rotolo"){
        showRotolo();
      } elseif ($q==="cassone") {
        showCassone();
      } elseif ($q==="bibita") {
        showBibita();
      }
    }
 ?>

 <?php function showPiada(){?>
 <form id="modifica" action="php/insertPiada.php" method="post">
     <fieldset> <legend>Inserisci una nuova piadina:</legend>
   <label>Piada:
      <select name="cars" onchange="showMenu(value)">
       <option value="piadina" selected>Piadina</option>
       <option value="rotolo">Rotolo</option>
       <option value="cassone">Cassone</option>
       <option value="bibita">Bibita</option>
     </select>
   </label></br></br>
   <label>Nome:
     <input type="text" name="nome" required>
   </label></br></br>
   <label>Ingredienti:
     <input type="text" name="descrizione" required>
   </label></br></br>
   <label>Calorie:
     <input type="text" name="calorie" required>
   </label></br></br>
   <label>Prezzo:
     <input type="text" name="prezzo" required>€
   </label></br></br>
   <input type="checkbox" name="veg" > Vegetariano</br>
   <button class="btn btn-primary float-left mt-4 ml-3" type="submit" name="addCart" >Inserisci</button>
 </form>
 <?php
 }
 ?>


  <?php function showRotolo(){?>
    <form id="modifica" action="php/insertRotolo.php" method="post">
      <fieldset> <legend>Inserisci un nuovo rotolo:</legend>
      <label>Prodotto:
        <select name="cars" onchange="showMenu(value)">
          <option value="piadina">Piadina</option>
          <option value="rotolo" selected>Rotolo</option>
          <option value="cassone">Cassone</option>
          <option value="bibita">Bibita</option>
        </select>
      </label></br></br>
      <label>Nome:
        <input type="text" name="nome" required>
      </label></br></br>
      <label>Ingredienti:
        <input type="text" name="descrizione" required>
      </label></br></br>
      <label>Calorie:
        <input type="text" name="calorie" required>
      </label></br></br>
      <label>Prezzo:
        <input type="text" name="prezzo" required>€
      </label></br></br>
      <input type="checkbox" name="veg" > Vegetariano</br>
      <button class="btn btn-primary float-left mt-4 ml-3" type="submit" name="addCart" >Inserisci</button>
    </form>
    <?php
  }
?>

<?php function showCassone(){?>
  <form id="modifica" action="php/insertCassone.php" method="post">
    <fieldset> <legend>Inserisci un nuovo cassone:</legend>
    <label>Prodotto:
      <select name="cars" onchange="showMenu(value)">
        <option value="piadina">Piadina</option>
        <option value="rotolo" >Rotolo</option>
        <option value="cassone" selected>Cassone</option>
        <option value="bibita">Bibita</option>
      </select>
    </label></br></br>
    <label>Nome:
      <input type="text" name="nome" required>
    </label></br></br>
    <label>Ingredienti:
      <input type="text" name="descrizione" required>
    </label></br></br>
    <label>Calorie:
      <input type="text" name="calorie" required>
    </label></br></br>
    <label>Prezzo:
      <input type="text" name="prezzo" required>€
    </label></br></br>
    <input type="checkbox" name="veg" > Vegetariano</br>
    <button class="btn btn-primary float-left mt-4 ml-3" type="submit" name="addCart" >Inserisci</button>
  </form>
  <?php
}
?>

<?php function showBibita(){?>
  <form id="modifica" action="php/insertBibita.php" method="post">
    <fieldset> <legend>Inserisci una nuova bibita:</legend>
    <label>Prodotto:
      <select name="cars" onchange="showMenu(value)">
        <option value="piadina">Piadina</option>
        <option value="rotolo" >Rotolo</option>
        <option value="cassone">Cassone</option>
        <option value="bibita" selected>Bibita</option>
      </select>
    </label></br></br>
    <label>Nome:
      <input type="text" name="nome" required>
    </label></br></br>
    <label>Dimensione:
      <input type="text" name="dim" required>L
    </label></br></br>
    <label>Calorie:
      <input type="text" name="calorie" required>
    </label></br></br>
    <label>Prezzo:
      <input type="text" name="prezzo" required>
    </label></br></br>
    <input type="checkbox" name="veg" > Salutare</br>
    <button class="btn btn-primary float-left mt-4 ml-3" type="submit" name="addCart" >Inserisci</button>
  </form>
  <?php
}
?>
