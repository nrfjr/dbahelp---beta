<?php
$title = 'Database File Layout';
require APPROOT . '/views/inc/header.php';
require APPROOT . '/views/inc/sidebar.php';

$current_tab = isset($_GET['tab']) ? $_GET['tab'] : 1;

$setTabSelected = function ($tabIndex, $current_tab) {

    if ($current_tab == $tabIndex) {
        echo 'true';
    } else {
        echo 'false';
    }
};

?>

<div class="flex justify-between mb-5">
    <h1 class="text-3xl text-black text-white">
        <a href="<?php echo URLROOT; ?>/homepages/index/<?php echo $_SESSION['StorageDB']; ?>" class="no-underline hover:underline">Storage</a> > <b>Database File Layout</b>
    </h1>
    <a href="<?php echo URLROOT; ?>/storages/dbfilelayout/<?php echo $_SESSION['StorageDB'] ?>?tab=<?php echo $current_tab; ?>"><button class="px-4 py-2 rounded-lg bg-gray-200 hover:bg-gray-500"> Refresh
            <i class="las la-redo-alt"></i>
        </button>
    </a>
</div>

<div class="overflow-x-auto relative shadow-md ">

    <div class="rounded-lg flex justify-between items-center p-2 bg-gray-300 dark:bg-gray-900 mb-4">
        <div class="inline-flex w-1/2">
            <b><?php echo $_SESSION['StorageDB'] ?> Structure</b>
        </div>
    </div>


    <div class=" border-b border-gray-200 dark:border-gray-700">
        <ul class="flex flex-wrap -mb-px text-sm font-medium text-center bg-gray-200 rounded-t-lg" id="myTab" data-tabs-toggle="#myTabContent" role="tablist">
            <li class="mr-2" role="presentation">
                <a href="?tab=1"><button class="inline-block p-4 rounded-t-lg border-b-2 hover:bg-gray-400" id="datafiles-tab" data-tabs-target="#datafiles" type="button" role="tab" aria-controls="datafiles" aria-selected="<?php $setTabSelected(1, $current_tab) ?>">Data Files Location</button></a>
            </li>
            <li class="mr-2" role="presentation">
                <a href="?tab=2"><button class="inline-block p-4 rounded-t-lg border-b-2 border-transparent hover:bg-gray-400 hover:border-gray-300 dark:hover:text-gray-300" id="logfiles-tab" data-tabs-target="#logfiles" type="button" role="tab" aria-controls="logfiles" aria-selected="<?php $setTabSelected(2, $current_tab) ?>">Redo Log Files Location</button></a>
            </li>
            <li class="mr-2" role="presentation">
                <a href="?tab=3"><button class="inline-block p-4 rounded-t-lg border-b-2 border-transparent hover:bg-gray-400 hover:border-gray-300 dark:hover:text-gray-300" id="controlfiles-tab" data-tabs-target="#controlfiles" type="button" role="tab" aria-controls="controlfiles" aria-selected="<?php $setTabSelected(3, $current_tab) ?>">Control File Location</button></a>
            </li>
        </ul>
    </div>

    <div id="myTabContent">
        <?php
        foreach ($data as $title => $array) {
        ?>
            <div class="hidden p-4 bg-gray-50 rounded-b-lg dark:bg-gray-800 max-h-screen overflow-auto h-full " id="<?php echo $title; ?>" role="tabpanel" aria-labelledby="<?php echo $title; ?>-tab">
                <div class="">
                    <div class="block  justify-center w-full shadow-md overflow-auto sm:rounded-lg" style="max-height: 100%;">
                        <?php

                        if (!empty($array)) {

                            //Separates Column title from result set
                            foreach ($array as $outer_key => $inner_array) {

                                foreach ($inner_array as $inner_key => $value) {
                                    $column_names[] = $inner_key;
                                }
                            }
                        ?>
                            <table class="w-full text-sm text-center text-white dark:text-gray-400">
                                <thead class="text-md text-black bg-indigo-200 dark:bg-gray-700 dark:text-gray-400">
                                    <tr>
                                        <?php for ($title = 0; $title <= count($inner_array) - 1; $title++) { ?>
                                            <th scope="col" class="py-2 px-6">
                                                <?php echo $column_names[$title]; ?>
                                            </th>
                                        <?php
                                        }
                                        $column_names = [];
                                        ?>
                                    </tr>
                                </thead>
                                <tbody class="bg-gray-500">
                                    <?php
                                    foreach ($array as $column_title => $values) {
                                    ?>
                                        <tr class="focus:hover:bg-gray-700 hover:bg-gray-700">
                                            <?php
                                            foreach ($values as $ratios) {
                                            ?>
                                                <td class="py-4 px-6">
                                                    <?php echo $ratios; ?>
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
                        <?php
                        } else {
                        ?>
                            <div class="flex w-full shadow-md overflow-auto sm:rounded-lg bg-gray-500" style="max-height: 80%; min-height: 100%;">
                                <h1 class="text-white m-auto "><b>No <?php echo strtoupper($title[0]) . substr($title, 1); ?> Found.</b></h1>
                            </div>
                        <?php
                        }
                        ?>
                    </div>
                </div>
            </div>
        <?php
        }
        ?>
    </div>
</div>


<?php require APPROOT . '/views/inc/footer.php'; ?>