<?php
session_start();
if(count($_SESSION) > 0) {
     include_once('../tools/autoload.php');
     include_once('../tools/header.php'); 
     include_once('../tools/navbar.php');
     ?>
</body>
</html>

<?php
}else echo "<h1>Please login first .</h1>";
?>