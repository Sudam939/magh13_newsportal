<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Article;
use App\Models\Category;
use App\Models\Company;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\View;

class PageController extends BaseController
{
    public function home()
    {
        $articles = Article::where('status', 'approved')->get();
        $latest_article = Article::orderBy('id', 'desc')->where('status', "approved")->first();
        $trending_articles = Article::orderBy('views', 'desc')->where('status', "approved")->limit(8)->get();
        return view('frontend.home', compact('articles', 'latest_article', 'trending_articles'));
    }

    public function category($slug)
    {
        // $category = Category::all();
        // $category = Category::where('slug',$slug)->get();
        $category = Category::where('slug', $slug)->first();
        $articles = $category->articles()->paginate(10);
        return view('frontend.category', compact('articles', 'category'));
    }

    public function article($id)
    {
        $article = Article::findOrFail($id);
        $cookie_data = Cookie::get("article$id");
        if (!$cookie_data) {
            $article->increment('views');
            Cookie::queue("article$id", $article->id);
        }
        return view('frontend.article', compact('article'));
    }


    public function search(Request $request)
    {
        $q = $request->q;
        $articles = Article::where('title', 'like', "%$q%")->orWhere('description', 'like', "%$q%")->where('status','approved')->paginate(8);
        if (count($articles) == 0) {
            return view('404page');
        }


        return view('frontend.search', compact('articles'));
    }
}
