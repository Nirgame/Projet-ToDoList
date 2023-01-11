<?php
include_once('../tools/autoload.php');
session_start();
if(count($_SESSION) > 0) {
     include_once('../tools/header.php'); 
     include_once('../tools/navbar.php');
     $comment = new comment();
     $commentaire = $comment->getComment();
     $row = count($commentaire);
     if (isset($_POST['send'])) {
          $commentaire = $comment->createComment();
     }
     if (isset($_POST['modifier'])) {
          $_SESSION['idcomment'] = $_POST['id'];
          $commentaire = $comment->ModifComment();
     }
     if (isset($_POST['supprimer'])) {
          $_SESSION['idcomment'] = $_POST['id'];
          $_SESSION['créateur'] = $_POST['créateur'];
          ?>
          <form method="post">
          <div class="but">
          <h1> <?php
          echo "êtes vous sur de supprimer le commentaire de : ".$_SESSION['créateur'];
          ?></h1>
          <input type="submit" value="Oui" name="yesdel">
          <input type="submit" value="Non" name="nodel">
          </div></form><?php
     }
     if(isset($_POST["yesdel"])) {
          $comment->delComment();
     }
     if(isset($_POST["nodel"])) {
          header('Location: ./CommentTask.php');
     }
     if ($row > 0){
          ?>

          <div class="row d-flex justify-content-center">
               <div class="col-md-8 col-lg-6">
                    <div class="card shadow-0 border" style="background-color: #f0f2f5;">
                         <div class="card-body p-4">
                         <?php for($i=0;$i<$row;$i++){ ?>
                              <form method="post">
                              <div class="card mb-4">
                                   <div class="card-body">
                                   <p><?php if ($commentaire[$i]['IdUser'] == $_SESSION['Id'] || $_SESSION['type'] == "ADMIN"){
                                             ?> 
                                             <input class="form-control" type="text" id="Modifcomment" name="Modifcomment" value="<?php echo $commentaire[$i]['Comment'] ?>" required placeholder="Commentaire"> 
                                             <?php
                                        }
                                        else {
                                             echo $commentaire[$i]['Comment'];
                                        }
                                        ?></p>

                                   <div class="d-flex justify-content-between">
                                   <div class="d-flex flex-row align-items-center">
                                        <p class="small mb-0 ms-2"><?php echo $commentaire[$i]['FirstName'].' '.$commentaire[$i]['LastName'] ?></p>
                                   </div>
                                   <div class="d-flex flex-row align-items-center">
                                        <?php if ($commentaire[$i]['IdUser'] == $_SESSION['Id'] || $_SESSION['type'] == "ADMIN"){
                                                  ?>
                                                  <input type="hidden" id="id" name="id" value="<?php echo $commentaire[$i]["Id"] ?>">
                                                  <input type="hidden" id="créateur" name="créateur" value="<?php echo $commentaire[$i]['FirstName'].' '.$commentaire[$i]['LastName'] ?>">
                                                  <input type="submit" value="Modifier" name="modifier"> 
                                                  <input type="submit" value="Supprimer" name="supprimer">
                                                  <?php
                                        } ?>
                                   </div>
                                   </div>
                                   </div>
                                   
                              </div>
                              </form>
                              <?php } ?>
                         </div>
                    </div>
               </div>
          </div>
          <?php 
          } 
     else {
          ?> <h1> Aucun commentaire pour cette tache actuellement </h1> <?php
     }
     ?>
     <div class="but">
     <div class="mx-auto" style="width: 400px;">
     <form method="post">
          <div class="form-group">
          <textarea class="form-control" rows="5" required="required" id ="Commentaire" name="Commentaire" placeholder="Commentaire"></textarea></div>
          <input type="submit" id="send" name="send" value="Envoyer" class="btn btn-primary">
        </form>
     </div>
     </div>

     </body>
</html>

<?php
}else echo "<h1>Please login first .</h1>";
?>