<?php


class SingleOrder
{

    /**
     * @var string
     */
    //private $singleOrderId;

    /**
     * @var string
     */
    private $userId;

    /**
     * @var string
     */
    private $lieferId;

    /**
     * @var Food[]
     */
    private $food;

    /**
     * @var string
     */
    private $wishUser;

    /**
     * @var string
     */
    private $time;

    /**
     * singleOrder constructor.
     * @param string $userId
     * @param Food[] $food
     * @param string $fullOrderId
     */
    public function __construct(string $userId, string $lieferId, string $wishUser, string $time, array $food)
    {
        //$this->fullOrderId = $fullOrderId;
        $this->userId = $userId;
        $this->lieferId = $lieferId;
        $this->wishUser = $wishUser;
        $this->food = $food;
        $this->time = $time;
        //$this->singleOrderId = $singleOrderId;
    }

    /**
     * @return string
     */
    public function getTime(): string
    {
        return $this->time;
    }

    /**
     * @return string
     */
    public function getSingleOrderId(): string
    {
        return $this->singleOrderId;
    }

    /**
     * @param string $singleOrderId
     */
    public function setSingleOrderId(string $singleOrderId): void
    {
        $this->singleOrderId = $singleOrderId;
    }

    /**
     * @param string $time
     */
    public function setTime(string $time): void
    {
        $this->time = $time;
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
    public function getWishUser(): string
    {
        return $this->wishUser;
    }

    /**
     * @param string $wishUser
     */
    public function setWishUser(string $wishUser): void
    {
        $this->wishUser = $wishUser;
    }


    /**
     * @return string
     */
    public function getUserId(): string
    {
        return $this->userId;
    }

    /**
     * @param string $userId
     */
    public function setUserId(string $userId): void
    {
        $this->userId = $userId;
    }

    /**
     * @return array|Food[]
     */
    public function getFood()
    {
        return $this->food;
    }

    /**
     * @param array|Food[] $food
     */
    public function setFood($food): void
    {
        $this->food = $food;
    }
}