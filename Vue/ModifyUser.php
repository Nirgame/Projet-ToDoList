<?php
include_once('../tools/autoload.php');
session_start();
if(count($_SESSION) > 0) {
     include_once('../tools/header.php'); 
     include_once('../tools/navbar.php');
     $user = new user();
     $value = $user->ModifUser();
     if(isset($_POST["modif"])) {
        $user->ModifUser();
     }
     ?>
     <div class="but">
        <?php 
        if ($_SESSION['erreurmdp'] == 1) {
            ?> <h1>Ancien Mot de passe Incorrect</h1><?php
        }
        ?>
     <form method="post" class="mx-auto" style="width: 400px;">
        <label><h1>Modifier l'utilisateur : <?php echo $value[0]["FirstName"]." ".$value[0]["LastName"] ?> </h1></label>
        <div class="form-group">
            <input class="form-control" type="text" id="PrenomUser" name="PrenomUser" value="<?php echo $value[0]["FirstName"] ?>" required placeholder="Prénom de l'utilisateur"></div>
        <div class="form-group">
            <input class="form-control" type="text" id="NomUser" name="NomUser" value="<?php echo $value[0]["LastName"] ?>" required placeholder="Nom de l'utilisateur"></div>
        <div class="form-group">
            <input class="form-control" type="text" id="Mail" name="Mail" value="<?php echo $value[0]["Email"] ?>" required placeholder="Mail de l'utilisateur"></div>
        <div class="form-group">
            <input class="form-control" type="text" id="OldPassword" name="OldPassword"  placeholder="Ancien Mot de Passe (facultatif)"></div>
        <div class="form-group">
            <input class="form-control" type="text" id="NewPassword" name="NewPassword"  placeholder="Nouveau Mot de Passe (facultatif)"></div>
        <div style="font-size:75%">
            <input type="radio" id="ACTIVE"
            name="StateUser" value="ACTIVE" <?php if($value[0]["State"] == "ACTIVE") { ?> checked <?php } ?> >
            <label for="ToDo">ACTIVE</label>

            <input type="radio" id="INACTIVE"
            name="StateUser" value="INACTIVE" <?php if($value[0]["State"] == "INACTIVE") { ?> checked <?php } ?> >
            <label for="Doing">INACTIVE</label>

            <input type="radio" id="SUSPENDED"
            name="StateUser" value="SUSPENDED" <?php if($value[0]["State"] == "SUSPENDED") { ?> checked <?php } ?> >
            <label for="Done">SUSPENDED</label>
        </div>
        <div style="font-size:75%">
            <input type="radio" id="ADMIN"
            name="TypeUser" value="ADMIN" <?php if($value[0]["Type"] == "ADMIN") { ?> checked <?php } ?> >
            <label for="ToDo">ADMIN</label>

            <input type="radio" id="USER"
            name="TypeUser" value="USER" <?php if($value[0]["Type"] == "USER") { ?> checked <?php } ?> >
            <label for="Doing">USER</label>
        </div>

        <input type="submit" id="modif" name="modif" value="Valider" class="btn btn-primary">
    </form>
     </div>


</body>
</html>

<?php
}else echo "<h1>Please login first .</h1>";
?>