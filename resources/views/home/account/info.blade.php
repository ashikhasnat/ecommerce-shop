<x-account>
    <div class=" text-gray-700 font-light">
        <p class=" mb-4">
            Hello @auth
            <span class=" text-gray-800 font-semibold">{{ auth()->user()->name }}</span>
            @endauth
        </p>
        <p>From your account dashboard you can view your recent orders, manage your shipping and billing addresses, and
            edit your password and account details.</p>
    </div>
</x-account>