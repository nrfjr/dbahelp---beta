<?php
$title = 'Telephone Directories';
require APPROOT . '/views/inc/header.php';
require APPROOT . '/views/inc/sidebar.php'; ?>

<div class="flex justify-between mb-5">
    <h1 class="text-3xl text-black text-white">
         <b>Telephone Directories</b>
    </h1>
    <button onclick="window.location.reload()" class="px-4 py-2 rounded-lg bg-gray-200 hover:bg-gray-500"> Refresh<i class="ml-2 fas fa-redo"></i></button>
</div>
<div class="overflow-x-auto relative shadow-md">

    <div class="rounded-lg flex justify-between items-center p-2 bg-gray-300 dark:bg-gray-900 mb-4">
        <div class="inline-flex">
            <p class="mt-3">Search: </p>
            <input id="search" name="search" class="m-2 rounded-sm py-1 px-2" type="text" placeholder="Search for DEPARTMENT">
            <button type="submit" class="px-4 py-1 rounded-md bg-gray-300 hover:bg-gray-500 shadow-inner shadow-xl">
                <i class="fas fa-search"></i>
            </button>
        </div>
    </div>

    <div style="height: auto; overflow: clip;">
        <div class="block  justify-center w-full shadow-md overflow-auto sm:rounded-lg" style="max-height: 75vh;">
                <table class=" sortable w-full text-sm text-center text-white dark:text-gray-400">
                    <thead class="cursor-pointer text-md text-black bg-indigo-200 dark:bg-gray-700 dark:text-gray-400 sticky top-0">
                        <tr>
                                <th scope="col" class="py-2 px-6">
                                   LOCATION
                                </th>
                                <th scope="col" class="py-2 px-6">
                                    LOCAL
                                </th>
                                <th scope="col" class="py-2 px-6">
                                    DEPARTMENT
                                </th>
                                <th scope="col" class="py-2 px-6">
                                    PERSONS
                                </th>
                        </tr>
                    </thead>
                    <tbody class="bg-gray-500">
                        <tr class="focus:hover:bg-gray-700 hover:bg-gray-700">
                                <td class=" item py-4  px-6" title="">315-GENSAN</td>
                                <td class=" item py-4  px-6" title="">1108</td>
                                <td class=" item py-4  px-6" title="">SUPERMARKET</td>
                                <td class=" item py-4  px-6" title="">COUNTER 05/06</td>
                        </tr>
                    </tbody>
                </table>

                <!-- <div class="flex w-full shadow-md overflow-auto sm:rounded-lg bg-gray-500" style="max-height: 80%; min-height: 100%;">
                    <h1 class="text-white m-auto "><b>No Telephone Directories Found</b></h1>
                </div> -->
        </div>
    </div>

</div>

<?php require APPROOT . '/views/inc/footer.php'; ?>