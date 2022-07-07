<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Add new task') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <x-jet-validation-errors class="mb-4" :errors="$errors" />

                    <form method="POST" action="{{ route('tasks.store') }}">
                        @csrf

                        <!-- Task -->
                        <div>
                            <x-jet-label for="task" :value="__('Task')" />

                            <x-jet-input id="task" class="block mt-1 w-full" type="text" name="task"
                                :value="old('task')" required autofocus />
                        </div>

                        <div class="flex mt-4">
                            <x-jet-button>
                                {{ __('Save Task') }}
                            </x-jet-button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
