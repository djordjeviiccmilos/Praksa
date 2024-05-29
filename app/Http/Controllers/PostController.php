<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    public function index() {
        $posts = Post::all();
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
}
