<?php
$currentPage = 'register';
$pageTitle = 'Create Account';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/output.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.0.0/css/all.min.css">
    <title><?= $pageTitle ?></title>
</head>

<body class="min-h-screen bg-[#080B2A]">

    <main class="flex min-h-screen items-center justify-center p-0 md:p-6">

        <!-- Main Container -->
        <div class="flex min-h-screen w-full flex-col overflow-hidden border border-[#252B52] bg-[#11183D] shadow-2xl shadow-black/30 md:h-[calc(100vh-48px)] md:min-h-0 md:max-w-6xl md:flex-row md:rounded-3xl">

            <!-- Left Section -->
            <section class="relative min-h-[360px] w-full overflow-hidden bg-[#0F1435] md:h-full md:min-h-0 md:w-1/2">

                <div class="absolute inset-0 bg-cover bg-center"
                     style="background-image: url('assets/images/login_signup_bgimage.png');">
                </div>

                <div class="absolute inset-0 bg-[#080B2A]/20"></div>

                <div class="relative z-10 flex h-full items-center justify-center p-8">
                    <!-- Left section content -->
                </div>

            </section>


            <!-- Right Section -->
            <section class="flex w-full flex-col bg-[#11183D] p-6 sm:p-8 md:h-full md:w-1/2 md:p-10 lg:p-12">

                <!-- Signup form will be added here -->

            </section>

        </div>

    </main>

</body>
</html>