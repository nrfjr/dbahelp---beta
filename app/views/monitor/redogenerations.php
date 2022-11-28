<?php
$title = 'Redo Log Generation';
require APPROOT . '/views/inc/header.php';
require APPROOT . '/views/inc/sidebar.php'; ?>

<h1 class="text-3xl text-black pb-2 text-white">
    <a href="<?php echo URLROOT; ?>/homepage/dashboard" class="no-underline hover:underline">Monitor</a> > <b>Redo Log Generation</b>
</h1>

<div class="grid grid-cols-1 gap-2" style="height: 80vh; overflow: clip;">
    <div class="box">
        <div id="redochart" class="bg-gray-300 rounded-md"></div>
    </div>
    <div class="flex justify-center h-full w-full shadow-md overflow-auto sm:rounded-lg lg:max-h-80 xl:max-h-96" >
        <table class="w-full text-sm text-center text-white dark:text-gray-400">
            <thead class="text-md text-black bg-indigo-200 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th class="py-2 px-6">DATE GENERATED</th>
                    <th class="py-2 px-6">TOTAL LOG SWITCH MADE</th>
                    <th class="py-2 px-6">REDO SIZE PER DAY (MB)</th> 
                </tr>
            </thead>
            <tbody class="bg-gray-500">
                <tr>
                    <td class="py-4 px-6" title="show query">21-JUL-12</td>
                    <td class="py-4 px-6" title="show query">89</td>
                    <td class="py-4 px-6" title="show query">15290</td>
                </tr>
                <tr>
                    <td class="py-4 px-6" title="show query">21-JUL-12</td>
                    <td class="py-4 px-6" title="show query">89</td>
                    <td class="py-4 px-6" title="show query">15290</td>
                </tr>
                <tr>
                    <td class="py-4 px-6" title="show query">21-JUL-12</td>
                    <td class="py-4 px-6" title="show query">89</td>
                    <td class="py-4 px-6" title="show query">15290</td>
                </tr>
                <tr>
                    <td class="py-4 px-6" title="show query">21-JUL-12</td>
                    <td class="py-4 px-6" title="show query">89</td>
                    <td class="py-4 px-6" title="show query">15290</td>
                </tr>
                <tr>
                    <td class="py-4 px-6" title="show query">21-JUL-12</td>
                    <td class="py-4 px-6" title="show query">89</td>
                    <td class="py-4 px-6" title="show query">15290</td>
                </tr>
                <tr>
                    <td class="py-4 px-6" title="show query">21-JUL-12</td>
                    <td class="py-4 px-6" title="show query">89</td>
                    <td class="py-4 px-6" title="show query">15290</td>
                </tr>
                <tr>
                    <td class="py-4 px-6" title="show query">21-JUL-12</td>
                    <td class="py-4 px-6" title="show query">89</td>
                    <td class="py-4 px-6" title="show query">15290</td>
                </tr>
                <tr>
                    <td class="py-4 px-6" title="show query">21-JUL-12</td>
                    <td class="py-4 px-6" title="show query">89</td>
                    <td class="py-4 px-6" title="show query">15290</td>
                </tr>
                <tr>
                    <td class="py-4 px-6" title="show query">21-JUL-12</td>
                    <td class="py-4 px-6" title="show query">89</td>
                    <td class="py-4 px-6" title="show query">15290</td>
                </tr>
                <tr>
                    <td class="py-4 px-6" title="show query">21-JUL-12</td>
                    <td class="py-4 px-6" title="show query">89</td>
                    <td class="py-4 px-6" title="show query">15290</td>
                </tr>
                <tr>
                    <td class="py-4 px-6" title="show query">21-JUL-12</td>
                    <td class="py-4 px-6" title="show query">89</td>
                    <td class="py-4 px-6" title="show query">15290</td>
                </tr>
                <tr>
                    <td class="py-4 px-6" title="show query">21-JUL-12</td>
                    <td class="py-4 px-6" title="show query">89</td>
                    <td class="py-4 px-6" title="show query">15290</td>
                </tr>
                <tr>
                    <td class="py-4 px-6" title="show query">21-JUL-12</td>
                    <td class="py-4 px-6" title="show query">89</td>
                    <td class="py-4 px-6" title="show query">15290</td>
                </tr>
                <tr>
                    <td class="py-4 px-6" title="show query">21-JUL-12</td>
                    <td class="py-4 px-6" title="show query">89</td>
                    <td class="py-4 px-6" title="show query">15290</td>
                </tr>
            </tbody>
        </table>
    </div>
</div>

<script>
    var options = {
          series: [{
            name: "Desktops",
            data: [89, 109, 146, 116, 123, 151, 45, 126, 132]
        }],
          chart: {
          height: '100%',
          type: 'area',
          zoom: {
            enabled: false
          }
        },
        dataLabels: {
          enabled: false
        },
        stroke: {
          curve: 'straight'
        },
        title: {
          text: 'Redo Log Generation per Day',
          align: 'left'
        },
        grid: {
          row: {
            colors: ['#8c8c8c', 'transparent'], // takes an array which will be repeated on columns
            opacity: 0.5
          },
        },
        xaxis: {
          categories: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep'],
        }
        };

        var chart = new ApexCharts(document.querySelector("#redochart"), options);
        chart.render();
</script>

<?php require APPROOT . '/views/inc/footer.php'; ?>