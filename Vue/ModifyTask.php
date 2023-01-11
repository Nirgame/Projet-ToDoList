<?php
include_once('../tools/autoload.php');
session_start();
if(count($_SESSION) > 0) {
     include_once('../tools/header.php'); 
     include_once('../tools/navbar.php');
     $tache = new task();
     $value = $tache->ModifTask();
     if(isset($_POST["modif"])) {
        $tache->ModifTask();
     }
     ?>
     <div class="but">
     <form method="post" class="mx-auto" style="width: 400px;">
        <label><h1>Modifier la tache : <?php echo $value[0]["Name"] ?> </h1></label>
        <div class="form-group">
            <input class="form-control" type="text" id="NomTask" name="NomTask" value="<?php echo $value[0]["Name"] ?>" required placeholder="Nom de la tache"></div>
        <div class="form-group">
            <input class="form-control" type="text" id="DetailTask" name="DetailTask" size="50" value="<?php echo $value[0]["Detail"] ?>" required placeholder="Détails"></div>
        <div>
            <input type="radio" id="ToDo"
            name="StateTask" value="ToDo" <?php if($value[0]["State"] == "ToDo") { ?> checked <?php } ?> >
            <label for="ToDo">Todo</label>

            <input type="radio" id="Doing"
            name="StateTask" value="Doing" <?php if($value[0]["State"] == "Doing") { ?> checked <?php } ?> >
            <label for="Doing">Doing</label>

            <input type="radio" id="Done"
            name="StateTask" value="Done" <?php if($value[0]["State"] == "Done") { ?> checked <?php } ?> >
            <label for="Done">Done</label>
        </div>
        <input type="submit" id="modif" name="modif" value="Valider" class="btn btn-primary">
    </form>
     </div>
    </body>
</html>

<?php
}else echo "<h1>Please login first .</h1>";
?>