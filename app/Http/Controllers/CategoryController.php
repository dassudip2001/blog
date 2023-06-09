<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use SebastianBergmann\Diff\Exception;
use function Termwind\render;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $b = Category::latest()->paginate(5);
        return view('category.create', compact('b'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        $b = new Category();
        $b->categoryName = $request->categoryName;
        $b->description = $request->description;
        $b->user_id = auth()->user()->id;


        try {
            $b->save();
            return redirect(route('category.index'))->with('success', 'Category  Created successfully');
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
        $b = Category::find($id);
        return view('category.edit', compact('b'))->with('success', 'Category Created successfully');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $b =  Category::find($id);
        $b->categoryName = $request->categoryName;
        $b->description = $request->description;

        try {
            $b->save();
            return redirect(route('category.index'))->with('success', 'Category Created successfully');
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Category::destroy($id);
        return redirect(route('category.index'))->with('success', 'Category delete successfully');
    }
}