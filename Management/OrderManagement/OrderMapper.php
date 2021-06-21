<?php


class OrderMapper
{
    /**
     * @var Database
     */
    private $_database;

    public function __construct(Database $database)
    {
        $this->_database = $database;
    }

    /**
     * @param $order
     */
    public function storeOrder(SingleOrder $order)
    {
        $orderDataArray1 = array(
            'userId' => $order->getUserId(),
            'userWish' => $order->getWishUser(),
            'supplierId' => $order->getLieferId(),
            'date' => $order->getTime()
        );
        $this->_database->insert('singleorder', $orderDataArray1);

        /*
         * get last single order
         */

        // $w = "select `singleOrderId` from `singleOrder` order by `singleOrderId` desc limit 1";
        $lastId = $this->_database->lastElemId();


//        $lastItem2 = $this->_database->fetch2($w);
//        $lastItem = $lastItem2[0]['singleOrderId'];


        foreach ($order->getFood()as $food) {

            $orderDataArray2 = array(
                'singleOrderId' => $lastId,
                'foodId' => $food,
            );
            $this->_database->insert('orderfoods', $orderDataArray2);
        }
    }
}