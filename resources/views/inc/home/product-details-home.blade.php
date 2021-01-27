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
<p class=" leading-4 break-words my-1 text-sm">
    <a href="{{ route('home-product.show' , $product->slug) }}"
        class="text-gray-700 font-semibold">{{ $product->title }}</a>
</p>
@if ($product->discount)
<div class=" flex items-center">
    <p class=" text-gray-400 text-sm font-semibold line-through mr-2"
        v-text="convertToCurrency({{ $product->old_price }})">
    </p>
    <p class=" text-teal-400 font-bold " v-text="convertToCurrency({{ $product->price }})"></p>
</div>
@else
<p class=" text-teal-400 font-bold " v-text="convertToCurrency({{ $product->price }})"></p>
@endif