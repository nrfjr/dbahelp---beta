<?php 
    $url = 'http://' . $_SERVER['SERVER_NAME'] . $_SERVER['REQUEST_URI'];
?>


<aside class="relative bg-indigo-400 h-screen w-64 hidden sm:block shadow-xl overflow-y-auto">
        <div class="p-6">
            <a href="<?php echo URLROOT;?>/pages/dashboard" class="text-white text-3xl font-semibold hover:text-gray-300"><?php echo SITENAME?></a>
        </div>
        <nav class="text-white text-base font-semibold pt-3">
            <ul>
                <li>
                    <a href="<?php echo URLROOT;?>/pages/dashboard" class="flex items-center py-4 pl-6 nav-item text-white <?php if (strpos($url, 'dashboard')) {echo 'active-nav-link';} else {echo ' opacity-75';}?>">
                    <i class="fas fa-chart-line mr-3"></i>
                    Dashboard
                    </a>
                </li>
                <li>
                    <a href="<?php echo URLROOT;?>/users/show"  class="flex items-center hover:opacity-100 py-4 pl-6 nav-item text-white <?php if (strpos($url, 'show')){ echo 'active-nav-link ';}else{echo 'opacity-75';}?>">
                    <i class="fas fa-user-cog mr-3"></i>
                    Manage Users
                    </a>
                </li>
                <li>
                    <button type="button" class="flex items-center py-4 pl-6 nav-item text-white w-full text-sm font-semibold pt-3" aria-controls="dropdown-example1" data-collapse-toggle="dropdown-example1"> <!--Change here for control variables-->
                            <i class="fas fa-eye mr-3"></i>
                            <span class="flex-1 text-left" sidebar-toggle-item>DATABASE MONITOR</span>
                                <svg sidebar-toggle-item class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                                </svg>
                        </button>
                            <ul id="dropdown-example1" class="hidden py-1 space-y-1 ">
                                <li>
                                    <a href="#"
                                        class="flex items-center w-full p-1 text-sm font-normal text-gray-900 transition duration-75 group hover:bg-gray-600 hover:text-white     dark:text-white dark:hover:bg-gray-700 pl-11">User Sessions</a>
                                </li>
                                <li>
                                    <a href="#"
                                        class="flex items-center w-full p-1 text-sm font-normal text-gray-900 transition duration-75 group hover:bg-gray-600 hover:text-white     dark:text-white dark:hover:bg-gray-700 pl-11">Locked Sessions</a>
                                </li>
                                <li>
                                    <a href="#"
                                        class="flex items-center w-full p-1 text-sm font-normal text-gray-900 transition duration-75 group hover:bg-gray-600 hover:text-white     dark:text-white dark:hover:bg-gray-700 pl-11">RMAN Backup Reports</a>
                                </li>
                                <li>
                                    <a href="#"
                                        class="flex items-center w-full p-1 text-sm font-normal text-gray-900 transition duration-75 group hover:bg-gray-600 hover:text-white     dark:text-white dark:hover:bg-gray-700 pl-11">Redo Log File Switches</a>
                                </li>
                                <li>
                                    <a href="#"
                                        class="flex items-center w-full p-1 text-sm font-normal text-gray-900 transition duration-75 group hover:bg-gray-600 hover:text-white     dark:text-white dark:hover:bg-gray-700 pl-11">Redo Generation Per Day</a>
                                </li>
                                <li>
                                    <a href="#"
                                        class="flex items-center w-full p-1 text-sm font-normal text-gray-900 transition duration-75 group hover:bg-gray-600 hover:text-white     dark:text-white dark:hover:bg-gray-700 pl-11">Top SQL Running Processes</a>
                                </li>
                            </ul>
                </li>
                <li>
                    <button type="button" class="flex items-center py-4 pl-6 nav-item text-white w-full text-sm font-semibold pt-3" aria-controls="dropdown-example2" data-collapse-toggle="dropdown-example2">
                            <i class="fas fa-tachometer-alt mr-3"></i>
                                <span class="flex-1 text-left" sidebar-toggle-item>DATABASE PERFORMANCE</span>
                            <svg sidebar-toggle-item class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                        </button>
                            <ul id="dropdown-example2" class="hidden py-2 space-y-2">
                                <li>
                                    <a href="#"
                                        class="flex items-center w-full p-1 text-sm font-normal text-gray-900 transition duration-75 group hover:bg-gray-600 hover:text-white     dark:text-white dark:hover:bg-gray-700 pl-11">PGA Target Advisor</a>
                                </li>
                                <li>
                                    <a href="#"
                                        class="flex items-center w-full p-1 text-sm font-normal text-gray-900 transition duration-75 group hover:bg-gray-600 hover:text-white     dark:text-white dark:hover:bg-gray-700 pl-11">SGA Target Advisor</a>
                                </li>
                                <li>
                                    <a href="#"
                                        class="flex items-center w-full p-1 text-sm font-normal text-gray-900 transition duration-75 group hover:bg-gray-600 hover:text-white     dark:text-white dark:hover:bg-gray-700 pl-11">Buffer Cache Advisor</a>
                                </li>
                                <li>
                                    <a href="#"
                                        class="flex items-center w-full p-1 text-sm font-normal text-gray-900 transition duration-75 group hover:bg-gray-600 hover:text-white     dark:text-white dark:hover:bg-gray-700 pl-11">Hit Ratio - Quick Checks</a>
                                </li>
                                <li>
                                    <a href="#"
                                        class="flex items-center w-full p-1 text-sm font-normal text-gray-900 transition duration-75 group hover:bg-gray-600 hover:text-white     dark:text-white dark:hover:bg-gray-700 pl-11">Table Statistics Status</a>
                                </li>
                            </ul>
                </li>
                <li>
                    <button type="button" class="flex items-center py-4 pl-6 nav-item text-white w-full text-sm font-semibold pt-3" aria-controls="dropdown-example3" data-collapse-toggle="dropdown-example3">
                            <i class="fas fa-lock mr-3"></i>
                                    <span class="flex-1 text-left" sidebar-toggle-item>DATABASE SECURITY</span>
                            <svg sidebar-toggle-item class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                        </button>
                            <ul id="dropdown-example3" class="hidden py-2 space-y-2">
                                <li>
                                    <a href="#"
                                        class="flex items-center w-full p-1 text-sm font-normal text-gray-900 transition duration-75 group hover:bg-gray-600 hover:text-white     dark:text-white dark:hover:bg-gray-700 pl-11">List All DB Users</a>
                                </li>
                                <li>
                                    <a href="#"
                                        class="flex items-center w-full p-1 text-sm font-normal text-gray-900 transition duration-75 group hover:bg-gray-600 hover:text-white     dark:text-white dark:hover:bg-gray-700 pl-11">DB Role Priviledge</a>
                                </li>
                                <li>
                                    <a href="#"
                                        class="flex items-center w-full p-1 text-sm font-normal text-gray-900 transition duration-75 group hover:bg-gray-600 hover:text-white     dark:text-white dark:hover:bg-gray-700 pl-11">Create LDIF Files For SSO</a>
                                </li>
                                <li>
                                    <a href="#"
                                        class="flex items-center w-full p-1 text-sm font-normal text-gray-900 transition duration-75 group hover:bg-gray-600 hover:text-white     dark:text-white dark:hover:bg-gray-700 pl-11">Oracle Retail User Management</a>
                                </li>
                            </ul>
                </li>
                <li>
                    <button type="button" class="flex items-center py-4 pl-6 nav-item text-white w-full text-sm font-semibold pt-3" aria-controls="dropdown-example4" data-collapse-toggle="dropdown-example4">
                            <i class="fas fa-solid fa-database mr-3"></i>
                                    <span class="flex-1 text-left" sidebar-toggle-item>DATABASE STORAGE AND OBJECTS</span>
                            <svg sidebar-toggle-item class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                        </button>
                            <ul id="dropdown-example4" class="hidden py-2 space-y-2">
                                <li>
                                    <a href="#"
                                        class="flex items-center w-full p-1 text-sm font-normal text-gray-900 transition duration-75 group hover:bg-gray-600 hover:text-white     dark:text-white dark:hover:bg-gray-700 pl-11">Database File Layout</a>
                                </li>
                                <li>
                                    <a href="#"
                                        class="flex items-center w-full p-1 text-sm font-normal text-gray-900 transition duration-75 group hover:bg-gray-600 hover:text-white     dark:text-white dark:hover:bg-gray-700 pl-11">Invalid Objects</a>
                                </li>
                                <li>
                                    <a href="#"
                                        class="flex items-center w-full p-1 text-sm font-normal text-gray-900 transition duration-75 group hover:bg-gray-600 hover:text-white     dark:text-white dark:hover:bg-gray-700 pl-11">Tablespace Usage</a>
                                </li>
                                <li>
                                    <a href="#"
                                        class="flex items-center w-full p-1 text-sm font-normal text-gray-900 transition duration-75 group hover:bg-gray-600 hover:text-white     dark:text-white dark:hover:bg-gray-700 pl-11">Table Monitoring</a>
                                </li>
                                <li>
                                    <a href="#"
                                        class="flex items-center w-full p-1 text-sm font-normal text-gray-900 transition duration-75 group hover:bg-gray-600 hover:text-white     dark:text-white dark:hover:bg-gray-700 pl-11">Table Indexes</a>
                                </li>
                            </ul>
                    </li>
            </ul>

            <!--Calendar-->
            <div class="w-full px-1 mt-6 h-48">
            <iframe src="https://calendar.google.com/calendar/embed?height=600&wkst=1&bgcolor=%23039BE5&ctz=Asia%2FManila&showTitle=0&showTz=0&showCalendars=0&showPrint=0&showTabs=0&src=YmI1ZDVkMjgxZThjNTQ5MWYyZGRkOTBlMGQ5YzZkYWU4NWI2ODcxNzc5OGI5ZjE0NTI5ZDFiZGQzZWZmNGUxMUBncm91cC5jYWxlbmRhci5nb29nbGUuY29t&color=%23795548" style="border-width:0; border-radius: 0 0 5px 5px;" class="shadow-lg" width="100%" height="100%" frameborder="0" scrolling="no"></iframe>
            </div>
            <script src="https://unpkg.com/flowbite@1.3.4/dist/flowbite.js"></script>
        </nav>
    </aside>
    <div class="w-full flex flex-col h-screen overflow-y-hidden">
        <!-- Desktop Header -->
        <header class="w-full items-center bg-gray-600 py-2 px-6 hidden sm:flex">
            <div class="w-1/2"></div>
            <div x-data="{ isOpen: false }" class="relative w-1/2 flex justify-end">
            <?php if(isset($_SESSION['username'])): ?>
                <h4 class="py-1 px-2 text-white"><?php echo  '<b>'.$_SESSION['username'].'</b>' ?></h4>
            <?php endif; ?>
                <button @click="isOpen = !isOpen" class="realtive z-10 w-12 h-12 rounded-full overflow-hidden border-4 border-gray-400 hover:border-gray-300 focus:border-gray-300 focus:outline-none">
                    <img src="<?php echo URLROOT; ?>/public/img/user.png">
                </button>
                <button x-show="isOpen" @click="isOpen = false" class="h-full w-full fixed inset-0 cursor-default"></button>
                <div x-show="isOpen" class="absolute w-32  bg-gray-400 rounded-lg shadow-lg py-2 mt-16">
                    <a href="<?php echo URLROOT; ?>/users/logout" class="block text-white text-center px-4 py-2 account-link hover:text-white">Sign Out</a>
                </div>
            </div>
        </header>
            <main class="flex-grow p-6 bg-gray-800">