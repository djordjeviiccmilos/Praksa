<x-app-layout>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header"><h2 class="text-center fs-3 fw-bold">{{ $post->post_titles }}</h2></div>
                    <img src="{{ asset($post->images) }}" alt="Post Image" style="max-width: 100%; height: auto;">

                    <div class="card-body">
                        <p>{{ $post->post_details }}</p>
                    </div>
                </div>

                <div class="card mt-4">
                    <div class="card-header">Comments</div>

                    <div class="card-body">
                        <!-- Display Comments -->
                        @foreach($post->comments as $comment)
                            <div class="mb-3">
                                <p><strong>{{ $comment->user->name }}</strong>: {{ $comment->comments }}</p>
                            </div>
                        @endforeach

                        <!-- Add Comment Form -->
                        <form method="POST" action="{{ route('comments.store') }}">
                            @csrf
                            <input type="hidden" name="post_id" value="{{ $post->id }}">
                            <div class="form-group">
                                <label for="comments">Add Comment</label>
                                <textarea class="form-control" id="comments" name="comments" rows="3" required></textarea>
                            </div>
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
