<div class="page-title">
    <h2>Mes critiques</h2><a class="ontitle btn" href="?module=gestemprunteur&action=moncompte">← mon compte lecteur</a>
</div>

{section name=cr loop=$critiques}
<div class="well">
    <h5>Critique sur <em>{$critiques[cr]->infosLivre->titreLivre}</em> de {$critiques[cr]->infosLivre->prenomAuteur} {$critiques[cr]->infosLivre->nomAuteur}<span style="float:right";>note attribuée : {$critiques[cr]->noteCritique}/5</span></h5>
        <div style="text-align:right; padding-bottom:10px;"><a href="?module=gestcritique&action=rediger_critique&idlivre={$critiques[cr]->infosLivre->numLivre}" class="btn btn-mini"><i class="icon-pencil"></i> Modifier</a> <a href="" class="btn btn-danger btn-mini"><i class="icon-remove"></i> Supprimer</a></div>
<p>{$critiques[cr]->commentaireCritique}</p>
</div>
{/section}

{include file="paginate.tpl"}
