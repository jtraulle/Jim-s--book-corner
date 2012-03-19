<div class="page-title">
    <h2>Consulter le catalogue</h2><a class="btn ontitle" href="?module=gestauteur">Lister les auteurs</a>
</div>

{if isset($listeLivres)}

{$champ_recherche}

<table class="bordered-table zebra-striped">
    <thead>
        <tr>
            <th style="vertical-align:middle; text-align:center;">#</th>
            <th>Titre</th>
            <th>Auteur</th>
            <th style="vertical-align:middle; text-align:center;">Langue</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
<div id="tab">
{section name=livres loop=$listeLivres}
{$nbDispo = $listeLivres[livres]->nbExemplaireLivre - $listeLivres[livres]->nbEmprunte()}
        <tr>
            <td style="vertical-align:middle; text-align:center;">{$listeLivres[livres]->numLivre}</td>
            <td style="vertical-align:middle;">{$listeLivres[livres]->titreLivre}</td>
            <td style="vertical-align:middle;"><a href="?module=gestauteur&action=voir&id={$listeLivres[livres]->numAuteur}">{$listeLivres[livres]->prenomAuteur} {$listeLivres[livres]->nomAuteur}</a></td>
            <td style="vertical-align:middle; text-align:center;">{if $listeLivres[livres]->langueLivre == "Anglais"}<img src="images/book_eng.png" /> {else}<img src="images/book_fre.png" /> {/if}{$listeLivres[livres]->langueLivre}</td>
            <td style="width:250px;">{if $nbDispo > 0}<img src="images/bullet_green.png" />{else}<img src="images/bullet_red.png" />{/if} {$nbDispo} disponible(s) <a style="margin-left:30px;" href="?module=gestlivre&action=voir&id={$listeLivres[livres]->numLivre}"><img src="images/view.png" /> Voir les détails</a><br />{if $nbDispo > 0}<a href="?module=gestemprunt&action=demande_pret&id={$listeLivres[livres]->numLivre}"><img src="images/book_out.png" /> Demander un prêt</a>{else}<a style="margin-right:8px;" href="?module=gestreservation&action=reserver&id={$listeLivres[livres]->numLivre}"><img src="images/book.png" /> Réserver</a>{/if}
            {if !empty($listeLivres[livres]->nbCritique)}<a style="margin-left:57px;" href="?module=gestcritique&action=voir&id={$listeLivres[livres]->numLivre}"><i class="icon-comment"></i> {$listeLivres[livres]->nbCritique} critique(s)</a>{/if}
            </td>
        </tr>
{/section}
    </tbody>
</table>

{include file="paginate.tpl"}
</div>
{else}

<div class="alert-message block-message info">
  <p style="margin-bottom:10px;"><strong>Aucun livre à afficher</strong></p> <p>Aucun livre n'a encore été ajouté !<br />Vous devriez repasser un peu plus tard ...</p>
</div>

{/if}