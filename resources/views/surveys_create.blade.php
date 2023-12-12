
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Create Survey') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">

                    <h3 class="text-lg font-medium mb-4">Create Survey</h3>

                    <form method="POST" action="{{ route('surveys.store') }}">
                        @csrf

                        <div class="mb-4">
                            <label for="type" class="block text-sm font-medium text-gray-600">Type</label>
                            <select name="type" id="type" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring focus:ring-blue-200 focus:outline-none focus:border-blue-300">
                                @foreach ($types as $type)
                                    <option value="{{ $type->name }}">{{ ucfirst($type->name) }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div id="student-fields" class="hidden">
                            <div class="mb-4">
                                <label for="year" class="block text-sm font-medium text-gray-600">Year</label>
                                <input type="text" name="year" id="year" class="mt-1 p-2 w-full border-gray-300 rounded-md shadow-sm focus:ring focus:ring-blue-200 focus:outline-none focus:border-blue-300">
                            </div>

                            <div class="mb-4">
                                <label for="score" class="block text-sm font-medium text-gray-600">Score</label>
                                <select name="score" id="score" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring focus:ring-blue-200 focus:outline-none focus:border-blue-300">
                                    <option value="60-74">60-74</option>
                                    <option value="75-89">75-89</option>
                                    <option value="90-100">90-100</option>
                                </select>
                            </div>
                        </div>

                        <div id="teacher-fields" class="hidden">
                            <div class="mb-4">
                                <label for="degree" class="block text-sm font-medium text-gray-600">Degree</label>
                                <input type="text" name="degree" id="degree" class="mt-1 p-2 w-full border-gray-300 rounded-md shadow-sm focus:ring focus:ring-blue-200 focus:outline-none focus:border-blue-300">
                            </div>

                            <div class="mb-4">
                                <label class="block text-sm font-medium text-gray-600">Lessons</label>
                                <div class="mt-1 grid grid-cols-3 gap-4">
                                    <label class="inline-flex items-center">
                                        <input type="checkbox" name="lessons[]" value="Math">
                                        <span class="ml-2">Math</span>
                                    </label>

                                    <label class="inline-flex items-center">
                                        <input type="checkbox" name="lessons[]" value="Literature">
                                        <span class="ml-2">Literature</span>
                                    </label>

                                    <label class="inline-flex items-center">
                                        <input type="checkbox" name="lessons[]" value="Philosophy">
                                        <span class="ml-2">Philosophy</span>
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="mt-2">
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>

    <script>
        document.getElementById('type').addEventListener('change', function () {
            var studentFields = document.getElementById('student-fields');
            var teacherFields = document.getElementById('teacher-fields');

            if (this.value === 'student') {
                studentFields.classList.remove('hidden');
                teacherFields.classList.add('hidden');
            } else if (this.value === 'teacher') {
                studentFields.classList.add('hidden');
                teacherFields.classList.remove('hidden');
            }
        });
    </script>

</x-app-layout>
