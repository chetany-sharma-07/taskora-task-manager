<?php
// Page ki pehchan aur browser tab mein dikhne wala title.
$currentPage = 'register';
$pageTitle = 'Create Account';
?>

<?php require_once __DIR__.'/components/auth-template.php'?>

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
                    <form id="signupForm"  method="post" novalidate class="mt-6">
                        <!-- Step 1: user ki basic details lena aur validate karna. -->
                        <div id="detailsStep" class="space-y-2">
                            <p id="detailsError" class="hidden text-sm text-red-400" role="alert" aria-live="polite"></p>
                            <div>
                                <label for="fullName" class="mb-1.5 block text-[13px] font-medium text-[#CBD5E1]">Full Name</label>
                                <div class="relative">
                                    <i class="fa-regular fa-user pointer-events-none absolute left-4 top-1/2 -translate-y-1/2 text-sm text-[#64748B]" aria-hidden="true"></i>
                                    <input id="fullName" name="fullName" type="text" autocomplete="name" placeholder="Full Name" required class="h-11 w-full rounded-full border border-[#252B52] bg-[#0F1435] pl-12 pr-4 text-sm text-[#F8FAFC] outline-none transition duration-200 placeholder:text-[#64748B] focus:border-[#6366F1] focus:ring-4 focus:ring-[rgba(99,102,241,0.20)]">
                                </div>
                                <span id="fullNameError" class="ml-4 text-red-400 text-xs"></span>
                            </div>
                            <div>
                                <label for="username" class="mb-1.5 block text-[13px] font-medium text-[#CBD5E1]">Username</label>
                                <div class="relative">
                                    <i class="fa-solid fa-at pointer-events-none absolute left-4 top-1/2 -translate-y-1/2 text-sm text-[#64748B]" aria-hidden="true"></i>
                                    <input id="username" name="username" type="text" autocomplete="username" placeholder="for ex. ,username123" required class="h-11 w-full rounded-full border border-[#252B52] bg-[#0F1435] pl-12 pr-4 text-sm text-[#F8FAFC] outline-none transition duration-200 placeholder:text-[#64748B] focus:border-[#6366F1] focus:ring-4 focus:ring-[rgba(99,102,241,0.20)]">
                                </div>
                                <span id="usernameError" class="ml-4 text-red-400 text-xs"></span>
                            </div>
                            <div>
                                <label for="email" class="mb-1.5 block text-[13px] font-medium text-[#CBD5E1]">Email Address</label>
                                <div class="relative">
                                    <i class="fa-regular fa-envelope pointer-events-none absolute left-4 top-1/2 -translate-y-1/2 text-sm text-[#64748B]" aria-hidden="true"></i>
                                    <input id="email" name="email" type="email" autocomplete="email" placeholder="Email Address" required class="h-11 w-full rounded-full border border-[#252B52] bg-[#0F1435] pl-12 pr-12 text-sm text-[#F8FAFC] outline-none transition duration-200 placeholder:text-[#64748B] focus:border-[#6366F1] focus:ring-4 focus:ring-[rgba(99,102,241,0.20)]">
                                    <button type="button" id="verifyEmail" aria-live="polite" class="absolute right-3 top-1/2 z-10 -translate-y-1/2 rounded-full bg-[#0F1435] px-2 py-1 text-xs font-semibold text-[#4DDCFF] transition hover:text-[#F8FAFC] focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-[#6366F1]"><span id="verifyEmailLabel">Verify</span><span id="verifyEmailSpinner" class="verify-spinner hidden" aria-hidden="true"></span></button>
                                </div>
                                <span id="emailError" class="ml-4 text-red-400 text-xs"></span>
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

    
    <!-- JavaScript: step navigation, validation, progress update, password toggle aur redirect. -->
   <script src="assets/js/register.js"></script>
<?php require_once __DIR__.'/components/footer.php'?>
