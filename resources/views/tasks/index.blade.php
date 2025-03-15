<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('My Tasks') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                @can('create', App\Models\Task::class)
                    <a href="{{ route('tasks.create') }}" class="bg-blue-500 text-white px-4 py-2 rounded">Add New Task</a>
                @endcan
                
                <div class="mt-4">
                    @if($tasks->isEmpty())
                        <p class="text-gray-600">No tasks available.</p>
                    @else
                        <table class="w-full border-collapse border border-gray-300 mt-4">
                            <thead>
                                <tr class="bg-gray-100">
                                    <th class="border border-gray-300 px-4 py-2">Title</th>
                                    <th class="border border-gray-300 px-4 py-2">Status</th>
                                    <th class="border border-gray-300 px-4 py-2">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($tasks as $task)
                                    <tr>
                                        <td class="border border-gray-300 px-4 py-2">{{ $task->title }}</td>
                                        <td class="border border-gray-300 px-4 py-2">{{ ucfirst($task->status) }}</td>
                                        <td class="border border-gray-300 px-4 py-2">
                                            @can('view', $task)
                                                <a href="{{ route('tasks.show', $task) }}" class="text-blue-500">View</a>
                                            @endcan
                                            @can('update', $task)
                                                <a href="{{ route('tasks.edit', $task) }}" class="text-yellow-500 ml-2">Edit</a>
                                            @endcan
                                            @can('delete', $task)
                                                <form action="{{ route('tasks.destroy', $task) }}" method="POST" class="inline-block">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="text-red-500 ml-2">Delete</button>
                                                </form>
                                            @endcan
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
