<?php
$this->Html->css('simpleLightbox.min', ['block' => 'css']);
$this->Html->script('simpleLightbox.min', ['block' => 'script']);
$this->append('script'); ?>
<script type="text/javascript">
    new SimpleLightbox({elements: '.imageGallery1 a'});
    console.log('trest');
</script>
<?php $this->end(); ?>

<div class="page-title w-100">
    <h2><?= __('About Jim and Christiane Mc Crate'); ?></h2>
    <a class="ontitle btn btn-light btn-outline-secondary" href="/pages/manuscript"><i class="fas fa-fw fa-pen-fancy"></i> <?= __('See manuscript'); ?></a>
    <a class="ontitle btn btn-light btn-outline-secondary" href="/testimonies"><i class="fas fa-fw fa-envelope"></i> <?= __('Readers testimonies'); ?></a>
</div>

<div class="col-9">
    <div class="card card-body bg-light" style ="display:inline-block;">

        <p class="manuscrit">Je me souviens de Jim et Christiane Mc Crate,
            <br />oui je me souviens d’eux.</p>

        <p class="manuscrit">Jims était un homme élégant, classe dans tous les sens du terme, raffiné, discret, attentionné, ne sachant que faire pour rendre service, faire plaisir. Il savait être à l’écoute.</p>

        <p class="manuscrit">C’était un merveilleux ami.</p>

        <p class="manuscrit">A la faculté, dans l’exercice de ses fonctions d’enseignant, il savait, avec courtoisie, avec rigueur dispenser ses connaissances de manière à inciter ses étudiants à améliorer leur niveau. C’était un homme très cultivé.</p>

        <p class="manuscrit">Un érudit.</p>

        <p class="manuscrit">Il avait son jardin secret dans lequel il aimait se réfugier. Dans ce jardin des partitions, il aimait la musique, des romans, des poèmes, des essais, il aimait la littérature, des tableaux, il aimait l’art. N’a-t-il pas fait sa thèse sur le symbolisme de G. Moreau.</p>

        <p class="manuscrit">C’était un homme de lettres, un passionné d’art.</p>

        <p class="manuscrit">C’était un esthète. un homme de grande culture qui parlait de tout cela avec simplicité provoquant l’admiration de ses amis.</p>

        <p class="manuscrit">C’était un mari très attentionné qui chaque samedi revenait avec un bouquet de roses pour Christiane.</p>

        <p class="manuscrit">Home, sweet home.</p>

        <p class="manuscrit">Un papa qui se promenait avec joie avec Elise, qu’il tenait par la main avec amour et fierté.</p>

        <p class="manuscrit">Un grand-père très heureux en compagnie de Tom - la joie de sa fin de vie -</p>

        <p class="manuscrit">Christiane Elise Tom ses amours et Vincent.</p>

        <p class="manuscrit">He was a real gentleman jusqu’au bout.</p>

        <p class="manuscrit">Christiane, Jim,<br />
            Jim, Christiane,<br />
            une belle histoire à laquelle la maladie a douloureusement mis fin.</p>

        <p class="manuscrit">Christiane au beau sourire que j’ai surtout connue lorsqu’elle a été malade.</p>

        <p class="manuscrit">Une femme chaleureuse très courageuse qui savait que l’issue serait fatale mais qui faisait comme si …</p>

        <p class="manuscrit">La force d’âme pour arriver à cela !! Elle puisait dans l’amour de Jim, d’Elise cette force pour continuer à vivre comme avant.</p>

        <p class="manuscrit">Elle fut une enseignante très attachante. Elle était dynamique.</p>

        <p class="manuscrit">Elle aimait tout comme Jim l’art et je me souviens du dernier voyage à Florence, elle voulait aller au Musée des Offices, il y avait très tôt le matin, une longue file d’attente, un car de Japonais. Ils avaient tous leurs billets. Ils nous ont laissés passer.</p>

        <p class="manuscrit">Quand je regarde l’Annonciation de L. De Vinci, j’ai les larmes aux yeux - Christiane et moi étions éblouies devant ce tableau - Elle savait que ce serait son dernier voyage.</p>

        <p class="manuscrit">Elle aimait l’humour, la joie, l’amitié. Elle rayonnait une admiration sans bornes pour ce couple fusionnel.</p>

        <p class="manuscrit">de Liliane Brown, ancienne professeur d'anglais à l'IUT d'Amiens.</p>

    </div>
</div>
<div class="col-3 h-100">
    <div class="imageGallery1">
        <a href="/img/jim1.jpg"><img class="mb-4 w-100" alt="Gallery image 1" src="/img/jim1.jpg" /></a>
        <a href="/img/jim2.jpg"><img class="mb-4 w-100" src="/img/jim2.jpg" /></a>
        <a href="/img/jim3.jpg"><img class="mb-4 w-100" src="/img/jim3.jpg" /></a>

        <div class="manuscrit mt-5" style="text-align: left; text-indent: unset;">Quelques tableaux peints par Jim</div>
        <a href="/img/tableau1.png"><img class="mb-4 w-100" src="/img/tableau1.png" /></a>
        <a href="/img/tableau2.png"><img class="mb-4 w-100" src="/img/tableau2.png" /></a>
        <a href="/img/tableau3.png"><img class="mb-4 w-100" src="/img/tableau3.png" /></a>
    </div>
    <div style ="text-align: center;"><img class="mb-4 w-75 mt-5" src="/img/christiane.png" /></div>
</div>

<div id="zoom" style="position: absolute; top: 304px; left: 721px; width: 1px; height: 1px; display: none; ">
    <table id="zoom_table" style="border-collapse:collapse; width:100%; height:100%;">
        <tbody>
        <tr>
            <td class="tl" style="border-top:0px; background:url(/img/tl.png) 0 0 no-repeat; width:20px; height:20px; overflow:hidden;"></td>
            <td class="tm" style="border-top:0px; background:url(/img/tm.png) 0 0 repeat-x; height:20px; overflow:hidden;"></td>
            <td class="tr" style="border-top:0px; background:url(/img/tr.png) 100% 0 no-repeat; width:20px; height:20px; overflow:hidden;"></td>
        </tr>
        <tr>
            <td class="ml" style="border-top:0px; background:url(/img/ml.png) 0 0 repeat-y; width:20px; overflow:hidden;"></td>
            <td class="mm" style="border-top:0px; background:#fff; vertical-align:top; padding:10px; padding-top:25px;"><div id="zoom_content"></div></td>
            <td class="mr" style="border-top:0px; background:url(/img/mr.png) 100% 0 repeat-y;  width:20px; overflow:hidden;"></td>
        </tr>
        <tr>
            <td class="bl" style="border-top:0px; background:url(/img/bl.png) 0 100% no-repeat; width:20px; height:20px; overflow:hidden;"></td>
            <td class="bm" style="border-top:0px; background:url(/img/bm.png) 0 100% repeat-x; height:20px; overflow:hidden;"></td>
            <td class="br" style="border-top:0px; background:url(/img/br.png) 100% 100% no-repeat; width:20px; height:20px; overflow:hidden;"></td>
        </tr>
        </tbody>
    </table>
    <a href="#" title="Close" id="zoom_close" style="position: absolute; top: 0px; left: 0px; display: none; " curtop="304" curleft="721" scaleimg="true">
        <img src="/img/closebox.png" alt="Close" style="border:none; margin:0; padding:0;">
    </a>
</div>