<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use App\Article;
use App\Category;

class HomeController extends Controller
{

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $categories = Category::all();
        $categoriesFil = Category::all();
        $articles = Article::all();
        return view('home')->with('categories', $categories)->with('articles', $articles)->with('categoriesFil', $categoriesFil);
    }


    public function filter($id){
        $categoriesFil = Category::all();
        $categories = collect();
        $categories->push(Category::find($id));
        $articles = Article::all();
        return view('home')->with('categories', $categories)->with('articles', $articles)->with('categoriesFil', $categoriesFil);
    }
}
