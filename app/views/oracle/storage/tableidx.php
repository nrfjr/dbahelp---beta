<?php
$title = 'Table Indexes';
require APPROOT . '/views/inc/header.php';
require APPROOT . '/views/inc/sidebar.php'; ?>

<div class="flex justify-between mb-5">
    <h1 class="text-3xl text-black text-white">
        <a href="<?php echo URLROOT; ?>/homepages/index/<?php echo $_SESSION['StorageDB']; ?>" class="no-underline hover:underline">Storage</a> > <b>Table Indexes</b>
    </h1>
    <div class="inline-flex gap-4">
            <div class="flex gap-2">
                <b for="tables" class="flex flex-row inline-flex whitespace-nowrap w-full items-center text-sm font-medium text-gray-100">Select Table: </b>
                <!--OBJECTS-->
                <button id="dropdownDefault" data-dropdown-toggle="dropdown-tablesidx" class="text-center hover:bg-gray-400 hover:text-black focus:ring-4 focus:outline-none focus:ring-gray-800 font-medium rounded-lg text-sm px-4 py-2 flex justify-between items-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800 w-full bg-gray-200" type="button">TABLES <i class="fas fa-chevron-down"></i></button>
            </div>

            <!-- Dropdown menu -->
            <div id="dropdown-tablesidx" class="flex justify-center hidden z-10 w-auto bg-white rounded divide-y divide-gray-100 shadow dark:bg-gray-700">
                <form action="<?php echo URLROOT; ?>/storages/tablemonitoring/<?php echo $_SESSION['StorageDB'] ?>" method="POST">
                    <ul class="py-1 text-sm text-gray-700 dark:text-gray-200 flex flex-col items-center" aria-labelledby="dropdownDefault">
                        <li>
                            <button type="submit" id="table" name="table" value="all_tables" class="block py-2 px-4 hover:bg-gray-100 dark:hover:bg-gray-600 w-full dark:hover:text-white">All Tables</button>
                        </li>
                        <li>
                            <button type="submit" id="table" name="table" value="dba_tables" class="block py-2 px-4 hover:bg-gray-100 dark:hover:bg-gray-600 w-full dark:hover:text-white">DBA Tables</button>
                        </li>
                    </ul>
                </form>
            </div>
            <!--OBJECTS-->
            <button onclick="window.location.reload()" class="px-4 py-2 rounded-lg bg-gray-200 hover:bg-gray-500"> Refresh<i class="ml-2 fas fa-redo"></i></button>
        </div>
</div>

<div class="overflow-x-auto relative shadow-md">
    <div style="height: 70vh; overflow: auto;" class="">
        <div class="block  justify-center w-full shadow-md overflow-auto sm:rounded-lg" style="max-height: 100%;">
            <table></table>
        </div>
    </div>

</div>

<?php require APPROOT . '/views/inc/footer.php'; ?>