<!DOCTYPE html>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.0.0/css/all.min.css">
    <link rel="stylesheet" href="assets/css/output.css">
    <link rel="stylesheet" href="assets/css/sidebar.css">
    <title><?=  $pageTitle ?></title>
</head>
<body class="overflow-hidden">
  
  <!-- nav bar starts -->
<nav class="flex justify-between p-3 items-center bg-[#080B2A] text-[#F8FAFC] h-[72px] shrink-0 sticky top-0 z-50">
        <!-- hamburger button and logo image and app name -->
        <div class="flex justify-evenly items-center space-x-2 pl-3">
            <!-- hamburger -->
            <?php if ($currentPage === 'dashboard'){?>
            <div id="hamburgerBtn" class="text-xl cursor-pointer"><i class="fa-solid fa-bars"></i></div>
            <?php }?>
             <!-- taskora logo -->
            <img class="ml-3 w-[42px] h-[42px] object-contain" src="assets/images/Taskora_logo.png" alt="app_logo">
            <!-- taskora name -->
            <div class="text-2xl font-bold tracking-tight text-white">Taskor<span class="text-[#4ddcff]">a</span></div>
        </div>
         <!-- hamburger button and logo image and app name ends here-->

        <!-- Notification and Profile Button  -->
        <div class="flex items-center space-x-5 pr-6 text-2xl">
            
            <!-- Notification Icon Button and Drop Down Menu -->
            <div class="relative">

                <!-- Notification Button -->
                <button id="notificationBtn" class="text-yellow-500 cursor-pointer">
                    <i class="fa-solid fa-bell"></i>
                </button>
                <!-- Notification Button ends here -->

                <!-- Notification Dropdown -->
                <div id="notificationMenu" class="hidden absolute right-0 top-10 z-[100] w-72 rounded-xl border border-[#252B52] bg-[#11183D] shadow-xl">
                    <!-- Header -->
                    <div class="border-b border-[#252B52] px-4 py-3">
                        <p class="text-base font-semibold text-white">
                            Notifications
                        </p>
                    </div>

                    <!-- No Notifications -->
                    <div class="flex min-h-[140px] items-center justify-center px-4">
                        <div class="text-center">
                            <i class="fa-regular fa-bell-slash mb-2 text-2xl text-slate-500"></i>
                            <p class="text-sm text-slate-400">
                                No notifications yet
                            </p>
                        </div>
                    </div>
                </div>
                <!-- Notification DropDown Ends here -->
            </div>
            <!-- Notification Icon Button and Drop Down Menu  Ends here-->


            <!-- Profile Button and DropDown starts here -->
            <div class="relative">

                <!-- Profile Button -->
                <button id="profileBtn" class="outline-4 outline-blue-600 rounded-full cursor-pointer transition duration-200 hover:outline-[#4ddcff]"><img class="w-[40px] h-[40px] object-contain" src="assets/images/Profile-Male-PNG.png" alt="Profile"></button>
                <!-- Profile Button Ends here -->

                <!-- Profile Dropdown -->
                <div id="profileMenu" class="hidden absolute right-0 top-14 z-[100] w-64 rounded-xl border border-[#252B52] bg-[#11183D] p-4 shadow-xl">
                    <!-- Greeting -->
                    <div class="border-b border-[#252B52] pb-3">
                        <p class="text-sm text-slate-400">
                            Hi,
                        </p>
                        <p class="mt-1 text-base font-semibold text-white">
                            Chetany Sharma
                        </p>
                    </div>

                    <!-- Account Settings -->
                    <a href="account_settings.php" class="mt-3 flex items-center gap-3 rounded-lg px-3 py-2.5 text-sm text-slate-300 transition duration-200 hover:bg-[#1B2550] hover:text-white"><i class="fa-solid fa-gear w-4 text-center"></i><span>Account Settings</span></a>

                    <!-- Logout -->
                    <button class="mt-1 flex w-full items-center gap-3 rounded-lg px-3 py-2.5 text-sm text-red-400 transition duration-200 hover:bg-red-500/10 hover:text-red-300 cursor-pointer"><i class="fa-solid fa-right-from-bracket w-4 text-center"></i><span>Logout</span></button>
                </div>
                <!-- Profile DropDown ends here -->
            </div>
            <!-- Profile Menu  and Drop Down ends here   -->
        </div>
        <!-- Notification and Profile Button ends here -->
</nav>
     <!-- nav bar ends -->