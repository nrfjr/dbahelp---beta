<?php
$title = 'Table Monitoring';
require APPROOT . '/views/inc/header.php';
require APPROOT . '/views/inc/sidebar.php'; ?>

<div class="flex justify-between mb-5">
    <h1 class="text-3xl text-black text-white">
        <a href="<?php echo URLROOT; ?>/homepages/index/<?php echo $_SESSION['StorageDB']; ?>" class="no-underline hover:underline">Storage</a> > <b>Table Monitoring</b>
    </h1>
    <a href="<?php echo URLROOT; ?>/storages/tablemonitoring/<?php echo $_SESSION['StorageDB'] ?>?tab=<?php echo $current_tab; ?>"><button class="px-4 py-2 rounded-lg bg-gray-200 hover:bg-gray-500"> Refresh
            <i class="las la-redo-alt"></i>
        </button>
    </a>
</div>

<?php require APPROOT . '/views/inc/footer.php'; ?>