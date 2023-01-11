<?php
include_once('../tools/autoload.php');
session_start();
if(count($_SESSION) > 0) {
     include_once('../tools/header.php'); 
     include_once('../tools/navbar.php');
     $user = new user();
     $users = $user->getUser();
     $row = count($users);
     if(isset($_POST["modify"])) {
          $_SESSION['iduser'] = $_POST['id'];
          $_SESSION['erreurmdp'] = 0;
          header('Location: ./ModifyUser.php');
     }
     if(isset($_POST["delete"])) {
          $_SESSION['iduser'] = $_POST['id'];
          $_SESSION['nomuser'] = $_POST['nom'];
          ?>
          <form method="post">
          <div class="but">
          <h1> <?php
          echo "êtes vous sur de supprimer l'utilisateur : ".$_SESSION['nomuser'];
          ?></h1>
          <input type="submit" value="Oui" name="yesdel">
          <input type="submit" value="Non" name="nodel">
          </div></form><?php
     }
     if(isset($_POST["yesdel"])) {
          $user->delUser();
     }
     if(isset($_POST["nodel"])) {
          header('Location: ./UserList.php');
     }
     ?>
     <h1>Liste Utilisateur</h1>
     <table class="table">
     <thead class="thead-dark">
          <tr>
               <th scope="col" style="width:3%">#</th>
               <th scope="col">Prénom</th>
               <th scope="col">Nom</th>
               <th scope="col">Mail</th>
               <th scope="col">Etat</th>
               <th scope="col">Role</th>
               <th scope="col" style="width:7%">Modifier</th>
               <th scope="col" style="width:7%">Supprimer</th>
          </tr>
     </thead>
     <tbody>
     <?php for($i=0;$i<$row;$i++){ ?>
          <tr>
          <th scope="row"><?php echo $users[$i]["Id"] ?></th>
          <td><?php echo $users[$i]["FirstName"] ?></td>
          <td><?php echo $users[$i]["LastName"] ?></td>
          <td><?php echo $users[$i]["Email"] ?></td>
          <td><?php echo $users[$i]["State"] ?></td>
          <td><?php echo $users[$i]["Type"] ?></td>
          <td>
               <form method="post">
                    <input type="hidden" id="id" name="id" value="<?php echo $users[$i]["Id"] ?>">
                    <input type="hidden" id="nom" name="nom" value="<?php echo $users[$i]["FirstName"]." ".$users[$i]["LastName"] ?>">
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