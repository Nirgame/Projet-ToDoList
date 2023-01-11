<?php
session_start();
unset($_SESSION["Id"]);
unset($_SESSION["FirstName"]);
unset($_SESSION["type"]);
unset($_SESSION["idtache"]);
unset($_SESSION["idtask"]);
unset($_SESSION["idcomment"]);
unset($_SESSION["iduser"]);
unset($_SESSION["idteam"]);
unset($_SESSION["nomteam"]);
unset($_SESSION["nomuser"]);
unset($_SESSION["team"]);
unset($_SESSION["tache"]);
unset($_SESSION["créateur"]);
unset($_SESSION["usertoadd"]);
unset($_SESSION["usertodel"]);
unset($_SESSION["teamtoadd"]);
unset($_SESSION["teamtodel"]);
unset($_SESSION["last"]);
unset($_SESSION["add"]);
unset($_SESSION["erreurmdp"]);

header("Location: ../index.php");
?>