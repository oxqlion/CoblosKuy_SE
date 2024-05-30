<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Election') }}
        </h2>
    </x-slot>
    <div class="grid grid-cols-2 py-5 text-gray-800 dark:text-gray-200">
        @foreach ($candidates as $candidate)
            <div class="box-content p-4 rounded-lg drop-shadow-xl text-center">
                <img src="/images/{{$candidate->profilePicture}}" style="width: 428px; height: 428px;" class="mx-auto block rounded-xl">
                <h1 class="text-center my-4 text-2xl font-bold">
                    {{ $candidate->name }}
                </h1>
                <p class="text-center my-4 font-bold"> {{$candidate->numberOfVotes}}</p>
                <div class="flex justify-center my-4">
                    <a href = "/candidatedetail/{{$candidate->id}}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded"> VIEW </a>
                </div>
            </div>
        @endforeach
    </div>
</x-app-layout>
