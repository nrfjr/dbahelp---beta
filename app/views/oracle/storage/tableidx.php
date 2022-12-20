<?php
$title = 'Table Indexes';
require APPROOT . '/views/inc/header.php';
require APPROOT . '/views/inc/sidebar.php'; ?>

<div class="flex justify-between mb-5">
    <h1 class="text-3xl text-black text-white">
        <a href="<?php echo URLROOT; ?>/homepages/index/<?php echo $_SESSION['StorageDB']; ?>" class="no-underline hover:underline">Storage</a> > <b>Table Indexes</b>
    </h1>
    <button onclick="window.location.reload()" class="px-4 py-2 rounded-lg bg-gray-200 hover:bg-gray-500"> Refresh<i class="ml-2 fas fa-redo"></i></button>
    </a>
</div>

<div class="flex justify-center">
    <h1 class="text-white text-xl">Coming Soon . . .</h1>
</div>

<?php require APPROOT . '/views/inc/footer.php'; ?>
