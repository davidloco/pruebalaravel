<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Article;
use App\Http\Requests\ArticleRequest;
use App\Exports\ArticlesExport;

class ArticleController extends Controller
{
    public function __construct() {
        return $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $articles = Article::paginate(8);
        return view('articles.index')->with('articles', $articles);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('articles.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ArticleRequest $request)
    {
        $article               = new article;
        $article->name         = $request->name;
        $article->description  = $request->description;
        if ($request->hasFile('image')) {
            $file = time().'.'.$request->image->extension();
            $request->image->move(public_path('imgs'), $file);
            $article->image = 'imgs/'.$file;
        }

        if ($article->save()) {
            return redirect('articles')->with('message', 'El Articulo: '.$article->name.' fue Adicionado con Exito!');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $article = Article::find($id);
        return view('articles.show')->with('article', $article);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $article = Article::find($id);
        return view('articles.edit')->with('article', $article);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $article = Article::find($id);
        $article->name  = $request->name;
        $article->description     = $request->description;
        if ($request->hasFile('image')) {
            $file = time().'.'.$request->image->extension();
            $request->image->move(public_path('imgs'), $file);
            $article->image = 'imgs/'.$file;
        }

        if ($article->save()) {
            return redirect('articles')->with('message', 'El Articulo: '.$article->name.' fue Modificado con Exito!');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
       $article = Article::find($id);
       if ($article->delete()) {
            return redirect('articles')->with('message', 'El Articulo: '.$article->name.' ha sido eliminado');
       }
    }

    
    public function pdf() {
        $articles = Article::all();
        $pdf = \PDF::loadView('articles.pdf', compact('articles'));
        return $pdf->download('articles.pdf');
    }

    public function excel() {
        return \Excel::download(new ArticlesExport, 'articles.xlsx');
    }
}
