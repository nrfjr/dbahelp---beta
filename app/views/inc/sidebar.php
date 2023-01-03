<?php
$url = 'http://' . $_SERVER['SERVER_NAME'] . $_SERVER['REQUEST_URI'];
?>


<aside id="myNav" class="hidden fixed md:relative h-screen w-64 md:block overflow-y-auto scrollbar-hide transition ease-in-out delay-150">
    <div>
        <div class="pt-4 px-2 pb-3 logo" title="Sitename">
            <a href="<?php echo URLROOT; ?>/homepage/dashboard" class="text-white text-3xl font-semibold rounded-md flex justify-center"><?php echo SITENAME ?><i class="ml-2 mt-1.5 fa-solid fa-handshake-angle"></i></a>
        </div>
        <nav class="text-white text-sm font-semibold py-2 overflow-y-auto scrollbar-hide h-max">
            <div id="accordion-open" data-accordion="open">
                <ul>
                    <!--DATABASES-->
                    <li class="flex flex-row">
                        <button id="sidenavbtn" onclick="getAria()" type="button" class="flex-auto py-4 rounded-md mx-2 mb-1 text-white nav-item" aria-expanded="<?php
                                                                                                                                if (preg_match('/dashboard|index|monitor|object|performance|security/', $url)) {
                                                                                                                                    echo 'true';
                                                                                                                                } else {
                                                                                                                                    echo 'false';
                                                                                                                                } ?>" aria-controls="databases" data-accordion-target="#databases" data-collapse-toggle="databases">
                            <!--Code above is needed for collapse open while select-->
                            <!--Change here for control variables-->
                            <div class="flex justify-between mx-6"><span><i class="fas fa-database mr-3"></i><b>Databases</b></span> <i id="chevron" class="mt-1 fa-solid fa-chevron-down"></i></div>                                                                                         
                        </button>
                    </li>
                    <ul id="databases" class="hidden py-1">
                        <li>
                            <a href="<?php echo URLROOT; ?>/homepage/dashboard" class="flex rounded-md mx-2 mb-1 items-center hover:opacity-100 py-4 pl-12 nav-item text-white <?php if (preg_match('/dashboard|index/', $url)) {
                                                                                                                                                                echo 'active-nav-link ';
                                                                                                                                                            } else {
                                                                                                                                                                echo 'opacity-75';
                                                                                                                                                            } ?>">
                                <i class="fas fa-database mr-3"></i>
                                ORACLE
                            </a>
                        <li>
                            <a href="#" class="flex items-center rounded-md mx-2 mb-1 hover:opacity-100 py-4 pl-12 nav-item text-white <?php if (strpos($url, 'mssql')) {
                                                                                                                                                                echo 'active-nav-link ';
                                                                                                                                                            } else {
                                                                                                                                                                echo 'opacity-75';
                                                                                                                                                            } ?>">
                                <i class="fas fa-database mr-3"></i>
                                SSMS
                            </a>
                        </li>
                        <li>
                            <a href="#" class="flex items-center rounded-md mx-2 mb-1 hover:opacity-100 py-4 pl-12 nav-item text-white <?php if (strpos($url, 'mariadb')) {
                                                                                                                                                                echo 'active-nav-link ';
                                                                                                                                                            } else {
                                                                                                                                                                echo 'opacity-75';
                                                                                                                                                            } ?>">
                                <i class="fas fa-database mr-3"></i>
                                MARIA DB
                            </a>
                        </li>
                        <li>
                            <a href="#" class="flex items-center rounded-md mx-2 mb-1 hover:opacity-100 py-4 pl-12 nav-item text-white <?php if (strpos($url, 'mariadb')) {
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
                        <a href="<?php echo URLROOT; ?>/diskstorages/show" class="flex items-center hover:opacity-100 rounded-md mx-2 mb-1 py-4 pl-6 nav-item text-white <?php if (strpos($url, 'diskstorage')) {
                                                                                                                                                        echo 'active-nav-link';
                                                                                                                                                    } else {
                                                                                                                                                        echo ' opacity-75';
                                                                                                                                                    } ?>">
                            <i class="fas fa-compact-disc mr-3"></i>
                            Disk Storage
                        </a>
                    </li>
                    <li>
                        <a href="<?php echo URLROOT; ?>/flashrecoveryareas/charts" class="flex items-center rounded-md mx-2 mb-1 hover:opacity-100 py-4 pl-6 nav-item text-white <?php if (strpos($url, 'flashrecovery')) {
                                                                                                                                                echo 'active-nav-link';
                                                                                                                                            } else {
                                                                                                                                                echo ' opacity-75';
                                                                                                                                            } ?>">
                            <i class="fas fa-compact-disc mr-3"></i>
                            Flash Recovery
                        </a>
                    </li>

                    <li>
                        <a href="<?php echo URLROOT; ?>/users/show" class="flex items-center rounded-md mx-2 mb-1 hover:opacity-100 py-4 pl-6 nav-item text-white <?php if (strpos($url, 'show')) {
                                                                                                                                                            echo 'active-nav-link ';
                                                                                                                                                        } else {
                                                                                                                                                            echo 'opacity-75';
                                                                                                                                                        } ?>">
                            <i class="fas fa-users-cog mr-3"></i>
                            Manage Users
                        </a>
                    </li>

                    <li>
                        <a href="<?php echo URLROOT; ?>/telephones/contacts" class="flex items-center rounded-md mx-2 mb-1 hover:opacity-100 py-4 pl-6 nav-item text-white <?php if (strpos($url, 'telephones')) {
                                                                                                                                                            echo 'active-nav-link ';
                                                                                                                                                        } else {
                                                                                                                                                            echo 'opacity-75';
                                                                                                                                                        } ?>">
                            <i class="fa-solid fa-address-book mr-3"></i>
                            Telephonebook
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