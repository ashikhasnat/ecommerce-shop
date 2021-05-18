<x-layouts.app>
    @section('title')
    Checkout
    @endsection
    {{-- @section('bootstrap')
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <style>
        .bd-placeholder-img {
            font-size: 1.125rem;
            text-anchor: middle;
            -webkit-user-select: none;
            -moz-user-select: none;
            -ms-user-select: none;
            user-select: none;
        }

        @media (min-width: 768px) {
            .bd-placeholder-img-lg {
                font-size: 3.5rem;
            }
        }
    </style>
    @endsection --}}
    <x-container>
        <Check-Out>
            @if (session()->has('coupon_code'))
            <div slot="session_coupon" class=" flex mt-14 text-gray-600">
                <p class=" flex-1 ml-4">Coupon: <span
                        class=" text-gray-900 p-px">({{ session('coupon_code')->coupon_code }})</span></p>
                <p class=" flex-1 ml-4">{{ session('coupon_code')->discount }}%</p>
            </div>
            @endif
            {{-- <div slot="ssl_button">
                
            </div> --}}
        </Check-Out>
    </x-container>


    </form>
</x-layouts.app>

@include('inc.footer-section.ssl')