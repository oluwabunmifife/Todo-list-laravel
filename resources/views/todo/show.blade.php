<x-app-layout>
    <div class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0 bg-gray-100 dark:bg-gray-900">
        <h1 class="text-white text-lg font-bold">{{ $todo->title }}</h1>
        <div class="w-full sm:max-w-xl mt-6 px-6 py-4 bg-white dark:bg-gray-800 shadow-md overflow-hidden sm:rounded-lg">
            <div class="text-white flex justify-between py-4">
                <p>{{ $todo->description }}</p>
                <p>{{ $todo->created_at->diffforHumans() }}</p>
            </div>
            <div class="flex">
                {{-- Edit button --}}
                <a href="{{ route('todo.edit', $todo->id) }}">
                    <x-primary-button>Edit</x-primary-button>
                </a>

                {{-- Delete button --}}
                <form class="pl-3" action="{{ route('todo.destroy', $todo->id) }}" method="post">
                    @csrf
                    @method('delete')
                    <x-danger-button>Delete</x-danger-button> 
                </form>
            </div>
        </div>
    </div>
</x-app-layout> 