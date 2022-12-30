<div class="w-1/2 sm:w-fit md:w-full">
    <button class="justify-center md:hidden mx-2 p-4 hover:bg-gray-400 rounded-full" onclick="navToggle()">
        <i class="fa-solid fa-bars"></i>
    </button>
    <!--Oracle Databases-->
    <button id="dropdownDefault" data-dropdown-toggle="dropdown-oracle" data-dropdown-placement="bottom-end" class="text-white bg-gray-600 hover:bg-gray-400 hover:text-black focus:ring-4 focus:outline-none focus:ring-gray-800 font-medium rounded-lg text-sm px-4 py-2.5 text-center inline-flex items-center
                            <!--THIS BELOW CHANGE URL-->
                            <?php echo preg_match('/dashboard|index/', $url) ? 'block focus:bg-gray-400 focus:text-black' : 'hidden'; ?>
                           " type="button">Databases<svg class="ml-2 w-4 h-4" aria-hidden="true" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
        </svg></button>
    <!-- Dropdown menu -->
    <div id="dropdown-oracle" class="hidden absolute z-10 bg-white rounded-md divide-y divide-gray-100 shadow max-h-48 overflow-y-auto scrollbar-hide">
        <ul class="rounded-md text-sm text-gray-700" aria-labelledby="dropdownDefault">
            <?php foreach(HOSTS as $host => $db){
                if($host != 'DEFAULT'){
            ?>
            <li>
                <form action="<?php echo URLROOT; ?>/homepages/index/<?php echo $host?>" method="POST"><button type="submit" class="transition delay-100 block w-full rounded-t-sm py-2 px-4 hover:bg-gray-400 hover:text-white"><?php echo $host?></button></form>
            </li>
            <?php }
            }?>
        </ul>
    </div>
    <!--Oracle Databases-->
    <div class="hidden xl:inline-flex">
        <div class="lg:ml-6 lg:px-6 lg:py-2 lg:border-l-2 lg:border-gray-900 inline-flex <?php echo strpos($url, 'index') ? 'block' : 'hidden'; ?>">
            <!-- Oracle Tools -->
            <!--MONITOR-->
            <button id="dropdownDefault" data-dropdown-toggle="dropdown-monitor" data-dropdown-placement="bottom-start" class="mx-1 text-white bg-gray-600 hover:bg-gray-400 hover:text-black focus:ring-4 focus:outline-none focus:ring-gray-800 font-extralight lg:font-medium rounded-lg text-sm px-2 lg:px-4 py-0 lg:py-2.5 text-center inline-flex items-center
                    <!--THIS BELOW CHANGE URL-->
                    <?php echo strpos($url, 'index') ? 'block focus:bg-gray-400 hover:text-black' : 'hidden'; ?>
                   " type="button">MONITOR<svg class="ml-2 w-4 h-4" aria-hidden="true" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                </svg></button>
            <!-- Dropdown menu -->
            <div id="dropdown-monitor" class="hidden absolute z-10 w-44 bg-white rounded divide-y divide-gray-100 shadow max-h-48 overflow-y-auto scrollbar-hide">
                <ul class="rounded-md text-sm text-gray-700" aria-labelledby="dropdownDefault">
                    <li>
                        <a href="<?php echo URLROOT; ?>/monitors/usersessions/<?php echo $_SESSION['HomepageDB']?>" class="transition delay-100 rounded-t-sm block py-2 px-4 hover:bg-gray-400 hover:text-white">User Sessions</a>
                    </li>
                    <li>
                        <a href="<?php echo URLROOT; ?>/monitors/lockedsessions/<?php echo $_SESSION['HomepageDB']?>" class="transition delay-100 block py-2 px-4 hover:bg-gray-400 hover:text-white">Locked Sessions</a>
                    </li>
                    <li>
                        <a href="<?php echo URLROOT; ?>/monitors/redologswitches/<?php echo $_SESSION['HomepageDB']?>" class="transition delay-100 block py-2 px-4 hover:bg-gray-400 hover:text-white">Redo Log File Switches</a>
                    </li>
                    <li>
                        <a href="<?php echo URLROOT; ?>/monitors/redologgenerations/<?php echo $_SESSION['HomepageDB']?>" class="transition delay-100 block py-2 px-4 hover:bg-gray-400 hover:text-white">Redo Generation Per Day</a>
                    </li>
                    <li>
                        <a href="<?php echo URLROOT; ?>/monitors/topsql/<?php echo $_SESSION['HomepageDB']?>" class="transition delay-100 block rounded-b-sm py-2 px-4 hover:bg-gray-400 hover:text-white">Top SQL Running Processes</a>
                    </li>
                </ul>
            </div>
            <!--MONITOR-->

            <!--PERFORMANCE-->
            <button id="dropdownDefault" data-dropdown-toggle="dropdown-performance" data-dropdown-placement="bottom-start" class="mx-1 text-white bg-gray-600 hover:bg-gray-400 hover:text-black focus:ring-4 focus:outline-none focus:ring-gray-800 font-medium rounded-lg text-sm px-4 py-2.5 text-center inline-flex items-center 
                    <?php echo strpos($url, 'index') ? 'block focus:bg-gray-400 hover:text-black' : 'hidden'; ?>
                   " type="button">PERFORMANCE<svg class="ml-2 w-4 h-4" aria-hidden="true" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                </svg></button>
            <!-- Dropdown menu -->
            <div id="dropdown-performance" class="hidden z-10 w-44 bg-white rounded divide-y divide-gray-100 shadow max-h-48 overflow-y-auto scrollbar-hide">
                <ul class="rounded-md text-sm text-gray-700" aria-labelledby="dropdownDefault">
                    <li>
                        <a href="<?php echo URLROOT; ?>/performances/pgatargetadvisor/<?php echo $_SESSION['HomepageDB']?>" class="transition delay-100 rounded-t-sm block py-2 px-4 hover:bg-gray-400 hover:text-white">PGA Target Advisor</a>
                    </li>
                    <li>
                        <a href="<?php echo URLROOT; ?>/performances/sgatargetadvisor/<?php echo $_SESSION['HomepageDB']?>" class="transition delay-100 block py-2 px-4 hover:bg-gray-400 hover:text-white">SGA Target Advisor</a>
                    </li>
                    <li>
                        <a href="<?php echo URLROOT; ?>/performances/buffercacheadvisor/<?php echo $_SESSION['HomepageDB']?>" class="transition delay-100 block py-2 px-4 hover:bg-gray-400 hover:text-white">Buffer Cache Advisor</a>
                    </li>
                    <li>
                        <a href="<?php echo URLROOT; ?>/performances/hitratio/<?php echo $_SESSION['HomepageDB']?>" class="transition delay-100 block py-2 px-4 hover:bg-gray-400 hover:text-white">Hit Ratio - Quick Checks</a>
                    </li>
                    <li>
                        <a href="<?php echo URLROOT; ?>/performances/tablestatistics/<?php echo $_SESSION['HomepageDB']?>" class="transition delay-100 rounded-b-sm block py-2 px-4 hover:bg-gray-400 hover:text-white">Table Statistics Status</a>
                    </li>
                    <li>
                        <a href="<?php echo URLROOT; ?>/performances/dynacomp/<?php echo $_SESSION['HomepageDB']?>" class="transition delay-100 rounded-b-sm block py-2 px-4 hover:bg-gray-400 hover:text-white">SGA Dynamic Components</a>
                    </li>
                </ul>
            </div>
            <!--PERFORMANCE-->

            <!--SECURITY-->
            <button id="dropdownDefault" data-dropdown-toggle="dropdown-security" data-dropdown-placement="bottom-start" class="mx-1 text-white bg-gray-600 hover:bg-gray-400 hover:text-black focus:ring-4 focus:outline-none focus:ring-gray-800 font-medium rounded-lg text-sm px-4 py-2.5 text-center inline-flex items-center 
                    <?php echo strpos($url, 'index/RMSPRD') ? 'block focus:bg-gray-400 hover:text-black' : 'hidden'; ?>
                   " type="button">SECURITY<svg class="ml-2 w-4 h-4" aria-hidden="true" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                </svg></button>
            <!-- Dropdown menu -->
            <div id="dropdown-security" class="hidden z-10 w-44 bg-white rounded divide-y divide-gray-100 shadow  max-h-48 overflow-y-auto scrollbar-hide">
                <ul class="rounded-md text-sm text-gray-700" aria-labelledby="dropdownDefault">
                    <li>
                        <a href="<?php echo URLROOT; ?>/securities/roleprivilege/<?php echo $_SESSION['HomepageDB']?>" class="transition delay-100 rounded-t-sm block py-2 px-4 hover:bg-gray-400 hover:text-white">Role & Privilege</a>
                    </li>
                    <li>
                        <a href="<?php echo URLROOT; ?>/securities/ldifforsso/<?php echo $_SESSION['HomepageDB']?>" class="transition delay-100 rounded-b-sm block py-2 px-4 hover:bg-gray-400 hover:text-white">Create LDIF Files for SSO</a>
                    </li>
                    <li>
                        <!--The Modal DIV is in the header.php-->
                        <button onclick="delArchiveModalShow()" class="group flex justify-between w-full text-left rounded-b-sm block py-2 px-4 hover:bg-red-400 hover:text-white">
                            Delete Archive
                            <i class="group-hover:text-red-700  fa-solid fa-circle-exclamation text-lg animate-pulse text-white"></i>
                        </button>
                    </li>
                </ul>
            </div>
            <!--SECURITY-->

            <!--OBJECTS-->
            <button id="dropdownDefault" data-dropdown-toggle="dropdown-storage" data-dropdown-placement="bottom-start" class="mx-1 text-white bg-gray-600 hover:bg-gray-400 hover:text-black focus:ring-4 focus:outline-none focus:ring-gray-800 font-medium rounded-lg text-sm px-4 py-2.5 text-center inline-flex items-center 
                    <?php echo strpos($url, 'index') ? 'block focus:bg-gray-400 hover:text-black' : 'hidden'; ?>
                   " type="button">STORAGE & OBJECTS<svg class="ml-2 w-4 h-4" aria-hidden="true" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                </svg></button>
            <!-- Dropdown menu -->
            <div id="dropdown-storage" class="hidden z-10 w-44 bg-white rounded divide-y divide-gray-100 shadow  max-h-48 overflow-y-auto scrollbar-hide">
                <ul class="rounded-md text-sm text-gray-700" aria-labelledby="dropdownDefault">
                    <li>
                        <a href="<?php echo URLROOT; ?>/storages/dbfilelayout/<?php echo $_SESSION['HomepageDB']?>" class="transition delay-100 rounded-t-sm block py-2 px-4 hover:bg-gray-400 hover:text-white">Database File Layout</a>
                    </li>
                    <li>
                        <a href="<?php echo URLROOT; ?>/objects/invalidobjects/<?php echo $_SESSION['HomepageDB']?>" class="transition delay-100 block py-2 px-4 hover:bg-gray-400 hover:text-white">Invalid Objects</a>
                    </li>
                    <li>
                        <a href="<?php echo URLROOT; ?>/storages/tablemonitoring/<?php echo $_SESSION['HomepageDB']?>" class="transition delay-100 block py-2 px-4 hover:bg-gray-400 hover:text-white">Table Monitoring</a>
                    </li>
                    <li>
                        <a href="<?php echo URLROOT; ?>/storages/tableidx/<?php echo $_SESSION['HomepageDB']?>" class="transition delay-100 block rounded-b-sm py-2 px-4 hover:bg-gray-400 hover:text-white">Table Indexes</a>
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
        <button id="dropdownDefault" data-dropdown-toggle="dropdown-tools" class="mx-1 text-white bg-gray-700 hover:bg-gray-400 hover:text-black focus:ring-4 focus:outline-none focus:ring-gray-800 font-medium rounded-lg text-sm px-4 py-2.5 text-center inline-flex items-center 
                    <?php echo strpos($url, 'index') ? 'block focus:bg-gray-400 hover:text-black' : 'hidden'; ?>
                   " type="button"><i class="fas fa-wrench"></i></button>
        <!-- Dropdown menu -->
        <div id="dropdown-tools" class="hidden z-10 w-44 bg-gray-600 rounded divide-y divide-gray-100 shadow">
            <ul class="rounded-md text-sm text-gray-700" aria-labelledby="dropdownDefault">
                <li>
                    <!--MONITOR-->
                    <button id="dropdownDefault" data-dropdown-toggle="dropdown-sm-monitor" data-dropdown-placement="right-start" class="rounded-t-sm mb-1 text-white bg-gray-600 hover:bg-gray-400 hover:text-black focus:ring-4 focus:outline-none focus:ring-gray-800 font-medium rounded-lg text-sm px-4 py-2.5 text-center flex justify-between items-center  w-full
                            <!--THIS BELOW CHANGE URL-->
                            <?php echo strpos($url, 'index') ? 'block focus:bg-gray-400 hover:text-black' : 'hidden'; ?>
                           " type="button">MONITOR<i class="fa-solid fa-chevron-right"></i></button>
                    <!-- Dropdown menu -->
                    <div id="dropdown-sm-monitor" class="hidden absolute z-10 w-44 bg-white rounded divide-y divide-gray-100 shadow  left-0">
                        <ul class="rounded-md text-sm text-gray-700" aria-labelledby="dropdownDefault">
                            <li>
                                <a href="<?php echo URLROOT; ?>/monitors/usersessions/<?php echo $_SESSION['HomepageDB']?>" class="transition delay-100 rounded-t-sm block py-2 px-4 hover:bg-gray-400 hover:text-white">User Sessions</a>
                            </li>
                            <li>
                                <a href="<?php echo URLROOT; ?>/monitors/lockedsessions/<?php echo $_SESSION['HomepageDB']?>" class="transition delay-100 block py-2 px-4 hover:bg-gray-400 hover:text-white">Locked Sessions</a>
                            </li>
                            <li>
                                <a href="<?php echo URLROOT; ?>/monitors/redologswitches/<?php echo $_SESSION['HomepageDB']?>" class="transition delay-100 block py-2 px-4 hover:bg-gray-400 hover:text-white">Redo Log File Switches</a>
                            </li>
                            <li>
                                <a href="<?php echo URLROOT; ?>/monitors/redologgenerations/<?php echo $_SESSION['HomepageDB']?>" class="transition delay-100 block py-2 px-4 hover:bg-gray-400 hover:text-white">Redo Generation Per Day</a>
                            </li>
                            <li>
                                <a href="<?php echo URLROOT; ?>/monitors/topsql/<?php echo $_SESSION['HomepageDB']?>" class="transition delay-100 rounded-b-sm block py-2 px-4 hover:bg-gray-400 hover:text-white">Top SQL Running Processes</a>
                            </li>
                        </ul>
                    </div>
                    <!--MONITOR-->
                </li>
                <li>
                    <!--PERFORMANCE-->
                    <button id="dropdownDefault" data-dropdown-toggle="dropdown-sm-performance" data-dropdown-placement="right-start" class="mb-1 text-white bg-gray-600 hover:bg-gray-400 hover:text-black focus:ring-4 focus:outline-none focus:ring-gray-800 font-medium rounded-lg text-sm px-4 py-2.5 text-center flex justify-between items-center  w-full
                            <?php echo strpos($url, 'index') ? 'block focus:bg-gray-400 hover:text-black' : 'hidden'; ?>
                           " type="button">PERFORMANCE<i class="fa-solid fa-chevron-right"></i></button>
                    <!-- Dropdown menu -->
                    <div id="dropdown-sm-performance" class="hidden z-10 w-44 bg-white rounded divide-y divide-gray-100 shadow">
                        <ul class="rounded-md text-sm text-gray-700" aria-labelledby="dropdownDefault">
                            <li>
                                <a href="<?php echo URLROOT; ?>/performances/pgatargetadvisor/<?php echo $_SESSION['HomepageDB']?>" class="transition delay-100 rounded-t-sm block py-2 px-4 hover:bg-gray-400 hover:text-white">PGA Target Advisor</a>
                            </li>
                            <li>
                                <a href="<?php echo URLROOT; ?>/performances/sgatargetadvisor/<?php echo $_SESSION['HomepageDB']?>" class="transition delay-100 block py-2 px-4 hover:bg-gray-400 hover:text-white">SGA Target Advisor</a>
                            </li>
                            <li>
                                <a href="<?php echo URLROOT; ?>/performances/buffercacheadvisor/<?php echo $_SESSION['HomepageDB']?>" class="transition delay-100 block py-2 px-4 hover:bg-gray-400 hover:text-white">Buffer Cache Advisor</a>
                            </li>
                            <li>
                                <a href="<?php echo URLROOT; ?>/performances/hitratio/<?php echo $_SESSION['HomepageDB']?>" class="transition delay-100 block py-2 px-4 hover:bg-gray-400 hover:text-white">Hit Ratio - Quick Checks</a>
                            </li>
                            <li>
                                <a href="<?php echo URLROOT; ?>/performances/tablestatistics/<?php echo $_SESSION['HomepageDB']?>" class="transition delay-100 rounded-b-sm block py-2 px-4 hover:bg-gray-400 hover:text-white">Table Statistics Status</a>
                            </li>
                            <li>
                                <a href="<?php echo URLROOT; ?>/performances/dynacomp/<?php echo $_SESSION['HomepageDB']?>" class="transition delay-100 rounded-b-sm block py-2 px-4 hover:bg-gray-400 hover:text-white">SGA Dynamic Components</a>
                            </li>
                        </ul>
                    </div>
                    <!--PERFORMANCE-->
                </li>
                <li>
                    <!--SECURITY-->
                    <button id="dropdownDefault" data-dropdown-toggle="dropdown-sm-security" data-dropdown-placement="right-start" class="mb-1 text-white bg-gray-600 hover:bg-gray-400 hover:text-black focus:ring-4 focus:outline-none focus:ring-gray-800 font-medium rounded-lg text-sm px-4 py-2.5 text-center flex justify-between items-center  w-full
                            <?php echo strpos($url, 'index/RMSPRD') ? 'block focus:bg-gray-400 hover:text-black' : 'hidden'; ?>
                           " type="button">SECURITY<i class="fa-solid fa-chevron-right"></i></button>
                    <!-- Dropdown menu -->
                    <div id="dropdown-sm-security" class="hidden z-10 w-44 bg-white rounded divide-y divide-gray-100 shadow">
                        <ul class="rounded-md text-sm text-gray-700" aria-labelledby="dropdownDefault">
                            <li>
                                <a href="<?php echo URLROOT; ?>/securities/roleprivilege/<?php echo $_SESSION['HomepageDB']?>" class="transition delay-100 rounded-t-sm block py-2 px-4 hover:bg-gray-400 hover:text-white">DB Role Priviledge</a>
                            </li>
                            <li>
                                <a href="<?php echo URLROOT; ?>/securities/ldifforsso/<?php echo $_SESSION['HomepageDB']?>" class="transition delay-100 rounded-b-sm block py-2 px-4 hover:bg-gray-400 hover:text-white">Create LDIF Files For SSO</a>
                            </li>
                            <li>
                                <!--The Modal DIV is in the header.php-->
                                <button onclick="delArchiveModalShow()" class="group flex justify-between w-full text-left rounded-b-sm block py-2 px-4 hover:bg-red-400 hover:text-white">
                                    Delete Archive
                                    <i class="group-hover:text-red-700  fa-solid fa-circle-exclamation text-lg animate-pulse text-white"></i>
                                </button>
                            </li>
                        </ul>
                    </div>
                    <!--SECURITY-->
                </li>
                <li>
                    <!--OBJECTS-->
                    <button id="dropdownDefault" data-dropdown-toggle="dropdown-sm-storage" data-dropdown-placement="right-start" class="rounded-b-sm text-white bg-gray-600 hover:bg-gray-400 hover:text-black focus:ring-4 focus:outline-none focus:ring-gray-800 font-medium rounded-lg text-sm px-4 py-2.5 text-center flex justify-between items-center  w-full
                            <?php echo strpos($url, 'index') ? 'block focus:bg-gray-400 hover:text-black' : 'hidden'; ?>
                           " type="button">STORAGE<i class="fa-solid fa-chevron-right"></i></button>
                    <!-- Dropdown menu -->
                    <div id="dropdown-sm-storage" class="hidden z-10 w-44 bg-white rounded divide-y divide-gray-100 shadow">
                        <ul class="rounded-md text-sm text-gray-700" aria-labelledby="dropdownDefault">
                            <li>
                                <a href="<?php echo URLROOT; ?>/storages/dbfilelayout/<?php echo $_SESSION['HomepageDB']?>" class="transition delay-100 rounded-t-sm block py-2 px-4 hover:bg-gray-400 hover:text-white">Database File Layout</a>
                            </li>
                            <li>
                                <a href="<?php echo URLROOT; ?>/objects/invalidobjects/<?php echo $_SESSION['HomepageDB']?>" class="transition delay-100 block py-2 px-4 hover:bg-gray-400 hover:text-white">Invalid Objects</a>
                            </li>
                            <li>
                                <a href="<?php echo URLROOT; ?>/storages/tablemonitoring/<?php echo $_SESSION['HomepageDB']?>" class="transition delay-100 block py-2 px-4 hover:bg-gray-400 hover:text-white">Table Monitoring</a>
                            </li>
                            <li>
                                <a href="<?php echo URLROOT; ?>/storages/tableidx/<?php echo $_SESSION['HomepageDB']?>" class="transition delay-100 rounded-b-sm block py-2 px-4 hover:bg-gray-400 hover:text-white">Table Indexes</a>
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
    <button id="dropdownDefault" data-dropdown-toggle="dropdown-disk" data-dropdown-placement="bottom-start" class="text-white bg-gray-600 hover:bg-gray-400 hover:text-black focus:ring-4 focus:outline-none focus:ring-gray-800 font-medium rounded-lg text-sm px-4 py-2.5 text-center inline-flex items-center 
                    <?php echo strpos($url, 'diskstorage') ? 'block focus:bg-gray-400 focus:text-black' : 'hidden'; ?>
                   " type="button">Database<svg class="ml-2 w-4 h-4" aria-hidden="true" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
        </svg></button>
    <!-- Dropdown menu -->
    <div id="dropdown-disk" class="whitespace-normal hidden z-10 w-fit bg-white rounded divide-y divide-gray-100 shadow">
        <ul class="rounded-md text-sm text-gray-700" aria-labelledby="dropdownDefault">
            <?php 
                foreach(DISK as $k => $v){
                    if($k !='DEFAULT'){
            ?>
            <li>
                <a href="<?php echo URLROOT; ?>/diskstorages/diskstorage/<?php echo $k;?>">
                    <button type="submit" class="rounded-t-sm block w-full py-2 px-4 hover:bg-gray-400 hover:text-white">
                        <?php echo $k;?>
                    </button>
                </a>
            </li>
            <?php
                }
            }
            ?>
        </ul>
    </div>
    <!--Database Disk-->
