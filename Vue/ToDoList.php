<?php
include_once('../tools/autoload.php');
session_start();
if(count($_SESSION) > 0) {
     include_once('../tools/header.php'); 
     include_once('../tools/navbar.php');
     $task = new task();
     $todolist = $task->getTask();
     $row = count($todolist);
     if(isset($_POST["modify"])) {
          $_SESSION['idtache'] = $_POST['id'];
          header('Location: ./ModifyTask.php');
          $_SESSION['last'] = "user";
     }
     if(isset($_POST["comment"])) {
          $_SESSION['idtache'] = $_POST['id'];
          header('Location: ./CommentTask.php');
     }
     ?>
     
<h1>Votre ToDoList</h1>
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
     <?php for($i=0;$i<$row;$i++){ ?>
          <tr>
          <th scope="row"><?php echo $todolist[$i]["Id"] ?></th>
          <td><?php echo $todolist[$i]["Name"] ?></td>
          <td><?php echo $todolist[$i]["Detail"] ?></td>
          <?php if($todolist[$i]["State"] == "ToDo"){
                    ?><td style="text-align:center ;">X</td><td></td><td></td>
                <?php } else { if($todolist[$i]["State"] == "Doing"){
                                   ?><td></td><td style="text-align:center ;">X</td><td></td><?php
                              }
                              else {
                                   ?><td></td><td></td><td style="text-align:center ;">X</td><?php
                              }
                         }  ?>
          <td>
               <form method="post">
                    <input type="hidden" id="id" name="id" value="<?php echo $todolist[$i]["Id"] ?>">
                    <input type="hidden" id="nom" name="nom" value="<?php echo $todolist[$i]["Name"] ?>">
                    <input type="submit" value="Modifier" name="modify">
                    </td><td>
                    <input type="submit" value="Voir" name="comment">
                    </td>
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