<?php 
    $url = 'http://' . $_SERVER['SERVER_NAME'] . $_SERVER['REQUEST_URI'];
?>

<aside class="relative bg-indigo-400 h-screen w-64 hidden sm:block shadow-xl">
        <div class="p-6">
            <a href="<?php echo URLROOT;?>/pages/dashboard" class="text-white text-3xl font-semibold hover:text-gray-300"><?php echo SITENAME?></a>
        </div>
        <nav class="text-white text-base font-semibold pt-3 ">
            <a href="<?php echo URLROOT;?>/pages/dashboard" class="flex items-center py-4 pl-6 nav-item text-white <?php if (strpos($url, 'dashboard')) {echo 'active-nav-link';} else {echo ' opacity-75';}?>">
                <i class="fas fa-tachometer-alt mr-3"></i>
                Dashboard
            </a>
            <a href="<?php echo URLROOT;?>/users/show"  class="flex items-center hover:opacity-100 py-4 pl-6 nav-item text-white <?php if (strpos($url, 'create')){ echo 'active-nav-link ';}else{echo 'opacity-75';}?>">
                <i class="fas fa-user-cog mr-3"></i>
                Manage Users
            </a>
            <a href="#" class="flex items-center text-white opacity-75 hover:opacity-100 py-4 pl-6 nav-item">
                <i class="fas fa-table mr-3"></i>
                Tables (soon...)
            </a>
            <a href="#" class="flex items-center text-white opacity-75 hover:opacity-100 py-4 pl-6 nav-item">
                <i class="fas fa-align-left mr-3"></i>
                Servers (soon...)
            </a>
            <a href="#" class="flex items-center text-white opacity-75 hover:opacity-100 py-4 pl-6 nav-item">
                <i class="fas fa-tablet-alt mr-3"></i>
                Databases (soon...)
            </a>
            <a href="#" class="flex items-center text-white opacity-75 hover:opacity-100 py-4 pl-6 nav-item">
                <i class="fas fa-calendar mr-3"></i>
                Reports (soon...)
            </a>
        </nav>
    </aside>
    <div class="w-full flex flex-col h-screen overflow-y-hidden">
        <!-- Desktop Header -->
        <header class="w-full items-center bg-gray-600 py-2 px-6 hidden sm:flex">
            <div class="w-1/2"></div>
            <div x-data="{ isOpen: false }" class="relative w-1/2 flex justify-end">
            <?php if(isset($_SESSION['username'])): ?>
                <h4 class="py-1 px-2 text-white"><?php echo  '<b>'.$_SESSION['username'].'</b>' ?></h4>
            <?php endif; ?>
                <button @click="isOpen = !isOpen" class="realtive z-10 w-12 h-12 rounded-full overflow-hidden border-4 border-gray-400 hover:border-gray-300 focus:border-gray-300 focus:outline-none">
                    <img src="<?php echo URLROOT; ?>/public/img/user.png">
                </button>
                <button x-show="isOpen" @click="isOpen = false" class="h-full w-full fixed inset-0 cursor-default"></button>
                <div x-show="isOpen" class="absolute w-32  bg-gray-400 rounded-lg shadow-lg py-2 mt-16">
                    <a href="<?php echo URLROOT; ?>/users/logout" class="block text-white text-center px-4 py-2 account-link hover:text-white">Sign Out</a>
                </div>
            </div>
        </header>
            <main class="flex-grow p-6 bg-gray-800">