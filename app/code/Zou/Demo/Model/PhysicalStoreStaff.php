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

namespace Zou\Demo\Model;

/**
 * PhysicalStore Model
 * @category Zou
 * @package  Zou_Demo
 * @module   PhysicalStoresStaff
 * @author   Zou Developer
 */
class PhysicalStoreStaff extends \Magento\Framework\Model\AbstractModel
{
    const BASE_MEDIA_PATH = 'zou/physical_stores';
     /**
     * constructor.
     *
     * @param \Magento\Framework\Model\Context                                $context
     * @param \Magento\Framework\Registry                                     $registry
     * @param \Zou\Demo\Model\ResourceModel\Banner\CollectionFactory $bannerCollectionFactory
     * @param \Zou\Demo\Model\ResourceModel\PhysicalStoreStaff                   $resource
     * @param \Zou\Demo\Model\ResourceModel\PhysicalStoreStaff\Collection        $resourceCollection
     */
    public function __construct(
        \Magento\Framework\Model\Context $context,
        \Magento\Framework\Registry $registry,
        \Zou\Demo\Model\ResourceModel\PhysicalStoreStaff $resource,
        \Zou\Demo\Model\ResourceModel\PhysicalStoreStaff\Collection $resourceCollection,
        \Zou\Demo\Model\ResourceModel\PhysicalStore\CollectionFactory $physicalStoreCollectionFactory
    ) {
        parent::__construct(
            $context,
            $registry,
            $resource,
            $resourceCollection
        );
        $this->_physicalStoreCollectionFactory = $physicalStoreCollectionFactory;
    }
    public function getAvailablePhysicalStore()
    {
        $option[] = [
            'value' => '',
            'label' => __('-------- Please select a store --------'),
        ];
        $physicalStoreCollection = $this->_physicalStoreCollectionFactory->create();
        foreach ($physicalStoreCollection as $physicalStore) {
            $option[] = [
                'value' => $physicalStore->getId(),
                'label' => $physicalStore->getName(),
            ];
        }
        //usort($option, array($this, '_sortByName'));
        return $option;
    }
   
}
