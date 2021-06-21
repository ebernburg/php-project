<?php


class Menu
{

    /**
     * @var string
     */
    //private $menuId;

    /**
     * @var Food[]
     */
    private $_food;

    /**
     * @var string
     */
    private $_supplierId;


    /**
     * Menu constructor.
     * @param Food[] $food
     */
    public function __construct(array $food, string $supplierId)
    {
        $this->_supplierId = $supplierId;
        $this->_food = $food;
        // $this->menuId = $menuId;
    }

    /**
     * @return Food[]
     */
    public function getFood(): array
    {
        return $this->_food;
    }

    /**
     * @param Food[] $food
     */
    public function setFood(array $food): void
    {
        $this->_food = $food;
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

}