
const contactUsButtons = document.querySelectorAll('.contact-us');
const videos = document.querySelectorAll('video');

videos.forEach(video => {
  video.addEventListener('click', (e) => {
    e.preventDefault(); 
    e.stopPropagation(); 
  });
  video.addEventListener('touchstart', (e) => e.preventDefault());
  video.addEventListener('touchend', (e) => e.preventDefault());
});

const imgs = document.querySelectorAll('img');

imgs.forEach(img => {
  img.addEventListener('click', (e) => {
    e.preventDefault(); 
    e.stopPropagation(); 
  });
  img.addEventListener('touchstart', (e) => e.preventDefault());
  img.addEventListener('touchend', (e) => e.preventDefault());
});

// Add an 'onclick' event to each element
contactUsButtons.forEach(button => {
  button.onclick = () => {
    const contactBtn = document.querySelectorAll('.contact-us-popup');
    contactBtn[0].style="display: block;"
    const body = document.querySelectorAll('html');
    body[0].style="overflow: hidden;"
  };
});

const closePopup = document.querySelectorAll('.close-popup');

// Add an 'onclick' event to each element
const displayNonePopup = () => {
    const contactBtn = document.querySelectorAll('.contact-us-popup');
    contactBtn[0].style="display: none;"
    const body = document.querySelectorAll('html');
    body[0].style=" overflow-x: hidden; "
}

closePopup.forEach(c => {
  c.onclick = (e) => {
    e.preventDefault()
    displayNonePopup()
  };
});


const form = document.getElementById('custom-email-form');
const submitButton = document.getElementById('submit-button');

form.addEventListener('submit', function(event) {
    event.preventDefault(); 

    const formData = new FormData(form); 

    // Add nonce to the request for security
    formData.append('action', 'submit_custom_form'); // Define the action
    formData.append('nonce', customFormData.nonce); // Get the nonce from the localized script
    submitButton.style = "display:none;";

    // Hide submit button and display captcha section
    // submitButton.style = "display:none;";
    // document.getElementById('captcha-section').style = "display:grid;";
    onSubmitWithCaptcha()
});

// Attach a one-time event listener to the CAPTCHA (not a checkbox anymore)
function onSubmitWithCaptcha() {
    // Get the reCAPTCHA token
    const token = grecaptcha.getResponse();
    if (!token) {
        alert('Please complete the CAPTCHA verification.');
        return;
    }


    const formData = new FormData(form); // Collect form data again
    formData.append('action', 'submit_custom_form'); // Define the action
    formData.append('nonce', customFormData.nonce); // Get the nonce from the localized script
    formData.append('g-recaptcha-response', token); // Add the CAPTCHA token to the form data

    fetch(customFormData.ajax_url, {
        method: 'POST',
        body: formData
    })
    .then(response => response.json())
    .then(data => {
        if (data.success) {
            document.getElementById('submit-button').style.display = 'none'
            setTimeout(() => {
                displayNonePopup();
                submitButton.style = "display:block;";
                document.getElementById('captcha-section').style = "display:grid;";
                document.getElementById('success-send').style.display = 'none';
                form.reset();
                grecaptcha.reset(); // Reset reCAPTCHA so the user can submit again if needed
            }, 3000)
            document.getElementById('captcha-section').style = "display:none;";
            document.getElementById('success-send').style.display = 'block';
        } else {
            alert(data.data.message);
        }
    })
    .catch(error => {
        console.error('Error:', error);
        alert('An unexpected error occurred.');
    })
}






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
    
setInterval(nextSlide, 2500);
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























