const passwordToggle = document.querySelector('[data-password-toggle]');
passwordToggle.addEventListener('click', () => {
    const password = document.getElementById('password');
    const icon = passwordToggle.querySelector('i');
    const showPassword = password.type === 'password';
    password.type = showPassword ? 'text' : 'password';
    passwordToggle.setAttribute('aria-label', showPassword ? 'Hide password' : 'Show password');
    icon.classList.toggle('fa-eye', !showPassword);
    icon.classList.toggle('fa-eye-slash', showPassword);
});

const loginSuccess = document.getElementById('loginSuccess');
const completedLogin = document.getElementById('completedLogin');
const loginSection = document.getElementById('loginSection');
const userName = document.getElementById('userName')

completedLogin.addEventListener("click", () => {
        loginSection.classList.add('hidden');
        loginSuccess.classList.remove('hidden');
        userName.textContent = 'User';
        window.setTimeout(() => { window.location.href = 'dashboard.php'; }, 2000);
})