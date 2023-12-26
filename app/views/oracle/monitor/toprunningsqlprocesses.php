<?php
$title = 'Top SQL';
require APPROOT . '/views/inc/header.php';
require APPROOT . '/views/inc/sidebar.php'; ?>

<div class="flex justify-between mb-5">
    <h1 class="text-3xl text-black text-white">
        <a href="<?php echo URLROOT; ?>/homepages/index/<?php echo $_SESSION['MonitorDB']; ?>" class="no-underline hover:underline">Monitor</a> > <b>Top Running SQL Processes</b>
    </h1>
    <button onclick="window.location.reload()" class="px-4 py-2 rounded-lg bg-gray-200 hover:bg-gray-500"> Refresh<i class="ml-2 fas fa-redo"></i></button>
</div>

<div class="overflow-x-auto relative shadow-md rounded-lg">
    <div style="height: fit-content; overflow: clip;" class="">
        <div class="block  justify-center w-full shadow-md overflow-auto rounded-lg" style="max-height: 75vh;">
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
                <table class=" sortable w-full text-sm text-center text-white ">
                    <thead class="cursor-pointer text-md text-black bg-indigo-200 sticky top-0 z-10">
                        <tr>
                            <?php for ($title = 0; $title <= count($array) - 2; $title++) { ?>
                                <th scope="col" class="py-2 px-6">
                                    <?php if ($column_names[$title] != 'SQLTEXT') {
                                        echo $column_names[$title];
                                    } ?>
                                </th>
                            <?php } ?>
                            <th scope="col" class="py-2 px-6">Action</th>
                        </tr>
                    </thead>
                    <tbody class="bg-gray-500">
                        <?php
                        foreach ($topsql as $column_title => $value) {
                        ?>
                            <tr class="focus:hover:bg-gray-700 hover:bg-gray-700" title="<?php echo str_replace('"', "&quot;", $value['SQLTEXT']); ?>">
                                <?php
                                array_splice($value, 9);
                                foreach ($value as $k => $v) {
                                ?>
                                    <td class=" item py-4  px-6">
                                        <?php echo $v; ?>
                                    </td>
                                <?php
                                }
                                ?>
                                <td class=" item py-4  px-6 text-center">
                                    <div x-data="{toSubmit: false}">
                                        <button @click="toSubmit = true" alt="Kill" class="w-fit h-3/4 rounded-full hover:bg-red-200 border-blue-500 md:border-green-500">
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
                                                                <input id="base" name="base" value="topsql" class="hidden">
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
            <?php
            } else {
            ?>
                <div class="flex w-full shadow-md overflow-auto rounded-lg bg-gray-500" style="max-height: 80%; min-height: 100%;">
                    <h1 class="text-white m-auto "><b>No Top Running SQL Process Found.</b></h1>
                </div>
            <?php
            }
            ?>
        </div>
    </div>

</div>

<?php require APPROOT . '/views/inc/footer.php'; ?>