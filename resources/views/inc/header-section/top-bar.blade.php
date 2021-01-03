<div class=" flex justify-between my-8 items-center">
    <div class="logo w-40">
        <a href="/">
            <img src="{{ asset('imgs/logo.png') }}" alt="" class=" object-cover">
        </a>
    </div>
    <div class="search w-2/4 flex items-center overflow-hidden">
        <input type=" text" name="" style="padding: 11px 20px;" id=""
            class="rounded-none border border-r-0 leading-5 text-base w-full focus:outline-none" placeholder="Search">
        <i class="fas fa-search py-3 text-xl px-7 bg-teal-400 text-white"></i>
    </div>
    <div class=" text-xl flex">
        <div class=""><i class="fas fa-user-alt"></i></div>
        <div class="relative text-center mx-6">
            <span
                class="absolute bg-teal-400 text-white font-semibold text-xs w-5 h-5 right-0 rounded-full transform -translate-y-1 translate-x-3">0</span>
            <i class="far fa-heart"></i></div>
        <div class="relative text-center">
            <span
                class="absolute bg-teal-400 text-white font-semibold text-xs w-5 h-5 right-0 rounded-full transform -translate-y-1 translate-x-3">0</span>
            <i class="fas fa-shopping-cart"></i></div>
    </div>
</div>