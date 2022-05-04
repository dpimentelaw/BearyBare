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
          <div class="col-lg-3 d-flex flex-column flex-wrap align-items-center g-3">
              <div class="home-card border border-2 border-dark" style="width: 18rem;">
                  <?php the_post_thumbnail();?>
                  <div class="card-body">
                      <h5 class="card-title"><?php the_title(); ?></h5>
                      <p class="card-text"><?php echo wp_trim_words(get_the_content(),20);?></p>
                  </div>
                  <div class="card-button">
                      <a href="<?php the_permalink();?>" class="card-link"><button type="button"
                              class="btn btn-fp border border-2 border-dark">Read
                              More</button></a>
                  </div>
              </div>
          </div>
 
         <?php }
         ?>
         <div class="col-lg-3 border border-2 widget-front">
             <?php if(dynamic_sidebar('Sidebar')) :else : endif; ?>
         </div>
    </div>
        </div>
</div>
<div class="container-fluid subscribe d-flex align-items-center bg-dark">
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
<div class="container-flud info-section">
    <div class="row info-row d-flex justify-content-center">
        <div class="col-md-6 info">
            <div class="info-image d-flex align-items-center justify-content-center">
                <img src="<?php echo get_theme_file_uri('/img/brown_bear_info.jpg ')?>" alt="">
            </div>
        </div>
        <div class="col-md-6 bear-info d-flex flex-column">
            <h2 class="text-center pt-2"><Strong>Bear Spotight: Brown Bear</Strong></h2>
            <div class="box-info border border-1 border-dark ps-3 pt-3 mt-2">
                <p><strong>Population:</strong>110,000</p>
                <p><strong>Scientific Name:</strong>Ursus arctos</p>
                <p><strong>Height:</strong>3.35 Feet to shoulders</p>
                <p><strong>Weight:</strong>Up to 1500 lbs</p>
                <p><strong>Length:</strong>6.5 feet</p>
                <br>
                <h3><strong>Why They Matter:</strong></h3>
                <p class="info-p">Few animals have captured the imagination like brown bears. They can stand on two legs, walk on the soles of their feet, pick things up with their “fingers,” and often eat what we eat. This—coupled with their ability to communicate with one another through scratch marks left on trees, smells and sounds—establishes a similarity to our own way of life. Some of the largest living carnivores, brown bears have fallen prey to hunting and other conflicts with humans.</p>
            </div>
        </div>

</div>
</div>

<?php get_footer(); ?>