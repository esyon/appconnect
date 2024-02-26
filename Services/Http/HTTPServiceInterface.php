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

use stdClass;

/**
 * @package Esyon\Services\Http;
 * Interface HTTPServiceInterface
 */
interface HTTPServiceInterface
{
    /**
     * Get request headers.
     *
     * @param string $header
     * @return string|null
     */
    public function getRequestHeaders(string $header): ?string;

    /**
     * Get post data.
     *
     * @return array|bool|null
     */
    public function getPostData(): array|bool|null;

    /**
     * Get request data.
     *
     * @param string $param
     * @param null $defaultValue
     * @return mixed
     */
    public function getRequestData(string $param, $defaultValue = null): mixed;

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
    ): void;
}
