<?php
$title = 'Hit Ratio';
require APPROOT . '/views/inc/header.php';
require APPROOT . '/views/inc/sidebar.php'; ?>

<h1 class="text-3xl text-black pb-2 text-white">
    <a href="<?php echo URLROOT; ?>/homepage/dashboard" class="no-underline hover:underline">Performance</a> > <b>Hit Ratio</b>
</h1>

<div class="flex grid grid-cols-1 lg:grid-cols-2 gap-y-4 gap-2" >
    <div class="h-auto xl:h-72 overflow-hidden lg:col-span-2">
        <h1 class="text-white">Buffer Cache Hit Ratio</h1>
        <div class="flex  justify-center w-full shadow-md overflow-auto sm:rounded-lg" style="max-height: 93%;">
            <table class="w-full text-sm text-center text-white dark:text-gray-400">
                <thead class="text-md text-black bg-indigo-200 dark:bg-gray-700 dark:text-gray-400">
                    <tr>
                        <th class="py-2 px-6">CONSIS_GETS</th>
                        <th class="py-2 px-6">DB_BLK_GETS</th>
                        <th class="py-2 px-6">PHYS_READS</th>
                        <th class="py-2 px-6">HIT_RATIO</th>
                    </tr>
                </thead>
                <tbody class="bg-gray-500">
                    <tr>
                        <td class="py-4 px-6" title="show query">15/JUL</td>
                        <td class="py-4 px-6" title="show query">000</td>
                        <td class="py-4 px-6" title="show query">000</td>
                        <td class="py-4 px-6" title="show query">000</td>
                    </tr>
                    <tr>
                        <td class="py-4 px-6" title="show query">15/JUL</td>
                        <td class="py-4 px-6" title="show query">000</td>
                        <td class="py-4 px-6" title="show query">000</td>
                        <td class="py-4 px-6" title="show query">000</td>
                    </tr>
                    <tr>
                        <td class="py-4 px-6" title="show query">15/JUL</td>
                        <td class="py-4 px-6" title="show query">000</td>
                        <td class="py-4 px-6" title="show query">000</td>
                        <td class="py-4 px-6" title="show query">000</td>
                    </tr>
                    <tr>
                        <td class="py-4 px-6" title="show query">15/JUL</td>
                        <td class="py-4 px-6" title="show query">000</td>
                        <td class="py-4 px-6" title="show query">000</td>
                        <td class="py-4 px-6" title="show query">000</td>
                    </tr>
                    <tr>
                        <td class="py-4 px-6" title="show query">15/JUL</td>
                        <td class="py-4 px-6" title="show query">000</td>
                        <td class="py-4 px-6" title="show query">000</td>
                        <td class="py-4 px-6" title="show query">000</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>

    <div class="h-auto xl:h-72 overflow-hidden">
        <h1 class="text-white">Data Dictionary Hit Ratio</h1>
        <div class="flex  justify-center w-full shadow-md overflow-auto sm:rounded-lg" style="max-height: 93%;">
            <table class="w-full text-sm text-center text-white dark:text-gray-400">
                <thead class="text-md text-black bg-indigo-200 dark:bg-gray-700 dark:text-gray-400">
                    <tr>
                        <th class="py-2 px-6">DATA_DICT_GETS</th>
                        <th class="py-2 px-6">CACHE_MISSES</th>
                        <th class="py-2 px-6">DICT_HIT_RATIO</th>
                    </tr>
                </thead>
                <tbody class="bg-gray-500">
                    <tr>
                        <td class="py-4 px-6" title="show query">380386201</td>
                        <td class="py-4 px-6" title="show query">320278</td>
                        <td class="py-4 px-6" title="show query">99</td>
                    </tr>
                    <tr>
                        <td class="py-4 px-6" title="show query">380386201</td>
                        <td class="py-4 px-6" title="show query">320278</td>
                        <td class="py-4 px-6" title="show query">99</td>
                    </tr>
                    <tr>
                        <td class="py-4 px-6" title="show query">380386201</td>
                        <td class="py-4 px-6" title="show query">320278</td>
                        <td class="py-4 px-6" title="show query">99</td>
                    </tr>
                    <tr>
                        <td class="py-4 px-6" title="show query">380386201</td>
                        <td class="py-4 px-6" title="show query">320278</td>
                        <td class="py-4 px-6" title="show query">99</td>
                    </tr>
                    <tr>
                        <td class="py-4 px-6" title="show query">380386201</td>
                        <td class="py-4 px-6" title="show query">320278</td>
                        <td class="py-4 px-6" title="show query">99</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>

    <div class="h-auto xl:h-72 overflow-hidden">
        <h1 class="text-white">Library Cache Miss Ratio</h1>
        <div class="flex  justify-center w-full shadow-md overflow-auto sm:rounded-lg" style="max-height: 93%;">
            <table class="w-full text-sm text-center text-white dark:text-gray-400">
                <thead class="text-md text-black bg-indigo-200 dark:bg-gray-700 dark:text-gray-400">
                    <tr>
                        <th class="py-2 px-6">EXECUTIONS</th>
                        <th class="py-2 px-6">CACHE_MISS</th>
                        <th class="py-2 px-6">MISS_RATIO</th>
                    </tr>
                </thead>
                <tbody class="bg-gray-500">
                    <tr>
                        <td class="py-4 px-6" title="show query">221353526</td>
                        <td class="py-4 px-6" title="show query">210284</td>
                        <td class="py-4 px-6" title="show query">0.0009</td>
                    </tr>
                    <tr>
                        <td class="py-4 px-6" title="show query">221353526</td>
                        <td class="py-4 px-6" title="show query">210284</td>
                        <td class="py-4 px-6" title="show query">0.0009</td>
                    </tr>
                    <tr>
                        <td class="py-4 px-6" title="show query">221353526</td>
                        <td class="py-4 px-6" title="show query">210284</td>
                        <td class="py-4 px-6" title="show query">0.0009</td>
                    </tr>
                    <tr>
                        <td class="py-4 px-6" title="show query">221353526</td>
                        <td class="py-4 px-6" title="show query">210284</td>
                        <td class="py-4 px-6" title="show query">0.0009</td>
                    </tr>
                    <tr>
                        <td class="py-4 px-6" title="show query">221353526</td>
                        <td class="py-4 px-6" title="show query">210284</td>
                        <td class="py-4 px-6" title="show query">0.0009</td>
                    </tr>
                    <tr>
                        <td class="py-4 px-6" title="show query">221353526</td>
                        <td class="py-4 px-6" title="show query">210284</td>
                        <td class="py-4 px-6" title="show query">0.0009</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>

</div>

<?php require APPROOT . '/views/inc/footer.php'; ?>