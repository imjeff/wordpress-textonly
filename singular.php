<?php get_header();?>
<?php if ( have_posts() ) : ?>
<?php while ( have_posts() ) : the_post();?>
<h1 class="title"><a href="<?php the_permalink(); ?>"><?php if ( is_sticky() && is_home() ) : ?>🔝 <?php endif; ?><?php the_title(); ?></a></h1>
<?php if ( !is_page() ) { ?><time datetime="<?php the_time('Y-m-d'); ?>"><?php the_date( get_option( 'date_format' ) ); ?></time><?php }; ?>
<div class="content"><?php the_content(); ?></div>
<p><?php wp_link_pages(); ?></p>
<?php if ( get_the_tags() ) { ?><p class="tags"><?php the_tags( ' # ', ' # ', ' ' ); ?></p><?php } ?>
<p><br /><?php if (comments_open()) {comments_template();}?></p>
<?php endwhile; ?><?php endif; ?>
<?php get_footer();?>