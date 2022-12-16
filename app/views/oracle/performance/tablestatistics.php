<?php
$title = 'Table Statistics';
require APPROOT . '/views/inc/header.php';
require APPROOT . '/views/inc/sidebar.php';

// components for pagination 

$tablestats = $data;

$total_stats_row = count($tablestats);

$current_page = isset($_GET['page']) ? $_GET['page'] : 1;

$limit = 13;

if (!empty($current_page) && $current_page > 1) {
    $offset = ($current_page * $limit) - $limit;
} else {
    $offset = 0;
}

$total_pages = ceil($total_stats_row / $limit);

$first_stats_displayed = $offset + 1;

$last_stats_displayed = $total_stats_row >= ($offset * $limit) + $limit ? $offset + $limit : $total_stats_row;

if ($first_stats_displayed === $last_stats_displayed) {
    $range = 'the Last of ' . $total_stats_row . ' Table Statistics';
} else {
    $range = $first_stats_displayed . ' - ' . $last_stats_displayed . ' of ' . $total_stats_row . ' Table Statistics ';
}
// components for pagination 
?>

<div class="flex justify-between mb-5">
    <h1 class="text-3xl text-black text-white">
        <a href="<?php echo URLROOT; ?>/homepages/index/<?php echo $_SESSION['PerformanceDB']; ?>" class="no-underline hover:underline">Performance</a> > <b>Table Statistics</b>
    </h1>
    <button onclick="window.location.reload()" class="px-4 py-2 rounded-lg bg-gray-200 hover:bg-gray-500"> Refresh<i class="ml-2 fas fa-redo"></i></button>
</div>

<div class="overflow-x-auto relative shadow-md">
    <div style="height: auto; overflow: clip;" class="">
        <div class="block  justify-center w-full shadow-md overflow-auto sm:rounded-lg" style="max-height: 70vh;">
        <?php
            if (!empty($tablestats)) {

                //Separates Column title from result set
                foreach ($data as $outer_key => $array) {

                    foreach ($array as $inner_key => $value) {
                        $column_names[] = $inner_key;
                    }
                }
            ?>
                <table class=" sortable w-full text-sm text-left text-white dark:text-gray-400">
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
                        $tablestats = array_slice($tablestats, $offset, $limit);

                        foreach ($tablestats as $column_title => $value) {
                        ?>
                            <tr class="focus:hover:bg-gray-700 hover:bg-gray-700">
                                <?php
                                foreach ($value as $stats) {
                                ?>
                                    <td class=" item py-4  px-6">
                                        <?php echo $stats; ?>
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
        <h1 class="text-white m-auto "><b>No Table Statistics Found.</b></h1>
    </div>
<?php
            }
?>
</div>

<?php require APPROOT . '/views/inc/footer.php'; ?>