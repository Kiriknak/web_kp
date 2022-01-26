

<?php $__env->startSection('content'); ?>
    <div class="mx-auto container flex items-center pt-4">
        <div class="w-full pt-2 p-4">

            <div class="mx-auto md:p-6 md:w-1/2">
                <div class="flex flex-wrap justify-between">
                    <h1 class="text-2xl text-gray  p-4">
                        <i class="fas fa-sign-in-alt fa-fw fa-lg"></i>
                        Registrasi
                    </h1>
                    <a href="/" class="mt-8 text-yellow-400 hover:text-yellow-600 transition duration-500">
                        <svg class=" w-6 h-6 inline-block align-bottom" fill="none" stroke-linecap="round"
                            stroke-linejoin="round" stroke-width="2" stroke="currentColor" viewBox="0 0 24 24">
                            <path
                                d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6">
                            </path>
                        </svg>
                        Back to Home
                        <i class="fas fa-chevron-circle-left fa-fw"></i>
                    </a>
                </div>

                <div class="bg-white shadow-xl rounded pl-24 pt-6 pb-8 mb-4 border-gray border-2">
                    <form method="POST" action="/register" id="registerForm">
                        <?php echo csrf_field(); ?>
                        <div class="mb-8 ">
                            <label for="email" class="block text-gray-700 text-sm font-bold mb-2">
                                Email
                            </label>
                            <div class="mt-1 relative rounded-md shadow-sm w-64  max-w-[75%]">
                                <div class="absolute inset-y-0 right-0 pr-3 flex items-center pointer-events-none">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 fill-gray-400"" viewBox=" 0 0 20
                                        20">
                                        <path fill-rule="evenodd"
                                            d="M14.243 5.757a6 6 0 10-.986 9.284 1 1 0 111.087 1.678A8 8 0 1118 10a3 3 0 01-4.8 2.401A4 4 0 1114 10a1 1 0 102 0c0-1.537-.586-3.07-1.757-4.243zM12 10a2 2 0 10-4 0 2 2 0 004 0z"
                                            clip-rule="evenodd" />
                                    </svg>
                                </div>
                                <input name="email" id="email" type="email"
                                    class="block pr-10 max-w-full shadow appearance-none border-2 border-gray-300
                                     rounded w-64 py-2 px-4 text-gray-700 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-yellow-500 transition duration-500 ease-in-out">

                            </div>
                            <strong class=" hidden text-red-500 text-xs italic" id="username-tip">Harap
                                Masukkan
                                Email</strong>
                        </div>


                        <div class="mb-8">
                            <label for="password" class="block text-gray-700 text-sm font-bold mb-2">
                                Password
                            </label>
                            <div class="mt-1 relative rounded-md shadow-sm w-64 max-w-[75%]">
                                <div class="absolute inset-y-0 right-0 pr-3 flex items-center pointer-events-none">
                                    <svg class="h-5 w-5 text-gray-400" fill="none" stroke-linecap="round"
                                        stroke-linejoin="round" stroke-width="2" stroke="currentColor" viewBox="0 0 24 24">
                                        <path
                                            d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z">
                                        </path>
                                    </svg>
                                </div>
                                <input name="password" id="password" type="password"
                                    class="block pr-10 max-w-full shadow appearance-none border-2 border-gray-300
                                     rounded w-64 py-2 px-4 text-gray-700 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-yellow-500 transition duration-500 ease-in-out">
                            </div>
                        </div>

                        <div class="mb-8">
                            <label for="password_confirmation" class="block text-gray-700 text-sm font-bold mb-2">
                                Konfirmasi Password
                            </label>
                            <div class="mt-1 relative rounded-md shadow-sm w-64 max-w-[75%]">
                                <div class="absolute inset-y-0 right-0 pr-3 flex items-center pointer-events-none">
                                    <svg class="h-5 w-5 text-gray-400" fill="none" stroke-linecap="round"
                                        stroke-linejoin="round" stroke-width="2" stroke="currentColor" viewBox="0 0 24 24">
                                        <path
                                            d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z">
                                        </path>
                                    </svg>
                                </div>
                                <input name="password_confirmation" id="password_confirmation" type="password"
                                    class="block pr-10 max-w-full shadow appearance-none border-2  border-gray-300
                                     rounded w-64 py-2 px-4 text-gray-700 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-yellow-500 transition duration-500 ease-in-out">
                            </div>
                        </div>




                        <div class="mb-8">
                            <label for="phone" class="block text-gray-700 text-sm font-bold mb-2">
                                Nama
                            </label>
                            <div class="mt-1 relative rounded-md shadow-sm w-64 max-w-[75%]">
                                <div class="absolute inset-y-0 right-0 pr-3 flex items-center pointer-events-none">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 fill-gray-400"
                                        viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                                    </svg>
                                </div>
                                <input name="name" id="name" type="text"
                                    class="block pr-10 max-w-full shadow appearance-none border-2  border-gray-300
                                     rounded w-64 py-2 px-4 text-gray-700 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-yellow-500 transition duration-500 ease-in-out">
                            </div>
                        </div>

                        <div class="mb-8">
                            <label for="phone" class="block text-gray-700 text-sm font-bold mb-2">
                                Nomor Telepon
                            </label>
                            <div class="mt-1 relative rounded-md shadow-sm w-64 max-w-[75%]">
                                <div class="absolute inset-y-0 right-0 pr-3 flex items-center pointer-events-none">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 fill-gray-400"
                                        viewBox="0 0 20 20" fill="currentColor">
                                        <path
                                            d="M2 3a1 1 0 011-1h2.153a1 1 0 01.986.836l.74 4.435a1 1 0 01-.54 1.06l-1.548.773a11.037 11.037 0 006.105 6.105l.774-1.548a1 1 0 011.059-.54l4.435.74a1 1 0 01.836.986V17a1 1 0 01-1 1h-2C7.82 18 2 12.18 2 5V3z" />
                                    </svg>
                                </div>
                                <input name="phone" id="phone" type="text"
                                    class="block pr-10 max-w-full shadow appearance-none border-2  border-gray-300
                                     rounded w-64 py-2 px-4 text-gray-700 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-yellow-500 transition duration-500 ease-in-out">
                            </div>
                        </div>
                        <div class="mb-8">
                            <label for="alamat" class="block text-gray-700 text-sm font-bold mb-2">
                                Alamat
                            </label>
                            <div class="mt-1 relative rounded-md shadow-sm w-64 max-w-[75%]">
                                <div class="absolute inset-y-0 right-0 pr-3 flex items-center pointer-events-none">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-gray-400" fill="none"
                                        viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
                                    </svg>
                                </div>
                                <textarea name="alamat" id="alamat" form="registerForm"
                                    class="block pr-10 max-w-full shadow appearance-none border-2  border-gray-300
                                     rounded w-64 py-2 px-4 text-gray-700 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-yellow-500 transition duration-500 ease-in-out"></textarea>
                            </div>
                        </div>
                        <div class="mb-8">
                            <label for="kodepos" class="block text-gray-700 text-sm font-bold mb-2">
                                Kodepos
                            </label>
                            <div class="mt-1 relative rounded-md shadow-sm w-64 max-w-[75%]">
                                <div class="absolute inset-y-0 right-0 pr-3 flex items-center pointer-events-none">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-gray-400" fill="none"
                                        viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
                                    </svg>
                                </div>
                                <input name="kodepos" id="kodepos" type="number"
                                    class="block pr-10 max-w-full shadow appearance-none border-2  border-gray-300
                                     rounded w-64 py-2 px-4 text-gray-700 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-yellow-500 transition duration-500 ease-in-out">
                            </div>
                        </div>
                        <div class="mb-8">
                            <label for="kodepos" class="block text-gray-700 text-sm font-bold mb-2">
                                Kabupaten/Kota
                            </label>
                            <div class="mt-1 relative rounded-md shadow-sm w-64 max-w-[75%]">
                                <div class="absolute inset-y-0 right-0 pr-3 flex items-center pointer-events-none">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-gray-400" fill="none"
                                        viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
                                    </svg>
                                </div>
                                <input name="kabupaten" id="kabupaten" type="text"
                                    class="block pr-10 max-w-full shadow appearance-none border-2  border-gray-300
                                     rounded w-64 py-2 px-4 text-gray-700 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-yellow-500 transition duration-500 ease-in-out">
                            </div>
                        </div>
                        <div class="mb-8">
                            <label for="kodepos" class="block text-gray-700 text-sm font-bold mb-2">
                                Provinsi
                            </label>
                            <div class="mt-1 relative rounded-md shadow-sm w-64 max-w-[75%]">
                                <div class="absolute inset-y-0 right-0 pr-3 flex items-center pointer-events-none">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-gray-400" fill="none"
                                        viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
                                    </svg>
                                </div>
                                <input name="state" id="state" type="text"
                                    class="block pr-10 max-w-full shadow appearance-none border-2  border-gray-300
                                     rounded w-64 py-2 px-4 text-gray-700 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-yellow-500 transition duration-500 ease-in-out">
                            </div>
                        </div>



                        <?php if($errors->any()): ?>
                            <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>


                                <div id="alert-2" class="flex p-4 mb-4 bg-red-100 w-64 rounded-lg dark:bg-red-200"
                                    role="alert" onclick="remove(this)">
                                    <svg class="flex-shrink-0 w-5 h-5 text-red-700 dark:text-red-800" fill="currentColor"
                                        viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd"
                                            d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z"
                                            clip-rule="evenodd"></path>
                                    </svg>
                                    <div class="ml-3 text-sm font-medium text-red-700 dark:text-red-800">
                                        <li><?php echo e($error); ?></li>
                                    </div>

                                </div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                        <?php endif; ?>
                        <div class="mb-4 ">
                            <button
                                class="transition duration-500 bg-yellow-500 hover:bg-yellow-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline"
                                type="submit">
                                Register
                            </button>
                        </div>
                        <div class="mt-8">
                            <p class="text-sm">
                                Sudah punya akun?
                                <a class="font-bold text-sm text-yellow-500 hover:text-yellow-800 pr-16" href="/login">
                                    Login Disini
                                </a>
                            </p>
                        </div>
                    </form>


                </div>
            </div>
        </div>
    </div>
    <script type="text/javascript">
        function remove(e) {
            e.parentNode.removeChild(e);
        }
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\web\resources\views/auth/register.blade.php ENDPATH**/ ?>