<?php
$title = 'Redo Log Generation';
require APPROOT . '/views/inc/header.php';
require APPROOT . '/views/inc/sidebar.php'; ?>

<div class="flex justify-between mb-2">
    <h1 class="text-3xl text-black text-white">
        <a href="<?php echo URLROOT; ?>/homepages/index/<?php echo $_SESSION['MonitorDB']; ?>" class="no-underline hover:underline">Monitor</a> > <b>Redo Log Generation</b>
    </h1>
    <button type="submit" class="px-4 py-2 rounded-lg bg-gray-300 hover:bg-gray-500 shadow-inner shadow-xl">
                Refresh Data
            </button>
</div>

<div class="flex flex-col justify-between h-full gap-y-1" style="max-height:93% ;">
    <div class="flex flex-col gap-y-1">
        
            
        
        <div id="redochart" class="bg-gray-300 rounded-md h-fit"></div>
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
            <table class="w-full text-sm text-center text-white dark:text-gray-400">
                <thead class="text-md text-black bg-indigo-200 dark:bg-gray-700 dark:text-gray-400">
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
                                <td class="py-4 px-6" title="<?php echo $logfile; ?>">
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
            data: [1086, 624, 1540, 1498, 1634, 1138, 1448, 1894, 1288, 1208, 842]
        }],
        chart: {
            height: '300px',
            type: 'area',
            zoom: {
                enabled: false
            }
        },
        dataLabels: {
            enabled: false
        },
        stroke: {
            curve: 'smooth'
        },
        title: {
            text: '<?php echo $_SESSION['MonitorDB']; ?> Redo Log Generation per Day',
            align: 'left'
        },
        grid: {
            row: {
                colors: ['#8c8c8c', 'transparent'], // takes an array which will be repeated on columns
                opacity: 0.5
            },
        },
        xaxis: {
            categories: ['19-NOV-22', '20-NOV-22', '21-NOV-22', '22-NOV-22', '23-NOV-22', '24-NOV-22', '25-NOV-22', '26-NOV-22', '27-NOV-22', '28-NOV-22', '29-NOV-22'],
        }
    };

    var chart = new ApexCharts(document.querySelector("#redochart"), options);
    chart.render();
</script>

<?php require APPROOT . '/views/inc/footer.php'; ?>
