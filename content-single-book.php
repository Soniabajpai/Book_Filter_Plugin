<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package WordPress
 * @subpackage Twenty_Twenty_One
 * @since Twenty Twenty-One 1.0
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<header class="entry-header alignwide">
		<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
		<p><span><b>Author:</b> <?php
    $terms = get_the_terms($post->ID, "book_author");
    foreach ($terms as $term) {
        echo $term->name;
    }
    ?></span> | <span><b>Publisher:</b> <?php
    $terms = get_the_terms($post->ID, "book_publisher");
    foreach ($terms as $term) {
        echo $term->name;
    }
    ?></span> | <span><b>Book Price:</b> <?php
    $key = get_post_meta(get_the_id(), "price", true);
    if ($key) {
        echo $key;
    }
    ?></span> | <span><b>Book Rating:</b> <?php
    $key = get_post_meta(get_the_id(), "rating", true);
    if ($key) {
        echo $key;
    }
    ?></span></p>
		<?php twenty_twenty_one_post_thumbnail(); ?>
	</header><!-- .entry-header -->

	<div class="entry-content">
		<?php
		the_content();

		wp_link_pages(
			array(
				'before'   => '<nav class="page-links" aria-label="' . esc_attr__( 'Page', 'twentytwentyone' ) . '">',
				'after'    => '</nav>',
				/* translators: %: Page number. */
				'pagelink' => esc_html__( 'Page %', 'twentytwentyone' ),
			)
		);
		?>
	</div><!-- .entry-content -->

	<footer class="entry-footer default-max-width">
		<?php twenty_twenty_one_entry_meta_footer(); ?>
	</footer><!-- .entry-footer -->

	<?php if ( ! is_singular( 'attachment' ) ) : ?>
		<?php get_template_part( 'template-parts/post/author-bio' ); ?>
	<?php endif; ?>

</article><!-- #post-<?php the_ID(); ?> -->
