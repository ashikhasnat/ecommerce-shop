<x-layouts.admin>
    <main class="">
        <admin-nav>
            <nav slot="col-1" class="text-white text-sm lg:text-xl mt-20 overflow-hidden">
                <small class=" text-white absolute top-5 left-1/12 hover:underline">
                    <a href="/" target="_blank">Visit Site</a>
                </small>
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
                    <li class="pl-4 mb-1 py-2 w-60
                        @if (request()->is('dashboard/slider*'))
                         bg-gray-600 rounded
                         @endif
                        "><a href="{{ route('slider.index') }}"><i class="fas fa-photo-video mr-2"></i>Slider</a>
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
                        "><a href="{{ route('coupon.index') }}"><i class="fas fa-receipt mr-2"></i>Coupon</a></li>
                    <li class="pl-4 py-2 mb-1 w-60
                        @if (request()->is('dashboard/contact-us*'))
                         bg-gray-600 rounded 
                         @endif
                        "><a href="{{ route('contact-us.index') }}"><i class="fas fa-inbox mr-2"></i>Inbox</a></li>
                    <li class="pl-4 py-2 mb-1 w-60
                        @if (request()->is('dashboard/company-info*'))
                         bg-gray-600 rounded 
                         @endif
                        "><a href="{{ route('company-info.index') }}"><i class="fas fa-address-card mr-2"></i>Company
                            Info</a></li>
                </ul>

            </nav>
            <div slot="col-5">
                {{ $slot }}
            </div>
        </admin-nav>
    </main>

</x-layouts.admin>