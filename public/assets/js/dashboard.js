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