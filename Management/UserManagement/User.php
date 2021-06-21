<?php


class User
{
    /**
     * @var string
     */
    private $_id;
    /**
     * @var string
     */
    private $_name;
    /**
     * @var string
     */
    private $_password;

    public function __construct(string $id, string $name, string $password)
    {
        $this->_id = $id;
        $this->_name = $name;
        $this->_password = $password;
    }

    /**
     * @return string
     */
    public function getId(): string
    {
        return $this->_id;
    }

    /**
     * @param string $id
     */
    public function setId(string $id): void
    {
        $this->_id = $id;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->_name;
    }

    /**
     * @param string $name
     */
    public function setName(string $name): void
    {
        $this->_name = $name;
    }

    /**
     * @return string
     */
    public function getPassword(): string
    {
        return $this->_password;
    }

    /**
     * @param string $password
     */
    public function setPassword(string $password): void
    {
        $this->_password = $password;
    }


}