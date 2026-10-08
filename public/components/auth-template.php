
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/png" href="assets/images/favicon.png?v=3" sizes="64x64">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.0.0/css/all.min.css">
    
    <link rel="stylesheet" href="assets/css/<?= htmlspecialchars($currentPage, ENT_QUOTES, 'UTF-8') ?>.css?v=2">

    <!-- common css file for login/register/forgot-password-->
    <link rel="stylesheet" href="assets/css/auth.css">

    <!-- tailwind generated css -->
    <link rel="stylesheet" href="assets/css/output.css">

    <!-- page title as per $pageTitle -->
    <title><?= htmlspecialchars($pageTitle, ENT_QUOTES, 'UTF-8') ?> | Taskora</title>
</head>

<body class="min-h-screen overflow-x-hidden bg-[#080B2A] text-[#F8FAFC]">
    <!-- Main wrapper card ko center karta hai; desktop par extra spacing deta hai. -->
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
                    <h2 id="tagHeading" class="text-2xl font-semibold leading-[1.15] text-[#F8FAFC] md:text-[28px]">Get things done.<br>Stay organized.</h2>
                    <p id="tagDescription" class="mt-3 max-w-[360px] text-[13px] leading-[1.6] text-[#CBD5E1] md:text-sm">Plan your tasks, stay focused, and keep everything organized with Taskora.</p>
                </div>
                <a id="backToLanding" href="<?=($currentPage === 'forgot-password')? 'login.php':'index.php'?>" aria-label="Back to landing page" class="absolute left-6 top-6 z-10 flex h-10 w-10 items-center justify-center rounded-full border border-white/20 bg-[#11183D]/80 text-[#F8FAFC] transition duration-200 hover:bg-[#1B2550]">
                    <i class="fa-solid fa-arrow-left text-sm" aria-hidden="true"></i>
                </a>
                <button id="backToDetails" type="button" aria-label="Back to details" class="absolute left-6 top-6 z-10 hidden h-10 w-10 items-center justify-center rounded-full border border-white/20 bg-[#11183D]/80 text-[#F8FAFC] transition duration-200 hover:bg-[#1B2550]">
                    <i class="fa-solid fa-arrow-left text-sm" aria-hidden="true"></i>
                </button>
            </section>

