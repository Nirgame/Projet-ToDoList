<?php
include_once('../tools/autoload.php');
session_start();
if(count($_SESSION) > 0) {
     include_once('../tools/header.php'); 
     include_once('../tools/navbar.php');
     $team = new team();
     $user = new user();
     $users = $user->getUser();
     $rowusers = count($users);
     $teamuser = $team->getUserTeam();
     $row = count($teamuser);
     if(isset($_POST['Usersadd'])){
        $_SESSION['usertoadd'] = $_POST['usertoadd'];
        $_SESSION['idteam'] = $_POST['id'];
        $team->AddUser_Team();
     }
     if(isset($_POST['Usersdel'])){
        $_SESSION['usertodel'] = $_POST['userid'];
        $_SESSION['idteam'] = $_POST['id'];
        $team->DelUser_Team();
     }

     ?>
    <div class="row d-flex justify-content-center">
        <div class="col-md-8 col-lg-6">
            <div class="card shadow-0 border" style="background-color: #f0f2f5;">
                <div class="card-body p-4">
                    <?php for($i=0;$i<$row;$i++){ ?>

                        <form method="post">
                        <input type="hidden" id="id" name="id" value="<?php echo $teamuser[$i]["Id"] ?>">
                        <div class="card mb-4">
                            <div class="card-body">
                            <ul class="list-group">
                                <h1><?php echo $teamuser[$i]["Name"] ?></h1>
                                <?php
                                $rowuser = count($teamuser[$i][0]);

                                for($j=0;$j<$rowuser;$j++) {
                                ?>
                                <li class="list-group-item">
                                    <?php echo $teamuser[$i][0][$j]["LastName"]." ".$teamuser[$i][0][$j]["FirstName"];
                                    if ($_SESSION['type'] == "ADMIN"){ ?>
                                        <input type="hidden" id="userid" name="userid" value="<?php echo $teamuser[$i][0][$j]["Id"] ?>">
                                        <input type="submit" id="Usersdel" name="Usersdel" value="Supprimer" class="btn btn-primary">

                                    <?php } ?>
                                </li>
                                <?php } ?>

                            </ul>
                            </div>
                            <?php 

                            if ($_SESSION['type'] == "ADMIN"){ ?>
                                <select class="form-select" aria-label="multiple select example" name="usertoadd">
                                    <option selected hidden>Veuillez sélectionnez un Utilisateur à ajouter</option>
                                        <?php for($k=0; $k< $rowusers;$k++){ 
                                            $testexist = 0;
                                            for($l=0;$l<$rowuser;$l++) {
                                                if ($users[$k]['Id'] == $teamuser[$i][0][$l]["Id"]){
                                                $testexist = 1;
                                                }
                                            }
                                            if ($testexist == 0) {
                                                ?> <option value= <?php echo $users[$k]['Id'] ?> > <?php echo $users[$k]['FirstName']." ".$users[$k]['LastName'] ?> </option> <?php
                                            }
                                        } ?>
                                </select>
                                <input type="submit" id="Usersadd" name="Usersadd" value="Ajouter l'Utilisateur" class="btn btn-primary">
                                
                            <?php } ?>

                        </div>
                        </form>

                        <?php } ?>
                    </div>
            </div>
        </div>
    </div>
    </body>
</html>
     
<?php
}else echo "<h1>Please login first .</h1>";
?>