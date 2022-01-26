

<?php $__env->startSection('content'); ?>
    <div class="mx-auto container flex items-center pt-4">
        <div class="w-full pt-2 p-4">

            <div class="mx-auto md:p-6 md:w-1/2">
                <div class="flex flex-wrap justify-between">
                    <h1 class="text-2xl text-gray  p-4">
                        Sign-in
                    </h1>
                    <a href="#home" class="mt-8 text-yellow-400 hover:text-yellow-600 transition duration-500">
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
                    <form method="POST" action="/login">
                        <?php echo csrf_field(); ?>
                        <div class="mb-8 ">
                            <label for="email" class="block text-gray-700 text-sm font-bold mb-2">
                                Email
                            </label>
                            <div class="mt-1 relative rounded-md shadow-sm w-64  max-w-[75%]">
                                <div class="absolute inset-y-0 right-0 pr-3 flex items-center pointer-events-none">
                                    <svg class="h-5 w-5 text-gray-400" fill="none" stroke-linecap="round"
                                        stroke-linejoin="round" stroke-width="2" stroke="currentColor" viewBox="0 0 24 24">
                                        <path d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z">
                                        </path>
                                    </svg>
                                </div>
                                <input id="email" name="email" type="email"
                                    class="block w-64 max-w-full pr-10 shadow appearance-none border-2
                                      rounded  py-2 px-4 text-gray-700 mb-3 
                                     leading-tight focus:outline-none focus:bg-white focus:border-yellow-500 transition duration-500 ease-in-out " />
                            </div>


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
                                    class="block pr-10 max-w-full shadow appearance-none border-2  
                                     rounded w-64 py-2 px-4 text-gray-700 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-yellow-500 transition duration-500 ease-in-out">
                            </div>
                        </div>

                        <?php $__errorArgs = ['errors.auth'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>

                            <span class="text-red-500 font-extralight text-sm my-auto">
                                <strong>Email / Password Salah</strong>
                            </span>
                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>

                        

                        <div class="my-4 ">
                            <button
                                class="transition duration-500 bg-yellow-500 hover:bg-yellow-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline"
                                type="submit">
                                Login
                            </button>
                        </div>
                        <div class="mt-8">
                            <p class="text-sm">
                                Belum punya akun?
                                <a class="font-bold text-sm text-yellow-500 hover:text-yellow-800 pr-16"
                                    href="<?php echo e(route('register')); ?>">
                                    Daftar Disini
                                </a>
                            </p>
                        </div>
                    </form>


                </div>
            </div>
        </div>
    </div>


<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\web\resources\views/auth/login.blade.php ENDPATH**/ ?>