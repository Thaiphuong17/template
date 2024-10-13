<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\News;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $news = News::query()->orderBy('id','DESC')->paginate(5);
        return view('admin.dashboard.index_news', compact('news'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::all();
        return view('admin.dashboard.create_news', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'slug' => 'required|unique:news,slug',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'content' => 'required',
            'status' => 'required|boolean',
            'is_breaking_news' => 'required|boolean',
            'category_id' => 'required|exists:categories,id',
        ]);

        // $imagePath = null;
        // if ($request->hasFile('image')) {
        //     $imagePath = $request->file('image')->store('news_images', 'public');
        // }
        $imagePath = null;
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = $image->getClientOriginalName(); // Đặt tên tệp
            $image->move(public_path('Frontend/assets/img/trending/'), $imageName); // Di chuyển tệp đến thư mục mong muốn
            $imagePath = 'img/trending/' . $imageName; // Lưu đường dẫn tệp
        }
        News::create([
            'title' => $request->title,
            'slug' => $request->slug,
            'image' => $imagePath,
            'content' => $request->content,
            'status' => $request->status,
            'is_breaking_news' => $request->is_breaking_news,
            'views' => 0,
            'category_id' => $request->category_id,
        ]);
        return redirect()->route('admin_news')->with('success', 'Tin tức đã được thêm thành công!');
    }

    /**
     * Display the specified resource.
     */
    public function show(News $news)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(News $news)
{
    $categories = Category::all(); // Lấy tất cả categories
    return view('admin.dashboard.edit_news', compact('news', 'categories')); // Truyền cả categories vào view
}

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, News $news)
    {
        $request->validate([
            'title' => 'required',
            'slug' => 'required|unique:news,slug,' . $news->id,
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'content' => 'required',
            'status' => 'required|boolean',
            'is_breaking_news' => 'required|boolean',
        ]);

        // Xử lý upload hình ảnh nếu có
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('news_images', 'public');
            $news->image = $imagePath;
        }

        $news->update([
            'title' => $request->title,
            'slug' => $request->slug,
            'content' => $request->content,
            'status' => $request->status,
            'is_breaking_news' => $request->is_breaking_news,
        ]);

        return redirect()->route('admin_news')->with('success', 'Tin tức đã được cập nhật thành công!');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(News $news)
    {
        $news->delete();

        return redirect()->route('admin_news')->with('success', 'Tin tức đã được xóa thành công!');
    }
}
