<?php




require_once("I:\OServer\domains\yo\Classes\PageInterface.php");
require_once("I:\OServer\domains\yo\Classes\RenderInterface.php");
require_once('I:\OServer\domains\yo\Factory\Factory.php');


class x implements PageInterface
{
    /**
     * @var Supplier[]
     */
    private $_suppliersArray;

    /**
     * @var User
     */
    private $_user;

    public function __construct(array $suppliers, User $user)
    {
        $this->_suppliersArray = $suppliers;
        $this->_user = $user;
    }

    /**
     * @return bool
     */
    public function isMenu(): bool
    {
        return true;
    }

    /**
     * @return string
     */
    public function getTitel(): string
    {
        return 'Alle Lieferanten';
    }

    /**
     * @param EchoOut $out
     */
    public function render(EchoOut $out): void
    {

        foreach ($this->_suppliersArray as $supplier) {
            if ($supplier->getIsActive() == 'yes') {
                $currsupplier = $supplier->getName();
            }
        }

        $out->print(<<<HTML

           <div class="container"
            <main class="main1">

                    <h2 class="main__text">Hallo {$this->_user->getName()}</h2>
                    
                    <div class="main__text"><p><span style="margin-left: 450px"></span>Lieferant für heute: <span style="color: #7d0219fb">{$currsupplier}</span></p></div>
 <form class="form-signin form-signin-my" action="?upload=1" method="post">
                                       <fieldset class="fieldsetorder">      
                                            <legend class="legendorder">Alle Lieferanten :</legend>  
                                                                                                                                
HTML
        );
        //$foods = $menu->getFood();

        // foreach ($foods as $food)
        {
            $out->print(<<<HTML

<div class="form-check">
  <input class="form-check-input" type="checkbox" name="foodId[]" value="{}" id="defaultCheck1">
  <label class="form-check-label" for="defaultCheck1">
    {}<span style="margin-right: 100px"></span> {} Euro
  </label>
</div>                            
                                                                                                        
HTML
            );
        }
        $out->print(<<<HTML
                                                                                                      
                                        </fieldset>
                                        <br>
                                        <input type="hidden" name="supplierId" value="{}"> 
                                        <p><input class="ordersubmit" type="submit" value="bestellen"></p>
                                        
    
                    </main> 
                    </div>
         
HTML
        );


    }
}