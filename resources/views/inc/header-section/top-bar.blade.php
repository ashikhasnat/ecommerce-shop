<x-container>
    <div class=" flex justify-between my-8 items-center">
        <div class="logo w-40">
            <a href="/">
                <img src="{{ asset('imgs/logo.png') }}" alt="" class=" object-cover">
            </a>
        </div>
        <Search-Bar></Search-Bar>
        <account-details @auth :auth_id="true" @endauth>
        </account-details>
    </div>
</x-container>