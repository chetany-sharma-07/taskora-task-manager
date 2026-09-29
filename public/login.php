<?php
$currentPage = 'login';
$pageTitle = 'Login';
?>

<?php require_once __DIR__.'/components/auth-template.php'?>

            <section aria-labelledby="login-heading" class="flex w-full flex-1 items-center justify-center overflow-y-auto bg-[#11183D] px-5 py-8 sm:px-8  md:w-1/2 md:px-10 md:py-8 lg:px-12">
                <div id="loginSection" class="mx-auto w-full max-w-[440px]">
                    <header>
                        <h1 id="login-heading" class="text-[40px] font-bold tracking-tight text-[#F8FAFC] ">Log in</h1>
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
                            <a href="forgot-password.php" class="text-[#4DDCFF] transition hover:text-[#F8FAFC] ">Forgot password?</a>
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


                <div>

                </div>

                 <!-- Login Sucess and Dashboard Redirect-->
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
    <script src="assets/js/login.js"></script>

<?php require_once __DIR__.'/components/footer.php'?>

