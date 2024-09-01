<?php

get_header();

$slogan = get_field( 'accueil_slogan' );
$introduction = get_field( 'accueil_introduction' );
$bg_img = get_field( 'accueil_image_bg' );

if( empty ( $bg_img ) ){
	$bg_img = wp_get_attachment_url( 70 ) ;
}

?>

<!-- inserer banniere -->
<section id="banniere_accueil" style="background-image: url(<?php echo $bg_img ?>)" class="banniere banniere_accueil">

	<h2><?php echo esc_html($slogan); ?></h2>

</section>

<!-- inserer introduction -->
<section class="wrapper">
	<p><?php echo esc_html($introduction); ?></p>
</section>

<!-- inserer les articles -->
<?php 

// https://support.advancedcustomfields.com/forums/topic/get-select-field-options/
$article_categorie = get_field_object('field_66a29754a0146')['choices'];

if( $article_categorie ) :
?>

	<div class="wrapper_etroit bg_rose">
		<?php
		foreach ( $article_categorie as $key=>$value ) :
		?>
			<section class="zone">
			<h2 class="zone__titre"> <?php echo esc_html($value); ?> </h2>
				<?php
				// src: https://www.advancedcustomfields.com/resources/query-posts-custom-fields/
				// args
				$args = array(
					'posts_per_page'    => 4,
					'post_type'     => 'article',
					'meta_query'    => array(
						'relation'      => 'AND',
						array(
							'key'       => 'article_categorie',
							'value'     => $key,
							'compare'   => '=',
						),
						array(
							'key'       => 'article_actif',
							'value'     => '1',
							'compare'   => '=',
						),
					),
				);
				// query
				$the_query = new WP_Query( $args );
				
				if( $the_query->have_posts() ): ?>
					<div class="grille grille_4">
					<?php while( $the_query->have_posts() ) : $the_query->the_post();

						get_template_part( 'template-parts/tuile' );
				
					endwhile; ?>
					</div>
				<?php endif; ?>
			</section>
		<?php
		endforeach; //fin de la boucle pour les catégories
		?>
	</div>

<?php
endif;
get_footer();
