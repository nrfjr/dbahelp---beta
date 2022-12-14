<?php
$title = 'Manage Users';
require APPROOT . '/views/inc/header.php';
require APPROOT . '/views/inc/sidebar.php';

// components for pagination 

$users = $data;

$filtered_users = array();

$total_users = count($users);

$current_page = isset($_GET['page']) ? $_GET['page'] : 1;

$limit = 10;

if (!empty($current_page) && $current_page > 1) {
    $offset = ($current_page * $limit) - $limit;
} else {
    $offset = 0;
}

$total_pages = ceil($total_users / $limit);

$first_user_displayed = $offset + 1;

$last_user_displayed = $total_users >= ($offset * $limit) + $limit ? $offset + $limit : $total_users;

if ($first_user_displayed === $last_user_displayed) {
    $range = 'the Last of ' . $total_users . ' Users';
} else {
    $range = $first_user_displayed . ' - ' . $last_user_displayed . ' of ' . $total_users . ' Users ';
}
// components for pagination 
?>

<h1 class="text-3xl text-black pb-6 text-white"><b>Manage Users</b></h1>


<div class="overflow-x-auto relative shadow-md sm:rounded-lg">
    <div class="flex justify-between items-center pb-4 bg-gray-600 dark:bg-gray-900">
        <div>
            
                <button id="dropdownDefault" data-dropdown-toggle="dropdown-createuser" class="inline-flex items-center text-black bg-green-300 focus:outline-none hover:bg-green-700  font-medium rounded-lg text-sm px-3 py-2  hover:text-white" type="button">
                    Create
                    <i class="fas fa-chevron-down ml-2"></i>
                </button>
                <div id="dropdown-createuser" class="whitespace-normal hidden z-10 w-fit bg-white rounded divide-y divide-gray-100 shadow dark:bg-gray-700">
                        <ul class="p-2 text-sm text-gray-700 dark:text-gray-200" aria-labelledby="dropdownDefault">
                            <li class="block py-2 px-4 hover:bg-gray-300 rounded-lg dark:hover:bg-gray-600 dark:hover:text-white">
                                <a href="<?php echo URLROOT; ?>/users/create/RMSPRD">RMSPRD</a>
                            </li>
                            <li class="block py-2 px-4 hover:bg-gray-300 rounded-lg dark:hover:bg-gray-600 dark:hover:text-white">
                                <a href="<?php echo URLROOT; ?>/users/create/RDWPRD">RDWPRD</a>
                            </li>
                            <li class="block py-2 px-4 hover:bg-gray-300 rounded-lg dark:hover:bg-gray-600 dark:hover:text-white">
                                <a href="#">BSPIKCON</a>
                            </li>
                        </ul>
                </div>
            
        </div>
        <label for="table-search" class="sr-only">Search</label>
        <div class="relative absolute">
            <div class="flex absolute inset-y-0 left-0 items-center pl-3">
                <svg class="w-5 h-5 text-gray-500 dark:text-gray-400" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd" d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z" clip-rule="evenodd"></path>
                </svg>
            </div>
            <form action="<?php echo URLROOT; ?>/users/show/<?php echo $_SESSION['UserDB']; ?>" method="POST">
                <div class="flex justify-auto">
                    <input type="text" id="searchuser" name="searchuser" value="<?php echo isset($_SESSION['Search'])? $_SESSION['Search']:''; ?>" class="block mr-4 p-2 pl-10 w-80 text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Search for users">
                    <button id="dropdownRadioButton" class="inline-flex items-center text-black bg-blue-200 focus:outline-none hover:bg-blue-700 hover:text-white focus:ring-4 focus:ring-gray-200 font-medium rounded-lg text-sm px-3 py-1.5 dark:bg-gray-800 dark:text-white dark:border-gray-600 dark:hover:bg-gray-700 dark:hover:border-gray-600 dark:focus:ring-gray-700" type="submit">
                        Search
                    </button>
                </div>
            </form>
        </div>
    </div>
    <div style="height: 65vh; overflow: clip;">
        <div class="block w-full shadow-md overflow-auto sm:rounded-lg" style="max-height: 98%;">
            <?php
            if (!empty($users)) {

                //Separates Column title from result set
                foreach ($data as $outer_key => $array) {

                    foreach ($array as $inner_key => $value) {
                        $column_names[] = $inner_key;
                    }
                }
            ?>
                <table class="w-full text-sm text-left text-white dark:text-gray-400">
                    <thead class="text-xs text-black bg-indigo-200 dark:bg-gray-700 dark:text-gray-400 sticky top-0">
                        <tr>
                            <?php for ($title = 0; $title <= count($array) - 1; $title++) { ?>
                                <th scope="col" class="py-2 px-6">
                                    <?php echo $column_names[$title]; ?>
                                </th>
                            <?php } ?>
                            <th scope="col" class="py-2 px-6">
                                Action
                            </th>
                        </tr>
                    </thead>
                    <tbody class="bg-gray-500">
                        <?php
                        $users = array_slice($users, $offset, $limit);

                        foreach ($users as $column_title => $value) {
                        ?>
                            <tr class="focus:hover:bg-gray-700 hover:bg-gray-700">
                                <?php
                                foreach ($value as $user) {
                                ?>
                                    <td class="py-4 px-6">
                                        <?php echo $user; ?>
                                    </td>
                                <?php
                                }
                                ?>
                                <td class="py-4 px-6 text-center">
                                    <form action="<?php echo URLROOT; ?>/users/edit/<?php echo $value['ID'] ?>" method="POST">
                                        <input id="edit_db" name="edit_db" value="<?php echo $value['DB_NAME'] ?>" class="hidden">
                                        <button type="submit" alt="Edit" class="px-2">
                                            <font color="#005eff" title="Edit User">
                                                <i class="fas mt-1 fa-pen ml-2 hover:bg-blue-200 rounded-lg w-6 h-6"></i>
                                            </font>
                                        </button>
                                    </form>
                                    <div x-data="{toSubmit: false}">
                                        <button @click="toSubmit = true" alt="Delete" class="border-blue-500 md:border-green-500">
                                            <font color="#b00020" title="Delete User">
                                                <i class="fas mt-1 fa-trash ml-2 hover:bg-red-200 rounded-lg w-6 h-6"></i>
                                            </font>
                                        </button>
                                        <button x-show="toSubmit" @click="toSubmit = false" alt="Delete" class="border-blue-500 md:border-green-500">
                                        </button>
                                        <!-- Delete User Modal -->
                                        <div x-show="toSubmit" class="border-double border-2 border-red-500 absolute left-1/4 top-1/2 z-10" aria-labelledby="modal-title" role="dialog" aria-modal="true">
                                            <div class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity"></div>
                                            <div class="modal fixed fade justify-center mr-48 top-72 w-5/12 h-full outline-none overflow-x-hidden overflow-y-auto" id="ModalCenteredScrollable" tabindex="-1" aria-labelledby="ModalCenteredScrollable" aria-modal="true" role="dialog">
                                                <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable relative pointer-events-none w-auto">

                                                    <div class="modal-content border-none shadow-lg relative flex flex-col w-full pointer-events-auto bg-white bg-clip-padding rounded-md outline-none text-current">
                                                        <div class="modal-header flex flex-shrink-0 items-center justify-between p-4 border-b border-gray-200 rounded-t-md">
                                                            <h5 class="text-xl font-medium leading-normal text-gray-800" id="exampleModalCenteredScrollableLabel">
                                                                <b>Confirm User Deletion</b>
                                                            </h5>
                                                            <button type="button" @click="toSubmit = false" class="btn-close box-content w-4 h-4 p-1 text-black border-none rounded-none opacity-50 focus:shadow-none focus:outline-none focus:opacity-100 hover:text-black hover:opacity-75 hover:no-underline" data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                        <div class="modal-body relative p-4">
                                                            <font color="black"><?php echo 'Are you sure to delete ' . $value['USERNAME'] . '?' ?></font>
                                                        </div>
                                                        <div class="modal-footer flex flex-shrink-0 flex-wrap items-center justify-end p-4 border-t border-gray-200 rounded-b-md">
                                                            <form action="<?php echo URLROOT; ?>/users/delete/<?php echo $value['USERNAME'] ?>" method="POST">
                                                                <input id="delete_db" name="delete_db" value="<?php echo $value['DB_NAME'] ?>" class="hidden">
                                                                <button type="submit" class="inline-flex w-full justify-center rounded-md border border-transparent bg-red-700 px-4 py-2 text-base font-medium text-white shadow-sm focus:outline-none focus:ring-2  focus:ring-offset-2 sm:ml-3 sm:w-auto sm:text-sm">Delete</button>
                                                            </form>
                                                            <button type="button" @click="toSubmit = false" class="mt-3 inline-flex w-full justify-center rounded-md border border-gray-300 bg-white px-4 py-2 text-base font-medium text-gray-700 shadow-sm hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 sm:mt-0 sm:ml-3 sm:w-auto sm:text-sm">Close</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- Delete User Modal -->
                                    </div>
                                </td>
                            </tr>
                        <?php
                        }
                        ?>
                    </tbody>
                </table>
        </div>
    </div>
    <div class="sm:flex sm:flex-1 sm:justify-between py-4 relative">
        <div>
            <p class="text-sm text-white pl-2">
                Showing <?php
                        echo $range;
                        ?>
            </p>
        </div>

        <?php

                if ($total_pages > 1) { ?>

            <nav class="rounded-md shadow-sm absolute right-0 bottom-2" aria-label="Pagination">
                <ul class="pagination inline-flex items-center -space-x-px">

                    <?php
                    if ($current_page > 1) { ?>

                        <li class="page-item"><a class="page-link block px-3 py-2 ml-0 leading-tight text-gray-500 bg-white border border-gray-300 rounded-l-lg hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white" href="<?php echo '?page=1'; ?>">First</a></li>

                        <?php
                    }
                    for ($page_in_loop = 1; $page_in_loop <= $total_pages; $page_in_loop++) {
                        if ($total_pages > 3) {
                            if (($page_in_loop >= $current_page - 5 && $page_in_loop <= $current_page)  || ($page_in_loop <= $current_page + 5 && $page_in_loop >= $current_page)) {  ?>

                                <li class="page-item <?php echo $page_in_loop == $current_page ? 'active disabled' : ''; ?>">
                                    <a class="page-link px-3 py-2 leading-tight text-gray-500 bg-white border border-gray-300 hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white" href="<?php echo '?page=' . $page_in_loop; ?> "><?php echo $page_in_loop; ?></a>
                                </li>

                            <?php }
                        } else { ?>

                            <li class="page-item <?php echo $page_in_loop == $current_page ? 'active disabled' : ''; ?>">
                                <a class="page-link px-3 py-2 leading-tight text-gray-500 bg-white border border-gray-300 hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white" href="<?php echo '?page=' . $page_in_loop; ?> "><?php echo $page_in_loop; ?></a>
                            </li>

                        <?php }
                        ?>
                    <?php }

                    if ($current_page < $total_pages) { ?>

                        <li class="page-item"><a class="page-link block px-3 py-2 leading-tight text-gray-500 bg-white border border-gray-300 rounded-r-lg hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white" href="<?php echo '?page=' . $total_pages; ?>">Last</a></li>

                    <?php } ?>
                </ul>
            </nav>

        <?php }
        ?>
        <div>

        </div>
    </div>
<?php
            } else {
?>
    <div class="flex w-full shadow-md overflow-auto sm:rounded-lg bg-gray-500" style="max-height: 80%; min-height: 100%;">
        <h1 class="text-white m-auto "><b>No Users Found.</b></h1>
    </div>
<?php
            }
?>
</div>


<?php require APPROOT . '/views/inc/footer.php'; ?>
