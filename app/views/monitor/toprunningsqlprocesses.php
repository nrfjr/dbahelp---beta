<?php
$title = 'Top SQL';
require APPROOT . '/views/inc/header.php';
require APPROOT . '/views/inc/sidebar.php'; ?>

<h1 class="text-3xl text-black pb-2 text-white">
    <a href="<?php echo URLROOT; ?>/homepage/dashboard" class="no-underline hover:underline">Monitor</a> > <b>Top Running SQL Processes</b>
</h1>

<div class="overflow-x-auto relative shadow-md sm:rounded-lg">
    <div class=" flex justify-between items-center p-2 bg-gray-400 dark:bg-gray-900 mb-4">
        <div class="inline-flex">
            <p class="m-2">Username:</p>
            <b class="m-2">Hatsus</b>
        </div>
        <div class="inline-flex">
            <p class="m-2">Program: </p>
            <b class="m-2">Hatsus</b>
        </div>
        <div class="inline-flex">
            <p class="m-2">SPID: </p>
            <input class="m-2" type="text">
        </div>
        <div class="inline-flex">
            <button class="px-4 py-2 rounded-lg bg-gray-200 hover:bg-gray-500">Kill Session</button>
        </div>
        <div class="inline-flex">
            <button class="px-4 py-2 rounded-lg bg-gray-200 hover:bg-gray-500">
                <i class="las la-redo-alt"></i>
            </button>
        </div>
    </div>

    <div style="height: 68vh; overflow: clip;" class="">
        <div class="flex  justify-center w-full shadow-md overflow-auto sm:rounded-lg" style="max-height: 100%;">
            <table class="w-full text-sm text-center text-white dark:text-gray-400">
                <thead class="text-md text-black bg-indigo-200 dark:bg-gray-700 dark:text-gray-400">
                    <tr>
                        <th class="py-2 px-6">SID</th>
                        <th class="py-2 px-6">SERIAL #</th>
                        <th class="py-2 px-6">SPID</th> 
                        <th class="py-2 px-6">MACHINE</th> 
                        <th class="py-2 px-6">USERNAME</th> 
                        <th class="py-2 px-6">OS USER</th> 
                        <th class="py-2 px-6">PROGRAM</th> 
                        <th class="py-2 px-6">ELAPSED TIME</th>  
                    </tr>
                </thead>
                <tbody class="bg-gray-500">
                    <tr>
                        <td class="py-4 px-6" title="show query">60689</td>
                        <td class="py-4 px-6" title="show query">13164</td>
                        <td class="py-4 px-6" title="show query">52616251</td>
                        <td class="py-4 px-6" title="show query">WORKGROUP/ME</td>
                        <td class="py-4 px-6" title="show query">RMS13PRD</td>
                        <td class="py-4 px-6" title="show query">SYSTEM</td>
                        <td class="py-4 px-6" title="show query">httpd.exe</td>
                        <td class="py-4 px-6" title="show query">125125123</td>
                    </tr>
                    <tr>
                        <td class="py-4 px-6" title="show query">60689</td>
                        <td class="py-4 px-6" title="show query">13164</td>
                        <td class="py-4 px-6" title="show query">52616251</td>
                        <td class="py-4 px-6" title="show query">WORKGROUP/ME</td>
                        <td class="py-4 px-6" title="show query">RMS13PRD</td>
                        <td class="py-4 px-6" title="show query">SYSTEM</td>
                        <td class="py-4 px-6" title="show query">httpd.exe</td>
                        <td class="py-4 px-6" title="show query">125125123</td>
                    </tr>
                    <tr>
                        <td class="py-4 px-6" title="show query">60689</td>
                        <td class="py-4 px-6" title="show query">13164</td>
                        <td class="py-4 px-6" title="show query">52616251</td>
                        <td class="py-4 px-6" title="show query">WORKGROUP/ME</td>
                        <td class="py-4 px-6" title="show query">RMS13PRD</td>
                        <td class="py-4 px-6" title="show query">SYSTEM</td>
                        <td class="py-4 px-6" title="show query">httpd.exe</td>
                        <td class="py-4 px-6" title="show query">125125123</td>
                    </tr>
                    <tr>
                        <td class="py-4 px-6" title="show query">60689</td>
                        <td class="py-4 px-6" title="show query">13164</td>
                        <td class="py-4 px-6" title="show query">52616251</td>
                        <td class="py-4 px-6" title="show query">WORKGROUP/ME</td>
                        <td class="py-4 px-6" title="show query">RMS13PRD</td>
                        <td class="py-4 px-6" title="show query">SYSTEM</td>
                        <td class="py-4 px-6" title="show query">httpd.exe</td>
                        <td class="py-4 px-6" title="show query">125125123</td>
                    </tr>
                    <tr>
                        <td class="py-4 px-6" title="show query">60689</td>
                        <td class="py-4 px-6" title="show query">13164</td>
                        <td class="py-4 px-6" title="show query">52616251</td>
                        <td class="py-4 px-6" title="show query">WORKGROUP/ME</td>
                        <td class="py-4 px-6" title="show query">RMS13PRD</td>
                        <td class="py-4 px-6" title="show query">SYSTEM</td>
                        <td class="py-4 px-6" title="show query">httpd.exe</td>
                        <td class="py-4 px-6" title="show query">125125123</td>
                    </tr>
                    <tr>
                        <td class="py-4 px-6" title="show query">60689</td>
                        <td class="py-4 px-6" title="show query">13164</td>
                        <td class="py-4 px-6" title="show query">52616251</td>
                        <td class="py-4 px-6" title="show query">WORKGROUP/ME</td>
                        <td class="py-4 px-6" title="show query">RMS13PRD</td>
                        <td class="py-4 px-6" title="show query">SYSTEM</td>
                        <td class="py-4 px-6" title="show query">httpd.exe</td>
                        <td class="py-4 px-6" title="show query">125125123</td>
                    </tr>
                    <tr>
                        <td class="py-4 px-6" title="show query">60689</td>
                        <td class="py-4 px-6" title="show query">13164</td>
                        <td class="py-4 px-6" title="show query">52616251</td>
                        <td class="py-4 px-6" title="show query">WORKGROUP/ME</td>
                        <td class="py-4 px-6" title="show query">RMS13PRD</td>
                        <td class="py-4 px-6" title="show query">SYSTEM</td>
                        <td class="py-4 px-6" title="show query">httpd.exe</td>
                        <td class="py-4 px-6" title="show query">125125123</td>
                    </tr>
                    <tr>
                        <td class="py-4 px-6" title="show query">60689</td>
                        <td class="py-4 px-6" title="show query">13164</td>
                        <td class="py-4 px-6" title="show query">52616251</td>
                        <td class="py-4 px-6" title="show query">WORKGROUP/ME</td>
                        <td class="py-4 px-6" title="show query">RMS13PRD</td>
                        <td class="py-4 px-6" title="show query">SYSTEM</td>
                        <td class="py-4 px-6" title="show query">httpd.exe</td>
                        <td class="py-4 px-6" title="show query">125125123</td>
                    </tr>
                    <tr>
                        <td class="py-4 px-6" title="show query">60689</td>
                        <td class="py-4 px-6" title="show query">13164</td>
                        <td class="py-4 px-6" title="show query">52616251</td>
                        <td class="py-4 px-6" title="show query">WORKGROUP/ME</td>
                        <td class="py-4 px-6" title="show query">RMS13PRD</td>
                        <td class="py-4 px-6" title="show query">SYSTEM</td>
                        <td class="py-4 px-6" title="show query">httpd.exe</td>
                        <td class="py-4 px-6" title="show query">125125123</td>
                    </tr>
                    <tr>
                        <td class="py-4 px-6" title="show query">60689</td>
                        <td class="py-4 px-6" title="show query">13164</td>
                        <td class="py-4 px-6" title="show query">52616251</td>
                        <td class="py-4 px-6" title="show query">WORKGROUP/ME</td>
                        <td class="py-4 px-6" title="show query">RMS13PRD</td>
                        <td class="py-4 px-6" title="show query">SYSTEM</td>
                        <td class="py-4 px-6" title="show query">httpd.exe</td>
                        <td class="py-4 px-6" title="show query">125125123</td>
                    </tr>
                    <tr>
                        <td class="py-4 px-6" title="show query">60689</td>
                        <td class="py-4 px-6" title="show query">13164</td>
                        <td class="py-4 px-6" title="show query">52616251</td>
                        <td class="py-4 px-6" title="show query">WORKGROUP/ME</td>
                        <td class="py-4 px-6" title="show query">RMS13PRD</td>
                        <td class="py-4 px-6" title="show query">SYSTEM</td>
                        <td class="py-4 px-6" title="show query">httpd.exe</td>
                        <td class="py-4 px-6" title="show query">125125123</td>
                    </tr>
                    <tr>
                        <td class="py-4 px-6" title="show query">60689</td>
                        <td class="py-4 px-6" title="show query">13164</td>
                        <td class="py-4 px-6" title="show query">52616251</td>
                        <td class="py-4 px-6" title="show query">WORKGROUP/ME</td>
                        <td class="py-4 px-6" title="show query">RMS13PRD</td>
                        <td class="py-4 px-6" title="show query">SYSTEM</td>
                        <td class="py-4 px-6" title="show query">httpd.exe</td>
                        <td class="py-4 px-6" title="show query">125125123</td>
                    </tr>
                    <tr>
                        <td class="py-4 px-6" title="show query">60689</td>
                        <td class="py-4 px-6" title="show query">13164</td>
                        <td class="py-4 px-6" title="show query">52616251</td>
                        <td class="py-4 px-6" title="show query">WORKGROUP/ME</td>
                        <td class="py-4 px-6" title="show query">RMS13PRD</td>
                        <td class="py-4 px-6" title="show query">SYSTEM</td>
                        <td class="py-4 px-6" title="show query">httpd.exe</td>
                        <td class="py-4 px-6" title="show query">125125123</td>
                    </tr>
                    <tr>
                        <td class="py-4 px-6" title="show query">60689</td>
                        <td class="py-4 px-6" title="show query">13164</td>
                        <td class="py-4 px-6" title="show query">52616251</td>
                        <td class="py-4 px-6" title="show query">WORKGROUP/ME</td>
                        <td class="py-4 px-6" title="show query">RMS13PRD</td>
                        <td class="py-4 px-6" title="show query">SYSTEM</td>
                        <td class="py-4 px-6" title="show query">httpd.exe</td>
                        <td class="py-4 px-6" title="show query">125125123</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
    
</div>

<?php require APPROOT . '/views/inc/footer.php'; ?>