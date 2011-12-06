<div class="page-title">
    <h2>Gérer les emprunteurs</h2>
</div>

<table class="bordered-table zebra-striped">
    <thead>
      	<tr>
            <th>#</th>
            <th>Prénom</th>
    		<th>Nom</th>
    	</tr>
    </thead>
	<tbody>

{section name=emprunteurs loop=$listeEmprunteurs}
      	<tr>
            <td>{$listeEmprunteurs[emprunteurs]->numEmprunteur}</td>
            <td>{$listeEmprunteurs[emprunteurs]->prenomEmprunteur}</td>
        	<td>{$listeEmprunteurs[emprunteurs]->nomEmprunteur}</td>
    	</tr>
{/section}

	</tbody>
</table>