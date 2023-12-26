<!DOCTYPE html>
<html>

<head>

    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <script text="text/javascript" src="<?php echo URLROOT . '/public/js/alpinejs/alpine.js' ?>" defer></script>
    <link rel="icon" href="<?php echo URLROOT; ?>/public/img/kcc.png" />
    <link rel="stylesheet" href="<?php echo URLROOT . '/public/css/loginanimatebg.css' ?>" />
    <link rel="stylesheet" href="<?php echo URLROOT . '/public/css/newyear.css' ?>">

    <script text="text/javascript" src="<?php echo URLROOT . '/public/js/jquery_1.8.3/jquery.min.js' ?>"></script>
    <script text="text/javascript" src="<?php echo URLROOT . '/public/js/tailwindjs/tailwind.js' ?>"></script>
    <script text="text/javascript" src="<?php echo URLROOT . '/public/js/font-awesomejs/font-awesome_6.2.1.js'?>"></script>
    <script text="text/javascript" src="<?php echo URLROOT . '/public/js/login-frontend-utilities.js' ?>"></script>
    <style>
		@font-face{
	font-family: 'Lexend';
	src: url('http://192.168.34.202/site/public/ttf/Lexend-Bold.ttf') format('truetype'),
		url('http://192.168.34.202/site/public/ttf/Lexend-Black.ttf') format('truetype'),
		url('http://192.168.34.202/site/public/ttf/Lexend-Regular.ttf') format('truetype'),
		url('http://192.168.34.202/site/public/ttf/Lexend-ExtraBold.ttf') format('truetype'),
		url('http://192.168.34.202/site/public/ttf/Lexend-SemiBold.ttf') format('truetype'),
		url('http://192.168.34.202/site/public/ttf/Lexend-Medium.ttf') format('truetype'),
		url('http://192.168.34.202/site/public/ttf/Lexend-Thin.ttf') format('truetype'),
		url('http://192.168.34.202/site/public/ttf/Lexend-Light.ttf') format('truetype'),
		url('http://192.168.34.202/site/public/ttf/Lexend-ExtraLight.ttf') format('truetype');
		}
        .font-family-lexend {
            font-family: 'Lexend';
        }
    </style>

    <title><?php echo SITENAME ?> | Signin</title>

