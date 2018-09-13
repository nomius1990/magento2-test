<?php

namespace Learning\ClothingMaterial\Model\Attribute\Frontend;

class Material extends \Magento\Eav\Model\Entity\Attribute\Frontend\AbstractFrontend
{
    public function getValue(\Magento\Framework\DataObject $object)
    {
        $value = $object->getData($this->getAttribute()->getAttributeCode());
        return "<b>说了你不信什么都弄好了就是没法展示出来</b>";
    }
}