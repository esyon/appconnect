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

namespace Esyon\AppConnect\Application\Controller;

use Exception;
use OxidEsales\Eshop\Application\Controller\FrontendController;
use OxidEsales\Eshop\Application\Model\User;
use OxidEsales\Eshop\Core\Registry;
use OxidEsales\EshopCommunity\Internal\Container\ContainerFactory;
use OxidEsales\EshopCommunity\Internal\Framework\Database\QueryBuilderFactoryInterface;
use Psr\Container\ContainerExceptionInterface;
use Psr\Container\NotFoundExceptionInterface;

/**
 * @package Esyon\AppConnect\Application\Controller
 * Class AppConnect
 */
class AppLogin extends FrontendController
{
    /**
     * Handle user login abort.
     */
    private function abortLogin(bool $deleteToken = false): void
    {
        if ($deleteToken === true) {
            echo "<script type=\"text/javascript\">
                    let message = JSON.stringify({action: 'logout', payload: {}})
                    if(window.ReactNativeWebView) {
                        window.ReactNativeWebView.postMessage(message);
                        true;
                    }
                </script>";
            Registry::getUtils()->showMessageAndExit("");
        }

        Registry::getUtils()->redirect(Registry::getConfig()->getShopHomeURL() . 'cl=start', false);
    }

    /**
     * Interactive user login.
     *
     * @return string|null
     *
     * @throws NotFoundExceptionInterface
     * @throws ContainerExceptionInterface
     * @throws Exception
     */
    public function interactiveLogin(): string|null
    {
        $oUser = $this->getUser();

        // abort interactive login if user is set already
        if ($oUser !== false) {
            Registry::getUtils()->redirect(
                Registry::getConfig()->getShopHomeURL() . 'cl=start',
                false
            );
        }

        $token = Registry::getRequest()->getRequestParameter("token");

        if (empty($token) === true) {
            $this->abortLogin();
        }

        // find user by token
        $container = ContainerFactory::getInstance()->getContainer();
        $queryBuilderFactory = $container->get(QueryBuilderFactoryInterface::class);
        $queryBuilder = $queryBuilderFactory->create();

        $queryBuilder
            ->select('oxid')
            ->from('oxuser')
            ->where('esy_apptoken = :token')
            ->setParameters([
                'token' => $token
            ]);

        $userId = $queryBuilder->execute()->fetch();

        if ($userId === false) {
            $this->abortLogin(true);
        }

        $userLoggedIn = $this->loadUser($userId['oxid']);
        if ($userLoggedIn !== true) {
            $this->abortLogin(true);
        }

        return 'start';
    }

    /**
     * Load user by id.
     *
     * @param string $userId
     *
     * @return bool
     */
    private function loadUser(string $userId): bool
    {
        $user = oxNew(User::class);
        if ($user->load($userId) === false) {
            return false;
        }

        $this->setUser($user);
        Registry::getSession()->setVariable('usr', $userId);
        $oSession = Registry::getSession();

        if ($oBasket = $oSession->getBasket()) {
            $oBasket->load();
            $oBasket->onUpdate();
        }

        $oSession->regenerateSessionId();
        $sessionId = $oSession->getId();
        $oSession->setVariable('usr', $userId);

        Registry::getUtilsServer()->setOxCookie('sid', $sessionId);
        Registry::getConfig()->setConfigParam('blSessionUseCookies', true);

        return true;
    }

    /**
     * Download media files in App.
     *
     * @return void
     */
    public function downloadMedia(): void
    {
        $mediaLink = Registry::getRequest()->getRequestParameter('mediaLink');
        $file = ltrim(parse_url($mediaLink, PHP_URL_PATH), '/');

        if (file_exists($file)) {
            header('Content-Description: File Transfer');
            header('Content-Type: application/pdf');
            header('filename: Oxid_' . basename($mediaLink));
            header('Content-Disposition: attachment; filename="Oxid_' . basename($mediaLink) . '"');
            readfile($file);

            exit();
        }
    }
}
