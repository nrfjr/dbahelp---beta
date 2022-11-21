<?php 
    $url = 'http://' . $_SERVER['SERVER_NAME'] . $_SERVER['REQUEST_URI'];
?>


<aside class="relative h-screen w-64 sm:block overflow-y-auto scrollbar-hide transition ease-in-out delay-150">
    <div>
        <div class="pt-6 px-6 pb-3 logo">
            <a href="<?php echo URLROOT;?>/homepage/dashboard" class="text-white text-3xl font-semibold hover:text-gray-300"><?php echo SITENAME?></a>
        </div>
        <nav class="text-white text-base font-semibold py-2 overflow-y-auto scrollbar-hide maxh">
            <div id="accordion-open" data-accordion="open">
                <ul>
                    <!--DATABASES-->
                    <li class="flex flex-row">
                                <a  class="flex items-center py-4 pl-6 text-white w-10/12" 
                                >
                                    <i class="fas fa-warehouse mr-3"></i>
                                    Databases 
                                </a>

                                    <button type="button" class="flex-auto items-center py-4 hover:bg-gray-300 text-white" 
                                    
                                    aria-expanded="<?php 
                                    if (strpos($url, 'dashboard')) {echo 'true';} else {echo ' false';}?>" 
                                    aria-controls="databases" 
                                    data-accordion-target="#databases"
                                    data-collapse-toggle="databases"> 
                                    <!--Code above is needed for collapse open while select-->
                                    <!--Change here for control variables-->
                                            <svg sidebar-toggle-item class="w-6 h-8" fill="currentColor" viewBox="0 -5 12 28" xmlns="http://www.w3.org/2000/svg">
                                                <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                                            </svg>  
                                        
                                    </button>
                                
                                    
                            
                    </li>
                    <ul id="databases" class="hidden py-1  ">
                            <li >
                                <a href="<?php echo URLROOT;?>/homepage/dashboard"  class="flex items-center hover:opacity-100 py-4 pl-12 nav-item text-white <?php if (strpos($url, 'dashboard')){ echo 'active-nav-link ';}else{echo 'opacity-75';}?>">
                                    <i class="fas fa-database mr-3"></i>
                                ORACLE
                                </a>
                            <li>
                                <a href="<?php echo URLROOT;?>/homepage/dashboard"  class="flex items-center hover:opacity-100 py-4 pl-12 nav-item text-white <?php if (strpos($url, 'mssql')){ echo 'active-nav-link ';}else{echo 'opacity-75';}?>">
                                    <i class="fas fa-database mr-3"></i>
                                MSSQL
                                </a>
                            </li>
                            <li>
                                <a href="<?php echo URLROOT;?>/homepage/dashboard"  class="flex items-center hover:opacity-100 py-4 pl-12 nav-item text-white <?php if (strpos($url, 'mariadb')){ echo 'active-nav-link ';}else{echo 'opacity-75';}?>">
                                    <i class="fas fa-database mr-3"></i>
                                    MARIA DB
                                </a>
                            </li>  
                        </ul>
                    <!--DASHBOARD-->
                    
                        <li>
                            <a href="<?php echo URLROOT;?>/diskstorages/diskstorage/null" class="flex items-center py-4 pl-6 nav-item text-white <?php if (strpos($url, 'diskstorage')) {echo 'active-nav-link';} else {echo ' opacity-75';}?>" 
                                    >
                                <i class="fas fa-compact-disc mr-3"></i>
                                Disk Storage
                            </a>
                        </li>
                        <li>
                            <a href="<?php echo URLROOT;?>/homepage/flashrecovery" class="flex items-center py-4 pl-6 nav-item text-white <?php if (strpos($url, 'flashrecovery')) {echo 'active-nav-link';} else {echo ' opacity-75';}?>" 
                                    >
                                <i class="fas fa-compact-disc mr-3"></i>
                                Flash Recovery
                            </a>
                        </li>

                    <li>
                        <a href="<?php echo URLROOT;?>/users/show"  class="flex items-center hover:opacity-100 py-4 pl-6 nav-item text-white <?php if (strpos($url, 'show')){ echo 'active-nav-link ';}else{echo 'opacity-75';}?>">
                        <i class="fas fa-user-cog mr-3"></i>
                        Manage Users
                        </a>
                    </li>
                    
                </ul>
            </div>
        </nav>
    </div>

    <!--Time & Date-->
    <div class="left-0 widgets transition ease-in-out delay-150 bg-gradient-to-br from-gray-500 to-gray-900 rounded-lg">
        <div class="w-9/10 justify-center px-1 mt-1">
            <div id="swtClock" class="bg-gradient-to-r from-pink-100 to-blue-100 rounded-t-lg" style="text-align: center;"></div>
            <script type="text/javascript" src="https://www.superwebtricks.com/wp-content/uploads/clock.js.txt"></script>
            
        </div>
        <!--Calendar-->
        <div class="w-full px-1">
            <iframe src="https://calendar.google.com/calendar/embed?height=600&wkst=1&bgcolor=%23039BE5&ctz=Asia%2FManila&showTitle=0&showTz=0&showCalendars=0&showPrint=0&showTabs=0&src=YmI1ZDVkMjgxZThjNTQ5MWYyZGRkOTBlMGQ5YzZkYWU4NWI2ODcxNzc5OGI5ZjE0NTI5ZDFiZGQzZWZmNGUxMUBncm91cC5jYWxlbmRhci5nb29nbGUuY29t&color=%23795548" style="border-width:0; border-radius: 0 0 5px 5px;pointer-events:none;" class="shadow-lg" width="100%" height="100%" frameborder="0" scrolling="no"></iframe>
        </div>
    </div>
    
    