</div>

<!--TOP NAVBAR-->
<div x-data="{ isOpen: false }" class="relative w-1/2 lg:w-1/3 xl:w-1/4 inline-flex justify-end items-center">
    <?php if (isset($_SESSION['firstname'])) : ?>
        <h4 class="text-white flex justify-end w-fit mr-2 whitespace-nowrap" title="is it you?"><?php echo  '<b>'. greetings($_SESSION['firstname']) .'</b>' ?></h4>
    <?php endif; ?>
    <button @click="isOpen = !isOpen" class="z-10 w-12 h-12 rounded-full overflow-hidden border-2 border-gray-400 hover:border-gray-300 focus:border-gray-300 focus:outline-none">
        <img src="<?php echo URLROOT; ?>/public/img/user.png">
    </button>
    <button x-show="isOpen" @click="isOpen = false" class="h-full w-full fixed inset-0 cursor-default"></button>
    <div x-show="isOpen" class="absolute w-32 justify-center bg-gray-800 top-0 rounded-lg shadow-lg mt-16">
        <div class="absolute top-0 right-2 transform -translate-x-1/2 -translate-y-1/2 rotate-45 w-4 h-4 bg-gray-800"></div>
        <div class="flex flex-col z-10 justify-between">
        <a href="<?php echo URLROOT; ?>/users/profile" class="transition delay-100 block text-gray-300 py-2 text-center z-10 rounded-lg hover:bg-blue-300 hover:text-white">My Profile <i class="fas fa-user-circle"></i></a>
        <a href="<?php echo EMAIL_URL; ?>" target="_blank" class="transition delay-100 block text-gray-300 py-2 text-center z-10 rounded-lg hover:bg-blue-300 hover:text-white">Email <i class="ml-8 fas fa-envelope"></i></a>
        <a href="<?php echo URLROOT; ?>/users/logout" class="transition delay-100 block text-gray-300  py-2 z-10 text-center rounded-lg hover:bg-red-600 hover:text-white">Sign Out <i class="ml-2 fas fa-power-off"></i></a>
        </div>
    </div>
</div>