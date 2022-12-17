<?php
$title = 'My Profile';
require APPROOT . '/views/inc/header.php';
require APPROOT . '/views/inc/sidebar.php'; ?>

<div class="flex justify-between mb-5">
    <h1 class="text-3xl text-black text-white">
        <b><?php echo $_SESSION['firstname'] ?>'s Profile</b>
    </h1>
    <!-- <button onclick="window.location.reload()" class="px-4 py-2 rounded-lg bg-gray-200 hover:bg-gray-500"> Refresh<i class="ml-2 fas fa-redo"></i></button> -->
</div>
<div class="relative flex flex-col justify-between h-fit rounded-md box" style="padding: 0;">
    <div class="relative flex flex-row w-full">
        <img class="h-96 w-full rounded-t-md" src="<?php echo URLROOT; ?>/public/img/banner.jpg">
        <!-- <div class="h-96 w-full rounded-md bg-white"></div> -->
    </div>
    <div class="flex relative" style="margin: 0; padding:0;">
        <div class="absolute -top-24 sm:-top-24 md:-top-32 lg:-top-40 w-full flex justify-start z-10 px-10 rounded-full">
            <img class="w-40 h-40 md:w-44 md:h-44 xl:w-52 xl:h-52 border-2 border-sky-500 rounded-full m-0 p-0" src="<?php echo URLROOT; ?>/public/img/user.png">
        </div>
    </div>
    <?php if (!empty($data)) { ?>
        <div class="pt-24 px-8 pb-8 relative flex lg:flex-row items-center justify-evenly gap-6 h-fit xl:h-1/2 w-full">
            <div class="flex gap-6 w-full justify-between">
                <div class="border rounded-lg shadow-inner flex flex-col bg-gradient-to-r from-red-100 via-gray-100 to-indigo-100 w-full h-full p-6">
                    <font class="text-xs self-start">Firstname</font>
                    <font class="font-bold text-lg self-center"><?php echo $data['Firstname'] ?></font>
                </div>
                <div class="border rounded-lg shadow-inner flex flex-col bg-gradient-to-r from-red-100 via-gray-100 to-indigo-100 w-full h-full p-6">
                    <font class="text-xs self-start">Middlename</font>
                    <font class="font-bold text-lg self-center"><?php echo $data['Middlename'] ?></font>
                </div>
                <div class="border rounded-lg shadow-inner flex flex-col bg-gradient-to-r from-red-100 via-gray-100 to-indigo-100 w-full h-full p-6">
                    <font class="text-xs self-start">Lastname</font>
                    <font class="font-bold text-lg self-center"><?php echo $data['Lastname'] ?></font>
                </div>
            </div>
        </div>
        <div class="px-8 pb-8">
            <div class="flex w-full gap-6 justify-between">
                <div class="border rounded-lg shadow-inner flex flex-col bg-gradient-to-r from-red-100 via-gray-100 to-indigo-100 w-full h-full p-6">
                    <font class="text-xs self-start">Employee ID</font>
                    <font class="font-bold text-lg self-center"><?php echo $data['User Id'] ?></font>
                </div>
                <div class="border rounded-lg shadow-inner flex flex-col bg-gradient-to-r from-red-100 via-gray-100 to-indigo-100 w-full h-full p-6">
                    <font class="text-xs self-start">IP Address</font>
                    <font class="font-bold text-lg self-center"><?php echo $data['IP'] ?></font>
                </div>
            </div>
        </div>
    <?php } else { ?>
        <div class="pt-24 px-8 pb-8 relative flex lg:flex-row items-center justify-evenly gap-6 h-fit xl:h-1/2 w-full">
        <div class="border rounded-lg shadow-inner text-xl flex text-center flex-col bg-gradient-to-r from-red-100 via-gray-100 to-indigo-100 w-full h-full p-6"><em>No Profile Details Available.</em></div>
        </div>
    <?php } ?>
</div>
<?php require APPROOT . '/views/inc/footer.php'; ?>