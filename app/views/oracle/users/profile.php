<?php
$title = 'My Profile';
require APPROOT . '/views/inc/header.php';
require APPROOT . '/views/inc/sidebar.php'; ?>

<div class="flex justify-between mb-5">
    <h1 class="text-3xl text-black text-white">
        <b><?php echo $_SESSION['firstname'] ?>'s Profile</b>
    </h1>
    <div>
        <button id="dropdownDefault" data-dropdown-toggle="dropdown-colors" data-dropdown-placement="right-start" type="button" class="shadow-md flex justify-center items-center rounded-lg bg-gray-800 w-10 h-10 p-2" style="padding:0;">
            <div id="colorIcon" class=" z-10 w-8 h-8 rounded-md" style="background: radial-gradient(circle, rgba(255,0,0,1) 5%, rgba(255,244,0,1) 14%, rgba(26,254,0,1) 23%, rgba(0,253,251,1) 35%, rgba(0,21,252,1) 50%, rgba(244,0,251,1) 63%, rgba(250,0,93,1) 74%, rgba(250,0,25,1) 86%);">
            </div>
        </button>
        <div id="dropdown-colors" class="whitespace-normal hidden z-10 w-fit bg-gray-800 rounded divide-y divide-gray-100 shadow dark:bg-gray-700">
            <ul class="flex justify-evenly flex-wrap rounded-md text-sm text-gray-700 dark:text-gray-200 w-40 gap-2 p-2" aria-labelledby="dropdownDefault">
                <li>
                    <button class="z-10 w-8 h-8 rounded-md" onclick='getColor("#000046","#1CB5E0");' style="background: linear-gradient(90deg,#000046,#1CB5E0);"></button>
                </li>
                <li>
                    <button class="z-10 w-8 h-8 rounded-md" onclick='getColor("#007991","#78ffd6");' style="background: linear-gradient(90deg,#007991,#78ffd6);"></button>
                </li>
                <li>
                    <button class="z-10 w-8 h-8 rounded-md" onclick='getColor("#F2994A","#F2C94C");' style="background: linear-gradient(90deg,#F2994A,#F2C94C);"></button>
                </li>
                <li>
                    <button class="z-10 w-8 h-8 rounded-md" onclick='getColor("#EB5757","#000000");' style="background: linear-gradient(90deg,#EB5757,#000000);"></button>
                </li>
                <li>
                    <button class="z-10 w-8 h-8 rounded-md" onclick='getColor("#E44D26","#F16529");' style="background: linear-gradient(90deg,#E44D26,#F16529);"></button>
                </li>
                <li>
                    <button class="z-10 w-8 h-8 rounded-md" onclick='getColor("#4AC29A","#BDFFF3");' style="background: linear-gradient(90deg,#4AC29A,#BDFFF3);"></button>
                </li>
                <li>
                    <button class="z-10 w-8 h-8 rounded-md" onclick='getColor("#B2FEFA","#0ED2F7");' style="background: linear-gradient(90deg,#B2FEFA,#0ED2F7);"></button>
                </li>
                <li>
                    <button class="z-10 w-8 h-8 rounded-md" onclick='getColor("#30E8BF","#FF8235");' style="background: linear-gradient(90deg,#30E8BF,#FF8235);"></button>
                </li>
                <li>
                    <button class="z-10 w-8 h-8 rounded-md" onclick='getColor("#D66D75","#E29587");' style="background: linear-gradient(90deg,#D66D75,#E29587);"></button>
                </li>
                <li>
                    <button class="z-10 w-8 h-8 rounded-md" onclick='getColor("#20002c","#cbb4d4");' style="background: linear-gradient(90deg,#20002c,#cbb4d4);"></button>
                </li>
                <li>
                    <button class="z-10 w-8 h-8 rounded-md" onclick='getColor("#C33764","#1D2671");' style="background: linear-gradient(90deg,#C33764,#1D2671);"></button>
                </li>
            </ul>
        </div>
    </div>
    <!-- <button onclick="window.location.reload()" class="px-4 py-2 rounded-lg bg-gray-200 hover:bg-gray-500"> Refresh<i class="ml-2 fas fa-redo"></i></button> -->
</div>
<div class="relative flex flex-col justify-between h-fit rounded-md box" style="padding: 0;">
    <div class="relative flex flex-row w-full">
        <img id="defaultimage" class="h-96 w-full rounded-t-md" src="<?php echo URLROOT; ?>/public/img/banner.jpg">
        <div id="banner" class="hidden h-96 w-full rounded-md bg-white"></div>
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