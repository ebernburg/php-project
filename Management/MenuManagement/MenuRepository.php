<?php

require_once('I:\OServer\domains\yo\Management\MenuManagement\MenuMapper.php');

class MenuRepository
{

    /**
     * @var menuMapper
     */
    private $_mapper;

    /**
     * menuRepository constructor.
     * @param menuMapper $mapper
     */
    public function __construct(menuMapper $mapper)
    {
        $this->_mapper = $mapper;
    }


    /**
     * @param string $supplierId
     * @return Menu
     */
    public function getMenuBySupplierId(string $supplierId): Menu
    {

        $menu = $this->_mapper->getMenuBySupplierId($supplierId);

        return $menu;

    }

}