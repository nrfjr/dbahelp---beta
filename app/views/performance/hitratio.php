<?php
$title = 'Hit Ratio';
require APPROOT . '/views/inc/header.php';
require APPROOT . '/views/inc/sidebar.php'; ?>

<h1 class="text-3xl text-black pb-2 text-white">
    <a href="<?php echo URLROOT; ?>/homepage/dashboard" class="no-underline hover:underline">Performance</a> > <b>Hit Ratio</b>
</h1>

<!--NEWTABBED-->
<div class="overflow-x-auto relative shadow-md ">

    
<div class=" border-b border-gray-200 dark:border-gray-700">
    <ul class="flex flex-wrap -mb-px text-sm font-medium text-center bg-gray-200 rounded-t-lg" id="myTab" data-tabs-toggle="#myTabContent" role="tablist">
        <li class="mr-2" role="presentation">
            <button class="inline-block p-4 rounded-t-lg border-b-2 hover:bg-gray-400" id="profile-tab" data-tabs-target="#profile" type="button" role="tab" aria-controls="profile" aria-selected="false">Data Files Location</button>
        </li>
        <li class="mr-2" role="presentation">
            <button class="inline-block p-4 rounded-t-lg border-b-2 border-transparent hover:bg-gray-400 hover:border-gray-300 dark:hover:text-gray-300" id="dashboard-tab" data-tabs-target="#dashboard" type="button" role="tab" aria-controls="dashboard" aria-selected="false">Redo Log Files Location</button>
        </li>
        <li class="mr-2" role="presentation">
            <button class="inline-block p-4 rounded-t-lg border-b-2 border-transparent hover:bg-gray-400 hover:border-gray-300 dark:hover:text-gray-300" id="settings-tab" data-tabs-target="#settings" type="button" role="tab" aria-controls="settings" aria-selected="false">Control File Location</button>
        </li>
    </ul>
</div>
<div id="myTabContent">
    <div class="hidden p-4 bg-gray-50 rounded-b-lg dark:bg-gray-800 max-h-screen overflow-auto h-full " id="profile" role="tabpanel" aria-labelledby="profile-tab">
        <div class="">
            <div class="block  justify-center w-full shadow-md overflow-auto sm:rounded-lg" style="max-height: 100%;">
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
    </div>
    <div class="hidden p-4 bg-gray-50 rounded-b-lg dark:bg-gray-800 max-h-screen overflow-auto h-full " id="dashboard" role="tabpanel" aria-labelledby="dashboard-tab">
    <div class="">
            <div class="block  justify-center w-full shadow-md overflow-auto sm:rounded-lg" style="max-height: 100%;">
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
    </div>
    <div class="hidden p-4 bg-gray-50 rounded-b-lg dark:bg-gray-800 max-h-screen overflow-auto h-full " id="settings" role="tabpanel" aria-labelledby="settings-tab">
    <div class="">
            <div class="block  justify-center w-full shadow-md overflow-auto sm:rounded-lg" style="max-height: 100%;">
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
</div>

    
</div>
<!--NEWTABBED-->

<?php require APPROOT . '/views/inc/footer.php'; ?>