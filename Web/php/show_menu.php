 <?php function showBibita(){?>
   <div class="col-sm-12">
     <div class="container">
       <div class="table-responsive">
       <table class="table table-dark table-striped text-center">
         <thead>
           <tr>
             <th id="nome">Nome</th>
             <th id="valore nutrizionale">Valore Nutrizionale</th>
             <th id="prezzo">Prezzo</th>
             <th id="add">Aggiungi Carrello</th>
           </tr>
         </thead>
         <?php
       $servername = "localhost";
       $username = "root";
       $password = "";
       $dbname = "ecantoun";
       $conn = new mysqli($servername, $username, $password, $dbname);
       if ($conn->connect_error) {
           die("Connection failed: " . $conn->connect_error);
       }
         $sql = "SELECT id, categoria, nome, prezzo, calorie, healthy FROM bibita ";
         $result = $conn->query($sql);
         if ($result->num_rows > 0) {?>
           <tbody>
             <?php
               while($row = $result->fetch_assoc()) {?>
                 <tr><form action="php/addCart.php" method="post"><?php
                 ?> <td headers="nome"><?php echo $row["nome"] ?> <input type="hidden" name="id" value="<?php echo $row["id"] ?> ">
                   <input type="hidden" name="categoria" value="<?php echo $row["categoria"] ?> "> <input type="hidden" name="prodotto" value="<?php echo $row["nome"] ?> "> </td><?php
                 ?> <td headers="valore nutrizionale"><?php echo $row["calorie"] . " kcal"; if($row["healthy"]==1){ ?> <i class="fas fa-leaf"></i> <?php } ?></td><?php
                 ?> <td headers="prezzo"><?php echo $row["prezzo"] . "€" ?><input type="hidden" name="prezzo" value="<?php echo $row["prezzo"] ?>"> </td>
                 <td headers="add"><input type="submit" class="btn btn-outline-light text-muted" name="addCart"  value="+" ></td>
                 </form></tr> <?php
               }
           ?>
         </tbody> <?php } ?>
         </table>
       </div>
       </div>
     </div> <?php
   }
 ?>

 <?php function showPiada(){?>
   <div class="col-sm-12">
     <div class="container">
       <div class="table-responsive">
       <table class="table table-dark table-striped text-center">
         <thead>
           <tr>
             <th id="nome">Nome</th>
             <th id="farcitura">Farcitura</th>
             <th id="valore nutrizionale">Valore Nutrizionale</th>
             <th id="prezzo">Prezzo</th>
             <th id="add">Aggiungi Carrello</th>
           </tr>
         </thead>
         <?php
       $servername = "localhost";
       $username = "root";
       $password = "";
       $dbname = "ecantoun";
       $conn = new mysqli($servername, $username, $password, $dbname);
       if ($conn->connect_error) {
           die("Connection failed: " . $conn->connect_error);
       }
         $sql = "SELECT id, categoria, nome, ingredienti, prezzo, calorie, healthy FROM piada ";
         $result = $conn->query($sql);
         if ($result->num_rows > 0) {?>
           <tbody>
             <?php
               while($row = $result->fetch_assoc()) {?>
                 <tr><form action="php/addCart.php" method="post"><?php
                 ?> <td headers="nome"><?php echo $row["nome"] ?> <input type="hidden" name="id" value="<?php echo $row["id"] ?> ">
                   <input type="hidden" name="categoria" value="<?php echo $row["categoria"] ?> "> <input type="hidden" name="prodotto" value="<?php echo $row["nome"] ?> "> </td><?php
                 ?> <td headers="farcitura"><?php echo $row["ingredienti"] ?></td><?php
                 ?> <td headers="valore nutrizionale"><?php echo $row["calorie"] . " kcal"; if($row["healthy"]==1){ ?> <i class="fas fa-leaf"></i> <?php } ?></td><?php
                 ?> <td headers="prezzo"><?php echo $row["prezzo"] . "€" ?><input type="hidden" name="prezzo" value="<?php echo $row["prezzo"] ?>"> </td>
                 <td headers="add"><input type="submit" class="btn btn-outline-light text-muted" name="addCart"  value="+" ></td>
                 </form></tr> <?php
               }
           ?>
         </tbody> <?php } ?>
         </table>
       </div>
       </div>
     </div> <?php
   }
 ?>

 <?php function showRotolo(){?>
   <div class="col-sm-12">
     <div class="container">
       <div class="table-responsive">
       <table class="table table-dark table-striped text-center">
         <thead>
           <tr>
             <th id="nome">Nome</th>
             <th id="farcitura">Farcitura</th>
             <th id="valore nutrizionale">Valore Nutrizionale</th>
             <th id="prezzo">Prezzo</th>
             <th id="add">Aggiungi Carrello</th>
           </tr>
         </thead>
         <?php
       $servername = "localhost";
       $username = "root";
       $password = "";
       $dbname = "ecantoun";
       $conn = new mysqli($servername, $username, $password, $dbname);
       if ($conn->connect_error) {
           die("Connection failed: " . $conn->connect_error);
       }
         $sql = "SELECT id, categoria, nome, ingredienti, prezzo, calorie, healthy FROM rotolo ";
         $result = $conn->query($sql);
         if ($result->num_rows > 0) {?>
           <tbody>
             <?php
               while($row = $result->fetch_assoc()) {?>
                 <tr><form action="php/addCart.php" method="post"><?php
                 ?> <td headers="nome"><?php echo $row["nome"] ?> <input type="hidden" name="id" value="<?php echo $row["id"] ?> ">
                   <input type="hidden" name="categoria" value="<?php echo $row["categoria"] ?> "> <input type="hidden" name="prodotto" value="<?php echo $row["nome"] ?> "> </td><?php
                 ?> <td headers="farcitura"><?php echo $row["ingredienti"] ?></td><?php
                 ?> <td headers="valore nutrizionale"><?php echo $row["calorie"] . " kcal"; if($row["healthy"]==1){ ?> <i class="fas fa-leaf"></i> <?php } ?></td><?php
                 ?> <td headers="prezzo"><?php echo $row["prezzo"] . "€" ?><input type="hidden" name="prezzo" value="<?php echo $row["prezzo"] ?>"> </td>
                 <td headers="add"><input type="submit" class="btn btn-outline-light text-muted" name="addCart" value="+" ></td>
                 </form></tr> <?php
               }
           ?>
         </tbody> <?php } ?>
         </table>
       </div>
       </div>
     </div> <?php
   }
 ?>

 <?php function showCassone(){?>
   <div class="col-sm-12">
     <div class="container">
       <div class="table-responsive">
       <table class="table table-dark table-striped text-center">
         <thead>
           <tr>
             <th id="nome">Nome</th>
             <th id="farcitura">Farcitura</th>
             <th id="valore nutrizionale">Valore Nutrizionale</th>
             <th id="prezzo">Prezzo</th>
             <th id="add">Aggiungi Carrello</th>
           </tr>
         </thead>
         <?php
       $servername = "localhost";
       $username = "root";
       $password = "";
       $dbname = "ecantoun";
       $conn = new mysqli($servername, $username, $password, $dbname);
       if ($conn->connect_error) {
           die("Connection failed: " . $conn->connect_error);
       }
         $sql = "SELECT id, categoria, nome, ingredienti, prezzo, calorie, healthy FROM cassone";
         $result = $conn->query($sql);
         if ($result->num_rows > 0) {?>
           <tbody>
             <?php
               while($row = $result->fetch_assoc()) {?>
                 <tr><form action="php/addCart.php" method="post"><?php
                 ?> <td headers="nome"><?php echo $row["nome"] ?> <input type="hidden" name="id" value="<?php echo $row["id"] ?> ">
                   <input type="hidden" name="categoria" value="<?php echo $row["categoria"] ?> "> <input type="hidden" name="prodotto" value="<?php echo $row["nome"] ?> "> </td><?php
                 ?> <td headers="farcitura"><?php echo $row["ingredienti"] ?></td><?php
                 ?> <td headers="valore nutrizionale"><?php echo $row["calorie"] . " kcal"; if($row["healthy"]==1){ ?> <i class="fas fa-leaf"></i> <?php } ?></td><?php
                 ?> <td headers="prezzo"><?php echo $row["prezzo"] . "€" ?><input type="hidden" name="prezzo" value="<?php echo $row["prezzo"] ?>"> </td>
                 <td headers="add"><input type="submit" class="btn btn-outline-light text-muted" name="addCart" value="+" ></td>
                 </form></tr> <?php
               }
           ?>
         </tbody> <?php } ?>
         </table>
       </div>
       </div>
     </div> <?php
   }
 ?>
