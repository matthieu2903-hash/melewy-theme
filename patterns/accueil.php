<?php
/**
 * Title: Accueil
 * Slug: melewy/accueil
 * Categories: melewy
 * Description: Contenu complet de la page d'accueil, en tuiles.
 *
 * @package Melewy
 */
?>
<!-- wp:group {"className":"rangee","layout":{"type":"flex","flexWrap":"wrap","verticalAlignment":"stretch"}} -->
<div class="wp-block-group rangee"><!-- wp:group {"className":"is-style-tuile large","layout":{"type":"default"}} -->
<div class="wp-block-group is-style-tuile large"><!-- wp:paragraph {"className":"is-style-pastille"} -->
<p class="is-style-pastille">Melewy · Une idée. Une destination. Une altitude.</p>
<!-- /wp:paragraph -->

<!-- wp:heading {"level":1} -->
<h1 class="wp-block-heading">Salut, je suis Matthieu. Je fais performer le digital.</h1>
<!-- /wp:heading -->

<!-- wp:paragraph {"textColor":"texte-doux","fontSize":"large"} -->
<p class="has-texte-doux-color has-text-color has-large-font-size">SEO, SEA et analytics : des actions pensées pour la croissance, mesurées pour de vrai.</p>
<!-- /wp:paragraph -->

<!-- wp:buttons -->
<div class="wp-block-buttons"><!-- wp:button -->
<div class="wp-block-button"><a class="wp-block-button__link wp-element-button" href="/portfolio/">Voir le portfolio</a></div>
<!-- /wp:button -->

<!-- wp:button {"className":"is-style-outline"} -->
<div class="wp-block-button is-style-outline"><a class="wp-block-button__link wp-element-button" href="/wp-content/uploads/2025/06/CV_Mercier_2025.pdf">Télécharger mon CV</a></div>
<!-- /wp:button --></div>
<!-- /wp:buttons --></div>
<!-- /wp:group -->

<!-- wp:group {"className":"is-style-tuile tuile-photo","backgroundColor":"accent","textColor":"surface","layout":{"type":"default"}} -->
<div class="wp-block-group is-style-tuile tuile-photo has-surface-color has-accent-background-color has-text-color has-background"><!-- wp:image {"sizeSlug":"large","className":"photo-portrait"} -->
<figure class="wp-block-image size-large photo-portrait"><img alt="Portrait de Matthieu Mercier"/></figure>
<!-- /wp:image --></div>
<!-- /wp:group --></div>
<!-- /wp:group -->

<!-- wp:group {"layout":{"type":"flex","flexWrap":"wrap","justifyContent":"space-between","verticalAlignment":"bottom"},"style":{"spacing":{"padding":{"top":"24px","left":"8px","right":"8px"}}}} -->
<div class="wp-block-group" style="padding-top:24px;padding-right:8px;padding-left:8px"><!-- wp:heading -->
<h2 class="wp-block-heading">Projets à la une</h2>
<!-- /wp:heading -->

<!-- wp:paragraph -->
<p><a href="/portfolio/">Tous les projets →</a></p>
<!-- /wp:paragraph --></div>
<!-- /wp:group -->

<!-- wp:query {"queryId":31,"query":{"perPage":4,"pages":0,"offset":0,"postType":"page","order":"asc","orderBy":"title","inherit":false,"melewyProjets":true}} -->
<div class="wp-block-query"><!-- wp:post-template {"layout":{"type":"grid","minimumColumnWidth":"15rem"}} -->
<!-- wp:group {"className":"is-style-tuile tuile-projet","layout":{"type":"default"}} -->
<div class="wp-block-group is-style-tuile tuile-projet"><!-- wp:shortcode -->
[melewy_categorie]
<!-- /wp:shortcode -->

<!-- wp:group {"layout":{"type":"default"}} -->
<div class="wp-block-group"><!-- wp:post-title {"level":3,"isLink":true} /-->

<!-- wp:post-excerpt {"moreText":"","excerptLength":20} /--></div>
<!-- /wp:group --></div>
<!-- /wp:group -->
<!-- /wp:post-template --></div>
<!-- /wp:query -->

<!-- wp:group {"layout":{"type":"flex","flexWrap":"wrap","justifyContent":"space-between","verticalAlignment":"bottom"},"style":{"spacing":{"padding":{"top":"24px","left":"8px","right":"8px"}}}} -->
<div class="wp-block-group" style="padding-top:24px;padding-right:8px;padding-left:8px"><!-- wp:heading -->
<h2 class="wp-block-heading">Journal de bord</h2>
<!-- /wp:heading -->

<!-- wp:paragraph -->
<p><a href="/journal/">Tous les articles →</a></p>
<!-- /wp:paragraph --></div>
<!-- /wp:group -->

<!-- wp:query {"queryId":32,"query":{"perPage":2,"pages":0,"offset":0,"postType":"post","order":"desc","orderBy":"date","inherit":false}} -->
<div class="wp-block-query"><!-- wp:post-template {"layout":{"type":"grid","minimumColumnWidth":"22rem"}} -->
<!-- wp:group {"className":"is-style-tuile tuile-article","layout":{"type":"default"}} -->
<div class="wp-block-group is-style-tuile tuile-article"><!-- wp:post-date {"format":"j F Y"} /-->

