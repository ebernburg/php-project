<?php

require_once('I:\OServer\domains\yo\Classes\PageInterface.php');
require_once('I:\OServer\domains\yo\Classes\RenderInterface.php');

class  Header implements RenderInterface
{
    /**
     * @var bool
     */
    private $enableMenu;

    /**
     * @var string
     */
    private $_userId;

public function __construct()
{
    $this->enableMenu = false;
    $this->_userId = $_SESSION['userId'];
}

    /**
     * @return bool
     */
    public function isEnableMenu(): bool
    {
        return $this->enableMenu;
    }

    /**
     * @param bool $enableMain
     */
    public function setEnableMenu(bool $enableMenu): void
    {
        $this->enableMenu = $enableMenu;
    }



    /**
     * @return string
     */
    public function getUserId(): string
    {
        return $this->_userId;
    }

    /**
     * @param string $userId
     */
    public function setUserId(string $userId): void
    {
        $this->_userId = $userId;
    }

    public function render(EchoOut $out): void
    {
        $out->print(<<<HTML

<header>
  <nav class="navbar fixed-top navbar-expand-lg ">  
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
    
HTML
        );

        if($this->enableMenu) {
            $out->print(<<<HTML
      <ul class="navbar-nav mr-auto">
        <li class="nav-item active">
          <a class="nav-link2" href="#">zur gesamte Bestellung</a>
        </li>
        <li class="nav-item">
          <a class="nav-link2 nav-2link" href="LieferantAuswahlFuerHeute.php">Lieferantenauswahl für gesamte Bestellung</a>
        </li>
        <li class="nav-item">
          <a class="nav-link2" href="AlleLieferanten.php">Alle Lieferanten</a>
        </li>
        <li class="nav-item">
          <a class="nav-link2" href="EinzBestellung.php">zu einzelne Bestellung</a>
        </li>
        <li class="nav-item">
          <a class="nav-link2" href="Abmeldung.php">Abmelden</a>
        </li>
      </ul>
      
HTML
            );
        }
        $out->print(<<<HTML
        
    </div>
  </nav>
</header>  


HTML
        );
    }
}