<?php

require_once ("I:\OServer\domains\yo\Classes\PageInterface.php");
require_once ("I:\OServer\domains\yo\Classes\RenderInterface.php");
require_once('I:\OServer\domains\yo\Factory\Factory.php');
require_once('I:\OServer\domains\yo\Classes\EchoOut.php');
require_once('I:\OServer\domains\yo\Management\UserManagement\User.php');
require_once('I:\OServer\domains\yo\Management\SupplierManagement\Supplier.php');

class MainEinzBestellung implements PageInterface
{
    /**
     * @var string
     */
    private $_user;

    public function __construct(?User $user)
    {
        $this->_user = $user;
    }

    public function isMenu(): bool
    {
        return true;
    }

    public function getTitel(): string
    {
        return 'EinzBestellung';
    }

    public function render(EchoOut $out): void
    {

        $factory = new Factory();
        $supplierRepo = $factory->createSupplierRepository();


        $suppliers = $supplierRepo->getAllSuppliers();

       foreach ($suppliers as $supplier)
        {
            if ($supplier->getIsActive() == 'yes'){
                $currsupplier = $supplier->getName();
                $currsupplierId = $supplier->getId();
            }
        }

       $menurepos = $factory->createMenuRepository();

        $menu = $menurepos->getMenuBySupplierId($currsupplierId);



        $out->print(<<<HTML
      <main>
        <div class="container ">
            <div class="container-white-background">
                    <h4 class="main__text"><span style="margin-left: 50px"></span>Hallo {$this->_user->getName()}</h4>
                    
                    <div class="main__text"><p><span style="margin-left: 350px"></span>Lieferant für heute: <span style="color: #7d0219fb">{$currsupplier}</span></p></div>
 <form class="form-signin form-signin-my" action="?upload=1" method="post">
                                       <fieldset class="fieldsetorder">      
                                            <legend class="legendorder ">Speisekarte:</legend>  
                                                                                                                                
HTML
        );
        $foods = $menu->getFood();

        foreach ($foods as $food)
        {
            $out->print(<<<HTML

<div class="form-check">
  <input class="form-check-input" type="checkbox" name="foodId[]" value="{$food->getFoodId()}" id="defaultCheck1">
  <label class="form-check-label" for="defaultCheck1">
    {$food->getName()}<span style="margin-right: 100px"></span> {$food->getPrice()} Euro
  </label>
</div>                            
                                                                                                        
HTML
            );
        }
        $out->print(<<<HTML
                                                                                                      
                                        </fieldset>
                                        <br>
                                        <input type="hidden" name="supplierId" value="{$currsupplierId}"> 
                                        <textarea name="wish" placeholder="schreib noch Zusatzwünsch..." id="" cols="25" rows="3"></textarea>
                                        <p><input class="ordersubmit" type="submit" value="bestellen"></p>
                                        
    
                        </div>
                    </div>
         </main>
HTML


        );
    }
}