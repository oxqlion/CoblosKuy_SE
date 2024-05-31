<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Vote a Candidate') }}
        </h2>
    </x-slot>

    <div class="px-16 py-8">
        <a href="/electiondetail/{{ $electionData->id }}"
            class="inline-block mb-4 bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded">
             BACK
        </a>
    </div>

    @if (session('error'))
        <div class="py-5 text-gray-800 dark:text-gray-200">
            <div class="box-content py-4 text-center">
                <h1 class="text-4xl font-bold">{{ session('error') }}</h1>
            </div>
        </div>
    @else
        <div class="py-5 text-gray-800 dark:text-gray-200">
            @foreach ($candidates as $candidate)
                <div class="py-5 text-gray-800 dark:text-gray-200 grid grid-cols-2">
                    <div class="box-content py-4 drop-shadow-xl text-center">
                        <img src="/images/{{ $candidate->profilePicture }}" style="width: 300px; height: 300px;"
                            class="mx-auto block rounded-xl">
                    </div>
                    <div class="box-content py-4 align-middle pe-10">
                        <h1 class="my-4 text-xl font-bold">
                            {{ $candidate->name }}
                        </h1>
                        <h3 class="my-4 text-md font-semibold"> Mission </h3>
                        <p class = "mb-6"> {{ $candidate->mission }}</p>
                        <h3 class="my-4 text-md font-semibold"> Vision </h3>
                        <p class = ""> Vision: {{ $candidate->vision }}</p>
                        <div class="my-4 text-xl">
                            <form action="/vote/{{ $candidate->id }}" method="POST"
                                onsubmit="return confirmation(this);">
                                @method('post')
                                @csrf
                                <button type="submit"
                                    class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded"> VOTE
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    @endif
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script>
        function confirmation(form) {
            swal({
                    title: "Are you sure?",
                    text: "Click OK to confirm your choice.",
                    icon: "warning",
                    buttons: true,
                    dangerMode: true,
                })
                .then((isOkay) => {
                    if (isOkay) {
                        form.submit();
                    }
                });
            return false;
        }
    </script>
</x-app-layout>
