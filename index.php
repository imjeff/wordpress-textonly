<?php get_header();?>
<?php if (is_archive()) { ?>
<div class="crumb"><strong>" <?php single_cat_title(); ?> "</strong> 下共有 <?php echo esc_html($wp_query->found_posts); ?> 篇文章</div>
<?php } ?>
<?php if ( have_posts() ) : ?>
<?php while ( have_posts() ) : the_post();?>
<article>
<h2 class="title"><a href="<?php the_permalink(); ?>"><?php if ( is_sticky() && is_home() ) : ?>🔝 <?php endif; ?><?php the_title(); ?></a></h2>
<?php if ( 'post' == get_post_type()){ the_category(', '); echo " &middot; "; } ?><time datetime="<?php the_time('Y-m-d'); ?>"><?php the_date( get_option( 'date_format' ) ); ?></time>
<div class="desc"><?php if ( has_excerpt() ) : ?><?php echo wp_trim_words( get_the_excerpt(),100); ?><?php else: ?><?php echo wp_trim_words( get_the_content(),100); ?><?php endif; ?></div>
</article>
<?php endwhile; ?>
<?php if ( get_the_posts_pagination() ) : ?>
<div class="post-pagination">
<?php
the_posts_pagination( array(
'mid_size' =>1,
'prev_text' =>'<span>&larr;</span>',
'next_text' =>'<span>&rarr;</span>',
));
?>
</div>
<?php endif; ?>
<?php endif; ?>
<?php get_footer();?>