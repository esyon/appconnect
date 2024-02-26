<?php

/**
 * This Software is the property of ESYON and is protected by copyright law - it is NOT Freeware.
 * Any unauthorized use of this software without a valid license is a violation of the license agreement and will be
 * prosecuted by civil and criminal law.
 *
 * @copyright      (C) ESYON GmbH
 * @since              Version 1.0
 * @author             Albert Feka <support@esyon.de>
 * @link               http://www.esyon.de
 */

namespace Esyon\AppConnect\Application\Controller;

use OxidEsales\Eshop\Application\Controller\FrontendController;
use OxidEsales\Eshop\Core\Registry;

/**
 * Class AppFailure
 * @package Esyon\AppConnect\Application\Controller
 */
class AppFailure extends FrontendController
{
    /**
     * app unavailable
     */
    private const FAILURE_UNAVAILABLE = 'unavailable';

    /**
     * app outdated
     */
    private const FAILURE_OUTDATED = 'outdated';

    /**
     * @var string
     */
    protected string $appWarningNotAvailable = "app_warning_not_available.tpl";

    /**
     * @var string
     */
    protected string $appWarningOutdated = "app_warning_outdated.tpl";

    /**
     * @return string $_sThisTemplate current template file name
     */
    public function render(): string
    {
        parent::render();

        $failure = $this->getFailure();
        if ($failure === self::FAILURE_UNAVAILABLE) {
            $this->_sThisTemplate = $this->appWarningNotAvailable;
        } else {
            $config = Registry::getConfig();

            $this->_aViewData["linkToAppStore"] = $config->getConfigParam('linkToAppStore');
            $this->_aViewData["linkToPlayStore"] = $config->getConfigParam('linkToPlayStore');
            $this->_sThisTemplate = $this->appWarningOutdated;
        }

        return $this->_sThisTemplate;
    }

    /**
     * @return string
     */
    private function getFailure(): string
    {
        $failure = Registry::getRequest()->getRequestParameter('failure');
        return $failure === self::FAILURE_UNAVAILABLE ? self::FAILURE_UNAVAILABLE : self::FAILURE_OUTDATED;
    }
}
