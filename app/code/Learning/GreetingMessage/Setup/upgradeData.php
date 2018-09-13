<?php
/**
 * Created by PhpStorm.
 * User: boli
 * Date: 2018/9/13
 * Time: 13:57
 */

/**
 * Copyright © 2016 Magento. All rights reserved.
 * See COPYING.txt for license details.
 */

namespace Learning\GreetingMessage\Setup;

use Magento\Framework\Setup\UpgradeDataInterface;
use Magento\Framework\Setup\ModuleContextInterface;
use Magento\Framework\Setup\ModuleDataSetupInterface;

/**
 * Upgrade Data script
 */

class UpgradeData implements UpgradeDataInterface
{
    /**
     * {@inheritdoc}
     * @SuppressWarnings(PHPMD.ExcessiveMethodLength)
     */
    public function upgrade(ModuleDataSetupInterface $setup, ModuleContextInterface $context)
    {
        $setup->startSetup();
        if ($context->getVersion()
            && version_compare($context->getVersion(), '0.0.4') < 0
        ) {
            $table = $setup->getTable('greeting_message');
            $setup->getConnection()
                ->insertForce($table, ['message' => '不会告诉你春天来了', 'season' => 'Spring']);

            $setup->getConnection()
                ->update($table, ['season' => 'winter'], 'greeting_id IN (1,2)');
        }
        $setup->endSetup();
    }
}