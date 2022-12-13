<?php
$title = 'Table Indexes';
require APPROOT . '/views/inc/header.php';
require APPROOT . '/views/inc/sidebar.php'; ?>

<div class="flex justify-between mb-5">
    <h1 class="text-3xl text-black text-white">
        <a href="<?php echo URLROOT; ?>/homepages/index/<?php echo $_SESSION['StorageDB']; ?>" class="no-underline hover:underline">Storage</a> > <b>Table Indexes</b>
    </h1>
    <a href="<?php echo URLROOT; ?>/storages/tableindexes/<?php echo $_SESSION['StorageDB'] ?>"><button class="px-4 py-2 rounded-lg bg-gray-200 hover:bg-gray-500"> Refresh
            <i class="las la-redo-alt"></i>
        </button>
    </a>
</div>

<div class="overflow-x-auto relative shadow-md">
    <div style="height: 70vh; overflow: auto;" class="">
        <div class="block  justify-center w-full shadow-md overflow-auto sm:rounded-lg" style="max-height: 100%;">
            <table></table>
        </div>
    </div>

</div>

<?php require APPROOT . '/views/inc/footer.php'; ?>