const gameItems = document.querySelectorAll('.game-sheet-item-content');
gameItems.forEach((item, index) => {
    item.addEventListener('click', function () {
        const actionContainers = this.querySelectorAll('.game-sheet-item-content-action-container');
        const newContent = document.getElementById('popup-carousel-content');
        const popup = document.getElementById('popup-carousel');
        popup.style = "display: block;"
        const body = document.querySelectorAll('html');
        body[0].style="overflow: hidden;"
        Array.from(actionContainers[0].children).forEach((child) => {
            let clone = child.cloneNode(true)
            clone.style = "opacity: 1;"
            console.log(newContent)
            newContent.appendChild(clone); 
        });
        const workArray = Array.from(newContent.children)

        let leftClick = document.createElement("div")
        let rightClick = document.createElement("div")
        leftClick.id = "leftClick"
        rightClick.id = "rightClick"
        console.log(newContent)

        newContent.appendChild(leftClick); 
        console.log(newContent)

        newContent.appendChild(rightClick);
        let icon = document.createElement("i")
        // <i class="bi bi-x close-icon close-popup"></i>
        icon.classList = "bi bi-x close-icon"
        icon.id = "close-icon-popup"
            console.log(newContent)

        newContent.appendChild(icon)
        
        let currentIndex = workArray.length - 1;
        const initSlider = () => {
            for (let i = 0; i < workArray.length; i++) {
                workArray[i].style = "display:none;"
                workArray[currentIndex].style = "display: block;"
            }
            if (workArray[currentIndex].tagName === "VIDEO") {
                workArray[currentIndex].currentTime = 0;
                workArray[currentIndex].muted = false;
                workArray[currentIndex].play()
            }
        }
        initSlider()
        const muteAll = () => {
            for(let i = 0; i < workArray.length;i++){
                if (workArray[i]) {
                    if (workArray[i].tagName === "VIDEO") {
                        workArray[i].muted = true;
                    }
                    workArray[i].style = "display: none;"
                }
            }
        }
        const moveBack = () => {
            muteAll()
            currentIndex--
            if (currentIndex < 0) {
                currentIndex = workArray.length - 1;
            }
            workArray[currentIndex].style = "display: block;"
            if (workArray[currentIndex].tagName === "VIDEO") {
                workArray[currentIndex].currentTime = 0;
                workArray[currentIndex].muted = false;
                workArray[currentIndex].play()
            }
        }
     
        const moveForward = () => {
            muteAll()
            currentIndex++
            if (currentIndex > workArray.length - 1) {
                currentIndex = 0; 
            }
            workArray[currentIndex].style = "display: block;"
            if (workArray[currentIndex].tagName === "VIDEO") {
                workArray[currentIndex].currentTime = 0;
                workArray[currentIndex].muted = false;
                workArray[currentIndex].play()
            }
        }

        leftClick.addEventListener('click', function() {
            moveForward()
        })

        rightClick.addEventListener('click', function() {
            moveBack()
        })

        const closeSlice = () => {
            const body = document.querySelectorAll('html');
            body[0].style=" overflow-x: hidden; "
            const popup = document.getElementById('popup-carousel');
            popup.style = "display: none;"
            const newContent = document.getElementById('popup-carousel-content');
            while (newContent.firstChild) {
                newContent.removeChild(newContent.firstChild);
            }
        }

        document.getElementById('popup-carousel-layer').addEventListener('click', closeSlice)
        icon.addEventListener('click', closeSlice)

    });
});


const slidersItems = document.querySelectorAll('.game-sheet-item-content-action-container');
slidersItems.forEach((item, index) => {
    function initSlides() {
        let doSlider = true;
        Array.from(item.children).forEach((child) => {
            // child.style = "opacity"
            if (child.tagName === "VIDEO") {
                child.style = "opacity: 1;"
                doSlider = false;
            } else if (child.tagName === "IMG") {
                child.style = "opacity: 0;"
            }
        });
        if (doSlider) {
            moveSlides()
            setInterval(moveSlides, 3000);
        }
    }
    let childrenLen = item.children.length
    let childrenIndex = 0
    function moveSlides() {
        Array.from(item.children).forEach((child, index) => {
            if (index === childrenIndex) {
                child.style = "opacity: 1;"
            } else {
                child.style = "opacity: 0;"
            }
            
        });
        childrenIndex = (childrenIndex + 1) % childrenLen;

    }

    initSlides()

})