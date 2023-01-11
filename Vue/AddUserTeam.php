<?php
include_once('../tools/autoload.php');
session_start();
if(count($_SESSION) > 0) {
     include_once('../tools/header.php'); 
     include_once('../tools/navbar.php');
     $user = new user();
     $team = new team();
if(isset($_POST['useradd'])){
     $array = array($_POST['Prénom'],$_POST['Nom'],$_POST['Mail'],hash('sha256',$_POST['Password']),$_POST['State'],$_POST['Type']);
     $_SESSION['add'] = $array;
     $user->createUser();
}
if(isset($_POST['teamadd'])){
     $array = array($_POST['TeamName'],$_POST['State']);
     $_SESSION['add'] = $array;
     $team->createTeam();
}
     ?>

     <div class="row d-flex justify-content-center">
        <div class="col-md-8 col-lg-6">
            <div class="card shadow-0 border" style="background-color: #f0f2f5;">
               <div class="card-body p-4">
                    <form method="post">
                    <div class="card mb-4">
                         <div class="card-body">
                         <ul class="list-group">
                              <h1>Ajout Utilisateur</h1>
                              <li class="list-group-item">
                                   <div class="form-group">
                                   <input class="form-control" type="text" required="required" name="Prénom" placeholder="Prénom" value="" /></div>
                                   <div class="form-group">
                                   <input class="form-control" type="text" required="required" name="Nom" placeholder="Nom" value="" /></div>
                                   <div class="form-group">
                                   <input class="form-control" type="text" required="required" name="Mail" placeholder="Mail" value="" /></div>
                                   <div class="form-group">
                                   <input class="form-control" type="password" required="required" name="Password" placeholder="Mot de Passe" value="" /></div>
                                   <select class="form-select" aria-label="multiple select example" name="State">
                                        <option selected hidden>Sélectionner une Êtat</option>
                                             <option value="ACTIVE"> ACTIVE </option>
                                             <option value="INACTIVE"> INACTIVE </option>
                                             <option value="SUSPENDED"> SUSPENDED </option>
                                   </select>
                                   <select class="form-select" aria-label="multiple select example" name="Type">
                                        <option selected hidden required>Sélectionner une Rang</option>
                                             <option value="ADMIN"> ADMIN </option>
                                             <option value="USER"> USER </option>
                                   </select>
                              </li>
                              <input type="submit" id="useradd" name="useradd" value="Ajout" class="btn btn-primary">
                         </ul>
                         </div>
                    </div>
                    
                    </form>
                    <form method="post">
                    <div class="card mb-4">
                         <div class="card-body">
                         <ul class="list-group">
                              <h1>Ajout Team</h1>
                              <li class="list-group-item">
                                   <div class="form-group">
                                   <input class="form-control" type="text" required="required" name="TeamName" placeholder="Nom de la Team" value="" /></div>
                                   <select class="form-select" aria-label="multiple select example" name="State">
                                        <option selected hidden>Sélectionner une Êtat</option>
                                             <option value="ACTIVE"> ACTIVE </option>
                                             <option value="INACTIVE"> INACTIVE </option>
                                             <option value="SUSPENDED"> SUSPENDED </option>
                                   </select>
                              </li>
                              <input type="submit" id="useradd" name="teamadd" value="Ajout" class="btn btn-primary">
                         </ul>
                         </div>
                    </div>
                    </form>
               </div>
            </div>
        </div>
    </div>


</body>
</html>

<?php
}else echo "<h1>Please login first .</h1>";
?>