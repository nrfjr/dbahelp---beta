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

    <style>
        .font-family-lexend {
            font-family: lexend;
        }

        .bg-sidebar {
            background: #3d68ff;
        }

        .cta-btn {
            color: #3d68ff;
        }

        .upgrade-btn {
            background: #1947ee;
        }

        .upgrade-btn:hover {
            background: #0038fd;
        }

        .active-nav-link {
            box-shadow: rgba(0, 0, 0, 0.19) 0px 10px 20px, rgba(0, 0, 0, 0.23) 0px 6px 6px;
            background-image: linear-gradient(150deg, #0575E6, #021B79);
        }

        .nav-item:hover {
            background-image: linear-gradient(150deg, #1947ee, #3d68ff);
        }

        .account-link:hover {
            background: #3d68ff;
        }

        .box {
            box-shadow: rgba(0, 0, 0, 1) 0px 1px 3px, rgba(0, 0, 0, 1) 0px 1px 2px;
            padding: 25px 25px;
            border-radius: 5px;
            background-color: #2c2f33;
        }

        .top-nav {
            box-shadow: rgba(0, 0, 0, 0.19) 0px 10px 20px, rgba(0, 0, 0, 0.23) 0px 6px 6px;
        }
    </style>
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
    <script text="text/javascript" src="<?php echo URLROOT . '/public/js/font-awesomejs/font-awesome_6.2.0.js' ?>"></script>
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
<body class="bg-gray-100 font-family-lexend flex">