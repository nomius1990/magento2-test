<?php

/**
 * Zou
 *
 * NOTICE OF LICENSE
 *
 * DISCLAIMER
 *
 * Do not edit or add to this file if you wish to upgrade this extension to newer
 * version in the future.
 *
 * @category    Zou
 * @package     Zou_Demo
 * @copyright   Copyright (c) 2018 Zou
 */

namespace Zou\Demo\Model\ResourceModel\PhysicalStoreStaff;

/**
 * PhysicalStore Collection
 * @category Zou
 * @package  Zou_Demo
 * @module   PhysicalStoresStaff
 * @author   Zou Developer
 */
class Collection extends \Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection
{

    /**
     * _construct
     * @return void
     */
    protected function _construct()
    {
        $this->_init('Zou\Demo\Model\PhysicalStoreStaff', 'Zou\Demo\Model\ResourceModel\PhysicalStoreStaff');
    }

}
