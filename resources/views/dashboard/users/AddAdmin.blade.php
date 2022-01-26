@extends('dashboard.main')

@section('content-dashboard')
    <main>



        <div class="p-4 bg-white block sm:flex items-center justify-between border-b border-gray-200 lg:mt-1.5">
            <div class="mb-1 w-full">
                <div class="mb-4">
                    <nav class="flex mb-5" aria-label="Breadcrumb">
                        <ol class="inline-flex items-center space-x-1 md:space-x-2">
                            <li class="inline-flex items-center">
                                <a href="/" class="text-gray-700 hover:text-gray-900 inline-flex items-center">
                                    <svg class="w-5 h-5 mr-2.5" fill="currentColor" viewBox="0 0 20 20"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M10.707 2.293a1 1 0 00-1.414 0l-7 7a1 1 0 001.414 1.414L4 10.414V17a1 1 0 001 1h2a1 1 0 001-1v-2a1 1 0 011-1h2a1 1 0 011 1v2a1 1 0 001 1h2a1 1 0 001-1v-6.586l.293.293a1 1 0 001.414-1.414l-7-7z">
                                        </path>
                                    </svg>
                                    Home
                                </a>
                            </li>
                            <li>
                                <div class="flex items-center">
                                    <svg class="w-6 h-6 text-gray-400" fill="currentColor" viewBox="0 0 20 20"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd"
                                            d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
                                            clip-rule="evenodd"></path>
                                    </svg>
                                    <a href="{{ route('dashboard') }}"
                                        class="text-gray-700 hover:text-gray-900 ml-1 md:ml-2 text-sm font-medium">Dashboard</a>
                                </div>
                            </li>
                            <li>
                                <div class="flex items-center">
                                    <svg class="w-6 h-6 text-gray-400" fill="currentColor" viewBox="0 0 20 20"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd"
                                            d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
                                            clip-rule="evenodd"></path>
                                    </svg>
                                    <a href="{{ route('dashboard') }}"
                                        class="text-gray-700 hover:text-gray-900 ml-1 md:ml-2 text-sm font-medium">Barang</a>
                                </div>
                            </li>
                            <li>
                                <div class="flex items-center">
                                    <svg class="w-6 h-6 text-gray-400" fill="currentColor" viewBox="0 0 20 20"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd"
                                            d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
                                            clip-rule="evenodd"></path>
                                    </svg>
                                    <span class="text-gray-400 ml-1 md:ml-2 text-sm font-medium"
                                        aria-current="page">Add</span>
                                </div>
                            </li>
                        </ol>
                    </nav>
                </div>
                <div class="  top-4   z-50 justify-center items-center h-auto  flex" id="add-product-modal"
                    aria-modal="true" role="dialog">
                    <div class="relative w-full max-w-2xl px-4 h-full md:h-auto">

                        <div class="bg-white rounded-lg shadow relative">

                            <div class="flex items-start justify-between p-5 border-b rounded-t">
                                <h3 class="text-xl font-semibold">
                                    Tambah User
                                </h3>

                            </div>

                            <div class="p-6 space-y-6">
                                <form action="{{ route('admin.store') }}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    <div class="grid grid-cols-6 gap-6">

                                        <div class="col-span-full ">
                                            <label for="email" class="text-sm font-medium text-gray-900 block mb-2">Email
                                            </label>
                                            <input type="email" name="email" id="email"
                                                class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-cyan-600 focus:border-cyan-600 block w-full p-2.5"
                                                placeholder="" required="">
                                        </div>


                                        <div class="col-span-6 sm:col-span-3">
                                            <label for="password"
                                                class="text-sm font-medium text-gray-900 block mb-2">Password</label>
                                            <input type="password" name="password" id="password"
                                                class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-cyan-600 focus:border-cyan-600 block w-full p-2.5"
                                                placeholder="" required="">
                                        </div>
                                        <div class="col-span-6 sm:col-span-3">
                                            <label for="password_confirmation"
                                                class="text-sm font-medium text-gray-900 block mb-2">Konfirmasi
                                                Password</label>
                                            <input type="password" name="password_confirmation" id="password_confirmation"
                                                class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-cyan-600 focus:border-cyan-600 block w-full p-2.5"
                                                placeholder="" required="">
                                        </div>






                                    </div>

                            </div>

                            <div class="p-6 border-t border-gray-200 rounded-b">
                                <button
                                    class="text-white bg-yellow-500 hover:bg-yellow-600 focus:ring-4 focus:ring-yellow-200 font-medium rounded-lg text-sm px-5 py-2.5 text-center"
                                    type="submit">Add Users</button>
                            </div>
                            </form>
                        </div>
                    </div>
                </div>
    </main>


@endsection
