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
                                    <a href="{{ route('barang.index') }}"
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
                                        aria-current="page">Edit</span>
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
                                    Edit product
                                </h3>

                            </div>
                            @if (Session::has('msg'))

                                <div id="alert-2" class="flex p-4 m-4 bg-green-100 w-fit rounded-lg dark:bg-green-200"
                                    role="alert" onclick="remove(this)">
                                    <svg class="flex-shrink-0 w-5 h-5 text-green-700 dark:text-green-800"
                                        fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd"
                                            d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z"
                                            clip-rule="evenodd"></path>
                                    </svg>
                                    <div class="ml-3 text-sm font-medium text-green-700 dark:text-green-800">
                                        <li>{{ Session::get('msg') }}</li>
                                    </div>

                                </div>
                            @endif

                            @if ($errors->any())
                                @foreach ($errors->all() as $error)


                                    <div id="alert-2" class="flex p-4 m4-4 bg-red-100 w-fit rounded-lg dark:bg-red-200"
                                        role="alert" onclick="remove(this)">
                                        <svg class="flex-shrink-0 w-5 h-5 text-red-700 dark:text-red-800"
                                            fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                            <path fill-rule="evenodd"
                                                d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z"
                                                clip-rule="evenodd"></path>
                                        </svg>
                                        <div class="ml-3 text-sm font-medium text-red-700 dark:text-red-800">
                                            <li>{{ $error }}</li>
                                        </div>

                                    </div>
                                @endforeach

                            @endif

                            <div class="p-6 space-y-6">
                                <form method="post" action="{{ route('barang.update', $barang) }}"
                                    enctype="multipart/form-data">
                                    @csrf
                                    @method('put')
                                    <input type="hidden" name="id" value="{{ $barang->id }}" <div
                                        class="grid grid-cols-6 gap-6">
                                    <div class="col-span-6 sm:col-span-3">
                                        <label for="nama" class="text-sm font-medium text-gray-900 block mb-2">Nama
                                            Barang</label>
                                        <input type="text" name="name" id="name"
                                            class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-cyan-600 focus:border-cyan-600 block w-full p-2.5"
                                            placeholder="" required="" value="{{ $barang->name }}">
                                    </div>
                                    <div class="col-span-6 sm:col-span-3">
                                        <label for="price"
                                            class="text-sm font-medium text-gray-900 block mb-2">Price</label>
                                        <input type="number" name="price" id="price"
                                            class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-cyan-600 focus:border-cyan-600 block w-full p-2.5"
                                            placeholder="" required="" value="{{ $barang->price }}">
                                    </div>
                                    <div class="col-span-full">
                                        <label for="description" class="text-sm font-medium text-gray-900 block mb-2">Detail
                                            Barang</label>
                                        <textarea id="description" rows="6" name="description"
                                            class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-cyan-600 focus:border-cyan-600 block w-full p-4"
                                            placeholder="e.g. 3.8GHz 8-core 10th-generation Intel Core i7 processor, Turbo Boost up to 5.0GHz, Ram 16 GB DDR4 2300Mhz"
                                            value="">{{ $barang->description }}</textarea>
                                    </div>
                                    <div class="col-span-full">
                                        <div class="m-4">
                                            <label class="inline-block mb-2 text-gray-500">Upload Gambar</label>
                                            <img class="img-preview img-fluid mb-3 col-sm-5  object-contain	"
                                                src="{{ asset('images/' . $barang->file_path) }} ">
                                            <div class="flex items-center justify-center w-full">
                                                <label
                                                    class="flex flex-col w-full h-32 border-4 border-blue-200 border-dashed hover:bg-gray-100 hover:border-gray-300">
                                                    <div class="flex flex-col items-center justify-center pt-7">
                                                        <svg xmlns="http://www.w3.org/2000/svg"
                                                            class="w-8 h-8 text-gray-400 group-hover:text-gray-600"
                                                            fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                                stroke-width="2"
                                                                d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12" />
                                                        </svg>
                                                        <p
                                                            class="pt-1 text-sm tracking-wider text-gray-400 group-hover:text-gray-600">
                                                            Attach a file</p>
                                                    </div>
                                                    <input type="file" class="opacity-0" name="image"
                                                        onchange="previewImage()" id="image" />
                                                </label>
                                            </div>
                                        </div>
                                    </div>

                            </div>

                        </div>

                        <div class="p-6 border-t border-gray-200 rounded-b">
                            <button
                                class="text-white bg-yellow-500 hover:bg-yellow-600 focus:ring-4 focus:ring-yellow-200 font-medium rounded-lg text-sm px-5 py-2.5 text-center"
                                type="submit">Edit product</button>
                        </div>
                        </form>
                    </div>
                </div>
            </div>
    </main>
    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" defer></script>

    <script>
        function previewImage() {
            const image = document.querySelector('#image');
            const imgPreview = document.querySelector('.img-preview ');

            imgPreview.style.display = 'block';

            const oFReader = new FileReader();
            oFReader.readAsDataURL(image.files[0]);

            oFReader.onload = function(oFREvent) {
                imgPreview.src = oFREvent.target.result;
            }

        }
    </script>

@endsection
