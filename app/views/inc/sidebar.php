<?php
$url = 'http://' . $_SERVER['SERVER_NAME'] . $_SERVER['REQUEST_URI'];
?>


<aside id="myNav" class="hidden fixed md:relative h-screen w-64 md:block overflow-y-auto scrollbar-hide transition ease-in-out delay-150">
    <div>
        <div class="pt-4 px-6 pb-3 logo">
            <a href="<?php echo URLROOT; ?>/homepage/dashboard" class="text-white text-3xl font-semibold hover:text-gray-300"><?php echo SITENAME ?></a>
        </div>
        <nav class="text-white text-base font-semibold py-2 overflow-y-auto scrollbar-hide h-max">
            <div id="accordion-open" data-accordion="open">
                <ul>
                    <!--DATABASES-->
                    <li class="flex flex-row">
                        <a class="flex items-center py-4 pl-6 text-white w-10/12">
                            <i class="fas fa-warehouse mr-3"></i>
                            Databases
                        </a>
                        <button id="sidenavbtn" onclick="getAria()" type="button" class="flex-auto items-center py-4 hover:bg-gray-300 text-white" aria-expanded="<?php
                                                                                                                                if (preg_match('/dashboard|index|monitor|object|performance|security/', $url)) {
                                                                                                                                    echo 'true';
                                                                                                                                } else {
                                                                                                                                    echo ' false';
                                                                                                                                } ?>" aria-controls="databases" data-accordion-target="#databases" data-collapse-toggle="databases">
                            <!--Code above is needed for collapse open while select-->
                            <!--Change here for control variables-->
                            <i id="chevron" class="fas fa-regular fa-chevron-down"></i>                                                                                         
                        </button>
                    </li>
                    <ul id="databases" class="hidden py-1  ">
                        <li>
                            <a href="<?php echo URLROOT; ?>/homepage/dashboard" class="flex items-center hover:opacity-100 py-4 pl-12 nav-item text-white <?php if (preg_match('/dashboard|index/', $url)) {
                                                                                                                                                                echo 'active-nav-link ';
                                                                                                                                                            } else {
                                                                                                                                                                echo 'opacity-75';
                                                                                                                                                            } ?>">
                                <i class="fas fa-database mr-3"></i>
                                ORACLE
                            </a>
                        <li>
                            <a href="#" class="flex items-center hover:opacity-100 py-4 pl-12 nav-item text-white <?php if (strpos($url, 'mssql')) {
                                                                                                                                                                echo 'active-nav-link ';
                                                                                                                                                            } else {
                                                                                                                                                                echo 'opacity-75';
                                                                                                                                                            } ?>">
                                <i class="fas fa-database mr-3"></i>
                                SSMS
                            </a>
                        </li>
                        <li>
                            <a href="#" class="flex items-center hover:opacity-100 py-4 pl-12 nav-item text-white <?php if (strpos($url, 'mariadb')) {
                                                                                                                                                                echo 'active-nav-link ';
                                                                                                                                                            } else {
                                                                                                                                                                echo 'opacity-75';
                                                                                                                                                            } ?>">
                                <i class="fas fa-database mr-3"></i>
                                MARIA DB
                            </a>
                        </li>
                        <li>
                            <a href="#" class="flex items-center hover:opacity-100 py-4 pl-12 nav-item text-white <?php if (strpos($url, 'mariadb')) {
                                                                                                                                                                echo 'active-nav-link ';
                                                                                                                                                            } else {
                                                                                                                                                                echo 'opacity-75';
                                                                                                                                                            } ?>">
                                <i class="fas fa-database mr-3"></i>
                                MYSQL
                            </a>
                        </li>
                    </ul>
                    <!--DASHBOARD-->

                    <li>
                        <a href="<?php echo URLROOT; ?>/diskstorages/diskstorage/default" class="flex items-center py-4 pl-6 nav-item text-white <?php if (strpos($url, 'diskstorage')) {
                                                                                                                                                        echo 'active-nav-link';
                                                                                                                                                    } else {
                                                                                                                                                        echo ' opacity-75';
                                                                                                                                                    } ?>">
                            <i class="fas fa-compact-disc mr-3"></i>
                            Disk Storage
                        </a>
                    </li>
                    <li>
                        <a href="<?php echo URLROOT; ?>/flashrecoveryareas/charts" class="flex items-center py-4 pl-6 nav-item text-white <?php if (strpos($url, 'flashrecovery')) {
                                                                                                                                                echo 'active-nav-link';
                                                                                                                                            } else {
                                                                                                                                                echo ' opacity-75';
                                                                                                                                            } ?>">
                            <i class="fas fa-compact-disc mr-3"></i>
                            Flash Recovery
                        </a>
                    </li>

                    <li>
                        <a href="<?php echo URLROOT; ?>/users/show/default" class="flex items-center hover:opacity-100 py-4 pl-6 nav-item text-white <?php if (strpos($url, 'show')) {
                                                                                                                                                            echo 'active-nav-link ';
                                                                                                                                                        } else {
                                                                                                                                                            echo 'opacity-75';
                                                                                                                                                        } ?>">
                            <i class="fas fa-user-cog mr-3"></i>
                            Manage Users
                        </a>
                    </li>

                    <li>
                        <a href="<?php echo URLROOT; ?>/telephones/contacts" class="flex items-center hover:opacity-100 py-4 pl-6 nav-item text-white <?php if (strpos($url, 'telephones')) {
                                                                                                                                                            echo 'active-nav-link ';
                                                                                                                                                        } else {
                                                                                                                                                            echo 'opacity-75';
                                                                                                                                                        } ?>">
                            <i class="fas fa-phone mr-3"></i>
                            Telephone Directories
                        </a>
                    </li>

                </ul>
            </div>
        </nav>
    </div>

    <!--Time & Date-->
    <?php

        include_once 'sidebar_misc.php';

    ?>



</aside>
<div class="w-full flex flex-col h-screen overflow-y-hidden scrollbar-hide">
    
    <!-- Desktop Header -->
    <header class="w-full items-center justify-between bg-gray-600 py-2 px-6 flex">

        <!--TOP NAVBAR-->
        <?php

            include_once 'topbar.php';

        ?>


    </header>
    
    <main class="content w-full flex-grow p-6 bg-gray-600 overflow-y-auto scrollbar-hide">
