@extends('layouts.main')
@section('content')

    <div class="w-full h-full bg-black bg-opacity-90  overflow-y-auto pt-5 " id="chec-div">
        <div class="w-full absolute z-10 right-0 h-full transform translate-x-0 transition ease-in-out duration-700"
            id="checkout">
            <div class="flex items-end lg:flex-row flex-col justify-end" id="cart">
                <div class="lg:w-1/2 md:w-8/12 w-full lg:px-8 lg:py-14 md:px-6 px-4 md:py-8 py-4 bg-white overflow-y-auto lg:h-screen h-auto"
                    id="scroll">
                    <div class="flex items-center text-gray-500 hover:text-gray-600 cursor-pointer">

                    </div>
                    <p class="lg:text-4xl text-3xl font-black leading-10 text-gray-800 pt-3">Checkout</p>
                    @php
                        $carts = Session::get('cart');
                        $sum = 0;
                    @endphp

                    @if (Session::has('msg'))

                        <div id="alert-2" class="flex p-4 m-4 bg-green-100 w-fit rounded-lg dark:bg-green-200" role="alert"
                            onclick="remove(this)">
                            <svg class="flex-shrink-0 w-5 h-5 text-green-700 dark:text-green-800" fill="currentColor"
                                viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
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


                            <div id="alert-2" class="flex p-4 m4-4 bg-red-100 w-fit rounded-lg dark:bg-red-200" role="alert"
                                onclick="remove(this)">
                                <svg class="flex-shrink-0 w-5 h-5 text-red-700 dark:text-red-800" fill="currentColor"
                                    viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
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
                        @php
                            $user = Auth::user();
                            $customer = $user->customer;
                        @endphp

                        <div class="grid grid-cols-6 gap-6">



                            <div class="col-span-6 sm:col-span-3">
                                <label for="name" class="text-sm font-medium text-gray-900 block mb-2">Nama</label>
                                <input type="text" name="name" id="name"
                                    class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-cyan-600 focus:border-cyan-600 block w-full p-2.5"
                                    placeholder="" required="" value="{{ $customer->nama }}" disabled>
                            </div>


                            <div class="col-span-full">
                                <label for="alamat" class="text-sm font-medium text-gray-900 block mb-2">Alamat</label>
                                <textarea id="alamat" rows="3" name="alamat" disabled
                                    class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-cyan-600 focus:border-cyan-600 block w-full p-4"
                                    placeholder="">{{ $customer->alamat }}</textarea>
                            </div>
                            <div class="col-span-6 sm:col-span-3">
                                <label for="phone" class="text-sm font-medium text-gray-900 block mb-2">Telepon</label>
                                <input type="text" name="phone" id="phone" disabled
                                    class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-cyan-600 focus:border-cyan-600 block w-full p-2.5"
                                    placeholder="" required="" value="{{ $customer->telepon }}">
                            </div>

                            <div class="col-span-6 sm:col-span-3">
                                <label for="kodepos" class="text-sm font-medium text-gray-900 block mb-2">Kodepos</label>
                                <input type="number" name="kodepos" id="kodepos" disabled
                                    class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-cyan-600 focus:border-cyan-600 block w-full p-2.5"
                                    placeholder="" required="" value="{{ $customer->kodepos }}">
                            </div>

                            <div class="col-span-6 sm:col-span-3">
                                <label for="kabupaten"
                                    class="text-sm font-medium text-gray-900 block mb-2">Kabupaten</label>
                                <input type="text" name="kabupaten" id="kabupaten" disabled
                                    class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-cyan-600 focus:border-cyan-600 block w-full p-2.5"
                                    placeholder="" required="" value="{{ $customer->kabupaten }}">
                            </div>
                            <div class="col-span-6 sm:col-span-3">
                                <label for="state" class="text-sm font-medium text-gray-900 block mb-2">Provinsi</label>
                                <input type="text" name="state" id="state" disabled
                                    class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-cyan-600 focus:border-cyan-600 block w-full p-2.5"
                                    placeholder="" required="" value="{{ $customer->provinsi }}">
                            </div>



                        </div>

                    </div>

                    <div class="p-6 border-t border-gray-200 rounded-b">

                    </div>






                </div>
                <div class="lg:w-96 md:w-8/12 w-full bg-gray-100 h-full">
                    <div
                        class="flex flex-row lg:h-screen h-auto lg:px-8 md:px-7 px-4 lg:py-20 md:py-10 py-6 justify-between overflow-y-auto">
                        {{-- <div>
                            <p class="lg:text-4xl text-3xl font-black leading-9 text-gray-800">Summary</p>
                            <div class="flex items-center justify-between pt-16">
                                <p class="text-base leading-none text-gray-800">Subtotal</p>
                                <p class="text-base leading-none text-gray-800">$9,000</p>
                            </div>

                        </div> --}}
                        @php
                            $sum = 0;
                        @endphp
                        <div class="flex flex-col space-y-4">
                            @foreach ($carts as $cartItem)
                                @php
                                    $barang = \App\Models\Barang::where('id', $cartItem['id'])->first();
                                    
                                @endphp
                                <div class="flex space-x-4 mt-4 ">
                                    <div>
                                        <img src="{{ asset('images/' . $barang->file_path) }}" alt="image"
                                            class="h-32 w-40 object-scale-down rounded-md	">
                                    </div>
                                    <div>
                                        <h2 class="text-xl font-bold">{{ $barang->name }}</h2>
                                        <span
                                            class=" text-xs">{{ 'Rp.' . $barang->price . ' x ' . $cartItem['qty'] }}</span><br>
                                        <span class=" text-xs">Rp. {{ $barang->price * $cartItem['qty'] }}</span>
                                        @php
                                            $sum += $barang->price * $cartItem['qty'];
                                        @endphp
                                    </div>

                                </div>
                            @endforeach

                            <div class="flex items-center pb-6 justify-between lg:pt-5 pt-20">
                                <p class="text-2xl leading-normal text-gray-800">Total</p>
                                <p class="text-2xl font-bold leading-normal text-right text-gray-800">
                                    Rp.{{ $sum }}
                                </p>
                            </div>
                            <form method="POST" action="{{ route('penjualan.place') }}">
                                @csrf
                                <button type="submit"
                                    class="text-base leading-none w-full py-5 bg-gray-800 border-gray-800 border focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-800 text-white">Checkout</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
    <script>
        function decrement(e) {
            const btn = e.target.parentNode.parentElement.querySelector(
                'button[data-action="decrement"]'
            );
            const target = btn.nextElementSibling;
            let value = Number(target.value);
            if (value > 0) {
                value--;
            }
            target.value = value;
        }

        function increment(e) {
            const btn = e.target.parentNode.parentElement.querySelector(
                'button[data-action="decrement"]'
            );
            const target = btn.nextElementSibling;
            let value = Number(target.value);
            value++;
            target.value = value;
        }

        const decrementButtons = document.querySelectorAll(
            `button[data-action="decrement"]`
        );

        const incrementButtons = document.querySelectorAll(
            `button[data-action="increment"]`
        );

        decrementButtons.forEach(btn => {
            btn.addEventListener("click", decrement);
        });

        incrementButtons.forEach(btn => {
            btn.addEventListener("click", increment);
        });
    </script>

@endsection
