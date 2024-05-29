<x-app-layout>
    <x-slot name="header" style="background-color: #1a202c !important;">
        <h2 class="font-semibold text-xl text-center fs-5 fw-bold text-black leading-tight text-black-900">
            {{ __('Dobrodosli na Newsportal') }}
        </h2>
    </x-slot>


    <div class="row mt-3 ml-4">


        @foreach($posts as $post)
            <div class="col-md-3 mb-3">
                <div class="card h-100">
                    <img class="card-img-top" src="{{ asset($post->images) }}" alt="Card image">
                    <div class="card-body">
                        <h5 class="card-title fs-7">Title: <span class="fw-bold">{{ $post->post_titles }}</span></h5>
                        <p class="card-text fs-7">Details:  <span class="fw-bold">{{ $post->post_details }}</span></p>
                        <p class="card-text fs-7">Category: <a class="text-primary" href="{{ route('posts.category', $post->category) }}">{{ $post->category->names }}</a></p>
                        <div class="text-xl-end">
                            <a href="{{ route('posts.show', $post->id) }}" class="btn btn-primary">Read More</a>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>

</x-app-layout>
