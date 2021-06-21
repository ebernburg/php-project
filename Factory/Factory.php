<?php

require_once('I:\OServer\domains\yo\Management\UserManagement/UserRepository.php');
require_once('I:\OServer\domains\yo\Management\UserManagement/UserMapper.php');
require_once('I:\OServer\domains\yo\Management\SupplierManagement/SupplierRepository.php');
require_once('I:\OServer\domains\yo\Management\SupplierManagement/SupplierMapper.php');
require_once('I:\OServer\domains\yo\Management\OrderManagement/OrderMapper.php');
require_once('I:\OServer\domains\yo\Management\OrderManagement/OrderRepository.php');
require_once('I:\OServer\domains\yo\Classes\Database.php');
require_once('I:\OServer\domains\yo\Management\MenuManagement\MenuRepository.php');
require_once('I:\OServer\domains\yo\Management\MenuManagement\MenuMapper.php');



class Factory
{
    /**
     * @return UserRepository
     */
    public function createUserRepository(): UserRepository
    {
        return new UserRepository(new UserMapper(new Database()));
    }

    /**
     * @return SupplierRepository
     */
    public function createSupplierRepository() :SupplierRepository
    {
        return new SupplierRepository(new SupplierMapper(new Database()));
    }

    /**
     * @return OrderRepository
     */
    public function createOrderRepository() :OrderRepository
    {
        return new OrderRepository(new OrderMapper(new Database()));
    }

    /**
     * @return menuRepository
     */
    public function createMenuRepository(): MenuRepository
    {
        return new menuRepository(new menuMapper(new Database()));
    }
}