<x-account>
    <div class=" flex flex-col">
        <h1 class=" text-xl uppercase mb-6 font-bold">Shipping Address</h1>
        <form action="{{ route('shipping.update', $shippingAddress->id ) }}" method="post">
            @csrf
            @method('PATCH')
            <div class=" mb-3">
                <label for="first_name">First Name <span class=" text-red-500">*</span> </label>
                <input class=" w-full border focus:outline-none py-1 px-3 mt-1" type="text"
                    value="{{ $shippingAddress->first_name }}" name="first_name">
            </div>
            <div class=" mb-3">
                <label for="last_name">Last Name<span class=" text-red-500">*</span></label>
                <input value="{{ $shippingAddress->last_name }}"
                    class=" w-full border focus:outline-none py-1 px-3 mt-1" type="text" name="last_name">
            </div>
            <div class="mb-3">
                <label for="company_name">Company Name (optional)</label>
                <input value="{{ $shippingAddress->company_name }}"
                    class=" w-full border focus:outline-none py-1 px-3 mt-1" type="text" name="company_name">
            </div>
            <div class="mb-3">
                <label for="company_name">Country / Region <span class=" text-red-500">*</span></label>
                <select class=" w-full border py-1 px-2 focus:outline-none cursor-pointer" name="country_id">
                    <option value="null" disabled selected>Select Country</option>
                    @foreach ($countries as $country)
                    <option value="{{ $country->id }}">{{ $country->country_name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="mb-3">
                <label for="street_address">Street address <span class=" text-red-500">*</span></label>
                <input value="{{ $shippingAddress->street_address}}"
                    class=" w-full border focus:outline-none py-1 px-3 mt-1" type="text" name="street_address"
                    placeholder="House Number and Street Number">
            </div>
            <div class="mb-3">
                <label for="city">Town / City <span class=" text-red-500">*</span></label>
                <input value="{{ $shippingAddress->city }}" class=" w-full border focus:outline-none py-1 px-3 mt-1"
                    type="text" name="city">
            </div>
            <div class="mb-3">
                <label for="post_code">Postcode / ZIP <span class=" text-red-500">*</span></label>
                <input value="{{ $shippingAddress->post_code }}"
                    class=" w-full border focus:outline-none py-1 px-3 mt-1" type="text" name="post_code">
            </div>
            <div class="mb-3">
                <label for="phone">Phone <span class=" text-red-500">*</span></label>
                <input value="{{ $shippingAddress->phone }}" class=" w-full border focus:outline-none py-1 px-3 mt-1"
                    type="text" name="phone">
            </div>
            <button type="submit" class=" focus:outline-none py-2 mt-2 px-5 bg-gray-800 text-white">Update
                Address</button>
        </form>
        @if ($errors->any())
        <div class=" text-red-500">
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif
    </div>
</x-account>