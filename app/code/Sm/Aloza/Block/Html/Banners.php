<?php
namespace Sm\Aloza\Block\Html;

use Magento\Framework\View\Element\Template;

/**
 * Class Banners
 * @package Sm\Aloza\Block\Html
 */
class Banners extends \Magento\Catalog\Block\Category\View
{
    private $_registry;

    public function __construct(
        \Magento\Framework\View\Element\Template\Context $context,
        \Magento\Catalog\Model\Layer\Resolver $layerResolver,
        \Magento\Framework\Registry $registry,
        \Magento\Catalog\Helper\Category $categoryHelper,
        array $data = []
    )
    {
        $this->_template = 'Magento_Catalog::category/image.phtml';

        parent::__construct($context, $layerResolver, $registry, $categoryHelper, $data);
    }
}
?>