<div class=" grid grid-cols-1 lg:grid-cols-2 gap-x-12">
    <div class=" col-span-1">
        @forelse ($product->reviews as $review)
        <div class="flex mb-6">
            <div class=" mr-3">
                <img src="
                            https://static.xx.fbcdn.net/rsrc.php/v1/yi/r/odA9sNLrE86.jpg
                            " alt="profile image for user" class="object-cover w-20" />
            </div>
            <div class="rounded-lg text-sm w-full">
                <p class="font-bold text-gray-600 flex items-center">
                    {{ $review->name }}
                    {{-- Name --}}
                    <span class="text-gray-400 text-xs font-normal">- {{ $review->created_at->format("M j, Y") }}</span>
                    <span class=" ml-2">
                        @foreach (range(1,$review->ratings) as $index)
                        <i class="fas fa-star text-xs text-yellow-300 transform -translate-y-px"></i>
                        @endforeach
                    </span>
                </p>
                <p class="text-gray-500">
                    {{ $review->review_text }}
                    {{-- body --}}
                </p>
            </div>
        </div>
        @empty
        <div class=" w-full">
            <div class="bg-gray-50 rounded-sm p-2 text-sm">
                <p class="font-bold text-teal-400">
                    No Reviews
                </p>
            </div>
        </div>
        @endforelse
    </div>
    {{-- end 1 col --}}
    <div class="col-span-1">
        <h1 class=" text-lg font-bold">ADD A REVIEW</h1>
        <p class=" my-2 text-gray-500">Your email address will not be published. Required fields are marked *
        </p>
        <main class="">

            <form action="{{ route('review.store', $product->id) }}" method="post">
                @csrf
                <div class=" flex items-center mb-3 relative">
                    <p class="text-gray-500 mr-6">Your rating</p>
                    <section>
                        <Ratings></Ratings>
                    </section>
                    @if (session('msg'))
                    <Toastr text_msg="{{ session('msg') }}" text_classes="success"></Toastr>
                    @endif
                </div>
                <textarea name="review_text" class=" border p-3 opacity-75 w-full h-40 focus:outline-none"
                    id="review_text" placeholder="Your Review*"></textarea>
                <div class=" grid grid-cols-2 gap-x-2 my-4 opacity-75">
                    <input class=" col-span-1 border p-3 focus:outline-none" type="text" name="name" id="name"
                        placeholder="Name*" autocomplete="off">
                    <input class=" col-span-1 border p-3 focus:outline-none" type="email" name="email" id="email"
                        placeholder="Email*" autocomplete="false">
                </div>
                <button type="submit"
                    class=" w-full border py-3 bg-teal-400 text-white font-bold focus:outline-none">SUBMIT</button>
                @if ($errors->any())
                <div class=" text-red-500">
                    <ul>
                        @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                @endif
            </form>
        </main>

    </div>
</div>