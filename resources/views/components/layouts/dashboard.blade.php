<x-layouts.admin>
    <main class="">
        <keep-alive>
            <admin-nav>
                <nav slot="col-1" class="text-white text-xl mt-20">
                    <ul>
                        <li class="pl-4 mb-6"><a href=""><i class="fas fa-user-circle mr-2"></i>Profile</a>
                        </li>
                        <li class="pl-4 "><a href="{{ route('product.index') }}"><i
                                    class="fas fa-box mr-2"></i>Product</a>
                        </li>
                        <li class="pl-4 my-6"><a href=""><i class="fas fa-th-list mr-2"></i>Category</a></li>
                    </ul>
                </nav>
                <div slot="col-5">
                    {{ $slot }}
                </div>
            </admin-nav>
        </keep-alive>
    </main>

</x-layouts.admin>