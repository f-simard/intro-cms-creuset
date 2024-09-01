<?php

get_header();

$introduction = get_field( 'page_introduction' );
$bg_img = get_field( 'page_image_bg' );

if( empty ( $bg_img ) ){
	$bg_img = wp_get_attachment_url( 70 ) ;
}

?>


<?php
/* Start the Loop */
while ( have_posts() ) :

	the_post();

	switch ($post->post_title) :

		case 'À Propos':
			$propos_content = get_field('propos_editeur');

			if ( $propos_content ) : ?>
				<div class="wysiwyg wrapper"> <?php echo  $propos_content; ?> </div>
			<?php
			endif;
			break;
		
		default: ?>

			<div class="bg_grispale">
			<!-- inserer banniere -->
			<div id="banniere_page" style="background-image: url(<?php echo $bg_img ?>)" class="banniere banniere_page">
				<div class="wrapper_etroit ">
					<p><?php echo esc_html($introduction); ?></p>
				</div>
			</div>
				<?php get_template_part( 'template-parts/grille-article' ); ?>

			</div> <!-- fermeture div fond gris -->

		<?php endswitch;

endwhile; // End of the loop.

get_footer();