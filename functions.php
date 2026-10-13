<?php
/**
 * Melewy — fonctions du thème.
 *
 * Organisation du portfolio : la page « Portfolio » (slug portfolio) a pour
 * enfants les pages de catégorie, qui ont elles-mêmes pour enfants les pages
 * de projet. Exemple : /portfolio/marketing/mimuss/.
 *
 * @package Melewy
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Réglages du thème.
 */
add_action(
	'after_setup_theme',
	function () {
		add_theme_support( 'wp-block-styles' );
		add_theme_support( 'editor-styles' );
		add_editor_style( 'assets/css/melewy.css' );
		add_post_type_support( 'page', 'excerpt' );
	}
);

/**
 * Feuille de style du site.
 */
add_action(
	'wp_enqueue_scripts',
	function () {
		wp_enqueue_style(
			'melewy',
			get_theme_file_uri( 'assets/css/melewy.css' ),
			array(),
			wp_get_theme()->get( 'Version' )
		);
	}
);

/**
 * Styles de blocs et catégorie de compositions.
 */
add_action(
	'init',
	function () {
		register_block_style(
			'core/group',
			array(
				'name'  => 'tuile',
				'label' => __( 'Tuile', 'melewy' ),
			)
		);
		register_block_style(
			'core/paragraph',
			array(
				'name'  => 'pastille',
				'label' => __( 'Pastille', 'melewy' ),
			)
		);
		register_block_pattern_category(
			'melewy',
			array( 'label' => __( 'Melewy', 'melewy' ) )
		);
	}
);

/**
 * Identifiant de la page Portfolio (0 si absente).
 *
 * @return int
 */
function melewy_portfolio_id() {
	$page = get_page_by_path( 'portfolio' );
	return $page ? (int) $page->ID : 0;
}

/**
 * Pages publiées enfants d'une page, triées par ordre puis titre.
 *
 * @param int $parent_id Page parente.
 * @return WP_Post[]
 */
function melewy_enfants( $parent_id ) {
	if ( ! $parent_id ) {
		return array();
	}
	return get_pages(
		array(
			'parent'      => (int) $parent_id,
			'sort_column' => 'menu_order,post_title',
			'post_status' => 'publish',
		)
	);
}

/**
 * Identifiants des pages de catégorie du portfolio.
 *
 * @return int[]
 */
function melewy_categories_ids() {
	return wp_list_pluck( melewy_enfants( melewy_portfolio_id() ), 'ID' );
}

/**
 * Requêtes des blocs « Boucle de requête » propres au thème.
 * Un drapeau ajouté dans l'attribut query du bloc choisit le comportement :
 * - melewyEnfants : pages enfants de la page affichée (page de catégorie) ;
 * - melewyProjets : tous les projets (petits-enfants de la page Portfolio).
 */
add_filter(
	'query_loop_block_query_vars',
	function ( $query, $block ) {
		$params = isset( $block->context['query'] ) && is_array( $block->context['query'] ) ? $block->context['query'] : array();

		if ( ! empty( $params['melewyEnfants'] ) ) {
			$query['post_type']   = 'page';
			$query['post_parent'] = get_queried_object_id();
			$query['orderby']     = 'menu_order title';
			$query['order']       = 'ASC';
		}

		if ( ! empty( $params['melewyProjets'] ) ) {
			$categories               = melewy_categories_ids();
			$query['post_type']       = 'page';
			$query['post_parent__in'] = $categories;
			$query['orderby']         = 'menu_order title';
			$query['order']           = 'ASC';
			if ( empty( $categories ) ) {
				$query['post__in'] = array( 0 );
			}
		}

		return $query;
	},
	10,
	2
);

/**
 * Classe de catégorie (ex. categorie-marketing) sur les projets,
 * pour colorer les tuiles et l'en-tête de page.
 *
 * @param int $post_id Page.
 * @return string Classe ou chaîne vide.
 */
function melewy_classe_categorie( $post_id ) {
	$post = get_post( $post_id );
	if ( ! $post || 'page' !== $post->post_type || ! $post->post_parent ) {
		return '';
	}
	$portfolio = melewy_portfolio_id();
	$parent    = get_post( $post->post_parent );
	if ( ! $parent ) {
		return '';
	}
	// Page de catégorie elle-même : on prend son propre slug.
	if ( (int) $parent->ID === $portfolio ) {
		return 'categorie-' . sanitize_html_class( $post->post_name );
	}
	if ( (int) $parent->post_parent === $portfolio ) {
		return 'categorie-' . sanitize_html_class( $parent->post_name );
	}
	return '';
}

add_filter(
	'post_class',
	function ( $classes, $css_class, $post_id ) {
		$classe = melewy_classe_categorie( $post_id );
		if ( $classe ) {
			$classes[] = $classe;
		}
		return $classes;
	},
	10,
	3
);

add_filter(
	'body_class',
	function ( $classes ) {
		if ( is_page() ) {
			$classe = melewy_classe_categorie( get_queried_object_id() );
			if ( $classe ) {
				$classes[] = $classe;
			}
		}
		return $classes;
	}
);

/**
 * [melewy_categorie] : nom de la catégorie du projet courant (dans une boucle ou sur la page).
 */
