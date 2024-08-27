<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\Request;

class FrontendPagesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function homepage()
    {
        $head_post = Post::where("status", 1)->latest()->first();
        $sub_posts = Post::where("status", 1)->latest()->skip(0)->take(3)->get();
        $all_posts = Post::where("status", 1)->latest()->get();
        $posts = collect($all_posts)->splice(4)->all();

        // dd($sub_posts, $records, $head_post);
        // $post1 = Post::where("status",1)->latest()->first();
        return view('frontend.pages.homepage', compact('posts', 'sub_posts', 'head_post'));
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
