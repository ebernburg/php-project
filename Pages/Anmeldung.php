<?php

session_start();

require_once('I:\OServer\domains\yo\Classes\MainLogin.php');
require_once('I:\OServer\domains\yo\Classes\PhpPageRenderer.php');
require_once('I:\OServer\domains\yo\Factory\Factory.php');



$factory = new Factory();
$userRepos = $factory->createUserRepository();

$errorMessage = null;

if (isset($_REQUEST['login'])) {
    $name = $_POST['name'];
    $password = $_POST['password'];

    $user = $userRepos->getByName($name);

    /**
     * Controller, check password from DB with password from post
     */
    if (!empty($user) && $password == $user->getPassword()) {

        $_SESSION['userid'] = $user->getId();
        header("Location: EinzBestellung.php");

    } else {
        $errorMessage = "<a style='color: red;'>*Name oder Passwort war ungültig</a><br>";
    }

}

$_main = new MainLogin($errorMessage);

$_phpPageRender = new PhpPageRenderer();

$_phpPageRender->renderContent($_main);