<!-- wp:post-title {"level":3,"isLink":true} /--></div>
<!-- /wp:group -->
<!-- /wp:post-template --></div>
<!-- /wp:query -->

<!-- wp:group {"className":"is-style-tuile","backgroundColor":"citron","style":{"spacing":{"margin":{"top":"16px"}}},"layout":{"type":"default"}} -->
<div class="wp-block-group is-style-tuile has-citron-background-color has-background" style="margin-top:16px"><!-- wp:paragraph {"fontSize":"small","style":{"typography":{"fontWeight":"600"}}} -->
<p class="has-small-font-size" style="font-weight:600">Ils m'ont fait confiance</p>
<!-- /wp:paragraph -->

<!-- wp:quote {"className":"temoignage"} -->
<blockquote class="wp-block-quote temoignage"><!-- wp:paragraph {"fontSize":"x-large","style":{"typography":{"fontWeight":"800"}}} -->
<p class="has-x-large-font-size" style="font-weight:800">Une qualité indéniable !</p>
<!-- /wp:paragraph -->

<!-- wp:paragraph {"fontSize":"large"} -->
<p class="has-large-font-size">« Merci à Matthieu pour ce site qui correspond pleinement à mes attentes. Il est clair, efficace et attire déjà l'attention – plusieurs retours très positifs me sont parvenus depuis sa mise en ligne. »</p>
<!-- /wp:paragraph --><cite><strong>Mino</strong>, artiste · 22 mars 2025</cite></blockquote>
<!-- /wp:quote --></div>
<!-- /wp:group -->

<!-- wp:group {"className":"rangee","style":{"spacing":{"margin":{"top":"16px"}}},"layout":{"type":"flex","flexWrap":"wrap","verticalAlignment":"stretch"}} -->
<div class="wp-block-group rangee" style="margin-top:16px"><!-- wp:group {"className":"is-style-tuile","layout":{"type":"default"}} -->
<div class="wp-block-group is-style-tuile"><!-- wp:heading {"level":3} -->
<h3 class="wp-block-heading">Compétences</h3>
<!-- /wp:heading -->

<!-- wp:list {"className":"puces"} -->
<ul class="wp-block-list puces"><!-- wp:list-item -->
<li>SEO</li>
<!-- /wp:list-item -->

<!-- wp:list-item -->
<li>SEA · Google Ads</li>
<!-- /wp:list-item -->

<!-- wp:list-item -->
<li>GA4</li>
<!-- /wp:list-item -->

<!-- wp:list-item -->
<li>Search Console</li>
<!-- /wp:list-item -->

<!-- wp:list-item -->
<li>Reporting KPI</li>
<!-- /wp:list-item -->

<!-- wp:list-item -->
<li>WordPress</li>
<!-- /wp:list-item -->

<!-- wp:list-item -->
<li>Rédaction web</li>
<!-- /wp:list-item -->

<!-- wp:list-item -->
<li>Google Business Profile</li>
<!-- /wp:list-item --></ul>
<!-- /wp:list --></div>
<!-- /wp:group -->

<!-- wp:group {"className":"is-style-tuile","layout":{"type":"default"}} -->
<div class="wp-block-group is-style-tuile"><!-- wp:heading {"level":3} -->
<h3 class="wp-block-heading">Parcours</h3>
<!-- /wp:heading -->

<!-- wp:group {"className":"liste-traits","layout":{"type":"default"}} -->
<div class="wp-block-group liste-traits"><!-- wp:paragraph -->
<p><strong>M2 en alternance, jusqu'en août 2027</strong><br>MBA Expert Marketing Digital · MyDigitalSchool Paris<br>Rédacteur web · AFTRAL</p>
<!-- /wp:paragraph -->

<!-- wp:paragraph -->
<p><strong>Licence</strong><br>Géographie et aménagement du territoire · Université Paris Cité</p>
<!-- /wp:paragraph --></div>
<!-- /wp:group -->

<!-- wp:paragraph -->
<p><a href="/parcours/">Mon parcours complet →</a></p>
<!-- /wp:paragraph --></div>
<!-- /wp:group -->

<!-- wp:group {"className":"is-style-tuile tuile-sombre","backgroundColor":"encre","textColor":"surface","layout":{"type":"flex","orientation":"vertical","justifyContent":"stretch","verticalAlignment":"space-between"}} -->
<div class="wp-block-group is-style-tuile tuile-sombre has-surface-color has-encre-background-color has-text-color has-background"><!-- wp:heading {"level":3,"fontSize":"xx-large"} -->
<h3 class="wp-block-heading has-xx-large-font-size">Un projet en tête ?</h3>
<!-- /wp:heading -->

<!-- wp:buttons -->
<div class="wp-block-buttons"><!-- wp:button {"backgroundColor":"citron","textColor":"encre"} -->
<div class="wp-block-button"><a class="wp-block-button__link has-encre-color has-citron-background-color has-text-color has-background wp-element-button" href="/contact/">Me contacter</a></div>
<!-- /wp:button --></div>
<!-- /wp:buttons --></div>
<!-- /wp:group --></div>
<!-- /wp:group -->
