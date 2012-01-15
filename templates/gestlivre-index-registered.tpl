<div class="page-title">
    <h2>Gérer les livres</h2><a class="ontitle btn success" href="?module=gestlivre&action=ajouter">+ Ajouter un livre</a><a class="btn ontitle" href="?module=gestauteur">Gérer les auteurs</a>
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
{$nbDispo = $listeLivres[livres]->nbExemplaireLivre - $listeLivres[livres]->nbEmprunte}
        <tr>
            <td style="vertical-align:middle; text-align:center;">{$listeLivres[livres]->numLivre}</td>
            <td style="vertical-align:middle;">{$listeLivres[livres]->titreLivre}</td>
            <td style="vertical-align:middle;"><a href="?module=gestauteur&action=voir&id={$listeLivres[livres]->numAuteur}">{$listeLivres[livres]->prenomAuteur} {$listeLivres[livres]->nomAuteur}</a></td>
            <td style="vertical-align:middle; text-align:center;">{if $listeLivres[livres]->langueLivre == "Anglais"}<img src="images/book_eng.png" /> {else}<img src="images/book_fre.png" /> {/if}{$listeLivres[livres]->langueLivre}</td>
            <td style="width:250px;">{if $nbDispo > 0}<img src="images/bullet_green.png" />{else}<img src="images/bullet_red.png" />{/if} {$nbDispo} disponible(s) <a style="margin-left:40px;" href="?module=gestlivre&action=modifier&id={$listeLivres[livres]->numLivre}"><img src="images/book_edit.png" /> Voir/Modifier</a><br />{if $nbDispo > 0}<a href="?module=gestlivre&action=emprunter&id={$listeLivres[livres]->numLivre}"><img src="images/book_out.png" /> Emprunter</a>{else}<a style="margin-right:8px;" href="?module=gestemprunt&action=reserver&id={$listeLivres[livres]->numLivre}"><img src="images/book.png" /> Réserver</a>{/if}
            <a style="margin-left:65px;" class="suppr" href="?module=gestlivre&action=supprimer&id={$listeLivres[livres]->numLivre}"><img src="images/book_delete.png" /> Supprimer</a>
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