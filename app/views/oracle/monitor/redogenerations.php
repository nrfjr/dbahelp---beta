<?php
$title = 'Redo Log Generation';
require APPROOT . '/views/inc/header.php';
require APPROOT . '/views/inc/sidebar.php';

$filterPHPArrayToJS = function ($array, $key) {

    foreach ($array as $title => $arrays) {
        echo '\'' . $arrays[$key] . '\',';
    }
};

?>

<div class="flex justify-between mb-5">
    <h1 class="text-3xl text-black text-white">
        <a href="<?php echo URLROOT; ?>/homepages/index/<?php echo $_SESSION['MonitorDB']; ?>" class="no-underline hover:underline">Monitor</a> > <b>Redo Log Generation</b>
    </h1>
    <button onclick="window.location.reload()" class="px-4 py-2 rounded-lg bg-gray-200 hover:bg-gray-500"> Refresh<i class="ml-2 fas fa-redo"></i></button>
</div>

<div class="flex flex-col justify-between h-full gap-y-1" style="max-height:93% ;">
    <div class="flex flex-col">
        <div id="redochart" class="bg-gray-500 rounded-md h-fit">
        </div>
    </div>
    <div class="block justify-center lg:h-full w-full shadow-md overflow-auto sm:rounded-lg lg:max-h-80 xl:max-h-96">
        <?php

        $redogeneration = $data;

        if (!empty($redogeneration)) {

            //Separates Column title from result set
            foreach ($redogeneration as $outer_key => $array) {

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
                    foreach ($redogeneration as $column_title => $value) {
                    ?>
                        <tr class="focus:hover:bg-gray-700 hover:bg-gray-700">
                            <?php
                            foreach ($value as $logfile) {
                            ?>
                                <td class=" item py-4  px-6" title="<?php echo $logfile; ?>">
                                    <?php echo $logfile; ?>
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

<script>
    var options = {
        series: [{
            name: '',
            data: [<?php $filterPHPArrayToJS($data, 'Switch Count'); ?>]
        }],
        chart: {
            fontFamily: 'Lexend',
            height: 350,
            type: 'area',
            foreColor: '#FFFFFF',
            zoom: {
                enabled: false
            }
        },
        colors: ['#4DEEEA'],
        dataLabels: {
            enabled: false
        },
        stroke: {
            curve: 'smooth'
        },
        title: {
            text: '<?php echo $_SESSION['MonitorDB']; ?> Redo Log Switch per Day',
            align: 'left'
        },
        xaxis: {
            categories: [<?php $filterPHPArrayToJS($data, 'Date Generated'); ?>]
        },
        grid: {
            borderColor: '#FFFFFF',
        },
        fill: {
            gradient: {
                enabled: true,
                opacityFrom: 0.55,
                opacityTo: 0
            }
        },
        tooltip: {
            theme: "dark"
        }
    };

    var chart = new ApexCharts(document.querySelector("#redochart"), options);
    chart.render();
</script>

<?php require APPROOT . '/views/inc/footer.php'; ?>