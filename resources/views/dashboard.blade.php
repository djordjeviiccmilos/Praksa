<x-app-layout>
    <x-slot name="header" style="background-color: #1a202c !important;">
        <h2 class="font-semibold text-xl text-center fs-5 fw-bold text-black leading-tight text-black-900">
            {{ __('Dobrodosli na Newsportal') }}
        </h2>
    </x-slot>


    @foreach($posts as $post)
        <div class="card" style="width:400px">
            <img class="card-img-top" src="{{ asset($post->images) }}" alt="Card image">
            <div class="card-body">
                <h4 class="card-title">{{ $post->post_titles }}</h4>
                <p class="card-text">{{ $post->post_details }}</p>
                <a href="#" class="btn btn-primary">See Profile</a>
            </div>
        </div>
    @endforeach

</x-app-layout>
