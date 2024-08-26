<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Category;
use App\Models\Post;

class AdminPagesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories     = Category::orderBy('name', 'asc')->get();
        $posts          = Post::orderBy('title', 'asc')->get();
        $editors        = User::orderBy('id', 'desc')->where('role', 2)->get();
        $visitors       = User::orderBy('id', 'desc')->where('role', 3)->get();
        return view('admin.pages.dashboard', compact('categories', 'posts', 'editors', 'visitors'));
    }

    
    public function visitor()
    {
        $visitors      = User::orderBy('id', 'desc')->where('role', 3)->get();
        return view('admin.pages.visitor.manage', compact('visitors'));
    }
    
    public function visitorDestroy(string $id)
    {
        $visitor = User::find($id);

        if ( !is_null( $user ) ){
            $user->delete();

            $notification = array(
                'message'       => 'Visitor Deleted Successfully',
                'alert-type'    => 'warning',
            );

            return redirect()->route('visitor.manage')->with($notification);
        }
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
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
