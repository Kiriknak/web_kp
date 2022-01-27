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
                    <p class="lg:text-4xl text-3xl font-black leading-10 text-gray-800 pt-3">Shopping Cart</p>
                    @php
                        $carts = Session::get('cart');
                        $sum = 0;
                    @endphp

                    @foreach ($carts as $cartItem)
                        @php
                            $barang = \App\Models\Barang::where('id', $cartItem['id'])->first();
                        @endphp

                        <div class="md:flex items-strech py-8 md:py-10 lg:py-8 border-t border-gray-50">
                            <div class="md:w-4/12 2xl:w-1/4 w-full">
                                <img src="{{ asset('images/' . $barang->file_path) }}" alt=""
                                    class="h-32 object-center  md:block hidden object-contain" />
                                <img src="{{ asset('images/' . $barang->file_path) }}" alt=""
                                    class="md:hidden w-full h-32 object-center object-cover round" />
                            </div>
                            <div class="md:pl-3 md:w-8/12 2xl:w-3/4 flex flex-col justify-center">
                                <p class="text-xs leading-3 text-gray-800 md:pt-0 pt-4">#{{ $barang->id }}</p>
                                <div class="flex items-center justify-between w-full pt-1">
                                    <p class="text-base font-black leading-none text-gray-800">{{ $barang->name }}</p>

                                </div>

                                <div class="flex items-center justify-between pt-5">
                                    <form action="{{ route('cart.update', $cartItem['id']) }}" method="POST">
                                        @csrf
                                        @method('put')
                                        <div class="flex items-center">
                                            <button data-action="decrement"
                                                class=" text-gray-700 border border-gray-700 hover:bg-gray-700 hover:text-white focus:ring-4 focus:ring-gray-300 font-medium rounded-full text-sm p-2.5 text-center inline-flex items-center">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none"
                                                    viewBox="0 0 24 24" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                        d="M20 12H4" />
                                                </svg>

                                            </button>
                                            <input type="number"
                                                class="focus:outline-none text-center  bg-gray-300 font-semibold text-md hover:text-black focus:text-black  md:text-basecursor-default  text-gray-700  outline-none"
                                                name="qty" value="{{ $cartItem['qty'] }}"></input>
                                            <button data-action="increment" type=""
                                                class="text-gray-700 border border-gray-700 hover:bg-gray-700 hover:text-white focus:ring-4 focus:ring-gray-300 font-medium rounded-full text-sm p-2.5 text-center inline-flex items-center">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none"
                                                    viewBox="0 0 24 24" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                        d="M12 4v16m8-8H4" />
                                                </svg>

                                            </button>


                                    </form>
                                </div>
                                <p class="text-base font-black leading-none text-gray-800">Rp.{{ $barang->price }}</p>
                                @php
                                    $sum += $barang->price * $cartItem['qty'];
                                @endphp
                            </div>
                        </div>
                </div>
                @endforeach





            </div>
            <div class="lg:w-96 md:w-8/12 w-full bg-gray-100 h-full">
                <div
                    class="flex flex-col lg:h-screen h-auto lg:px-8 md:px-7 px-4 lg:py-20 md:py-10 py-6 justify-between overflow-y-auto">
                    {{-- <div>
                            <p class="lg:text-4xl text-3xl font-black leading-9 text-gray-800">Summary</p>
                            <div class="flex items-center justify-between pt-16">
                                <p class="text-base leading-none text-gray-800">Subtotal</p>
                                <p class="text-base leading-none text-gray-800">$9,000</p>
                            </div>

                        </div> --}}
                    <div>
                        <div class="flex items-center pb-6 justify-between lg:pt-5 pt-20">
                            <p class="text-2xl leading-normal text-gray-800">Total</p>
                            <p class="text-2xl font-bold leading-normal text-right text-gray-800">Rp.{{ $sum }}
                            </p>
                        </div>
                        <button onclick="location.href='{{ route('penjualan.order') }} '"
                            class="text-base leading-none w-full py-5 bg-gray-800 border-gray-800 border focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-800 text-white">Checkout</button>
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
