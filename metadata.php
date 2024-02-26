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

use Esyon\AppConnect\Application\Controller\AppLogin;
use Esyon\AppConnect\Application\Controller\ScannerController;
use Esyon\AppConnect\Application\Model\ArticleList as ArticleListExtension;
use Esyon\AppConnect\Core\ViewConfig as ViewConfigExtension;

$sMetadataVersion = '2.1';

$aModule = [
    'id'    => 'esy/appconnect',
    'title' => [
        'de' => 'ESYON App-Verbindung',
        'en' => 'ESYON App-Connect',
    ],
    'description' => [
        'de' => 'Dieses Modul bietet verschiedene Endpunkte für die mobile Anwendung.',
        'en' => 'This module serves different endpoints for the mobile app.',
    ],
    'thumbnail'     => 'out/img/esyon_logo.png',
    'version'       => '1.0.0',
    'author'        => 'ESYON GmbH',
    'url'           => 'https://www.esyon.de',
    'email'         => 'support@esyon.de',
    'extend'        => [
        OxidEsales\Eshop\Application\Model\ArticleList::class => ArticleListExtension::class,
        OxidEsales\Eshop\Core\ViewConfig::class => ViewConfigExtension::class,
    ],
    'controllers' => [
        'appscanner' => ScannerController::class,
        'applogin' => AppLogin::class,
    ],
    'templates' => [],
    'blocks' => [
        [
            'template' => 'layout/base.tpl',
            'block' => 'esy_applogin',
            'file' => 'Application/views/blocks/layout/applogin.tpl'
        ],
        [
            'template' => 'widget/header/inc/scanner.tpl',
            'block' => 'esy_scanner_btn',
            'file' => 'Application/views/blocks/widget/header/esy_scanner_btn.tpl'
        ],
        [
            'template' => 'widget/header/categorylist.tpl',
            'block' => 'esy_app_language_switch',
            'file' => 'Application/views/blocks/widget/header/esy_app_language_switch.tpl'
        ],
        [
            'template' => 'page/details/inc/media.tpl',
            'block' => 'esy_app_article_media_download',
            'file' => 'Application/views/blocks/page/details/inc/esy_app_article_media_download.tpl'
        ]
    ],
    'events' => [],
    'settings' => [
        [
            'group' => 'generalSettings',
            'name' => 'userAgent',
            'type' => 'str',
            'value' => 'oxidApp',
        ],
    ]
];
