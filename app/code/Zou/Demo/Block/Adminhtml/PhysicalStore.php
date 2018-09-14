<?php
namespace Zou\Demo\Block\Adminhtml;

class PhysicalStore extends \Magento\Backend\Block\Widget\Grid\Container
{
    /**
     * Constructor.
     */
    protected function _construct()
    {
        $this->_controller = 'adminhtml_physicalStore';
        $this->_blockGroup = 'Zou_Demo';
        $this->_headerText = __('PhysicalStores');
        $this->_addButtonLabel = __('添加新的实体店');
        parent::_construct();
    }
}
