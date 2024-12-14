// Function to handle AJAX form submission
function submitForm(formId, endpoint) {
    const form = document.getElementById(formId);
    const formData = new FormData(form);

    // Clear previous error messages
    document.querySelectorAll('.error-message').forEach(el => el.textContent = '');
    form.querySelectorAll('.error-input').forEach(el => el.classList.remove('error-input'));

    fetch(endpoint, {
        method: 'POST',
        body: formData,
    })
    .then(response => response.json()) // Assuming the backend returns JSON
    .then(data => {
        if (data.success) {
            // Redirect or show success message
            window.location.href = data.redirect; // Redirect to a page on success
        } else {
            // Display errors dynamically
            for (const field in data.errors) {
                const errorField = form.querySelector(`[name="${field}"]`);
                if (errorField) {
                    errorField.classList.add('error-input');
                    const errorDiv = document.createElement('p');
                    errorDiv.className = 'error-message';
                    errorDiv.textContent = data.errors[field];
                    errorField.parentNode.insertBefore(errorDiv, errorField.nextSibling);
                }
            }
        }
    })
    .catch(error => console.error('Error:', error));
}

// Event listener for the registration form
document.getElementById('register-form').addEventListener('submit', function(e) {
    e.preventDefault();
    submitForm('register-form', 'process_register.php');
});

// Event listener for the login form
document.getElementById('login-form').addEventListener('submit', function(e) {
    e.preventDefault();
    submitForm('login-form', 'process_login.php');
});
