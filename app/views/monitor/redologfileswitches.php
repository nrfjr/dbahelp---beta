<?php
$title = 'Redo Log File Switches';
require APPROOT . '/views/inc/header.php';
require APPROOT . '/views/inc/sidebar.php'; ?>

<h1 class="text-3xl text-black pb-2 text-white">
    <a href="<?php echo URLROOT; ?>/homepage/dashboard" class="no-underline hover:underline">Monitor</a> > <b>Redo Log File Switches</b>
</h1>

<div class="flex grid grid-rows-2 gap-y-4 w-fit" style="height: 80vh; overflow: clip;">
    <div class="row-span-1">
        <h1 class="text-white">Morning Log File Switches Within a Week</h1>
        <div class="flex  justify-center w-full shadow-md overflow-auto sm:rounded-lg" style="max-height: 93%;">
            <table class="w-full text-sm text-center text-white dark:text-gray-400">
                <thead class="text-md text-black bg-indigo-200 dark:bg-gray-700 dark:text-gray-400">
                    <tr>
                        <th class="py-2 px-6">DAY</th>
                        <th class="py-2 px-6">7 AM</th>
                        <th class="py-2 px-6">8 AM</th>
                        <th class="py-2 px-6">9 AM</th>
                        <th class="py-2 px-6">10 AM</th>
                        <th class="py-2 px-6">11 AM</th> 
                        <th class="py-2 px-6">12 PM</th>
                        <th class="py-2 px-6">1 PM</th>
                        <th class="py-2 px-6">2 PM</th> 
                        <th class="py-2 px-6">3 PM</th>
                        <th class="py-2 px-6">4 PM</th>
                        <th class="py-2 px-6">5 PM</th> 
                        <th class="py-2 px-6">6 PM</th>
                    </tr>
                </thead>
                <tbody class="bg-gray-500">
                    <tr>
                        <td class="py-4 px-6" title="show query">15/JUL</td>
                        <td class="py-4 px-6" title="show query">000</td>
                        <td class="py-4 px-6" title="show query">000</td>
                        <td class="py-4 px-6" title="show query">000</td>
                        <td class="py-4 px-6" title="show query">000</td>
                        <td class="py-4 px-6" title="show query">000</td>
                        <td class="py-4 px-6" title="show query">000</td>
                        <td class="py-4 px-6" title="show query">000</td>
                        <td class="py-4 px-6" title="show query">000</td>
                        <td class="py-4 px-6" title="show query">000</td>
                        <td class="py-4 px-6" title="show query">000</td>
                        <td class="py-4 px-6" title="show query">000</td>
                        <td class="py-4 px-6" title="show query">000</td>
                    </tr>
                    <tr>
                        <td class="py-4 px-6" title="show query">16/JUL</td>
                        <td class="py-4 px-6" title="show query">001</td>
                        <td class="py-4 px-6" title="show query">001</td>
                        <td class="py-4 px-6" title="show query">001</td>
                        <td class="py-4 px-6" title="show query">001</td>
                        <td class="py-4 px-6" title="show query">001</td>
                        <td class="py-4 px-6" title="show query">001</td>
                        <td class="py-4 px-6" title="show query">001</td>
                        <td class="py-4 px-6" title="show query">001</td>
                        <td class="py-4 px-6" title="show query">001</td>
                        <td class="py-4 px-6" title="show query">001</td>
                        <td class="py-4 px-6" title="show query">001</td>
                        <td class="py-4 px-6" title="show query">001</td>
                    </tr>
                    <tr>
                        <td class="py-4 px-6" title="show query">17/JUL</td>
                        <td class="py-4 px-6" title="show query">002</td>
                        <td class="py-4 px-6" title="show query">002</td>
                        <td class="py-4 px-6" title="show query">002</td>
                        <td class="py-4 px-6" title="show query">002</td>
                        <td class="py-4 px-6" title="show query">002</td>
                        <td class="py-4 px-6" title="show query">002</td>
                        <td class="py-4 px-6" title="show query">002</td>
                        <td class="py-4 px-6" title="show query">002</td>
                        <td class="py-4 px-6" title="show query">002</td>
                        <td class="py-4 px-6" title="show query">002</td>
                        <td class="py-4 px-6" title="show query">002</td>
                        <td class="py-4 px-6" title="show query">002</td>
                    </tr>
                    <tr>
                        <td class="py-4 px-6" title="show query">18/JUL</td>
                        <td class="py-4 px-6" title="show query">003</td>
                        <td class="py-4 px-6" title="show query">003</td>
                        <td class="py-4 px-6" title="show query">003</td>
                        <td class="py-4 px-6" title="show query">003</td>
                        <td class="py-4 px-6" title="show query">003</td>
                        <td class="py-4 px-6" title="show query">003</td>
                        <td class="py-4 px-6" title="show query">003</td>
                        <td class="py-4 px-6" title="show query">003</td>
                        <td class="py-4 px-6" title="show query">003</td>
                        <td class="py-4 px-6" title="show query">003</td>
                        <td class="py-4 px-6" title="show query">003</td>
                        <td class="py-4 px-6" title="show query">003</td>
                    </tr>
                    <tr>
                        <td class="py-4 px-6" title="show query">18/JUL</td>
                        <td class="py-4 px-6" title="show query">003</td>
                        <td class="py-4 px-6" title="show query">003</td>
                        <td class="py-4 px-6" title="show query">003</td>
                        <td class="py-4 px-6" title="show query">003</td>
                        <td class="py-4 px-6" title="show query">003</td>
                        <td class="py-4 px-6" title="show query">003</td>
                        <td class="py-4 px-6" title="show query">003</td>
                        <td class="py-4 px-6" title="show query">003</td>
                        <td class="py-4 px-6" title="show query">003</td>
                        <td class="py-4 px-6" title="show query">003</td>
                        <td class="py-4 px-6" title="show query">003</td>
                        <td class="py-4 px-6" title="show query">003</td>
                    </tr>
                    <tr>
                        <td class="py-4 px-6" title="show query">18/JUL</td>
                        <td class="py-4 px-6" title="show query">003</td>
                        <td class="py-4 px-6" title="show query">003</td>
                        <td class="py-4 px-6" title="show query">003</td>
                        <td class="py-4 px-6" title="show query">003</td>
                        <td class="py-4 px-6" title="show query">003</td>
                        <td class="py-4 px-6" title="show query">003</td>
                        <td class="py-4 px-6" title="show query">003</td>
                        <td class="py-4 px-6" title="show query">003</td>
                        <td class="py-4 px-6" title="show query">003</td>
                        <td class="py-4 px-6" title="show query">003</td>
                        <td class="py-4 px-6" title="show query">003</td>
                        <td class="py-4 px-6" title="show query">003</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>

    <div class="row-span-1">
        <h1 class="text-white">Evening Log File Switches Within a Week</h1>
        <div class="flex  justify-center w-full shadow-md overflow-auto sm:rounded-lg" style="max-height: 93%;">
            <table class="w-full text-sm text-center text-white dark:text-gray-400">
            <thead class="text-md text-black bg-indigo-200 dark:bg-gray-700 dark:text-gray-400">
                    <tr>
                        <th class="py-2 px-6">DAY</th>
                        <th class="py-2 px-6">7 PM</th>
                        <th class="py-2 px-6">8 PM</th>
                        <th class="py-2 px-6">9 PM</th>
                        <th class="py-2 px-6">10 PM</th>
                        <th class="py-2 px-6">11 PM</th> 
                        <th class="py-2 px-6">12 AM</th>
                        <th class="py-2 px-6">1 AM</th>
                        <th class="py-2 px-6">2 AM</th> 
                        <th class="py-2 px-6">3 AM</th>
                        <th class="py-2 px-6">4 AM</th>
                        <th class="py-2 px-6">5 AM</th> 
                        <th class="py-2 px-6">6 AM</th>
                    </tr>
                </thead>
                <tbody class="bg-gray-500">
                    <tr>
                        <td class="py-4 px-6" title="show query">15/JUL</td>
                        <td class="py-4 px-6" title="show query">000</td>
                        <td class="py-4 px-6" title="show query">000</td>
                        <td class="py-4 px-6" title="show query">000</td>
                        <td class="py-4 px-6" title="show query">000</td>
                        <td class="py-4 px-6" title="show query">000</td>
                        <td class="py-4 px-6" title="show query">000</td>
                        <td class="py-4 px-6" title="show query">000</td>
                        <td class="py-4 px-6" title="show query">000</td>
                        <td class="py-4 px-6" title="show query">000</td>
                        <td class="py-4 px-6" title="show query">000</td>
                        <td class="py-4 px-6" title="show query">000</td>
                        <td class="py-4 px-6" title="show query">000</td>
                    </tr>
                    <tr>
                        <td class="py-4 px-6" title="show query">16/JUL</td>
                        <td class="py-4 px-6" title="show query">001</td>
                        <td class="py-4 px-6" title="show query">001</td>
                        <td class="py-4 px-6" title="show query">001</td>
                        <td class="py-4 px-6" title="show query">001</td>
                        <td class="py-4 px-6" title="show query">001</td>
                        <td class="py-4 px-6" title="show query">001</td>
                        <td class="py-4 px-6" title="show query">001</td>
                        <td class="py-4 px-6" title="show query">001</td>
                        <td class="py-4 px-6" title="show query">001</td>
                        <td class="py-4 px-6" title="show query">001</td>
                        <td class="py-4 px-6" title="show query">001</td>
                        <td class="py-4 px-6" title="show query">001</td>
                    </tr>
                    <tr>
                        <td class="py-4 px-6" title="show query">17/JUL</td>
                        <td class="py-4 px-6" title="show query">002</td>
                        <td class="py-4 px-6" title="show query">002</td>
                        <td class="py-4 px-6" title="show query">002</td>
                        <td class="py-4 px-6" title="show query">002</td>
                        <td class="py-4 px-6" title="show query">002</td>
                        <td class="py-4 px-6" title="show query">002</td>
                        <td class="py-4 px-6" title="show query">002</td>
                        <td class="py-4 px-6" title="show query">002</td>
                        <td class="py-4 px-6" title="show query">002</td>
                        <td class="py-4 px-6" title="show query">002</td>
                        <td class="py-4 px-6" title="show query">002</td>
                        <td class="py-4 px-6" title="show query">002</td>
                    </tr>
                    <tr>
                        <td class="py-4 px-6" title="show query">18/JUL</td>
                        <td class="py-4 px-6" title="show query">003</td>
                        <td class="py-4 px-6" title="show query">003</td>
                        <td class="py-4 px-6" title="show query">003</td>
                        <td class="py-4 px-6" title="show query">003</td>
                        <td class="py-4 px-6" title="show query">003</td>
                        <td class="py-4 px-6" title="show query">003</td>
                        <td class="py-4 px-6" title="show query">003</td>
                        <td class="py-4 px-6" title="show query">003</td>
                        <td class="py-4 px-6" title="show query">003</td>
                        <td class="py-4 px-6" title="show query">003</td>
                        <td class="py-4 px-6" title="show query">003</td>
                        <td class="py-4 px-6" title="show query">003</td>
                    </tr>
                    <tr>
                        <td class="py-4 px-6" title="show query">18/JUL</td>
                        <td class="py-4 px-6" title="show query">003</td>
                        <td class="py-4 px-6" title="show query">003</td>
                        <td class="py-4 px-6" title="show query">003</td>
                        <td class="py-4 px-6" title="show query">003</td>
                        <td class="py-4 px-6" title="show query">003</td>
                        <td class="py-4 px-6" title="show query">003</td>
                        <td class="py-4 px-6" title="show query">003</td>
                        <td class="py-4 px-6" title="show query">003</td>
                        <td class="py-4 px-6" title="show query">003</td>
                        <td class="py-4 px-6" title="show query">003</td>
                        <td class="py-4 px-6" title="show query">003</td>
                        <td class="py-4 px-6" title="show query">003</td>
                    </tr>
                    <tr>
                        <td class="py-4 px-6" title="show query">18/JUL</td>
                        <td class="py-4 px-6" title="show query">003</td>
                        <td class="py-4 px-6" title="show query">003</td>
                        <td class="py-4 px-6" title="show query">003</td>
                        <td class="py-4 px-6" title="show query">003</td>
                        <td class="py-4 px-6" title="show query">003</td>
                        <td class="py-4 px-6" title="show query">003</td>
                        <td class="py-4 px-6" title="show query">003</td>
                        <td class="py-4 px-6" title="show query">003</td>
                        <td class="py-4 px-6" title="show query">003</td>
                        <td class="py-4 px-6" title="show query">003</td>
                        <td class="py-4 px-6" title="show query">003</td>
                        <td class="py-4 px-6" title="show query">003</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>


<?php require APPROOT . '/views/inc/footer.php'; ?>