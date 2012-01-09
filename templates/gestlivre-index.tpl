{if $statut == 'emprunteur'}

{include file="gestlivre-index-registered.tpl"}

{elseif $statut == 'gestionnaire'}

{include file="gestlivre-index-admin.tpl"}

{else}

{include file="gestlivre-index-guest.tpl"}

{/if}
