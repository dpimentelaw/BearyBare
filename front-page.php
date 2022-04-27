<?php get_header(); ?>


<div class="hero-image d-flex flex-column justify-content-center align-items-center" style="background-image: url(<?php echo get_theme_file_uri('/img/front-bear.jpg'); ?>);">
    <h1>This is the Title</h1>
    <hr class= "front-hr w-25">
    <p>This is the description</p>
    </div>
</div>
<div class="container front-blog">
    <div class="row pt-4 text-center">
        <h2 class="recent-posts"> Recent Posts</h2>
    </div>
    <div class="row pt-4">
        <div class="col-4 d-flex flex-column align-items-center">
            <div class="post-image border border-dark border-2" >
                <img src="<?php echo get_theme_file_uri('/img/Beary_Bare Logo.png');?>" alt="Logo Image">
            </div>
            <h3 class="text-center pt-3">TITLE</h3>
            <p class="excerpt-front text-center pt-2 w-75">Lorem ipsum dolor sit amet consectetur, adipisicing elit. Veritatis,
                deserunt dignissimos sit recusandae unde fugiat illum quae numquam provident mollitia.</p>
        </div>
        <div class="col-4 d-flex flex-column align-items-center">
            <div class="post-image border border-dark border-2">
                <img src="<?php echo get_theme_file_uri('/img/Beary_Bare Logo.png');?>" alt="Logo Image">
            </div>
            <h3 class="text-center pt-3">TITLE</h3>
            <p class="excerpt-front text-center pt-2 w-75">Lorem ipsum dolor sit amet consectetur, adipisicing elit. Veritatis,
                deserunt dignissimos sit recusandae unde fugiat illum quae numquam provident mollitia.</p>
        </div>
        <div class="col-4 d-flex flex-column align-items-center">
            <div class="post-image border border-dark border-2 ">
                <img src="<?php echo get_theme_file_uri('/img/Beary_Bare Logo.png');?>" alt="Logo Image">
            </div>
            <h3 class="text-center pt-3">TITLE</h3>
            <p class="excerpt-front text-center pt-2 w-75">Lorem ipsum dolor sit amet consectetur, adipisicing elit. Veritatis,
                deserunt dignissimos sit recusandae unde fugiat illum quae numquam provident mollitia.</p>
        </div>
    </div>
    <div class="fp-buttons d-flex justify-content-center pt-5 pb-5">
        <button type="button" class="btn btn-fp btn-primary border border-2 border-dark">Primary</button>
        <button type="button" class="btn btn-fp btn-primary border border-2 border-dark">Primary</button>
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