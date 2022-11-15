<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo  SITENAME . " | " . $title ?></title>
    <meta name="description" content="">
    <link rel="icon" href="<?php echo URLROOT; ?>/public/img/kcc.png" />

    <!-- Tailwind -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/tailwindcss/2.2.19/tailwind.min.css" rel="stylesheet">
    <!--Flowbite-->
    <!-- <link rel="stylesheet" href="https://unpkg.com/flowbite@1.5.3/dist/flowbite.min.css" /> -->
    <!-- Apex Chart -->

    
    <style>
        @import url('https://fonts.googleapis.com/css?family=Lexend:400,700&display=swap');

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
            /* background: #1947ee; */
            box-shadow: rgba(0, 0, 0, 0.19) 0px 10px 20px, rgba(0, 0, 0, 0.23) 0px 6px 6px;
            background-image: linear-gradient(150deg, #0575E6, #021B79);
        }

        .nav-item:hover {
            background-image: linear-gradient(150deg, #1947ee, #3d68ff);
        }

        .account-link:hover {
            background: #3d68ff;
        }

        /* to be separated */
        h1, h2, h3, h4, h5, h6, strong {
            font-weight: 600;
        }

        .box .apexcharts-xaxistooltip {
            background: #1B213B;
            color: #fff;
        }

        .content-area {
            max-width: 1280px;
            margin: 0 auto;
        }

        .box {
            box-shadow: rgba(0, 0, 0, 1) 0px 1px 3px, rgba(0, 0, 0, 1) 0px 1px 2px;
            padding: 25px 25px;
            border-radius: 4px;
            border: 1px solid #99ccff;

        }

        .columnbox {
            padding-right: 15px;
        }
        .radialbox {
            max-height: 333px;
            margin-bottom: 60px;
        }

        .apexcharts-legend-series tspan:nth-child(3) {
            font-weight: bold;
            font-size: 20px;
        }

        .spinner-border {
            display: none;
        }

        .scrollbar-hide::-webkit-scrollbar {
            display: none;
        }

        /* For IE, Edge and Firefox */
        .scrollbar-hide {
            -ms-overflow-style: none;  /* IE and Edge */
            scrollbar-width: none;  /* Firefox */
        }

        @media only screen and (min-height: 800px){
            .widgets{
                position: absolute;
                bottom: 0.5rem;
            }
            .maxh{
                max-height: 26rem;
            }
        }
        @media only screen and (max-height: 750px){
            .maxh{
                max-height: 20rem;
            }
            .widgets{
                position: absolute;
                bottom: 0.5rem;
            }
        }
        @media only screen and (max-height: 700px){
            .maxh{
                max-height: 15rem;
            }
            
        }
        @media only screen and (max-height: 600px){
            .maxh{
                max-height: 10rem;
            }
        }
        @media only screen and (min-height: 900px){
            .maxh{
                max-height: 25rem;
            }
        }
    </style>

    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
    <!-- AlpineJS -->
    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" defer></script>
    <!-- Font Awesome -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/js/all.min.js" integrity="sha256-KzZiKy0DWYsnwMF+X1DvQngQ2/FxF7MF3Ff72XcpuPs=" crossorigin="anonymous"></script>
    <!-- ChartJS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.9.1/chart.min.js"></script>
    <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.min.js" integrity="sha256-R4pqcOYV8lt7snxMQO/HSbVCFRPMdrhAFMH+vr9giYI=" crossorigin="anonymous"></script> -->
    <!--FlowBite-->
    <script src="https://unpkg.com/flowbite@1.5.3/dist/flowbite.js"></script>
    <!--Apex Chart-->
    <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.22.2/moment.min.js"></script>
    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.3.0/jquery.min.js"></script>
</head>

<body class="bg-gray-100 font-family-lexend flex">