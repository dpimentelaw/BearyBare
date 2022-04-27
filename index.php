<?php get_header(); ?>

<div class="banner d-flex flex-column justify-content-center align-items-center" style="background-image: url(<?php echo get_theme_file_uri('/img/banner.jpg'); ?>);">
    <h1>This is the Title</h1>
    <hr class= "front-hr w-25">
    <p>This is the description</p>
    </div>
</div>

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