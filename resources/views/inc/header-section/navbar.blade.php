<nav class=" bg-teal-400 flex items-center text-white">
    <Dropdown>
        <ul slot="dropdown-item" class="absolute text-black w-full text-sm z-50 bg-white"
            style="box-shadow: 0px 0px 10px 0px rgba(0, 0, 0, 0.144);">
            @foreach ($categories as $category)
            <li
                class="category border-b border-r border-l px-4 py-3 transition-colors duration-150 ease-linear relative">
                <a href="{{ route('home-category.show' , $category->slug) }}">
                    {{ $category->name }}
                </a>
                @if ($category->subcategories->count() > 0)
                <i style="font-size: 9px;" class="fas fa-chevron-right absolute right-3 bottom-4 text-gray-500"></i>
                @endif
                @if ($category->subcategories->count() > 0)
                <ul class="subcategory absolute w-full right-0 top-0 px-2 py-1 bg-white">
                    @foreach ($category->subcategories as $subcategory)
                    <li class="my-3 transition-colors duration-150 ease-linear"><a
                            href="{{ route('home-subcategory.show' , $subcategory->slug) }}">{{ $subcategory->name }}</a>
                    </li>
                    @endforeach
                </ul>
                @endif
            </li>
            @endforeach
        </ul>
    </Dropdown>
    <ul class=" flex font-semibold uppercase text-sm text-white">
        <li class="py-4 px-5 hover:text-gray-100"><a href="/">Home</a></li>
        <li class="py-4 px-5 hover:text-gray-100"><a href="{{ route('shop.index') }}">Shop</a></li>
        <li class="py-4 px-5 hover:text-gray-100"><a href="">Brands</a></li>
        <li class="py-4 px-5 hover:text-gray-100"><a href="">Contact Us</a></li>
    </ul>
</nav>