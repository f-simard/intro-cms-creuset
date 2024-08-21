<?php

$champs = get_fields();

$article_description = $champs['article_description'];
$article_prix = $champs['article_prix'];
$article_description = $champs['article_description'];
$article_categorie = $champs['article_categorie']['label'];
$article_image = $champs['article_image']['url'];

?>

<!-- mettre affichage de variable dans structure de conditionnel -->
<article class="wrapper article">
    <h2><?php the_title(); ?></h2>
    <div>
		<?php if ( $article_image ) : ?>
			<picture class="article__media">
				<img src="<?php echo $article_image ?>" alt="<?php esc_attr( the_title() ); ?>">
			</picture>
		<?php endif; ?>
		<div class="article__texte">
			<?php if ( $article_categorie ) : ?>
			 <p class="article__rythme"><?php echo esc_html( $article_categorie ) ?> </p>
			<?php endif; ?>
				<div class="article__rythme">
					<p class="article__sous-titre">Description</p>
								<?php if ( $article_description ) : ?>
					<p><?php echo esc_html( $article_description ); ?></p>
								<?php endif; ?>
				</div>
				<?php if ( $article_prix ) : ?>
				<p class="article__rythme"><?php echo esc_html( $article_prix ); ?> $</p>
			<?php endif; ?>
	</div>
    </div>
</article>