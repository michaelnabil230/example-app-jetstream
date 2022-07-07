<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Tasks') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <x-link href="{{ route('tasks.create') }}" class="mb-4">{{ __('Add new task') }}</x-link>
                    <table class="w-full text-sm text-left text-gray-500">
                        <thead class="text-xs text-gray-700 uppercase bg-gray-50">
                            <tr>
                                <th scope="col" class="px-6 py-3 text-left">
                                    {{ __('Task') }}
                                </th>
                                <th scope="col" class="px-6 py-3"></th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($tasks as $task)
                                <tr class="bg-white border-b">
                                    <td class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
                                        {{ $task->task }}
                                    </td>
                                    <td class="px-6 py-4">
                                        <x-link href="{{ route('tasks.edit', $task) }}">{{ __('Edit') }}</x-link>
                                        <form method="POST" action="{{ route('tasks.destroy', $task) }}"
                                            class="inline-block">
                                            @csrf
                                            @method('DELETE')
                                            <x-jet-danger-button type="submit"
                                                onclick="return confirm('Are you sure?')">{{ __('Delete') }}
                                            </x-jet-danger-button>
                                        </form>
                                    </td>
                                </tr>
                            @empty
                                <tr class="bg-white border-b">
                                    <td colspan="3" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
                                        {{ __('No tasks found') }}
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>