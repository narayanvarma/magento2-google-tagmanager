<?php
/**
 * Google TagManager - Magento 2 Module
 *
 * @author     Narayan Varma <n@varma.me.uk>
 * @license    http://opensource.org/licenses/MIT
 */

namespace Google\TagManager\Block;

use Magento\Framework\View\Element\Template;
use Magento\Framework\View\Element\Template\Context;
use Magento\Cookie\Helper\Cookie as CookieHelper;
use Google\TagManager\Helper\Data as GtmHelper;

/**
 * Google Tag Manager Page Block
 */
class DataLayer extends Template
{
    /**
     * Data Layer Variables
     *
     * @var array;
     */
    protected $_variables = array();

    /**
     * Google Tag Manager data
     *
     * @var \Google\TagManager\Helper\Data
     */
    protected $_gtmHelper = null;

    /**
     * Cookie Helper
     *
     * @var \Magento\Cookie\Helper\Cookie
     */
    protected $_cookieHelper = null;

    /**
     * @param Context $context
     * @param CookieHelper $cookieHelper
     * @param GtmHelper $gtmHelper
     * @param array $data
     */
    public function __construct(
        Context $context,
        GtmHelper $gtmHelper,
        CookieHelper $cookieHelper,
        array $data = []
    ) {
        $this->_cookieHelper= $cookieHelper;
        $this->_gtmHelper   = $gtmHelper;
        parent::__construct($context, $data);
        $this->_variables['ecommerce']['currencyCode'] = $this->_storeManager->getStore()->getCurrentCurrency()->getCode();
    }

    /**
     * Render tag manager script
     *
     * @return string
     */
    protected function _toHtml()
    {
        if ($this->_cookieHelper->isUserNotAllowSaveCookie() || !$this->_gtmHelper->isEnabled()) {
            return '';
        }

        return parent::_toHtml();
    }

    /**
     * Return Data Layer Variables
     *
     * @return array
     */
    public function getVariables()
    {
        return $this->_variables;
    }

    public function addVariable($name, $value)
    {
        if (!empty($name) && !empty($value)) {
            $this->_variables[$name] = $value;
        }
    }
}
