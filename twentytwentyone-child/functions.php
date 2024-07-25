<?php

/**
 * ajouter les styles du theme parent
 */
function ttoc_styles() {

	wp_enqueue_style( 'ttoc-style', get_stylesheet_uri(), array( 'twenty-twenty-one-style' ) );

}
add_action( 'wp_enqueue_scripts', 'ttoc_styles');


/**
 * supprimer l’éditeur Gutenberg du Post Type Pages
 * src: devis
 */
function ttoc_supprime_editeur_page() {

	remove_post_type_support( 'page', 'editor' );

}
add_action( 'init', 'ttoc_supprime_editeur_page', 15 );