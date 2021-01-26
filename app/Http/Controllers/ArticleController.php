<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Article;
use App\Http\Requests\ArticleRequest;

class ArticleController extends Controller
{
    public function index()
    {
        $articles = Article::paginate();
        return view('article.index', compact('articles'));
    }

    public function show($id)
    {
        $article = Article::findOrFail($id);
        return view('article.show', compact('article'));
    }

    public function create()
    {
        $article = new Article();
        return view('article.create', compact('article'));
    }

    public function store(ArticleRequest $request)
    {
        $article = new Article();
        $article->fill($request->all());
        $article->save();
        return redirect()->route('articles.index')->with('status', 'The article has been created successfully');
    }

    public function update(ArticleRequest $request, $id)
    {
        $article = Article::findOrFail($id);
        $article->fill($request->all());
        $article->save();
        return redirect()->route('articles.index')->with('status', 'The article has been updated successfully');
    }

    public function edit($id)
    {
        $article = Article::findOrFail($id);
        return view('article.edit', compact('article'));
    }

    public function destroy($id)
    {
        $article = Article::find($id);
        if ($article) {
            $article->delete();
        }
        return redirect()->route('articles.index')->with('status', 'The article has been deleted successfully');
    }
}
