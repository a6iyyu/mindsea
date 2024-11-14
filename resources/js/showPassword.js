document.addEventListener("DOMContentLoaded", () => {
    window.togglePassword = function(inputId) {
        const passwordInput = document.getElementById(inputId);
        const icon = document.getElementById(`${inputId}-icon`);
        
        if (passwordInput && icon) {
            if (passwordInput.type === 'password') {
                passwordInput.type = 'text';
                icon.classList.remove('fa-eye');
                icon.classList.add('fa-eye-slash');
            } else {
                passwordInput.type = 'password';
                icon.classList.remove('fa-eye-slash');
                icon.classList.add('fa-eye');
            }
        }
    }
}); 