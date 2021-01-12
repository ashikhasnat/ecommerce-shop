<div class=" flex justify-between my-8 items-center mx-auto sm:w-full px-2 md:px-4 md:w-11/12">
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
    <account-details @auth :auth_id="true" @endauth>
    </account-details>
</div>