// ----------------------------------------------------------------------------------------------------
//Search box hiddien and not hidden  toggle by search button
const topicSearchBtn = document.getElementById('topicSearchBtn');
const topicSearchBox = document.getElementById('topicSearchBox');
const topicInputBox = document.getElementById('topicInputBox');

topicSearchBtn.addEventListener('click', function () {
    topicInputBox.value = '';
    topicSearchBox.classList.toggle('hidden');
});

// -----------------------------------------------------------------------------------------------
//Create amd Rename Topic Modal 
const createRenameTopicModal = document.getElementById('createRenameTopicModal');

const createTopicModalBtn = document.getElementById('createTopicModalBtn');
const renameTopicModalBtn = document.getElementById('renameTopicModalBtn');

const closeTopicModal = document.getElementById('closeTopicModal');
const cancelTopicModal = document.getElementById('cancelTopicModal');

const topicName = document.getElementById('topicName');

const createRenameTopicModalHeading = document.getElementById('createRenameTopicModalHeading');
const createRenameTopicModalSubHeading = document.getElementById('createRenameTopicModalSubHeading');

const topicOptionsMenu = document.getElementById('topicOptionsMenu');

createTopicModalBtn.addEventListener('click', function () {
    createRenameTopicModalHeading.textContent = "Create Topic ";
    createRenameTopicModalSubHeading.textContent = "Create a new topic to organize your tasks.";
    createRenameTopicModal.classList.remove('hidden');
});

renameTopicModalBtn.addEventListener('click',function () {
    createRenameTopicModalHeading.textContent = "Rename Topic";
    createRenameTopicModalSubHeading.textContent = "Update the name of your topic to keep your tasks organized.";
    topicOptionsMenu.classList.add('hidden');
    createRenameTopicModal.classList.remove('hidden');
});

closeTopicModal.addEventListener('click', function () {
    topicName.value = '';
    createRenameTopicModal.classList.add('hidden');
});

cancelTopicModal.addEventListener('click', function () {
    topicName.value = '';
    createRenameTopicModal.classList.add('hidden');
});

// ---------------------------------------------------------------------------------------------

//Create Topics Option Menu 

const topicMenuBtns = document.querySelectorAll('.topic-menu-btn');
// const topicOptionsMenu = document.getElementById('topicOptionsMenu');

topicMenuBtns.forEach(btn => {
    btn.addEventListener('click', function (event) {
        event.stopPropagation();

        const rect = btn.getBoundingClientRect();
        // topicOptionsMenu.classList.remove('hidden');
        topicOptionsMenu.classList.toggle('hidden');

        const menuHeight = topicOptionsMenu.offsetHeight;
        const spaceBelow = window.innerHeight - rect.bottom;

        if (spaceBelow < menuHeight + 10) {
            topicOptionsMenu.style.top = `${rect.top - menuHeight - 5}px`;
        } else {
            topicOptionsMenu.style.top = `${rect.bottom + 5}px`;
        }

        topicOptionsMenu.style.left = `${rect.left - 35}px`;
    });
});



document.addEventListener('click', function () {
    topicOptionsMenu.classList.add('hidden');
});




