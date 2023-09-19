<?php

namespace App\Http\Controllers;

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
    

}
