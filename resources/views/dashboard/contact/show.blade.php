<x-layouts.dashboard>
    <section class="w-2/3 shadow p-6 bg-white m-auto mt-16">
        <div class="px-8 my-6">
            <h1 class=" font-semibold text-3xl">Inbox</h1>
        </div>
        <div class="px-8 ">
            <div class=" my-5">
                <h1 class="font-semibold my-1 text-xl">Name</h1>
                <p>{{ $contact->name }}</p>
            </div>
            <div class=" my-5">
                <h1 class="font-semibold my-1 text-xl">Email</h1>
                <p>{{ $contact->email }}</p>

            </div>
            <div class=" my-5">
                <h1 class="font-semibold my-1 text-xl">Message</h1>
                <p>{{ $contact->message }}</p>

            </div>
        </div>
    </section>
</x-layouts.dashboard>