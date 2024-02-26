[{assign var="oConfig" value=$oViewConf->getConfig()}]
<div class="header">
    <div class="container">
        <div class="header-box">
            <div class="container">
                <div class="row justify-content-lg-between align-items-lg-center">
                    <div class="col col-sm-4 logo">
                        [{assign var="slogoImg" value=$oViewConf->getViewThemeParam('sLogoFile')}]
                        [{assign var="sLogoWidth" value=$oViewConf->getViewThemeParam('sLogoWidth')}]
                        [{assign var="sLogoHeight" value=$oViewConf->getViewThemeParam('sLogoHeight')}]
                        <span class="d-md-none logo-link logo-link-mobile">
                            <svg version="1.1" id="Ebene_1" xmlns="http://www.w3.org/2000/svg"
                                 xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                                 viewBox="0 0 98 70" style="enable-background:new 0 0 98 70;"
                                 xml:space="preserve">
                                <style type="text/css">
                                    .of-orange {
                                        fill: #FF6600;
                                    }
                                </style>
                                <path class="of-orange" d="M97.6,14.4V0.1H66.2c-11.1,0-16.7,5-17.4,14.5v36c0,2.9-1.8,5.5-4.1,5.4H18.6c-2.3,0.1-4.1-2.6-4.1-5.4v-31
                                    c0-2.8,1.8-5.3,4.1-5.2h21.8c1-8.5,5.9-13.3,15.1-14.3h-38C6.5,0.1,0.8,7.9,0.1,17v35.7C0.8,62.3,6.5,70,17.5,70h28
                                    c11.1,0,16.7-7.8,17.4-17.2V41.3h27.6V27.4H63v-7.7c0-2.9,1.8-5.5,4.1-5.4L97.6,14.4"/>
                            </svg>
                        </span>
                        <span class="d-none d-md-block logo-link">
                            <svg version="1.1" id="Ebene_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                                 viewBox="0 0 702 77.2" style="enable-background:new 0 0 702 77.2;" xml:space="preserve">
                                <style type="text/css">
                                    .st0{fill:#6A7078;}
                                    .st1{fill:#FF6600;}
                                </style>
                                <g>
                                    <path class="st0" d="M682.9,25.6c0,3-2.5,4.6-5,4.6h-28.5c-1.1,0-1.9-0.7-1.9-1.8V18.3c0-1.4,0.5-2.5,2-2.6h29.1
            c2.9,0,4.4,2.3,4.4,4.4V25.6z M699.1,21.1C699.3,8.8,691.9,0,678.5,0H631l-0.1,77.2h16.5V48.5c-0.3-2,0.7-3.2,2-3.1l17.7,0
            c1.1,0.1,1.4,0.6,2.3,2.4l14.2,29.4H702l-17-34.3l-0.4,0l2.5-0.8C698.4,38.1,699.3,30.2,699.1,21.1"/>
                                    <path class="st0" d="M74,0h63.1v15.7h-19.9c-1.2,0-1.9,1.2-1.9,2.3v59.3H98.8V18c0-1.4-1-2.4-2-2.4H74V0z"/>
                                    <path class="st0" d="M142.7,0h62.9v15.7h-22.5c-1.2,0-1.9,1-1.9,2.1v59.4h-16.4V17.5c0-1.2-0.4-1.8-1.6-1.8h-20.5V0z"/>
                                    <path class="st0" d="M54.1,57.4c0,2.5-1.9,4.2-4.5,4.2H20.3c-2.6,0-4.5-1.8-4.5-4.2V20.6c0-2.6,2-5.1,4.6-5h28.9
            c2.6-0.1,4.6,2.4,4.6,5V57.4z M69.9,61.6V16C69.1,7.4,62.8,0,50.5,0H19.4C7.1,0,0.8,7.4,0,16v45.6c0,8.2,7.1,15.6,15.8,15.6h38.2
            C62.8,77.2,69.9,69.8,69.9,61.6"/>
                                    <path class="st1" d="M317.1,15.7V0h-34.6c-12.2,0-18.4,5.5-19.3,16l-0.1,39.7c0,3.2-2,6.2-4.5,6h-28.8c-2.6,0.2-4.6-2.8-4.6-6V21.5
            c0-3.1,2-5.9,4.6-5.8l24.1,0c1-9.4,6.5-14.6,16.7-15.7l-41.9,0c-12.2,0-18.5,8.6-19.3,18.7v39.5c0.8,10.5,7.1,19,19.3,19h30.9
            c12.2,0,18.5-8.5,19.3-19V45.4h30.4V30.2h-30.4v-8.5c0-3.2,2-6.2,4.6-6H317.1"/>
                                    <path class="st0" d="M437.3,0h42.6v15.7h-39.7c-3.8,0-4.9,1.4-4.9,4v38c0,2.5,1.9,4,4.4,4h40.2v15.5h-44.6
            c-8.9,0-16.5-5.9-16.5-18.6V18.2C418.7,8.4,426.9,0,437.3,0"/>
                                    <rect x="323.9" y="0" class="st0" width="16.8" height="77.2"/>
                                    <path class="st0" d="M410.4,0h-45.8c-10.7,0-18,5.2-18,19.1v12c0,9.4,6.7,14.2,13.7,14.2h31.3c3.1,0.1,4.1,2.1,4.1,4.6v5.7
            c0,2.7-1.5,5.8-4.5,5.8h-42.8v15.5h47c6.1,0,11.5-2.7,14.1-7.4c2.2-3.7,3-7.3,3-13.1v-9.3c0-5.6-2.6-10.8-6-13.6
            c-3.7-2.9-7.2-3.6-14.1-3.6h-24.6c-3.4,0-5.1-1.3-5.1-4.7v-4.6c0-3.3,1.2-5.3,4.6-5.3h43.1V0z"/>
                                    <path class="st0" d="M540,77.2V47.8c0-1.5-0.8-2.4-2.5-2.4h-31.4c-1.5,0-2.2,0.9-2.2,2.3v29.5h-17.3V0H504v27.7
            c0,1.6,1.1,2.5,2.6,2.5h30.9c1.8,0,2.5-1,2.5-3.2V0h16.2v77.2H540z"/>
                                    <path class="st0" d="M563.6,77.2V0h60.9v15.7h-42.2c-1.5,0.1-2.3,1-2.3,2.5v10.1c0,1.5,0.8,2,2.2,2h34.6v15.2h-34.3
            c-1.4,0-2.5,0.9-2.5,2.4v11.8c0,1.5,0.7,2,1.9,2h42.6v15.5H563.6z"/>
                                </g>
                            </svg>
                        </span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="container">
    [{oxifcontent ident="appOutdated" object="oCont"}]
        [{$oCont->oxcontents__oxcontent->value}]
    [{/oxifcontent}]
</div>

[{include file="layout/base.tpl"}]
