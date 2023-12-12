<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Units of Analysis') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <h3 class="text-lg font-medium mb-4">Units of Analysis</h3>
                    <div class="mb-2">
                        <a href="{{ route('units.create') }}" class="hover:bg-black-700 text-black font-bold py-2 px-2">
                            Create Units
                        </a>
                    </div>
                    <table class="min-w-full divide-y divide-gray-200">
                        <thead class="bg-gray-50">
                        <tr>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                ID
                            </th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                User ID
                            </th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Type ID
                            </th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Title
                            </th>
                        </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                        @foreach ($unitsOfAnalysis as $unit)
                            <tr>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    {{ $unit->id }}
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    {{ $unit->user_id }}
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    {{ $unit->type_id }}
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    {{ $unit->title }}
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>

                    <div class="mt-4">
                        {{ $unitsOfAnalysis->links() }}
                    </div>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
