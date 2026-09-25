<?php 
$currentPage = 'settings';
$pageTitle = 'Account Settings';
?>

<!-- navbar starts here -->
<?php require_once __DIR__ . '/../includes/header.php';?>
<!-- navbar starts ends here -->

<main class="h-[calc(100vh-72px)] overflow-y-auto bg-[#1B2550] px-6 py-6 text-[#F8FAFC] md:px-10">

   <!-- Hero Section -->
    <div class="rounded-2xl border border-[#252B52] bg-gradient-to-r from-[#11183D] to-[#141B46] px-6 py-6 shadow-lg shadow-black/20 md:px-8 md:py-7">

        <div class="flex items-center justify-between gap-6">

            <!-- Left -->
            <div class="flex items-center gap-4">
                <div class="flex h-12 w-12 shrink-0 items-center justify-center rounded-xl bg-[#1B2550] text-[#4ddcff]">
                    <i class="fa-solid fa-gear text-xl"></i>
                </div>

                <div>
                    <h1 class="text-2xl font-bold tracking-tight text-white md:text-3xl">
                        Account Settings
                    </h1>

                    <p class="mt-1 text-sm text-slate-400 md:text-base">
                        Manage your profile, password and preferences.
                    </p>
                </div>
            </div>

            <!-- Right -->
            <div class="hidden items-center gap-3 rounded-xl border border-[#252B52] bg-[#0F1435]/60 px-4 py-3 md:flex">
                <i class="fa-solid fa-shield-halved text-[#4ddcff]"></i>

                <div>
                    <p class="text-xs font-medium text-slate-400">Account</p>
                    <p class="text-sm font-semibold text-white">Settings & Security</p>
                </div>
            </div>

        </div>

    </div>


    <!-- Settings Box -->
    <div class="mt-6 flex min-h-[500px] overflow-hidden rounded-2xl border border-[#252B52] bg-[#11183D] shadow-lg shadow-black/20">

        <!-- Left Settings Sidebar -->
        <div class="w-40 shrink-0 border-r border-[#252B52] p-3 md:w-60 md:p-4">

            <button class="flex w-full items-center gap-3 rounded-lg px-4 py-3 text-sm font-medium text-slate-300 transition duration-200 hover:bg-[#1B2550] hover:text-white">
                <i class="fa-solid fa-user w-4 text-center text-slate-400"></i>
                <span>Profile</span>
            </button>

            <button class="mt-1 flex w-full items-center gap-3 rounded-lg px-4 py-3 text-sm font-medium text-slate-300 transition duration-200 hover:bg-[#1B2550] hover:text-white">
                <i class="fa-solid fa-lock w-4 text-center text-slate-400"></i>
                <span>Password</span>
            </button>

            <button class="mt-1 flex w-full items-center gap-3 rounded-lg px-4 py-3 text-sm font-medium text-slate-300 transition duration-200 hover:bg-[#1B2550] hover:text-white">
                <i class="fa-solid fa-sliders w-4 text-center text-slate-400"></i>
                <span>Preferences</span>
            </button>

        </div>


        <!-- Right Content Section -->
        <div class="min-w-0 flex-1 p-6 md:p-8">

        <!-- Profile Section starts -->
          <div>
            <!-- Profile Heading -->
            <div class="mb-6">
                <h2 class="text-xl font-semibold text-white md:text-2xl">Profile</h2>
                <p class="mt-1 text-sm text-slate-400">
                    Manage your personal account information.
                </p>
            </div>

            <!-- Profile Photo -->
            <div class="mb-8 flex flex-col items-center">
                <div class="h-24 w-24 overflow-hidden rounded-full border-2 border-[#4ddcff] bg-[#1B2550] p-1 shadow-lg shadow-black/20">
                    <img src="assets/images/Profile-Male-PNG.png"
                        alt="Profile"
                        class="h-full w-full rounded-full object-cover">
                </div>

                <button type="button"
                    class="mt-3 cursor-pointer text-sm font-medium text-[#4ddcff] transition hover:text-white">
                    Change your Avatar
                </button>
            </div>

            <!-- Profile Fields -->
            <div class="space-x-5 space-y-5 md:flex">

                <!-- User Name -->
                <div class = "flex-1">
                    <label for="profileName" class="mb-2 block text-sm font-medium text-slate-200">
                        User Name
                    </label>

                    <input id="profileName"
                        type="text"
                        value="username123"
                        readonly
                        class="h-11 w-full rounded-lg border border-[#252B52] bg-[#0F1435] px-4 text-sm text-slate-300 outline-none cursor-default">
                </div>

                <!-- Email Address -->
                <div class = "flex-1">
                    <label for="profileEmail" class="mb-2 block text-sm font-medium text-slate-200">
                        Email Address
                    </label>

                    <input id="profileEmail"
                        type="email"
                        value="example@email.com"
                        readonly
                        class="h-11 w-full rounded-lg border border-[#252B52] bg-[#0F1435] px-4 text-sm text-slate-300 outline-none cursor-default">
                </div>

            </div>

            
            <div class="mt-7 flex justify-end">
                <!-- Save Button -->
                <button type="button"
                    class="cursor-pointer rounded-lg bg-[#6366F1] px-5 py-2.5 text-sm font-semibold text-white shadow-sm transition duration-200 hover:-translate-y-0.5 hover:bg-[#5558E8] hover:shadow-md hidden">
                    Save Changes
                </button>

                <!-- Edit Button -->
                <button type="button"
                    class="cursor-pointer rounded-lg bg-[#6366F1] px-5 py-2.5 text-sm font-semibold text-white shadow-sm transition duration-200 hover:-translate-y-0.5 hover:bg-[#5558E8] hover:shadow-md">
                    Edit
                </button>
            </div>
          </div>
        <!-- Profile Section ends -->


        
        </div>

    </div>

</main>


<script src="assets/js/navbar.js"></script>
</body>
</html>