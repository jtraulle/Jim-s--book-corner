<div class="page-title">
    <h2>Consulter un auteur</h2> {if $statut == 'gestionnaire'}<a class="ontitle btn" href="?module=gestauteur&action=modifier&id={$numAuteur}"><img style="vertical-align:top;" src="images/user_edit.png" /> Modifier cet auteur</a>{/if} <a class="ontitle btn" href="?module=gestauteur">← retour à la gestion des auteurs</a>
</div>

<p>Nom : {$nomAuteur}</p>
<p>Prénom : {$prenomAuteur}</p>


<blockquote id="infosAuteur" style="margin-top:30px; margin-bottom:50px;"><p><img src="images/loading.gif" /> Tentative de récupération d'informations sur l'auteur depuis Wikipédia ...</p></blockquote>

<div class="page-title">
    <h2>Livres rédigés par cet auteur possédés</h2>
</div>

{if isset($listeParAuteur)}

<table class="condensed-table zebra-striped">
    <thead>
      	<tr>
            <th>Titre</th>
            <th>Langue</th>
            <th>Actions</th>
    	</tr>
    </thead>
	<tbody>

{section name=auteurs loop=$listeParAuteur}
      	<tr>
            <td>{$listeParAuteur[auteurs]->titreLivre}</td>
            <td>{if $listeParAuteur[auteurs]->langueLivre == "Anglais"}<img src="images/book_eng.png" /> {else}<img src="images/book_fre.png" /> {/if}{$listeParAuteur[auteurs]->langueLivre}</td>
        	<td><a href="?module=gestlivre&action=voir&id={$listeParAuteur[auteurs]->numLivre}"><i class="icon-eye-open"></i> Consulter la fiche</a></td>
    	</tr>
{/section}
	</tbody>
</table>

{else}

<div class="alert-message block-message info">
  <p style="margin-bottom:10px;"><strong>Aucun livre possédé pour cet auteur</strong></p> <p>Nous ne possédons actuellement aucun livre rédigé par cet auteur.<br />Pourquoi ne consulteriez vous pas un autre auteur ?</p>
  <div class="alert-actions">
    <a class="btn small" href="?module=gestauteur">Parcourir les auteurs</a>
  </div>
</div>

{/if}
