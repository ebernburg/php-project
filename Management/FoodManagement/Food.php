<?php


class Food
{

    /**
     * @var string
     */
    private $foodId;
    /**
     * @var string
     */
    private $lieferId;

    /**
     * @var string
     */
    private $name;

    /**
     * @var double
     */
    private $price;

    /**
     * @var string
     */
    // private $menuId;

    /**
     * Food constructor.
     * @param string $lieferId
     * @param string $name
     * @param float $price
     * @param string $foodId
     * @param string menuId
     */
    public function __construct(string $lieferId, string $foodId, string $name, float $price)
    {
        $this->name = $name;
        $this->price = $price;
        $this->lieferId = $lieferId;
        $this->foodId = $foodId;
        //$this->menuId = $menuId;
    }

    /**
     * @return string
     */
    public function getLieferId(): string
    {
        return $this->lieferId;
    }

    /**
     * @param string $lieferId
     */
    public function setLieferId(string $lieferId): void
    {
        $this->lieferId = $lieferId;
    }

    /**
     * @return string
     */
    public function getFoodId(): string
    {
        return $this->foodId;
    }

    /**
     * @param string $foodId
     */
    public function setFoodId(string $foodId): void
    {
        $this->foodId = $foodId;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @param string $name
     */
    public function setName(string $name): void
    {
        $this->name = $name;
    }

    /**
     * @return float
     */
    public function getPrice(): float
    {
        return $this->price;
    }

    /**
     * @param float $price
     */
    public function setPrice(float $price): void
    {
        $this->price = $price;
    }


}