</aside>
    <div class="w-full flex flex-col h-screen overflow-y-auto scrollbar-hide">
        <!-- Desktop Header -->
        <header class="w-full items-center bg-gray-600 py-2 px-6 sm:flex">
            <!--TOP NAVBAR-->
            <div class="w-full">
                    <!--Oracle Databases-->
                    <button id="dropdownDefault" data-dropdown-toggle="dropdown-oracle" class="text-white bg-gray-600 hover:bg-gray-400 hover:text-black focus:ring-4 focus:outline-none focus:ring-gray-800 font-medium rounded-lg text-sm px-4 py-2.5 text-center inline-flex items-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800
                            <!--THIS BELOW CHANGE URL-->
                            <?php echo strpos($url, 'dashboard')? 'block focus:bg-gray-400 focus:text-black': 'hidden';?>
                            " type="button">Databases<svg class="ml-2 w-4 h-4" aria-hidden="true" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg></button>
                            <!-- Dropdown menu -->
                            <div id="dropdown-oracle" class="hidden z-10 w-44 bg-white rounded divide-y divide-gray-100 shadow dark:bg-gray-700">
                                <ul class="py-1 text-sm text-gray-700 dark:text-gray-200" aria-labelledby="dropdownDefault">
                                <li>
                                    <a href="#" class="block py-2 px-4 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">RMS</a>
                                </li>
                                <li>
                                    <a href="#" class="block py-2 px-4 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">RDW</a>
                                </li>
                                <li>
                                    <a href="#" class="block py-2 px-4 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">OFIN</a>
                                </li>
                                <li>
                                    <a href="#" class="block py-2 px-4 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">WMS 192.168.33.57</a>
                                </li>
                                <li>
                                    <a href="#" class="block py-2 px-4 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">WMS  192.168.33.60</a>
                                </li>
                                </ul>
                            </div>
                    <!--Oracle Databases-->
                <div class="hidden xl:inline-flex" >
                    <div class="lg:ml-6 lg:px-6 lg:py-2 lg:border-l-2 lg:border-gray-900 inline-flex <?php echo strpos($url, 'dashboard')? 'block': 'hidden';?>">
                    <!-- Oracle Tools -->
                    <!--MONITOR-->
                    <button id="dropdownDefault" data-dropdown-toggle="dropdown-monitor" class="mx-1 text-white bg-gray-600 hover:bg-gray-400 hover:text-black focus:ring-4 focus:outline-none focus:ring-gray-800 font-extralight lg:font-medium rounded-lg text-sm px-2 lg:px-4 py-0 lg:py-2.5 text-center inline-flex items-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800
                    <!--THIS BELOW CHANGE URL-->
                    <?php echo strpos($url, 'dashboard')? 'block focus:bg-gray-400 hover:text-black': 'hidden';?>
                    " type="button">MONITOR<svg class="ml-2 w-4 h-4" aria-hidden="true" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg></button>
                    <!-- Dropdown menu -->
                    <div id="dropdown-monitor" class="hidden absolute z-10 w-44 bg-white rounded divide-y divide-gray-100 shadow dark:bg-gray-700">
                        <ul class="py-1 text-sm text-gray-700 dark:text-gray-200" aria-labelledby="dropdownDefault">
                        <li>
                            <a href="#" class="block py-2 px-4 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">User Sessions</a>
                        </li>
                        <li>
                            <a href="#" class="block py-2 px-4 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Locked Sessions</a>
                        </li>
                        <li>
                            <a href="#" class="block py-2 px-4 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">RMAN Backup Reports</a>
                        </li>
                        <li>
                            <a href="#" class="block py-2 px-4 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Redo Log File Switches</a>
                        </li>
                        <li>
                            <a href="#" class="block py-2 px-4 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Redo Generation Per Day</a>
                        </li>
                        <li>
                            <a href="#" class="block py-2 px-4 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Top SQL Running Processes</a>
                        </li>
                        </ul>
                    </div>
                    <!--MONITOR-->

                    <!--PERFORMANCE-->
                    <button id="dropdownDefault" data-dropdown-toggle="dropdown-performance" class="mx-1 text-white bg-gray-600 hover:bg-gray-400 hover:text-black focus:ring-4 focus:outline-none focus:ring-gray-800 font-medium rounded-lg text-sm px-4 py-2.5 text-center inline-flex items-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800
                    <?php echo strpos($url, 'dashboard')? 'block focus:bg-gray-400 hover:text-black':'hidden';?>
                    " type="button">PERFORMANCE<svg class="ml-2 w-4 h-4" aria-hidden="true" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg></button>
                    <!-- Dropdown menu -->
                    <div id="dropdown-performance" class="hidden z-10 w-44 bg-white rounded divide-y divide-gray-100 shadow dark:bg-gray-700">
                        <ul class="py-1 text-sm text-gray-700 dark:text-gray-200" aria-labelledby="dropdownDefault">
                        <li>
                            <a href="#" class="block py-2 px-4 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">PGA Target Advisor</a>
                        </li>
                        <li>
                            <a href="#" class="block py-2 px-4 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">SGA Target Advisor</a>
                        </li>
                        <li>
                            <a href="#" class="block py-2 px-4 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Buffer Cache Advisor</a>
                        </li>
                        <li>
                            <a href="#" class="block py-2 px-4 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Hit Ratio - Quick Checks</a>
                        </li>
                        <li>
                            <a href="#" class="block py-2 px-4 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Table Statistics Status</a>
                        </li>
                        </ul>
                    </div>
                    <!--PERFORMANCE-->

                    <!--SECURITY-->
                    <button id="dropdownDefault" data-dropdown-toggle="dropdown-security" class="mx-1 text-white bg-gray-600 hover:bg-gray-400 hover:text-black focus:ring-4 focus:outline-none focus:ring-gray-800 font-medium rounded-lg text-sm px-4 py-2.5 text-center inline-flex items-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800
                    <?php echo strpos($url, 'dashboard')? 'block focus:bg-gray-400 hover:text-black':'hidden';?>
                    " type="button">SECURITY<svg class="ml-2 w-4 h-4" aria-hidden="true" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg></button>
                    <!-- Dropdown menu -->
                    <div id="dropdown-security" class="hidden z-10 w-44 bg-white rounded divide-y divide-gray-100 shadow dark:bg-gray-700">
                        <ul class="py-1 text-sm text-gray-700 dark:text-gray-200" aria-labelledby="dropdownDefault">
                        <li>
                            <a href="#" class="block py-2 px-4 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">List All DB Users</a>
                        </li>
                        <li>
                            <a href="#" class="block py-2 px-4 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">DB Role Priviledge</a>
                        </li>
                        <li>
                            <a href="#" class="block py-2 px-4 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Create LDIF Files For SSO</a>
                        </li>
                        <li>
                            <a href="#" class="block py-2 px-4 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Oracle Retail User Management</a>
                        </li>
                        </ul>
                    </div>
                    <!--SECURITY-->

                    <!--OBJECTS-->
                    <button id="dropdownDefault" data-dropdown-toggle="dropdown-storage" class="mx-1 text-white bg-gray-600 hover:bg-gray-400 hover:text-black focus:ring-4 focus:outline-none focus:ring-gray-800 font-medium rounded-lg text-sm px-4 py-2.5 text-center inline-flex items-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800
                    <?php echo strpos($url, 'dashboard')? 'block focus:bg-gray-400 hover:text-black':'hidden';?>
                    " type="button">STORAGE & OBJECTS<svg class="ml-2 w-4 h-4" aria-hidden="true" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg></button>
                    <!-- Dropdown menu -->
                    <div id="dropdown-storage" class="hidden z-10 w-44 bg-white rounded divide-y divide-gray-100 shadow dark:bg-gray-700">
                        <ul class="py-1 text-sm text-gray-700 dark:text-gray-200" aria-labelledby="dropdownDefault">
                        <li>
                            <a href="#" class="block py-2 px-4 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Database File Layout</a>
                        </li>
                        <li>
                            <a href="#" class="block py-2 px-4 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Invalid Objects</a>
                        </li>
                        <li>
                            <a href="#" class="block py-2 px-4 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Table Space Usage</a>
                        </li>
                        <li>
                            <a href="#" class="block py-2 px-4 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Table Monitoring</a>
                        </li>
                        <li>
                            <a href="#" class="block py-2 px-4 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Table Indexes</a>
                        </li>
                        </ul>
                    </div>
                    <!--OBJECTS-->
                    <!-- Oracle Tools -->
                </div>
                
                </div>     
                <!-- Small Screen Tool Drop Down -->
                <div class="inline-flex xl:hidden">
                    <!-- Container -->
                    <button id="dropdownDefault" data-dropdown-toggle="dropdown-tools" class="mx-1 text-white bg-gray-700 hover:bg-gray-400 hover:text-black focus:ring-4 focus:outline-none focus:ring-gray-800 font-medium rounded-lg text-sm px-4 py-2.5 text-center inline-flex items-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800
                    <?php echo strpos($url, 'dashboard')? 'block focus:bg-gray-400 hover:text-black':'hidden';?>
                    " type="button"><i class="fas fa-wrench"></i></button>
                    <!-- Dropdown menu -->
                    <div id="dropdown-tools" class="hidden z-10 w-44 bg-gray-600 rounded divide-y divide-gray-100 shadow dark:bg-gray-700 ">
                        <ul class="py-1 text-sm text-gray-700 dark:text-gray-200" aria-labelledby="dropdownDefault">
                        <li>
                            <!--MONITOR-->
                            <button id="dropdownDefault" data-dropdown-toggle="dropdown-sm-monitor" data-dropdown-placement="right-start" class="mb-1 text-white bg-gray-600 hover:bg-gray-400 hover:text-black focus:ring-4 focus:outline-none focus:ring-gray-800 font-medium rounded-lg text-sm px-4 py-2.5 text-center flex justify-between items-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800 w-full
                            <!--THIS BELOW CHANGE URL-->
                            <?php echo strpos($url, 'dashboard')? 'block focus:bg-gray-400 hover:text-black': 'hidden';?>
                            " type="button">MONITOR<i class="fas fa-regular fa-chevron-right"></i></button>
                            <!-- Dropdown menu -->
                            <div id="dropdown-sm-monitor" class="hidden absolute z-10 w-44 bg-white rounded divide-y divide-gray-100 shadow dark:bg-gray-700 left-0">
                                <ul class="py-1 text-sm text-gray-700 dark:text-gray-200" aria-labelledby="dropdownDefault">
                                <li>
                                    <a href="#" class="block py-2 px-4 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">User Sessions</a>
                                </li>
                                <li>
                                    <a href="#" class="block py-2 px-4 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Locked Sessions</a>
                                </li>
                                <li>
                                    <a href="#" class="block py-2 px-4 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">RMAN Backup Reports</a>
                                </li>
                                <li>
                                    <a href="#" class="block py-2 px-4 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Redo Log File Switches</a>
                                </li>
                                <li>
                                    <a href="#" class="block py-2 px-4 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Redo Generation Per Day</a>
                                </li>
                                <li>
                                    <a href="#" class="block py-2 px-4 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Top SQL Running Processes</a>
                                </li>
                                </ul>
                            </div>
                            <!--MONITOR-->
                        </li>
                        <li>
                            <!--PERFORMANCE-->
                            <button id="dropdownDefault" data-dropdown-toggle="dropdown-sm-performance" data-dropdown-placement="right-start" class="mb-1 text-white bg-gray-600 hover:bg-gray-400 hover:text-black focus:ring-4 focus:outline-none focus:ring-gray-800 font-medium rounded-lg text-sm px-4 py-2.5 text-center flex justify-between items-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800 w-full
                            <?php echo strpos($url, 'dashboard')? 'block focus:bg-gray-400 hover:text-black':'hidden';?>
                            " type="button">PERFORMANCE<i class="fas fa-regular fa-chevron-right"></i></button>
                            <!-- Dropdown menu -->
                            <div id="dropdown-sm-performance" class="hidden z-10 w-44 bg-white rounded divide-y divide-gray-100 shadow dark:bg-gray-700">
                                <ul class="py-1 text-sm text-gray-700 dark:text-gray-200" aria-labelledby="dropdownDefault">
                                <li>
                                    <a href="#" class="block py-2 px-4 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">PGA Target Advisor</a>
                                </li>
                                <li>
                                    <a href="#" class="block py-2 px-4 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">SGA Target Advisor</a>
                                </li>
                                <li>
                                    <a href="#" class="block py-2 px-4 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Buffer Cache Advisor</a>
                                </li>
                                <li>
                                    <a href="#" class="block py-2 px-4 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Hit Ratio - Quick Checks</a>
                                </li>
                                <li>
                                    <a href="#" class="block py-2 px-4 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Table Statistics Status</a>
                                </li>
                                </ul>
                            </div>
                            <!--PERFORMANCE-->
                        </li>
                        <li>
                            <!--SECURITY-->
                            <button id="dropdownDefault" data-dropdown-toggle="dropdown-sm-security" data-dropdown-placement="right-start" class="mb-1 text-white bg-gray-600 hover:bg-gray-400 hover:text-black focus:ring-4 focus:outline-none focus:ring-gray-800 font-medium rounded-lg text-sm px-4 py-2.5 text-center flex justify-between items-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800 w-full
                            <?php echo strpos($url, 'dashboard')? 'block focus:bg-gray-400 hover:text-black':'hidden';?>
                            " type="button">SECURITY<i class="fas fa-regular fa-chevron-right"></i></button>
                            <!-- Dropdown menu -->
                            <div id="dropdown-sm-security" class="hidden z-10 w-44 bg-white rounded divide-y divide-gray-100 shadow dark:bg-gray-700">
                                <ul class="py-1 text-sm text-gray-700 dark:text-gray-200" aria-labelledby="dropdownDefault">
                                <li>
                                    <a href="#" class="block py-2 px-4 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">List All DB Users</a>
                                </li>
                                <li>
                                    <a href="#" class="block py-2 px-4 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">DB Role Priviledge</a>
                                </li>
                                <li>
                                    <a href="#" class="block py-2 px-4 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Create LDIF Files For SSO</a>
                                </li>
                                <li>
                                    <a href="#" class="block py-2 px-4 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Oracle Retail User Management</a>
                                </li>
                                </ul>
                            </div>
                            <!--SECURITY-->
                        </li>
                        <li>
                            <!--OBJECTS-->
                            <button id="dropdownDefault" data-dropdown-toggle="dropdown-sm-storage" data-dropdown-placement="right-start" class="text-white bg-gray-600 hover:bg-gray-400 hover:text-black focus:ring-4 focus:outline-none focus:ring-gray-800 font-medium rounded-lg text-sm px-4 py-2.5 text-center flex justify-between items-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800 w-full
                            <?php echo strpos($url, 'dashboard')? 'block focus:bg-gray-400 hover:text-black':'hidden';?>
                            " type="button">STORAGE<i class="fas fa-regular fa-chevron-right"></i></button>
                            <!-- Dropdown menu -->
                            <div id="dropdown-sm-storage" class="hidden z-10 w-44 bg-white rounded divide-y divide-gray-100 shadow dark:bg-gray-700">
                                <ul class="py-1 text-sm text-gray-700 dark:text-gray-200" aria-labelledby="dropdownDefault">
                                <li>
                                    <a href="#" class="block py-2 px-4 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Database File Layout</a>
                                </li>
                                <li>
                                    <a href="#" class="block py-2 px-4 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Invalid Objects</a>
                                </li>
                                <li>
                                    <a href="#" class="block py-2 px-4 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Table Space Usage</a>
                                </li>
                                <li>
                                    <a href="#" class="block py-2 px-4 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Table Monitoring</a>
                                </li>
                                <li>
                                    <a href="#" class="block py-2 px-4 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Table Indexes</a>
                                </li>
                                </ul>
                            </div>
                            <!--OBJECTS-->
                        </li>
                        </ul>
                    </div>
                </div>
                <!-- Small Screen Tool Drop Down -->

                <!--Database Disk-->
                <button id="dropdownDefault" data-dropdown-toggle="dropdown-disk" class="text-white bg-gray-600 hover:bg-gray-400 hover:text-black focus:ring-4 focus:outline-none focus:ring-gray-800 font-medium rounded-lg text-sm px-4 py-2.5 text-center inline-flex items-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800
                    <?php echo strpos($url, 'diskstorage')? 'block focus:bg-gray-400 focus:text-black':'hidden';?>
                    " type="button">Database<svg class="ml-2 w-4 h-4" aria-hidden="true" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg></button>
                    <!-- Dropdown menu -->
                    <div id="dropdown-disk" class="whitespace-normal hidden z-10 w-fit bg-white rounded divide-y divide-gray-100 shadow dark:bg-gray-700">

                            <ul class="py-1 text-sm text-gray-700 dark:text-gray-200" aria-labelledby="dropdownDefault">
                                <li>
                                <a href="<?php echo URLROOT;?>/diskstorages/diskstorage/RMSPRD">
                                        <button type="button" class="block py-2 px-4 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">
                                            192.168.32.184 - RMSPRD
                                        </button>
                                    </a>
                                </li>
                                <li>
                                    <a href="<?php echo URLROOT;?>/diskstorages/diskstorage/RDWPRD">
                                        <button type="submit" class="block py-2 px-4 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">
                                            192.168.32.198 - RDWPRD
                                        </button>
                                    </a>
                                </li>
                                <li>
                                    <a href="<?php echo URLROOT;?>/diskstorages/diskstorage/RMSOID">
                                        <button type="submit" class="block py-2 px-4 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">
                                            192.168.32.162 - RMS/OID
                                        </button>
                                    </a>
                                </li>
                                <li>
                                    <a href="<?php echo URLROOT;?>/diskstorages/diskstorage/SIMREIM">
                                        <button type="submit" class="block py-2 px-4 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">
                                        192.168.32.164 - SIM/REIM
                                        </button>
                                    </a>
                                </li>
                                <li>
                                    <a href="<?php echo URLROOT;?>/diskstorages/diskstorage/RPM">
                                        <button type="submit" class="block py-2 px-4 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">
                                        192.168.32.165 - RPM
                                        </button>
                                    </a>
                                </li>
                            </ul>
                    </div>
                    <!--Database Disk-->

                    <!--Database Manage User-->
                    <button id="dropdownDefault" data-dropdown-toggle="dropdown-user" class="text-white bg-gray-600 hover:bg-gray-400 hover:text-black focus:ring-4 focus:outline-none focus:ring-gray-800 font-medium rounded-lg text-sm px-4 py-2.5 text-center inline-flex items-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800
                        <?php echo strpos($url, 'show')? 'block focus:bg-gray-400 focus:text-black':'hidden';?>
                        " type="button">Database<svg class="ml-2 w-4 h-4" aria-hidden="true" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg></button>
                        <!-- Dropdown menu -->
                        <div id="dropdown-user" class="whitespace-normal hidden z-10 w-fit bg-white rounded divide-y divide-gray-100 shadow dark:bg-gray-700">

                                <ul class="py-1 text-sm text-gray-700 dark:text-gray-200" aria-labelledby="dropdownDefault">
                                    <li>
                                    <a href="<?php echo URLROOT;?>#">
                                            <button type="button" class="block py-2 px-4 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">
                                                192.168.32.184 - RMSPRD
                                            </button>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="<?php echo URLROOT;?>#">
                                            <button type="submit" class="block py-2 px-4 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">
                                                192.168.32.198 - RDWPRD
                                            </button>
                                        </a>
                                    </li>
                                </ul>
                        </div>
                    <!--Database Manage User-->
            </div>
            <!--TOP NAVBAR-->
            <div x-data="{ isOpen: false }" class="relative w-1/2 md:w-1/4 flex justify-end">
            <?php if(isset($_SESSION['username'])): ?>
                <h4 class="py-1 px-2 text-white"><?php echo  '<b>'.$_SESSION['username'].'</b>' ?></h4>
            <?php endif; ?>
                <button @click="isOpen = !isOpen" class="realtive z-10 w-12 h-12 rounded-full overflow-hidden border-4 border-gray-400 hover:border-gray-300 focus:border-gray-300 focus:outline-none">
                    <img src="<?php echo URLROOT; ?>/public/img/user.png">
                </button>
                <button x-show="isOpen" @click="isOpen = false" class="h-full w-full fixed inset-0 cursor-default"></button>
                <div x-show="isOpen" class="absolute w-32 justify-center bg-gray-600 rounded-lg shadow-lg px-4 py-2 mt-16">
                    <a href="<?php echo URLROOT; ?>/users/logout" class="block text-white  text-center  py-2 rounded-lg hover:bg-gray-400 hover:text-black">Sign Out</a>
                </div>
            </div>
        </header>
            <main class="flex-grow p-6 bg-gray-600">