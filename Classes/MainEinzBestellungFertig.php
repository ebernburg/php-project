<?php

require_once ("I:\OServer\domains\yo\Classes/PageInterface.php");
require_once ("I:\OServer\domains\yo\Classes/RenderInterface.php");

class MainEinzBestellungFertig implements PageInterface
{
    /**
     * @var User
     */
    private $_user;

    /**
     * profileManagement constructor.
     * @param User $userData
     */
    public function __construct(?User $userData)
    {

        $this->_user = $userData;

    }

    /**
     * @inheritDoc
     */
    public function render(EchoOut $_eo): void
    {

        $_eo->print(
            <<<HTML
           
           <main>
            <div class="container">
                <div class="container-white-background">
            
                <div>
                    <h2 class="main__text"></h2>
                    <div class="profile__list">
                    <div class="main__text"><p><span style="margin-left: 50px">Deine Bestellung kostet: </p></div>
                    <div class="main__text"><p><span style="margin-left: 50px">Deine Bestellung wird überprüft und kommt bald. </p></div>
                    <div class="main__text"><p><span style="margin-left: 50px">Vielen Dank  {$this->_user->getName()}, bis zum nächstes Mal.</p></div>
                    <div><span style="margin-left: 150px"><img src="/Images/food-delivery.jpg" width="350px" height="300px"  alt="img"></div>   
                </div>

                </div>
            </div>
</main> 
HTML
        );

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
        return 'Bestellung fertig';
    }
}
