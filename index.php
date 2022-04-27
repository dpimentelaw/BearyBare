<?php get_header(); ?>
This is the blog section.
<?php
    if(have_posts()) {
        while(have_posts()) {
            the_post(); ?>
            <h2><a href="<?php the_permalink();?>"><?php the_title();?></a></h2>
            <?php the_content(); ?>
            <hr>
        <?php }
}
?>
<?php get_footer(); ?>