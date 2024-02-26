[{if $oViewConf->isMobile()}]
    <a href="[{oxgetseourl ident=$oViewConf->getSelfLink()|cat:"cl=applogin&amp;fnc=downloadMedia" params="mediaLink="|cat:$oMediaUrl->getLink()}]">[{$oMediaUrl->oxmediaurls__oxdesc->value}]</a>
[{else}]
    [{$smarty.block.parent}]
[{/if}]