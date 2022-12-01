<?php
$title = 'Invalid Objects';
require APPROOT . '/views/inc/header.php';
require APPROOT . '/views/inc/sidebar.php'; ?>

<h1 class="text-3xl text-black pb-2 text-white">
    <a href="<?php echo URLROOT; ?>/homepage/dashboard" class="no-underline hover:underline">Objects</a> > <b>Invalid Objects</b>
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
                    <th class="py-2 px-6">OWNER</th>
                        <th class="py-2 px-6">OBJECT_NAME</th>
                        <th class="py-2 px-6">OBJECT_TYPE</th>
                        <th class="py-2 px-6">CREATED</th>
                        <th class="py-2 px-6">TIMESTAMP</th>
                    </tr>
                </thead>
                <tbody class="bg-gray-500">
                    <tr>
                        <td class="py-4 px-6" title="show query">RMS13PRD</td>
                        <td class="py-4 px-6" title="show query">RIB_DSDReceiptDesc_REC</td>
                        <td class="py-4 px-6" title="show query">TYPE BODY</td>
                        <td class="py-4 px-6" title="show query">10-MAR-09</td>
                        <td class="py-4 px-6" title="show query">2010-04-15:10:27:55</td>
                    </tr>
                    <tr>
                        <td class="py-4 px-6" title="show query">RMS13PRD</td>
                        <td class="py-4 px-6" title="show query">RIB_DSDReceiptDesc_REC</td>
                        <td class="py-4 px-6" title="show query">TYPE BODY</td>
                        <td class="py-4 px-6" title="show query">10-MAR-09</td>
                        <td class="py-4 px-6" title="show query">2010-04-15:10:27:55</td>
                    </tr>
                    <tr>
                        <td class="py-4 px-6" title="show query">RMS13PRD</td>
                        <td class="py-4 px-6" title="show query">RIB_DSDReceiptDesc_REC</td>
                        <td class="py-4 px-6" title="show query">TYPE BODY</td>
                        <td class="py-4 px-6" title="show query">10-MAR-09</td>
                        <td class="py-4 px-6" title="show query">2010-04-15:10:27:55</td>
                    </tr>
                    <tr>
                        <td class="py-4 px-6" title="show query">RMS13PRD</td>
                        <td class="py-4 px-6" title="show query">RIB_DSDReceiptDesc_REC</td>
                        <td class="py-4 px-6" title="show query">TYPE BODY</td>
                        <td class="py-4 px-6" title="show query">10-MAR-09</td>
                        <td class="py-4 px-6" title="show query">2010-04-15:10:27:55</td>
                    </tr>
                    <tr>
                        <td class="py-4 px-6" title="show query">RMS13PRD</td>
                        <td class="py-4 px-6" title="show query">RIB_DSDReceiptDesc_REC</td>
                        <td class="py-4 px-6" title="show query">TYPE BODY</td>
                        <td class="py-4 px-6" title="show query">10-MAR-09</td>
                        <td class="py-4 px-6" title="show query">2010-04-15:10:27:55</td>
                    </tr>
                    <tr>
                        <td class="py-4 px-6" title="show query">RMS13PRD</td>
                        <td class="py-4 px-6" title="show query">RIB_DSDReceiptDesc_REC</td>
                        <td class="py-4 px-6" title="show query">TYPE BODY</td>
                        <td class="py-4 px-6" title="show query">10-MAR-09</td>
                        <td class="py-4 px-6" title="show query">2010-04-15:10:27:55</td>
                    </tr>
                    <tr>
                        <td class="py-4 px-6" title="show query">RMS13PRD</td>
                        <td class="py-4 px-6" title="show query">RIB_DSDReceiptDesc_REC</td>
                        <td class="py-4 px-6" title="show query">TYPE BODY</td>
                        <td class="py-4 px-6" title="show query">10-MAR-09</td>
                        <td class="py-4 px-6" title="show query">2010-04-15:10:27:55</td>
                    </tr>
                    <tr>
                        <td class="py-4 px-6" title="show query">RMS13PRD</td>
                        <td class="py-4 px-6" title="show query">RIB_DSDReceiptDesc_REC</td>
                        <td class="py-4 px-6" title="show query">TYPE BODY</td>
                        <td class="py-4 px-6" title="show query">10-MAR-09</td>
                        <td class="py-4 px-6" title="show query">2010-04-15:10:27:55</td>
                    </tr>
                    <tr>
                        <td class="py-4 px-6" title="show query">RMS13PRD</td>
                        <td class="py-4 px-6" title="show query">RIB_DSDReceiptDesc_REC</td>
                        <td class="py-4 px-6" title="show query">TYPE BODY</td>
                        <td class="py-4 px-6" title="show query">10-MAR-09</td>
                        <td class="py-4 px-6" title="show query">2010-04-15:10:27:55</td>
                    </tr>
                    <tr>
                        <td class="py-4 px-6" title="show query">RMS13PRD</td>
                        <td class="py-4 px-6" title="show query">RIB_DSDReceiptDesc_REC</td>
                        <td class="py-4 px-6" title="show query">TYPE BODY</td>
                        <td class="py-4 px-6" title="show query">10-MAR-09</td>
                        <td class="py-4 px-6" title="show query">2010-04-15:10:27:55</td>
                    </tr>
                    <tr>
                        <td class="py-4 px-6" title="show query">RMS13PRD</td>
                        <td class="py-4 px-6" title="show query">RIB_DSDReceiptDesc_REC</td>
                        <td class="py-4 px-6" title="show query">TYPE BODY</td>
                        <td class="py-4 px-6" title="show query">10-MAR-09</td>
                        <td class="py-4 px-6" title="show query">2010-04-15:10:27:55</td>
                    </tr>
                    <tr>
                        <td class="py-4 px-6" title="show query">RMS13PRD</td>
                        <td class="py-4 px-6" title="show query">RIB_DSDReceiptDesc_REC</td>
                        <td class="py-4 px-6" title="show query">TYPE BODY</td>
                        <td class="py-4 px-6" title="show query">10-MAR-09</td>
                        <td class="py-4 px-6" title="show query">2010-04-15:10:27:55</td>
                    </tr>
                    <tr>
                        <td class="py-4 px-6" title="show query">RMS13PRD</td>
                        <td class="py-4 px-6" title="show query">RIB_DSDReceiptDesc_REC</td>
                        <td class="py-4 px-6" title="show query">TYPE BODY</td>
                        <td class="py-4 px-6" title="show query">10-MAR-09</td>
                        <td class="py-4 px-6" title="show query">2010-04-15:10:27:55</td>
                    </tr>
                    <tr>
                        <td class="py-4 px-6" title="show query">RMS13PRD</td>
                        <td class="py-4 px-6" title="show query">RIB_DSDReceiptDesc_REC</td>
                        <td class="py-4 px-6" title="show query">TYPE BODY</td>
                        <td class="py-4 px-6" title="show query">10-MAR-09</td>
                        <td class="py-4 px-6" title="show query">2010-04-15:10:27:55</td>
                    </tr>
                    <tr>
                        <td class="py-4 px-6" title="show query">RMS13PRD</td>
                        <td class="py-4 px-6" title="show query">RIB_DSDReceiptDesc_REC</td>
                        <td class="py-4 px-6" title="show query">TYPE BODY</td>
                        <td class="py-4 px-6" title="show query">10-MAR-09</td>
                        <td class="py-4 px-6" title="show query">2010-04-15:10:27:55</td>
                    </tr>
                    <tr>
                        <td class="py-4 px-6" title="show query">RMS13PRD</td>
                        <td class="py-4 px-6" title="show query">RIB_DSDReceiptDesc_REC</td>
                        <td class="py-4 px-6" title="show query">TYPE BODY</td>
                        <td class="py-4 px-6" title="show query">10-MAR-09</td>
                        <td class="py-4 px-6" title="show query">2010-04-15:10:27:55</td>
                    </tr>
                    <tr>
                        <td class="py-4 px-6" title="show query">RMS13PRD</td>
                        <td class="py-4 px-6" title="show query">RIB_DSDReceiptDesc_REC</td>
                        <td class="py-4 px-6" title="show query">TYPE BODY</td>
                        <td class="py-4 px-6" title="show query">10-MAR-09</td>
                        <td class="py-4 px-6" title="show query">2010-04-15:10:27:55</td>
                    </tr>
                    <tr>
                        <td class="py-4 px-6" title="show query">RMS13PRD</td>
                        <td class="py-4 px-6" title="show query">RIB_DSDReceiptDesc_REC</td>
                        <td class="py-4 px-6" title="show query">TYPE BODY</td>
                        <td class="py-4 px-6" title="show query">10-MAR-09</td>
                        <td class="py-4 px-6" title="show query">2010-04-15:10:27:55</td>
                    </tr>
                    <tr>
                        <td class="py-4 px-6" title="show query">RMS13PRD</td>
                        <td class="py-4 px-6" title="show query">RIB_DSDReceiptDesc_REC</td>
                        <td class="py-4 px-6" title="show query">TYPE BODY</td>
                        <td class="py-4 px-6" title="show query">10-MAR-09</td>
                        <td class="py-4 px-6" title="show query">2010-04-15:10:27:55</td>
                    </tr>
                    <tr>
                        <td class="py-4 px-6" title="show query">RMS13PRD</td>
                        <td class="py-4 px-6" title="show query">RIB_DSDReceiptDesc_REC</td>
                        <td class="py-4 px-6" title="show query">TYPE BODY</td>
                        <td class="py-4 px-6" title="show query">10-MAR-09</td>
                        <td class="py-4 px-6" title="show query">2010-04-15:10:27:55</td>
                    </tr>
                    <tr>
                        <td class="py-4 px-6" title="show query">RMS13PRD</td>
                        <td class="py-4 px-6" title="show query">RIB_DSDReceiptDesc_REC</td>
                        <td class="py-4 px-6" title="show query">TYPE BODY</td>
                        <td class="py-4 px-6" title="show query">10-MAR-09</td>
                        <td class="py-4 px-6" title="show query">2010-04-15:10:27:55</td>
                    </tr>
                    <tr>
                        <td class="py-4 px-6" title="show query">RMS13PRD</td>
                        <td class="py-4 px-6" title="show query">RIB_DSDReceiptDesc_REC</td>
                        <td class="py-4 px-6" title="show query">TYPE BODY</td>
                        <td class="py-4 px-6" title="show query">10-MAR-09</td>
                        <td class="py-4 px-6" title="show query">2010-04-15:10:27:55</td>
                    </tr>
                    <tr>
                        <td class="py-4 px-6" title="show query">RMS13PRD</td>
                        <td class="py-4 px-6" title="show query">RIB_DSDReceiptDesc_REC</td>
                        <td class="py-4 px-6" title="show query">TYPE BODY</td>
                        <td class="py-4 px-6" title="show query">10-MAR-09</td>
                        <td class="py-4 px-6" title="show query">2010-04-15:10:27:55</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>

<?php require APPROOT . '/views/inc/footer.php'; ?>