const closeButtons = document.querySelectorAll('.contact-us');
    
// Add an 'onclick' event to each element
closeButtons.forEach(button => {
  button.onclick = () => {
    const contactBtn = document.querySelectorAll('.contact-us-popup');
    contactBtn[0].style="display: block;"
    const body = document.querySelectorAll('html');
    body[0].style="overflow: hidden;"
  };
});

const closePopup = document.querySelectorAll('.close-popup');

// Add an 'onclick' event to each element
closePopup.forEach(c => {
  c.onclick = () => {
    const contactBtn = document.querySelectorAll('.contact-us-popup');
    contactBtn[0].style="display: none;"
    const body = document.querySelectorAll('html');
    body[0].style=" overflow-x: hidden; "
  };
});


document.getElementById('captcha-section').style = "display:none;"
document.getElementById('custom-email-form').addEventListener('submit', function(event) {
    event.preventDefault(); // Prevent default form submission

    const formData = new FormData(this); // Collect form data

    // Add nonce to the request for security
    formData.append('action', 'submit_custom_form'); // Define the action
    formData.append('nonce', '<?php echo wp_create_nonce("custom_form_nonce"); ?>');
    document.getElementById('submit-button').style = "display:none;"
    document.getElementById('captcha-section').style = "display:grid;"
    document.getElementById('not-robot').addEventListener('click', function(event) {
            // event.preventDefault(); // Prevent default form submission
            if (document.getElementById('not-robot').checked) {
                fetch('<?php echo admin_url("admin-ajax.php"); ?>', {
                    method: 'POST',
                    body: formData
                })
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        alert(data.data.message);
                    } else {
                        alert(data.data.message);
                    }
                })
                .catch(error => {
                    console.error('Error:', error);
                    alert('An unexpected error occurred.');
                });
            }
    })
    
});








const slider = document.querySelector('.slider');
const slides = document.querySelector('.slides');
const slideCount = document.querySelectorAll('.slides img')

let currentSlide = 0;

// Update slide position based on index
function updateSlidePosition() {
    for (let l = 0; l < slideCount.length; l++) {
        slideCount[l].style = "opacity: 0;"
    }
    slideCount[currentSlide].style =  "opacity: 1;"
}

// Move to the next slide
function nextSlide() {
  currentSlide = (currentSlide + 1) % slideCount.length; // Loop back to first slide
  updateSlidePosition();
}

// Move to the previous slide
function prevSlide() {
  currentSlide = (currentSlide - 1 + slideCount.length) % slideCount.length; // Loop back to last slide
  updateSlidePosition();
}

// Add click event listeners to the navigation zones


// Auto slide every 4 seconds
if (slideCount.length) {
    
setInterval(nextSlide, 3000);
updateSlidePosition()
document.querySelector('.left').addEventListener('click', prevSlide);
document.querySelector('.right').addEventListener('click', nextSlide);
}

const currentYear = new Date().getFullYear();

// Update the content of the element with id 'year'
let y = document.getElementById('year')
if (y) {
    y.textContent = currentYear;
}