<div class="page-title">
    <h2>Consulter les critiques d'un ouvrage</h2><a class="ontitle btn" href="?module=gestlivre&action=voir&id={$livre->numLivre}">← retour à la fiche du livre</a>
</div>

<h3>Critiques rédigées pour l'ouvrage <em>{$livre->titreLivre}</em> de {$livre->prenomAuteur} {$livre->nomAuteur}</h3>

{section name=cr loop=$critiques}
<div class="well">
    <h5>Critique de {$critiques[cr]->identifiantEmprunteur} <span style="float:right";>note attribuée : {$critiques[cr]->noteCritique}/5</span></h5>
        {$critiques[cr]->commentaireCritique}</td>
</div>
{/section}

{include file="paginate.tpl"}
