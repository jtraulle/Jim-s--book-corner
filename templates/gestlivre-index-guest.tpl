<div class="page-title">
	<h2>Consulter le catalogue</h2>
    <a class="btn ontitle" href="?module=gestgenre"><i class="icon-tags"></i> Parcourir les genres</a>
    <a class="btn ontitle" href="?module=gestauteur"><i class="icon-user"></i> Parcourir les auteurs</a>
</div>

{if isset($listeLivres)}

{$champ_recherche}

<ul class="tabs auteurs">
    <li {if $lettre == 'noletter'}class="active"{/if}><a href="?module=gestlivre">&infin;</a></li>
    <li {if $lettre == 'a'}class="active"{/if}><a href="?module=gestlivre&lettre=a">A</a></li>
    <li {if $lettre == 'b'}class="active"{/if}><a href="?module=gestlivre&lettre=b">B</a></li>
    <li {if $lettre == 'c'}class="active"{/if}><a href="?module=gestlivre&lettre=c">C</a></li>
    <li {if $lettre == 'd'}class="active"{/if}><a href="?module=gestlivre&lettre=d">D</a></li>
    <li {if $lettre == 'e'}class="active"{/if}><a href="?module=gestlivre&lettre=e">E</a></li>
    <li {if $lettre == 'f'}class="active"{/if}><a href="?module=gestlivre&lettre=f">F</a></li>
    <li {if $lettre == 'g'}class="active"{/if}><a href="?module=gestlivre&lettre=g">G</a></li>
    <li {if $lettre == 'h'}class="active"{/if}><a href="?module=gestlivre&lettre=h">H</a></li>
    <li {if $lettre == 'i'}class="active"{/if}><a href="?module=gestlivre&lettre=i">I</a></li>
    <li {if $lettre == 'j'}class="active"{/if}><a href="?module=gestlivre&lettre=j">J</a></li>
    <li {if $lettre == 'k'}class="active"{/if}><a href="?module=gestlivre&lettre=k">K</a></li>
    <li {if $lettre == 'l'}class="active"{/if}><a href="?module=gestlivre&lettre=l">L</a></li>
    <li {if $lettre == 'm'}class="active"{/if}><a href="?module=gestlivre&lettre=m">M</a></li>
    <li {if $lettre == 'n'}class="active"{/if}><a href="?module=gestlivre&lettre=n">N</a></li>
    <li {if $lettre == 'o'}class="active"{/if}><a href="?module=gestlivre&lettre=o">O</a></li>
    <li {if $lettre == 'p'}class="active"{/if}><a href="?module=gestlivre&lettre=p">P</a></li>
    <li {if $lettre == 'q'}class="active"{/if}><a href="?module=gestlivre&lettre=q">Q</a></li>
    <li {if $lettre == 'r'}class="active"{/if}><a href="?module=gestlivre&lettre=r">R</a></li>
    <li {if $lettre == 's'}class="active"{/if}><a href="?module=gestlivre&lettre=s">S</a></li>
    <li {if $lettre == 't'}class="active"{/if}><a href="?module=gestlivre&lettre=t">T</a></li>
    <li {if $lettre == 'u'}class="active"{/if}><a href="?module=gestlivre&lettre=u">U</a></li>
    <li {if $lettre == 'v'}class="active"{/if}><a href="?module=gestlivre&lettre=v">V</a></li>
    <li {if $lettre == 'w'}class="active"{/if}><a href="?module=gestlivre&lettre=w">W</a></li>
    <li {if $lettre == 'x'}class="active"{/if}><a href="?module=gestlivre&lettre=x">X</a></li>
    <li {if $lettre == 'y'}class="active"{/if}><a href="?module=gestlivre&lettre=y">Y</a></li>
    <li {if $lettre == 'z'}class="active"{/if}><a href="?module=gestlivre&lettre=z">Z</a></li>
</ul>

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
            <td style="width:250px;">{if $nbDispo > 0}<img src="images/bullet_green.png" />{else}<img src="images/bullet_red.png" />{/if} {$nbDispo} disponible(s) <a style="margin-left:40px;" href="?module=gestlivre&action=voir&id={$listeLivres[livres]->numLivre}"><img src="images/view.png" /> Voir</a>
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
