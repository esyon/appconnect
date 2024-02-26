[{if $oViewConf->isAppAccess()}]
    [{foreach from=$oxcmp_lang item=_lng}]
        [{capture assign=switchLanguage}]
            $('a.js-lang-switch.lang-[{$_lng->abbr}]').oxAppConnect({ trigger: 'click', action: 'switchLanguage', language: [{$_lng->id}] });
        [{/capture}]
        [{oxscript add=$switchLanguage}]
    [{/foreach}]
[{/if}]