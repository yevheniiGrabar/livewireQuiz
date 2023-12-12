<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Submissions') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">

                    <h3 class="text-lg font-medium mb-4">Submissions</h3>

{{--                    <div class="mb-2">--}}
{{--                        <a href="{{ route('surveys.create') }}" class="hover:bg-black-700 text-black font-bold py-2 px-2">--}}
{{--                            Create Survey--}}
{{--                        </a>--}}
{{--                    </div>--}}

                    <table class="w-full divide-y divide-gray-200">
                        <thead class="bg-gray-50">
                        <tr>
                            <th scope="col" class="px-3 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                ID
                            </th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Unit Of Analysis
                            </th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Answers
                            </th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Created At
                            </th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Updated At
                            </th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Actions
                            </th>
                        </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                        @foreach ($submissions as $submission)
                            <tr>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    {{ $submission->id }}
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    {{ $submission->unit->title }}
                                </td>
                                <td class="px-2 py-4 whitespace-nowrap">
                                    {{ $submission->answers }}
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    {{ $submission->created_at }}
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    {{ $submission->updated_at }}
                                </td>
{{--                                <td class="px-6 py-4 whitespace-nowrap">--}}
{{--                                    <a href="{{ route('surveys.edit', $survey->id) }}" class="text-blue-500 hover:underline mr-2">Edit</a>--}}
{{--                                    <form action="{{ route('surveys.destroy', $survey->id) }}" method="POST" class="inline">--}}
{{--                                        @csrf--}}
{{--                                        @method('DELETE')--}}
{{--                                        <button type="submit" class="text-red-500 hover:underline">Delete</button>--}}
{{--                                    </form>--}}
{{--                                </td>--}}
                            </tr>
                        @endforeach
                        </tbody>
                    </table>

                    <div class="mt-4">
                        {{ $submissions->links() }}
                    </div>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
