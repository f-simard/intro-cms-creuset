<?php

get_header();

$introduction = get_field( 'page_introduction' );
$bg_img = get_field( 'page_image_bg' );

if( empty ( $bg_img ) ){
	$bg_img = wp_get_attachment_url( 70 ) ;
}

?>
<div class="bg_grispale">
<!-- inserer banniere -->
<div id="banniere_page" style="background-image: url(<?php echo $bg_img ?>)" class="banniere banniere_page">
	<div class="wrapper_etroit ">
		<p><?php echo esc_html($introduction); ?></p>
	</div>
</div>

<section class="wrapper_etroit">
	<h2> <?php esc_html( the_title() ); ?> </h2>
	
	<?php
	// src: https://www.advancedcustomfields.com/resources/query-posts-custom-fields/
	// args
	$args = array(
		'posts_per_page'    => -1,
		'post_type'     => 'article',
		'meta_query'    => array(
			'relation'      => 'AND',
			array(
				'key'       => 'article_categorie',
				'value'     => get_the_title(),
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
		<div class="grille grille_3 mt_medium">
		<?php while( $the_query->have_posts() ) : $the_query->the_post();

			get_template_part( 'template-parts/tuile' );

		endwhile; ?>
		</div>
	<?php
	endif //
	?>
</section>


</div> <!-- fermeture div fond gris -->
<?php
	get_footer();