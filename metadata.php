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


use OxidEsales\Eshop\Core\ShopControl;

$sMetadataVersion = '2.1';

$sStyles = '<style>.esy-img {display:none;} .listitemfloating .esy-img {display: block; position: absolute; top: -5px; left: -8px; height: 20px; margin: 2px;} .listitemfloating span {padding-left: 25px;} </style>';

$aModule = [
    'id'    => 'esy/appconnect',
    'title' => [
        'de' => $sStyles . '<span style="position: relative;"><img class="esy-img" src="../modules/esy/appconnect/out/img/module.png" alt="ESYON App-Verbindung" title="ESYON App-Verbindung">ESYON App-Verbindung</span>',
        'en' => $sStyles . '<span style="position: relative;"><img class="esy-img" src="../modules/esy/appconnect/out/img/module.png" alt="ESYON App-Connect" title="ESYON App-Connect">ESYON App-Connect</span>',
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
        OxidEsales\Eshop\Application\Model\ArticleList::class => Esyon\AppConnect\Model\ArticleList::class,
        OxidEsales\Eshop\Core\ViewConfig::class => Esyon\AppConnect\Core\ViewConfig::class,
        ShopControl::class => Esyon\AppConnect\Core\ShopControl::class
    ],
    'controllers' => [
        'appscanner' => Esyon\AppConnect\Controller\ScannerController::class,
        'applogin' => Esyon\AppConnect\Application\Controller\AppLogin::class,
        'appfailure' => Esyon\AppConnect\Application\Controller\AppFailure::class,
    ],
    'templates' => [
        'app_warning_not_available.tpl' => 'esy/appconnect/views/tpl/custom/app_warning_not_available.tpl',
        'app_warning_outdated.tpl' => 'esy/appconnect/views/tpl/custom/app_warning_outdated.tpl'
    ],
    'blocks' => [
        [
            'template' => 'layout/base.tpl',
            'block' => 'esy_applogin',
            'file' => 'views/blocks/layout/applogin.tpl'
        ],
        [
            'template' => 'widget/header/inc/scanner.tpl',
            'block' => 'esy_scanner_btn',
            'file' => 'views/blocks/widget/header/esy_scanner_btn.tpl'
        ],
        [
            'template' => 'widget/header/categorylist.tpl',
            'block' => 'esy_app_language_switch',
            'file' => 'views/blocks/widget/header/esy_app_language_switch.tpl'
        ],
        [
            'template' => 'page/details/inc/media.tpl',
            'block' => 'esy_app_article_media_download',
            'file' => 'views/blocks/page/details/inc/esy_app_article_media_download.tpl'
        ]
    ],
    'events' => [],
    'settings' => [
        [
            'group' => 'generalSettings',
            'name' => 'appIsLive',
            'type' => 'bool',
            'value' => false,
        ],
        [
            'group' => 'generalSettings',
            'name' => 'linkToAppStore',
            'type' => 'str',
            'value' => '',
        ],
        [
            'group' => 'generalSettings',
            'name' => 'linkToPlayStore',
            'type' => 'str',
            'value' => '',
        ],
        [
            'group' => 'generalSettings',
            'name' => 'userAgent',
            'type' => 'str',
            'value' => 'oxidApp',
        ],
    ]
];
