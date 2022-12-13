<div class="w-full">
    <button class="justify-center md:hidden mx-2 p-4 hover:bg-gray-400 rounded-full" onclick="navToggle()">
        <i class="fas fa-regular fa-bars"></i>
    </button>
    <!--Oracle Databases-->
    <button id="dropdownDefault" data-dropdown-toggle="dropdown-oracle" class="text-white bg-gray-600 hover:bg-gray-400 hover:text-black focus:ring-4 focus:outline-none focus:ring-gray-800 font-medium rounded-lg text-sm px-4 py-2.5 text-center inline-flex items-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800
                            <!--THIS BELOW CHANGE URL-->
                            <?php echo preg_match('/dashboard|index/', $url) ? 'block focus:bg-gray-400 focus:text-black' : 'hidden'; ?>
                            " type="button">Databases<svg class="ml-2 w-4 h-4" aria-hidden="true" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
        </svg></button>
    <!-- Dropdown menu -->
    <div id="dropdown-oracle" class="hidden absolute z-10 w-44 bg-white rounded divide-y divide-gray-100 shadow dark:bg-gray-700">
        <ul class="py-1 text-sm text-gray-700 dark:text-gray-200" aria-labelledby="dropdownDefault">
            <li>
                <form action="<?php echo URLROOT; ?>/homepages/index/RMSPRD" method="POST"><button type="submit" class="block w-full py-2 px-4 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">RMS</button></form>
            </li>
            <li>
                <form action="<?php echo URLROOT; ?>/homepages/index/RDWPRD" method="POST"><button type="submit" class="block py-2 w-full px-4 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">RDW</button></form>
            </li>
            <li>
                <form action="<?php echo URLROOT; ?>/homepages/index/OFINDB" method="POST"><button type="submit" class="block py-2 w-full px-4 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">OFIN</button></form>
            </li>
        </ul>
    </div>
    <!--Oracle Databases-->
    <div class="hidden xl:inline-flex">
        <div class="lg:ml-6 lg:px-6 lg:py-2 lg:border-l-2 lg:border-gray-900 inline-flex <?php echo strpos($url, 'index') ? 'block' : 'hidden'; ?>">
            <!-- Oracle Tools -->
            <!--MONITOR-->
            <button id="dropdownDefault" data-dropdown-toggle="dropdown-monitor" class="mx-1 text-white bg-gray-600 hover:bg-gray-400 hover:text-black focus:ring-4 focus:outline-none focus:ring-gray-800 font-extralight lg:font-medium rounded-lg text-sm px-2 lg:px-4 py-0 lg:py-2.5 text-center inline-flex items-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800
                    <!--THIS BELOW CHANGE URL-->
                    <?php echo strpos($url, 'index') ? 'block focus:bg-gray-400 hover:text-black' : 'hidden'; ?>
                    " type="button">MONITOR<svg class="ml-2 w-4 h-4" aria-hidden="true" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                </svg></button>
            <!-- Dropdown menu -->
            <div id="dropdown-monitor" class="hidden absolute z-10 w-44 bg-white rounded divide-y divide-gray-100 shadow dark:bg-gray-700">
                <ul class="py-1 text-sm text-gray-700 dark:text-gray-200" aria-labelledby="dropdownDefault">
                    <li>
                        <a href="<?php echo URLROOT; ?>/monitors/usersessions/<?php echo $_SESSION['HomepageDB'] ?>" class="block py-2 px-4 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">User Sessions</a>
                    </li>
                    <li>
                        <a href="<?php echo URLROOT; ?>/monitors/lockedsessions/<?php echo $_SESSION['HomepageDB'] ?>" class="block py-2 px-4 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Locked Sessions</a>
                    </li>
                    <li>
                        <a href="<?php echo URLROOT; ?>/monitors/redologswitches/<?php echo $_SESSION['HomepageDB'] ?>" class="block py-2 px-4 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Redo Log File Switches</a>
                    </li>
                    <li>
                        <a href="<?php echo URLROOT; ?>/monitors/redologgenerations/<?php echo $_SESSION['HomepageDB'] ?>" class="block py-2 px-4 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Redo Generation Per Day</a>
                    </li>
                    <li>
                        <a href="<?php echo URLROOT; ?>/monitors/topsql/<?php echo $_SESSION['HomepageDB'] ?>" class="block py-2 px-4 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Top SQL Running Processes</a>
                    </li>
                </ul>
            </div>
            <!--MONITOR-->

            <!--PERFORMANCE-->
            <button id="dropdownDefault" data-dropdown-toggle="dropdown-performance" class="mx-1 text-white bg-gray-600 hover:bg-gray-400 hover:text-black focus:ring-4 focus:outline-none focus:ring-gray-800 font-medium rounded-lg text-sm px-4 py-2.5 text-center inline-flex items-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800
                    <?php echo strpos($url, 'index') ? 'block focus:bg-gray-400 hover:text-black' : 'hidden'; ?>
                    " type="button">PERFORMANCE<svg class="ml-2 w-4 h-4" aria-hidden="true" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                </svg></button>
            <!-- Dropdown menu -->
            <div id="dropdown-performance" class="hidden z-10 w-44 bg-white rounded divide-y divide-gray-100 shadow dark:bg-gray-700">
                <ul class="py-1 text-sm text-gray-700 dark:text-gray-200" aria-labelledby="dropdownDefault">
                    <li>
                        <a href="<?php echo URLROOT; ?>/performances/pgatargetadvisor/<?php echo $_SESSION['HomepageDB'] ?>" class="block py-2 px-4 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">PGA Target Advisor</a>
                    </li>
                    <li>
                        <a href="<?php echo URLROOT; ?>/performances/sgatargetadvisor/<?php echo $_SESSION['HomepageDB'] ?>" class="block py-2 px-4 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">SGA Target Advisor</a>
                    </li>
                    <li>
                        <a href="<?php echo URLROOT; ?>/performances/buffercacheadvisor/<?php echo $_SESSION['HomepageDB'] ?>" class="block py-2 px-4 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Buffer Cache Advisor</a>
                    </li>
                    <li>
                        <a href="<?php echo URLROOT; ?>/performances/hitratio/<?php echo $_SESSION['HomepageDB'] ?>" class="block py-2 px-4 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Hit Ratio - Quick Checks</a>
                    </li>
                    <li>
                        <a href="<?php echo URLROOT; ?>/performances/tablestatistics/<?php echo $_SESSION['HomepageDB'] ?>" class="block py-2 px-4 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Table Statistics Status</a>
                    </li>
                </ul>
            </div>
            <!--PERFORMANCE-->

            <!--SECURITY-->
            <button id="dropdownDefault" data-dropdown-toggle="dropdown-security" class="mx-1 text-white bg-gray-600 hover:bg-gray-400 hover:text-black focus:ring-4 focus:outline-none focus:ring-gray-800 font-medium rounded-lg text-sm px-4 py-2.5 text-center inline-flex items-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800
                    <?php echo strpos($url, 'index/RMSPRD') ? 'block focus:bg-gray-400 hover:text-black' : 'hidden'; ?>
                    " type="button">SECURITY<svg class="ml-2 w-4 h-4" aria-hidden="true" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                </svg></button>
            <!-- Dropdown menu -->
            <div id="dropdown-security" class="hidden z-10 w-44 bg-white rounded divide-y divide-gray-100 shadow dark:bg-gray-700">
                <ul class="py-1 text-sm text-gray-700 dark:text-gray-200" aria-labelledby="dropdownDefault">
                    <li>
                        <a href="<?php echo URLROOT; ?>/securities/roleprivilege/<?php echo $_SESSION['HomepageDB'] ?>" class="block py-2 px-4 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Role & Privilege</a>
                    </li>
                    <li>
                        <a href="<?php echo URLROOT; ?>/securities/ldifforsso/<?php echo $_SESSION['HomepageDB'] ?>" class="block py-2 px-4 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Create LDIF Files for SSO</a>
                    </li>
                </ul>
            </div>
            <!--SECURITY-->

            <!--OBJECTS-->
            <button id="dropdownDefault" data-dropdown-toggle="dropdown-storage" class="mx-1 text-white bg-gray-600 hover:bg-gray-400 hover:text-black focus:ring-4 focus:outline-none focus:ring-gray-800 font-medium rounded-lg text-sm px-4 py-2.5 text-center inline-flex items-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800
                    <?php echo strpos($url, 'index') ? 'block focus:bg-gray-400 hover:text-black' : 'hidden'; ?>
                    " type="button">STORAGE & OBJECTS<svg class="ml-2 w-4 h-4" aria-hidden="true" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                </svg></button>
            <!-- Dropdown menu -->
            <div id="dropdown-storage" class="hidden z-10 w-44 bg-white rounded divide-y divide-gray-100 shadow dark:bg-gray-700">
                <ul class="py-1 text-sm text-gray-700 dark:text-gray-200" aria-labelledby="dropdownDefault">
                    <li>
                        <a href="<?php echo URLROOT; ?>/storages/dbfilelayout/<?php echo $_SESSION['HomepageDB'] ?>" class="block py-2 px-4 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Database File Layout</a>
                    </li>
                    <li>
                        <a href="<?php echo URLROOT; ?>/objects/invalidobjects/<?php echo $_SESSION['HomepageDB'] ?>" class="block py-2 px-4 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Invalid Objects</a>
                    </li>
                    <li>
                        <a href="<?php echo URLROOT; ?>/storages/tablemonitoring/<?php echo $_SESSION['HomepageDB'] ?>" class="block py-2 px-4 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Table Monitoring</a>
                    </li>
                    <li>
                        <a href="<?php echo URLROOT; ?>/storages/tableidx/<?php echo $_SESSION['HomepageDB'] ?>" class="block py-2 px-4 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Table Indexes</a>
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
                    <?php echo strpos($url, 'index') ? 'block focus:bg-gray-400 hover:text-black' : 'hidden'; ?>
                    " type="button"><i class="fas fa-wrench"></i></button>
        <!-- Dropdown menu -->
        <div id="dropdown-tools" class="hidden z-10 w-44 bg-gray-600 rounded divide-y divide-gray-100 shadow dark:bg-gray-700 ">
            <ul class="py-1 text-sm text-gray-700 dark:text-gray-200" aria-labelledby="dropdownDefault">
                <li>
                    <!--MONITOR-->
                    <button id="dropdownDefault" data-dropdown-toggle="dropdown-sm-monitor" data-dropdown-placement="right-start" class="mb-1 text-white bg-gray-600 hover:bg-gray-400 hover:text-black focus:ring-4 focus:outline-none focus:ring-gray-800 font-medium rounded-lg text-sm px-4 py-2.5 text-center flex justify-between items-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800 w-full
                            <!--THIS BELOW CHANGE URL-->
                            <?php echo strpos($url, 'index') ? 'block focus:bg-gray-400 hover:text-black' : 'hidden'; ?>
                            " type="button">MONITOR<i class="fas fa-regular fa-chevron-right"></i></button>
                    <!-- Dropdown menu -->
                    <div id="dropdown-sm-monitor" class="hidden absolute z-10 w-44 bg-white rounded divide-y divide-gray-100 shadow dark:bg-gray-700 left-0">
                        <ul class="py-1 text-sm text-gray-700 dark:text-gray-200" aria-labelledby="dropdownDefault">
                            <li>
                                <a href="<?php echo URLROOT; ?>/monitors/usersessions/<?php echo $_SESSION['HomepageDB'] ?>" class="block py-2 px-4 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">User Sessions</a>
                            </li>
                            <li>
                                <a href="<?php echo URLROOT; ?>/monitors/lockedsessions/<?php echo $_SESSION['HomepageDB'] ?>" class="block py-2 px-4 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Locked Sessions</a>
                            </li>
                            <li>
                                <a href="<?php echo URLROOT; ?>/monitors/redologswitches/<?php echo $_SESSION['HomepageDB'] ?>" class="block py-2 px-4 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Redo Log File Switches</a>
                            </li>
                            <li>
                                <a href="<?php echo URLROOT; ?>/monitors/redologgenerations/<?php echo $_SESSION['HomepageDB'] ?>" class="block py-2 px-4 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Redo Generation Per Day</a>
                            </li>
                            <li>
                                <a href="<?php echo URLROOT; ?>/monitors/topsql/<?php echo $_SESSION['HomepageDB'] ?>" class="block py-2 px-4 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Top SQL Running Processes</a>
                            </li>
                        </ul>
                    </div>
                    <!--MONITOR-->
                </li>
                <li>
                    <!--PERFORMANCE-->
                    <button id="dropdownDefault" data-dropdown-toggle="dropdown-sm-performance" data-dropdown-placement="right-start" class="mb-1 text-white bg-gray-600 hover:bg-gray-400 hover:text-black focus:ring-4 focus:outline-none focus:ring-gray-800 font-medium rounded-lg text-sm px-4 py-2.5 text-center flex justify-between items-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800 w-full
                            <?php echo strpos($url, 'index') ? 'block focus:bg-gray-400 hover:text-black' : 'hidden'; ?>
                            " type="button">PERFORMANCE<i class="fas fa-regular fa-chevron-right"></i></button>
                    <!-- Dropdown menu -->
                    <div id="dropdown-sm-performance" class="hidden z-10 w-44 bg-white rounded divide-y divide-gray-100 shadow dark:bg-gray-700">
                        <ul class="py-1 text-sm text-gray-700 dark:text-gray-200" aria-labelledby="dropdownDefault">
                            <li>
                                <a href="<?php echo URLROOT; ?>/performances/pgatargetadvisor/<?php echo $_SESSION['HomepageDB'] ?>" class="block py-2 px-4 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">PGA Target Advisor</a>
                            </li>
                            <li>
                                <a href="<?php echo URLROOT; ?>/performances/sgatargetadvisor/<?php echo $_SESSION['HomepageDB'] ?>" class="block py-2 px-4 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">SGA Target Advisor</a>
                            </li>
                            <li>
                                <a href="<?php echo URLROOT; ?>/performances/buffercacheadvisor/<?php echo $_SESSION['HomepageDB'] ?>" class="block py-2 px-4 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Buffer Cache Advisor</a>
                            </li>
                            <li>
                                <a href="<?php echo URLROOT; ?>/performances/hitratio/<?php echo $_SESSION['HomepageDB'] ?>" class="block py-2 px-4 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Hit Ratio - Quick Checks</a>
                            </li>
                            <li>
                                <a href="<?php echo URLROOT; ?>/performances/tablestatistics/<?php echo $_SESSION['HomepageDB'] ?>" class="block py-2 px-4 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Table Statistics Status</a>
                            </li>
                        </ul>
                    </div>
                    <!--PERFORMANCE-->
                </li>
                <li>
                    <!--SECURITY-->
                    <button id="dropdownDefault" data-dropdown-toggle="dropdown-sm-security" data-dropdown-placement="right-start" class="mb-1 text-white bg-gray-600 hover:bg-gray-400 hover:text-black focus:ring-4 focus:outline-none focus:ring-gray-800 font-medium rounded-lg text-sm px-4 py-2.5 text-center flex justify-between items-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800 w-full
                            <?php echo strpos($url, 'index/RMSPRD') ? 'block focus:bg-gray-400 hover:text-black' : 'hidden'; ?>
                            " type="button">SECURITY<i class="fas fa-regular fa-chevron-right"></i></button>
                    <!-- Dropdown menu -->
                    <div id="dropdown-sm-security" class="hidden z-10 w-44 bg-white rounded divide-y divide-gray-100 shadow dark:bg-gray-700">
                        <ul class="py-1 text-sm text-gray-700 dark:text-gray-200" aria-labelledby="dropdownDefault">
                            <li>
                                <a href="<?php echo URLROOT; ?>/securities/roleprivilege/<?php echo $_SESSION['HomepageDB'] ?>" class="block py-2 px-4 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">DB Role Priviledge</a>
                            </li>
                            <li>
                                <a href="<?php echo URLROOT; ?>/securities/ldifforsso/<?php echo $_SESSION['HomepageDB'] ?>" class="block py-2 px-4 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Create LDIF Files For SSO</a>
                            </li>
                        </ul>
                    </div>
                    <!--SECURITY-->
                </li>
                <li>
                    <!--OBJECTS-->
                    <button id="dropdownDefault" data-dropdown-toggle="dropdown-sm-storage" data-dropdown-placement="right-start" class="text-white bg-gray-600 hover:bg-gray-400 hover:text-black focus:ring-4 focus:outline-none focus:ring-gray-800 font-medium rounded-lg text-sm px-4 py-2.5 text-center flex justify-between items-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800 w-full
                            <?php echo strpos($url, 'index') ? 'block focus:bg-gray-400 hover:text-black' : 'hidden'; ?>
                            " type="button">STORAGE<i class="fas fa-regular fa-chevron-right"></i></button>
                    <!-- Dropdown menu -->
                    <div id="dropdown-sm-storage" class="hidden z-10 w-44 bg-white rounded divide-y divide-gray-100 shadow dark:bg-gray-700">
                        <ul class="py-1 text-sm text-gray-700 dark:text-gray-200" aria-labelledby="dropdownDefault">
                            <li>
                                <a href="<?php echo URLROOT; ?>/storages/dbfilelayout/<?php echo $_SESSION['HomepageDB'] ?>" class="block py-2 px-4 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Database File Layout</a>
                            </li>
                            <li>
                                <a href="<?php echo URLROOT; ?>/objects/invalidobjects/<?php echo $_SESSION['HomepageDB'] ?>" class="block py-2 px-4 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Invalid Objects</a>
                            </li>
                            <li>
                                <a href="<?php echo URLROOT; ?>/storages/tablemonitoring/<?php echo $_SESSION['HomepageDB'] ?>" class="block py-2 px-4 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Table Monitoring</a>
                            </li>
                            <li>
                                <a href="<?php echo URLROOT; ?>/storages/tableidx/<?php echo $_SESSION['HomepageDB'] ?>" class="block py-2 px-4 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Table Indexes</a>
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
                    <?php echo strpos($url, 'diskstorage') ? 'block focus:bg-gray-400 focus:text-black' : 'hidden'; ?>
                    " type="button">Database<svg class="ml-2 w-4 h-4" aria-hidden="true" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
        </svg></button>
    <!-- Dropdown menu -->
    <div id="dropdown-disk" class="whitespace-normal hidden z-10 w-fit bg-white rounded divide-y divide-gray-100 shadow dark:bg-gray-700">
        <ul class="py-1 text-sm text-gray-700 dark:text-gray-200" aria-labelledby="dropdownDefault">
            <li>
                <a href="<?php echo URLROOT; ?>/diskstorages/diskstorage/RMSPRD">
                    <button type="submit" class="block py-2 px-4 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">
                        192.168.32.184 - RMSPRD
                    </button>
                </a>
            </li>
            <li>
                <a href="<?php echo URLROOT; ?>/diskstorages/diskstorage/RDWPRD">
                    <button type="submit" class="block py-2 px-4 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">
                        192.168.32.198 - RDWPRD
                    </button>
                </a>
            </li>
            <li>
                <a href="<?php echo URLROOT; ?>/diskstorages/diskstorage/RMSOID">
                    <button type="submit" class="block py-2 px-4 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">
                        192.168.32.162 - RMS/OID
                    </button>
                </a>
            </li>
            <li>
                <a href="<?php echo URLROOT; ?>/diskstorages/diskstorage/SIMREIM">
                    <button type="submit" class="block py-2 px-4 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">
                        192.168.32.164 - SIM/REIM
                    </button>
                </a>
            </li>
            <li>
                <a href="<?php echo URLROOT; ?>/diskstorages/diskstorage/RPM">
                    <button type="submit" class="block py-2 px-4 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">
                        192.168.32.165 - RPM
                    </button>
                </a>
            </li>
        </ul>
    </div>
    <!--Database Disk-->
