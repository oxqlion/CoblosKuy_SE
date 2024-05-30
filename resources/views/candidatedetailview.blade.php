<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __($candidateDetail->name) }}
        </h2>
    </x-slot>
    <div class="py-5 text-gray-800 dark:text-gray-200 grid grid-cols-2">
        <div class="box-content py-4 drop-shadow-xl text-center">
            <img src="/images/{{$candidateDetail->profilePicture}}" style="width: 428px; height: 428px;"
                class="mx-auto block rounded-xl">
        </div>
        <div class="box-content py-4 align-middle pe-10">
            <h1 class="my-4 text-4xl font-bold">
                {{ $candidateDetail->name }}
            </h1>
            <h3 class="my-4 text-xl font-semibold"> Mission </h3>
            <p class = "mb-6"> {{$candidateDetail->mission}}</p>
            <h3 class="my-4 text-xl font-semibold"> Vision </h3>
            <p> Vision: {{$candidateDetail->vision}}</p>
            <div class="my-4">
                <form action="/vote/{{$candidateDetail->id}}" method="POST" onsubmit="return confirmation(this);">
                    @method('post')
                    @csrf
                    <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded"> VOTE
                    </button>
                </form>
            </div>
        </div>
    </div>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script>
        function confirmation(form){
            swal({
                title: "Are you sure?",
                text: "Click OK to confirm your choice.",
                icon: "warning",
                buttons: true,
                dangerMode: true,
            })
            .then((isOkay) => {
                if(isOkay) {
                    form.submit();
                }
            });
            return false;
        }
    </script>
</x-app-layout>