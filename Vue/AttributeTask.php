<?php
include_once('../tools/autoload.php');
session_start();
if(count($_SESSION) > 0) {
     include_once('../tools/header.php'); 
     include_once('../tools/navbar.php');
     $task = new task();
     $user = new user();
     $team = new team();
     $users = $user->getUser();
     $teams = $team->getTeam();
     $tasks = $task->getAllTask();
     $rowalluser = count($users);
     $rowallteam = count($teams);
     $userstasks = $task->getAllUserTask();
     $teamstasks = $task->getAllTeamTask();
     $row = count($tasks);
     if(isset($_POST['Usersadd'])){
        $_SESSION['usertoadd'] = $_POST['usertoadd'];
        $_SESSION['idtask'] = $_POST['id'];
        $task->giveTask();
     }
     if(isset($_POST['Usersdel'])){
        $_SESSION['usertodel'] = $_POST['userid'];
        $_SESSION['idtask'] = $_POST['id'];
        $task->remove_givenTask();
     }
     if(isset($_POST['Teamsadd'])){
        $_SESSION['teamtoadd'] = $_POST['teamtoadd'];
        $_SESSION['idtask'] = $_POST['id'];
        $task->giveTask();
     }
     if(isset($_POST['Teamsdel'])){
        $_SESSION['teamtodel'] = $_POST['teamid'];
        $_SESSION['idtask'] = $_POST['id'];
        $task->remove_givenTask();
     }
     ?>
    <div class="row d-flex justify-content-center">
        <div class="col-md-8 col-lg-6">
            <div class="card shadow-0 border" style="background-color: #f0f2f5;">
                <div class="card-body p-4">
                    <?php for($i=0;$i<$row;$i++){ ?>
                        <form method="post">
                        <input type="hidden" id="id" name="id" value="<?php echo $tasks[$i]["Id"] ?>">
                        <div class="card mb-4">
                            <div class="card-body">
                            <ul class="list-group">
                                <h1><?php echo $tasks[$i]["Name"] ?></h1>
                                <?php
                                $rowusers = count($userstasks[$i][0]);?>

                                <li class="list-group-item">
                                <h3 style="color: red; text-align: center;">User</h3>

                                    <ul class="list-group">
                                        <?php
                                        for($j=0;$j<$rowusers;$j++) {?>
                                            <li class="list-group-item"><?php
                                            echo $userstasks[$i][0][$j]["FirstName"]." ".$userstasks[$i][0][$j]["LastName"];?>
                                            <input type="hidden" id="userid" name="userid" value="<?php echo $userstasks[$i][0][$j]["Id"] ?>">
                                            <input type="submit" id="Usersdel" name="Usersdel" value="Supprimer" class="btn btn-primary"><br>
                                            </li>
                                        <?php } ?>
                                    </ul>
                                        <select class="form-select" aria-label="multiple select example" name="usertoadd">
                                        <option selected hidden>Veuillez sélectionnez un Utilisateur à ajouter</option>
                                            <?php for($k=0; $k<$rowalluser;$k++){ 
                                                $testexist = 0;
                                                for($l=0;$l<$rowusers;$l++) {
                                                    if ($users[$k]['Id'] == $userstasks[$i][0][$l]["Id"]){
                                                    $testexist = 1;
                                                    }
                                                }
                                                if ($testexist == 0) {
                                                    ?> <option value= <?php echo $users[$k]['Id'] ?> > <?php echo $users[$k]['FirstName']." ".$users[$k]['LastName'] ?> </option> <?php
                                                }
                                            } ?>
                                        </select>
                                        <input type="submit" id="Usersadd" name="Usersadd" value="Ajouter l'Utilisateur" class="btn btn-primary">

                                </li>
                                <?php
                                $rowteams = count($teamstasks[$i][0]);?>

                                <li class="list-group-item">
                                <h3 style="color: red; text-align: center;">Team</h3>

                                    <ul class="list-group">
                                        <?php
                                        for($jj=0;$jj<$rowteams;$jj++) { ?>
                                            <li class="list-group-item"><?php
                                            echo $teamstasks[$i][0][$jj]["Name"];?>
                                            <input type="hidden" id="teamid" name="teamid" value="<?php echo $teamstasks[$i][0][$jj]["Id"] ?>">
                                            <input type="submit" id="Teamsdel" name="Teamsdel" value="Supprimer" class="btn btn-primary"><br>
                                            </li>
                                        <?php }?>
                                    </ul>
                                        <select class="form-select" aria-label="multiple select example" name="teamtoadd">
                                        <option selected hidden>Veuillez sélectionnez un Utilisateur à ajouter</option>
                                            <?php for($kk=0; $kk<$rowallteam;$kk++){ 
                                                $testexists = 0;
                                                for($ll=0;$ll<$rowteams;$ll++) {
                                                    if ($teams[$kk]['Id'] == $teamstasks[$i][0][$ll]["Id"]){
                                                    $testexists = 1;
                                                    }
                                                }
                                                if ($testexists == 0) {
                                                    ?> <option value= <?php echo $teams[$kk]['Id'] ?> > <?php echo $teams[$kk]['Name']?> </option> <?php
                                                }
                                            } ?>
                                        </select>
                                        <input type="submit" id="Teamsadd" name="Teamsadd" value="Ajouter la team" class="btn btn-primary">

                                </li>
                            </ul>

                            </div>
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