<?php
/**
 * Copyright © 2015 Magento. All rights reserved.
 * See COPYING.txt for license details.
 */

// @codingStandardsIgnoreFile

namespace Google\TagManager\Block;

/**
 * Google Tag Manager Page Block
 */
class Gtm extends \Magento\Framework\View\Element\Template
{
    /**
     * Google Tag Manager data
     *
     * @var \Google\TagManager\Helper\Data
     */
    protected $_gtmData = null;

    /**
     * @param \Magento\Framework\View\Element\Template\Context $context
     * @param \Google\TagManager\Helper\Data $gtmData
     * @param array $data
     */
    public function __construct(
        \Magento\Framework\View\Element\Template\Context $context,
        \Google\TagManager\Helper\Data $gtmData,
        array $data = []
    ) {
        $this->_gtmData = $gtmData;
        parent::__construct($context, $data);
    }

    /**
     * Get Account Id
     *
     * @param string $path
     * @return mixed
     */
    public function getAccountId()
    {
        return $this->_gtmData->getAccountId();
    }

    /**
     * Render tag manager script
     *
     * @return string
     */
    protected function _toHtml()
    {
        if (!$this->_gtmData->isEnabled()) {
            return '';
        }

        return parent::_toHtml();
    }
}
