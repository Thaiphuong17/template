<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = Category::all();
        return view('admin.dashboard.index_category', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.dashboard.create_categories');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|max: 255',
            'slug' => 'required|max: 255',
            'show_at_nav' => 'required|boolean',
            'status' => 'required|boolean',
        ]);
        Category::create($request->all());
        return redirect()->route('categories')->with('success', 'Tạo danh mục thành công!!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Category $category)
    {
        return view('admin.dashboard.edit_categories', ['category' => $category]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Category $category)
    {
        $request->validate([
            'name' => 'required',
            'slug' => 'required|unique:categories,slug,' . $category->id,
            'show_at_nav' => 'required|boolean',
            'status' => 'required|boolean',
        ]);
        $category->update($request->all());
        return redirect()->route('categories')->with('success','Tin của bạn đã được chỉnh sửa!!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {
        try {
            $category->delete();
            return redirect()->route('categories')->with('success', 'Danh mục đã được xóa!!');
        } catch (\Exception $e) {
            return redirect()->route('categories')->with('error', 'Đã xảy ra lỗi!!' . $e);
        }


    }
}
