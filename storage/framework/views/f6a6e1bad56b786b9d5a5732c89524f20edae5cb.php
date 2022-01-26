<!-- This example requires Tailwind CSS v2.0+ -->
<nav class="bg-yellow-100  shadow-lg border-b  fixed z-20 w-full">
    <div class="max-w-7xl mx-auto px-2 sm:px-6 lg:px-8">
        <div class="relative flex items-center justify-between h-16">
            <div class="absolute inset-y-0 left-0 flex items-center sm:hidden">
                <!-- Mobile menu button-->
                <button type="button"
                    class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-white hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-inset focus:ring-white"
                    aria-controls="mobile-menu" aria-expanded="false" name="mobile-menu-button" id="mobile-menu-button">
                    <span class="sr-only">Open main menu</span>
                    <!--
            Icon when menu is closed.

            Heroicon name: outline/menu

            Menu open: "hidden", Menu closed: "block"
          -->
                    <svg class="block h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor" aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M4 6h16M4 12h16M4 18h16" />
                    </svg>
                    <!--
            Icon when menu is open.

            Heroicon name: outline/x

            Menu open: "block", Menu closed: "hidden"
          -->
                    <svg class="hidden h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor" aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
            <div class="flex-1 flex items-center justify-center sm:items-stretch sm:justify-start">
                <div class="flex-shrink-0 flex items-center">
                    <div>
                        <!-- Website Logo -->
                        <a href="#" class="flex items-center py-4 px-2">
                            <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/5/53/Google_%22G%22_Logo.svg/1200px-Google_%22G%22_Logo.svg.png"
                                alt="Logo" class="h-8 w-8 mr-2">
                            <span class="font-semibold text-gray-500  text-lg">Golegole</span>
                        </a>
                    </div>
                </div>
                <div class="hidden sm:block sm:ml-6">
                    <div class="flex space-x-4">
                        <!-- Current: "bg-gray-900 text-white", Default: "text-gray-300 hover:bg-gray-700 hover:text-white" -->
                        <div class="hidden md:flex items-center space-x-1">
                            <a href="/"
                                class="py-4 px-2 text-yellow-500 border-b-4 border-yellow-500 font-semibold hover:bg-yellow-500 hover:text-white transition duration-300 transform hover:scale-110">Home</a>
                            <a href=""
                                class="py-4 px-2 text-gray-500 font-semibold hover:text-yellow-500 hover:bg-yellow-100 transition duration-300 transform hover:scale-110 ">Products</a>
                            <a href="/about"
                                class="py-4 px-2 text-gray-500 font-semibold hover:text-yellow-500 hover:bg-yellow-100 transition duration-300 transform hover:scale-110">About</a>
                            <a href=""
                                class="py-4 px-2 text-gray-500 font-semibold hover:text-yellow-500 hover:bg-yellow-100 focus-within:transition duration-300 transform hover:scale-110">Contact
                                Us</a>
                        </div>

                    </div>
                </div>
            </div>

            <div class="absolute inset-y-0 right-0 flex items-center pr-2 sm:static sm:inset-auto sm:ml-6 sm:pr-0">

                <?php if(auth()->guard()->check()): ?>

                    <div class="container">
                        <button name="dropdownInformationButton" id="dropdownInformationButton"
                            data-dropdown-toggle="dropdownInformation"
                            class="text-white bg-yellow-500 hover:bg-yellow-600 focus:ring-4  focus:ring-yellow-300  font-medium rounded-lg text-sm px-4 py-2.5 text-center inline-flex items-center "
                            type="button"><svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20"
                                fill="currentColor">
                                <path fill-rule="evenodd" d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z"
                                    clip-rule="evenodd" />
                            </svg>
                            <svg class="ml-2 w-4 h-4 md:ml-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7">
                                </path>
                            </svg></button>

                        <div id="dropdownInformation"
                            class="hidden z-10 w-44 text-base flex-row list-none  top-auto absolute   right-4  rounded divide-y  shadow bg-gray-700 divide-gray-600">
                            <div class="py-3 px-4  text-white">
                                <span class="block text-sm"><?php echo e($user->name); ?></span>
                                <span class="block text-sm font-medium truncate"><?php echo e($user->email); ?></span>
                            </div>
                            <ul class="py-1">

                                <?php if($user->isAdmin()): ?>
                                    <li>
                                        <a href="<?php echo e(route('dashboard')); ?>"
                                            class="block py-2 px-4 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">Dashboard</a>
                                    </li>
                                <?php endif; ?>

                                <li>
                                    <a href="#"
                                        class="block py-2 px-4 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">Settings</a>
                                </li>
                                <li>
                                    <a href="#"
                                        class="block py-2 px-4 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">Earnings</a>
                                </li>
                            </ul>
                            <div class="py-1">
                                <a href="<?php echo e(route('logout')); ?>"
                                    class="block py-2 px-4 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">Sign
                                    out</a>
                            </div>
                        </div>
                        <div>
                        <?php else: ?>

                            <a href="/login"
                                class="py-2 px-2 font-medium text-gray-500 rounded hover:bg-yellow-500 hover:text-white transition duration-300 transform  hover:scale-110">Log
                                In</a>
                            <a href="/register"
                                class="py-2 px-2 font-medium text-white bg-yellow-500 rounded hover:bg-yellow-700 transition duration-300 transform hover:scale-110">Sign
                                Up</a>

                        <?php endif; ?>
                    </div>
                    <!-- Mobile menu button -->

                </div>

            </div>
        </div>
    </div>

    <!-- Mobile menu, show/hide based on menu state. -->
    <div class="hidden mobile-menu" id="mobile-menu">
        <div class="px-2 pt-2 pb-3 space-y-1">
            <!-- Current: "bg-gray-900 text-white", Default: "text-gray-300 hover:bg-gray-700 hover:text-white" -->
            <ul class="">
                <li class="active"><a href="/"
                        class="block  px-2 py-4 text-white bg-yellow-500 font-semibold">Home</a></li>
                <li><a href="#services"
                        class="block  px-2 py-4 hover:bg-yellow-500 transition duration-300">Services</a>
                </li>
                <li><a href="/about" class="block  px-2 py-4 hover:bg-yellow-500 transition duration-300">About</a>
                </li>
                <li><a href="#contact" class="block  px-2 py-4 hover:bg-yellow-500 transition duration-300">Contact
                        Us</a></li>
            </ul>
        </div>
    </div>
</nav>


<script type="text/javascript">
    const btn = document.querySelector("#mobile-menu-button");
    const menu = document.querySelector("#mobile-menu");

    btn.addEventListener("click", function() {
        menu.classList.toggle("hidden");
    });

    let dropbtn = document.querySelector("#dropdownInformationButton");
    let dropmenu = document.querySelector("#dropdownInformation");

    if (dropbtn) {

        dropbtn.addEventListener("click", function() {
            dropmenu.classList.toggle("hidden");
        });
    }
</script>
<?php /**PATH C:\xampp\htdocs\web\resources\views/layouts/navbar.blade.php ENDPATH**/ ?>