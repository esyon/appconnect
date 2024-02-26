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

namespace Esyon\AppConnect\Controller;

use Esyon\AppConnect\Mapper\ArticleMapper;
use Esyon\Services\Http\HTTPService;
use OxidEsales\Eshop\Application\Model\ArticleList;
use OxidEsales\Eshop\Core\Controller\BaseController;

/**
 * Class ScannerController
 * @package Esyon\AppConnect\Controller\ScannerController
 */
class ScannerController extends BaseController
{

    /**
     * @var
     */
    protected $httpService;

    /**
     * Current class name
     *
     * @var string
     */
    protected $_sClassName = 'esyappscanner';

    /**
     * @return void
     */
    public function scanProduct()
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