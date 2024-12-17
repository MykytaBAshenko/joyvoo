<?php
// Enqueue Styles and Scripts
// function custom_theme_assets() {
//     wp_enqueue_style('style', get_stylesheet_uri());
//     // Add other styles or scripts here
// }
// add_action('wp_enqueue_scripts', 'custom_theme_assets');
// add_filter('show_admin_bar', '__return_false');
// // Add support for featured images
// add_theme_support('post-thumbnails');

// // Register custom navigation menus
// function custom_theme_menus() {
//     register_nav_menus(array(
//         'primary' => 'Primary Menu',
//     ));
// }

// define( 'WP_DEBUG', false );
ini_set( 'display_errors', 'Off'  ) ;
ini_set( 'error reporting', E_ALL ) ;
define('WP_DEBUG', false);
define('WP_DEBUG_DISPLAY', false);
// add_action('after_setup_theme', 'custom_theme_menus');

// // Register a custom post type
// function custom_post_type() {
//     register_post_type('custom_post', array(
//         'labels' => array(
//             'name' => 'Custom Posts',
//             'singular_name' => 'Custom Post'
//         ),
//         'public' => true,
//         'has_archive' => true,
//         'supports' => array('title', 'editor', 'thumbnail'),
//     ));
// }
// add_action('init', 'custom_post_type');


function custom_form_enqueue_scripts() {
    wp_enqueue_script('custom-form-js', get_template_directory_uri() . '/js/main.js', array('jquery'), '1.0', true);
    wp_localize_script('custom-form-js', 'customFormData', [
        'ajax_url' => admin_url('admin-ajax.php'),
        'nonce' => wp_create_nonce('custom_form_nonce')
    ]);
}
add_action('wp_enqueue_scripts', 'custom_form_enqueue_scripts');

// 2. Handle the form submission via AJAX
function handle_custom_form_submission() {
    // Check nonce
    if (!isset($_POST['nonce']) || !wp_verify_nonce($_POST['nonce'], 'custom_form_nonce')) {
        wp_send_json_error(['message' => 'Security check failed.']);
    }

    // Sanitize and validate form data
    $name = sanitize_text_field($_POST['name']);
    $subject = sanitize_text_field($_POST['subject']);
    $email = sanitize_email($_POST['email']);
    $message = sanitize_textarea_field($_POST['message']);

    // Basic validation
    if (empty($name) || empty($subject) || empty($email) || empty($message)) {
        wp_send_json_error(['message' => 'All fields are required.']);
    }

    // Send email (or you could save this to the database if required)
    $to = "nikita.bashenko2001@gmail.com"; // Send to site admin email
    $headers = ['Content-Type: text/html; charset=UTF-8'];
    $subject_line = "New Contact Form Message from: $name";
    $body = "Name: $name<br>Email: $email<br>Subject: $subject<br>Message: $message";

    $mail_sent = wp_mail($to, $subject_line, $body, $headers);

    if ($mail_sent) {
        wp_send_json_success(['message' => 'Your message was sent successfully!']);
    } else {
        wp_send_json_error(['message' => 'Failed to send your message. Please try again later.']);
    }
}
add_action('wp_ajax_submit_custom_form', 'handle_custom_form_submission');
add_action('wp_ajax_nopriv_submit_custom_form', 'handle_custom_form_submission');