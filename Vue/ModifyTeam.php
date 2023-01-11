<?php
include_once('../tools/autoload.php');
session_start();
if(count($_SESSION) > 0) {
     include_once('../tools/header.php'); 
     include_once('../tools/navbar.php');
     $team = new team();
     $value = $team->ModifTeam();
     var_dump($value);
     if(isset($_POST["modif"])) {
        $team->ModifTeam();
     }
     ?>
     <div class="but">
     <form method="post" class="mx-auto" style="width: 400px;">
        <label><h1>Modifier la tache : <?php echo $value[0]["Name"] ?> </h1></label>
        <div class="form-group">
            <input class="form-control" type="text" id="NomTeam" name="NomTeam" value="<?php echo $value[0]["Name"] ?>" required placeholder="Nom de la team"></div>
        <div style="font-size:75%">
            <input type="radio" id="ACTIVE"
            name="StateTeam" value="ACTIVE" <?php if($value[0]["State"] == "ACTIVE") { ?> checked <?php } ?> >
            <label for="ToDo">ACTIVE</label>

            <input type="radio" id="INACTIVE"
            name="StateTeam" value="INACTIVE" <?php if($value[0]["State"] == "INACTIVE") { ?> checked <?php } ?> >
            <label for="Doing">INACTIVE</label>

            <input type="radio" id="SUSPENDED"
            name="StateTeam" value="SUSPENDED" <?php if($value[0]["State"] == "SUSPENDED") { ?> checked <?php } ?> >
            <label for="Done">SUSPENDED</label>
        </div>
        <input type="submit" id="modif" name="modif" value="Valider" class="btn btn-primary">
    </form>
     </div>


</body>
</html>

<?php
}else echo "<h1>Please login first .</h1>";
?>