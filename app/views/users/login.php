<!DOCTYPE html>
<html>

<head>

    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="icon" href="<?php echo URLROOT; ?>/public/img/kcc.png" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="<?php echo URLROOT.'/public/css/loginanimatebg.css'?>">

    <script src="//unpkg.com/alpinejs" defer></script>
    <script src="https://cdn.tailwindcss.com"></script>
    <script text="text/javascript" src="<?php echo URLROOT.'/public/js/logingreet.js'?>"></script>
    <title><?php echo SITENAME ?> | Signin</title>

</head>

<body onload="typeWriter()" class="h-screen w-full bg-gradient-to-r from-cyan-500 to-indigo-500 overflow-hidden relative">
    <div class="box z-10">
        <div onclick="colorChange()" class="Odd"></div>
        <div onclick="colorChange()" class="Even"></div> 
        <div onclick="colorChange()" class="odd"></div> 
        <div onclick="colorChange()" class="even"></div> 
        <div onclick="colorChange()" class="extra"></div>
        <div onclick="colorChange()" class="even"></div>
        <div onclick="colorChange()" class="odd"></div> 
        <div onclick="colorChange()" class="even"></div> 
        <div onclick="colorChange()" class="extra"></div> 
        <div onclick="colorChange()" class="even"></div>  
    </div>
    <div id="login" class="flex justify-center m-auto pb-20 h-screen items-center">
        <div class="w-1/2 p-6 z-20 mx-auto bg-white rounded-md shadow-lg dark:bg-gray-700 mt-20">
            <div class="grid grid-rows-1 grid-flow-col h-fit">
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
                            <input id="username" name="username" type="text" onkeyup="this.value = this.value.toUpperCase();" class="relative block w-full appearance-none rounded-sm px-3 py-2 bg-gray-900 text-white placeholder-gray-500 focus:z-10 focus:border-indigo-500 focus:outline-none focus:ring-indigo-500 sm:text-sm" required value="<?php echo $data==null?'':$data['username'];?>">
                        </div>
                        <div>
                            <div class="pb-1">
                                <label for="password" class="text-start text-gray-400">
                                    <b>
                                        PASSWORD <font color="red">*</font>
                                    </b>
                                </label>
                            </div>
                            <input id="password" name="password" type="password" autocomplete="current-password" class="relative block w-full appearance-none rounded-sm px-3 py-2 bg-gray-900 text-white placeholder-gray-500 focus:z-10 focus:border-indigo-500 focus:outline-none focus:ring-indigo-500 sm:text-sm" required>
                            <a href="#" class="text-sm text-indigo-600 hover:text-indigo-500">Forgot your password?</a>
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
                <div class="flex justify-center w-auto">
                    <img class="object-cover m-auto h-30 w-52" src="<?php echo URLROOT; ?>/public/img/kcc-w-tagline.png" alt="company">
                </div>
            </div>
        </div>
    </div>

    <footer class="fixed bottom-0 left-0 w-full flex items-center justify-start font-bold bg-indigo-500 text-white h-10 mt-24 opacity-90 md:justify-center">
        <p class="ml-2 absolute left-0">Copyright &copy; 2022, All Rights reserved</p>
    </footer>
</body>
<script text="text/javascript" src="<?php echo URLROOT.'/public/js/loginbgcolorchanger.js'?>"></script>

</html>