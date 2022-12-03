<?php
$title = 'Redo Log File Switches';
require APPROOT . '/views/inc/header.php';
require APPROOT . '/views/inc/sidebar.php'; ?>

<h1 class="text-3xl text-black pb-2 text-white">
    <a href="<?php echo URLROOT; ?>/homepages/index/<?php echo $_SESSION['MonitorDB']; ?>" class="no-underline hover:underline">Monitor</a> > <b>Redo Log File Switches</b>
</h1>

<div class="flex grid grid-cols-1 gap-y-4">
    <div class="h-auto xl:h-72 overflow-hidden">
        <h1 class="text-white">Morning Log File Switches Within a Week</h1>
        <div class="block  justify-center w-full shadow-md overflow-auto sm:rounded-lg" style="max-height: 93%;">
            <?php

            $am_redologfile = $data['AM'];

            if (!empty($am_redologfile)) {

                //Separates Column title from result set
                foreach ($am_redologfile as $am_outer_key => $am_array) {

                    foreach ($am_array as $am_inner_key => $am_value) {
                        $am_column_names[] = $am_inner_key;
                    }
                }
            ?>
                <table class="w-full text-sm text-center text-white dark:text-gray-400">
                    <thead class="text-md text-black bg-indigo-200 dark:bg-gray-700 dark:text-gray-400">
                        <tr>
                            <?php for ($am_title = 0; $am_title <= count($am_array) - 1; $am_title++) { ?>
                                <th scope="col" class="py-2 px-6">
                                    <?php echo $am_column_names[$am_title]; ?>
                                </th>
                            <?php } ?>
                        </tr>
                    </thead>
                    <tbody class="bg-gray-500">
                        <?php
                        foreach ($am_redologfile as $am_column_title => $am_value) {
                        ?>
                            <tr>
                                <?php
                                foreach ($am_value as $am_logfile) {
                                ?>
                                    <td class="py-4 px-6">
                                        <?php echo $am_logfile; ?>
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
                    <h1 class="text-white m-auto "><b>No Morning Log File Switches Found.</b></h1>
                </div>
            <?php
            }
            ?>
        </div>
    </div>

    <div class="h-auto xl:h-72 overflow-hidden">
        <h1 class="text-white">Evening Log File Switches Within a Week</h1>
        <div class="block  justify-center w-full shadow-md overflow-auto sm:rounded-lg" style="max-height: 93%;">
            <?php

            $pm_redologfile = $data['PM'];

            if (!empty($pm_redologfile)) {

                //Separates Column title from result set
                foreach ($pm_redologfile as $pm_outer_key => $pm_array) {

                    foreach ($pm_array as $pm_inner_key => $pm_value) {
                        $pm_column_names[] = $pm_inner_key;
                    }
                }
            ?>
                <table class="w-full text-sm text-center text-white dark:text-gray-400">
                    <thead class="text-md text-black bg-indigo-200 dark:bg-gray-700 dark:text-gray-400">
                        <tr>
                            <?php for ($pm_title = 0; $pm_title <= count($pm_array) - 1; $pm_title++) { ?>
                                <th scope="col" class="py-2 px-6">
                                    <?php echo $pm_column_names[$pm_title]; ?>
                                </th>
                            <?php } ?>
                        </tr>
                    </thead>
                    <tbody class="bg-gray-500">
                        <?php
                        foreach ($pm_redologfile as $pm_column_title => $pm_value) {
                        ?>
                            <tr>
                                <?php
                                foreach ($pm_value as $pm_logfile) {
                                ?>
                                    <td class="py-4 px-6">
                                        <?php echo $pm_logfile; ?>
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
                    <h1 class="text-white m-auto "><b>No Evening Log File Switches Found.</b></h1>
                </div>
            <?php
            }
            ?>
    </div>
</div>


<?php require APPROOT . '/views/inc/footer.php'; ?>