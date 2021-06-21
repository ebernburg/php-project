<?php

require_once('I:\OServer\domains\yo\Classes\PageInterface.php');
require_once('I:\OServer\domains\yo\Classes\RenderInterface.php');
require_once('I:\OServer\domains\yo\Header_Footer\Header.php');
require_once('I:\OServer\domains\yo\Header_Footer\Footer.php');
require_once('I:\OServer\domains\yo\Classes\EchoOut.php');



/**
 * Class PhpPageRenderer build whole site and need header,main,footer
 */
class PhpPageRenderer
{
    public function renderContent(PageInterface $main)
    {
        $container = new EchoOut();

        $container->print(<<<HTML
        <!DOCTYPE html>
        <html lang="en">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
            <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
            <title>{$main->getTitel()}</title>
            <link rel="stylesheet" type="text/css" href="../Styles/main.css">
        </head>
        <body>
HTML
        );
        $header = new Header();
        $header->setEnableMenu($main->isMenu());
        $header->render($container);
        $main->render($container);
        $footer = new Footer();
        $footer->render($container);
        $container->print(<<<HTML
        </body>
        </html>   
HTML
            );
    }
}