<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostApiController extends Controller
{
   
   public function index()
   {
    return Post::all();
   }

   public function store()
   {
    request()->validate([
        'title' => 'required',
        'content' => 'required',
    ]);
    return Post::create([
        'title' => request('title'),
        'content' => request('content'),
    ]);
   }

   public function update(Post $post)
   {
    request()->validate([
        'title' => 'required',
        'content' => 'required',
    ]);
    $updation =  $post->update([
        'title' => request('title'),
        'content' => request('content'),
    ]);
    if($updation){
        return "Update Successful";
    }
    else{
        return "Update Failed";
    }
   }

   public function delete(Post $post)
   {
    $deletion =  $post->delete();
    if($deletion){
        return "Delete Successful";
    }
    else{
        return "Delete Failed";
    }
   }
}
