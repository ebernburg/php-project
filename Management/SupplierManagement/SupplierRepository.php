<?php

require_once('I:\OServer\domains\yo\Management\SupplierManagement/SupplierMapper.php');

class SupplierRepository
{
    /**
     * @var SupplierMapper
     */
    private $_mapper;

    public function __construct(SupplierMapper $mapper)
    {
        $this->_mapper = $mapper;
    }

    /**
     * get all Suppliers from DB
     */
    public function getAllSuppliers():array
    {
        $suppliers = $this->_mapper->getAllSuppliers();

        return $suppliers;
    }

    /**
     * @param $supplierId
     * @return Supplier
     */
    public function getSupplierById($supplierId):Supplier
    {
        $supplier = $this->_mapper->getSupplierById($supplierId);

        return $supplier;

    }

    /**
     * @param $supplierId
     */
    public function storeCurrentlySuppliers($supplierId)
    {
        $changeCurrSupplier = $this->_mapper->storeCurrentlySuppliers($supplierId);

        return $changeCurrSupplier;
    }
}