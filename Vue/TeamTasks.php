<?php
include_once('../tools/autoload.php');
session_start();
if(count($_SESSION) > 0) {
     include_once('../tools/header.php'); 
     include_once('../tools/navbar.php');
     $team = new team();
     $task = new task();
     $teams = $team->getTeam();
     $row = count($teams);
     if (isset($_POST['teamvoir'])) {
          $_SESSION['team'] = $_POST['team'];
          $taskteam = $task->getTeamTask();
          $rowteam = count($taskteam);
     }
     if(isset($_POST["modify"])) {
          $_SESSION['idtache'] = $_POST['id'];
          $_SESSION['last'] = "team";
          header('Location: ./ModifyTask.php');
     }
     if(isset($_POST["comment"])) {
          $_SESSION['idtache'] = $_POST['id'];
          header('Location: ./CommentTask.php');
     }
     ?>
     <h1> Taches par teams </h1>       
        <div class="but">
          <div class="mx-auto" style="width: 400px;">
               <form method="post" >
               <select class="form-select" aria-label="multiple select example" name="team">
               <option selected hidden>Veuillez sélectionnez une team</option>
                         <?php for($i=0; $i< $row;$i++){ ?>
                         <option value= <?php echo $teams[$i]['Id'] ?> > <?php echo $teams[$i]['Name'] ?> </option> <?php
                         } ?>
               </select>
               <input type="submit" value="Visualiser" name="teamvoir" class="btn btn-primary">
               </form>
          </div>
        </div>
        <?php 
        
        if (isset($taskteam)){ ?>
          <table class="table">
          <thead class="thead-dark">
            <tr>
              <th scope="col" style="width:3%">#</th>
              <th scope="col" style="width:10%">Nom</th>
              <th scope="col" style="width:auto">Détail</th>
              <th scope="col" style="width:3%">ToDo</th>
              <th scope="col" style="width:3%">Doing</th>
              <th scope="col" style="width:3%">Done</th>
              <th scope="col" style="width:7%">Modifier</th>
              <th scope="col" style="width:7%">Commentaire</th>
            </tr>
          </thead>
          <tbody>
             <?php for($i=0;$i<$rowteam;$i++){ ?>
                  <tr>
                  <th scope="row"><?php echo $taskteam[$i]["Id"] ?></th>
                  <td><?php echo $taskteam[$i]["Name"] ?></td>
                  <td><?php echo $taskteam[$i]["Detail"] ?></td>
                  <?php if($taskteam[$i]["State"] == "ToDo"){
                            ?><td style="text-align:center ;">X</td><td></td><td></td>
                        <?php } else { if($taskteam[$i]["State"] == "Doing"){
                                           ?><td></td><td style="text-align:center ;">X</td><td></td><?php
                                      }
                                      else {
                                           ?><td></td><td></td><td style="text-align:center ;">X</td><?php
                                      }
                                 }  ?>
                  <td>
                       <form method="post">
                            <input type="hidden" id="id" name="id" value="<?php echo $taskteam[$i]["Id"] ?>">
                            <input type="submit" value="Modifier" name="modify">
                            </td><td>
                            <input type="submit" value="Voir" name="comment">
                       </form>
                  </td>
                  </tr>
             <?php } ?>
          </tbody>
        </table>
        <?php } ?>

     </body>
</html>

<?php
}else echo "<h1>Please login first .</h1>";
?>