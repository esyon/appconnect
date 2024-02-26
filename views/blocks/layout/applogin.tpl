[{if $oViewConf->isAppAccess()}]
    [{oxscript include=$oViewConf->getModuleUrl('esy/appconnect','/out/src/js/app_connect.js') }]
    [{oxscript add="$('.js-app-logout').oxAppConnect({ trigger: 'click', action: 'logout'});"}]
    [{assign var='cookies' value=$oViewConf->getCookies()}]
    [{assign var="token" value=$oViewConf->getUserToken()}]
    [{if $token}]
        [{capture assign=tokenTrigger}]
            $('body').oxAppConnect({ trigger: 'load', action: 'sendToken', token: '[{$token}]', cookies: '[{$cookies}]' });
        [{/capture}]
        [{oxscript add=$tokenTrigger}]
    [{/if}]
[{/if}]

