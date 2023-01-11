<?php
class login implements login_int{

	public function __construct()
	{
		
	}

    public function login($pdo)
	{
		try {
			$login = array($_POST["identifiant"],hash('sha256',$_POST["password"]));
			$req = "SELECT * from users where Email=? AND Password=?";
			$result = $pdo->Withreturn($req,$login);
			if($result != null) {
				session_start();
				$_SESSION["Id"] = $result[0]["Id"];
				$_SESSION["FirstName"] = $result[0]["FirstName"];
				$_SESSION["type"] = $result[0]["Type"];
				header('Location: ./vue_accueil.php');
				}
			else {
				?>
				<script>
					alert('Identifiants incorects');
				</script>
				<?php
			}


		} catch(PDOException $e){
            log::directWriteLog("./logs/LogBDD.txt",$e->getMessage());
            die();
        } catch(Exception $e){
            log::directWriteLog("./logs/Log.txt",$e->getMessage());
            die();
        }
	}
}