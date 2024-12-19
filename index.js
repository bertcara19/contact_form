document.addEventListener("DOMContentLoaded", function() {
    const form = document.getElementById('contact-form');
    form.addEventListener('submit', showThankYouMessage);
});

function showThankYouMessage(event) {
    event.preventDefault(); // Prevent the form from submitting the traditional way

    const form = document.getElementById('contact-form');
    const formData = new FormData(form);

    fetch(form.action, {
        method: 'POST',
        body: formData
    })
    .then(response => {
        if (!response.ok) {
            throw new Error('Network response was not ok');
        }
        return response.text();
    })
    .then(responseText => {
        console.log('Form submission successful:', responseText); // Log the response from the server
        document.getElementById('thank-you-modal').style.display = 'block';
        document.getElementById('thank-you-modal').querySelector('p').innerText = responseText;
    })
    .catch(error => {
        console.error('There was a problem with your form submission:', error);
    });

    return false; // Prevent the form from submitting the traditional way
}

function closeThankYouMessage() {
    document.getElementById('thank-you-modal').style.display = 'none';
}
