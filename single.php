<?php get_header(); 

if(have_posts(  )) {
    while(have_posts()) {
        the_post(  ); ?>
<div class="banner d-flex flex-column justify-content-center align-items-center" style="background-image: url(<?php echo get_theme_file_uri('/img/banner.jpg'); ?>);">
    <h1><?php the_title(); ?></h1>
    <hr class= "front-hr w-25">
    <p>This is the description</p>
    </div>
</div>

<div class="container single-blog d-flex flex-column">
    <div class="info-box mb-3">
        <p>Posted by <?php echo get_the_author();?> on <?php the_time('l, F jS, Y') ?> in <?php echo get_the_category_list(', ')?></p>
    </div>
    <div class="single-content">
        <?php the_content(); ?>
    </div>
</div>

<?php }}

?>

<?php get_footer(); ?>