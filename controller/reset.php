<?php
    $email = $_POST['email'];
    $p = $_POST['passwd'];
    $p1 = $_POST['passwd1'];
    if(!empty($email) && $p == $p1)
    {
        $p = sha1($p);
        include     'connect_db.php';
        $reponse = $bdd->query('SELECT * FROM users WHERE email =\'' . $email . '\'');
        $donnees = $reponse->fetch();
        $req = $bdd->prepare('UPDATE users SET `password` = :p WHERE email = :e');
        $req->execute(array(
            'p' => $p,
            'e' => $email
            ));
            header('Location: ../view/sign-in.php');
        exit(0);
    }
    else{
        header('Location: ../view/reset.php?email='. $email .'&error=1');
    }