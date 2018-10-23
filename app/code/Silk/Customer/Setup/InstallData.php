<?php
/**
 * User: Duty
 * DateTime: 2018/10/19 15:36
 * Email: duty.li@silksoftware.com
 */

namespace Silk\Customer\Setup;
use Magento\Eav\Model\Config as EavConfig;
use Magento\Eav\Setup\EavSetup;
use Magento\Customer\Api\AddressMetadataInterface;
use Magento\Framework\Setup\InstallDataInterface;
use Magento\Framework\Setup\ModuleContextInterface;
use Magento\Framework\Setup\ModuleDataSetupInterface;
class InstallData implements InstallDataInterface
{
    const CUSTOM_CUSTOMER_ATTRIBUTE_CODE = 'remark';
    /**
     * @var EavSetup
     */
    private $eavSetup;
    /**
     * @var EavConfig
     */
    private $eavConfig;
    /**
     * @param EavSetup $eavSetup
     */
    public function __construct(
        EavSetup $eavSetup,
        EavConfig $eavConfig
    ) {
        $this->eavSetup = $eavSetup;
        $this->eavConfig = $eavConfig;
    }
    /**
     * @param  ModuleDataSetupInterface $setup
     * @param  ModuleContextInterface   $context
     * @return void
     */
    public function install(ModuleDataSetupInterface $setup, ModuleContextInterface $context)
    {
        // Install new attribute
        $setup->startSetup();
        $this->eavSetup->addAttribute(
            AddressMetadataInterface::ENTITY_TYPE_ADDRESS,
            self::CUSTOM_CUSTOMER_ATTRIBUTE_CODE,
            [
                'label'      => __('Remark'),
                'input'      => 'text',
                'visible'    => true,
                'required'   => false,
                'position'   => 150,
                'sort_order' => 150,
                'system'     => false
            ]
        );
        $customAttributeModel = $this->eavConfig->getAttribute(
            AddressMetadataInterface::ENTITY_TYPE_ADDRESS,
            self::CUSTOM_CUSTOMER_ATTRIBUTE_CODE
        );
        $customAttributeModel->setData(
            'used_in_forms',
            [
                'adminhtml_customer_address',
                'customer_address_edit',
                'customer_register_address'
            ]
        );
        $customAttributeModel->save();
        // End installation
        $setup->endSetup();
    }
}
