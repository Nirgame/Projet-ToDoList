<?php
include_once('BDD.class.php');
class comment implements comment_int{

    public function __construct(){

    }

    public function getComment (){
        $req = "SELECT comments.Id, comments.Comment, comments.IdTask, comments.IdUser, users.FirstName, users.LastName FROM comments
                INNER JOIN users ON users.Id = comments.IdUser
                WHERE comments.IdTask = ?
                ORDER BY comments.Id";
        $pdo = new BDD();
        $array = array($_SESSION['idtache']);
		$result = $pdo->Withreturn($req,$array);
        return $result;
    }

    public function createComment (){
        $pdo = new BDD();
        $array = array($_SESSION['idtache'],$_POST['Commentaire'],$_SESSION['Id']);
        $req = "INSERT INTO comments (IdTask,Comment,IdUser) VALUES (?,?,?)";
        $pdo->Withoutreturn($req,$array);
        header('Location: ./CommentTask.php');
    }

    public function ModifComment(){
        $pdo = new BDD();
        $array = array($_POST['Modifcomment'],$_SESSION['idcomment']);
        $req = "UPDATE comments SET Comment=? WHERE Id=?";
        $pdo->Withoutreturn($req,$array);
        header('Location: ./CommentTask.php');
    }

    public function delComment(){
        $pdo = new BDD();
        $array = array($_SESSION['idcomment']);
        $req = "DELETE FROM comments WHERE Id=?";
        $pdo->Withoutreturn($req,$array);
        header('Location: ./CommentTask.php');
    }

}