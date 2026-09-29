const detailsStep = document.getElementById('detailsStep');
const passwordStep = document.getElementById('passwordStep');
const completedStep = document.getElementById('completedStep');
const signupHeading = document.getElementById('signup-heading');
const signupSubtitle = document.getElementById('signupSubtitle');
const progressFill = document.getElementById('progressFill');
const loginPrompt = document.getElementById('loginPrompt');
const backToLanding = document.getElementById('backToLanding');
const backToDetails = document.getElementById('backToDetails');
const signupForm = document.getElementById('signupForm');
let currentStep = 1;

// Progress line update karta hai aur complete steps ke number ki jagah tick dikhata hai.
function updateProgress(step) {
    currentStep = step;
    progressFill.style.width = `${(step - 1) * 50}%`;

    document.querySelectorAll('[data-step-indicator]').forEach((item) => {
        const itemStep = Number(item.dataset.stepIndicator);
        const circle = item.querySelector('.step-circle');
        const number = item.querySelector('.step-number');
        const check = item.querySelector('.step-check');
        const isComplete = itemStep < step || step === 3;
        const isCurrent = itemStep === step;

        item.classList.toggle('text-[#CBD5E1]', isCurrent || isComplete);
        item.classList.toggle('text-[#64748B]', !isCurrent && !isComplete);
        circle.classList.toggle('border-[#6366F1]', isCurrent || isComplete);
        circle.classList.toggle('bg-[#6366F1]', isCurrent || isComplete);
        circle.classList.toggle('text-white', isCurrent || isComplete);
        circle.classList.toggle('border-[#252B52]', !isCurrent && !isComplete);
        circle.classList.toggle('bg-[#11183D]', !isCurrent && !isComplete);
        circle.classList.toggle('text-[#94A3B8]', !isCurrent && !isComplete);
        number.classList.toggle('hidden', isComplete);
        check.style.display = isComplete ? 'inline-block' : 'none';
    });
}

// Sahi panel dikhata hai; title, subtitle aur back button bhi update karta hai.
function showStep(step) {
    detailsStep.hidden = step !== 1;
    passwordStep.hidden = step !== 2;
    completedStep.hidden = step !== 3;
    detailsStep.classList.toggle('hidden', step !== 1);
    passwordStep.classList.toggle('hidden', step !== 2);
    completedStep.classList.toggle('hidden', step !== 3);
    document.getElementById('signupHeader').classList.toggle('hidden', step === 3);
    backToLanding.classList.toggle('hidden', step !== 1);
    backToDetails.classList.toggle('hidden', step !== 2);
    loginPrompt.classList.toggle('hidden', step === 3);

    if (step === 1) {
        signupHeading.textContent = 'Add Details';
        signupSubtitle.textContent = 'Start with your name, username, and email address.';
    } else if (step === 2) {
        signupHeading.textContent = 'Set Password';
        signupSubtitle.textContent = 'Choose a secure password for your Taskora account.';
    } else {
        signupHeading.textContent = 'Account Created';
        signupSubtitle.textContent = 'Your Taskora account is ready.';
    }

    updateProgress(step);
}

// Sirf abhi dikh rahe step ke required fields validate karta hai.
function validateFields(container) {
    const fields = [...container.querySelectorAll('input[required]')];
    const invalidField = fields.find((field) => !field.checkValidity());
    if (invalidField) {
        invalidField.reportValidity();
        invalidField.focus();
        return false;
    }
    return true;
}

// Details valid hone ke baad hi Password step par jaata hai.
document.getElementById('nextStep').addEventListener('click', () => {
    if (!validateFields(detailsStep)) return;
    showStep(2);
});

backToDetails.addEventListener('click', () => showStep(1));

// Password aur Terms check karta hai, success screen dikhata hai, phir login par bhejta hai.
document.getElementById('completeSignup').addEventListener('click', () => {
    document.getElementById('confirmPassword').setCustomValidity('');
    if (!validateFields(passwordStep)) return;

    const password = document.getElementById('password');
    const confirmPassword = document.getElementById('confirmPassword');
    confirmPassword.setCustomValidity(password.value === confirmPassword.value ? '' : 'Passwords do not match.');
    if (!confirmPassword.checkValidity()) {
        confirmPassword.reportValidity();
        confirmPassword.focus();
        return;
    }

    document.getElementById('createdName').textContent = document.getElementById('fullName').value.trim();
    showStep(3);
    window.setTimeout(() => { window.location.href = 'login.php'; }, 2000);
});

// Confirm password badalne par purana mismatch error hata deta hai.
document.getElementById('confirmPassword').addEventListener('input', (event) => event.currentTarget.setCustomValidity(''));

// Eye button se password ko hide ya visible karta hai.
document.querySelectorAll('[data-password-toggle]').forEach((button) => {
    button.addEventListener('click', () => {
        const input = document.getElementById(button.dataset.passwordToggle);
        const icon = button.querySelector('i');
        const isVisible = input.type === 'text';

        input.type = isVisible ? 'password' : 'text';
        button.setAttribute('aria-label', isVisible ? 'Show password' : 'Hide password');
        icon.classList.toggle('fa-eye', isVisible);
        icon.classList.toggle('fa-eye-slash', !isVisible);
        icon.classList.toggle('fa-regular', isVisible);
        icon.classList.toggle('fa-solid', !isVisible);
    });
});