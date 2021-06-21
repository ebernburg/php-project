<?php

require_once('I:\OServer\domains\yo\Management\SupplierManagement\Supplier.php');

class SupplierMapper
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
     * prepare data for DB, get all suppliers from DB
     */
    public function getAllSuppliers() :array
    {
        $select = [
            'id',
            'name',
            'address',
            'phone',
            'email',
            'opentime',
            'isActive'
        ];
        $where = [];

        $suppliersData = $this->_database->fetch($select, 'suppliers', $where);

        $suppliers = [];

        foreach ($suppliersData as $supplier)
        {
            $suppliers[] = new Supplier(

                    $supplier['id'],
                    $supplier['name'],
                    $supplier['address'],
                    $supplier['phone'],
                    $supplier['email'],
                    $supplier['opentime'],
                    $supplier['isActive']
            );
        }

        return $suppliers;
    }

    public function getSupplierById($supplierId):Supplier
    {
        $select = ['id', 'name', 'address', 'phone', 'email', 'opentime', 'isActive'];
        $where = [
            ['id', '=', $supplierId]
        ];
    $supplierData = $this->_database->fetch($select, 'suppliers', $where);

        foreach ($supplierData as $supplier) {
            $supplier = new Supplier(
                $supplier['id'],
                $supplier['name'],
                $supplier['address'],
                $supplier['phone'],
                $supplier['email'],
                $supplier['opentime'],
                $supplier['isActive'],
            );
    }

    return $supplier;


    }

    /**
     * @param $supplierId
     */
    public function storeCurrentlySuppliers($supplierId)
    {
        $valueArray = array('isActive' =>'no');
        $whereArray = array();

        $valueArrayActive = array('isActive' =>'yes');
        $whereArrayActive = array('id' => $supplierId);

        $this->_database->update('suppliers', $whereArray, $valueArray);

        $this->_database->update('suppliers', $whereArrayActive, $valueArrayActive);
    }
}