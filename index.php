<?php get_header(); ?>

<div class="banner d-flex flex-column justify-content-center align-items-center g-0" style="background-image: url(<?php echo get_theme_file_uri('/img/banner.jpg'); ?>);">
    <h1>Our Blog Page</h1>
    <hr class= "front-hr w-25">
    </div>
</div>
<div class="row g-0" style="background-color: #8B7474;">
<div class="col-lg-8 blog_link">
<?php
    if(have_posts()) {
        while(have_posts()) {
            the_post(); ?>
            <div class="container blog-container mt-5 mb-5">
                <h2><a href="<?php the_permalink();?>"><?php the_title();?></a></h2>
                <div class="blog-images">
                <?php the_post_thumbnail(); ?>
                </div>
                <div class="info-box mb-3">
                    <p>Posted by <?php echo get_the_author();?> on <?php the_time('n/ j/ Y') ?> in <?php echo get_the_category_list(', ')?></p>
                </div>
                <?php the_content(); ?>
            <hr>
            </div>
        <?php }
}
?>
</div>
        <div class="col-lg-4 mt-3 blog_sidebar">
        <?php if(dynamic_sidebar('Blog Sidebar')) :else : endif; ?>
        </div>
</div>

<?php get_footer(); ?>