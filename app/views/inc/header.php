<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo  SITENAME . " | " . $title ?></title>
    <meta name="author" content="David Grzyb">
    <meta name="description" content="">
    <link rel="icon" href="<?php echo URLROOT; ?>/public/img/kcc.png" />

    <!-- Tailwind -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/tailwindcss/2.2.19/tailwind.min.css" rel="stylesheet">
    <!--Flowbite-->
    <!-- <link rel="stylesheet" href="https://unpkg.com/flowbite@1.5.3/dist/flowbite.min.css" /> -->
    <!-- Apex Chart -->
    <link rel="stylesheet" href="/public/css/stylemy.css">
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
            background: #1947ee;
        }

        .nav-item:hover {
            background: #1947ee;
        }

        .account-link:hover {
            background: #3d68ff;
        }

        .gradientz{
            background-image: linear-gradient(10deg,rgb(29, 145, 207) ,rgb(99 102 241));
        }
        
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
            background-color: rgb(75 85 99);
            padding: 25px 25px;
            border-radius: 4px;
            border: 3px solid #fff9;

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


        @media only screen and (min-height: 500px){
                /* .maxh{
                    max-height: 37vh;
                }
                .widgets{
                    position: absolute;
                    bottom: 0.5rem;
                    border: cyan 1px solid
                } */
                .show-table{
                    height: 40vh;
                }
                .create-card{
                    height: 40vh;
                    border: purple 1px solid
                }
                .show-tb-txt{
                    font-size: 0.7rem; /* 12px */
                    line-height: 1px; /* 16px */
                    padding: 4px 6px;
                }
                
            }
        @media only screen and (min-height: 600px){
                .maxh{
                    max-height: 37vh;
                }
                .widgets{
                    position: absolute;
                    bottom: 0.5rem;

                }
                .show-table{
                    height: 45vh;

                }
                .create-card{
                    height: 53vh;
                    border: black 1px solid
                }
            }
            @media only screen and (min-height: 650px){
                .maxh{
                    max-height: 43vh;
                }
                .widgets{
                    position: absolute;
                    bottom: 0.5rem;
  
                }

                .show-table{
                    height: 50.5vh;

                }
                .create-card{
                    height: 50.5vh;
                    border: red 1px solid
                }

                /* .show-tb-txt{ 
                    border: 1px solid black;
                    font-size: 0.7rem;
                    line-height: 1px; 
                    padding: 1rem 1.5rem;
                    word-wrap: break-word;
                } */
            }

        @media only screen and (min-height: 700px){
                .show-table{
                    height: 57vh;
                }
                .create-card{
                    height: 57vh;
                    border: cyan 1px solid
                }
                /* .sidebar-menus{

                } */

                .maxh{
                max-height: 15rem;
                }
                .widgets{
                    position: absolute;
                    bottom: 0.5rem;
                }
                
            }

            @media only screen and (min-height: 750px){
                .maxh{
                    max-height: 20rem;
                }
                .widgets{
                    /* animation-name: response_sidebar;
                    animation-duration: 1.5s;
                    transition: ease-in-out;
                    animation-fill-mode: forwards;
                    animation-direction: normal; */
                    position: absolute;
                    bottom: 0.5rem;
                }
                .show-table{
                    height: 56vh;
                }
                .create-card{
                    height: 56vh;
                    border: gray 1px solid
                }
                /* @keyframes response_sidebar{
                    from{
                        position:relative;
                    }
                    50%{
                        position: absolute;
                        bottom: 14.55rem;
                    }
                    100%{
                        position: absolute;
                        bottom: 0.5rem;
                    }
                } */
            }

        @media only screen and (min-height: 800px){
                .show-table{
                    height: 58vh;
                }
                .create-card{
                    height: 58vh;
                    border: green 1px solid
                }
                /* .sidebar-menus{

                } */
                .widgets{
                    /* animation-name: response_sidebar;
                    animation-duration: 1.5s;
                    transition: ease-in-out;
                    animation-fill-mode: forwards;
                    animation-direction: normal; */
                    position: absolute;
                    bottom: 0.5rem;
                }
                /* @keyframes response_sidebar{
                    from{
                        position:relative;
                    }
                    50%{
                        position: absolute;
                        bottom: 14.55rem;
                    }
                    100%{
                        position: absolute;
                        bottom: 0.5rem;
                    }
                } */
                .maxh{
                    max-height: 26rem;
                }
                
            }

            @media only screen and (min-height: 900px){
                .maxh{
                    max-height: 25rem;
                }
            }

            @media only screen and (min-height: 1080px){
                .show-table{
                    height: 67vh;
                }
                .create-card{
                    height: 70vh;
                    border: blue 1px solid
                }
                /* .sidebar-menus{

                } */
                
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
</head>

<body class="bg-gray-100 font-family-lexend flex">