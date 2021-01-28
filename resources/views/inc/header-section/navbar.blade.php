<nav
    class=" {{ request()->is('/') ? 'bg-teal-400 h-11 sm:h-14' : 'bg-gray-800' }} rounded flex items-center text-white relative">
    <Dropdown>
        <ul slot="menu" class=" hidden md:flex font-semibold uppercase text-sm text-white">
            <li class="py-5 px-6 hover:text-gray-100"><a href="/">Home</a></li>
            <li class="py-5 px-6 {{ request()->is('shop') ? 'bg-teal-400' : '' }} hover:text-gray-100"><a
                    href="{{ route('shop.index') }}">Shop</a></li>
            <li class="py-5 px-6 hover:text-gray-100 {{ request()->is('shop/brands*') ? 'bg-teal-400' : '' }}"><a
                    href="{{ route('home-brand.index') }}">Brands</a></li>
            <li class="py-5 px-6 hover:text-gray-100"><a href="">Contact Us</a></li>
        </ul>
    </Dropdown>
</nav>