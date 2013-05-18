<div class="page-title">
    <h2>Merci à nos généreux donateurs</h2>
</div>

<p>Que les donateurs dont les noms suivent (amis, collègues, lecteurs du Courrier Picard, étudiants, …) soient vivement remerciés pour leurs ouvrages qui viennent compléter (ce n’est qu’un début) la collection de Jim et de Christiane.</p>

<ul>
    {section name=don loop=$donateurs}
        <li>{$donateurs[don]->prenomEmprunteur} {$donateurs[don]->nomEmprunteur}</li>
    {/section}
</ul>
