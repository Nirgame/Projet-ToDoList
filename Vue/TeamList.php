<?php
include_once('../tools/autoload.php');
session_start();
if(count($_SESSION) > 0) {
     include_once('../tools/header.php'); 
     include_once('../tools/navbar.php');
     $team = new team();
     $teams = $team->getTeam();
     $row = count($teams);
     
     if(isset($_POST["modify"])) {
          $_SESSION['idteam'] = $_POST['id'];
          header('Location: ./ModifyTeam.php');
     }

     if(isset($_POST["delete"])) {
          $_SESSION['idteam'] = $_POST['id'];
          $_SESSION['nomteam'] = $_POST['nom'];
          ?>
          <form method="post">
          <div class="but">
          <h1> <?php
          echo "êtes vous sur de supprimer la team : ".$_SESSION['nomteam'];
          ?></h1>
          <input type="submit" value="Oui" name="yesdel">
          <input type="submit" value="Non" name="nodel">
          </div></form><?php
     }
     if(isset($_POST["yesdel"])) {
          $team->delTeam();
     }
     if(isset($_POST["nodel"])) {
          header('Location: ./TeamList.php');
     }
     ?>
     <h1>Liste Team</h1>
     <table class="table">
     <thead class="thead-dark">
          <tr>
               <th scope="col" style="width:3%">#</th>
               <th scope="col">Nom de la team</th>
               <th scope="col">Etat</th>
               <th scope="col" style="width:7%">Modifier</th>
               <th scope="col" style="width:7%">Supprimer</th>
          </tr>
     </thead>
     <tbody>
     <?php for($i=0;$i<$row;$i++){ ?>
          <tr>
          <th scope="row"><?php echo $teams[$i]["Id"] ?></th>
          <td><?php echo $teams[$i]["Name"] ?></td>
          <td><?php echo $teams[$i]["State"] ?></td>
          <td>
               <form method="post">
                    <input type="hidden" id="id" name="id" value="<?php echo $teams[$i]["Id"] ?>">
                    <input type="hidden" id="nom" name="nom" value="<?php echo $teams[$i]["Name"] ?>">
                    <input type="submit" value="Modifier" name="modify">
                    </td><td>
                    <input type="submit" value="Supprimer" name="delete">
               </form>
          </td>
          </tr>
     <?php } ?>
     </tbody>
     </table>
</body>
</html>

<?php
}else echo "<h1>Please login first .</h1>";
?>