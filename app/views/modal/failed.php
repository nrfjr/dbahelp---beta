<?php 
$title = $data['modal_title'];
require APPROOT . '/views/inc/header.php'; 
require APPROOT . '/views/inc/sidebar.php'; ?>

<div class="flex justify-center z-10" aria-labelledby="modal-title" role="dialog" aria-modal="true">
  <div class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity"></div>
  <div class="modal fixed fade justify-center mr-48 top-72 w-5/12 h-full outline-none overflow-x-hidden overflow-y-auto" id="ModalCenteredScrollable" tabindex="-1" aria-labelledby="ModalCenteredScrollable" aria-modal="true" role="dialog">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable relative pointer-events-none w-auto">

      <div class="modal-content border-none shadow-lg relative flex flex-col w-full pointer-events-auto bg-white bg-clip-padding rounded-md outline-none text-current">
        <div class="modal-header bg-red-400 flex flex-shrink-0 items-center justify-between p-4 border-b border-gray-200 rounded-t-md">
          <h5 class="text-xl text-white font-medium leading-normal" id="exampleModalCenteredScrollableLabel">
            <b><?php echo $data['failed_title'].' !';?></b>
          </h5>
          <a href="<?php echo URLROOT.$data['close_link'];?>"> <button type="button" class="btn-close box-content w-4 h-4 p-1 text-black border-none rounded-none opacity-50 focus:shadow-none focus:outline-none focus:opacity-100 hover:text-black hover:opacity-75 hover:no-underline" data-bs-dismiss="modal" aria-label="Close"></button></a>
        </div>
        <div class="modal-body relative p-4">
          <?php
                echo $data['failed_message'];
          ?>
        </div>
        <div class="modal-footer flex flex-shrink-0 flex-wrap items-center justify-end p-4 border-t border-gray-200 rounded-b-md">
          <a href="<?php echo URLROOT.$data['close_link'];?>"><button type="button" class="mt-3 inline-flex w-full justify-center rounded-md border border-gray-300 bg-white px-4 py-2 text-base font-medium text-gray-700 shadow-sm hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 sm:mt-0 sm:ml-3 sm:w-auto sm:text-sm">Close</button></a>
        </div>
      </div>
    </div>
  </div>
</div>


<?php require APPROOT . '/views/inc/footer.php'; ?>