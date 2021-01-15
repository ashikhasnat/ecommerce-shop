<x-layouts.app>
    <x-container>
        <div class="grid grid-cols-5 justify-items-center gap-6 mt-8 text-center">
            @foreach ($brands as $brand)
            <div class=" col-span-full sm:col-span-1 border w-full py-8 px-6 h-60">
                <img src="{{ $brand->brand_logo }}" class=" object-cover w-full h-8/12" alt="brand logo">
                <a href="{{ route('home-brand.show', $brand->slug) }}">
                    <h1 class=" py-6">{{ $brand->name }}</h1>
                </a>
            </div>
            @endforeach
        </div>
    </x-container>
</x-layouts.app>