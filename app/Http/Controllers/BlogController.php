<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $c = Category::get();
        $blog = DB::table('blogs')
            ->join('categories', 'categories.id', '=', 'blogs.categoryId')->get();
        return view('blog.create', compact('blog', 'c'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        $b = new Blog();
        $b->blogName = $request->blogName;
        $b->blogDescription = $request->blogDescription;
        $b->categoryId = $request->categoryId;



        try {
            $b->save();
            return redirect(route('blog.index'))->with('success', 'Blog Created successfully');
        } catch (\Throwable $th) {
            throw $th;
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
        $b = Blog::find($id);
        return view('blog.edit', compact('b'))->with('success', 'Blog Created successfully');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $b =  Blog::find($id);
        $b->blogName = $request->blogName;
        $b->blogDescription = $request->blogDescription;
        $b->categoryId = $request->categoryId;

        try {
            $b->save();
            return redirect(route('blog.index'))->with('success', 'Blog Created successfully');
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Blog::destroy($id);
        return redirect(route('blog.index'))->with('success', 'Blog delete successfully');
    }
}