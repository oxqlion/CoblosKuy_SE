<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    {{ __("You're logged in!") }}
                </div>
            </div>
            <div class = "grid grid-cols-3 gap-4 my-5 text-gray-800 dark:text-gray-200">
                @foreach ($elections as $election)
                    <a href = "/electiondetail/{{$election->id}}">
                        <div class = "box-content p-2 rounded-lg drop-shadow-xl">
                            <img src = "/images/{{$election->banner}}" class = "text-center">
                            <h1 class = "text-center my-4">
                                {{ $election->name }}
                            </h1>
                        </div>
                    </a>
                @endforeach
            </div>
        </div>
    </div>
</x-app-layout>
