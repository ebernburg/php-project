<?php

session_start();

require_once('I:\OServer\domains\yo\Classes\MainEinzBestellung.php');
require_once('I:\OServer\domains\yo\Factory\Factory.php');
require_once('I:\OServer\domains\yo\Classes\PhpPageRenderer.php');
require_once('I:\OServer\domains\yo\Management\OrderManagement\SingleOrder.php');

if (!isset($_SESSION['userid'])) {
    die('<meta http-equiv="refresh" content="0; URL=Anmeldung.php">');
}

$factory = new Factory();
$userRepository = $factory->createUserRepository();

$user = $userRepository->getById($_SESSION['userid']);

if(isset($_REQUEST['upload'])){

    $order = new SingleOrder(

        $_SESSION['userid'],
        $_POST['supplierId'],
        $_POST['wish'],
        date("Y-m-d H:i:s"),
        $_POST['foodId']
    );

    $orderRepos = $factory->createOrderRepository();
    $storeSingleOrder = $orderRepos->storeOrder($order);
    header("Location: EinzBestellungFertig.php");
}



$main = new MainEinzBestellung($user);
$phpRender = new PhpPageRenderer();
$phpRender->renderContent($main);
