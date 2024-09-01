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