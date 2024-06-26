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

namespace Esyon\AppConnect\Application\Model;

/**
 * @package Esyon\AppConnect\Model
 * Class ArticleList
 */
class ArticleList extends ArticleList_parent
{
    /**
     * Loads articles by EAN number.
     *
     * @param string $ean
     *
     * @return void
     */
    public function loadArticlesByEan(string $ean): void
    {
        $this->selectString(
            "SELECT * FROM {$this->getBaseObject()->getViewName()} WHERE `oxean` = :oxean OR `oxartnum` = :oxean",
            ['oxean' => $ean]
        );
    }
}
