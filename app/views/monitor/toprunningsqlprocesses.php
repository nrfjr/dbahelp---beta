<?php
$title = 'Top SQL';
require APPROOT . '/views/inc/header.php';
require APPROOT . '/views/inc/sidebar.php'; ?>

<h1 class="text-3xl text-black pb-2 text-white">
    <a href="<?php echo URLROOT; ?>/homepages/index/<?php echo $_SESSION['MonitorDB']; ?>" class="no-underline hover:underline">Monitor</a> > <b>Top Running SQL Processes</b>
</h1>

<div class="overflow-x-auto relative shadow-md sm:rounded-lg">
    <div class=" block justify-between items-center p-2 bg-gray-400 dark:bg-gray-900 mb-4">
        <div class="inline-flex">
            <p class="m-2">Username:</p>
            <b class="m-2">Hatsus</b>
        </div>
        <div class="inline-flex">
            <p class="m-2">Program: </p>
            <b class="m-2">Hatsus</b>
        </div>
        <div class="inline-flex">
            <p class="m-2">SPID: </p>
            <input class="m-2" type="text">
        </div>
        <div class="inline-flex">
            <button class="px-4 py-2 rounded-lg bg-gray-200 hover:bg-gray-500">Kill Session</button>
        </div>
        <div class="inline-flex">
            <button class="px-4 py-2 rounded-lg bg-gray-200 hover:bg-gray-500">
                <i class="las la-redo-alt"></i>
            </button>
        </div>
    </div>

    <div style="height: 68vh; overflow: clip;" class="">
        <div class="block  justify-center w-full shadow-md overflow-auto sm:rounded-lg" style="max-height: 100%;">
            <?php

            $topsql = $data;

            if (!empty($topsql)) {

                //Separates Column title from result set
                foreach ($topsql as $outer_key => $array) {

                    foreach ($array as $inner_key => $value) {
                        $column_names[] = $inner_key;
                    }
                }
            ?>
                <table class="w-full text-sm text-center text-white dark:text-gray-400">
                    <thead class="text-md text-black bg-indigo-200 dark:bg-gray-700 dark:text-gray-400">
                        <tr>
                            <?php for ($title = 0; $title <= count($array) - 2; $title++) { ?>
                                <th scope="col" class="py-2 px-6">
                                    <?php if ($column_names[$title] != 'SQLTEXT') {
                                        echo $column_names[$title];
                                    } ?>
                                </th>
                            <?php } ?>
                        </tr>
                    </thead>
                    <tbody class="bg-gray-500">
                        <?php
                        foreach ($topsql as $column_title => $value) {
                        ?>
                            <tr class="focus:hover:bg-gray-700 hover:bg-gray-700" title="<?php echo str_replace('"', "&quot;",$value['SQLTEXT']); ?>">
                                <?php
                                array_splice($value, 9);
                                foreach ($value as $k => $v) {
                                ?>
                                        <td class="py-4 px-6">
                                            <?php echo $v; ?>
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
                    <h1 class="text-white m-auto "><b>No Top Running SQL Process Found.</b></h1>
                </div>
            <?php
            }
            ?>
        </div>
    </div>

</div>

<?php require APPROOT . '/views/inc/footer.php'; ?>
