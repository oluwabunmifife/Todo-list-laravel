<x-app-layout>
    <div class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0 bg-gray-100 dark:bg-gray-900">
        <h1 class="text-white text-lg font-bold">Todo List</h1>
        <div class="w-full sm:max-w-xl mt-6 px-6 py-4 bg-white dark:bg-gray-800 shadow-md overflow-hidden sm:rounded-lg">
            @foreach ($todos as $todo)
                <div class="text-white flex justify-between py-4">
                    <a href="{{ route('todo.show',  $todo->id ) }}">{{ $todo->title }}</a>
                    <p>{{ $todo->created_at->diffforHumans() }}</p>
                </div>
            @endforeach
        </div>
    </div>
</x-app-layout>