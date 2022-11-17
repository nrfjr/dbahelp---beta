<?php
$title = 'Manage Users';
require APPROOT . '/views/inc/header.php';
require APPROOT . '/views/inc/sidebar.php'; 

//>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>> components for pagination 

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
    $range = 'the Last of ' . $total_users . ' Products';
} else {
    $range = $first_user_displayed . ' - ' . $last_user_displayed . ' of ' . $total_users . ' Users ';
}

//<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<< components for pagination 
?>

<h1 class="text-3xl text-black pb-6 text-white"><b>Manage Users</b></h1>


<div class="overflow-x-auto relative shadow-md sm:rounded-lg">
    <div class="flex justify-between items-center pb-4 bg-gray-600 dark:bg-gray-900">
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
            <form action="<?php echo URLROOT; ?>/users/show" method="POST">
            <div class="flex justify-auto">
                <input type="text" id="search" name="search" class="block mr-4 p-2 pl-10 w-80 text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Search for users">
                <button id="dropdownRadioButton" class="inline-flex items-center text-black bg-blue-200 focus:outline-none hover:bg-blue-700 hover:text-white focus:ring-4 focus:ring-gray-200 font-medium rounded-lg text-sm px-3 py-1.5 dark:bg-gray-800 dark:text-white dark:border-gray-600 dark:hover:bg-gray-700 dark:hover:border-gray-600 dark:focus:ring-gray-700" type="submit">
                    Search
                </button>
            </div>
            </form>
        </div>
    </div>
    <div style="height: 68vh; overflow: clip;">
        <div class="flex w-full shadow-md overflow-auto sm:rounded-lg" style="max-height: 80%; min-height: 100%;">
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
                        <thead class="text-xs text-black bg-indigo-200 dark:bg-gray-700 dark:text-gray-400">
                            <tr>
                                <?php for ($title = 0; $title <= count($array) - 1; $title++) { ?>
                                <th scope="col" class="py-2 px-6">
                                    <?php echo $column_names[$title]; ?>
                                </th>
                                <?php }?>
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
                                    <tr>
                                        <?php
                                        foreach($value as $user){
                                        ?>
                                            <td class="py-4 px-6">
                                                <?php echo $user; ?>
                                            </td>
                                        <?php
                                        }
                                        ?>
                                        <td class="py-4 px-6 text-center">
                                        <form action="<?php echo URLROOT; ?>/users/edit/<?php echo $value['ID']?>" method="POST">
                                            <button type="submit" alt="Edit" class="px-2">
                                                <font color="#005eff" title="Edit User">
                                                    <i class="fas mt-1 fa-pen ml-2 hover:bg-blue-200 rounded-lg w-6 h-6"></i>
                                                </font> 
                                            </button>
                                        </form>
                                        <form action="<?php echo URLROOT; ?>/users/delete/<?php echo $value['USERNAME']?>" method="POST">
                                            <button type="submit" alt="Delete" class="border-blue-500 md:border-green-500">
                                                <font color="#b00020" title="Delete User">
                                                    <i class="fas mt-1 fa-trash ml-2 hover:bg-red-200 rounded-lg w-6 h-6"></i>
                                                </font>
                                            </button>
                                        </form>
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

                    <li class="page-item"><a class="page-link block px-3 py-2 ml-0 leading-tight text-gray-500 bg-white border border-gray-300 rounded-l-lg hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white" href="<?php echo '?page=1' ; ?>">First</a></li>

                    <?php
                }

                for ($page_in_loop = 1; $page_in_loop <= $total_pages; $page_in_loop++) {

                    if ($total_pages > 3) {
                        if (($page_in_loop >= $current_page - 5 && $page_in_loop <= $current_page)  || ($page_in_loop <= $current_page + 5 && $page_in_loop >= $current_page)) {  ?>

                            <li class="page-item <?php echo $page_in_loop == $current_page ? 'active disabled' : ''; ?>">
                                <a class="page-link px-3 py-2 leading-tight text-gray-500 bg-white border border-gray-300 hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white" href="<?php echo '?page=' . $page_in_loop ; ?> "><?php echo $page_in_loop; ?></a>
                            </li>

                        <?php }
                    }
                    else { ?>

                        <li class="page-item <?php echo $page_in_loop == $current_page ? 'active disabled' : ''; ?>">
                            <a class="page-link px-3 py-2 leading-tight text-gray-500 bg-white border border-gray-300 hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white" href="<?php echo '?page=' . $page_in_loop ; ?> "><?php echo $page_in_loop; ?></a>
                        </li>

                    <?php } 
                    ?>

                <?php } 

                if ($current_page < $total_pages) { ?>

                    <li class="page-item"><a class="page-link block px-3 py-2 leading-tight text-gray-500 bg-white border border-gray-300 rounded-r-lg hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white" href="<?php echo '?page=' . $total_pages ; ?>">Last</a></li>

                <?php } ?>
            </ul>
        </nav>

    <?php } 
    ?>
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