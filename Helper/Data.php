<?php
/**
 * Copyright © 2015 Magento. All rights reserved.
 * See COPYING.txt for license details.
 */

// @codingStandardsIgnoreFile

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
     * @param null|string|bool|int|Store $store
     * @return bool
     */
    public function isEnabled($store = null)
    {
        $accountId = $this->scopeConfig->getValue(self::XML_PATH_ACCOUNT, \Magento\Store\Model\ScopeInterface::SCOPE_STORE, $store);
        return $accountId && $this->scopeConfig->isSetFlag(self::XML_PATH_ACTIVE, \Magento\Store\Model\ScopeInterface::SCOPE_STORE, $store);
    }

    /**
     * Get Tag Manager Account ID
     *
     * @param null|string|bool|int|Store $store
     * @return bool
     */
    public function getAccountId($store = null)
    {
        return $this->scopeConfig->getValue(self::XML_PATH_ACCOUNT, \Magento\Store\Model\ScopeInterface::SCOPE_STORE, $store); 
    }
}
