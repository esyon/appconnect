<?php

/**
 * This Software is the property of ESYON and is protected by copyright law - it is NOT Freeware.
 * Any unauthorized use of this software without a valid license is a violation of the license agreement and will be
 * prosecuted by civil and criminal law.
 *
 * @copyright      (C) ESYON GmbH
 * @since              Version 1.0
 * @author             Albert Feka <support@esyon.de>
 * @link               https://www.esyon.de
 */

declare(strict_types=1);

namespace Esyon\AppConnect\Core;

use Exception;
use OxidEsales\Eshop\Core\Field;
use OxidEsales\Eshop\Core\Registry;

/**
 * Class ViewConfig
 * @package Esyon\AppConnect\Core
 */
class ViewConfig extends ViewConfig_parent
{
    /**
     * returns user token and stores it to user
     *
     * @return mixed|string
     * @throws Exception
     */
    public function getUserToken(): mixed
    {
        $oUser = $this->getUser();
        if ($oUser === false) {
            return "";
        } else {
            if (empty($oUser->oxuser__esy_apptoken->value) === true) {
                $token = $this->generateUID($oUser->getId());
                $oUser->oxuser__esy_apptoken = new Field($token, Field::T_RAW);
                $oUser->save();
            }

            return $oUser->oxuser__esy_apptoken->value;
        }
    }

    /**
     * generates UID
     *
     * @throws Exception
     */
    private function generateUID($userId): string
    {
        $data = random_bytes(16);
        assert(strlen($data) == 16);
        $data[6] = chr(ord($data[6]) & 0x0f | 0x40);
        $data[8] = chr(ord($data[8]) & 0x3f | 0x80);
        $uid = vsprintf('%s%s-%s-%s-%s-%s%s%s', str_split(bin2hex($data), 4));
        return $uid . '-' . uniqid($userId, true) . '-' . md5(microtime(true) . mt_Rand());
    }

    /**
     * determines app access
     */
    public function isAppAccess(): bool
    {
        $userAgent = $_SERVER['HTTP_USER_AGENT'];
        return $userAgent === Registry::getConfig()->getConfigParam('userAgent');
    }

    /**
     * @return string
     */
    public function getCookies(): string
    {
        $_COOKIE['language'] = Registry::getLang()->getTplLanguage();
        return json_encode($_COOKIE);
    }
}
