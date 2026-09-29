<script>
    const tagHeading = document.getElementById('tagHeading');
    const tagDescription = document.getElementById('tagDescription');
    const currentPage = <?= json_encode($currentPage) ?>;

    if (currentPage === 'login') {
        tagHeading.innerHTML = "Welcome back.<br>Let's get things done.";
        tagDescription.innerText = "Pick up where you left off and keep your work moving forward with Taskora.";
    } else if (currentPage === 'register') {
        tagHeading.innerHTML = "Get things done.<br>Stay organized.";
        tagDescription.innerText = "Plan your tasks, stay focused, and keep everything organized with Taskora.";
    } else if (currentPage === 'forgot-password') {
        tagHeading.innerHTML = "Back to getting things done.<br>Your tasks are waiting.";
        tagDescription.innerText = "Securely reset your password and get back to your work.";
    }
</script>
</body>
</html>
<!-- Back to getting things done.
Your tasks are waiting. -->