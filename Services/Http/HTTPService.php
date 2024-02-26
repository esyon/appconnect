<?php

/**
 * This Software is the property of ESYON and is protected by copyright law - it is NOT Freeware.
 * Any unauthorized use of this software without a valid license is a violation of the license agreement and will be
 * prosecuted by civil and criminal law.
 *
 * @copyright ESYON GmbH
 * @since     Version 1.0
 * @author    Alexander Hirschfeld <support@esyon.de>
 * @link      https://www.esyon.de
 */

declare(strict_types=1);

namespace Esyon\AppConnect\Services\Http;

use OxidEsales\Eshop\Core\Registry;
use OxidEsales\Eshop\Core\Request;
use stdClass;

/**
 * @package Esyon\Services\Http;
 * Class HTTPService
 */
class HTTPService implements HTTPServiceInterface
{
    /**
     * Get request headers.
     *
     * @param string $header
     * @return string|null
     */
    public function getRequestHeaders(string $header): ?string
    {
        return $_SERVER[$header] ?? null;
    }

    /**
     * Get post data.
     *
     * @return array|bool|null
     */
    public function getPostData(): array|bool|null
    {
        return json_decode(file_get_contents('php://input'), true);
    }

    /**
     * Get request data.
     *
     * @param string $param
     * @param null $defaultValue
     * @return mixed
     */
    public function getRequestData(string $param, $defaultValue = null): mixed
    {
        return Registry::get(Request::class)->getRequestParameter($param, $defaultValue);
    }

    /**
     * Send response.
     *
     * @param array|string|stdClass|null $response
     * @param int $statusCode
     * @param bool $noCache
     */
    public function send(
        array | string | null | stdClass $response = null,
        int $statusCode = 200,
        bool $noCache = false
    ): void {
        $utils = Registry::getUtils();
        $utils->setHeader('Content-Type: application/json');

        if ($noCache === true) {
            $utils->setHeader('Cache-Control: no-cache, no-store, must-revalidate');
            $utils->setHeader('Pragma: no-cache');
            $utils->setHeader('Expires: 0');
        }

        if (is_null($response) === true && $statusCode === 200) {
            $statusCode = 204;
        }

        http_response_code($statusCode);

        $response = json_encode($response ?? []);
        $utils->showMessageAndExit($response);
    }
}
