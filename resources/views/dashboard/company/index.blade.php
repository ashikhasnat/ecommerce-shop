<x-layouts.dashboard>
    @include('inc.session-msgs')
    <div class="flex flex-col mt-16">
        <div class="py-2 align-middle inline-block min-w-full sm:px-3 lg:px-8">
            <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                <table class="min-w-full divide-y divide-gray-200">
                    <thead>
                        <tr>
                            <th
                                class="px-3 py-3 bg-gray-50 text-left text-base font-bold leading-4 text-gray-800 uppercase tracking-wider">
                                Address
                            </th>
                            <th
                                class="px-3 py-3 bg-gray-50 text-left text-base leading-4 font-bold text-gray-800 uppercase tracking-wider">
                                Phone
                            </th>
                            <th
                                class="px-3 py-3 bg-gray-50 text-left text-base leading-4 font-bold text-gray-800 uppercase tracking-wider">
                                Email
                            </th>
                            <th
                                class="px-3 py-3 bg-gray-50 text-left text-base leading-4 font-bold text-gray-800 uppercase tracking-wider">
                                Action
                            </th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">

                        <tr>
                            <td data-label="Address" class="px-3 py-4">
                                {{ $companyInfo->address }}
                            </td>
                            <td data-label="Phone" class="px-3 py-4">
                                {{ $companyInfo->phone }}
                            </td>
                            <td data-label="Email" class="px-3 py-4">
                                {{ $companyInfo->email }}
                            </td>
                            <td data-label="Action" class="px-3 py-4">
                                <a href="{{ route('company-info.edit', $companyInfo->id) }}"
                                    class="text-indigo-600 hover:text-indigo-900">Edit</a>
                            </td>

                        </tr>

                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-layouts.dashboard>