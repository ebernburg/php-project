<?php

require_once('I:\OServer\domains\yo\Management\OrderManagement/OrderMapper.php');
require_once('I:\OServer\domains\yo\Management\OrderManagement/SingleOrder.php');


class OrderRepository
{
    /**
     * @var OrderMapper
     */
    private $_mapper;

    public function __construct(OrderMapper $mapper)
    {
        $this->_mapper = $mapper;
    }

    /**
     * store order from $_POST
     */
    public function storeOrder(SingleOrder $order)
    {
        $storeOrder = $this->_mapper->storeOrder($order);

        return $storeOrder;

    }
}