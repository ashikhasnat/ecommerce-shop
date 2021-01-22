<x-layouts.admin>
    <main class="">
        <admin-nav>
            <nav slot="col-1" class="text-white text-sm lg:text-xl mt-20 overflow-hidden">
                <ul>
                    <li class="pl-4 mb-1 py-2 w-60
                        @if (request()->is('dashboard'))
                         bg-gray-600 rounded
                         @endif
                         "><a href="{{ route('dashboard') }}"><i class="fas fa-chart-line mr-2"></i></i>Dashboard</a>
                    </li>
                    <li class="pl-4 mb-1 py-2 w-60
                        @if (request()->is('dashboard/orders*'))
                         bg-gray-600 rounded
                         @endif
                        "><a href="{{ route('admin-order.index') }}"><i class="fas fa-warehouse mr-2"></i>Orders</a>
                    </li>
                    <li class="pl-4 mb-1 py-2 w-60
                        @if (request()->is('dashboard/product*'))
                         bg-gray-600 rounded
                         @endif
                        "><a href="{{ route('product.index') }}"><i class="fas fa-box mr-2"></i>Product</a>
                    </li>
                    <li class="pl-4 py-2 w-60
                        @if (request()->is('dashboard/category*'))
                        bg-gray-600 rounded
                         @endif
                        "><a href="{{ route('category.index') }}"><i class="fas fa-th-list mr-2"></i>Category</a></li>
                    <li class="pl-8 text-gray-400 text-xs lg:text-base py-1 w-60
                        @if (request()->is('dashboard/subcategory*'))
                         bg-gray-600 rounded 
                         @endif
                        "><a href="{{ route('subcategory.index') }}"><i class="fas fa-clipboard-list mr-2"></i>Sub
                            Category</a></li>
                    <li class="pl-4 py-2 mb-1 w-60
                        @if (request()->is('dashboard/brand*'))
                         bg-gray-600 rounded 
                         @endif
                        "><a href="{{ route('brand.index') }}"><i class="fas fa-building mr-2"></i>Brand</a></li>
                    <li class="pl-4 py-2 mb-1 w-60
                        @if (request()->is('dashboard/coupon*'))
                         bg-gray-600 rounded 
                         @endif
                        "><a href="{{ route('coupon.index') }}"><i class="fas fa-building mr-2"></i>Coupon</a></li>
                </ul>

            </nav>
            <div slot="col-5">
                {{ $slot }}
            </div>
        </admin-nav>
    </main>

</x-layouts.admin>
