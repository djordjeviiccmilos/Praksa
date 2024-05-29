<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Comment;
use App\Models\Post;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    public function index() {
        $posts = Post::with('category')->get();
        return view('dashboard', compact('posts'));
    }

    public function create() {
        $categories = Category::all();
        return view('posts.create', compact('categories'));
    }

    public function store(Request $request) {

        $validated = $request->validate([
            'post_titles' => 'required | string | max:255',
            'post_details' => 'required | string ',
            'images' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'category_id' => 'required | integer | exists:categories,id',
        ]);


        $post = new Post([
            'post_titles' => $validated['post_titles'],
            'post_details' => $validated['post_details'],
            'category_id' => $validated['category_id'],
        ]);

        $imgPath = $request->file('images')->store('images', 'public');
        $validated['images'] = $imgPath;
        $post->images = $validated['images'];

        $user = Auth::user();

        $post['user_id'] = $user['id'];
        $post['created_by'] = $user['id'];
        $post['updated_by'] = $user['id'];
        $post['posting_dates'] = Carbon::now();

        $post->save();

        $request->session()->flash('status', 'Post created successfully!');

        return redirect('/posts/create');
    }

    public function show($id) {
        $post = Post::with('comments')->findOrFail($id);
        return view('posts.show', compact('post'));
    }

    public function storeComment(Request $request) {
        $validated = $request->validate([
            'post_id' => 'required|integer|exists:posts,id',
            'comments' => 'required|string|max:255',
        ]);

        $user = Auth::user();

        $comment = new Comment([
            'post_id' => $validated['post_id'],
            'comments' => $validated['comments'],
        ]);

        $comment['comment_dates'] = Carbon::now();
        $comment['created_by'] = $user['id'];
        $comment['updated_by'] = $user['id'];
        $comment['created_at'] = Carbon::now();
        $comment['updated_at'] = Carbon::now();

        $comment->save();

        return back()->with('success', 'Comment created successfully!');
    }

    public function filterByCategory(Category $category) {
        $posts = $category->posts()->with('category')->get();
        $categories = Category::all();

        return view('dashboard', compact('posts', 'categories'));
    }
}
