<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php wp_title( '|', true, 'right' ); ?> <?php bloginfo( 'name' ); ?></title>
    <meta name="description" content="We are making games that brings JOY to the world! Our focus and mission is to create the most joyful, fun and wonderful games so millions of players can enjoy!">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@900&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Oswald:wght@400;500;600;700&display=swap" rel="stylesheet">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/assets/style.css">
    <meta name="robots" content="index, follow">
    <meta property="og:title" content="<?php wp_title( '|', true, 'right' ); ?> <?php bloginfo( 'name' ); ?>">
    <meta property="og:description" content="<?php bloginfo( 'description' ); ?>">
    
    <meta property="og:image" content="URL-to-image.jpg">
    <meta property="og:url" content="<?php echo esc_url( home_url() ); ?>">
    <meta property="og:type" content="website">
    <link rel="canonical" href="<?php echo esc_url( get_permalink() ); ?>">
    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container">
            <a class="navbar-brand poppins-black" href="<?php echo esc_url( home_url( '/' ) ); ?>">
            JOYVOO
            </a>
            <button aria-labelledby="menu-button" aria-label="menu-button" class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item"><a class="nav-link" href="<?php echo esc_url( home_url( '/games' ) ); ?>">GAMES</a></li>
                    <li class="nav-item"><div class="nav-link contact-us">CONTACT US</div></li>
                </ul>
            </div>
        </div>
    </nav>
