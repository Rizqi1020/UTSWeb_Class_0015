document.addEventListener('DOMContentLoaded', function() {
    const contactForm = document.getElementById('contactForm');
    
    if (contactForm) {
        contactForm.addEventListener('submit', function(event) {
            event.preventDefault();
            const visitorName = document.getElementById('name').value.trim();
            const formContainer = contactForm.parentElement;

        formContainer.innerHTML = `
            <div class="text-center fade-in py-4">
            <h3 class="text-success mb-3">TRANSMISSION_SUCCESS_</h3>
            <p class="text-white-50 mb-4">
                Data received, Thank You, <strong class="text-warning">{visitorName || 'Operator'}</strong>.<br>
                Your Message has been encrypted and sent to the MadNeighbour secure server.
            </p>
            <button class="btn btn-outline-info retro-btn mt-3" onclick="location.reload()">
                SEND ANOTHER TRANSMISSION
            </button>
            </div>
         `;
        });
    }
});
