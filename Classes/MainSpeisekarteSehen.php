<?php

require_once ("I:\OServer\domains\yo\Classes\PageInterface.php");
require_once ("I:\OServer\domains\yo\Classes\RenderInterface.php");
require_once('I:\OServer\domains\yo\Factory\Factory.php');

class MainSpeisekarteSehen implements PageInterface
{
    /**
     * @var Menu
     */
    private $_menu;

    /**
     * @var string
     */
    private $_supplierId;

    public function __construct(Menu $menu, $supplierId)
    {
        $this->_menu = $menu;
        $this->_supplierId = $supplierId;
    }
    public function isMenu(): bool
    {
        return true;
    }

    public function getTitel(): string
    {
        return 'Speisekarte sehen';
    }

    /**
     * @return Menu
     */
    public function getMenu(): Menu
    {
        return $this->_menu;
    }

    /**
     * @param Menu $menu
     */
    public function setMenu(Menu $menu): void
    {
        $this->_menu = $menu;
    }

    /**
     * @return string
     */
    public function getSupplierId(): string
    {
        return $this->_supplierId;
    }

    /**
     * @param string $supplierId
     */
    public function setSupplierId(string $supplierId): void
    {
        $this->_supplierId = $supplierId;
    }

    public function render(EchoOut $out): void
    {
        $factory = new Factory();
        $supplRepos = $factory->createSupplierRepository();

        $supplier = $supplRepos->getSupplierById($this->_supplierId);

        $out->print(<<<HTML
     <main>
        <div class="container ">
            <div class="container-white-background">
                    
                    <div class="main__text"><p><span style="margin-left: 350px"></span>Lieferant : <span style="color: #7d0219fb">{$supplier->getName()}</span></p></div>
 <form class="form-signin form-signin-my">
                                       <fieldset class="fieldsetorder">      
                                            <legend class="legendorder ">Speisekarte:</legend>  
                                                                                                                                
HTML
        );
        $foods = $this->_menu->getFood();

        foreach ($foods as $food)
        {
            $out->print(<<<HTML

<div class="form-check">
  
    {$food->getName()}<span style="margin-right: 100px"></span> {$food->getPrice()} Euro
  
</div>                            
                                                                                                        
HTML
            );
        }
        $out->print(<<<HTML
                                                                                                      
                                        </fieldset>                                                                               
    
    
                        </div>
                    </div>
         </main>
HTML

            );

    }

}