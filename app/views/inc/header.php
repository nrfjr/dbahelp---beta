<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo  SITENAME . " | " . $title ?></title>
    <meta name="description" content="">
    <link rel="icon" href="<?php echo URLROOT; ?>/public/img/kcc.png" />

    <link rel="stylesheet" href="<?php echo URLROOT . '/public/css/extstyle.css' ?>" />
    <link rel="stylesheet" href="<?php echo URLROOT . '/public/css/body_loader.css' ?>" />

    <!-- Tailwind -->
    <link rel="stylesheet" href="<?php echo URLROOT . '/public/css/tailwindcss/tailwind_2.2.19.css' ?>" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lexend:400,700&display=swap" />
    <!-- Quill CSS -->
    <link rel="stylesheet" href="<?php echo URLROOT . '/public/css/quillcss/quill.snow.css' ?>" />
    <link rel="stylesheet" href="<?php echo URLROOT . '/public/css/quillcss/quill.bubble.css' ?>" />
    <!-- Sidebar CSS -->
    <link rel="stylesheet" href="<?php echo URLROOT . '/public/css/sidebar.css' ?>" />

    <!-- JQuery -->
    <script text="text/javascript" src="<?php echo URLROOT . '/public/js/jquery_1.3.0/jquery.min.js' ?>"></script>
    <script text="text/javascript" src="<?php echo URLROOT . '/public/js/jquery_3.2.1/jquery.slim.min.js' ?>"></script>
    <script text="text/javascript" src="<?php echo URLROOT . '/public/js/jquery_1.8.3/jquery.min.js' ?>"></script>
    <!-- Body Loader JS -->
    <script type="text/javascript" src="<?php echo URLROOT . '/public/js/body-loader.js' ?>"></script>
    <!-- Spinner -->
    <script type="text/javascript" href="<?php echo URLROOT . '/public/js/spinner.js' ?>"></script>
    <!-- AlpineJS -->
    <script text="text/javascript" src="<?php echo URLROOT . '/public/js/alpinejs/alpine_5.3.5.js' ?>"></script>
    <!-- Font Awesome -->
    <script text="text/javascript" src="<?php echo URLROOT . '/public/js/font-awesomejs/font-awesome_6.2.1.js' ?>"></script>
    <!-- ChartJS -->
    <script text="text/javascript" src="<?php echo URLROOT . '/public/js/chartjs/chart_3.9.1.js' ?>"></script>
    <!--FlowBite-->
    <script text="text/javascript" src="<?php echo URLROOT . '/public/js/flowbitejs/flowbite_1.5.3.js' ?>"></script>
    <!--Apex Chart-->
    <script text="text/javascript" src="<?php echo URLROOT . '/public/js/apexchartjs/apexchart_3.36.2.js' ?>"></script>
    <!-- Moment -->
    <script text="text/javascript" src="<?php echo URLROOT . '/public/js/momentjs/moment.js' ?>"></script>
    <!-- Custom Tooltip Position -->
    <script type="text/javascript" src="<?php echo URLROOT . '/public/js/customtooltip.js' ?>"></script>
    <!-- SideNavHideFunc -->
    <script type="text/javascript" src="<?php echo URLROOT . '/public/js/sideNav.js' ?>"></script>
    <!-- SideNavBtnFunc -->
    <script type="text/javascript" src="<?php echo URLROOT . '/public/js/sidebar-toggle-btn.js' ?>"></script>
    <!-- Quill JS -->
    <script text="text/javascript" src="<?php echo URLROOT . '/public/js/quilljs/quill.js' ?>"></script>
    <!-- Table Sort -->
    <script src="<?php echo URLROOT . '/public/js/sortablejs/sortable.js' ?>"></script>
    <!-- DB STAT-Tabslide -->
    <script type="text/javascript" src="<?php echo URLROOT . '/public/js/dbstats_tabslide.js' ?>"></script>
    <!-- Delete Archive Modal -->
    <script type="text/javascript" src="<?php echo URLROOT . '/public/js/deleteArchivemodal.js' ?>"></script>
    <!-- Redo Log File Chart Pop JS -->
    <script type="text/javascript" src="<?php echo URLROOT . '/public/js/RedologZoomPop.js' ?>"></script>
    <!-- Redo Log File Chart Pop JS -->
    <script type="text/javascript" src="<?php echo URLROOT . '/public/js/profilebanner.js' ?>"></script>
</head>

<div id="loaderz" class="loader cursor-wait">
            <div>
            <div class="spinner flex justify-start items-center">
                <div class="lds-ripple">

                <svg class="absolute hidden">
                    <filter id="white-glow" x="-20" y="-20" width="50" height="50" > <feOffset result="offOut" in="SourceGraphic" dx="0" dy="0" /> <feColorMatrix result="matrixOut" in="offOut" type="matrix" values=" 1 0 0 0 0 0 1 0 0 0 0 0 1 0 0 0 0 0 1 0" /> <feGaussianBlur result="blurOut" in="matrixOut" stdDeviation="30" /> <feBlend in="SourceGraphic" in2="blurOut" mode="normal" /> </filter>
                </svg>
                <svg>


                    <circle cx="50%" cy="50%" r="70"></circle>
                    <circle cx="50%" cy="50%" r="50"></circle>
                    <circle cx="50%" cy="50%" r="35"></circle>
                    <circle cx="50%" cy="50%" r="25"></circle>
                    <circle cx="50%" cy="50%" r="15"></circle>
                    <circle cx="50%" cy="50%" r="8" filter="url(#white-glow)"></circle>
                </svg>
            </div>
            </div>
</div>
</div>
<body class="bg-gray-100 font-family-lexend flex" onload="applyColor()">
    <!--Delete Archive Modals-->
    <div id="delArchivemodal" class=" hidden flex absolute justify-center items-center z-20 h-screen w-screen bg-gray-900 bg-opacity-30">
        <div id="confirmDelArc" class="flex flex-col bg-white rounded-lg px-4 py-2 z-30 divide-y divide-light-blue-400 ">
            <div class="py-4 flex justify-between"><b class="text-xl tracking-widest">Delete Archives</b><i class="fa-solid fa-circle-exclamation text-2xl animate-pulse text-red-500"></i></div>
            <div class="flex flex-col gap-4 py-6 items-center tracking-wide">
                <p>You are about to perform deletion of the Archives</p>
                <p>Are you really sure about deleting the Archives of <?php echo $_SESSION['HomepageDB'];?>?</p>
            </div>
            <div class="py-4 flex justify-end gap-6 items-center">
                <a href="<?php echo URLROOT; ?>/homepages/delete_archive/<?php echo $_SESSION['HomepageDB']; ?>"><button class="w-24 py-2 bg-red-600 text-white rounded-md">Yes</button></a>
                <button onclick="delArchiveModalClose()" class="w-24 py-2 border-2 border-gray-200 rounded-md">Cancel</button>
            </div>
        </div>
    </div> 
    <!--Delete Archive Modals--> 