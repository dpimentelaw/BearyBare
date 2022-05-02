<?php get_header(); ?>

<div class="banner d-flex flex-column justify-content-center align-items-center" style="background-image: url(<?php echo get_theme_file_uri('/img/banner.jpg'); ?>);">
    <h1><?php the_archive_title(); ?></h1>
    <hr class= "front-hr w-25">
    <p>This is the description</p>
    </div>
</div>

<?php
    while (have_posts()) {
        the_post(); ?>
         <div class="container archive-container pt-5 pb-5">
             <h2><a href="<?php the_permalink(); ?>"> <?php the_title(); ?></a></h2>
             <div>
                 <?php echo wp_trim_words(get_the_content(),40); ?>
                 <a class="btn-sm btn-primary" href="<?php the_permalink(); ?>">
                         Continue reading &raquo; </a>
             </div>
         <hr>
    </div>
<?php }
?>
<?php get_footer(); ?>