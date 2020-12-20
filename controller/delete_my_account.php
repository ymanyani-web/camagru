<?php
session_start();
$user = $_SESSION['user'];
$passwd = sha1(htmlspecialchars($_POST['password']));


if( $_SESSION['user'] == $_POST['username'])
{
    include     'connect_db.php';
    $reponse = $bdd->query('SELECT * FROM users WHERE username =\'' . $user . '\'');
    $donnees = $reponse->fetch();
    if($donnees['username'] == $user && $donnees['password'] == $passwd )
    {
        $req = $bdd->prepare('DELETE FROM images WHERE username = :usr');
        $req->execute(array(
            'usr' => $user
        ));
        $req1 = $bdd->prepare('DELETE FROM users WHERE username = :usr');
        $req1->execute(array(
            'usr' => $user
        ));
        $req2 = $bdd->prepare('DELETE FROM like_count WHERE user = :usr');
        $req2->execute(array(
            'usr' => $user
        ));
        $req3 = $bdd->prepare('DELETE FROM cmnt WHERE comment_sender = :usr');
        $req3->execute(array(
            'usr' => $user
        ));
        session_destroy();
        header('Location: ../view/sign-in.php');
    }
    else
    {
        $msg1 = "password invalid";
        require('../view/modify.php');
    }
}