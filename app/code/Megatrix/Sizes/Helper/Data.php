<?php

namespace Megatrix\Sizes\Helper;

/**
 * Class Data
 * @package Megatrix\Sizes\Helper
 */
class Data extends \Magento\Framework\App\Helper\AbstractHelper
{
    const XML_PATH_PRODUCT_ATTRIBUTES_CONFIG_SIZES = 'sizes/config/sizes';

    /**
     * @var \Magento\Framework\Serialize\SerializerInterface
     */
    protected $serializer;

    /**
     * Data constructor.
     * @param \Magento\Framework\App\Helper\Context $context
     * @param \Magento\Framework\Serialize\SerializerInterface $serializer
     */
    public function __construct(
        \Magento\Framework\App\Helper\Context $context,
        \Magento\Framework\Serialize\SerializerInterface $serializer
    ) {
        parent::__construct($context);
        $this->serializer = $serializer;
    }

    /**
     * @return array
     */
    public function getSizesOptions()
    {
        return ($this->scopeConfig->getValue(
            self::XML_PATH_PRODUCT_ATTRIBUTES_CONFIG_SIZES,
            \Magento\Store\Model\ScopeInterface::SCOPE_STORE
        )) ?
        $this->serializer->unserialize(
        $this->scopeConfig->getValue(
        self::XML_PATH_PRODUCT_ATTRIBUTES_CONFIG_SIZES,
        \Magento\Store\Model\ScopeInterface::SCOPE_STORE
        )) :
        [];
    }
}