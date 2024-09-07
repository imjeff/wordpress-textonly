<?php
/*
Template Name: 归档模板
*/
?>
<?php get_header(); ?>
<h1 class="title"><?php the_title();?></h1>
<?php
$previous_year = $year = 0;
$previous_month = $month = 0;
$ul_open = false;
$myposts = get_posts('numberposts=-1&orderby=post_date&order=DESC');
foreach($myposts as $post) :
setup_postdata($post);
$year = mysql2date('Y', $post->post_date);
$month = mysql2date('n', $post->post_date);
$day = mysql2date('j', $post->post_date);
if($year != $previous_year || $month != $previous_month) :
if($ul_open == true) :
echo '</ul>';
endif;
echo '<h3>'; echo the_time('Y年m月'); echo '</h3>';
echo '<ul>';
$ul_open = true;
endif;
$previous_year = $year; $previous_month = $month;
?>
<li>
<time datetime="<?php the_time('Y年m月d日');?>"><?php the_time('m-d');?></time>&nbsp·&nbsp<a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a>
</li>
<?php endforeach; ?>
<?php get_footer(); ?>