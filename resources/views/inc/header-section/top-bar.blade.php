<x-container>
    <div class=" flex justify-between my-8 items-center">
        <div class="logo w-40">
            <a href="/">
                <img src="{{ asset('imgs/logo.png') }}" alt="" class=" object-cover">
            </a>
        </div>
        <Search-Bar></Search-Bar>
        @auth
        @php
        $role = auth()
        ->user()
        ->roles->first();
        @endphp
        @endauth
        <account-details @auth :auth_id="true" :super_admin="{{ $role->id == 1 ? "true" : "false" }}" @endauth>
        </account-details>
    </div>
</x-container>