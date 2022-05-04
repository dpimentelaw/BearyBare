<?php get_header(); ?>

<div class="banner d-flex flex-column justify-content-center align-items-center" style="background-image: url(<?php echo get_theme_file_uri('/img/banner.jpg'); ?>);">
    <h1><?php the_title(); ?></h1>
    <hr class= "front-hr w-25">
    <p>This is the description</p>
    </div>
</div>
<div class="container about">
    <div class="row pt-4 text-center">
        <h2 class="about-header pb-5"> The Three Bears</h2>
    </div>
<?php
$staffPosts = new WP_Query(array (
    'post_type' => 'ceo', //This Needs to be changed
));

while($staffPosts ->have_posts()) {
        $staffPosts ->the_post(); ?>
        <div class="row about-posts mb-5">
            <div class="col-6 about-image">    
                <?php the_post_thumbnail( 'medium_large');?> 
            </div>
            <div class="col-6 about-content d-flex flex-column">
                <h3 class="pb-3 text-center"><?php the_title();?></h3>
                <h4>Bear Type: <?php the_field('bear_type'); ?></h4>
                <p> <?php echo wp_trim_words(get_the_content(),40); ?></p>
                <hr>
            </div>
        </div>

    <?php }

    ?>
</div>
<?php get_footer(); ?>
