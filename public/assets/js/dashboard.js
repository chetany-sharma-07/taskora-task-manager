// --------------------------------------------------------------------------------------------

// Create Task Modal
const createEditTaskModal = document.getElementById('createEditTaskModal');

const createTaskModalBtn = document.getElementById('createTaskModalBtn');
const editTaskModalBtn = document.getElementById('editTaskModalBtn');

const closeTaskModal = document.getElementById('closeTaskModal');
const cancelTaskModal = document.getElementById('cancelTaskModal');

const taskName = document.getElementById('taskName');
const taskDescription = document.getElementById('taskDescription');
const taskPriority = document.getElementById('taskPriority');
const taskStatus = document.getElementById('taskStatus');
const taskDueDate = document.getElementById('taskDueDate');

const createEditTaskModalHeading = document.getElementById('createEditTaskModalHeading');
const createEditTaskModalSubHeading = document.getElementById('createEditTaskModalSubHeading');

const createEditTaskBtn = document.getElementById('createEditTaskBtn');

createTaskModalBtn.addEventListener('click', function () {
    createEditTaskModalHeading.textContent = "Create Topic";
    createEditTaskModalSubHeading.textContent = "Create a new  for this topic.";
    createEditTaskModal.classList.remove('hidden');
    taskName.focus();
});

editTaskModalBtn.addEventListener('click',function () {
    createEditTaskModalHeading.textContent = "Edit Task";
    createEditTaskModalSubHeading.textContent = "Edit your task for this topic.";
    createEditTaskModal.classList.remove('hidden');
    taskName.focus();
})

function closeTaskModalBox() {
    taskName.value = '';
    taskDescription.value = '';
    taskPriority.value = '';
    taskStatus.value = 'pending';
    taskDueDate.value = '';
    createEditTaskModal.classList.add('hidden');
}

closeTaskModal.addEventListener('click', closeTaskModalBox);
cancelTaskModal.addEventListener('click', closeTaskModalBox);


// Delete Topic Modal
// Delete Topic/Task Modal
const deleteTopicBtn = document.getElementById('deleteTopicBtn');
const deleteTaskBtn = document.getElementById('deleteTaskBtn');
const deleteModal = document.getElementById('deleteModal');
const closeDeleteModal = document.getElementById('closeDeleteModal');
const cancelDelete = document.getElementById('cancelDelete');
const confirmDeleteTopic = document.getElementById('confirmDeleteTopic');
const confirmDeleteTask = document.getElementById('confirmDeleteTask');
const deleteModalHeading = document.getElementById('deleteModalHeading');
const deleteName = document.getElementById('deleteName');
const deleteType = document.getElementById('deleteType');

function openDeleteModal(type, name) {
    deleteName.textContent = name;

    confirmDeleteTopic.classList.add('hidden');
    confirmDeleteTask.classList.add('hidden');

    if (type === 'topic') {
        deleteModalHeading.textContent = 'Delete Topic';
        deleteType.textContent = 'topic';
        confirmDeleteTopic.classList.remove('hidden');
    }

    if (type === 'task') {
        deleteModalHeading.textContent = 'Delete Task';
        deleteType.textContent = 'task';
        confirmDeleteTask.classList.remove('hidden');
    }

    deleteModal.classList.remove('hidden');
}

function closeDeleteModalBox() {
    deleteModal.classList.add('hidden');
}

deleteTopicBtn.addEventListener('click', () => {
    openDeleteModal('topic', selectedTopicName);
});

deleteTaskBtn.addEventListener('click', () => {
    openDeleteModal('task', 'Complete Project');
});

closeDeleteModal.addEventListener('click', closeDeleteModalBox);
cancelDelete.addEventListener('click', closeDeleteModalBox);

topicsList.addEventListener('click', function (event) {
    // Leave the three-dot menu click to sidebar.js.
    if (event.target.closest('.topic-menu-btn')) return;

    const topicItem = event.target.closest('[data-topic-id]');
    if (!topicItem || !topicsList.contains(topicItem)) return;

    topicsList.querySelectorAll('[data-topic-id]').forEach(function (item) {
        if (item !== topicItem) {
            item.classList.remove('bg-[#1B2550]');
            item.classList.add('bg-[#11183D]');
        }
    });

    slectedDashboardTopicId = topicItem.dataset.topicId;
    selectedDashboardTopicName = topicItem.querySelector('.topic-name').textContent;
    topicItem.classList.remove('bg-[#11183D]');
    topicItem.classList.add('bg-[#1B2550]');

    // This code update the Topic name in the dashbaord .
    const dashboardTopicNameElements = document.querySelectorAll('.dashboard-topic-name');
    dashboardTopicNameElements.forEach(function (element) {
        element.textContent = selectedDashboardTopicName;
    });

});

async function getTasks(topicId,topicName) {
    try {
        const response = await fetch('../api/task/get_tasks.php?topic='+ topicName + '&topic_id=' + topicId);
        
        
    }
}
