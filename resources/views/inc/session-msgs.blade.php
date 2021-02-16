@if (session('msg'))
<Toastr text_msg="{{ session('msg') }}" text_classes="success"></Toastr>
@endif
@if (session('delete'))
<Toastr text_msg="{{ session('delete') }}" text_classes="error"></Toastr>
@endif