<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\News;
use App\Models\Category;
use Illuminate\Http\Request;


class HomeController extends Controller
{
    public function index()
    {
        $hot = News::with(['category'])
            ->where('is_breaking_news', 1)
            ->where('status', 1)
            ->where('is_approved', 1)
            ->orderBy('id', 'Desc')
            ->take(10)
            ->get();

        // $mostViewedPosts = News::activeEntries()
        // ->orderBy('views','DESC')
        // ->take(4)
        // ->get();

        return view('home', compact(
            'hot',
            // 'mostViewedPosts',
        ));
    }
    public function news(Request $request)
    {
        //    var_export();
        $news = News::query();

        // echo $request->search;
        // $news = $news->where('id', 8)->get();
        $news->when($request->has('category') && !empty($request->category), function ($query) use ($request) {
            $query->whereHas('category', function ($query) use ($request) {
                $query->where('slug', $request->category);
            });
        });
        $news->when($request->has('search'), function ($query) use ($request) {
            // $query->whereHas('category', function ($query) use ($request) {
            $query->where('title', 'like', '%' . $request->search . '%');
            // echo $request->search;
            // });
        });
        // $news->where('status', 1);
        // echo $news->toSql();
        // $news = $news->get();
        // exit();
        // echo $news->toSql();
        $news = $news->paginate(4);

        // dd($news);

        $recentNews = News::with(['category'])
            ->activeEntries()
            ->orderBy('views', 'DESC')
            ->take(4)
            ->get();

        $query = $request->input('query');
        // $news = News::Where('title', 'LIKE', '%($query)%')
        //     ->orWhere('content', 'LIKE', '%($query)%')
        //     ->get();


        $categories = Category::where(['status' => 1])
            ->get();
        return view('category', compact('news', 'recentNews', 'categories'));
    }
    public function show_detail($category, $id)
    {
        $detail = News::findOrFail($id);
        $newsCategory = Category::findOrFail($detail->category_id);

        if ($newsCategory->slug !== $category) {
            return abort(404); // Nếu danh mục không khớp, trả về 404
        }

        return view('detail', [
            'detail' => $detail,
            'newsCategory' => $newsCategory
        ]);
    }


}
