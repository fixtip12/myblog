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

    public function index()
    {
        //==========ここから削除==========
        // ダミーデータ
        $articles = [
            (object) [
                'id' => 1,
                'title' => 'タイトル1',
                'body' => '本文1',
                'created_at' => now(),
                'user' => (object) [
                    'id' => 1,
                    'name' => 'ユーザー名1',
                ],
            ],
            (object) [
                'id' => 2,
                'title' => 'タイトル2',
                'body' => '本文2',
                'created_at' => now(),
                'user' => (object) [
                    'id' => 2,
                    'name' => 'ユーザー名2',
                ],
            ],
            (object) [
                'id' => 3,
                'title' => 'タイトル3',
                'body' => '本文3',
                'created_at' => now(),
                'user' => (object) [
                    'id' => 3,
                    'name' => 'ユーザー名3',
                ],
            ],
        ];
        //==========ここまで削除==========
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
        return view('articles.edit', ['article' => $article]);    
    }
    //==========ここまで追加==========
}