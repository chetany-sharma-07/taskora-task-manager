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


function openCreateTopicModal(){
    topicModalMode = 'create';
    selectedTopicId = null;
    topicName.value = '';
    createRenameTopicModalHeading.textContent = "Create Topic ";
    createRenameTopicModalSubHeading.textContent = "Create a new topic to organize your tasks.";
    createRenameTopicModal.classList.remove('hidden');
    topicName.focus();
}

function openRenameTopicModal(topicId = '', currentTopicName = 'College'){
    topicModalMode = 'rename';
    selectedTopicId = topicId;
    topicName.value = currentTopicName;
    createRenameTopicModalHeading.textContent = "Rename Topic";
    createRenameTopicModalSubHeading.textContent = "Update the name of your topic to keep your tasks organized.";
    topicOptionsMenu.classList.add('hidden');
    createRenameTopicModal.classList.remove('hidden');
    topicName.focus();
}

let topicModalMode = '';
createTopicModalBtn.addEventListener('click', openCreateTopicModal);

renameTopicModalBtn.addEventListener('click',()=> {openRenameTopicModal(selectedTopicId,selectedTopicName)});

closeTopicModal.addEventListener('click', function () {
    topicName.value = '';
    createRenameTopicModal.classList.add('hidden');
});

cancelTopicModal.addEventListener('click', function () {
    topicName.value = '';
    createRenameTopicModal.classList.add('hidden');
});
//---------------------------------------------------------------------------------------------
//Create or Rename Topics API requests

// async function createTopic(topicName){
//     try {
//         const response = await fetch('../api/topics/create-topic.php',{
//         method: 'POST',
//         headers: {
//             'Content-type':'application/json'
//         },
//         body: JSON.stringify({
//             topic_name: topicName
//         })
//         });
//         const data = await response.json()

//         if (!response.ok || !data.success) {
//             throw new Error(data.error || data.message || 'Something went wrong.');
//         }

//         const message = topicModalMode === 'create'
//             ? 'Topic created successfully'
//             : 'Topic updated successfully';

//         console.log(message);
//         topicError.textContent = '';
        
//     } catch (error) {
//         console.log('Topic Error:', error);
//         topicError.textContent = "Something went wrong !";
//     }
// }

//function to create or rename topic based on the mode
async function createRenameTopic(topicName,topicId = '',topicModalMode){
    try{
        let response;
        if (topicModalMode === 'create'){
            response = await fetch('../api/topics/create_topic.php',{
                method: 'POST',
                headers: {
                    'Content-type':'application/json'
                },
                body: JSON.stringify({
                    topic_name: topicName,
                    mode: topicModalMode
                })
            });
        }else if (topicModalMode === 'rename'){
            response = await fetch('../api/topics/update_topic.php', {
                method: 'PUT',
                headers: {
                    'Content-type' : 'application/json'
                },
                body: JSON.stringify({
                    topic_name: topicName,
                    topic_id: topicId,
                    mode: topicModalMode
                })
            });
        }else {
            throw new Error("Something went wrong.");
        }

        const data = await response.json();

        if (!response.ok || !data.success) {
            throw new Error(data.error || data.message || 'Something went wrong.');
        }

        return {
            success: true,
            message: data.message || (topicModalMode === 'create'
                ? 'Topic created successfully.'
                : 'Topic renamed successfully.')
        };

    }catch (error){
        console.error('Topic Error:', error);
        return { success: false, message: error.message || 'Could not save the topic. Please try again.' };
    }
}

