<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Http;
use App\Http\Controllers\PostController;
use Illuminate\Http\Request;
use App\Models\Post;


class PostController extends Controller
{
    public function getRequest() {


        $response = Http::get("https://jsonplaceholder.typicode.com/posts");

        $entry = json_decode($response->body());
        foreach($entry as $data)
        {
            $post = new Post();
            $post->userId = $data->userId;
            $post->title = $data->title;
            $post->body = $data->body;
            $post->save();
    
        }
        return response()->json([
            'status'=>200,
            'data'=>$response

        ]);

        

    }
 
}
