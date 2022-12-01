<?php
$title = 'Buffer Cache Advisor';
require APPROOT . '/views/inc/header.php';
require APPROOT . '/views/inc/sidebar.php'; ?>

<h1 class="text-3xl text-black pb-2 text-white">
    <a href="<?php echo URLROOT; ?>/homepage/dashboard" class="no-underline hover:underline">Performance</a> > <b>Buffer Cache Advisor</b>
</h1>

<div class="overflow-x-auto relative shadow-md">

    <!-- <div class="rounded-lg flex justify-between items-center p-2 bg-gray-300 dark:bg-gray-900 mb-4">
        <div class="inline-flex">
            <p class="m-2">Locked Monitor:</p>
            <b class="m-2">23</b>
        </div>
        <div class="inline-flex">
            <p class="m-2">SID: </p>
            <input class="m-2" type="text">
        </div>
        <div class="inline-flex">
            <button class="px-4 py-2 rounded-lg bg-gray-400 hover:bg-gray-500">
                Refresh Data
            </button>
        </div>
    </div> -->

    <div style="height: auto; overflow: clip;" class="">
        <div class="block  justify-center w-full shadow-md overflow-auto sm:rounded-lg" style="max-height: 70vh;">
            <table class="w-full text-sm text-center text-white dark:text-gray-400">
                <thead class="text-md text-black bg-indigo-200 dark:bg-gray-700 dark:text-gray-400">
                    <tr>
                    <th class="py-2 px-6">SIZE_FOR_ESTIMATE</th>
                        <th class="py-2 px-6">SIZE_FACTOR</th>
                        <th class="py-2 px-6">ESTD_PHYSICAL_READS</th>
                    </tr>
                </thead>
                <tbody class="bg-gray-500">
                    <tr>
                        <td class="py-4 px-6" title="show query">272</td>
                        <td class="py-4 px-6" title="show query">0.0955</td>
                        <td class="py-4 px-6" title="show query">1199130041</td>
                    </tr>
                    <tr>
                        <td class="py-4 px-6" title="show query">272</td>
                        <td class="py-4 px-6" title="show query">0.0955</td>
                        <td class="py-4 px-6" title="show query">1199130041</td>
                    </tr>
                    <tr>
                        <td class="py-4 px-6" title="show query">272</td>
                        <td class="py-4 px-6" title="show query">0.0955</td>
                        <td class="py-4 px-6" title="show query">1199130041</td>
                    </tr>
                    <tr>
                        <td class="py-4 px-6" title="show query">272</td>
                        <td class="py-4 px-6" title="show query">0.0955</td>
                        <td class="py-4 px-6" title="show query">1199130041</td>
                    </tr>
                    <tr>
                        <td class="py-4 px-6" title="show query">272</td>
                        <td class="py-4 px-6" title="show query">0.0955</td>
                        <td class="py-4 px-6" title="show query">1199130041</td>
                    </tr>
                    <tr>
                        <td class="py-4 px-6" title="show query">272</td>
                        <td class="py-4 px-6" title="show query">0.0955</td>
                        <td class="py-4 px-6" title="show query">1199130041</td>
                    </tr>
                    <tr>
                        <td class="py-4 px-6" title="show query">272</td>
                        <td class="py-4 px-6" title="show query">0.0955</td>
                        <td class="py-4 px-6" title="show query">1199130041</td>
                    </tr>
                    <tr>
                        <td class="py-4 px-6" title="show query">272</td>
                        <td class="py-4 px-6" title="show query">0.0955</td>
                        <td class="py-4 px-6" title="show query">1199130041</td>
                    </tr>
                    <tr>
                        <td class="py-4 px-6" title="show query">272</td>
                        <td class="py-4 px-6" title="show query">0.0955</td>
                        <td class="py-4 px-6" title="show query">1199130041</td>
                    </tr>
                    <tr>
                        <td class="py-4 px-6" title="show query">272</td>
                        <td class="py-4 px-6" title="show query">0.0955</td>
                        <td class="py-4 px-6" title="show query">1199130041</td>
                    </tr>
                    <tr>
                        <td class="py-4 px-6" title="show query">272</td>
                        <td class="py-4 px-6" title="show query">0.0955</td>
                        <td class="py-4 px-6" title="show query">1199130041</td>
                    </tr>
                    <tr>
                        <td class="py-4 px-6" title="show query">272</td>
                        <td class="py-4 px-6" title="show query">0.0955</td>
                        <td class="py-4 px-6" title="show query">1199130041</td>
                    </tr>
                    <tr>
                        <td class="py-4 px-6" title="show query">272</td>
                        <td class="py-4 px-6" title="show query">0.0955</td>
                        <td class="py-4 px-6" title="show query">1199130041</td>
                    </tr>
                    <tr>
                        <td class="py-4 px-6" title="show query">272</td>
                        <td class="py-4 px-6" title="show query">0.0955</td>
                        <td class="py-4 px-6" title="show query">1199130041</td>
                    </tr>
                    <tr>
                        <td class="py-4 px-6" title="show query">272</td>
                        <td class="py-4 px-6" title="show query">0.0955</td>
                        <td class="py-4 px-6" title="show query">1199130041</td>
                    </tr>
                    <tr>
                        <td class="py-4 px-6" title="show query">272</td>
                        <td class="py-4 px-6" title="show query">0.0955</td>
                        <td class="py-4 px-6" title="show query">1199130041</td>
                    </tr>
                    <tr>
                        <td class="py-4 px-6" title="show query">272</td>
                        <td class="py-4 px-6" title="show query">0.0955</td>
                        <td class="py-4 px-6" title="show query">1199130041</td>
                    </tr>
                    <tr>
                        <td class="py-4 px-6" title="show query">272</td>
                        <td class="py-4 px-6" title="show query">0.0955</td>
                        <td class="py-4 px-6" title="show query">1199130041</td>
                    </tr>
                    <tr>
                        <td class="py-4 px-6" title="show query">272</td>
                        <td class="py-4 px-6" title="show query">0.0955</td>
                        <td class="py-4 px-6" title="show query">1199130041</td>
                    </tr>
                    <tr>
                        <td class="py-4 px-6" title="show query">272</td>
                        <td class="py-4 px-6" title="show query">0.0955</td>
                        <td class="py-4 px-6" title="show query">1199130041</td>
                    </tr>
                    <tr>
                        <td class="py-4 px-6" title="show query">272</td>
                        <td class="py-4 px-6" title="show query">0.0955</td>
                        <td class="py-4 px-6" title="show query">1199130041</td>
                    </tr>
                    <tr>
                        <td class="py-4 px-6" title="show query">272</td>
                        <td class="py-4 px-6" title="show query">0.0955</td>
                        <td class="py-4 px-6" title="show query">1199130041</td>
                    </tr>
                    <tr>
                        <td class="py-4 px-6" title="show query">272</td>
                        <td class="py-4 px-6" title="show query">0.0955</td>
                        <td class="py-4 px-6" title="show query">1199130041</td>
                    </tr>
                    <tr>
                        <td class="py-4 px-6" title="show query">272</td>
                        <td class="py-4 px-6" title="show query">0.0955</td>
                        <td class="py-4 px-6" title="show query">1199130041</td>
                    </tr>
                    <tr>
                        <td class="py-4 px-6" title="show query">272</td>
                        <td class="py-4 px-6" title="show query">0.0955</td>
                        <td class="py-4 px-6" title="show query">1199130041</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>

<?php require APPROOT . '/views/inc/footer.php'; ?>