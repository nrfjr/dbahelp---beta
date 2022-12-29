<?php
$title = 'Users Sessions';
require APPROOT . '/views/inc/header.php';
require APPROOT . '/views/inc/sidebar.php';

// components for pagination 

$usersessions = $data;

$filtered_users = array();

$total_sessions = count($usersessions);

$current_page = isset($_GET['page']) ? $_GET['page'] : 1;

$limit = 12;

if (!empty($current_page) && $current_page > 1) {
    $offset = ($current_page * $limit) - $limit;
} else {
    $offset = 0;
}

$total_pages = ceil($total_sessions / $limit);

$first_user_displayed = $offset + 1;

$last_user_displayed = $total_sessions >= ($offset * $limit) + $limit ? $offset + $limit : $total_sessions;

if ($first_user_displayed === $last_user_displayed) {
    $range = 'the Last of ' . $total_sessions . ' User Sessions';
} else {
    $range = $first_user_displayed . ' - ' . $last_user_displayed . ' of ' . $total_sessions . ' User Sessions ';
}
// components for pagination 
?>

<h1 class="text-3xl text-black mb-5 text-white">
    <a href="<?php echo URLROOT; ?>/homepages/index/<?php echo $_SESSION['MonitorDB']; ?>" class="no-underline hover:underline">Monitor</a> > <b>User Sessions</b>
</h1>


<div class="overflow-x-auto relative shadow-md sm:rounded-lg">
    <form class="rounded-lg flex justify-between items-center p-2 bg-gray-300  mb-4" action="<?php echo URLROOT; ?>/monitors/usersessions/<?php echo $_SESSION['MonitorDB']; ?>" method="POST">
        <div class="inline-flex">
            <p class="mt-2">Search: </p>
            <input id="search" name="search" class="m-1 rounded-sm py-1 px-2" type="text" placeholder="Search for SPID">
            <button type="submit" class="px-4 py-1 rounded-md bg-gray-300 hover:bg-gray-500 shadow-inner shadow-xl">
                <i class="fas fa-search"></i>
            </button>
        </div>
        <div class="inline-flex">
            <p class="m-2">Total Sessions:</p>
            <b class="m-2"><?php echo $total_sessions ?></b>
        </div>
        <div class="inline-flex">
            <b><?php echo $_SESSION['MonitorDB']; ?> ACTIVE RUNNING SESSIONS</b>
        </div>
        <div class="inline-flex">
            <button type="submit" class="px-4 py-2 rounded-lg bg-gray-300 hover:bg-gray-500 shadow-inner shadow-xl">
                Refresh Data
            </button>
        </div>
    </form>
    <div style="height: fit-content; overflow: clip;" class="rounded-lg">
        <div class="block w-full shadow-md overflow-auto sm:rounded-lg" style="max-height: 64vh;">
            <?php
            if (!empty($usersessions)) {

                //Separates Column title from result set
                foreach ($data as $outer_key => $array) {

                    foreach ($array as $inner_key => $value) {
                        $column_names[] = $inner_key;
                    }
                }
            ?>
                <table class=" sortable w-full text-sm text-left text-white ">
                    <thead class="cursor-pointer text-xs text-black bg-indigo-200 sticky top-0 z-10">
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
                        $usersessions = array_slice($usersessions, $offset, $limit);

                        foreach ($usersessions as $column_title => $value) {
                        ?>
                            <tr class="focus:hover:bg-gray-700 hover:bg-gray-700">
                                <?php
                                foreach ($value as $user) {
                                ?>
                                    <td class=" item py-4  px-6">
                                        <?php echo $user; ?>
                                    </td>
                                <?php
                                }
                                ?>
                                <td class=" item py-4  px-6 text-center">
                                    <div x-data="{toSubmit: false}">
                                        <button @click="toSubmit = true" alt="Kill" class="w-fith-3/4 rounded-full hover:bg-red-200 border-blue-500 md:border-green-500">
                                            <font color="#b00020" title="Kill Session">
                                                <i class="fas fa-times-circle transform scale-150"></i>
                                            </font>
                                        </button>
                                        <button x-show="toSubmit" @click="toSubmit = false" alt="Kill" class="border-blue-500 md:border-green-500">
                                        </button>
                                        <!-- Delete User Modal -->
                                        <div x-show="toSubmit" class="border-double border-2 border-red-500 absolute left-1/4 top-1/2 z-10" aria-labelledby="modal-title" role="dialog" aria-modal="true">
                                            <div class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity"></div>
                                            <div class="modal fixed fade justify-center mr-48 top-72 w-5/12 h-full outline-none overflow-x-hidden overflow-y-auto" id="ModalCenteredScrollable" tabindex="-1" aria-labelledby="ModalCenteredScrollable" aria-modal="true" role="dialog">
                                                <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable relative pointer-events-none w-auto">

                                                    <div class="modal-content border-none shadow-lg relative flex flex-col w-full pointer-events-auto bg-white bg-clip-padding rounded-md outline-none text-current">
                                                        <div class="modal-header flex flex-shrink-0 items-center justify-between p-4 border-b border-gray-200 rounded-t-md">
                                                            <h5 class="text-xl font-medium leading-normal text-gray-800" id="exampleModalCenteredScrollableLabel">
                                                                <b>Confirm Kill Session</b>
                                                            </h5>
                                                            <button type="button" @click="toSubmit = false" class="btn-close box-content w-4 h-4 p-1 text-black border-none rounded-none opacity-50 focus:shadow-none focus:outline-none focus:opacity-100 hover:text-black hover:opacity-75 hover:no-underline" data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                        <div class="modal-body relative p-4">
                                                            <font color="black">Are you sure to kill Session <b><?php echo $value['SPID'] ?></b>?</font>
                                                        </div>
                                                        <div class="modal-footer flex flex-shrink-0 flex-wrap items-center justify-end p-4 border-t border-gray-200 rounded-b-md">
                                                            <form action="<?php echo URLROOT; ?>/monitors/killuser/<?php echo $_SESSION['MonitorDB']; ?>" method="POST">
                                                                <input id="base" name="base" value="usersessions" class="hidden">
                                                                <input id="sid" name="sid" value="<?php echo $value['SID'] ?>" class="hidden">
                                                                <input id="serial" name="serial" value="<?php echo $value['Serial No.'] ?>" class="hidden">
                                                                <button type="submit" class="inline-flex w-full justify-center rounded-md border border-transparent bg-red-700 px-4 py-2 text-base font-medium text-white shadow-sm focus:outline-none focus:ring-2  focus:ring-offset-2 sm:ml-3 sm:w-auto sm:text-sm">Kill</button>
                                                            </form>
                                                            <button type="button" @click="toSubmit = false" class="mt-3 inline-flex w-full justify-center rounded-md border border-gray-300 bg-white px-4 py-2 text-base font-medium text-gray-700 shadow-sm hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 sm:mt-0 sm:ml-3 sm:w-auto sm:text-sm">Cancel</button>
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
        <h1 class="text-white m-auto "><b>No Sessions Found.</b></h1>
    </div>
<?php
            }
?>
</div>


<?php require APPROOT . '/views/inc/footer.php'; ?>