<?php get_header(); ?>


<div class="hero-image d-flex flex-column justify-content-center align-items-center" style="background-image: url(<?php echo get_theme_file_uri('/img/front-bear.jpg'); ?>);">
    <h1><?php the_title(); ?></h1>
    <hr class= "front-hr w-25">
    <p><?php echo get_option('blogdescription'); ?></p>
    </div>
</div>
<div class="container front-blog">
    <div class="row pt-4 text-center">
        <h2 class="recent-posts"> Recent Posts</h2>
    </div>
    <div class="row pt-4">
    <?php
        $frontPagePosts =new WP_Query( array (
            'posts_per_page' =>3
        ));
        while ($frontPagePosts ->have_posts()) {
            $frontPagePosts->the_post(); ?>
          <div class="col-4 d-flex flex-column align-items-center">
            <div class="post-image border border-dark border-2" >
                <img src="<?php echo get_theme_file_uri('/img/Beary_Bare Logo.png');?>" alt="Logo Image">
            </div>
            <h3 class="text-center pt-3"><?php the_title(); ?></h3>
            <p class="excerpt-front text-center pt-2 w-75"><?php echo wp_trim_words(get_the_content(),20);?></p>
        </div>

         <?php }
         ?>
        
        
    <div class="fp-buttons d-flex justify-content-center pt-5 pb-5">
    <a href="<?php echo site_url('/about');?>"><button type="button" class="btn btn-fp btn-primary border border-2 border-dark text-white">About</button></a>
    <a href="<?php echo site_url('/blog');?>"><button type="button" class="btn btn-fp btn-primary border border-2 border-dark text-white">All blogs</button></a>
    </div>
</div>
<div class="subscribe d-flex align-items-center bg-dark">
    <div class="col subscribe-text text-center">
        <h2 class= "text-white subscribe-title">Stay In Touch</h>
        <p class= "text-white subscribe-att">Sign Up to Our Montly Newsletter</p>
        <form>
            <div class="mt-5 text-white d-flex justify-content-center">
                <label for="emailsubscription" class="form-label pe-3">Email address:</label>
                <input type="email" class="form-control w-25" id="email-subscription" placeholder="name@example.com">
            </div>
        </form>
    </div>
</div>


<?php get_footer(); ?>