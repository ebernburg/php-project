<?php

session_start();

require_once ("I:\OServer\domains\yo\Classes\PageInterface.php");
require_once ("I:\OServer\domains\yo\Classes\RenderInterface.php");

class MainLogin implements PageInterface
{
    /**
     * @var string
     */
    private $_error;

    public function __construct($error)
    {
        $this->_error = $error;
    }

    public function isMenu(): bool
    {
        return false;
    }

    public function getTitel(): string
    {
        return 'Anmeldung';
    }

    public function render(EchoOut $out): void
    {
        $out->print(<<<HTML
    


<main class="anmeldung">    
    <div class="container">
    <div class="container-anmeldund">
	<form class="form-signin" action="?login=1" method="post">
		<h1 class="form-signin-heading text-muted">Anmeldung</h1>
		<input type="text" class="form-control"  name="name" placeholder="Name"  autofocus="">
		<input type="password" class="form-control" name="password" placeholder="Password" >
		<button class="btn btn-lg btn-primary btn-block" type="submit">
			Abschicken
		</button>
		</form>
		<br>
		</div>
</div>
</main>
HTML
        );
        if ($this->_error) {
            $out->print(<<<HTML
        }
		<div class="error">
                {$this->_error}
                    </div>
    

HTML


            );
        }
    }
 }