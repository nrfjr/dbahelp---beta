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
            <button class="px-4 py-2 rounded-lg bg-gray-300 hover:bg-gray-500 shadow-inner shadow-xl">
                <i class="las la-search"></i>
            </button>
        </div>
        <div class="inline-flex">
            <p class="m-2">Rows Selected:</p>
            <b class="m-2">388</b>
        </div>
        <div class="inline-flex">
            <b>RMS ACTIVE RUNNING ORACLE SESSIONS</b>
        </div>
        <div class="inline-flex">
            <button class="px-4 py-2 rounded-lg bg-gray-300 hover:bg-gray-500 shadow-inner shadow-xl">
                Refresh Data
            </button>
        </div>
    </div>

    <div style="height: 70vh; overflow: clip;" class="">
        <div class="block  justify-center w-full shadow-md overflow-auto sm:rounded-lg" style="max-height: 100%;">
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
                        <th class="py-2 px-6">ACTION</th> 
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
                        <td class="py-2 px-6" title="show query">
                            <div x-data="{toSubmit: false}" >
                                <button @click="toSubmit = true" alt="Kill" class="w-2/4 h-3/4 rounded-full hover:bg-red-200 border-blue-500 md:border-green-500">
                                    <font color="#b00020" title="Kill Session">
                                        <i class="lar la-times-circle transform scale-150"></i>
                                    </font>
                                </button>
                                <button x-show="toSubmit" @click="toSubmit = false" alt="Kill" class="border-blue-500 md:border-green-500">
                                </button>
                                <!-- Delete User Modal -->
                                <div x-show="toSubmit" class="border-double border-2 border-red-500 absolute left-1/4 top-1/2 z-10" aria-labelledby="modal-title" role="dialog" aria-modal="true">
                                    <div class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity"></div>
                                    <div class="modal fixed fade justify-center mr-48 top-72 w-5/12 h-full outline-none overflow-x-hidden overflow-y-auto" id="ModalCenteredScrollable" tabindex="-1" aria-labelledby="ModalCenteredScrollable" aria-modal="true" role="dialog">
                                        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable relative pointer-events-none w-auto">

                                            <div class="modal-content border-none shadow-lg relative flex flex-col w-full pointer-events-auto bg-white bg-clip-padding rounded-md outline-none text-current">
                                                <div class="modal-header flex flex-shrink-0 items-center justify-between p-4 border-b border-gray-200 rounded-t-md">
                                                    <h5 class="text-xl font-medium leading-normal text-gray-800" id="exampleModalCenteredScrollableLabel">
                                                        <b>Confirm Kill Session</b>
                                                    </h5>
                                                    <button type="button" @click="toSubmit = false" class="btn-close box-content w-4 h-4 p-1 text-black border-none rounded-none opacity-50 focus:shadow-none focus:outline-none focus:opacity-100 hover:text-black hover:opacity-75 hover:no-underline" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body relative p-4">
                                                    <font color="black">Are you sure to kill Session <b>12805</b>?</font>
                                                </div>
                                                <div class="modal-footer flex flex-shrink-0 flex-wrap items-center justify-end p-4 border-t border-gray-200 rounded-b-md">
                                                    <form action="<?php echo URLROOT; ?>/users/delete/<?php echo $value['USERNAME'] ?>" method="POST">
                                                        <button type="button" class="inline-flex w-full justify-center rounded-md border border-transparent bg-red-700 px-4 py-2 text-base font-medium text-white shadow-sm focus:outline-none focus:ring-2  focus:ring-offset-2 sm:ml-3 sm:w-auto sm:text-sm">Kill</button>
                                                    </form>
                                                    <button type="button" @click="toSubmit = false" class="mt-3 inline-flex w-full justify-center rounded-md border border-gray-300 bg-white px-4 py-2 text-base font-medium text-gray-700 shadow-sm hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 sm:mt-0 sm:ml-3 sm:w-auto sm:text-sm">Cancel</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- Delete User Modal -->
                            </div>
                        </td>
                    </tr>
                    
                </tbody>
            </table>
        </div>
    </div>
    
</div>

<?php require APPROOT . '/views/inc/footer.php'; ?>