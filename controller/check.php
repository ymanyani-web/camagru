<?php
session_start();

$_SESSION['user'] = strtolower(htmlspecialchars($_POST['username']));
?>
<?php
if ($_POST['username'] && $_POST['passwd'])
{
    $user = strtolower(htmlspecialchars($_POST['username']));
    $passwd = sha1(htmlspecialchars($_POST['passwd']));
    require('db.php');
    if(check_user($user, $passwd) == "good")
    {
        header('Location: ../view/gallery.php');
    }
    elseif(check_user($user, $passwd) == "not active")
    {
        session_destroy();
        $msg = "your account is not verifed, please check your mail, then try again!";
        require('../view/sign-in.php');
    }
    else
    {
        session_destroy();
        $msg = "the username or the password are invalid, try again!";
        require('../view/sign-in.php');
    }
}
?>