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

completedLogin.addEventListener("click", async () => {
        const loginUser = document.getElementById('loginUser');
        const password = document.getElementById('password');
        const remember = document.getElementById('remember');
        const loginError = document.getElementById('loginError');

        try {
            const response = await fetch('../api/auth/login_user.php', {
                method : 'POST',
                headers: {
                    'Content-Type': 'application/json'
                },
                body: JSON.stringify({
                    login_user: loginUser.value,
                    password: password.value,
                    remember: remember.checked
                })  
            });
            const data = await response.json();

            if (data.success) {
                loginError.textContent = '';
                userName.textContent = data.user.full_name;
                loginSection.classList.add('hidden');
                loginSuccess.classList.remove('hidden');
                window.setTimeout(() => { window.location.href = 'dashboard.php'; }, 2000);
            }else if (data.error) {
                loginError.textContent = data.error;
            }else {
                loginError.textContent = 'An unexpected error occurred. Please try again.';
            }
 
        }catch (error) {
            console.error('Error:', error);
            loginError.textContent = 'An error occurred. Please try again.';
        }
});