<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Post;
use Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Imagick\Driver;
use File;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $posts = Post::orderBy('id', 'desc')->get();
        return view('admin.pages.post.manage', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::orderBy('name', 'asc')->get();
        return view('admin.pages.post.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $post = new Post();

        $this->validate($request, [
            'title'             => 'required',
            'category_id'       => 'required',
            'post_desc'         => 'required',
            'status'            => 'required|numeric',
            'image'             => 'nullable|image',
        ],
        [
            'title.required'        => 'Please Type the News Title',
            'category_id.required'  => 'Please Select the Category Name',
            'short_desc.required'   => 'Please Type Category Details',
            'status.required'       => 'Please Select the Active Status',
            'image.required'        => 'Provide a Valid Format (.jpg, .jpeg, .png)'
        ]);

        $post->title            = $request->title;
        $post->highlight_line   = $request->highlight_line;
        $post->slug             = Str::slug($request->title);
        $post->category_id      = $request->category_id;
        $post->post_desc        = $request->post_desc;
        $post->status           = $request->status;
        $post->tags             = $request->tags;
        $post->author_id        = Auth::user()->id;

        if ( $request->image ){

            $image = $request->file('image');
            $manager = new ImageManager(new Driver());
            $name_gen = time() . '-icon.' . $image->getClientOriginalExtension();
            $img = $manager->read($image);
            $img = $img->resize(750,560);
            $location = public_path("uploads/news/" . $name_gen);
            $img->save($location);
            $post->image = $name_gen;
            
        }

        // dd($category);

        $post->save();

        $notification = array(
            'message'       => 'News Added Successfully',
            'alert-type'    => 'success',
        );

        return redirect()->route('post.manage')->with($notification);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $post = Post::find($id);

        if ( !is_null( $post ) ){
            $categories = Category::orderBy('name', 'asc')->get();
            return view('admin.pages.post.edit', compact('categories', 'post'));
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $post = Post::find($id);

        if ( !is_null( $post ) ){
            $this->validate($request, [
                'title'             => 'required',
                'category_id'       => 'required',
                'post_desc'         => 'required',
                'status'            => 'required|numeric',
                'image'             => 'nullable|image',
            ],
            [
                'title.required'        => 'Please Type the News Title',
                'category_id.required'  => 'Please Select the Category Name',
                'short_desc.required'   => 'Please Type Category Details',
                'status.required'       => 'Please Select the Active Status',
                'image.required'        => 'Provide a Valid Format (.jpg, .jpeg, .png)'
            ]);

            $post->title            = $request->title;
            $post->highlight_line   = $request->highlight_line;
            $post->slug             = Str::slug($request->title);
            $post->category_id      = $request->category_id;
            $post->post_desc        = $request->post_desc;
            $post->status           = $request->status;
            $post->tags             = $request->tags;
            $post->author_id        = Auth::user()->id;

            if ( $request->image ){

                // Remove Old Image
                if ( File::exists('uploads/news/' . $post->image ) ){
                    File::delete('uploads/news/' . $post->image );
                }

                $image = $request->file('image');
                $manager = new ImageManager(new Driver());
                $name_gen = time() . '-icon.' . $image->getClientOriginalExtension();
                $img = $manager->read($image);
                $img = $img->resize(750,560);
                $location = public_path("uploads/news/" . $name_gen);
                $img->save($location);
                $post->image = $name_gen;
                
            }

            // dd($category);

            $post->save();

            $notification = array(
                'message'       => 'News Updated Successfully',
                'alert-type'    => 'warning',
            );

            return redirect()->route('post.manage')->with($notification);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $post = Post::find($id);

        if ( !is_null($post) ){
            $post->delete();

            $notification = array(
                'message'       => 'News Deleted Successfully',
                'alert-type'    => 'error',
            );

            return redirect()->route('post.manage')->with($notification);

        }
    }
}
