<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Election') }}
        </h2>
    </x-slot>
    @if (!session('error'))
        <div class="py-5 text-gray-800 dark:text-gray-200">
            <div class="box-content py-4 text-center">
                <h1 class="text-4xl font-bold">{{ $error }}</h1>
            </div>
        </div>
    @endif
    <div class="grid grid-cols-2 py-5 text-gray-800 dark:text-gray-200">
        @foreach ($candidates as $candidate)
            <div class="box-content p-4 rounded-lg drop-shadow-xl text-center">
                <img src="/images/{{ $candidate->profilePicture }}" style="width: 428px; height: 428px;"
                    class="mx-auto block rounded-xl">
                <h1 class="text-center my-4 text-4xl font-bold">
                    {{ $candidate->name }}
                </h1>
                <p class="text-center my-2 font-bold"> Number of votes: {{ $candidate->voteCount }}</p>
            </div>
        @endforeach
    </div>

    <div class="flex justify-center pb-7">
        @if (!$error)
            @if (!session('error'))
                <a class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-7 rounded text-center"
                    href="/voting/{{ $electionData->id }}">
                    Vote Now
                </a>
            @else
                {{-- <button type="submit"
                    class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-7 rounded text-center"
                    onclick="return confirmation('/');">
                    Vote Now
                </button> --}}

                <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
                <script>
                    function confirmation(linkUrl) {
                        swal({
                                title: "Sorry, you have already voted",
                                text: "Click Back to return to Dashboard.",
                                icon: "warning",
                                buttons: {
                                    confirm: "Back"
                                },
                                dangerMode: true,
                            })
                            .then((isOkay) => {
                                if (isOkay) {
                                    window.location.href = linkUrl;
                                }
                            });
                        return false;
                    }

                    window.onload = function() {
                        confirmation('/')
                    }
                </script>
                <div>
                    <h1>ada error</h1>
                </div>
            @endif
        @else
            <a class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-7 rounded text-center" href="/">
                Return to Dashboard
            </a>
        @endif

    </div>
</x-app-layout>
