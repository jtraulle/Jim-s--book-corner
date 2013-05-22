<script type="text/javascript">
$(window).load(function() {
    $('#slider').nivoSlider({
        effect: 'sliceDown', // Specify sets like: 'fold,fade,sliceDown'
        slices: 15, // For slice animations
        boxCols: 8, // For box animations
        boxRows: 4, // For box animations
        animSpeed: 500, // Slide transition speed
        pauseTime: 4000, // How long each slide will show
        startSlide: 0, // Set starting Slide (0 index)
        directionNav: true, // Next & Prev navigation
        controlNav: true, // 1,2,3... navigation
        controlNavThumbs: false, // Use thumbnails for Control Nav
        pauseOnHover: true, // Stop animation while hovering
        manualAdvance: false, // Force manual transitions
        prevText: 'Précédent', // Prev directionNav text
        nextText: 'Suivant', // Next directionNav text
        randomStart: false, // Start on a random slide
        beforeChange: function(){}, // Triggers before a slide transition
        afterChange: function(){}, // Triggers after a slide transition
        slideshowEnd: function(){}, // Triggers after all slides have been shown
        lastSlide: function(){}, // Triggers when last slide is shown
        afterLoad: function(){} // Triggers when slider has loaded
    });
});
</script>

<div class="page-title">
    <h2>Inauguration du Jim's book corner library</h2>
</div>

<div class="hero-unit tweak-hero" style="padding-bottom:20px;">
<p>Nous avons eu la joie d'inaugurer ce Mercredi 13 Février 2013 le Jim's Book Corner Library. Nous espérons que ce lieu de savoir et de partage permettra au plus grand nombre d'accéder à la culture et à la littérature anglaise !</p>
</div>

<div class="slider-wrapper theme-default" style="margin:auto; width:80%;">
    <div id="slider">
        <img src="images/inauguration1.jpeg" alt="" title="Éric Sanniez (fondateur du projet et professeur d'Anglais au STAPS)<br />Tom, Élise Laout Mc Crate et son mari, les principaux donateurs." />
        <img src="images/inauguration2.jpeg" alt="" title="Éric Sanniez (fondateur du projet et professeur d'Anglais au STAPS) ; Brigitte Kervella (professeur à l'IUT d'Amiens)<br />Jean Traullé, Adeline Blin et Dorine Talfer (étudiants à l'IUT et développeurs du site Internet)." />
        <img src="images/inauguration3.jpeg" alt="" title="Au centre, Shan Williams, professeur à l'UFR des langues qui a contribué au projet." />
    </div>
</div>