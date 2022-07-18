<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    // get all posts
    public function index()
    {
        return Post::all();
    }

    public function myPost($id)
    {
        return Post::where('user_id', $id)->get();
    }

    public function find($id)
    {
        return Post::where('id', $id)->get();
    }

    public function search($title)
    {
        return Post::where('nama', 'like', '%' . $title . '%')->get();
    }

    // create post
    public function store()
    {
        request()->validate([
            'user_id' => 'required',
            'nama' => 'required',
            'prodi' => 'required',
            'matkul' => 'required',
            'nidn' => 'required',
            'bidang' => 'required'
        ]);

        return Post::create([
            'user_id' => request('user_id'),
            'nama' => request('nama'),
            'prodi' => request('prodi'),
            'matkul' => request('matkul'),
            'nidn' => request('nidn'),
            'bidang' => request('bidang')
        ]);
    }

    // update post
    public function update(Post $post)
    {
        request()->validate([
            'user_id' => 'required',
            'nama' => 'required',
            'prodi' => 'required',
            'matkul' => 'required',
            'nidn' => 'required',
            'bidang' => 'required'
        ]);

        $post->update([
            'user_id' => request('user_id'),
            'nama' => request('nama'),
            'prodi' => request('prodi'),
            'matkul' => request('matkul'),
            'nidn' => request('nidn'),
            'bidang' => request('bidang')
        ]);
    }

    // delete post
    public function destroy(Post $post)
    {
        $post->delete();
    }
}
