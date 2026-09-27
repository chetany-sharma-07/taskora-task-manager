<?php
// Page ki pehchan aur browser tab mein dikhne wala title.
$currentPage = 'register';
$pageTitle = 'Create Account';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/png" href="assets/images/favicon.png?v=3" sizes="64x64">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.0.0/css/all.min.css">
    <link rel="stylesheet" href="assets/css/output.css">
    <title><?= htmlspecialchars($pageTitle, ENT_QUOTES, 'UTF-8') ?> | Taskora</title>
</head>

<body class="min-h-screen overflow-x-hidden bg-[#080B2A] text-[#F8FAFC]">
    <!-- Main wrapper signup card ko center karta hai; desktop par extra spacing deta hai. -->
    <main class="flex min-h-screen items-center justify-center p-0 md:p-6">
        <div class="flex w-full max-w-6xl flex-col overflow-hidden border border-[#252B52] bg-[#11183D] shadow-2xl shadow-black/30 md:h-[calc(100vh-48px)] md:flex-row md:rounded-3xl">
            <!-- Left panel: background image, dark overlay aur step ke hisaab se back button. -->
            <section aria-label="Taskora welcome image" class="relative min-h-[360px] w-full shrink-0 bg-cover bg-center md:min-h-0 md:w-1/2" style="background-image: url('assets/images/login_signup_bgimage.png');">
                <div class="absolute inset-0 bg-[#080B2A]/20"></div>
                <div class="absolute left-1/2 top-[30%] md:top-[40%] z-10 flex -translate-x-1/2 -translate-y-1/2 flex-col items-center gap-2 text-center ">
                    <div class="flex flex-col  items-center ">
                        <img src="assets/images/Taskora_logo_new.png" alt="" class=" h-[150px] w-[150px] md:h-50  md:w-50 object-contain drop-shadow-[0_0_24px_rgba(77,220,255,0.18)]">
                        <div class="-mt-2 text-[50px] font-bold leading-none tracking-tight text-[#F8FAFC]">Taskor<span class="text-[#4DDCFF]">a</span></div>
                    </div>
                    <!-- <span aria-hidden="true" class="h-px w-10 rounded-full bg-[#4DDCFF]/70"></span> -->
                    <!-- <p class="text-xs font-medium tracking-wide text-[#CBD5E1]">Where Tasks Get Done</p> -->
                </div>
                <div aria-hidden="true" class="pointer-events-none absolute inset-x-0 bottom-0 h-64 bg-gradient-to-t from-[#080B2A]/75 via-[#080B2A]/30 to-transparent"></div>
                <div class="absolute bottom-7 left-6 z-10 max-w-[380px] sm:left-8 md:bottom-10 md:left-10">
                    <div class="mb-3 h-0.5 w-9 rounded-full bg-[#4DDCFF]"></div>
                    <h2 class="text-2xl font-semibold leading-[1.15] text-[#F8FAFC] md:text-[28px]">Get things done.<br>Stay organized.</h2>
                    <p class="mt-3 max-w-[360px] text-[13px] leading-[1.6] text-[#CBD5E1] md:text-sm">Plan your tasks, stay focused, and keep everything organized with Taskora.</p>
                </div>
                <a id="backToLanding" href="index.php" aria-label="Back to landing page" class="absolute left-6 top-6 z-10 flex h-10 w-10 items-center justify-center rounded-full border border-white/20 bg-[#11183D]/80 text-[#F8FAFC] transition duration-200 hover:bg-[#1B2550]">
                    <i class="fa-solid fa-arrow-left text-sm" aria-hidden="true"></i>
                </a>
                <button id="backToDetails" type="button" aria-label="Back to details" class="absolute left-6 top-6 z-10 hidden h-10 w-10 items-center justify-center rounded-full border border-white/20 bg-[#11183D]/80 text-[#F8FAFC] transition duration-200 hover:bg-[#1B2550]">
                    <i class="fa-solid fa-arrow-left text-sm" aria-hidden="true"></i>
                </button>
            </section>

            <!-- Right panel mein heading, progress bar aur signup ke steps hain. -->
            <section aria-labelledby="signup-heading" class="flex w-full flex-1 items-center justify-center overflow-y-auto bg-[#11183D] px-5 py-8 sm:px-8 md:w-1/2 md:px-10 md:py-8 lg:px-12">
                <div class="mx-auto w-full max-w-[460px]">
                    <!-- Step badalne par heading aur subtitle JavaScript se update hote hain. -->
                    <header id="signupHeader">
                        <h1 id="signup-heading" class="text-[28px] font-bold tracking-tight text-[#F8FAFC] sm:text-3xl">Add Details</h1>
                        <p id="signupSubtitle" class="mt-2 text-sm text-[#94A3B8]">Start with your name, username, and email address.</p>
                    </header>

                    <!-- Teen steps ka progress bar; JavaScript line bharta aur complete steps par tick dikhata hai. -->
                    <ol id="signupProgress" aria-label="Signup progress" class="relative mt-7 grid grid-cols-3">
                        <div class="absolute left-[16.67%] right-[16.67%] top-4 h-0.5 bg-[#252B52]" aria-hidden="true"><div id="progressFill" class="h-full w-0 bg-[#6366F1] transition-all duration-300"></div></div>
                        <li data-step-indicator="1" class="relative flex flex-col items-center gap-2 text-xs font-medium text-[#CBD5E1]">
                            <span class="step-circle z-10 flex h-8 w-8 items-center justify-center rounded-full border border-[#6366F1] bg-[#6366F1] text-white"><span class="step-number">1</span><i class="step-check fa-solid fa-check" aria-hidden="true" style="display: none;"></i></span>
                            <span>Details</span>
                        </li>
                        <li data-step-indicator="2" class="relative flex flex-col items-center gap-2 text-xs font-medium text-[#64748B]">
                            <span class="step-circle z-10 flex h-8 w-8 items-center justify-center rounded-full border border-[#252B52] bg-[#11183D] text-[#94A3B8]"><span class="step-number">2</span><i class="step-check fa-solid fa-check" aria-hidden="true" style="display: none;"></i></span>
                            <span>Password</span>
                        </li>
                        <li data-step-indicator="3" class="relative flex flex-col items-center gap-2 text-xs font-medium text-[#64748B]">
                            <span class="step-circle z-10 flex h-8 w-8 items-center justify-center rounded-full border border-[#252B52] bg-[#11183D] text-[#94A3B8]"><span class="step-number">3</span><i class="step-check fa-solid fa-check" aria-hidden="true" style="display: none;"></i></span>
                            <span>Created</span>
                        </li>
                    </ol>

                    <!-- Ek hi form mein sabhi steps hain; JavaScript ek waqt mein ek panel dikhata hai. -->
                    <form id="signupForm" action="" method="post" novalidate class="mt-6">
                        <!-- Step 1: user ki basic details lena aur validate karna. -->
                        <div id="detailsStep" class="space-y-4">
                            <div>
                                <label for="fullName" class="mb-1.5 block text-[13px] font-medium text-[#CBD5E1]">Full Name</label>
                                <div class="relative">
                                    <i class="fa-regular fa-user pointer-events-none absolute left-4 top-1/2 -translate-y-1/2 text-sm text-[#64748B]" aria-hidden="true"></i>
                                    <input id="fullName" name="fullName" type="text" autocomplete="name" placeholder="Full Name" required class="h-11 w-full rounded-full border border-[#252B52] bg-[#0F1435] pl-12 pr-4 text-sm text-[#F8FAFC] outline-none transition duration-200 placeholder:text-[#64748B] focus:border-[#6366F1] focus:ring-4 focus:ring-[rgba(99,102,241,0.20)]">
                                </div>
                            </div>
                            <div>
                                <label for="username" class="mb-1.5 block text-[13px] font-medium text-[#CBD5E1]">Username</label>
                                <div class="relative">
                                    <i class="fa-solid fa-at pointer-events-none absolute left-4 top-1/2 -translate-y-1/2 text-sm text-[#64748B]" aria-hidden="true"></i>
                                    <input id="username" name="username" type="text" autocomplete="username" placeholder="csharma123" required class="h-11 w-full rounded-full border border-[#252B52] bg-[#0F1435] pl-12 pr-4 text-sm text-[#F8FAFC] outline-none transition duration-200 placeholder:text-[#64748B] focus:border-[#6366F1] focus:ring-4 focus:ring-[rgba(99,102,241,0.20)]">
                                </div>
                            </div>
                            <div>
                                <label for="email" class="mb-1.5 block text-[13px] font-medium text-[#CBD5E1]">Email Address</label>
                                <div class="relative">
                                    <i class="fa-regular fa-envelope pointer-events-none absolute left-4 top-1/2 -translate-y-1/2 text-sm text-[#64748B]" aria-hidden="true"></i>
                                    <input id="email" name="email" type="email" autocomplete="email" placeholder="Email Address" required class="h-11 w-full rounded-full border border-[#252B52] bg-[#0F1435] pl-12 pr-4 text-sm text-[#F8FAFC] outline-none transition duration-200 placeholder:text-[#64748B] focus:border-[#6366F1] focus:ring-4 focus:ring-[rgba(99,102,241,0.20)]">
                                </div>
                            </div>
                            <button id="nextStep" type="button" class="h-11 w-full rounded-full bg-[#6366F1] text-sm font-semibold text-[#F8FAFC] shadow-sm transition duration-200 hover:-translate-y-px hover:bg-[#5558E8]">Next</button>
                        </div>

                        <!-- Step 2: password lena aur Terms checkbox ko required rakhna. -->
                        <div id="passwordStep" class="hidden space-y-4" hidden>
                            <div>
                                <label for="password" class="mb-1.5 block text-[13px] font-medium text-[#CBD5E1]">Password</label>
                                <div class="relative">
                                    <i class="fa-solid fa-lock pointer-events-none absolute left-4 top-1/2 -translate-y-1/2 text-sm text-[#64748B]" aria-hidden="true"></i>
                                    <input id="password" name="password" type="password" autocomplete="new-password" placeholder="Password" required class="h-11 w-full rounded-full border border-[#252B52] bg-[#0F1435] pl-12 pr-12 text-sm text-[#F8FAFC] outline-none transition duration-200 placeholder:text-[#64748B] focus:border-[#6366F1] focus:ring-4 focus:ring-[rgba(99,102,241,0.20)]">
                                    <button type="button" data-password-toggle="password" aria-label="Show password" class="absolute right-3 top-1/2 flex h-8 w-8 -translate-y-1/2 items-center justify-center rounded-full text-[#64748B] transition hover:text-[#F8FAFC]"><i class="fa-regular fa-eye" aria-hidden="true"></i></button>
                                </div>
                            </div>
                            <div>
                                <label for="confirmPassword" class="mb-1.5 block text-[13px] font-medium text-[#CBD5E1]">Confirm Password</label>
                                <div class="relative">
                                    <i class="fa-solid fa-lock pointer-events-none absolute left-4 top-1/2 -translate-y-1/2 text-sm text-[#64748B]" aria-hidden="true"></i>
                                    <input id="confirmPassword" name="confirmPassword" type="password" autocomplete="new-password" placeholder="Confirm Password" required class="h-11 w-full rounded-full border border-[#252B52] bg-[#0F1435] pl-12 pr-12 text-sm text-[#F8FAFC] outline-none transition duration-200 placeholder:text-[#64748B] focus:border-[#6366F1] focus:ring-4 focus:ring-[rgba(99,102,241,0.20)]">
                                    <button type="button" data-password-toggle="confirmPassword" aria-label="Show password" class="absolute right-3 top-1/2 flex h-8 w-8 -translate-y-1/2 items-center justify-center rounded-full text-[#64748B] transition hover:text-[#F8FAFC]"><i class="fa-regular fa-eye" aria-hidden="true"></i></button>
                                </div>
                            </div>
                            <label class="flex items-start gap-2 text-xs leading-5 text-[#94A3B8]">
                                <input id="terms" type="checkbox" name="terms" required class="mt-0.5 h-4 w-4 shrink-0 accent-[#6366F1]">
                                <span>I agree to the <a href="#terms" class="text-[#4DDCFF] transition hover:text-[#F8FAFC]">Terms &amp; Conditions</a></span>
                            </label>
                            <button id="completeSignup" type="button" class="h-11 w-full rounded-full bg-[#6366F1] text-sm font-semibold text-[#F8FAFC] shadow-sm transition duration-200 hover:-translate-y-px hover:bg-[#5558E8]">Set Password</button>
                        </div>

                        <!-- Step 3: login par redirect se pehle success message dikhana. -->
                        <div id="completedStep" class="hidden py-8 text-center" hidden>
                            <div class="mx-auto flex h-16 w-16 items-center justify-center rounded-full bg-[#6366F1]/15 text-[#4DDCFF]">
                                <i class="fa-solid fa-check text-3xl account-check" aria-hidden="true"></i>
                            </div>
                            <h2 class="mt-5 text-2xl font-bold tracking-tight text-[#F8FAFC]">Account Created</h2>
                            <p class="mt-2 text-sm text-[#CBD5E1]">Welcome, <span id="createdName" class="font-semibold text-[#4DDCFF]"></span>!</p>
                            <p class="mt-4 text-sm text-[#94A3B8]">Redirecting to login...</p>
                        </div>
                    </form>

                    <p id="loginPrompt" class="mt-5 text-center text-sm text-[#94A3B8]">Already have an account? <a href="login.php" class="font-medium text-[#4DDCFF] transition hover:text-[#F8FAFC]">Log in</a></p>
                </div>
            </section>
        </div>
    </main>

    <!-- Success checkmark ke liye chhoti pop animation. -->
    <style>
        @keyframes account-check-pop {
            0% { opacity: 0; transform: scale(.4); }
            70% { opacity: 1; transform: scale(1.15); }
            100% { transform: scale(1); }
        }
        .account-check { animation: account-check-pop 500ms ease-out both; }
    </style>

    <!-- JavaScript: step navigation, validation, progress update, password toggle aur redirect. -->
    <script>
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
    </script>
</body>
</html>
