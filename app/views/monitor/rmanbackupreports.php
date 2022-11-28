<?php
$title = 'RMAN Backup Reports';
require APPROOT . '/views/inc/header.php';
require APPROOT . '/views/inc/sidebar.php'; ?>

<h1 class="text-3xl text-black pb-2 text-white">
    <a href="<?php echo URLROOT; ?>/homepage/dashboard" class="no-underline hover:underline">Monitor</a> > <b>RMAN Backup Reports</b>
</h1>

<div style="height: 68vh; overflow: clip;" class="">
        <div class="flex  justify-center w-full shadow-md overflow-auto sm:rounded-lg" style="max-height: 100%;">
            <table class="w-full text-sm text-center text-white dark:text-gray-400">
                <thead class="text-md text-black bg-indigo-200 dark:bg-gray-700 dark:text-gray-400">
                    <tr>
                        <th class="py-2 px-6">IP</th>
                        <th class="py-2 px-6">HOSTNAME</th>
                        <th class="py-2 px-6">DBNAME</th> 
                        <th class="py-2 px-6">TYPE</th> 
                        <th class="py-2 px-6">STATUS</th> 
                        <th class="py-2 px-6">SIZE</th> 
                        <th class="py-2 px-6">TIME TAKEN (HH:MM)</th> 
                        <th class="py-2 px-6">LAST BACKUP DATE</th>  
                    </tr>
                </thead>
                <tbody class="bg-gray-500">
                    <tr>
                        <td class="py-4 px-6" title="show query">192.168.32.198</td>
                        <td class="py-4 px-6" title="show query">oradb2prd.kccmalls.com</td>
                        <td class="py-4 px-6" title="show query">RDWPRD</td>
                        <td class="py-4 px-6" title="show query">DB FULL</td>
                        <td class="py-4 px-6" title="show query"><font color="green">COMPLETED</font></td>
                        <td class="py-4 px-6" title="show query">4.19T</td>
                        <td class="py-4 px-6" title="show query">02:02</td>
                        <td class="py-4 px-6" title="show query">27-NOV-22</td>
                    </tr>
                    <tr>
                        <td class="py-4 px-6" title="show query">192.168.32.198</td>
                        <td class="py-4 px-6" title="show query">oradb2prd.kccmalls.com</td>
                        <td class="py-4 px-6" title="show query">RDWPRD</td>
                        <td class="py-4 px-6" title="show query">DB FULL</td>
                        <td class="py-4 px-6" title="show query"><font color="green">COMPLETED</font></td>
                        <td class="py-4 px-6" title="show query">4.19T</td>
                        <td class="py-4 px-6" title="show query">02:02</td>
                        <td class="py-4 px-6" title="show query">27-NOV-22</td>
                    </tr>
                    <tr>
                        <td class="py-4 px-6" title="show query">192.168.32.198</td>
                        <td class="py-4 px-6" title="show query">oradb2prd.kccmalls.com</td>
                        <td class="py-4 px-6" title="show query">RDWPRD</td>
                        <td class="py-4 px-6" title="show query">DB FULL</td>
                        <td class="py-4 px-6" title="show query"><font color="green">COMPLETED</font></td>
                        <td class="py-4 px-6" title="show query">4.19T</td>
                        <td class="py-4 px-6" title="show query">02:02</td>
                        <td class="py-4 px-6" title="show query">27-NOV-22</td>
                    </tr>
                    <tr>
                        <td class="py-4 px-6" title="show query">192.168.32.198</td>
                        <td class="py-4 px-6" title="show query">oradb2prd.kccmalls.com</td>
                        <td class="py-4 px-6" title="show query">RDWPRD</td>
                        <td class="py-4 px-6" title="show query">DB FULL</td>
                        <td class="py-4 px-6" title="show query"><font color="green">COMPLETED</font></td>
                        <td class="py-4 px-6" title="show query">4.19T</td>
                        <td class="py-4 px-6" title="show query">02:02</td>
                        <td class="py-4 px-6" title="show query">27-NOV-22</td>
                    </tr>
                    <tr>
                        <td class="py-4 px-6" title="show query">192.168.32.198</td>
                        <td class="py-4 px-6" title="show query">oradb2prd.kccmalls.com</td>
                        <td class="py-4 px-6" title="show query">RDWPRD</td>
                        <td class="py-4 px-6" title="show query">DB FULL</td>
                        <td class="py-4 px-6" title="show query"><font color="green">COMPLETED</font></td>
                        <td class="py-4 px-6" title="show query">4.19T</td>
                        <td class="py-4 px-6" title="show query">02:02</td>
                        <td class="py-4 px-6" title="show query">27-NOV-22</td>
                    </tr>
                    <tr>
                        <td class="py-4 px-6" title="show query">192.168.32.198</td>
                        <td class="py-4 px-6" title="show query">oradb2prd.kccmalls.com</td>
                        <td class="py-4 px-6" title="show query">RDWPRD</td>
                        <td class="py-4 px-6" title="show query">DB FULL</td>
                        <td class="py-4 px-6" title="show query"><font color="green">COMPLETED</font></td>
                        <td class="py-4 px-6" title="show query">4.19T</td>
                        <td class="py-4 px-6" title="show query">02:02</td>
                        <td class="py-4 px-6" title="show query">27-NOV-22</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>

<?php require APPROOT . '/views/inc/footer.php'; ?>