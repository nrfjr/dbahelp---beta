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
                    Create
                    <i class="fas fa-plus ml-2"></i>
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
    <div class="flex shadow-md">
        <div class="overflow-auto h-96 w-full sm:rounded-lg">
            <?php
            if (!empty($data)) {
            ?>
                <table class="w-full text-sm text-left text-white dark:text-gray-400">
                    <thead class="text-xs text-black bg-indigo-200 dark:bg-gray-700 dark:text-gray-400">
                        <tr>
                            <th scope="col" class="py-2 px-6">
                                No.
                            </th>
                            <th scope="col" class="py-3 px-6 ">
                                ID
                            </th>
                            <th scope="col" class="py-3 px-6 ">
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
                            <th scope="col" class="py-3 px-6 ">
                                Date Created
                            </th>
                            <th scope="col" class="py-3 px-6 ">
                                Requestor
                            </th>
                            <th scope="col" class="py-3 px-6 ">
                                Remarks
                            </th>
                            <th scope="col" class="py-3 px-6">
                                Status
                            </th>
                            <th scope="col" class="py-3 px-6 ">
                                Action
                            </th>
                        </tr>
                    </thead>
                    <tbody class="bg-gray-500">
                        <?php
                        $count = 0;
                        foreach ($data as $user) {
                            $count++;
                        ?>
                            <tr>
                                <td class="py-4 px-6"><?php echo $user['ROWNUM']; ?></td>
                                <td class="py-4 px-6"><?php echo $user['ID']; ?></td>
                                <td class="py-4 px-6"><?php echo $user['USERNAME']; ?></td>
                                <td class="py-4 px-6"><?php echo $user['PASSWORD']; ?></td>
                                <td class="py-4 px-6"><?php echo $user['DB_NAME']; ?></td>
                                <td class="py-4 px-6"><?php echo $user['APPLICATION']; ?></td>
                                <td class="py-4 px-6"><?php echo $user['DATE_CREATED']; ?></td>
                                <td class="py-4 px-6"><?php echo $user['REQUESTOR']; ?></td>
                                <td class="py-4 px-6"><?php echo $user['REMARKS']; ?></td>
                                <td class="py-4 px-6"><?php
                                                                    if ($user['STATUS'] == 'ACTIVE') {
                                                                        echo '<font color="#00fc00">' . $user['STATUS'] . '</font>';
                                                                    } else if ($user['STATUS'] == 'INACTIVE') {
                                                                        echo '<font color="red">' . $user['STATUS'] . '</font>';
                                                                    } else {
                                                                        echo '<font color="yellow">' . $user['STATUS'] . '</font>';
                                                                    }
                                                                    ?></td>
                                <td class="py-4 px-6">
                                    <button data-tooltip-target="tooltip-edit" data-tooltip-trigger="hover" type="button" alt="Edit" class="px-2">
                                        <font color="#005eff">
                                            <i class="fas mt-1 fa-pen ml-2"></i>
                                        </font>
                                    </button>
                                    <button data-tooltip-target="tooltip-delete" data-tooltip-trigger="hover" type="button" alt="Delete">
                                        <font color="#b00020">
                                            <i class="fas mt-1 fa-trash ml-2"></i>
                                        </font>
                                    </button>
                                </td>
                            </tr>
                        <?php
                        }
                        ?>
                    </tbody>
                </table>
        </div>
    </div>
    <div class="hidden sm:flex sm:flex-1 sm:items-center sm:justify-between py-4">
        <div>
            <p class="text-sm text-white pl-2">
                Total Records:
            </p>
        </div>
        <div>
            <p class="text-sm text-white pr-2">
                <?php
                echo $count;
                ?>
            </p>
        </div>
    </div>
    <!-- PAGINATION (soon) -->
    <!-- <div class="hidden sm:flex sm:flex-1 sm:items-center sm:justify-between py-4">
    <div>
      <p class="text-sm text-white pl-2">
        Showing
        <span class="font-medium">n</span>
        to
        <span class="font-medium">n1</span>
        of
        <span class="font-medium">n2</span>
        results
      </p>
    </div>
    <div>
      <nav class="isolate inline-flex -space-x-px rounded-md shadow-sm" aria-label="Pagination">
        <a href="#" class="relative inline-flex items-center rounded-l-md border border-gray-300 bg-white px-2 py-2 text-sm font-medium text-gray-500 hover:bg-gray-50 focus:z-20">
          <span class="sr-only">Previous</span> -->
    <!-- Heroicon name: mini/chevron-left -->
    <!-- <svg class="h-5 w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
            <path fill-rule="evenodd" d="M12.79 5.23a.75.75 0 01-.02 1.06L8.832 10l3.938 3.71a.75.75 0 11-1.04 1.08l-4.5-4.25a.75.75 0 010-1.08l4.5-4.25a.75.75 0 011.06.02z" clip-rule="evenodd" />
          </svg>
        </a> -->
    <!-- Current: "z-10 bg-indigo-50 border-indigo-500 text-indigo-600", Default: "bg-white border-gray-300 text-gray-500 hover:bg-gray-50" -->
    <!-- <a href="#" aria-current="page" class="relative z-10 inline-flex items-center border border-indigo-500 bg-indigo-50 px-4 py-2 text-sm font-medium text-indigo-600 focus:z-20">1</a>
        <a href="#" class="relative inline-flex items-center border border-gray-300 bg-white px-4 py-2 text-sm font-medium text-gray-500 hover:bg-gray-50 focus:z-20">2</a>
        <a href="#" class="relative hidden items-center border border-gray-300 bg-white px-4 py-2 text-sm font-medium text-gray-500 hover:bg-gray-50 focus:z-20 md:inline-flex">3</a>
        <span class="relative inline-flex items-center border border-gray-300 bg-white px-4 py-2 text-sm font-medium text-gray-700">...</span>
        <a href="#" class="relative inline-flex items-center border border-gray-300 bg-white px-4 py-2 text-sm font-medium text-gray-500 hover:bg-gray-50 focus:z-20">10</a>
        <a href="#" class="relative inline-flex items-center rounded-r-md border border-gray-300 bg-white px-2 py-2 text-sm font-medium text-gray-500 hover:bg-gray-50 focus:z-20">
          <span class="sr-only">Next</span> -->
    <!-- Heroicon name: mini/chevron-right -->
    <!-- <svg class="h-5 w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
            <path fill-rule="evenodd" d="M7.21 14.77a.75.75 0 01.02-1.06L11.168 10 7.23 6.29a.75.75 0 111.04-1.08l4.5 4.25a.75.75 0 010 1.08l-4.5 4.25a.75.75 0 01-1.06-.02z" clip-rule="evenodd" />
          </svg>
        </a>
      </nav>
    </div>
  </div> -->
<?php
            } else {
?>
    <div class="flex justify-center bg-gray-500">
        <h1 class="text-white"><b>No Users Found.</b></h1>
    </div>
<?php
            }
?>
</div>


<?php require APPROOT . '/views/inc/footer.php'; ?>