<?php

session_start();

require_once('I:\OServer\domains\yo\Factory\Factory.php');
require_once('I:\OServer\domains\yo\Classes\PhpPageRenderer.php');
require_once('I:\OServer\domains\yo\Classes\MainEinzBestellungFertig.php');


if (!isset($_SESSION['userid'])) {
    session_destroy();
    die('<meta http-equiv="refresh" content="0; URL=Anmeldung.php">');
}

$repoFactory = new Factory();
$userRepos = $repoFactory->createUserRepository();


$_main = new MainEinzBestellungFertig($userRepos->getById($_SESSION['userid']));


$_phpPageRender = new PhpPageRenderer();

$_phpPageRender->renderContent($_main);