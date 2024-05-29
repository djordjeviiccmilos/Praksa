<x-app-layout>
    <div style="display: block; text-align: center; margin-top: 50px;">
        <form method="POST" action="{{ route('posts.store') }}" enctype="multipart/form-data" style="display: inline-block; margin-left: auto; margin-right: auto; text-align: left;">
            @csrf
            <!-- Post title -->
            <div class="mt-4">
                <x-input-label for="post_titles" :value="__('Post Title')" />
                <x-text-input id="post_titles" class="block mt-1" type="text" name="post_titles" :value="old('post_titles')" required autofocus />
            </div>

            <!-- Post Details -->
            <div class="mt-4">
                <x-input-label for="post_details" :value="__('Post Details')" />
                <textarea class="form-control" id="post_details" name="post_details" rows="4" style="resize: none;"></textarea>
            </div>

            <!-- Post Image -->
            <div class="mt-4">
                <x-input-label for="images" :value="__('Post Image')" />
                <input type="file" name="images" id="images">
            </div>

            <!-- Post category -->

            <div class="form-group mt-4">
                <x-input-label for="category_id">Category</x-input-label>
                <select class="form-control" id="category_id" name="category_id" required>
                    @foreach($categories as $category)
                        <option value="{{ $category->id }}">{{ $category->names }}</option>
                    @endforeach
                </select>
            </div>

            <x-primary-button class="mt-4 justify-center text-center">
                {{ __('Add post') }}
            </x-primary-button>
        </form>

        @if (session('success'))
            <div class="alert alert-success mt-3" role="alert">
                {{ session('success') }}
            </div>
        @endif
    </div>
</x-app-layout>
