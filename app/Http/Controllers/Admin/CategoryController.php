<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Imagick\Driver;
use File;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = Category::orderBy('name', 'asc')->get();
        return view('admin.pages.category.manage', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.pages.category.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $category = new Category();

        $this->validate($request, [
            'name'              => 'required',
            'short_desc'        => 'required',
            'status'            => 'required|numeric',
            'image'             => 'nullable|image',
        ],
        [
            'name.required'         => 'Please Type the Category Name',
            'short_desc.required'   => 'Please Type Category Details',
            'status.required'       => 'Please Select the Active Status',
            'image.required'        => 'Provide a Valid Format (.jpg, .jpeg, .png)'
        ]);

        $category->name          = $request->name;
        $category->slug          = Str::slug($request->name);
        $category->priority_num  = $request->priority_num;
        $category->short_desc    = $request->short_desc;
        $category->status        = $request->status;

        if ( $request->image ){

            $image = $request->file('image');
            $manager = new ImageManager(new Driver());
            $name_gen = time() . '-icon.' . $image->getClientOriginalExtension();
            $img = $manager->read($image);
            $img = $img->resize(80,80);
            $location = public_path("/../front-view/uploads/icon/" . $name_gen);
            $img->save($location);
            $category->icon = $name_gen;
            
        }

        // dd($category);

        $category->save();

        $notification = array(
            'message'       => 'Category Added Successfully',
            'alert-type'    => 'success',
        );

        return redirect()->route('category.manage')->with($notification);
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
        $category = Category::find($id);

        if ( !is_null( $category ) ){
            return view('admin.pages.category.edit', compact('category'));
        }
        
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $category = Category::find($id);

        if ( !is_null( $category ) ){
            $this->validate($request, [
                'name'              => 'required',
                'short_desc'        => 'required',
                'status'            => 'required|numeric',
                'image'             => 'nullable|image',
            ],
            [
                'name.required'         => 'Please Type the Category Name',
                'short_desc.required'   => 'Please Type Category Details',
                'status.required'       => 'Please Select the Active Status',
                'image.required'        => 'Provide a Valid Format (.jpg, .jpeg, .png)'
            ]);

            $category->name          = $request->name;
            $category->slug          = Str::slug($request->name);
            $category->priority_num  = $request->priority_num;
            $category->short_desc    = $request->short_desc;
            $category->status        = $request->status;

            if ( $request->image ){

                // Remove Old Image
                if ( File::exists('/../front-view/uploads/icon/' . $category->icon ) ){
                    File::delete('/../front-view/uploads/icon/' . $category->icon );
                }

                $image = $request->file('image');
                $manager = new ImageManager(new Driver());
                $name_gen = time() . '-icon.' . $image->getClientOriginalExtension();
                $img = $manager->read($image);
                $img = $img->resize(80,80);
                $location = public_path("/../front-view/uploads/icon/" . $name_gen);
                $img->save($location);
                $category->icon = $name_gen;
                
            }

            $category->save();

            $notification = array(
                'message'       => 'Category Updated Successfully',
                'alert-type'    => 'info',
            );

            return redirect()->route('category.manage')->with($notification);
        }

        
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $category = Category::find($id);

        if ( !is_null($category) ){
            $category->delete();

            $notification = array(
                'message'       => 'Category Deleted Successfully',
                'alert-type'    => 'error',
            );

            return redirect()->route('category.manage')->with($notification);

        }
    }
}
