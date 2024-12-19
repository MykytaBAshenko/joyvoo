

<?php
/* Template Name: Games */
?>

<?php
get_header(); // Include the header
?>


<section class="game-start-section">
    <div class="background-image"></div>
    <!-- Dynamically include the video source using WordPress functions -->
    <video class="background-video" autoplay loop muted  draggable="false" playsinline>
        <source src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/Video_Website_Grad_2.mp4" type="video/mp4">
    </video>
    <div class="background-layer"></div>

    <div class="game-section-container">
        <div class="container">
            <div class="container-title">
                <span>FIND</span>
                <span>YOUR</span>
                <span>PASSION</span>
            </div>
        </div>
    </div>
</section>







<section class="game-sheet-section">
        <div class="container">
            <div class="game-sheet-title">
                Our favorite games
            </div>
            <div class="game-sheet">
            <?php
// Retrieve all game data from the database
global $wpdb;
$table_name = $wpdb->prefix . 'games';
$games = $wpdb->get_results("SELECT * FROM $table_name ORDER BY sort_order ASC");

foreach ($games as $game):
    // Get image URLs and video URLs
    $image_urls = maybe_unserialize($game->image_urls);
    $video_urls = maybe_unserialize($game->video_urls);
    $logo_url = maybe_unserialize($game->logo_url);
    ?>
    <div class="game-sheet-item">
        <div class="game-sheet-item-content">
            <div class="game-sheet-item-content-action">
                <div class="game-sheet-item-content-action-container-shadow"></div>
                <div class="game-sheet-item-content-action-container">
                    <?php
                    // Display images
                    if (!empty($image_urls)) {
                        foreach ($image_urls as $image) {
                            echo '<img src="' . esc_url($image) . '" alt="">';
                        }
                    }
                    // Display videos
                    if (!empty($video_urls)) {
                        foreach ($video_urls as $video) {
                            echo '<video autoplay loop muted draggable="false" playsinline>
                                <source src="' . esc_url($video) . '" type="video/mp4" >
                            </video>';
                        }
                    }
                    ?>
                </div>
                <i class="bi bi-play-fill play-button"></i>
            </div>
            <?php
            // Display logo if available
            if (!empty($logo_url)) {
                echo '<img rel="preload" as="image" class="game-sheet-item-content-logo" src="' . esc_url($logo_url[0]) . '" alt="">';
            }
            ?>
        </div>

        <div class="game-sheet-item-body">
            <div class="game-sheet-item-header">
                <div class="game-sheet-item-header-title"><?php echo esc_html($game->title); ?></div>
            </div>
            <div class="game-sheet-item-description">
                <?php echo esc_html($game->description); ?>
            </div>
            <div class="game-sheet-item-actions">
                <?php  if (!empty($game->playstore_link)): ?>
                    <a target="_blank" href="<?php echo esc_url($game->playstore_link); ?>">
                        <img src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/google.webp" alt="">
                    </a>
                <?php endif; ?>
                <?php if (!empty($game->appstore_link)): ?>
                    <a target="_blank" href="<?php echo esc_url($game->appstore_link); ?>">
                        <img src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/apple-p.svg" alt="">
                    </a>
                <?php endif; ?>
            </div>
        </div>
    </div>
<?php endforeach; ?>
              
            </div>
            <div class="other-section">
                <div class="game-sheet-title other">
                    Other games
                </div>

                <div class="other-sheet">


                <?php
// Retrieve all game data from the database
global $wpdb;
$table_name = $wpdb->prefix . 'other_games';
$games = $wpdb->get_results("SELECT * FROM $table_name ORDER BY sort_order ASC");

foreach ($games as $game):
    // Get image URLs and video URLs
    $logo_url = maybe_unserialize($game->logo_url);
    ?>
<div class="other-sheet-item">
                        <?php
            // Display logo if available
            if (!empty($logo_url)) {
                echo '<img  rel="preload" as="image" class="other-sheet-item-logo" src="' . esc_url($logo_url[0]) . '" alt="">';
            }
            ?>
                        <div class="other-sheet-item-body">
                <div class="other-sheet-item-body-title"><?php echo esc_html($game->title); ?></div>
                <div class="other-sheet-item-body-description">
                <?php echo esc_html($game->description); ?>
                        </div>
                        <div class="other-sheet-item-body-action">
                <?php  if (!empty($game->playstore_link)): ?>
                    <a target="_blank" href="<?php echo esc_url($game->playstore_link); ?>">
                        <img src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/google.webp" alt="">
                    </a>
                <?php endif; ?>
                <?php if (!empty($game->appstore_link)): ?>
                    <a target="_blank" href="<?php echo esc_url($game->appstore_link); ?>">
                        <img src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/apple-p.svg" alt="">
                    </a>
                <?php endif; ?>
            </div>
                        </div>
</div>
<?php endforeach; ?>
                </div>
            </div>
            </div>
        </div>
    </section>


<div id="popup-carousel">
        <div id="popup-carousel-layer">
        </div>
        <div id="popup-carousel-content-shell">
            <div id="popup-carousel-content">
            </div>
        </div>
    </div>
    <?php
get_footer(); 
?>
