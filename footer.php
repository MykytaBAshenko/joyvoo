<footer class="footer">
    <div class="footer-body container">
        <a class="poppins-white" href="<?php echo esc_url(home_url('/')); ?>">JOYVOO</a>

        <div class="footer-body-links">
            <div class="footer-body-links-l">
                <a href="<?php echo esc_url(home_url('/games')); ?>" class="text-decoration-none">Games</a>
                <div class="text-decoration-none contact-us">Contact us</div>
            </div>
            <div class="footer-body-links-i">
                <a href="https://www.linkedin.com/company/joyvoo/" target="_blank"><i class="bi bi-linkedin fs-4"></i></a>
                <a href="https://www.instagram.com/joyvoo.games/" target="_blank"><i class="bi bi-instagram fs-4"></i></a>
                <a href="https://apps.apple.com/us/developer/joyvoo-ltd/id441053285" target="_blank"><i class="bi bi-apple fs-4"></i></a>
                <a href="https://play.google.com/store/apps/developer?id=Joyvoo+LTD&hl=en" target="_blank"><i class="bi bi-google-play fs-4"></i></a>
            </div>
        </div>
    </div>

    <!-- Bottom Section with Dark Background -->
    <div class="footer-rights">
        All rights reserved © <span id="year"></span> JOYVOO
    </div>
</footer>

<!-- Contact Us Popup Form -->
<div class="contact-us-popup">
    <section class="section-form">
        <div class="contact-us-popup-layer close-popup"></div>
        <form id="custom-email-form" action="" method="POST">
            <i class="bi bi-x close-icon close-popup"></i>
            <input type="text" id="name" name="name" placeholder="Name" required>
            <input type="text" id="subject" name="subject" placeholder="Subject" required>
            <input placeholder="Email" type="email" id="email" name="email" required>
            <textarea id="message" name="message" placeholder="Message" required></textarea>
            
            <div id="captcha-section">
                <input type="checkbox" id="not-robot">
                <label for="not-robot">I AM HUMAN</label>
            </div>

            <button id="submit-button" type="submit" name="submit">SUBMIT</button>
            <div id="success-send" style="display: none;">Message Sent Successfully!</div>
        </form>
    </section>
</div>

<?php wp_footer(); // This is essential for WordPress to inject necessary scripts and resources ?>

<!-- Add custom JS file -->
<script src="<?php echo esc_url(get_template_directory_uri()); ?>/js.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">

</body>
</html>
