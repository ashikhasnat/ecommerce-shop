<div class=" h-60 w-full bg-cover bg-center bg-no-repeat relative single-product-card"
    style="background-image: url({{ $product->thumbnail }});">
    <div
        class=" single-product-child-card absolute top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 flex items-center">
        <Add-To-Cart :product_id="{{ $product->id }}" :price="{{ $product->price }}" :cart_option="false" @auth
            :auth_id="{{ auth()->id() }}" @endauth></Add-To-Cart>
        <Add-To-Wishlist-Home :product_id="{{ $product->id }}" @auth :auth_id="{{ auth()->id() }}" @endauth>
        </Add-To-Wishlist-Home>
        <a href="{{ route('home-product.show',$product->slug) }}"
            class="bg-white rounded-full text-center pt-2 pb-2 px-3 ml-2 hover:bg-red-500 hover:text-white"><i
                class="fas fa-long-arrow-alt-right text-lg"></i></a>
    </div>
</div>
<div class="p-6 box-shadow" style="border: 1px solid rgba(102, 101, 101, 0.185);">
    <div class=" mb-px">
        <div class="flex">
            <div class=" relative">
                @foreach (range(1, 5) as $index)
                <i class="far fa-star text-xs"></i>
                @endforeach
                @if ($product->reviews->count() > 0)
                <div class=" absolute top-0">
                    @foreach (range(1, $product->AvgRating) as $index)
                    <i class="fas fa-star text-xs text-yellow-300"></i>
                    @endforeach
                </div>
                @endif
            </div>
        </div>
    </div>

    <p class=" leading-4 break-words my-1">
        <a href="{{ route('home-product.show' , $product->slug) }}"
            class="text-gray-700 font-semibold">{{ $product->title }}</a>
    </p>
    <p class=" text-teal-400 font-bold" v-text="convertToCurrency({{ $product->price }})"></p>
</div>