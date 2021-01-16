<x-layouts.app>
    <x-container>
        @if (session('msg'))
        <Toastr text_msg="{{ session('msg') }}" text_classes="success"></Toastr>
        @endif
        <div class=" flex justify-between mt-6">
            <div class=" flex text-sm items-center justify-center">
                <p class=" hover:text-teal-500"><a href="/">Home</a></p>
                <i style="font-size: 9px; transform: translateY(1px)"
                    class="fas fa-chevron-right text-gray-500 mx-2"></i>
                @if (request()->is('shop/my-account*'))
                <p class=" text-teal-400">My Account</p>
                @endif
            </div>
            <p class="text-xl font-extrabold uppercase">My Account</p>
        </div>
        <hr class=" h-px w-full bg-gray-200 my-8 opacity-25">
        <div class=" grid grid-cols-8 gap-x-8">
            <div class=" col-span-3 bg-gray-100">
                <div class=" p-6">
                    <ul>
                        <li class=" py-3 my-3 border-b border-gray-200 hover:text-teal-400"><a
                                href="{{ route('my-account') }}">Info</a></li>
                        <li class=" py-3 my-3 border-b border-gray-200 hover:text-teal-400"><a href="">Orders</a></li>
                        <li class=" py-3 my-3 border-b border-gray-200 hover:text-teal-400"><a
                                href="{{ route('account-address') }}">Addresses</a>
                        </li>
                        <li class=" py-3 my-3 border-b border-gray-200 hover:text-teal-400"><a
                                href="{{ route('account-details') }}">Account
                                details</a></li>
                        <li class=" py-3 mt-3 hover:text-teal-400">
                            <form action="{{ route('logout') }}" method="post">
                                @csrf
                                <button class=" focus:outline-none" type="submit">Logout</button>
                            </form>
                        </li>
                    </ul>
                </div>
            </div>
            <div class=" col-span-5">
                {{ $slot }}
            </div>
        </div>
    </x-container>
</x-layouts.app>