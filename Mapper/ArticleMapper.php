<?php

/*
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

namespace Esyon\AppConnect\Mapper;

use OxidEsales\Eshop\Application\Model\ArticleList;

/**
 * Class ArticleMapper
 * @package Esyon\AppConnect\Mapper
 */
class ArticleMapper
{
    /**
     * Transforms ArticleList to array.
     *
     * @param ArticleList $articleList
     * @return array
     */
    public static function map(ArticleList $articleList): array
    {
        $mappedArticles = [];

        foreach ($articleList as $article) {
            $mappedArticles[] = [
                'title' => $article->oxarticles__oxtitle->value,
                'url' => htmlspecialchars_decode($article->getLink()),
                'icon' => $article->getIconUrl(),
                'articleNumber' => $article->oxarticles__oxartnum->value,
                'ean' => $article->oxarticles__oxean->value
            ];
        }

        return $mappedArticles;
    }
}
