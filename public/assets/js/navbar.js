const profileBtn = document.getElementById('profileBtn');
const profileMenu = document.getElementById('profileMenu');

const notificationBtn = document.getElementById('notificationBtn');
const notificationMenu = document.getElementById('notificationMenu');


// Profile button Dropdown Toggle
profileBtn.addEventListener('click', function (event) {

    event.stopPropagation();

    profileMenu.classList.toggle('hidden');

    // Notification menu close
    notificationMenu.classList.add('hidden');

});

// Notification button Dorp Down Toggle
notificationBtn.addEventListener('click', function (event) {

    event.stopPropagation();

    notificationMenu.classList.toggle('hidden');

    // Profile menu close
    profileMenu.classList.add('hidden');

});


// Profile menu ke andar click
profileMenu.addEventListener('click', function (event) {

    event.stopPropagation();

});


// Notification menu ke andar click
notificationMenu.addEventListener('click', function (event) {

    event.stopPropagation();

});


// Bahar click karne par dono close
document.addEventListener('click', function () {

    profileMenu.classList.add('hidden');

    notificationMenu.classList.add('hidden');

});

//Sidebar hidden/not hidden toggle by hamburger button
const sidebarBox = document.getElementById('sidebarBox');
const hamburgerBtn = document.getElementById('hamburgerBtn');

function setSidebarState() {
    if (window.innerWidth < 768) {
        sidebarBox.classList.add('hidden');
    } else {
        sidebarBox.classList.remove('hidden');
    }
}

setSidebarState();

hamburgerBtn.addEventListener('click', function (event) {

    event.stopPropagation();

    sidebarBox.classList.toggle('hidden');

});