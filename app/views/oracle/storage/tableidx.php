<?php
$title = 'Table Indexes';
require APPROOT . '/views/inc/header.php';
require APPROOT . '/views/inc/sidebar.php';

// components for pagination 

$indexes = $data['Indexes'];

$total_indexes = count($indexes);

$current_page = isset($_GET['page']) ? $_GET['page'] : 1;

$limit = 13;

if (!empty($current_page) && $current_page > 1) {
    $offset = ($current_page * $limit) - $limit;
} else {
    $offset = 0;
}

$total_pages = ceil($total_indexes / $limit);

$first_index_displayed = $offset + 1;

$last_index_displayed = $total_indexes >= ($offset * $limit) + $limit ? $offset + $limit : $total_indexes;

if ($first_index_displayed === $last_index_displayed) {
    $range = 'the Last of ' . $total_indexes . ' Table Index';
} else {
    $range = $first_index_displayed . ' - ' . $last_index_displayed . ' of ' . $total_indexes . ' Table Indexes ';
}
// components for pagination 
?>

<div class="flex justify-between mb-5">
    <h1 class="text-3xl text-black text-white">
        <a href="<?php echo URLROOT; ?>/homepages/index/<?php echo $_SESSION['StorageDB']; ?>" class="no-underline hover:underline">Storage</a> > <b>Table Indexes</b>
    </h1>
    <div class="inline-flex gap-4">
        <div class="flex gap-2">
            <b for="tables" class="flex flex-row inline-flex whitespace-nowrap w-full items-center text-sm font-medium text-gray-100">Select Owner: </b>
            <!--OBJECTS-->
            <button id="dropdownDefault" data-dropdown-toggle="dropdown-tables" class="text-center hover:bg-gray-400 hover:text-black focus:ring-4 focus:outline-none focus:ring-gray-800 font-medium rounded-lg text-sm px-4 py-2 flex justify-between items-center w-full bg-gray-200" type="button">Owners<i class="fas fa-chevron-down"></i></button>
        </div>
        <!-- Dropdown menu -->
        <div id="dropdown-tables" class="flex justify-center hidden z-10 w-auto bg-white rounded divide-y divide-gray-100 shadow max-h-48 overflow-y-auto scrollbar-hide">
            <form action="<?php echo URLROOT; ?>/storages/tableidx/<?php echo $_SESSION['StorageDB'] ?>" method="POST">
                <ul class="py-1 text-sm text-gray-700 flex flex-col items-center" aria-labelledby="dropdownDefault">
                    <li class="w-full">
                        <button type="submit" id="owner" name="owner" value="" class="block py-2 px-4 hover:bg-gray-100 w-full">N/A</button>
                    </li>
                    <?php foreach ($data['Owners'] as $Ok => $Ov) { 
                            foreach($Ov as $owner){
                        ?>

                        <li class="w-full">
                            <button type="submit" id="owner" name="owner" value="<?php echo $owner ?>" class="block py-2 px-4 hover:bg-gray-100 w-full"><?php echo $owner ?></button>
                        </li>
                    <?php }} ?>
                </ul>
            </form>
        </div>
        <!--OBJECTS-->
        <button onclick="window.location.reload()" class="px-4 py-2 rounded-lg bg-gray-200 hover:bg-gray-500"> Refresh<i class="ml-2 fas fa-redo"></i></button>
    </div>
</div>

<div class="overflow-x-auto relative shadow-md rounded-md">
    <div style="height: fit-content; overflow: clip;" class="rounded-lg">
        <div class="block w-full shadow-md overflow-auto sm:rounded-lg" style="max-height: 72vh;">
            <?php
            if (!empty($indexes)) {

                //Separates Column title from result set
                foreach ($indexes as $outer_key => $array) {

                    foreach ($array as $inner_key => $value) {
                        $column_names[] = $inner_key;
                    }
                }
            ?>
                <table class=" sortable w-full text-sm text-left text-white">
                    <thead class="cursor-pointer text-xs text-black bg-indigo-200 sticky top-0">
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
                        $indexes = array_slice($indexes, $offset, $limit);

                        foreach ($indexes as $column_title => $value) {
                        ?>
                            <tr class="hover:bg-gray-700">
                                <?php
                                foreach ($value as $index) {
                                ?>
                                    <td class=" item py-4  px-6">
                                        <?php echo $index; ?>
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

            <nav class="shadow-sm absolute right-0 bottom-2" aria-label="Pagination">
                <ul class="pagination inline-flex items-center -space-x-px">

                    <?php
                    if ($current_page > 1) { ?>

                        <li class="page-item"><a class="page-link block px-3 py-2 ml-0 leading-tight text-gray-700 bg-indigo-200 border border-gray-300 rounded-l-md hover:bg-gray-100" href="<?php echo '?page=1'; ?>">First</a></li>

                        <?php
                    }
                    for ($page_in_loop = 1; $page_in_loop <= $total_pages; $page_in_loop++) {
                        if ($total_pages > 3) {
                            if (($page_in_loop >= $current_page - 5 && $page_in_loop <= $current_page)  || ($page_in_loop <= $current_page + 5 && $page_in_loop >= $current_page)) {  ?>

                                <li class="page-item">
                                    <a class="page-link px-3 py-2 leading-tight <?php echo $page_in_loop == $current_page ? 'text-blue-500 pointer-events-none bg-indigo-50' : 'text-gray-700 bg-indigo-200'; ?> <?php echo $page_in_loop == 1 && $current_page == 1 ? 'rounded-l-md' : ''; ?> <?php echo $page_in_loop == $total_pages && $current_page == $total_pages ? 'rounded-r-md' : ''; ?> border border-gray-300 hover:bg-gray-100 hover:text-gray-700" href="<?php echo '?page=' . $page_in_loop; ?> "><?php echo $page_in_loop; ?></a>
                                </li>

                            <?php }
                        } else { ?>

                            <li class="page-item">
                                <a class="page-link px-3 py-2 leading-tight <?php echo $page_in_loop == $current_page ? 'text-blue-500 pointer-events-none bg-indigo-50' : 'text-gray-700 bg-indigo-200'; ?> <?php echo $page_in_loop == 1 && $current_page == 1 ? 'rounded-l-md' : ''; ?> <?php echo $page_in_loop == $total_pages && $current_page == $total_pages ? 'rounded-r-md' : ''; ?> border border-gray-300 hover:bg-gray-100 hover:text-gray-700" href="<?php echo '?page=' . $page_in_loop; ?>"><?php echo $page_in_loop; ?></a>
                            </li>

                        <?php }
                        ?>
                    <?php }

                    if ($current_page < $total_pages) { ?>

                        <li class="page-item"><a class="page-link block px-4 py-2 leading-tight text-gray-700 bg-indigo-200 border border-gray-300 rounded-r-md hover:bg-gray-100" href="<?php echo '?page=' . $total_pages; ?>">Last</a></li>

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
        <h1 class="text-white m-auto "><b>No table indexes found or select another index owner.</b></h1>
    </div>
<?php
            }
?>
</div>

<?php require APPROOT . '/views/inc/footer.php'; ?>