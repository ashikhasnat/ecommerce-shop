<div class=" mb-10 container mx-auto">
    <div class=" border-b-2 relative">
        <h1 class="py-2 text-base font-light  sm:text-xl sm:font-bold uppercase">WEEKLY DEAL PRODUCT</h1>
        <hr class="bg-teal-400 w-20 h-1 absolute bottom-0 transform translate-y-1 ">
    </div>
    <div class="grid grid-auto-fit justify-items-center gap-6 mt-6">
        @foreach ($products as $product)
        <div class="">
            <div class="h-80 relative">
                <img src="{{ $product->thumbnail }}" alt="" class=" object-cover h-full">
                <count-down starttime="Nov 5, 2018 15:37:25" endtime="Nov 8, 2021 16:37:25" trans='{  
                    "day":"Days",
                    "hours":"Hours",
                    "minutes":"Minute",
                    "seconds":"Seconds",
                    "expired":"Event has been expired.",
                    "running":"Till the end of event.",
                    "upcoming":"Till start of event.",
                    "status": {
                       "expired":"Expired",
                       "running":"Running",
                       "upcoming":"Future"
                      }}'></count-down>
            </div>
            <div class="p-6 border border-t-0">
                @include('inc.home.product-details')
            </div>
        </div>
        @endforeach
    </div>
</div>