<header>
    <nav class="navbar sticky-top navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="./vue_accueil.php" paddinf-left="5%">Bonjour <?php echo $_SESSION["FirstName"]; ?>.</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarText">
            <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
                <a class="nav-link" href="./ToDoList.php">ToDoList</a>
            </li>
            <li class="nav-item  active">
                <a class="nav-link" href="./AddTasks.php">Ajout Tâches</a>
            </li>
            <li class="nav-item  active">
                <a class="nav-link" href="./TeamTasks.php">Tâches par teams</a>
            </li>
            <li class="nav-item  active">
                <a class="nav-link" href="./TeamMember.php">Membres teams</a>
            </li>
            <?php 
            if ($_SESSION["type"] == 'ADMIN'){ ?>
            <li class="nav-item  active">
                <a class="nav-link" href="./AddUserTeam.php">Créer Utilisateur/Team</a>
            </li>
            <li class="nav-item  active">
                <a class="nav-link" href="./UserList.php">Liste Utilisateurs</a>
            </li>
            <li class="nav-item  active">
                <a class="nav-link" href="./TeamList.php">Liste Teams</a>
            </li>
            <li class="nav-item  active">
                <a class="nav-link" href="./TaskList.php">Liste Tâches</a>
            </li>
            <li class="nav-item  active">
                <a class="nav-link" href="./AttributeTask.php">Attribution Taches</a>
            </li>
            <?php } ?>
            </ul>
        </div>
        <span class="navbar-text">
                <a href="../tools/logout.php" titre="Logout">Déconnexion</a>
            </span>
        </nav>
    </header>
    <!-- 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Accueil</title>
    <link href="./css/style.css" rel="stylesheet">
</head>
<div class="css_navbar">
    test
</div> -->