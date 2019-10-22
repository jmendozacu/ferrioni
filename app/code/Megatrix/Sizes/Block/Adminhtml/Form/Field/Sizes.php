<?php

namespace Megatrix\Sizes\Block\Adminhtml\Form\Field;

use Magento\Config\Block\System\Config\Form\Field\FieldArray\AbstractFieldArray;

/**
 * Class Sizes
 * @package Megatrix\Sizes\Block\Adminhtml\Form\Field
 */
class Sizes extends AbstractFieldArray
{
    /**
     *
     */
    protected function _prepareToRender()
    {
        $this->addColumn('sizes', ['label' => __('Size Type'), 'class' => 'required-entry']);
        $this->_addAfter = false;
        $this->_addButtonLabel = __('Add Size');
    }
}