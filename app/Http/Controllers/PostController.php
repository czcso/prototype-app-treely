<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function actually_update_post(Post $post, Request $request) {
        if (auth()->guard('web')->user()->id !== $post['user_id']) {
            return redirect('/');
        }
        
        $incomingFields = $request->validate([
            'title' => 'required',
            'body' => 'required'
        ]);

        $incomingFields['title'] = strip_tags($incomingFields['title']);
        $incomingFields['body'] = strip_tags($incomingFields['body']);

        $post->update($incomingFields);
        return redirect('/');
    }

    public function show_edit_screen(Post $post) {
        if (auth()->guard('web')->user()->id !== $post['user_id']) {
            return redirect('/');
        }
        
        return view('edit-post', ['post' => $post]);
    }

    public function create_post(Request $request) {
        $incomingFields = $request->validate([
            'title' => 'required',
            'body' => 'required'
        ]);

        $incomingFields['title'] = strip_tags($incomingFields['title']);
        $incomingFields['body'] = strip_tags($incomingFields['body']);
        
        $incomingFields['user_id'] = auth()->guard('web')->id();

        Post::create($incomingFields);

        return redirect('/');
    }
}
