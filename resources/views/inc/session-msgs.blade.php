@if (session('msg'))
<div class="pl-8 absolute right-10" style="width: 400px;">
    <p class="leading-tight text-sm text-green-700 bg-green-200 font-medium py-2 px-4 mb-4" id="session-msg">
        {{ session('msg') }}</p>
</div>
@endif
@if (session('delete'))
<div class="pl-8 absolute right-10" style="width: 400px;">
    <p class=" text-sm font-medium text-red-700 bg-red-300 py-2 px-4 mb-4" id="session-delete">{{ session('delete') }}
    </p>
</div>
@endif