<x-layout>
    <div class="container-fluid p-5 bg-info text-center text-white">
        <div class="row justify-content-center">
            <h1 class="display-1">
                The Aulab Post
            </h1>
        </div>
    </div>
    @if (session('message'))
        <div class="alert alert-succes">
            {{ session('message') }}
        </div>
    @endif
</x-layout>