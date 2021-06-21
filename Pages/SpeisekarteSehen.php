<?php

session_start();

require_once('I:\OServer\domains\yo\Classes\PhpPageRenderer.php');
require_once('I:\OServer\domains\yo\Factory\Factory.php');
require_once('I:\OServer\domains\yo\Classes\MainAlleLieferanten.php');
require_once('I:\OServer\domains\yo\Classes\MainSpeisekarteSehen.php');

if (!isset($_SESSION['userid'])) {
    die('<meta http-equiv="refresh" content="0; URL=Anmeldung.php">');
}

$supplierId = $_GET['supplierId'];

$factory = new Factory();
$reposMenu = $factory->createMenuRepository();

$menu = $reposMenu->getMenuBySupplierId($supplierId);


$main = new MainSpeisekarteSehen($menu, $supplierId);
$phpPageRenderer = new PhpPageRenderer();
$phpPageRenderer->renderContent($main);




