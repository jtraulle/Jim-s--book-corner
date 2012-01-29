{if $statut == 'emprunteur'}

{include file="navigation-registered.tpl"}

{elseif $statut == 'gestionnaire'}

{include file="navigation-admin.tpl"}

{else}

{include file="navigation-guest.tpl"}

{/if}