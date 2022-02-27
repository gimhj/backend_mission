<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    public function __construct()
    {
        $this->authorizeResource(Article::class, 'article');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $articles = Article::with('user', 'likes')
            ->isOpen()
            ->orderBy('id', 'desc')
            ->get();

        return view('articles.index', [ 'articles' => $articles ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $article = new Article();

        return view('articles.create', [ 'article' => $article ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Article $article)
    {
        $title = $request->get('title');
        $userId = $request->user()->id;
        $status = $request->get('status');
        $body = $request->get('body');

        $article->user_id = $userId;
        $article->title = $title;
        $article->status = $status;
        $article->body = $body;
        $article->save();

        return redirect()->route('articles.show', $article);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function show(Article $article)
    {
        return view('articles.show', ['article' => $article]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function edit(Article $article)
    {
        return view('articles.edit', ['article' => $article]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Article  $article
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, Article $article)
    {
        $title = $request->get('title');
        $userId = $request->user()->id;
        $status = $request->get('status');
        $body = $request->get('body');

        $article->user_id = $userId;
        $article->title = $title;
        $article->status = $status;
        $article->body = $body;
        $article->save();

        return redirect()->route('articles.show', $article);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Article  $article
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Article $article)
    {
        $article->delete();

        return redirect()->route('articles.index');
    }
}
