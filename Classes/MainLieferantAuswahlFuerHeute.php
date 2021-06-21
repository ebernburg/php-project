<?php

require_once ("I:\OServer\domains\yo\Classes/PageInterface.php");
require_once ("I:\OServer\domains\yo\Classes/RenderInterface.php");

class MainLieferantAuswahlFuerHeute implements PageInterface
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

    public function isMenu(): bool
    {
        return true;
    }

    public function getTitel(): string
    {
        return 'Auswahl von Lieferanten';
    }

    public function render(EchoOut $out): void
    {
        foreach ($this->_suppliersArray as $supplier)
        {
            if ($supplier->getIsActive() == 'yes'){
                $currsupplier = $supplier->getName();
            }
        }   $out->print(<<<HTML

<main>
           <div class="container">
                <div class="suppl-all">     
        
                    <h4 class="">Hallo {$this->_user->getName()}, ein Lieferant für heute ist <span style="color: #7d0219fb">{$currsupplier}.</h4>
                    <h4 class="">Hier Du kannst einen Lieferantür gesamte Bestellung einlegen.</h4>
                           <div class="container-box">
                                                                                                            
HTML
    );

        foreach ($this->_suppliersArray as $supplier)
        {
            $out->print(<<<HTML
<form action="?upload=1" method="post"" enctype="multipart/form-data">
<fieldset class="fieldsetorder"">
<legend class="legendorder">{$supplier->getName()}</legend>
                <p><img src="\Images\address.png" alt="img" width="70px" height="70px"> <span style="margin-left: 150px">{$supplier->getAddress()}</span></p>
                <p><img src="\Images\icon-phone.jpg" alt="img" width="70px" height="70px"> <span style="margin-left: 150px">{$supplier->getPhone()}</span></p>
                <p><img src="\Images\icons-email.png" alt="img" width="70px" height="70px"> <span style="margin-left: 150px">{$supplier->getEmail()}</span></p>
                <p><img src="\Images\icon-opentime.png" alt="img" width="70px" height="70px"> <span style="margin-left: 150px">{$supplier->getOpentime()}</span></p>         
                 
                <input type="hidden" name="supplierId" value="{$supplier->getId()}"> 
                                        
                <div style="margin-left: 350px"title="menu einsehen"><a href = "../Pages/SpeisekarteSehen.php?supplierId={$supplier->getId()}"><img src="\Images\icon-menu.png" alt="img" width="70px" height="70px"></a></div>              
                <input type="image" title="zu einem anderen Lieferant wechseln"  src="\Images\supplier-change.png" width="75px" height="75px" alt="Submit" style="float: left">
            <br>
</fieldset>
</form>

HTML
            );
        }
        $out->print(<<<HTML
                    </div> 
                    </div>
                    </div>
                    </div>
                    </main> 
                    
         
HTML
        );


    }
}