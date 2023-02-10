<?php
$title = 'SGA Target Advisor';
require APPROOT . '/views/inc/header.php';
require APPROOT . '/views/inc/sidebar.php'; ?>

<div class="flex justify-between mb-5">
    <h1 class="text-3xl text-black text-white">
        <a href="<?php echo URLROOT; ?>/homepages/index/<?php echo $_SESSION['PerformanceDB']; ?>" class="no-underline hover:underline">Performance</a> > <b>SGA Target Advisor</b>
    </h1>
    <button onclick="window.location.reload()" class="px-4 py-2 rounded-lg bg-gray-200 hover:bg-gray-500"> Refresh<i class="ml-2 fas fa-redo"></i></button>
</div>

<div class="overflow-x-auto relative shadow-md rounded-lg">
    <div style="height: fit-content; overflow: clip;" class="">
        <div class="block  justify-center w-full shadow-md overflow-auto rounded-lg" style="max-height: 75vh;">
            <?php

            $sgatarget = $data;

            if (!empty($sgatarget)) {

                //Separates Column title from result set
                foreach ($sgatarget as $outer_key => $array) {

                    foreach ($array as $inner_key => $value) {
                        $column_names[] = $inner_key;
                    }
                }
            ?>
                <table class=" sortable w-full text-sm text-center text-white">
                    <thead class="cursor-pointer text-md text-black bg-indigo-200 sticky top-0">
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
                        $i = 1;
                        foreach ($sgatarget as $column_title => $value) {
                        ?>
                            <tr <?php echo 'id="sga_row'.$i.'"  onclick="getpercentage(`sga_row'.$i++.'`, '.$value['Physical Reads'].')" '?> class="transition delay-50 hover:bg-gray-700 cursor-pointer">
                                <?php
                                foreach ($value as $sgavalue) {
                                ?>
                                    <td class="item py-4  px-6" <?php echo $value['Physical Reads'] == $sgavalue ? 'id="preads'.$value['Size Factor'].'"':'';?>>
                                        <?php echo $sgavalue; ?>
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
                <div class="flex w-full shadow-md overflow-auto rounded-lg bg-gray-500" style="max-height: 80%; min-height: 100%;">
                    <h1 class="text-white m-auto "><b>No SGA Target Data Found.</b></h1>
                </div>
            <?php
            }
            ?>
        </div>
    </div>
</div>
<div class="flex justify-end items-center mt-5">
    <div id="gaindisplay-cont" class="hidden rounded-lg shadow-md bg-indigo-200 py-2 px-3">
        <font class="text-sm italic">Gain Potential: <font id="gaindisplay" class="text-lg font-bold"></font></font> 
    </div>
</div>

<?php require APPROOT . '/views/inc/footer.php'; ?>