<?php

require_once('I:\OServer\domains\yo\Classes\RenderInterface.php');

interface PageInterface extends RenderInterface
{
    public function isMenu() :bool;

    public function getTitel() :string;
}