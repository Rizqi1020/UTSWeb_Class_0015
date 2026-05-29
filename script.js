console.log("SYSTEM_STATUS: script.js successfully initialized.");

document.addEventListener('DOMContentLoaded', function() {
    console.log("SYSTEM_STATUS: DOM tree is ready.");
    
const themeToggle = document.getElementById('themeToggle');

if (localStorage.getItem('madNeighbourTheme') === 'light') {
    document.body.classList.add('light-mode');
    themeToggle.innerHTML = '> NIGHT_MODE';
}

themeToggle.addEventListener('click', function() {
    document.body.classList.toggle('light-mode');
    
    if (document.body.classList.contains('light-mode')) {
        localStorage.setItem('madNeighbourTheme', 'light');
        themeToggle.innerHTML = '> NIGHT_MODE';
    } else {
        localStorage.setItem('madNeighbourTheme', 'dark');
        themeToggle.innerHTML = '> DAY_MODE';
    }
});

    const contactForm = document.querySelector('#contact form');
    
    if (contactForm) {
        console.log("SYSTEM_STATUS: Transmission form located.");
        
        contactForm.addEventListener('submit', function(event) {
            event.preventDefault(); 
            
            console.log("SYSTEM_STATUS: Transmit button engaged! Intercepting data...");
            
            const nameInput = document.getElementById('name');
            const visitorName = nameInput ? nameInput.value : 'Operator';
            
            const formContainer = contactForm.parentElement;
            
            formContainer.innerHTML = `
                <div class="text-center fade-in py-4">
                    <h3 class="text-success blink-text mb-3">> TRANSMISSION_SUCCESS_</h3>
                    <p class="text-white-50 mb-4">
                        Data received. Thank you, <strong class="text-warning">${visitorName || 'Operator'}</strong>.<br>
                        Your message has been encrypted and sent to the MadNeighbour secure server.
                    </p>
                    <button class="btn btn-outline-info retro-btn mt-3" onclick="location.reload()">
                        SEND_ANOTHER_FILE
                    </button>
                </div>
            `;
        });
    } else {
        console.error("SYSTEM_ERROR: Form module not found! Verify section ID and form tags.");
    }
});

AOS.init({
    duration: 2000, 
    once: true,
    offset: 100,
    easing: 'ease-in-out'
});