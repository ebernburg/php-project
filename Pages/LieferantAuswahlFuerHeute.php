<?php

session_start();

require_once('I:\OServer\domains\yo\Classes\PhpPageRenderer.php');
require_once('I:\OServer\domains\yo\Classes\MainLieferantAuswahlFuerHeute.php');
require_once('I:\OServer\domains\yo\Factory\Factory.php');

if (!isset($_SESSION['userid'])) {
    die('<meta http-equiv="refresh" content="0; URL=Anmeldung.php">');
}

$factory = new Factory();
$supplierRepos = $factory->createSupplierRepository();
$userRepos = $factory->createUserRepository();

if (isset($_REQUEST['upload'])) {
    $activeSuppl = $supplierRepos->storeCurrentlySuppliers($_POST['supplierId']);

    // echo '<meta http-equiv="refresh" content="0; url=http://vm71nb05.mainz.interexa.de/user/aadamchuk/bestellsystem/Pages/LieferantFuerHeute.php" />';


}

$suppliersArray = $supplierRepos->getAllSuppliers();
$user = $userRepos->getById($_SESSION['userid']);

$main = new MainLieferantAuswahlFuerHeute($suppliersArray, $user);
$phpPageRenderer= new PhpPageRenderer();

$phpPageRenderer->renderContent($main);

