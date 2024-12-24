<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\News;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $news = News::with('category')->get();
        $hot = News::with(['category'])
            ->where('is_breaking_news', 1)
            ->where('status', 1)
            ->where('is_approved', 1)
            ->orderBy('id', 'Desc')
            ->take(10)
            ->get();
            
        
        return view('home', compact(
            'hot',
            'user',
            'news',
        ));
    }
    public function news(Request $request)
    {
        $news = News::query();
        // dd($news);
        $news->when($request->has('category') && !empty($request->category), function ($query) use ($request) {
            $query->whereHas('category', function ($query) use ($request) {
                $query->where('slug', $request->category);
            });
        });
        $news->when($request->has('search'), function ($query) use ($request) {
            $query->where('title', 'like', '%' . $request->search . '%');
           
        });

        if ($request->has('view_all')) {
            $news = $news->paginate(4); // Lấy tất cả bài viết
        } else {
            $news = $news->paginate(4); // Lấy 4 bài viết mỗi trang (phân trang)
        }

        $news->appends($request->except('page'));

        $recentNews = News::with(['category'])
            ->activeEntries()
            ->orderBy('views', 'DESC')
            ->take(4)
            ->get();

        $query = $request->input('query');

        $categories = Category::where('status', 1)->get(); 

        $category = null;
        if($request->has('category')) {
            $category = Category::where('slug', $request->category)->first();
        }

            // dd($categories);

        return view('category', compact(
            'news', 
        'recentNews', 
                    'categories',
                    'category'
        ));
    }
    public function show_detail($category, $id)
    {
        $detail = News::findOrFail($id);
        $newsCategory = Category::findOrFail($detail->category_id);
        $news = News::with('category')->get();
        // dd($news);

        foreach($news  as $new){
            $new->detail_url = route('detail',['category'=>$new->category->name,'id'=>$new->id]);
        }

        if ($newsCategory->slug !== $category) {
            return abort(404); // Nếu danh mục không khớp, trả về 404
        }
        //  dd($newsCategory);

        return view('detail', [
            'detail' => $detail,
            'newsCategory' => $newsCategory,
            'news' => $news,
        ]);
    }
 
    


}
