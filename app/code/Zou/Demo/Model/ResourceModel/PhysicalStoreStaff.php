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

namespace Zou\Demo\Model\ResourceModel;

/**
 * PhysicalStore Resource Model
 * @category Zou
 * @package  Zou_Demo
 * @module   PhysicalStoresStaff
 * @author   Zou Developer
 */
class PhysicalStoreStaff extends \Magento\Framework\Model\ResourceModel\Db\AbstractDb
{
    /**
     * construct
     * @return void
     */
    protected function _construct()
    {
        $this->_init('physical_store_staff', 'id');
    }
}
