<?php
$title = 'User Sessions';
require APPROOT . '/views/inc/header.php';
require APPROOT . '/views/inc/sidebar.php'; ?>

<h1 class="text-3xl text-black pb-2 text-white">
    <a href="<?php echo URLROOT; ?>/homepage/dashboard" class="no-underline hover:underline">Monitor</a> > <b>User Sessions</b>
</h1>

<div class="overflow-x-auto relative shadow-md">

    <div class="rounded-lg flex justify-between items-center p-2 bg-gray-300 dark:bg-gray-900 mb-4">
        <div class="inline-flex">
            <p class="m-2">Search: </p>
            <input class="m-2" type="text">
        </div>
        <div class="inline-flex">
            <p class="m-2">Rows Selected:</p>
            <b class="m-2">388</b>
        </div>
        <div class="inline-flex">
            <b>RMS ACTIVE RUNNING ORACLE SESSIONS</b>
        </div>
        <div class="inline-flex">
            <button class="px-4 py-2 rounded-lg bg-gray-400 hover:bg-gray-500">
                Refresh Data
            </button>
        </div>
    </div>

    <div class="rounded-lg flex justify-between items-center p-2 bg-gray-400 dark:bg-gray-900 mb-4">
        <div class="inline-flex">
            <p class="m-2">Username:</p>
            <b class="m-2">Hatsus</b>
        </div>
        <div class="inline-flex">
            <p class="m-2">Status: </p>
            <b class="m-2">Hatsus</b>
        </div>
        <div class="inline-flex">
            <p class="m-2">SPID: </p>
            <input class="m-2" type="text">
        </div>
        <div class="inline-flex">
            <button class="px-4 py-2 rounded-lg bg-gray-200 hover:bg-gray-500">Kill Session</button>
        </div>
    </div>

    <div style="height: 60vh; overflow: clip;" class="">
        <div class="flex  justify-center w-full shadow-md overflow-auto sm:rounded-lg" style="max-height: 100%;">
            <table class="w-full text-sm text-center text-white dark:text-gray-400">
                <thead class="text-md text-black bg-indigo-200 dark:bg-gray-700 dark:text-gray-400">
                    <tr>
                        <th class="py-2 px-6">USERNAME</th>
                        <th class="py-2 px-6">LOGON TIME</th>
                        <th class="py-2 px-6">SID</th> 
                        <th class="py-2 px-6">RUN TIME</th> 
                        <th class="py-2 px-6">SERIAL #</th> 
                        <th class="py-2 px-6">OS USER</th> 
                        <th class="py-2 px-6">SYS PID</th> 
                        <th class="py-2 px-6">PROG EVENT</th>  
                    </tr>
                </thead>
                <tbody class="bg-gray-500">
                    <tr>
                        <td class="py-4 px-6" title="show query"></td>
                        <td class="py-4 px-6" title="show query">28-NOV-2022 4:54 PM</td>
                        <td class="py-4 px-6" title="show query">12805</td>
                        <td class="py-4 px-6" title="show query">0:52:53</td>
                        <td class="py-4 px-6" title="show query">1525</td>
                        <td class="py-4 px-6" title="show query">oracle</td>
                        <td class="py-4 px-6" title="show query">55557221</td>
                        <td class="py-4 px-6" title="show query">firmweb@orapp1prd(TNS V1-V3)</td>
                    </tr>
                    <tr>
                        <td class="py-4 px-6" title="show query"></td>
                        <td class="py-4 px-6" title="show query">28-NOV-2022 4:54 PM</td>
                        <td class="py-4 px-6" title="show query">12805</td>
                        <td class="py-4 px-6" title="show query">0:52:53</td>
                        <td class="py-4 px-6" title="show query">1525</td>
                        <td class="py-4 px-6" title="show query">oracle</td>
                        <td class="py-4 px-6" title="show query">55557221</td>
                        <td class="py-4 px-6" title="show query">firmweb@orapp1prd(TNS V1-V3)</td>
                    </tr>
                    <tr>
                        <td class="py-4 px-6" title="show query"></td>
                        <td class="py-4 px-6" title="show query">28-NOV-2022 4:54 PM</td>
                        <td class="py-4 px-6" title="show query">12805</td>
                        <td class="py-4 px-6" title="show query">0:52:53</td>
                        <td class="py-4 px-6" title="show query">1525</td>
                        <td class="py-4 px-6" title="show query">oracle</td>
                        <td class="py-4 px-6" title="show query">55557221</td>
                        <td class="py-4 px-6" title="show query">firmweb@orapp1prd(TNS V1-V3)</td>
                    </tr>
                    <tr>
                        <td class="py-4 px-6" title="show query"></td>
                        <td class="py-4 px-6" title="show query">28-NOV-2022 4:54 PM</td>
                        <td class="py-4 px-6" title="show query">12805</td>
                        <td class="py-4 px-6" title="show query">0:52:53</td>
                        <td class="py-4 px-6" title="show query">1525</td>
                        <td class="py-4 px-6" title="show query">oracle</td>
                        <td class="py-4 px-6" title="show query">55557221</td>
                        <td class="py-4 px-6" title="show query">firmweb@orapp1prd(TNS V1-V3)</td>
                    </tr>
                    <tr>
                        <td class="py-4 px-6" title="show query"></td>
                        <td class="py-4 px-6" title="show query">28-NOV-2022 4:54 PM</td>
                        <td class="py-4 px-6" title="show query">12805</td>
                        <td class="py-4 px-6" title="show query">0:52:53</td>
                        <td class="py-4 px-6" title="show query">1525</td>
                        <td class="py-4 px-6" title="show query">oracle</td>
                        <td class="py-4 px-6" title="show query">55557221</td>
                        <td class="py-4 px-6" title="show query">firmweb@orapp1prd(TNS V1-V3)</td>
                    </tr>
                    <tr>
                        <td class="py-4 px-6" title="show query"></td>
                        <td class="py-4 px-6" title="show query">28-NOV-2022 4:54 PM</td>
                        <td class="py-4 px-6" title="show query">12805</td>
                        <td class="py-4 px-6" title="show query">0:52:53</td>
                        <td class="py-4 px-6" title="show query">1525</td>
                        <td class="py-4 px-6" title="show query">oracle</td>
                        <td class="py-4 px-6" title="show query">55557221</td>
                        <td class="py-4 px-6" title="show query">firmweb@orapp1prd(TNS V1-V3)</td>
                    </tr>
                    <tr>
                        <td class="py-4 px-6" title="show query"></td>
                        <td class="py-4 px-6" title="show query">28-NOV-2022 4:54 PM</td>
                        <td class="py-4 px-6" title="show query">12805</td>
                        <td class="py-4 px-6" title="show query">0:52:53</td>
                        <td class="py-4 px-6" title="show query">1525</td>
                        <td class="py-4 px-6" title="show query">oracle</td>
                        <td class="py-4 px-6" title="show query">55557221</td>
                        <td class="py-4 px-6" title="show query">firmweb@orapp1prd(TNS V1-V3)</td>
                    </tr>
                    <tr>
                        <td class="py-4 px-6" title="show query"></td>
                        <td class="py-4 px-6" title="show query">28-NOV-2022 4:54 PM</td>
                        <td class="py-4 px-6" title="show query">12805</td>
                        <td class="py-4 px-6" title="show query">0:52:53</td>
                        <td class="py-4 px-6" title="show query">1525</td>
                        <td class="py-4 px-6" title="show query">oracle</td>
                        <td class="py-4 px-6" title="show query">55557221</td>
                        <td class="py-4 px-6" title="show query">firmweb@orapp1prd(TNS V1-V3)</td>
                    </tr>
                    <tr>
                        <td class="py-4 px-6" title="show query"></td>
                        <td class="py-4 px-6" title="show query">28-NOV-2022 4:54 PM</td>
                        <td class="py-4 px-6" title="show query">12805</td>
                        <td class="py-4 px-6" title="show query">0:52:53</td>
                        <td class="py-4 px-6" title="show query">1525</td>
                        <td class="py-4 px-6" title="show query">oracle</td>
                        <td class="py-4 px-6" title="show query">55557221</td>
                        <td class="py-4 px-6" title="show query">firmweb@orapp1prd(TNS V1-V3)</td>
                    </tr>
                    <tr>
                        <td class="py-4 px-6" title="show query"></td>
                        <td class="py-4 px-6" title="show query">28-NOV-2022 4:54 PM</td>
                        <td class="py-4 px-6" title="show query">12805</td>
                        <td class="py-4 px-6" title="show query">0:52:53</td>
                        <td class="py-4 px-6" title="show query">1525</td>
                        <td class="py-4 px-6" title="show query">oracle</td>
                        <td class="py-4 px-6" title="show query">55557221</td>
                        <td class="py-4 px-6" title="show query">firmweb@orapp1prd(TNS V1-V3)</td>
                    </tr>
                    <tr>
                        <td class="py-4 px-6" title="show query"></td>
                        <td class="py-4 px-6" title="show query">28-NOV-2022 4:54 PM</td>
                        <td class="py-4 px-6" title="show query">12805</td>
                        <td class="py-4 px-6" title="show query">0:52:53</td>
                        <td class="py-4 px-6" title="show query">1525</td>
                        <td class="py-4 px-6" title="show query">oracle</td>
                        <td class="py-4 px-6" title="show query">55557221</td>
                        <td class="py-4 px-6" title="show query">firmweb@orapp1prd(TNS V1-V3)</td>
                    </tr>
                    <tr>
                        <td class="py-4 px-6" title="show query"></td>
                        <td class="py-4 px-6" title="show query">28-NOV-2022 4:54 PM</td>
                        <td class="py-4 px-6" title="show query">12805</td>
                        <td class="py-4 px-6" title="show query">0:52:53</td>
                        <td class="py-4 px-6" title="show query">1525</td>
                        <td class="py-4 px-6" title="show query">oracle</td>
                        <td class="py-4 px-6" title="show query">55557221</td>
                        <td class="py-4 px-6" title="show query">firmweb@orapp1prd(TNS V1-V3)</td>
                    </tr>
                    
                </tbody>
            </table>
        </div>
    </div>
    
</div>

<?php require APPROOT . '/views/inc/footer.php'; ?>