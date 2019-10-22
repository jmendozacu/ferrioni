<?php

namespace Megatrix\Sizes\Model\Config\Source;

/**
 * Class Sizes
 * @package Megatrix\Sizes\Model\Config\Source
 */
class Sizes extends \Magento\Eav\Model\Entity\Attribute\Source\AbstractSource
{
    /**
     * @var array
     */
    protected $options;

    /**
     * @var \Megatrix\Sizes\Helper\Data
     */
    protected $helper;

    /**
     * Sizes constructor.
     * @param \Megatrix\Sizes\Helper\Data $helper
     */
    public function __construct(
        \Megatrix\Sizes\Helper\Data $helper
    )
    {
        $this->helper = $helper;
        $this->options = $this->helper->getSizesOptions();

    }

    /**
     * @return array
     */
    public function toArray()
    {
        $data = [];

        foreach ($this->options as $option) {
            $data[] = [strtolower($option['sizes']) => ucfirst($option['sizes'])];
        }

        return $data;
    }

    /**
     * @return array
     */
    public function toOptionArray()
    {
        $data = [];
        $options = $this->options;

        foreach ($options as $option) {
            $data[] = ['label' => __(ucfirst($option['sizes'])), 'value' => strtolower($option['sizes'])];
        }

        return $data;
    }

    /**
     * @return array
     */
    public function getAllOptions()
    {
        return $this->toOptionArray();
    }
}