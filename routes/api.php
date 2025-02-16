<?php

use App\Http\Controllers\Api\ApiController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');


Route::get("/company", [ApiController::class, "company"]);
Route::get("/categories", [ApiController::class, "categories"]);
Route::get("/category/{slug}", [ApiController::class, "category"]);
Route::get("/latest-news", [ApiController::class, "latest_news"]);

Route::post("/category/post", [ApiController::class, "category_post"]);
