<?php

/*
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

namespace Esyon\AppConnect\Application\Controller;

use Esyon\AppConnect\Mapper\ArticleMapper;
use Esyon\AppConnect\Services\Http\HTTPService;
use Esyon\AppConnect\Services\Http\HTTPServiceInterface;
use OxidEsales\Eshop\Application\Model\ArticleList;
use OxidEsales\Eshop\Core\Controller\BaseController;

/**
 * @package Esyon\AppConnect\Controller\ScannerController
 * Class ScannerController
 */
class ScannerController extends BaseController
{
    /**
     * HTTPServiceInterface
     */
    protected HTTPServiceInterface $httpService;

    /**
     * Current class name
     *
     * @var string
     */
    protected string $_sClassName = 'esyappscanner'; // phpcs:ignore PSR2.Classes.PropertyDeclaration

    /**
     * @return void
     */
    public function scanProduct(): void
    {
        $ean = $this->getHttpSevice()->getRequestData('ean');
        $articleList = oxNew(ArticleList::class);
        $articleList->loadArticlesByEan($ean);

        $mappedArticles = ArticleMapper::map($articleList);

        $this->getHttpSevice()->send(['status' => count($mappedArticles) > 0, 'articles' => $mappedArticles]);
    }

    /**
     * @return HTTPService
     */
    protected function getHttpSevice(): HTTPService
    {
        if (empty($this->httpService) === true) {
            $this->httpService = new HTTPService();
        }

        return $this->httpService;
    }
}
