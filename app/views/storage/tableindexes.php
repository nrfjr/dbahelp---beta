<?php
$title = 'Table Indexes';
require APPROOT . '/views/inc/header.php';
require APPROOT . '/views/inc/sidebar.php'; ?>

<h1 class="text-3xl text-black pb-2 text-white">
    <a href="<?php echo URLROOT; ?>/homepage/dashboard" class="no-underline hover:underline">Storage</a> > <b>Table Indexes</b>
</h1>

<div class="overflow-x-auto relative shadow-md">

    <div class="rounded-lg flex justify-between items-center p-2 bg-gray-300 dark:bg-gray-900 mb-4">
        <div class="inline-flex">
            <p class="m-2">Search: </p>
            <input class="m-2" type="text">
            <button class="px-4 py-2 rounded-lg bg-gray-300 hover:bg-gray-500 shadow-inner shadow-xl">
                <i class="las la-search"></i>
            </button>
        </div>
        <div class="inline-flex">
            <p class="m-2">Rows Selected:</p>
            <b class="m-2">388</b>
        </div>
        <div class="inline-flex">
            <b>TABLE INDEXES</b>
        </div>
        <div class="inline-flex">
            <button class="px-4 py-2 rounded-lg bg-gray-300 hover:bg-gray-500 shadow-inner shadow-xl">
                Refresh Data
            </button>
        </div>
    </div>

    <div style="height: 70vh; overflow: auto;" class="">
        <div class="block  justify-center w-full shadow-md overflow-auto sm:rounded-lg" style="max-height: 100%;">
            <table class="w-full text-sm text-center text-white dark:text-gray-400 overflow-auto">
                <thead class="text-md text-black bg-indigo-200 dark:bg-gray-700 dark:text-gray-400 overflow-auto">
                    <tr>
                        <th class="py-2 px-6">INDEX_NAME</th>
                        <th class="py-2 px-6">UNIQUENESS</th>
                        <th class="py-2 px-6">PREF_LEN</th> 
                        <th class="py-2 px-6">T_ROWS</th> 
                        <th class="py-2 px-6">I_ROWS</th> 
                        <th class="py-2 px-6">DISTINCT_KEYS</th> 
                        <th class="py-2 px-6">BLEVEL</th> 
                        <th class="py-2 px-6">LEAF_BLOCKS</th>  
                        <th class="py-2 px-6">COLUMN_NAME</th>
                        <th class="py-2 px-6">DESCEND</th> 
                        <th class="py-2 px-6">NULLABLE</th> 
                        <th class="py-2 px-6">NUM_DISTINCT</th> 
                        <th class="py-2 px-6">NUM_NULLS</th> 
                        <th class="py-2 px-6">FUNC</th>  
                    </tr>
                </thead>
                <tbody class="bg-gray-500 overflow-auto">
                    <tr>
                        <td class="py-4 px-6" title="show query">asfaasfa asfasasfawfas</td>
                        <td class="py-4 px-6" title="show query">28-NOV-2022 4:54 PM</td>
                        <td class="py-4 px-6" title="show query">12805</td>
                        <td class="py-4 px-6" title="show query">0:52:53</td>
                        <td class="py-4 px-6" title="show query">1525</td>
                        <td class="py-4 px-6" title="show query">oracle</td>
                        <td class="py-4 px-6" title="show query">55557221</td>
                        <td class="py-4 px-6" title="show query">firmweb@orapp1prd(TNS V1-V3)</td>
                        <td class="py-4 px-6" title="show query">55557221</td>
                        <td class="py-4 px-6" title="show query">55557221</td>
                        <td class="py-4 px-6" title="show query">55557221</td>
                        <td class="py-4 px-6" title="show query">55557221</td>
                        <td class="py-4 px-6" title="show query">55557221</td>
                        <td class="py-4 px-6" title="show query">55557221</td>
                    </tr>
                    <tr>
                        <td class="py-4 px-6" title="show query">asfawfasfas</td>
                        <td class="py-4 px-6" title="show query">28-NOV-2022 4:54 PM</td>
                        <td class="py-4 px-6" title="show query">12805</td>
                        <td class="py-4 px-6" title="show query">0:52:53</td>
                        <td class="py-4 px-6" title="show query">1525</td>
                        <td class="py-4 px-6" title="show query">oracle</td>
                        <td class="py-4 px-6" title="show query">55557221</td>
                        <td class="py-4 px-6" title="show query">firmweb@orapp1prd(TNS V1-V3)</td>
                        <td class="py-4 px-6" title="show query">55557221</td>
                        <td class="py-4 px-6" title="show query">55557221</td>
                        <td class="py-4 px-6" title="show query">55557221</td>
                        <td class="py-4 px-6" title="show query">55557221</td>
                        <td class="py-4 px-6" title="show query">55557221</td>
                        <td class="py-4 px-6" title="show query">55557221</td>
                    </tr>
                    <tr>
                        <td class="py-4 px-6" title="show query">asfawfasfas</td>
                        <td class="py-4 px-6" title="show query">28-NOV-2022 4:54 PM</td>
                        <td class="py-4 px-6" title="show query">12805</td>
                        <td class="py-4 px-6" title="show query">0:52:53</td>
                        <td class="py-4 px-6" title="show query">1525</td>
                        <td class="py-4 px-6" title="show query">oracle</td>
                        <td class="py-4 px-6" title="show query">55557221</td>
                        <td class="py-4 px-6" title="show query">firmweb@orapp1prd(TNS V1-V3)</td>
                        <td class="py-4 px-6" title="show query">55557221</td>
                        <td class="py-4 px-6" title="show query">55557221</td>
                        <td class="py-4 px-6" title="show query">55557221</td>
                        <td class="py-4 px-6" title="show query">55557221</td>
                        <td class="py-4 px-6" title="show query">55557221</td>
                        <td class="py-4 px-6" title="show query">55557221</td>
                    </tr>
                    <tr>
                        <td class="py-4 px-6" title="show query">asfawfasfas</td>
                        <td class="py-4 px-6" title="show query">28-NOV-2022 4:54 PM</td>
                        <td class="py-4 px-6" title="show query">12805</td>
                        <td class="py-4 px-6" title="show query">0:52:53</td>
                        <td class="py-4 px-6" title="show query">1525</td>
                        <td class="py-4 px-6" title="show query">oracle</td>
                        <td class="py-4 px-6" title="show query">55557221</td>
                        <td class="py-4 px-6" title="show query">firmweb@orapp1prd(TNS V1-V3)</td>
                        <td class="py-4 px-6" title="show query">55557221</td>
                        <td class="py-4 px-6" title="show query">55557221</td>
                        <td class="py-4 px-6" title="show query">55557221</td>
                        <td class="py-4 px-6" title="show query">55557221</td>
                        <td class="py-4 px-6" title="show query">55557221</td>
                        <td class="py-4 px-6" title="show query">55557221</td>
                    </tr>
                    <tr>
                        <td class="py-4 px-6" title="show query">asfawfasfas</td>
                        <td class="py-4 px-6" title="show query">28-NOV-2022 4:54 PM</td>
                        <td class="py-4 px-6" title="show query">12805</td>
                        <td class="py-4 px-6" title="show query">0:52:53</td>
                        <td class="py-4 px-6" title="show query">1525</td>
                        <td class="py-4 px-6" title="show query">oracle</td>
                        <td class="py-4 px-6" title="show query">55557221</td>
                        <td class="py-4 px-6" title="show query">firmweb@orapp1prd(TNS V1-V3)</td>
                        <td class="py-4 px-6" title="show query">55557221</td>
                        <td class="py-4 px-6" title="show query">55557221</td>
                        <td class="py-4 px-6" title="show query">55557221</td>
                        <td class="py-4 px-6" title="show query">55557221</td>
                        <td class="py-4 px-6" title="show query">55557221</td>
                        <td class="py-4 px-6" title="show query">55557221</td>
                    </tr>
                    <tr>
                        <td class="py-4 px-6" title="show query">asfawfasfas</td>
                        <td class="py-4 px-6" title="show query">28-NOV-2022 4:54 PM</td>
                        <td class="py-4 px-6" title="show query">12805</td>
                        <td class="py-4 px-6" title="show query">0:52:53</td>
                        <td class="py-4 px-6" title="show query">1525</td>
                        <td class="py-4 px-6" title="show query">oracle</td>
                        <td class="py-4 px-6" title="show query">55557221</td>
                        <td class="py-4 px-6" title="show query">firmweb@orapp1prd(TNS V1-V3)</td>
                        <td class="py-4 px-6" title="show query">55557221</td>
                        <td class="py-4 px-6" title="show query">55557221</td>
                        <td class="py-4 px-6" title="show query">55557221</td>
                        <td class="py-4 px-6" title="show query">55557221</td>
                        <td class="py-4 px-6" title="show query">55557221</td>
                        <td class="py-4 px-6" title="show query">55557221</td>
                    </tr>
                    <tr>
                        <td class="py-4 px-6" title="show query">asfawfasfas</td>
                        <td class="py-4 px-6" title="show query">28-NOV-2022 4:54 PM</td>
                        <td class="py-4 px-6" title="show query">12805</td>
                        <td class="py-4 px-6" title="show query">0:52:53</td>
                        <td class="py-4 px-6" title="show query">1525</td>
                        <td class="py-4 px-6" title="show query">oracle</td>
                        <td class="py-4 px-6" title="show query">55557221</td>
                        <td class="py-4 px-6" title="show query">firmweb@orapp1prd(TNS V1-V3)</td>
                        <td class="py-4 px-6" title="show query">55557221</td>
                        <td class="py-4 px-6" title="show query">55557221</td>
                        <td class="py-4 px-6" title="show query">55557221</td>
                        <td class="py-4 px-6" title="show query">55557221</td>
                        <td class="py-4 px-6" title="show query">55557221</td>
                        <td class="py-4 px-6" title="show query">55557221</td>
                    </tr>
                    <tr>
                        <td class="py-4 px-6" title="show query">asfawfasfas</td>
                        <td class="py-4 px-6" title="show query">28-NOV-2022 4:54 PM</td>
                        <td class="py-4 px-6" title="show query">12805</td>
                        <td class="py-4 px-6" title="show query">0:52:53</td>
                        <td class="py-4 px-6" title="show query">1525</td>
                        <td class="py-4 px-6" title="show query">oracle</td>
                        <td class="py-4 px-6" title="show query">55557221</td>
                        <td class="py-4 px-6" title="show query">firmweb@orapp1prd(TNS V1-V3)</td>
                        <td class="py-4 px-6" title="show query">55557221</td>
                        <td class="py-4 px-6" title="show query">55557221</td>
                        <td class="py-4 px-6" title="show query">55557221</td>
                        <td class="py-4 px-6" title="show query">55557221</td>
                        <td class="py-4 px-6" title="show query">55557221</td>
                        <td class="py-4 px-6" title="show query">55557221</td>
                    </tr>
                    <tr>
                        <td class="py-4 px-6" title="show query">asfawfasfas</td>
                        <td class="py-4 px-6" title="show query">28-NOV-2022 4:54 PM</td>
                        <td class="py-4 px-6" title="show query">12805</td>
                        <td class="py-4 px-6" title="show query">0:52:53</td>
                        <td class="py-4 px-6" title="show query">1525</td>
                        <td class="py-4 px-6" title="show query">oracle</td>
                        <td class="py-4 px-6" title="show query">55557221</td>
                        <td class="py-4 px-6" title="show query">firmweb@orapp1prd(TNS V1-V3)</td>
                        <td class="py-4 px-6" title="show query">55557221</td>
                        <td class="py-4 px-6" title="show query">55557221</td>
                        <td class="py-4 px-6" title="show query">55557221</td>
                        <td class="py-4 px-6" title="show query">55557221</td>
                        <td class="py-4 px-6" title="show query">55557221</td>
                        <td class="py-4 px-6" title="show query">55557221</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
    
</div>

<?php require APPROOT . '/views/inc/footer.php'; ?>