//function to delete topic
async function deleteTopic(topicId)
{
    try {
        const response = await fetch('../api/topics/delete_topic.php', {
            method: 'DELETE',
            headers: {
                'Content-type': 'application/json'
            },
            body: JSON.stringify({
                topic_id: topicId
            })
        });

        const data = await response.json();

        if (!response.ok || !data.success) {
            throw new Error(data.error || data.message || 'Something went wrong.');
        }
        
        return {
            success: true,
            message: data.message || 'Topic deleted successfully.'
        };
    }catch (error) {
        console.error('Topic Error:', error);
        return { success: false, message: error.message || 'Could not delete the topic. Please try again.' };
    }
}
// Reusable feedback toast for sidebar and other actions.
function showToast(message, type = 'success', duration = 3500){
    let toastContainer = document.getElementById('toastContainer');
    if (!toastContainer) {
        toastContainer = document.createElement('div');
        toastContainer.id = 'toastContainer';
        toastContainer.className = 'fixed right-4 top-20 z-[200] flex w-[min(24rem,calc(100vw-2rem))] flex-col gap-3';
        toastContainer.setAttribute('aria-live', 'polite');
        document.body.appendChild(toastContainer);
    }

    const toast = document.createElement('div');
    const isSuccess = type === 'success';
    toast.className = `flex items-center gap-3 rounded-xl border px-4 py-3 text-sm text-white shadow-2xl backdrop-blur transition-all duration-300 ease-out opacity-0 -translate-y-2 ${
        isSuccess ? 'border-emerald-500/30 bg-[#11183D]/95' : 'border-rose-500/30 bg-[#11183D]/95'
    }`;
    const icon = document.createElement('i');
    icon.className = `fa-solid ${isSuccess ? 'fa-circle-check text-emerald-400' : 'fa-circle-exclamation text-rose-400'}`;
    const text = document.createElement('span');
    text.className = 'min-w-0 flex-1 text-slate-100';
    text.textContent = message;
    toast.append(icon, text);
    toastContainer.appendChild(toast);

    requestAnimationFrame(() => toast.classList.remove('opacity-0', '-translate-y-2'));
    window.setTimeout(() => {
        toast.classList.add('opacity-0', '-translate-y-2');
        window.setTimeout(() => toast.remove(), 300);
    }, duration);
}

const saveTopicBtn = document.getElementById('saveTopicBtn');
saveTopicBtn.addEventListener('click', async function(){
    if (saveTopicBtn.disabled) return;
    saveTopicBtn.disabled = true;
    const mode = topicModalMode;
    const name = topicName.value.trim();
    const topicId = selectedTopicId;

    try {
        const result = await createRenameTopic(name, topicId, mode);
        createRenameTopicModal.classList.add('hidden');
        topicName.value = '';
        await getTopics(); //update sidebar topics list after create or rename
        showToast(result.message, result.success ? 'success' : 'error');
    } finally {
        saveTopicBtn.disabled = false;
    }
});

const confirmDeleteTopicBtn = document.getElementById('confirmDeleteTopic');
confirmDeleteTopicBtn.addEventListener ('click', async function(){
    if (confirmDeleteTopicBtn.disabled) return;
    confirmDeleteTopicBtn.disabled = true; 
    const topicId = selectedTopicId;
    try {
        const result = await deleteTopic(topicId);
        deleteModal.classList.add('hidden');
        await getTopics(); //update sidebar topics list after delete
        showToast(result.message, result.success ? 'success' : 'error');
    } catch (error) {
        console.error('Error deleting topic:', error);
        showToast('Could not delete the topic. Please try again.', 'error');
    } finally {
        confirmDeleteTopicBtn.disabled = false;
    }
});
// ---------------------------------------------------------------------------------------------

//Create Topics Option Menu 

let selectedTopicId = null;
let selectedTopicName = '';
const topicsList = document.getElementById('topicsList');

topicsList.addEventListener('click', function(event) {
    const btn = event.target.closest('.topic-menu-btn');
    if (!btn) return;

    const topicItem = btn.closest('[data-topic-id]');
    selectedTopicId = topicItem.dataset.topicId;
    selectedTopicName = topicItem.querySelector('.topic-name').textContent;

    event.stopPropagation();

    const rect = btn.getBoundingClientRect();
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


document.addEventListener('click', function () {
    topicOptionsMenu.classList.add('hidden');
});

//Topic list
async function getTopics(){
    try{
        const response = await fetch("../api/topics/get_topics.php");
        const data = await response.json();

        if (!response.ok || !data.success) return;

        const topicsList = document.getElementById('topicsList');
        topicsList.replaceChildren();

        data.topics.forEach(topic=> {
            const item = document.createElement('div');
            item.className = 'flex justify-between items-center pl-6 py-1 hover:bg-[#1B2550] m-3 rounded-xl bg-[#11183D]';
            item.dataset.topicId = topic.topic_id;

            item.innerHTML = `<div class="flex items-center space-x-1">
                    <div><i class="fa-solid fa-caret-right"></i></div>
                    <div class="topic-name"></div>
                </div>
                <button class="topic-menu-btn pr-3 cursor-pointer">
                    <i class="fa-solid fa-ellipsis-vertical"></i>
                </button>`;

            item.dataset.topicId = topic.topic_id;
            item.querySelector('.topic-name').textContent = topic.topic_name;
            topicsList.appendChild(item);
        });
    }catch(error){
        console.error('Error fetching topics:', error);
    }
}

getTopics();



