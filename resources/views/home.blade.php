@extends('layouts.main')

@section('content')
    {{-- {{ dd($user = Auth::user()) }} --}}


    <!-- This example requires Tailwind CSS v2.0+ -->
    <div class="container mx-auto relative overflow-hidden">

        <main class="mt-10 mx-auto max-w-7xl px-4 sm:mt-12 sm:px-6 md:mt-16 lg:mt-20 lg:px-8 xl:mt-28">
            <div class="sm:text-center lg:text-left">
                <h1 class="text-4xl tracking-tight font-extrabold text-gray-900 sm:text-5xl md:text-6xl">
                    <span class="block xl:inline">Lorem ipsum</span>
                    <span class="block text-yellow-600 xl:inline">Dolor sit amet</span>
                </h1>
                <p class="mt-3 text-base text-gray-500 sm:mt-5 sm:text-lg sm:max-w-xl sm:mx-auto md:mt-5 md:text-xl lg:mx-0">
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque aliquet, neque eu iaculis semper, est
                    elit consectetur tellus, at dignissim ante urna at urna. Vestibulum finibus vulputate arcu. Fusce risus
                    ligula, feugiat vitae accumsan eget, malesuada venenatis lorem. Etiam porta, massa sed molestie
                    placerat, tortor tortor pretium neque, ut molestie erat ex vitae metus. Praesent ultrices magna vel
                    posuere dictum. Praesent fringilla massa libero, id pretium lorem vulputate

                </p>
                <div class="mt-5 sm:mt-8 sm:flex sm:justify-center lg:justify-start ">
                    <div class="rounded-md shadow">
                        <a href="#"
                            class="w-full flex items-center justify-center px-8 py-3 border border-transparent text-base font-medium rounded-md text-white bg-yellow-600 hover:bg-yellow-700 md:py-4 md:text-lg md:px-10">
                            Get started
                        </a>
                    </div>
                    <div class="mt-3 sm:mt-0 sm:ml-3">
                        <a href="#"
                            class="w-full flex items-center justify-center px-8 py-3 border border-transparent text-base font-medium rounded-md text-yellow-700 bg-yellow-100 hover:bg-yellow-200 md:py-4 md:text-lg md:px-10">
                            View Catalog
                        </a>
                    </div>
                </div>
            </div>


            <div class="container  lg:inline-flex md:flex-wrap flex-row	  mx-auto  mt-6">

                @php
                    use App\Models\Barang;
                    $barangs = Barang::latest()
                        ->take(5)
                        ->get();
                @endphp

                @foreach ($barangs as $barang)
                    <div
                        class="w-96   bg-white rounded-lg border border-gray-200 shadow-md container  my-12 mx-auto px-4 md:px-12 ">
                        <div class="w-full flex -mx-1 lg:-mx-4 flex-wrap ">
                            <a href="{{ route('items.show', $barang->id) }}">
                                <div class="place-self-center">
                                    <img class="rounded-t-lg object-contain h-64  mx-auto my-3 "
                                        src="{{ asset('images/' . $barang->file_path) }}" alt="">
                                </div>
                            </a>
                            <div class="p-5 mx-5 ">
                                <a href="{{ route('items.show', $barang->id) }}"
                                    class="mb-2 text-2xl font-bold tracking-tight text-gray-900 ">{{ $barang->name }}</h5>
                                </a>
                                <p class="mb-3 font-normal text-gray-700 ">{{ $barang->description }}</p>
                                <p class="mb-3 font-normal text-gray-700 ">Rp.{{ $barang->price }}</p>
                                <form action="{{ route('cart.add', $barang->id) }}" method="POST">
                                    @csrf
                                    <button type="submit"
                                        class="inline-flex items-center py-2 px-3 text-sm font-medium text-center text-white bg-yellow-600 rounded-lg hover:bg-yellow-700 focus:ring-4 focus:ring-yellow-300 ">
                                        Add to cart
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                                            class="text-white fill-white h-4 w-4 ml-1" fill="#000000">
                                            <path d="M0 0h24v24H0V0z" fill="none" />
                                            <path
                                                d="M11 9h2V6h3V4h-3V1h-2v3H8v2h3v3zm-4 9c-1.1 0-1.99.9-1.99 2S5.9 22 7 22s2-.9 2-2-.9-2-2-2zm10 0c-1.1 0-1.99.9-1.99 2s.89 2 1.99 2 2-.9 2-2-.9-2-2-2zm-8.9-5h7.45c.75 0 1.41-.41 1.75-1.03l3.86-7.01L19.42 4l-3.87 7H8.53L4.27 2H1v2h2l3.6 7.59-1.35 2.44C4.52 15.37 5.48 17 7 17h12v-2H7l1.1-2z" />
                                        </svg>
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                @endforeach
        </main>
    </div>
    </div>

@endsection
