<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\News;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ProductApiController extends Controller
{
    public function index()
    {
        return response()->json(News::all());
    }
    public function details($new)
    {
        $new = News::findOrFail($new);
        // $new = News::where('id', $new)->get();
        return response()->json($new);
    }
    public function categories($category)
    {
        $new = News::where('category_id', $category)->get();
        return response()->json($new);
    }
    //add new
    public function csrftoken()
    {
        return csrf_token();
    }
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'image' => 'required',
            'content' => 'required',
        ]);

        $news = new News();
        $news->category_id = $request->category;
        $news->image = $request->image;
        $news->title = $request->title;
        $news->slug = Str::slug($request->title);
        $news->content = $request->content;
        $news->is_breaking_news = $request->is_breaking_news == 1 ? 1 : 0;
        $news->is_approved = $request->is_approved == 1 ? 1 : 0;
        $news->status = $request->status == 1 ? 1 : 0;
        $news->save();

        return response()->json(['data' => $news, 'message' => 'added successfully'], 200);
    }
    public function update(Request $request, $id)
    {
        // $news = News::findOrFail($id);

        // $news->category_id = $request->category;
        //  $news->image = $request->image;
        // $news->title = $request->title;
        // $news->slug = Str::slug($request->title);
        // $news->content = $request->content;
        // $news->is_breaking_news = $request->is_breaking_news == 1 ? 1 : 0;
        // $news->is_approved = $request->is_approved == 1 ? 1 : 0;
        // $news->status = $request->status == 1 ? 1 : 0;
        // $news->save();

        // return response()->json(['data' => $news, 'message' => 'update successfully'], 200);


        News::find($id)->update([
            'category_id' => $request->category,
            'image' => $request->image,
            'title' => $request->title,
            'slug' => Str::slug($request->slug),
            'content' => $request->content,
            'is_breaking_news' => $request->is_breaking_news == 1 ? 1 : 0,
            'is_approved' => $request->is_approved == 1 ? 1 : 0,
            'status' => $request->status == 1 ? 1 : 0,
        ]);
        return response()->json(['message' => 'update successfully'], 200);
    }
    public function destroy($id)
    {
        $news = News::find($id);
        if (!$news) {
            return response()->json(['message' => 'News not found'], 404);
        }
        $news->delete();
        return response()->json(['message' => 'Delete successfully'], 200);
    }
}
