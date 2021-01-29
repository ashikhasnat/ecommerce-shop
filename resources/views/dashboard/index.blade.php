<x-layouts.dashboard>
    <div class="w-full">
        <header class="font-semibold shadow-md  bg-gray-100 text-gray-700 py-3 px-8 sm:py-6 sm:px-12 sm:rounded-t-md">
            <h1 class="text-right md:text-left">Dashboard</h1>
        </header>
        <section
            class=" grid col-span-1 md:grid-cols-2 lg:grid-cols-4 px-4 sm:px-6 mt-8 gap-y-6 sm:gap-y-0 sm:gap-x-10 text-center rounded ">
            <div class=" col-span-1  font-semibold shadow-lg ">
                <h1 class=" text-lg bg-red-300 py-3 shadow-md text-gray-100 ">Total Products</h1>
                <p class=" text-5xl py-16"> {{ $products }}</p>
            </div>
            <div class=" col-span-1  font-semibold shadow-lg ">
                <h1 class=" text-lg bg-pink-300 py-3 shadow-md text-gray-100 ">
                    New Orders
                </h1>
                <p class=" text-5xl py-16"> {{ $orders }}</p>
            </div>
            <div class=" col-span-1  font-semibold shadow-lg ">
                <h1 class=" text-lg bg-green-400 py-3 shadow-md text-gray-100 ">
                    New Customer
                </h1>
                <p class=" text-5xl py-16"> {{ $users }}</p>
            </div>
            <div class=" col-span-1  font-semibold shadow-lg ">
                <h1 class=" text-lg bg-indigo-400 py-3 shadow-md text-gray-100 ">Total 5 Start Ratings</h1>
                <p class=" text-5xl py-16"> {{ $reviews }}</p>
            </div>
        </section>
    </div>
</x-layouts.dashboard>