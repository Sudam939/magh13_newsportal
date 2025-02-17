<?php

namespace App\Http\Controllers\Api;

use App\Models\User;
use App\Models\Article;
use App\Models\Company;
use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Mail\EmailNotification;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;
use App\Http\Resources\ArticleResource;
use App\Http\Resources\CompanyResource;
use App\Http\Resources\CategoryResource;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class ApiController extends Controller
{
    public function company()
    {
        $company = Company::first();
        return new CompanyResource($company);
    }

    public function categories()
    {
        $categories = Category::where('status', true)->get();
        return CategoryResource::collection($categories);
    }

    public function category($slug)
    {
        $category = Category::where('slug', $slug)->first();
        if (!$category) {
            return response()->json([
                "message" => "Category not found"
            ], 400);
        }
        return new CategoryResource($category);
    }

    public function latest_news()
    {
        $latest_articles = Article::orderBy('id', 'desc')->where('status', "approved")->limit(5)->get();
        return ArticleResource::collection($latest_articles);
    }

    public function category_post(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nep_title' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json([
                "success" => false,
                "saved_category" => null,
                "message" => $validator->errors()
            ]);
        }

        $category = new Category();
        $category->nep_title = $request->nep_title;
        $category->eng_title = $request->eng_title;
        $category->slug = Str::slug($request->eng_title);
        $category->meta_keywords = $request->meta_keywords;
        $category->meta_description = $request->meta_description;
        $category->save();

        return response()->json([
            "success" => true,
            "saved_category" => new CategoryResource($category),
            "message" => "Category added successfully"
        ]);
    }
}
