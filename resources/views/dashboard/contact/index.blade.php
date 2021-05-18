<x-layouts.dashboard>
    <div class="px-8 mb-4 mt-6">
        <h1 class=" font-semibold text-3xl">Inbox</h1>
    </div>
    <div class="flex flex-col mb-6">
        <div class="py-2 align-middle inline-block min-w-full sm:px-3 lg:px-8">
            <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                <table class="min-w-full divide-y divide-gray-200">
                    <thead>
                        <tr>
                            <th
                                class="px-3 py-3 bg-gray-50 text-left text-base font-bold leading-4 text-gray-800 uppercase tracking-wider">
                                name
                            </th>
                            <th
                                class="px-3 py-3 bg-gray-50 text-left text-base leading-4 font-bold text-gray-800 uppercase tracking-wider">
                                Email
                            </th>
                            <th
                                class="px-3 py-3 bg-gray-50 text-left text-base leading-4 font-bold text-gray-800 uppercase tracking-wider">
                                Message
                            </th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                        @foreach ($contacts as $contact)
                        <tr>
                            <td data-label="Code" class="px-3 py-4 whitespace-no-wrap">
                                {{ $contact->name}}
                            </td>
                            <td data-label="Discounts" class="px-3 py-4 whitespace-no-wrap">
                                {{-- created at --}}
                                <span
                                    class="inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                                    {{ $contact->email}}
                                </span>
                            </td>
                            <td data-label="Discounts" class="px-3 py-4 whitespace-no-wrap">
                                {{-- created at --}}
                                <span class="inline-flex text-sm leading-5 font-semibold rounded-full ">
                                    {{ Str::limit($contact->message , 30)}}
                                </span>
                            </td>
                            <td class="px-2 py-2 whitespace-no-wrap text-right text-sm leading-5 font-medium">
                                <a href="{{ route("contact-us.show", $contact->id) }}"
                                    class="text-indigo-600 hover:text-indigo-900">View</a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-layouts.dashboard>