<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Category;
use App\Models\User;
use Illuminate\Support\Str;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $c = Category::get();
        $blog = Blog::latest()->paginate(4);
        // $blog = DB::table('blogs')
        //     ->join('categories', 'categories.id', '=', 'blogs.categoryId')->get();
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
        $b->slug = Str::slug($request->blogName);
        $b->categoryId = $request->categoryId;
        $b->user_id = auth()->user()->id;




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
        $blog = Blog::find($id);
        return view('blog.show', compact('blog'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {

        $authUser = Auth::user();

        $c = Category::all();
        $b = Blog::with(
            [
                'categories' => function ($q) {
                    $q->select(['id', 'categoryName', 'description',]);
                },


            ]
        )->find($id);
        $d = Blog::find($id);

        return view('blog.edit', compact('b', 'c', 'd'))->with('success', 'Blog Created successfully');
        if ($authUser->id == $b->user_id) {
        } else {
            return "You are not allowed to edit this blog";
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // if (Auth::user()->id == '1' || auth()->user()->id == $id) {
        $authUser = Auth::user();
        $b =  Blog::find($id);

        if ($authUser->id === $b->user_id) {
            // The authenticated user is the same as the user who created the post
            // Delete the post
            $b->blogName = $request->blogName;
            $b->slug = Str::slug($request->blogName);
            $b->blogDescription = $request->blogDescription;
            $b->categoryId = $request->categoryId;

            try {
                $b->save();
                return redirect(route('blog.index'))->with('success', 'Blog Created successfully');
            } catch (\Throwable $th) {
                throw $th;
            }

            // Redirect to the index page
            return redirect()->route('blog.index');
        } else {
            // The authenticated user is not the same as the user who created the post
            // Return a 403 Forbidden response
            abort(403);
        }


        // } 
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        // if (Auth::user()->id == '1' || auth()->user()->id == $id) {

        //     Blog::destroy($id);
        //     return redirect(route('blog.index'))->with('success', 'Blog delete successfully');
        // } else {
        //     return "You are not allowed to Delete this blog";
        // }
        // Get the authenticated user
        $authUser = Auth::user();

        // Get the post we want to delete
        $post = Blog::find($id);

        // Check if the authenticated user is the same as the user who created the post
        if ($authUser->id === $post->user_id) {
            // The authenticated user is the same as the user who created the post
            // Delete the post
            $post->delete();

            // Redirect to the index page
            return redirect()->route('blog.index');
        } else {
            // The authenticated user is not the same as the user who created the post
            // Return a 403 Forbidden response
            abort(403);
        }
    }

    public function view(string $id)
    {
        $blog = Blog::find($id);
        return view('blog.view', compact('blog'));
    }
}