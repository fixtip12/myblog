<?php

namespace App\Http\Controllers;

//==========ここから追加==========
use App\Article;
use App\Http\Requests\ArticleRequest;
//==========ここまで追加==========
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ArticleController extends Controller
{
     //==========ここまで追加========== 

    public function index()
    {
        //==========ここから追加==========
        $articles = Article::all()->sortByDesc('created_at');
        //==========ここまで追加==========


        return view('articles.index', ['articles' => $articles]);
    }

    public function create()
    {
        return view('articles.create');    
    }

     //==========ここから追加==========
     public function store(ArticleRequest $request, Article $article)
     {
        $article->fill(array_merge(
            $request->validated(),
            ['user_id' => Auth::id()]
        ))->save();

        return redirect()->route('articles.index');
     }
     //==========ここまで追加==========

    public function edit(Article $article)
    {
        if(Auth::id() !== $article->user_id){
            return redirect()->route('articles.index')->with('error_message', '不正なアクセスです。');
        }
        return view('articles.edit', ['article' => $article]);    
    }
    //==========ここまで追加==========

    public function update(ArticleRequest $request, Article $article)
    {
        if(Auth::id() !== $article->user_id){
            return redirect()->route('articles.index')->with('error_message', '不正なアクセスです。');
        }
        $article->fill($request->validated())->save();
        return redirect()->route('articles.index');
    }

    public function destroy(Article $article)
    {
        if(Auth::id() !== $article->user_id){
            return redirect()->route('articles.index')->with('error_message', '不正なアクセスです。');
        }
        $article->delete();
        return redirect()->route('articles.index')->with('message', '記事を削除しました。');
    }

    public function show(Article $article)
    {
        return view('articles.show', ['article' => $article]);
    }    
}