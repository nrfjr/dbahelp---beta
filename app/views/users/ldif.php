<?php
$title = 'LDIF';
require APPROOT . '/views/inc/header.php';
require APPROOT . '/views/inc/sidebar.php'; ?>

<div class="flex justify-center z-10" aria-labelledby="modal-title" role="dialog" aria-modal="true">
  <div class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity"></div>
  <div class="modal fade block justify-center top-4 w-5/12 h-full outline-none overflow-x-hidden overflow-y-auto" id="ModalCenteredScrollable" tabindex="-1" aria-labelledby="ModalCenteredScrollable" aria-modal="true" role="dialog">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable relative w-auto pointer-events-none">
      <div class="modal-content border-none shadow-lg relative flex flex-col w-full pointer-events-auto bg-white bg-clip-padding rounded-md outline-none text-current">
      <form action="<?php echo URLROOT; ?>/users/download_ldif" method="POST">
        <div class="modal-header flex flex-shrink-0 items-center justify-between p-4 border-b border-gray-200 rounded-t-md">
          <h5 class="text-xl font-medium leading-normal text-gray-800" id="exampleModalCenteredScrollableLabel">
            <b>SYSTEM GENERATED LDIF PREVIEW</b>
          </h5>
          <button type="button" class="btn-close box-content w-4 h-4 p-1 text-black border-none rounded-none opacity-50 focus:shadow-none focus:outline-none focus:opacity-100 hover:text-black hover:opacity-75 hover:no-underline" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body relative p-4">
          <?php
          foreach (new SplFileObject($data['ldif']) as $line) {
            echo '<p class="text-sm text-black">' . $line . '</p>';
          } ?>
          <input class="hidden" name="ldiffile" id="ldiffile" value="<?php echo $data['ldif']; ?>">
        </div>
        <div class="modal-footer flex flex-shrink-0 flex-wrap items-center justify-end p-4 border-t border-gray-200 rounded-b-md">
              <button type="submit" value="submit" class="inline-flex w-full justify-center rounded-md border border-transparent bg-green-400 px-4 py-2 text-base font-medium text-white shadow-sm hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-red-500 focus:ring-offset-2 sm:ml-3 sm:w-auto sm:text-sm">Download</button>
          </form>
          <a href="<?php echo URLROOT; ?>/users/show/default"><button type="button" class="mt-3 inline-flex w-full justify-center rounded-md border border-gray-300 bg-white px-4 py-2 text-base font-medium text-gray-700 shadow-sm hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 sm:mt-0 sm:ml-3 sm:w-auto sm:text-sm">Close</button>
        </div>
      </div>
    </div>
  </div>
</div>

<?php require APPROOT . '/views/inc/footer.php'; ?>