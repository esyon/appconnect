[{if $oViewConf->isAppAccess()}]
    <div class="input-group-append">
        <button class="btn btn-outline-secondary" type="button" id="scanner" title="scanner"><i class="fa-scanner"></i></button>
        [{oxscript add="$('button#scanner').oxAppConnect({ trigger: 'click', action: 'scan'});"}]
    </div>
[{/if}]