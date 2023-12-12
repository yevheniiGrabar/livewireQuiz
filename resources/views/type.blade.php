<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Types') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    {{-- Заголовок "Types" --}}
                    <h3 class="text-lg font-medium mb-4">Types</h3>

                    {{-- Таблица для отображения типов --}}
                    <table class="min-w-full divide-y divide-gray-200">
                        <thead class="bg-gray-50">
                        <tr>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                ID
                            </th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Name
                            </th>
                            {{-- Добавьте другие заголовки, если необходимо --}}
                        </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                        @foreach ($types as $type)
                            <tr>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    {{ $type->id }}
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    {{ $type->name }}
                                </td>
                                {{-- Добавьте другие ячейки, если необходимо --}}
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                    {{-- Конец таблицы --}}
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
