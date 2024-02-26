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

declare(strict_types=1);

namespace Esyon\AppConnect\Core;

use OxidEsales\Eshop\Core\Registry;

/**
 * Class ShopControl
 * @package Esyon\AppConnect\Core
 */
class ShopControl extends ShopControl_parent
{
    /**
     * start
     *
     * @param  mixed $sClass
     * @param  mixed $sFunction
     * @param  mixed $aParams
     * @param  mixed $aViewsChain
     * @return void
     */
    public function start($sClass = null, $sFunction = null, $aParams = null, $aViewsChain = null)
    {
        if ($this->isLegacyApp() === true && $this->isAdmin() === false) {
            if ($this->isAppLive() === true) {
                $sUrl = Registry::getConfig()->getShopHomeUrl() . 'cl=appfailure&failure=outdated';
            } else {
                $sUrl = Registry::getConfig()->getShopHomeUrl() . 'cl=appfailure&failure=unavailable';
            }

            Registry::getUtils()->redirect($sUrl);
        }

        parent::start($sClass, $sFunction, $aParams, $aParams, $aViewsChain);
    }

    /**
     * @return bool
     */
    private function isLegacyApp(): bool
    {
        $requestMethod = $_SERVER['REQUEST_METHOD'];
        $isLegacyAppLogin = Registry::getRequest()->getRequestParameter('is_app') === '1';
        return $requestMethod === 'POST' && $isLegacyAppLogin === true;
    }

    /**
     * @return bool
     */
    private function isAppLive(): bool
    {
        return (bool) Registry::getConfig()->getConfigParam('appIsLive');
    }
}
