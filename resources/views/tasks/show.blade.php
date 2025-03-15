<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Task Details') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                <h3 class="text-xl font-semibold">{{ $task->title }}</h3>
                <p class="mt-2 text-gray-700">Status: <strong>{{ ucfirst($task->status) }}</strong></p>
                <div class="mt-4">
                    <a href="{{ route('tasks.edit', $task) }}" class="px-4 py-2 bg-yellow-500 text-white rounded hover:bg-yellow-700">
                        Edit Task
                    </a>
                    <form action="{{ route('tasks.destroy', $task) }}" method="POST" class="inline-block">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="px-4 py-2 bg-red-500 text-white rounded hover:bg-red-700">
                            Delete Task
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
