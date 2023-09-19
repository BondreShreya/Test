<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use App\Models\Posts;


class PostsController extends Controller
{
    public function index(Request $request)
    {
        // Send HTTP request and retrieve response
        $response = Http::get('https://jsonplaceholder.typicode.com/posts');

        // Check if the request was successful
        if ($response->successful()) {
            // Get the JSON data from the response
            $data = $response->json();

            // Loop through the data and create records in the 'Posts' model
            foreach ($data as $item) {
                    if (isset($item['userId'])) {
                    Posts::create([
                        'userId' => $item['userId'],
                        'title' => $item['title'],
                        'body' => $item['body'],
                    ]);
                }

            }
        } else {
            // Handle the case when the API request is not successful
            return response()->json(['error' => 'API request failed'], 500);
        }

        // Retrieve all posts from the 'Posts' model
        $posts = Posts::all();

        // Return a view with the retrieved posts
        return view('index', ['posts' => $posts]);
    }

    public function show($id)
    {
        // Retrieve the post by its 'id'
        $post = Posts::find($id);

        // Check if the post exists
        if (!$post) {
            // Handle the case when the post is not found 
            abort(404);
        }

        // Pass the post to the view and display it
        return view('show', ['post' => $post]);
    }
    
    // Add a post to a user's bookmarks
    
    public function bookmarkPost(Request $request, $post_id)
    {
        // Get the authenticated user
        $user = Auth::user();

        if (!$user) {
            // Handle the case when the user is not authenticated
            return redirect()->route('login')->with('error', 'You must be logged in to bookmark a post.');
        }

        // Check if the post is already bookmarked by the user
        if ($user->bookmarks->contains($post_id)) {
            // Handle the case when the post is already bookmarked
            return redirect()->back()->with('error', 'This post is already bookmarked.');
        }

        // Bookmark the post
        $user->bookmarks()->attach($post_id);

        // Redirect the user to the bookmarks list view
        return redirect()->route('bookmarks_view')->with('success', 'Post bookmarked successfully.');
    }

    // Retrieve a user's bookmarks
    public function viewBookmarks()
    {
        // Get the authenticated user
        $user = Auth::user();

        if (!$user) {
            // Handle the case when the user is not authenticated
            return redirect()->route('login')->with('error', 'You must be logged in to view bookmarks.');
        }

        // Retrieve the user's bookmarks
        $bookmarks = $user->bookmarks;

        return view('bookmarks_view', ['bookmarks' => $bookmarks]);
    }




}