add_shortcode(
	'melewy_categorie',
	function () {
		$post = get_post();
		if ( ! $post || ! $post->post_parent ) {
			return '';
		}
		$parent = get_post( $post->post_parent );
		if ( ! $parent || (int) $parent->post_parent !== melewy_portfolio_id() ) {
			return '';
		}
		return '<span class="melewy-categorie">' . esc_html( get_the_title( $parent ) ) . '</span>';
	}
);

/**
 * [melewy_filtres] : pastilles de navigation entre catégories du portfolio.
 */
add_shortcode(
	'melewy_filtres',
	function () {
		$portfolio = melewy_portfolio_id();
		if ( ! $portfolio ) {
			return '';
		}
		$courant = get_queried_object_id();
		$liens   = array(
			array(
				'id'    => $portfolio,
				'titre' => __( 'Tous', 'melewy' ),
			),
		);
		foreach ( melewy_enfants( $portfolio ) as $categorie ) {
			$liens[] = array(
				'id'    => $categorie->ID,
				'titre' => get_the_title( $categorie ),
			);
		}
		$html = '<nav class="melewy-filtres" aria-label="' . esc_attr__( 'Catégories du portfolio', 'melewy' ) . '"><ul>';
		foreach ( $liens as $lien ) {
			$actif = ( (int) $lien['id'] === (int) $courant );
			$html .= sprintf(
				'<li><a href="%1$s"%2$s>%3$s</a></li>',
				esc_url( get_permalink( $lien['id'] ) ),
				$actif ? ' aria-current="page"' : '',
				esc_html( $lien['titre'] )
			);
		}
		return $html . '</ul></nav>';
	}
);

/**
 * [melewy_ariane] : fil d'Ariane des pages du portfolio.
 */
add_shortcode(
	'melewy_ariane',
	function () {
		$id = get_queried_object_id();
		if ( ! $id ) {
			return '';
		}
		$ancetres = array_reverse( get_post_ancestors( $id ) );
		if ( empty( $ancetres ) ) {
			return '';
		}
		$html = '<nav class="melewy-ariane" aria-label="' . esc_attr__( "Fil d'Ariane", 'melewy' ) . '"><ol>';
		foreach ( $ancetres as $ancetre ) {
			$html .= sprintf( '<li><a href="%1$s">%2$s</a></li>', esc_url( get_permalink( $ancetre ) ), esc_html( get_the_title( $ancetre ) ) );
		}
		$html .= '<li aria-current="page">' . esc_html( get_the_title( $id ) ) . '</li>';
		return $html . '</ol></nav>';
	}
);

/**
 * [melewy_projet_suivant] : tuile vers le projet suivant de la même catégorie
 * et tuile de retour vers la catégorie.
 */
add_shortcode(
	'melewy_projet_suivant',
	function () {
		$post = get_post( get_queried_object_id() );
		if ( ! $post || ! $post->post_parent ) {
			return '';
		}
		$freres = melewy_enfants( $post->post_parent );
		$html   = '<div class="melewy-suite">';
		if ( count( $freres ) > 1 ) {
			$ids     = wp_list_pluck( $freres, 'ID' );
			$index   = array_search( $post->ID, $ids, true );
			$suivant = $freres[ ( false === $index ? 0 : $index + 1 ) % count( $freres ) ];
			$html   .= sprintf(
				'<a class="melewy-suite__suivant %1$s" href="%2$s"><span>%3$s</span><strong>%4$s →</strong></a>',
				esc_attr( melewy_classe_categorie( $suivant->ID ) ),
				esc_url( get_permalink( $suivant ) ),
				esc_html__( 'Projet suivant', 'melewy' ),
				esc_html( get_the_title( $suivant ) )
			);
		}
		$html .= sprintf(
			'<a class="melewy-suite__retour" href="%1$s"><span>%2$s</span><strong>%3$s</strong></a>',
			esc_url( get_permalink( $post->post_parent ) ),
			esc_html__( 'Retour', 'melewy' ),
			esc_html( get_the_title( $post->post_parent ) )
		);
		return $html . '</div>';
	}
);

/**
 * [melewy_annee] : année en cours (pied de page).
 */
add_shortcode(
	'melewy_annee',
	function () {
		return esc_html( wp_date( 'Y' ) );
	}
);

/**
 * Menu : marque l'entrée correspondant à la page affichée.
 */
add_filter(
	'render_block_core/navigation-link',
	function ( $html, $block ) {
		$url = isset( $block['attrs']['url'] ) ? (string) $block['attrs']['url'] : '';
		if ( '' === $url ) {
			return $html;
		}
		$chemin  = trim( (string) wp_parse_url( $url, PHP_URL_PATH ), '/' );
		$requete = isset( $_SERVER['REQUEST_URI'] ) ? trim( (string) wp_parse_url( sanitize_text_field( wp_unslash( $_SERVER['REQUEST_URI'] ) ), PHP_URL_PATH ), '/' ) : '';
		$actif   = ( '' === $chemin ) ? ( '' === $requete ) : ( $requete === $chemin || 0 === strpos( $requete . '/', $chemin . '/' ) );
		if ( $actif ) {
			$html = preg_replace( '/class="/', 'class="est-actif ', $html, 1 );
			if ( false === strpos( $html, 'aria-current' ) ) {
				$html = preg_replace( '/<a /', '<a aria-current="page" ', $html, 1 );
			}
		}
		return $html;
	},
	10,
	2
);
