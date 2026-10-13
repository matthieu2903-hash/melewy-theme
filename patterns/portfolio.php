<?php
/**
 * Title: Portfolio
 * Slug: melewy/portfolio
 * Categories: melewy
 * Description: Contenu de la page Portfolio : introduction, filtres et tous les projets.
 *
 * @package Melewy
 */
?>
<!-- wp:paragraph {"textColor":"texte-doux","fontSize":"large"} -->
<p class="has-texte-doux-color has-text-color has-large-font-size">Mes projets, classés par catégorie. Certains mélangent plusieurs disciplines : les filtres t'aident à les retrouver.</p>
<!-- /wp:paragraph -->

<!-- wp:shortcode -->
[melewy_filtres]
<!-- /wp:shortcode -->

<!-- wp:query {"queryId":41,"query":{"perPage":100,"pages":0,"offset":0,"postType":"page","order":"asc","orderBy":"title","inherit":false,"melewyProjets":true}} -->
<div class="wp-block-query"><!-- wp:post-template {"layout":{"type":"grid","minimumColumnWidth":"17.5rem"}} -->
<!-- wp:group {"className":"is-style-tuile tuile-projet","layout":{"type":"default"}} -->
<div class="wp-block-group is-style-tuile tuile-projet"><!-- wp:shortcode -->
[melewy_categorie]
<!-- /wp:shortcode -->

<!-- wp:group {"layout":{"type":"default"}} -->
<div class="wp-block-group"><!-- wp:post-title {"level":2,"isLink":true} /-->

<!-- wp:post-excerpt {"moreText":"","excerptLength":30} /--></div>
<!-- /wp:group --></div>
<!-- /wp:group -->
<!-- /wp:post-template -->

<!-- wp:query-no-results -->
<!-- wp:paragraph -->
<p>Aucun projet pour le moment.</p>
<!-- /wp:paragraph -->
<!-- /wp:query-no-results --></div>
<!-- /wp:query -->
