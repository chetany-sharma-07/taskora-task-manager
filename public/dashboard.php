
<?php $currentPage = 'dashboard';
$pageTitle = 'Taskora - Work, Gets Done';
?>

<!-- navbar starts here -->
<?php require_once __DIR__ . '/../includes/header.php';?>
<!-- navbar starts ends here -->

<!-- sidebar and main starts here -->
<div class="flex h-[calc(100vh-72px)] overflow-hidden">

    <!-- sidebar starts here -->
    <aside id="sidebarBox" class="w-72 h-[calc(100vh-72px)] bg-[#0F1435] text-[#F8FAFC] flex flex-col  max-md:fixed max-md:left-0 max-md:top-[72px] max-md:z-50 ">
        <!-- sidebar nav starts border-b border-[#252B52]-->
            <div class="py-1 flex shrink-0 justify-between font-semibold border-b border-r border-[#252B52]">
                <div class="pl-6">TOPICS</div>
                <div class="font-light flex items-center">
                    <button id="topicSearchBtn" class="pr-1 cursor-pointer"><i class="fa-solid fa-magnifying-glass"></i></i></button>
                    <button id="createTopicModalBtn"  class="pr-3 cursor-pointer"><i class="fa-solid fa-plus"></i></button>
                </div>
            </div>
        <!-- sidebar nav ends -->

        <!-- search box starts -->
         <div id="topicSearchBox" class="hidden mx-3 mt-2 shrink-0 rounded-lg bg-[#11183D]">
            <input id="topicInputBox" class="w-full px-3 pl-6 h-[40px] bg-transparent text-sm text-white
           outline-none placeholder:text-slate-400 focus:bg-[#11183D] focus:ring-1 focus:ring-[#6366F1]" type="text" placeholder="Search your topic">
         </div>
        <!-- search box ends -->

        <!-- sidebar topics start m-3 rounded-xl bg-[#11183D] -->
         <div class="min-h-0 flex-1 overflow-y-auto  topics-scroll mt-3">
            <div class="flex justify-between items-center pl-6 py-1 hover:bg-[#1B2550]  m-3 rounded-xl bg-[#11183D]">  
                <div class="flex items-center space-x-1">
                    <div><i class="fa-solid fa-caret-right"></i></div>
                    <div>College</div>
                </div>
                <button class="topic-menu-btn pr-3 cursor-pointer"><i class="fa-solid fa-ellipsis-vertical"></i></button>  
            </div>
         </div>
        <!-- sidebar topic ends -->
    </aside>
    <!-- sidebar ends here -->

    <!-- main section starts here -->
    <main class="w-full min-w-0  flex flex-col flex-1 overflow-y-auto bg-[#1B2550] text-[#F8FAFC]">

        <!-- <div class="w-full py-1 px-4 bg-[#0F1435] font-semibold items-center  border-b border-[#252B52]">Topic : College</div> -->
        
       <!-- Dashboard Hero -->
        <div class="mx-6 mt-6 rounded-2xl border border-[#252B52] bg-[#11183D] px-6 py-5 shadow-lg shadow-black/20 md:mx-10 md:px-8 md:py-6">

            <div class="flex items-center justify-between">

                <div>
                    <div class="mb-2 flex items-center gap-2 text-sm font-medium text-[#4ddcff]">
                        <i class="fa-solid fa-layer-group text-xs"></i>
                        <span>College Dashboard</span>
                    </div>

                    <h1 class="text-2xl font-bold tracking-tight text-white md:text-4xl">
                        Good Morning 👋
                    </h1>

                    <p class="mt-2 text-sm text-slate-400 md:text-base">
                        Here's your progress and tasks for College.
                    </p>
                </div>

                <div class="hidden h-16 w-16 items-center justify-center rounded-2xl bg-[#1B2550] text-[#4ddcff] md:flex">
                    <i class="fa-solid fa-chart-line text-2xl"></i>
                </div>

            </div>

        </div>
        <!-- Dashboard Hero Ends -->
        
        <!-- stats card starts -->
        <div class="my-6 flex flex-row items-center justify-center gap-x-10 md:gap-x-25 md:mx-10 mx-6">

            <!-- Total Tasks -->
            <div class="group flex h-40 w-50 flex-col justify-between rounded-2xl
                        bg-gradient-to-br from-[#3B6FC4] to-[#28549A]
                        p-5 font-semibold text-white shadow-lg shadow-black/30
                        transition-all duration-300 hover:-translate-y-1 hover:shadow-xl">

                <div class="flex items-center justify-between">
                    <div class="flex h-9 w-9 items-center justify-center rounded-xl bg-white/15">
                        <i class="fa-solid fa-list-check"></i>
                    </div>
                    <i class="fa-solid fa-ellipsis text-white/50"></i>
                </div>

                <div>
                    <p class="text-sm text-white/80">Total Tasks</p>
                    <p class="mt-1 text-3xl font-bold">24</p>
                </div>

            </div>


            <!-- Completed -->
            <div class="group flex h-40 w-50 flex-col justify-between rounded-2xl
                        bg-gradient-to-br from-[#249B68] to-[#187A50]
                        p-5 font-semibold text-white shadow-lg shadow-black/30
                        transition-all duration-300 hover:-translate-y-1 hover:shadow-xl">

                <div class="flex items-center justify-between">
                    <div class="flex h-9 w-9 items-center justify-center rounded-xl bg-white/15">
                        <i class="fa-solid fa-check"></i>
                    </div>
                    <i class="fa-solid fa-ellipsis text-white/50"></i>
                </div>

                <div>
                    <p class="text-sm text-white/80">Completed</p>
                    <p class="mt-1 text-3xl font-bold">15</p>
                </div>

            </div>


            <!-- Pending -->
            <div class="group flex h-40 w-50 flex-col justify-between rounded-2xl
                        bg-gradient-to-br from-[#C94B55] to-[#9F343D]
                        p-5 font-semibold text-white shadow-lg shadow-black/30
                        transition-all duration-300 hover:-translate-y-1 hover:shadow-xl">

                <div class="flex items-center justify-between">
                    <div class="flex h-9 w-9 items-center justify-center rounded-xl bg-white/15">
                        <i class="fa-solid fa-clock"></i>
                    </div>
                    <i class="fa-solid fa-ellipsis text-white/50"></i>
                </div>

                <div>
                    <p class="text-sm text-white/80">Pending</p>
                    <p class="mt-1 text-3xl font-bold">9</p>
                </div>

            </div>

        </div>
        <!-- stats card ends here -->
        
        <!-- Quick Actions button starts -->
        <div class="flex flex-wrap items-center gap-3 ml-20">

            <!-- Create Task -->
            <button id="createTaskModalBtn" class="inline-flex items-center gap-2 rounded-lg bg-[#6366F1] px-4 py-2 text-sm font-semibold text-white shadow-sm transition duration-200 ease-out hover:-translate-y-0.5 hover:bg-[#5558E8] hover:shadow-md cursor-pointer"><i class="fa-solid fa-plus text-xs"></i>Create Task</button>

            <!-- Export -->
            <button class="inline-flex items-center gap-2 rounded-lg border border-[#252B52] bg-[#11183D] px-4 py-2 text-sm font-medium text-slate-200 shadow-sm transition duration-200 ease-out hover:-translate-y-0.5 hover:bg-[#1B2550]  hover:text-white hover:shadow-md cursor-pointer"><i class="fa-solid fa-file-export text-xs"></i>Export</button>

            <!-- Import -->
            <button class="inline-flex items-center gap-2 rounded-lg border border-[#252B52] bg-[#11183D] px-4 py-2 text-sm font-medium text-slate-200 shadow-sm transition duration-200 ease-out hover:-translate-y-0.5 hover:bg-[#1B2550]  hover:text-white hover:shadow-md cursor-pointer"><i class="fa-solid fa-file-import text-xs"></i>Import</button>

        </div>
        <!-- Quick Actions ends here -->
            
        <!-- Tasks section starts here  -->
        <!-- Tasks Section -->
        <div class="mt-10 px-6 md:px-10">

            <!-- Search / Filter Section -->
            <div class="mb-8 flex w-full flex-col gap-3 md:flex-row md:items-center ">

                <div class= "flex w-full items-center gap-3 md:w-auto md:shrink-0">

                    <!-- Status Select -->
                    <select
                        class="h-10 shrink-0 rounded-lg border border-[#252B52]
                            bg-[#11183D] px-3
                            text-sm md:text-base text-slate-200
                            outline-none
                            focus:border-[#6366F1]
                            focus:ring-1 focus:ring-[#6366F1]
                            cursor-pointer">

                        <option>All Status</option>
                        <option>Completed</option>
                        <option>Pending</option>
                        <option>Working</option>

                    </select>


                    <!-- Priority Select -->
                    <select
                        class="h-10 shrink-0 rounded-lg border border-[#252B52]
                            bg-[#11183D] px-3
                            text-sm md:text-base text-slate-200
                            outline-none
                            focus:border-[#6366F1]
                            focus:ring-1 focus:ring-[#6366F1]
                            cursor-pointer">

                        <option>All Priority</option>
                        <option>High</option>
                        <option>Medium</option>
                        <option>Low</option>

                    </select>

                    <!-- Due Date -->
                    <select
                        class="h-10 shrink-0 rounded-lg border border-[#252B52]
                            bg-[#11183D] px-3 text-sm md:text-base
                            text-slate-200 outline-none
                            focus:border-[#6366F1]
                            focus:ring-1 focus:ring-[#6366F1]
                            cursor-pointer">

                        <option>All Due Dates</option>
                        <option>Overdue</option>
                        <option>Today</option>
                        <option>Tomorrow</option>
                        <option>This Week</option>
                        <option>No Due Date</option>

                    </select>

                </div>

                
                <div class="flex min-w-0 w-full gap-3 md:w-auto md:flex-1">
                    <!-- Search Box -->
                    <input
                        type="text"
                        placeholder="Search tasks..."
                        class="h-10 min-w-0 flex-1
                            rounded-lg border border-[#252B52]
                            bg-[#11183D] px-4
                            text-sm md:text-base text-white
                            placeholder:text-slate-500
                            outline-none
                            focus:border-[#6366F1]
                            focus:ring-1 focus:ring-[#6366F1]">


                    <!-- Search Button -->
                    <button
                        class="inline-flex h-10 shrink-0 items-center justify-center gap-2
                            rounded-lg
                            bg-[#6366F1] px-4 md:px-5
                            text-sm md:text-base font-semibold text-white
                            transition duration-200 ease-out
                            hover:-translate-y-0.5
                            hover:bg-[#5558E8]
                            hover:shadow-md
                            cursor-pointer">

                        <i class="fa-solid fa-magnifying-glass text-xs"></i>
                        <span>Search</span>

                    </button>

                </div>
            </div> 


            <!-- Tasks Table -->
            <div class="mb-10 w-full  rounded-xl border border-[#252B52] bg-[#11183D] ">

                <table class="w-full table-fixed text-left">

                    <!-- Table Heading -->
                    <thead class="border-b border-[#252B52] bg-[#0F1435]">
                        <tr>
                            <th class="w-[28%] px-2 py-3 text-xs font-semibold text-slate-200 md:w-[34%] md:px-6 md:py-4 md:text-base">
                                Task Name
                            </th>

                            <th class="w-[14%] px-1 py-3 text-xs font-semibold text-slate-200 md:w-[16%] md:px-6 md:py-4 md:text-base">
                                Priority
                            </th>

                            <th class="w-[20%] px-1 py-3 text-xs font-semibold text-slate-200 md:w-[21%] md:px-6 md:py-4 md:text-base">
                                Due Date
                            </th>

                            <th class="w-[18%] px-1 py-3 text-xs font-semibold text-slate-200 md:px-6 md:py-4 md:text-base">
                                Status
                            </th>

                            <th class="w-[20%] px-1 py-3 text-center text-xs font-semibold text-slate-200 md:w-[11%] md:px-6 md:py-4 md:text-base">
                                Actions
                            </th>
                        </tr>
                    </thead>


                    <!-- Example Tasks -->
                    <tbody class="divide-y divide-[#252B52]">

                        <!-- Task 1 -->
                        <tr class="transition duration-200 hover:bg-[#1B2550]">

                            <td class="px-2 py-4 text-xs font-medium text-white md:px-6 md:text-base">
                                <div class="flex min-w-0 items-center gap-2">
                                    <input type="checkbox" aria-label="Select task: Complete PHP API This is PHP Task so" class="h-4 w-4 shrink-0 cursor-pointer accent-[#6366F1]">
                                    <span class="truncate">Complete PHP API This is PHP Task so</span>
                                </div>
                            </td>

                            <td class="px-2 py-4 md:px-6">
                                <span class="rounded-full bg-red-500/15 px-2 py-1 text-[10px] font-medium text-red-400 md:px-3 md:text-sm">
                                    High
                                </span>
                            </td>

                            <td class="whitespace-nowrap px-2 py-4 text-xs text-slate-400 md:px-6 md:text-base">
                                Sep 20, 2026
                            </td>

                            <td class="px-2 py-4 md:px-6">
                                <span class="rounded-full bg-blue-500/15 px-2 py-1 text-[10px] font-medium text-blue-400 md:px-3 md:text-sm">
                                    Working
                                </span>
                            </td>

                            
                            <td class="px-1 py-4 text-center md:px-6">
                                <div class="flex items-center justify-center gap-1 md:gap-2">

                                    <!-- Edit -->
                                    <button id="editTaskModalBtn" type="button"  title="Edit" aria-label="Edit task" class="cursor-pointer rounded-md bg-blue-500/10 p-1.5 text-blue-400 transition hover:bg-blue-500/20 hover:text-blue-300">
                                        <i class="fa-solid fa-pencil text-xs md:text-sm"></i>
                                    </button>

                                    <!-- Delete -->
                                    <button id="deleteTaskBtn" type="button" title="Delete" aria-label="Delete task" class="cursor-pointer rounded-md bg-red-500/10 p-1.5 text-red-400 transition hover:bg-red-500/20 hover:text-red-300">
                                        <i class="fa-solid fa-xmark text-sm md:text-base"></i>
                                    </button>

                                </div>
                            </td>
                        </tr>

                    </tbody>

                </table>

            </div>

        </div>

        <!-- Tasks section ends here  -->

    </main>
    <!-- main section ends here -->
</div>
<!-- sidebar and main starts here -->

<!-- Create or Rename Topic Modal starts here -->
<!-- Overlay -->
<div id="createRenameTopicModal" class="hidden fixed inset-0 z-[100] flex items-center justify-center bg-black/60 backdrop-blur-sm px-3">

    <div class="w-full max-w-[330px] rounded-xl border border-[#252B52] bg-[#11183D] shadow-2xl sm:max-w-md">

        <!-- Header -->
        <div class="flex items-center justify-between border-b border-[#252B52] px-4 py-3 sm:px-5 sm:py-4">
            <div>
                <h2 id="createRenameTopicModalHeading" class="text-base font-semibold text-white sm:text-lg">Create Task</h2>
                <p id="createRenameTopicModalSubHeading" class="mt-1 text-xs text-slate-400 sm:text-sm">Create a new topic to organize your tasks.</p>
            </div>

            <button id="closeTopicModal" type="button"
                class="cursor-pointer text-lg text-slate-400 transition hover:text-white sm:text-xl">
                <i class="fa-solid fa-xmark"></i>
            </button>
        </div>

        <!-- Body -->
        <div class="px-4 py-4 sm:px-5 sm:py-5">
            <label for="topicName" class="mb-2 block text-sm font-medium text-slate-200">Topic Name</label>

            <input id="topicName" type="text" placeholder="e.g. College, Work, Personal" autocomplete="off"
                class="h-10 w-full rounded-lg border border-[#252B52] bg-[#0F1435] px-3 text-sm text-white placeholder:text-slate-500 outline-none transition focus:border-[#6366F1] focus:ring-1 focus:ring-[#6366F1] sm:h-11 sm:px-4">
        </div>

        <!-- Footer -->
        <div class="flex justify-end gap-2 border-t border-[#252B52] px-4 py-3 sm:gap-3 sm:px-5 sm:py-4">
            <button id="cancelTopicModal" type="button"
                class="cursor-pointer rounded-lg border border-[#252B52] bg-[#11183D] px-3 py-2 text-sm font-medium text-slate-300 transition hover:bg-[#1B2550] hover:text-white sm:px-4">
                Cancel
            </button>

            <button id="saveTopicBtn" type="button"
                class="cursor-pointer rounded-lg bg-[#6366F1] px-4 py-2 text-sm font-semibold text-white transition hover:-translate-y-0.5 hover:bg-[#5558E8] hover:shadow-md sm:px-5">
                Save Topic
            </button>
        </div>

    </div>
</div>
<!-- Create Topic Modal Ends here -->

<!-- Create or Edit Task Modal starts here  -->
<div id="createEditTaskModal" class="hidden fixed inset-0 z-[100] flex items-center justify-center overflow-y-auto bg-black/60 backdrop-blur-sm px-4 py-6">

    <div class="w-full max-w-[560px] max-h-[90vh] overflow-y-auto rounded-xl border border-[#252B52] bg-[#11183D] shadow-2xl">

        <!-- Header -->
        <div class="flex items-center justify-between border-b border-[#252B52] px-5 py-4">
            <div>
                <h2 id="createEditTaskModalHeading" class="text-lg font-semibold text-white"></h2>
                <p id="createEditTaskModalSubHeading" class="mt-1 text-sm text-slate-400"></p>
            </div>

            <button id="closeTaskModal" type="button" class="cursor-pointer text-xl text-slate-400 transition hover:text-white">
                <i class="fa-solid fa-xmark"></i>
            </button>
        </div>

        <!-- Body -->
        <div class="space-y-4 px-5 py-5">

            <!-- Task Name -->
            <div>
                <label for="taskName" class="mb-2 block text-sm font-medium text-slate-200">Task Name</label>
                <input id="taskName" type="text" placeholder="Enter task name" autocomplete="off"
                    class="h-11 w-full rounded-lg border border-[#252B52] bg-[#0F1435] px-4 text-sm text-white placeholder:text-slate-500 outline-none focus:border-[#6366F1] focus:ring-1 focus:ring-[#6366F1]">
            </div>

            <!-- Description -->
            <div>
                <label for="taskDescription" class="mb-2 block text-sm font-medium text-slate-200">Description</label>
                <textarea id="taskDescription" rows="3" placeholder="Enter task description"
                    class="w-full resize-none rounded-lg border border-[#252B52] bg-[#0F1435] px-4 py-3 text-sm text-white placeholder:text-slate-500 outline-none focus:border-[#6366F1] focus:ring-1 focus:ring-[#6366F1]"></textarea>
            </div>

            <!-- Priority + Status -->
            <div class="grid grid-cols-1 gap-4 sm:grid-cols-2">

                <div>
                    <label for="taskPriority" class="mb-2 block text-sm font-medium text-slate-200">Priority</label>
                    <select id="taskPriority"
                        class="h-11 w-full rounded-lg border border-[#252B52] bg-[#0F1435] px-3 text-sm text-slate-200 outline-none focus:border-[#6366F1] focus:ring-1 focus:ring-[#6366F1] cursor-pointer">
                        <option value="">Select Priority</option>
                        <option value="high">High</option>
                        <option value="medium">Medium</option>
                        <option value="low">Low</option>
                    </select>
                </div>

                <div>
                    <label for="taskStatus" class="mb-2 block text-sm font-medium text-slate-200">Status</label>
                    <select id="taskStatus"
                        class="h-11 w-full rounded-lg border border-[#252B52] bg-[#0F1435] px-3 text-sm text-slate-200 outline-none focus:border-[#6366F1] focus:ring-1 focus:ring-[#6366F1] cursor-pointer">
                        <option value="pending">Pending</option>
                        <option value="working">Working</option>
                        <option value="completed">Completed</option>
                    </select>
                </div>

            </div>

            <!-- Due Date -->
            <div>
                <label for="taskDueDate" class="mb-2 block text-sm font-medium text-slate-200">Due Date</label>
                <input id="taskDueDate" type="date"
                    class="h-11 w-full rounded-lg border border-[#252B52] bg-[#0F1435] px-4 text-sm text-slate-200 outline-none focus:border-[#6366F1] focus:ring-1 focus:ring-[#6366F1] cursor-pointer">
            </div>

        </div>

        <!-- Footer -->
        <div class="flex justify-end gap-3 border-t border-[#252B52] px-5 py-4">
            <button id="cancelTaskModal" type="button"
                class="cursor-pointer rounded-lg border border-[#252B52] bg-[#11183D] px-4 py-2 text-sm font-medium text-slate-300 transition hover:bg-[#1B2550] hover:text-white">
                Cancel
            </button>

            <button id="createEditTaskBtn" type="button"
                class="cursor-pointer rounded-lg bg-[#6366F1] px-5 py-2 text-sm font-semibold text-white transition hover:-translate-y-0.5 hover:bg-[#5558E8] hover:shadow-md">Save Task
            </button>
        </div>

    </div>
</div>
<!-- Create Task Modal ends here  -->

<!-- Topic Action Modal here -->
<!-- Topic Options Menu  starts here-->
<div id="topicOptionsMenu" class="hidden fixed z-[999] w-40 rounded-lg border border-[#252B52] bg-[#11183D] p-1.5 shadow-xl">

    <button id="renameTopicModalBtn"
        class="flex w-full items-center gap-3 rounded-md px-3 py-2.5 text-sm text-slate-200 transition hover:bg-[#1B2550] hover:text-white cursor-pointer">
        <i class="fa-solid fa-pen text-xs text-slate-400"></i>
        <span>Rename</span>
    </button>

    <button id="deleteTopicBtn"
        class="flex w-full items-center gap-3 rounded-md px-3 py-2.5 text-sm text-red-400 transition hover:bg-red-500/10 cursor-pointer">
        <i class="fa-solid fa-trash text-xs"></i>
        <span>Delete</span>
    </button>

</div>
<!-- Topic Options Menu  starts ends here-->

<!-- Create Delete Topic/Task Modal starts here -->
<div id="deleteModal" class="hidden fixed inset-0 z-[1000] flex items-center justify-center bg-black/60 px-4 backdrop-blur-sm" role="dialog" aria-modal="true" aria-labelledby="deleteModalHeading" aria-describedby="deleteModalDescription">
    <div class="relative w-full max-w-[360px] rounded-2xl border border-[#252B52] bg-[#11183D] p-4 shadow-2xl shadow-black/30 sm:p-6">

        <button id="closeDeleteModal" type="button" aria-label="Close dialog" class="absolute right-3 top-3 flex h-8 w-8 cursor-pointer items-center justify-center rounded-lg text-[#94A3B8] transition-all duration-200 hover:bg-[#1B2550] hover:text-[#F8FAFC] sm:right-4 sm:top-4 sm:h-9 sm:w-9">
            <i class="fa-solid fa-xmark" aria-hidden="true"></i>
        </button>

        <div class="flex flex-col items-center text-center">
            <div class="flex h-10 w-10 items-center justify-center rounded-xl bg-red-500/10 sm:h-11 sm:w-11">
                <i class="fa-solid fa-trash text-[#EF4444]" aria-hidden="true"></i>
            </div>

            <h2 id="deleteModalHeading" class="mt-3 text-lg font-semibold tracking-tight text-[#F8FAFC] sm:mt-4 sm:text-xl">
                Delete Topic
            </h2>

            <p id="deleteModalDescription" class="mt-2 max-w-[360px] text-[13px] leading-5 text-[#94A3B8] sm:text-sm sm:leading-6">
                Are you sure you want to delete "<span id="deleteName" class="font-bold text-[#CBD5E1]">College</span>" <span id="deleteType">topic</span>? This action cannot be undone.
            </p>
        </div>

        <div class="mt-5 flex flex-wrap justify-end gap-2 sm:mt-7 sm:gap-3">
            <button id="cancelDelete" type="button" class="min-h-10 cursor-pointer rounded-lg border border-[#252B52] bg-[#1B2550] px-3 py-2 text-sm font-medium text-[#CBD5E1] transition-all duration-200 hover:-translate-y-px hover:bg-[#252B52] hover:text-[#F8FAFC] hover:shadow-md sm:px-4">
                Cancel
            </button>

            <button id="confirmDeleteTopic" type="button" class="hidden min-h-10 cursor-pointer rounded-lg bg-[#EF4444] px-3 py-2 text-sm font-semibold text-[#F8FAFC] transition-all duration-200 hover:-translate-y-px hover:bg-[#DC2626] hover:shadow-md sm:px-4">
                Delete Topic
            </button>

            <button id="confirmDeleteTask" type="button" class="hidden min-h-10 cursor-pointer rounded-lg bg-[#EF4444] px-3 py-2 text-sm font-semibold text-[#F8FAFC] transition-all duration-200 hover:-translate-y-px hover:bg-[#DC2626] hover:shadow-md sm:px-4">
                Delete Task
            </button>
        </div>
    </div>
</div>
<!-- Create Delete Topic/Task Modal ends here -->




 <!-- Topic Action Modal ends here -->
 <script src="assets/js/dashboard.js"></script>
<script src="assets/js/navbar.js"></script>
<script src="assets/js/sidebar.js?v=3"></script>

</body>
</html>
