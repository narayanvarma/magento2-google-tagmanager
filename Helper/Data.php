<?php
/**
 * Google TagManager - Magento 2 Module
 *
 * @author     Narayan Varma <n@varma.me.uk>
 * @license    http://opensource.org/licenses/MIT
 */

namespace Google\TagManager\Helper;

use Magento\Store\Model\Store;

/**
 * Google Tag Manager data helper
 *
 */
class Data extends \Magento\Framework\App\Helper\AbstractHelper
{
    /**
     * Config paths for using throughout the code
     */
    const XML_PATH_ACTIVE = 'google/tagmanager/active';

    const XML_PATH_ACCOUNT = 'google/tagmanager/account';

    /**
     * Whether Tag Manager is ready to use
     *
     * @return bool
     */
    public function isEnabled()
    {
        $accountId = $this->scopeConfig->getValue(self::XML_PATH_ACCOUNT, \Magento\Store\Model\ScopeInterface::SCOPE_STORE);
        return $accountId && $this->scopeConfig->isSetFlag(self::XML_PATH_ACTIVE, \Magento\Store\Model\ScopeInterface::SCOPE_STORE);
    }

    /**
     * Get Tag Manager Account ID
     *
     * @return bool | null | string
     */
    public function getAccountId()
    {
        return $this->scopeConfig->getValue(self::XML_PATH_ACCOUNT, \Magento\Store\Model\ScopeInterface::SCOPE_STORE);
    }
}