</div>

<!--TOP NAVBAR-->
<div x-data="{ isOpen: false }" class="relative w-1/4 sm:w-1/4 md:w-1/4 inline-flex justify-end">
    <?php if (isset($_SESSION['firstname'])) : ?>
        <h4 class="text-white flex justify-end w-fit mr-2 " title="is it you?"><?php echo  '<b>'. greetings($_SESSION['firstname']) .'</b>' ?></h4>
    <?php endif; ?>
    <button @click="isOpen = !isOpen" class="realtive z-10 w-12 h-12 rounded-full overflow-hidden border-4 border-gray-400 hover:border-gray-300 focus:border-gray-300 focus:outline-none">
        <img src="<?php echo URLROOT; ?>/public/img/user.png">
    </button>
    <button x-show="isOpen" @click="isOpen = false" class="h-full w-full fixed inset-0 cursor-default"></button>
    <div x-show="isOpen" class="absolute w-32 justify-center bg-gray-800 rounded-lg shadow-lg px-4 py-2 mt-16">
        <div class="absolute top-0 right-2 transform -translate-x-1/2 -translate-y-1/2 rotate-45 w-4 h-4 bg-gray-800"></div>
        <div class="flex flex-col justify-between">
        <a href="https://192.168.33.156/" target="_blank" class="block text-gray-300  text-center  py-2 mt-2 rounded-sm hover:bg-blue-300 hover:text-white">Email <i class="ml-6 fas fa-envelope"></i></a>
        <a href="<?php echo URLROOT; ?>/users/logout" class="block text-gray-300  text-center  py-2 my-2 rounded-sm hover:bg-red-600 hover:text-white">Sign Out <i class="fas fa-power-off"></i></a>
        </div>
    </div>
</div>