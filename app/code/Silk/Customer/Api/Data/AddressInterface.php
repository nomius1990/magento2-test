<?php
/**
 *
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
 */

namespace Silk\Customer\Api\Data;

/**
 * Customer address interface.
 * @api
 * @since 100.0.2
 */
interface AddressInterface extends \Magento\Customer\Api\Data\AddressInterface
{

    const REMARK = 'remark';

    /**
     * Get remark
     *
     * @return string|null
     */
    public function getRemark();

    /**
     * Set telephone number
     *
     * @param string $telephone
     * @return $this
     */
    public function setRemark($remark);


}
