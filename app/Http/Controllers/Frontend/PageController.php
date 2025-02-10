<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Article;
use App\Models\Category;
use App\Models\Company;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;

class PageController extends Controller
{

    public function __construct()
    {
        $company = Company::first();
        $categories = Category::where('status',true)->get();

        View::share([
            "company" => $company,
            "categories" => $categories,
        ]);
    }

    public function home()
    {
        $articles = Article::where('status', 'approved')->get();
        $latest_article = Article::orderBy('id','desc')->where('status',"approved")->first();
        $trending_articles = Article::orderBy('views','desc')->where('status',"approved")->limit(8)->get();
        return view('frontend.home', compact('articles','latest_article','trending_articles'));
    }
}
