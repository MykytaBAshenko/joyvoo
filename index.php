<?php
get_header(); // Include the header
?>

<section class="start-section">
    <div class="background-image"></div>
    <video class="background-video" autoplay loop muted>
        <!-- Using WordPress's 'get_template_directory_uri()' to correctly reference the video file -->
        <source src="<?php echo get_template_directory_uri(); ?>/assets/Video_Website_Grad_2.mp4" type="video/mp4">
    </video>
    <div class="background-layer"></div>

    <div class="start-section-container">
        <div class="container">
            <div class="container-title">
                <span>WE</span></br>
                <span>LOVE</span></br>
                <span>GAMES</span>
            </div>
            <div class="container-about">
                <h1>Welcome to Joyvoo – Games That Spark Joy!</h1>
            </div>
        </div>
    </div>
</section>

<section class="white-section">
    <div class="container">
        <div class="white-section-container">
            <div class="white-section-container-meta container-meta">
                <h1>OUR JOURNEY</h1>
                <p>
                    From our humble beginnings, Joyvoo has grown into a recognized leader in mobile
                    gaming. Our games, like Slot Bonanza and Bonanza Party, have captured the hearts of
                    millions of players across the globe. But we’re not stopping there—our goal is to continue
                    pushing the boundaries of what’s possible in gaming.
                </p>
            </div>

            <!-- Using WordPress functions to load the image -->
            <img src="<?php echo get_template_directory_uri(); ?>/assets/images_gif.gif" alt="Journey">
        </div>
    </div>
</section>

<section class="pink-section">
    <div class="container">
        <div class="pink-section-container">

            <div class="slider">
                <div class="slides">
                    <!-- Using WordPress functions for each image -->
                    <img src="<?php echo get_template_directory_uri(); ?>/assets/bp/4.png" alt="Image 4">
                    <img src="<?php echo get_template_directory_uri(); ?>/assets/bp/1.png" alt="Image 1">
                    <img src="<?php echo get_template_directory_uri(); ?>/assets/bp/2.png" alt="Image 2">
                    <img src="<?php echo get_template_directory_uri(); ?>/assets/bp/3.png" alt="Image 3">
                </div>

                <!-- Left and Right Clickable Zones -->
                <div class="slider-nav left"></div>
                <div class="slider-nav right"></div>
            </div>

            <div class="pink-section-container-meta container-meta">
                <h1>OUR VISION</h1>
                <p>
                    At Joyvoo, we believe games should be more than just something to pass the time.
                    They should make you smile, connect you with others, and give you a little escape from the everyday.
                    That’s why we pour our hearts into creating games that you’ll truly love.
                </p>
            </div>
        </div>
    </div>
</section>

<section class="discovery-section">
    <div class="container">
        <h1>Your next gaming adventure is just a click away! Dive in and discover why millions of players call Joyvoo their favorite place to play</h1>
        <div class="action-buttons">
            <a class="game-link" href="<?php echo esc_url( home_url( '/games' ) ); ?>">Discover Our Games</a>
            <div class="contact-btn contact-us" >Contact Us</div>
        </div>
    </div>
</section>

<?php
get_footer(); // Include the footer
?>
