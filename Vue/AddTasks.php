<?php
include_once('../tools/autoload.php');
session_start();
if(count($_SESSION) > 0) {
     include_once('../tools/header.php'); 
     include_once('../tools/navbar.php');
     $pdo = new BDD();
     $user = new user();
     $team = new team();
     $tache = new task();
     $teams = $team->getTeam();
     $users = $user->getUser();
     $rowTeam = count($teams);
     $rowUser = count($users);
     if(isset($_POST["submit"])) {
            $tache->createTask();
    }
     ?>
        <h1> Ajout </h1>
        <div class="but">
        <div class="mx-auto" style="width: 400px;">
        <form method="post">
            <div class="form-group">
            <input class="form-control" type="text" required="required" name="Nom" placeholder="Nom de la tâche" value="" /></div>
            <div class="form-group">
            <input class="form-control" type="text" required="required" name="Detail" placeholder="Détails de la tâche" value="" /></div>
            <select class="form-select" aria-label="multiple select example" name="State">
                <option selected hidden>Sélectionner un Etat</option>
                <option value= "ToDo" > ToDo </option>
                <option value= "Doing" > Doing </option>
                <option value= "Done" > Done </option>
            </select>
            <select class="form-select" aria-label="multiple select example" name="Team">
                <option value="" selected>Sélectionner une Team (none)</option>
                <?php 
                for($i=0; $i< $rowTeam;$i++){ ?>
                    <option value= <?php echo $teams[$i]["Id"] ?> > <?php echo $teams[$i]["Name"] ?> </option> <?php
                } ?>
            </select>
            <select class="form-select" aria-label="multiple select example" name="User">
                <option value="" selected>Sélectionner un User (none)</option>
                <?php 
                for($j=0; $j< $rowUser;$j++){ ?>
                    <option value= <?php echo $users[$j]["Id"] ?> > <?php echo $users[$j]["FirstName"] ?> <?php echo $users[$j]["LastName"] ?> </option> <?php
                } ?>
            </select>
            <input type="submit" id="submit" name="submit" value="Ajout" class="btn btn-primary">
        </form>
     </body>
</html>

<?php
}else echo "<h1>Please login first .</h1>";
?>