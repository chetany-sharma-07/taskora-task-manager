<?php
$currentPage = 'forgot-password';
$pageTitle = 'Forgot Password';
?>

<?php require_once __DIR__.'/components/auth-template.php'?>

            <section aria-labelledby="forgot-heading" class="flex w-full flex-1  justify-center overflow-y-auto bg-[#11183D] px-5 py-8 sm:px-8 md:w-1/2 md:px-10 md:py-8 lg:px-12">
                <div class="mx-auto w-full max-w-[440px]">
                    <header>
                        <h1 id="forgot-heading" class="text-[32px] font-bold tracking-tight text-[#F8FAFC] sm:text-[40px]">Forgot Password</h1>
                        <p class="mt-2 text-sm text-[#94A3B8]">We'll send a verification code to your email address.</p>
                    </header>
                    <form action="" method="post" class="mt-8 space-y-6">
                        <div>
                            <label for="forgotEmail" class="mb-1.5 block text-[13px] font-medium text-[#CBD5E1]">Email Address</label>
                            <div class="relative">
                                <i class="fa-regular fa-envelope pointer-events-none absolute left-4 top-1/2 -translate-y-1/2 text-sm text-[#64748B]" aria-hidden="true"></i>
                                <input id="forgotEmail" name="email" type="email" autocomplete="email" placeholder="Email Address" required class="h-11 w-full rounded-full border border-[#252B52] bg-[#0F1435] pl-12 pr-4 text-sm text-[#F8FAFC] outline-none transition duration-200 placeholder:text-[#64748B] focus:border-[#6366F1] focus:ring-4 focus:ring-[rgba(99,102,241,0.20)]">
                            </div>
                        </div>
                        <button type="submit" class="h-11 w-full rounded-full bg-[#6366F1] text-sm font-semibold text-[#F8FAFC] shadow-sm transition duration-200 hover:-translate-y-px hover:bg-[#5558E8]">Send Verification Code</button>
                    </form>
                </div>
            </section>
        </div>
    </main>
<?php require_once __DIR__.'/components/footer.php'?>

