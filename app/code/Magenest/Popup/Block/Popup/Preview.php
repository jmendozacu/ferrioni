<?php
namespace Magenest\Popup\Block\Popup;

use Magento\Framework\View\Element\Template;

class Preview extends \Magento\Framework\View\Element\Template{

    /** @var  \Magento\Framework\Registry $_coreRegistry */
    protected $_coreRegistry;

    /** @var  \Magenest\Popup\Model\TemplateFactory $_templateFactory */
    protected $_templateFactory;

    /** @var  \Magenest\Popup\Helper\Cookie $_helperCookie */
    protected $_helperCookie;

    /** @var \Magento\Cms\Model\Template\FilterProvider $_filterProvider */
    protected $_filterProvider;

    public function __construct(
        \Magento\Cms\Model\Template\FilterProvider $filterProvider,
        \Magenest\Popup\Model\TemplateFactory $templateFactory,
        \Magenest\Popup\Helper\Cookie $helperCookie,
        \Magento\Framework\Registry $coreRegistry,
        \Magento\Framework\View\Element\Template\Context $context,
        array $data = []
    ){
        $this->_filterProvider = $filterProvider;
        $this->_templateFactory = $templateFactory;
        $this->_helperCookie = $helperCookie;
        $this->_coreRegistry = $coreRegistry;
        parent::__construct($context, $data);
    }
    public function getDataDisplay(){
        $cookie = $this->_helperCookie->get(\Magenest\Popup\Helper\Cookie::COOKIE_NAME);
        if($cookie != null){
            $this->_helperCookie->delete();
        }
        /** @var \Magenest\Popup\Model\Popup $popup */
        $popup = $this->_coreRegistry->registry('popup');
        $html_content = $popup->getHtmlContent();
        $content = $this->_filterProvider->getBlockFilter()->filter($html_content);
        $content .= '<span id="copyright">Powered by Magenest</span>';
        $popup->setHtmlContent($content);

        $data = $popup->getData();
        $class = $this->getTemplateClassDefault($popup->getPopupTemplateId());
        $data['class'] = $class;
        $data['preview'] = true;
        return json_encode($data,JSON_HEX_QUOT|JSON_HEX_TAG|JSON_HEX_AMP|JSON_HEX_APOS|JSON_NUMERIC_CHECK|JSON_PRETTY_PRINT|JSON_UNESCAPED_SLASHES|JSON_FORCE_OBJECT|JSON_PRESERVE_ZERO_FRACTION|JSON_UNESCAPED_UNICODE|JSON_PARTIAL_OUTPUT_ON_ERROR);
    }
    public function getTemplateClassDefault($templateId){
        /** @var \Magenest\Popup\Model\Template $templateModel */
        $templateModel = $this->_templateFactory->create()->load($templateId);
        if($templateModel->getTemplateId()){
            return $templateModel->getData('class');
        }else{
            return 'popup-default-1';
        }
    }
}