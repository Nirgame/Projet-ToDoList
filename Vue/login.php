<?php
include_once('../tools/autoload.php');
    session_start();
    $pdo = new BDD();
    $log = new login();
    if(isset($_POST["submit"])) {
            $log->login($pdo);
    }
include_once('../tools/header.php');
?>
<h1>Login</h1>
    <div class="but">
    <div class="mx-auto" style="width: 400px;">
    <form method="post" >
            <div class="form-group">
            <input class="form-control" type="text" required="required" name="identifiant" placeholder="identifiant" value="" /></div>
            <div class="form-group">
            <input class="form-control" type="password" required="required" name="password" placeholder="mot de passe" value="" /></div>
            <input type="submit" id="submit" name="submit" value="Connexion" class="btn btn-primary">
        </form>
    </div></div>
</body>
</html>