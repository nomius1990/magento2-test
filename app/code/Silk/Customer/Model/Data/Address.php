<?php
/**
 * Data Model implementing the Address interface
 *
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
 */
namespace Silk\Customer\Model\Data;

/**
 * Class Address
 *
 *
 * @api
 * @since 100.0.2
 */
class Address extends \Magento\Customer\Model\Data\Address implements \Silk\Customer\Api\Data\AddressInterface
{

    /**
     * Get remark
     *
     * @return string|null
     */
    public function getRemark()
    {
        return $this->_get(self::REMARK);
    }

    /**
     * Set telephone number
     *
     * @param string $telephone
     */
    public function setRemark($remark)
    {
        return $this->setData(self::REMARK, $remark);
    }
}

