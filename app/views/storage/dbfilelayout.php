<?php
$title = 'Database File Layout';
require APPROOT . '/views/inc/header.php';
require APPROOT . '/views/inc/sidebar.php'; ?>

<h1 class="text-3xl text-black pb-2 text-white">
    <a href="<?php echo URLROOT; ?>/homepage/dashboard" class="no-underline hover:underline">Storage</a> > <b>Database File Layout</b>
</h1>

<div class="overflow-x-auto relative shadow-md ">

    <div class="rounded-lg flex justify-between items-center p-2 bg-gray-300 dark:bg-gray-900 mb-4">
        <div class="inline-flex w-1/2">
            <b>RMS Database Structure</b>
        </div>
    </div>

    
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
                        <th class="py-2 px-6">FILE_ID</th>
                            <th class="py-2 px-6">TABLESPACE_NAME</th>
                            <th class="py-2 px-6">FILE_NAME</th>
                            <th class="py-2 px-6">STATUS</th> 
                        </tr>
                    </thead>
                    <tbody class="bg-gray-500">
                        <tr>
                            <td class="py-4 px-6" title="show query">27</td>
                            <td class="py-4 px-6" title="show query">APEX_FS_TBS</td>
                            <td class="py-4 px-6" title="show query">/u04/oracle/rmsdata/RMSPRD/oradata/APEXFS_TBS.dbf</td>
                            <td class="py-4 px-6" title="show query">AVAILABLE</td>
                        </tr>
                        <tr>
                            <td class="py-4 px-6" title="show query">27</td>
                            <td class="py-4 px-6" title="show query">APEX_FS_TBS</td>
                            <td class="py-4 px-6" title="show query">/u04/oracle/rmsdata/RMSPRD/oradata/APEXFS_TBS.dbf</td>
                            <td class="py-4 px-6" title="show query">AVAILABLE</td>
                        </tr>
                        <tr>
                            <td class="py-4 px-6" title="show query">27</td>
                            <td class="py-4 px-6" title="show query">APEX_FS_TBS</td>
                            <td class="py-4 px-6" title="show query">/u04/oracle/rmsdata/RMSPRD/oradata/APEXFS_TBS.dbf</td>
                            <td class="py-4 px-6" title="show query">AVAILABLE</td>
                        </tr>
                        <tr>
                            <td class="py-4 px-6" title="show query">27</td>
                            <td class="py-4 px-6" title="show query">APEX_FS_TBS</td>
                            <td class="py-4 px-6" title="show query">/u04/oracle/rmsdata/RMSPRD/oradata/APEXFS_TBS.dbf</td>
                            <td class="py-4 px-6" title="show query">AVAILABLE</td>
                        </tr>
                        <tr>
                            <td class="py-4 px-6" title="show query">27</td>
                            <td class="py-4 px-6" title="show query">APEX_FS_TBS</td>
                            <td class="py-4 px-6" title="show query">/u04/oracle/rmsdata/RMSPRD/oradata/APEXFS_TBS.dbf</td>
                            <td class="py-4 px-6" title="show query">AVAILABLE</td>
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
                            <th class="py-2 px-6">GROUP_NUM</th>
                            <th class="py-2 px-6">MEMBER</th>
                        </tr>
                    </thead>
                    <tbody class="bg-gray-500">
                        <tr>
                            <td class="py-4 px-6" title="show query">1</td>
                            <td class="py-4 px-6" title="show query">/u04/oracle/rmsdata/RMSPRD/oraredo/redo1a.log</td>
                        </tr>
                        <tr>
                            <td class="py-4 px-6" title="show query">1</td>
                            <td class="py-4 px-6" title="show query">/u04/oracle/rmsdata/RMSPRD/oraredo/redo1a.log</td>
                        </tr>
                        <tr>
                            <td class="py-4 px-6" title="show query">1</td>
                            <td class="py-4 px-6" title="show query">/u04/oracle/rmsdata/RMSPRD/oraredo/redo1a.log</td>
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
                            <th class="py-2 px-6">NAME</th>
                        </tr>
                    </thead>
                    <tbody class="bg-gray-500">
                        <tr>
                            <td class="py-4 px-6" title="show query">/u02/oracle/rmsdata/RMSPRD/oractl/control01.ctl</td>
                        </tr>
                        <tr>
                            <td class="py-4 px-6" title="show query">/u02/oracle/rmsdata/RMSPRD/oractl/control01.ctl</td>
                        </tr>
                        <tr>
                            <td class="py-4 px-6" title="show query">/u02/oracle/rmsdata/RMSPRD/oractl/control01.ctl</td>
                        </tr>
                        <tr>
                            <td class="py-4 px-6" title="show query">/u02/oracle/rmsdata/RMSPRD/oractl/control01.ctl</td>
                        </tr>
                        <tr>
                            <td class="py-4 px-6" title="show query">/u02/oracle/rmsdata/RMSPRD/oractl/control01.ctl</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

    
</div>

<?php require APPROOT . '/views/inc/footer.php'; ?>