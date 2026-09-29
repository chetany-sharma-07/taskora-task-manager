<?php
$currentPage = 'login';
$pageTitle = 'Login';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/png" href="assets/images/favicon.png?v=3" sizes="64x64">
    <!-- <link rel="icon" type="image/png" href="assets/images/Taskora_logo_new.png" > -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.0.0/css/all.min.css">
    <link rel="stylesheet" href="assets/css/output.css">
    <title><?= htmlspecialchars($pageTitle, ENT_QUOTES, 'UTF-8') ?> | Taskora</title>

    <style>
        input:-webkit-autofill,
        input:-webkit-autofill:hover,
        input:-webkit-autofill:focus,
        input:-webkit-autofill:active {
            -webkit-box-shadow: 0 0 0 1000px #0F1435 inset !important;
            -webkit-text-fill-color: #F8FAFC !important;
            caret-color: #F8FAFC !important;
            transition: background-color 9999s ease-in-out 0s;
        }

         /* <!-- Success checkmark ke liye chhoti pop animation. --> */
        .taskora-wordmark-depth {
            text-shadow:
                0 1px 0 rgba(203, 213, 225, 0.75),
                0 2px 0 rgba(148, 163, 184, 0.55),
                0 4px 0 rgba(15, 20, 53, 0.9),
                0 8px 16px rgba(8, 11, 42, 0.65),
                0 0 18px rgba(77, 220, 255, 0.14);
        }
        @keyframes account-check-pop {
            0% { opacity: 0; transform: scale(.4); }
            70% { opacity: 1; transform: scale(1.15); }
            100% { transform: scale(1); }
        }
        .account-check { animation: account-check-pop 500ms ease-out both; }
    </style>
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
                        <div class="taskora-wordmark-depth -mt-2 text-[30px] md:text-[40px] font-bold leading-none tracking-tight text-[#F8FAFC]">Taskor<span class="text-[#4DDCFF]">a</span></div>
                    </div>
                    <span aria-hidden="true" class="h-px w-10 rounded-full bg-[#4DDCFF]/70"></span>
                    <p class="text-xs font-medium tracking-wide text-[#CBD5E1]">Where Tasks Get Done</p>
                </div>
                <div aria-hidden="true" class="pointer-events-none absolute inset-x-0 bottom-0 h-64 bg-gradient-to-t from-[#080B2A]/75 via-[#080B2A]/30 to-transparent"></div>
                <div class="absolute bottom-7 left-6 z-10 max-w-[380px] sm:left-8 md:bottom-10 md:left-10">
                    <div class="mb-3 h-0.5 w-9 rounded-full bg-[#4DDCFF]"></div>
                    <h2 class="text-2xl font-semibold leading-[1.15] text-[#F8FAFC] md:text-[28px]">Welcome back.<br>Let's get things done.</h2>
                    <p class="mt-3 max-w-[360px] text-[13px] leading-[1.6] text-[#CBD5E1] md:text-sm">Pick up where you left off and keep your work moving forward with Taskora.</p>
                </div>
                <a id="backToLanding" href="index.php" aria-label="Back to landing page" class="absolute left-6 top-6 z-10 flex h-10 w-10 items-center justify-center rounded-full border border-white/20 bg-[#11183D]/80 text-[#F8FAFC] transition duration-200 hover:bg-[#1B2550]">
                    <i class="fa-solid fa-arrow-left text-sm" aria-hidden="true"></i>
                </a>
                <button id="backToDetails" type="button" aria-label="Back to details" class="absolute left-6 top-6 z-10 hidden h-10 w-10 items-center justify-center rounded-full border border-white/20 bg-[#11183D]/80 text-[#F8FAFC] transition duration-200 hover:bg-[#1B2550]">
                    <i class="fa-solid fa-arrow-left text-sm" aria-hidden="true"></i>
                </button>
            </section>

            <section aria-labelledby="login-heading" class="flex w-full flex-1 items-center justify-center overflow-y-auto bg-[#11183D] px-5 py-8 sm:px-8  md:w-1/2 md:px-10 md:py-8 lg:px-12">
                <div id="loginSection" class="mx-auto w-full max-w-[440px]">
                    <header>
                        <h1 id="login-heading" class="text-[30px] font-bold tracking-tight text-[#F8FAFC] sm:text-[32px]">Welcome back</h1>
                        <p class="mt-2 text-sm text-[#94A3B8]">Log in to your Taskora account to continue.</p>
                    </header>
                    <form action="" method="post" class="mt-10 space-y-4">
                        <div>
                            <label for="loginUser" class="mb-1.5 block text-[13px] font-medium text-[#CBD5E1]">Email or Username</label>
                            <div class="relative">
                            <i class="fa-solid fa-at pointer-events-none absolute left-4 top-1/2 -translate-y-1/2 text-sm text-[#64748B]" aria-hidden="true"></i>
                            <input id="loginUser" name="login_user" type="text" autocomplete="username" placeholder="Email Address or Username" required class="h-11 w-full rounded-full border border-[#252B52] bg-[#0F1435] pl-12 pr-4 text-sm text-[#F8FAFC] outline-none transition duration-200 placeholder:text-[#64748B] focus:border-[#6366F1] focus:ring-4 focus:ring-[rgba(99,102,241,0.20)]">
                            </div>
                        </div>
                        <div>
                            <label for="password" class="mb-1.5 block text-[13px] font-medium text-[#CBD5E1]">Password</label>
                            <div class="relative">
                                <i class="fa-solid fa-lock pointer-events-none absolute left-4 top-1/2 -translate-y-1/2 text-sm text-[#64748B]" aria-hidden="true"></i>
                                <input id="password" name="password" type="password" autocomplete="current-password" placeholder="Password" required class="h-11 w-full rounded-full border border-[#252B52] bg-[#0F1435] pl-12 pr-12 text-sm text-[#F8FAFC] outline-none transition duration-200 placeholder:text-[#64748B] focus:border-[#6366F1] focus:ring-4 focus:ring-[rgba(99,102,241,0.20)]">
                                <button type="button" data-password-toggle aria-label="Show password" aria-controls="password" class="absolute right-3 top-1/2 flex h-8 w-8 -translate-y-1/2 items-center justify-center rounded-full text-[#64748B] transition hover:text-[#F8FAFC]"><i class="fa-regular fa-eye" aria-hidden="true"></i></button>
                            </div>
                        </div>
                        <div class="flex flex-wrap items-center justify-between gap-x-3 gap-y-2 pt-1 text-xs">
                            <label for="remember" class="inline-flex items-center gap-2 text-[#94A3B8]"><input id="remember" name="remember" type="checkbox" class="h-4 w-4 rounded accent-[#6366F1]"><span>Remember me</span></label>
                            <a href="forgot_password.php" class="text-[#4DDCFF] transition hover:text-[#F8FAFC]">Forgot password?</a>
                        </div>
                        <button type="button" id="completedLogin" class="h-11 w-full rounded-full bg-[#6366F1] text-sm font-semibold text-[#F8FAFC] shadow-sm transition duration-200 hover:-translate-y-px hover:bg-[#5558E8]">Log In</button>
                    </form>
                    <!-- <div class="my-5 flex items-center gap-3" aria-label="Or continue with a social account">
                        <span class="h-px flex-1 bg-[#252B52]" aria-hidden="true"></span><span class="text-xs text-[#64748B]">or</span><span class="h-px flex-1 bg-[#252B52]" aria-hidden="true"></span>
                    </div> -->
                    <!-- <div class="flex flex-col gap-3 sm:flex-row">
                        <button type="button" class="flex h-11 w-full items-center justify-center gap-2 rounded-full border border-[#252B52] bg-[#0F1435] px-3 text-sm font-medium text-[#CBD5E1] transition duration-200 hover:bg-[#1B2550] hover:text-[#F8FAFC]"><i class="fa-brands fa-google" aria-hidden="true"></i><span>Continue with Google</span></button>
                        <button type="button" class="flex h-11 w-full items-center justify-center gap-2 rounded-full border border-[#252B52] bg-[#0F1435] px-3 text-sm font-medium text-[#CBD5E1] transition duration-200 hover:bg-[#1B2550] hover:text-[#F8FAFC]"><i class="fa-brands fa-facebook" aria-hidden="true"></i><span>Continue with Facebook</span></button>
                    </div> -->
                    <p class="mt-5 text-center text-[13px] text-[#94A3B8]">Don't have an account? <a href="register.php" class="font-medium text-[#4DDCFF] transition hover:text-[#F8FAFC]">Sign up</a></p>
                </div>

                 <!-- Step 3: login par redirect se pehle success message dikhana. -->
                <div id = "loginSuccess" class="hidden py-8 text-center" >
                    <div class="mx-auto flex h-16 w-16 items-center justify-center rounded-full bg-[#6366F1]/15 text-[#4DDCFF]">
                        <i class="fa-solid fa-check text-3xl account-check" aria-hidden="true"></i>
                    </div>
                    <h2 class="mt-5 text-2xl font-bold tracking-tight text-[#F8FAFC]">Login Successful</h2>
                    <p class="mt-2 text-sm text-[#CBD5E1]">Welcome, <span id="userName" class="font-semibold text-[#4DDCFF]"></span>!</p>
                    <p class="mt-4 text-sm text-[#94A3B8]">Redirecting to Dashboard...</p>
                </div>
            </section>
        </div>
    </main>
    <script>
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
    </script>
</body>