</head>
<body id="body" onload="newyear();changeSVGonSeason();logingreet();colorChange();" class="h-screen w-full bg-gradient-to-r font-family-lexend from-cyan-500 to-indigo-500 overflow-hidden relative">
    <div id="boxcont" class="box z-10">
        <div id="div1" onclick="colorChange()" class="Odd Div1 text-center"><i id="i1" class="odd fas fa-solid text-8xl font-light"></i></div>
        <div id="div2" onclick="colorChange()" class="Even Div2 text-center"><i id="i2" class="even fas fa-solid text-8xl font-light"></i></div>
        <div id="div3" onclick="colorChange()" class="Odd Div3 text-center"><i id="i3" class="odd fas fa-solid text-8xl font-light"></i></div>
        <div id="div4" onclick="colorChange()" class="Even Div4 text-center"><i id="i4" class="even fas fa-solid text-8xl font-light"></i></div>
        <div id="div5" onclick="colorChange()" class="Extra Div5 text-center"><i id="i5" class="extra fas fa-solid text-8xl font-light"></i></div>
        <div id="div6" onclick="colorChange()" class="Even Div6 text-center"><i id="i6" class="even fas fa-solid text-8xl font-light"></i></div>
        <div id="div7" onclick="colorChange()" class="Odd Div7 text-center"><i id="i7" class="odd fas fa-solid text-8xl font-light"></i></div>
        <div id="div8" onclick="colorChange()" class="Even Div8 text-center"><i id="i8" class="even fas fa-solid text-8xl font-light"></i></div>
        <div id="div9" onclick="colorChange()" class="Extra Div9 text-center"><i id="i9" class="extra fas fa-solid text-8xl font-light"></i></div>
        <div id="div10" onclick="colorChange()" class="Even Div10 text-center"><i id="i10" class="even fas fa-solid text-8xl font-light"></i></div>
    </div>
    <div id="login" class="flex flex-col-reverse md:flex-row justify-center m-auto pb-20 h-screen items-center">
        <div class="w-1/2 p-6 z-20 mx-auto rounded-md shadow-lg bg-gray-700 mt-20">
            <div class="flex flex-col-reverse lg:grid lg:grid-rows-1 lg:grid-flow-col h-fit">
                <form class=" space-y-6" action="<?php echo URLROOT; ?>/users/login" method="POST">
                    <div class="grid grid-rows-1 gap-4">
                        <div class="text-center text-white text-xl m-auto"><strong id="greet" class="font-bold text-center text-white drop-shadow-2xl"></strong></div>
                        <div>
                            <div class="pb-1">
                                <label for="username" class="text-start text-gray-400"><b>
                                        USERNAME <font color="red">*</font>
                                    </b>
                                </label>
                            </div>
                            <input id="username" name="username" type="text" onkeyup="this.value = this.value.toUpperCase();" class="relative block w-full appearance-none rounded-sm px-3 py-2 bg-gray-900 text-white placeholder-gray-500 focus:z-10 focus:border-indigo-500 focus:outline-none focus:ring-indigo-500 sm:text-sm" required value="<?php echo $data == null ? '' : $data['username']; ?>">
                        </div>
                        <div>
                            <div class="pb-1">
                                <label for="password" class="text-start text-gray-400">
                                    <b>
                                        PASSWORD <font color="red">*</font>
                                    </b>
                                </label>
                            </div>
                            <div class="relative" x-data="{ show: true }">
                                <input id="password" name="password" :type="show ? 'password' : 'text'" autocomplete="current-password" class="relative block w-full appearance-none rounded-sm px-3 py-2 bg-gray-900 text-white placeholder-gray-500 focus:z-10 focus:border-indigo-500 focus:outline-none focus:ring-indigo-500 sm:text-sm" required>
                                <div class="absolute inset-y-0 right-0 pr-3 flex items-center text-sm leading-5">
                                    <div @click="show = !show" class="z-20">
                                        <i class="fa-solid fa-eye-slash text-indigo-600 " :class="{' fa-eye ': !show, ' fa-eye-slash ':show }" title="show/hide password"></i>
                                    </div>
                                </div>
                            </div>
                            <a href="#" onclick="alert('Just relax for a while, take a cup of water and then remember it again.');" class="text-sm text-indigo-600 hover:text-indigo-500">Forgot your password?</a>
                        </div>
                        <div x-data="{ isClicked: false}" class="mt-6 mb-6">
                            <button onclick="loadit()" type="submit" name="Signin" value="submit" class="group relative flex w-full justify-center rounded-sm border border-transparent bg-indigo-600 py-2 px-4 text-sm font-medium text-white hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">
                                <span class="absolute inset-y-0 left-0 flex items-center pl-3">
                                    <svg class="h-4 w-5 text-indigo-500 group-hover:text-indigo-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                        <path fill-rule="evenodd" d="M10 1a4.5 4.5 0 00-4.5 4.5V9H5a2 2 0 00-2 2v6a2 2 0 002 2h10a2 2 0 002-2v-6a2 2 0 00-2-2h-.5V5.5A4.5 4.5 0 0010 1zm3 8V5.5a3 3 0 10-6 0V9h6z" clip-rule="evenodd" />
                                    </svg>
                                </span>
                                Sign in
                                <svg id="loadIcon" class="hidden h-5" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 100 100" enable-background="new 0 0 0 0" xml:space="preserve">
                                    <path fill="#fff" d="M73,50c0-12.7-10.3-23-23-23S27,37.3,27,50 M30.9,50c0-10.5,8.5-19.1,19.1-19.1S69.1,39.5,69.1,50">
                                        <animateTransform attributeName="transform" attributeType="XML" type="rotate" dur="1s" from="0 50 50" to="360 50 50" repeatCount="indefinite" />
                                    </path>
                                </svg>
                            </button>
                        </div>
                    </div>
                </form>
                <div id="tag-logo-cont" class="flex justify-center w-auto p-0 hoverme">
                    <img id="tag-logo" type="button" onclick="partypopper()" draggable="false" class="object-cover my-auto h-30 w-72" src="<?php echo URLROOT; ?>/public/img/kcc-w-tagline.png" alt="company">
                    <?php
                    for ($i = 0; $i <= 48; $i++) {
                        echo '<i></i>';
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>

    <footer class="fixed bottom-0 left-0 w-full flex items-center justify-start font-bold bg-indigo-500 text-white h-10 mt-24 opacity-90 md:justify-center">
        <p class="ml-2 absolute left-0">Copyright &copy; 2022, KCC, All rights reserved.</p>
    </footer>
</body>
<script text="text/javascript" src="<?php echo URLROOT . '/public/js/loginbgcolorchanger.js' ?>"></script>

</html>