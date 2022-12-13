<?php
$title = 'Table Monitoring';
require APPROOT . '/views/inc/header.php';
require APPROOT . '/views/inc/sidebar.php';

// components for pagination 

$analysis = $data;

$filtered_tables = array();

$total_analysis = count($analysis);

$current_page = isset($_GET['page']) ? $_GET['page'] : 1;

$limit = 13;

if (!empty($current_page) && $current_page > 1) {
    $offset = ($current_page * $limit) - $limit;
} else {
    $offset = 0;
}

$total_pages = ceil($total_analysis / $limit);

$first_analysis_displayed = $offset + 1;

$last_analysis_displayed = $total_analysis >= ($offset * $limit) + $limit ? $offset + $limit : $total_analysis;

if ($first_analysis_displayed === $last_analysis_displayed) {
    $range = 'the Last of ' . $total_analysis . ' Table Analysis';
} else {
    $range = $first_analysis_displayed . ' - ' . $last_analysis_displayed . ' of ' . $total_analysis . ' Table Analysis ';
}
// components for pagination 
?>

<div class="mb-5 flex justify-between">
    <h1 class="text-3xl text-black text-white">
        <a href="<?php echo URLROOT; ?>/homepages/index/<?php echo $_SESSION['StorageDB']; ?>" class="no-underline hover:underline">Storage</a> > <b>Table Monitoring</b>
    </h1>
    <form class="hiddden" action="<?php echo URLROOT; ?>/storages/tablemonitoring/<?php echo $_SESSION['StorageDB'] ?>" method="POST">
        <div class="inline-flex gap-4">
            <div class="flex gap-2">
                <b for="tables" class="flex flex-row inline-flex whitespace-nowrap w-full items-center text-sm font-medium text-gray-100">Select Table: </b>
                <!--OBJECTS-->
                <button id="dropdownDefault" data-dropdown-toggle="dropdown-tables" class="text-center hover:bg-gray-400 hover:text-black focus:ring-4 focus:outline-none focus:ring-gray-800 font-medium rounded-lg text-sm px-4 py-2 flex justify-between items-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800 w-full bg-gray-200" type="button">TABLES <i class="fas fa-chevron-down"></i></button>
            </div>

            <!-- Dropdown menu -->
            <div id="dropdown-tables" class="flex justify-center hidden z-10 w-auto bg-white rounded divide-y divide-gray-100 shadow dark:bg-gray-700">
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
            <button onclick="window.location.reload()" class="px-4 py-2 rounded-lg bg-gray-200 hover:bg-gray-500"> Refresh<i class="las la-redo-alt"></i></button>
        </div>
    </form>
</div>

<div class="overflow-x-auto relative shadow-md">
    <div style="height: 72vh; overflow: clip;">
        <div class="block w-full shadow-md overflow-auto sm:rounded-lg" style="max-height: 72vh;">
            <?php
            if (!empty($analysis)) {

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
                        </tr>
                    </thead>
                    <tbody class="bg-gray-500">
                        <?php
                        $analysis = array_slice($analysis, $offset, $limit);

                        foreach ($analysis as $column_title => $value) {
                        ?>
                            <tr>
                                <?php
                                foreach ($value as $table) {
                                ?>
                                    <td class="py-4 px-6">
                                        <?php echo $table; ?>
                                    </td>
                                <?php
                                }
                                ?>
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
        <h1 class="text-white m-auto "><b>No Table Analysis Found.</b></h1>
    </div>
<?php
            }
?>
</div>

<?php require APPROOT . '/views/inc/footer.php'; ?>