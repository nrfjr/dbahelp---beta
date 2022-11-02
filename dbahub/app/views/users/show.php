<?php
$title = 'Manage Users';
require APPROOT . '/views/inc/header.php';
?>
<?php require APPROOT . '/views/inc/sidebar.php'; ?>

<h1 class="text-3xl text-black pb-6 text-white"><b>Manage Users</b></h1>


<div class="overflow-x-auto relative shadow-md sm:rounded-lg">
    <div class="flex justify-between items-center pb-4 bg-gray-800 dark:bg-gray-900">
        <div>
            <a href="<?php echo URLROOT; ?>/users/create">
                <button id="dropdownRadioButton" class="inline-flex items-center text-black bg-green-300 focus:outline-none hover:bg-green-700 focus:ring-4 focus:ring-gray-200 font-medium rounded-lg text-sm px-3 py-1.5 dark:bg-gray-800 dark:text-white dark:border-gray-600 dark:hover:bg-gray-700 dark:hover:border-gray-600 dark:focus:ring-gray-700 hover:text-white" type="button">
                    Add User
                </button>
            </a>
        </div>
        <label for="table-search" class="sr-only">Search</label>
        <div class="relative absolute">
            <div class="flex absolute inset-y-0 left-0 items-center pl-3">
                <svg class="w-5 h-5 text-gray-500 dark:text-gray-400" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd" d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z" clip-rule="evenodd"></path>
                </svg>
            </div>
            <div class="flex justify-auto">
                <input type="text" id="table-search-users" class="block mr-4 p-2 pl-10 w-80 text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Search for users">
                <button id="dropdownRadioButton" class="inline-flex items-center text-black bg-blue-200 focus:outline-none hover:bg-blue-700 hover:text-white focus:ring-4 focus:ring-gray-200 font-medium rounded-lg text-sm px-3 py-1.5 dark:bg-gray-800 dark:text-white dark:border-gray-600 dark:hover:bg-gray-700 dark:hover:border-gray-600 dark:focus:ring-gray-700" type="button">
                    Search
                </button>
            </div>
        </div>
    </div>
    <div class="overflow-x-auto shadow-md sm:rounded-lg" >
        <?php
        if (!empty($data)) {
        ?>
            <table class="w-full text-sm text-left text-white dark:text-gray-400">
                <thead class="text-xs text-black uppercase bg-indigo-200 dark:bg-gray-700 dark:text-gray-400">
                    <tr>
                        <th scope="col" class="py-3 px-6">
                            ID
                        </th>
                        <th scope="col" class="py-3 px-6">
                            Username
                        </th>
                        <th scope="col" class="py-3 px-6">
                            Password
                        </th>
                        <th scope="col" class="py-3 px-6">
                            DB Name
                        </th>
                        <th scope="col" class="py-3 px-6">
                            Application
                        </th>
                        <th scope="col" class="py-3 px-6">
                            Date Created
                        </th>
                        <th scope="col" class="py-3 px-6">
                            Requestor
                        </th>
                        <th scope="col" class="py-3 px-6">
                            Remarks
                        </th>
                        <th scope="col" class="py-3 px-6">
                            Status
                        </th>
                        <th scope="col" class="py-3 px-6">
                            Action
                        </th>
                    </tr>
                </thead>
                <tbody class="overflow-scroll bg-gray-500">
                    <?php
                    foreach ($data as $user) {
                    ?>
                        <tr>
                            <td class="py-4 px-6"><?php echo $user['ID']; ?></td>
                            <td class="py-4 px-6"><?php echo $user['USERNAME']; ?></td>
                            <td class="py-4 px-6"><?php echo $user['PASSWORD']; ?></td>
                            <td class="py-4 px-6"><?php echo $user['DB_NAME']; ?></td>
                            <td class="py-4 px-6"><?php echo $user['APPLICATION']; ?></td>
                            <td class="py-4 px-6"><?php echo $user['DATE_CREATED']; ?></td>
                            <td class="py-4 px-6"><?php echo $user['REQUESTOR']; ?></td>
                            <td class="py-4 px-6"><?php echo $user['REMARKS']; ?></td>
                            <td class="py-4 px-6"><?php echo $user['STATUS']; ?></td>
                            <td class="py-4 px-6">
                                <button data-tooltip-target="tooltip-edit" data-tooltip-trigger="hover" type="button" alt="Edit" class="px-2">
                                    <i class="fas mt-1 fa-pen ml-2"></i>
                                </button>
                                <button data-tooltip-target="tooltip-delete" data-tooltip-trigger="hover" type="button" alt="Delete">
                                    <i class="fas mt-1 fa-trash ml-2"></i>
                                </button>
                            </td>
                        </tr>
                    <?php
                    }
                    ?>
                </tbody>
            </table>
    </div>
    <nav class="flex justify-between items-center pt-4" aria-label="Table navigation">
        <span class="text-sm font-normal text-gray-500 dark:text-gray-400">Showing <span class="font-semibold text-gray-900 dark:text-white">1-10</span> of <span class="font-semibold text-gray-900 dark:text-white">1000</span></span>
        <ul class="inline-flex items-center -space-x-px">
            <li>
                <a href="#" class="block py-2 px-3 ml-0 leading-tight text-gray-500 bg-white rounded-l-lg border border-gray-300 hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">
                    <span class="sr-only">Previous</span>
                    <svg class="w-5 h-5" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" d="M12.707 5.293a1 1 0 010 1.414L9.414 10l3.293 3.293a1 1 0 01-1.414 1.414l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 0z" clip-rule="evenodd"></path>
                    </svg>
                </a>
            </li>
            <li>
                <a href="#" class="py-2 px-3 leading-tight text-gray-500 bg-white border border-gray-300 hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">1</a>
            </li>
            <li>
                <a href="#" class="py-2 px-3 leading-tight text-gray-500 bg-white border border-gray-300 hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">...</a>
            </li>
            <li>
                <a href="#" class="py-2 px-3 leading-tight text-gray-500 bg-white border border-gray-300 hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">100</a>
            </li>
            <li>
                <a href="#" class="block py-2 px-3 leading-tight text-gray-500 bg-white rounded-r-lg border border-gray-300 hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">
                    <span class="sr-only">Next</span>
                    <svg class="w-5 h-5" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"></path>
                    </svg>
                </a>
            </li>
        </ul>
    </nav>
<?php
        } else {
?>
    <div class="flex justify-center pb-4">
        <h1 class="text-white"><b>No User Found.</b></h1>
    </div>
<?php
        }
?>
</div>


<?php require APPROOT . '/views/inc/footer.php'; ?>