<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Article;
use Illuminate\Validation\Rule;

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

    public function store(Request $request)
    {
        $data = $this->validate($request, [
            'name' => 'required|unique:articles',
            'body' => 'required|min:400',
        ]);
        $article = new Article();
        $article->fill($data);
        $article->save();
        return redirect()->route('articles.index')->with('status', 'The article has been created successfully');
    }

    public function update(Request $request, $id)
    {
        $article = Article::findOrFail($id);
        $data = $this->validate($request, [
            'name' => [
                'required',
                Rule::unique('articles', 'name')->ignore($article->id),
            ],
            'body' => 'required|min:400',
        ]);
        $article->fill($data);
        $article->save();
        return redirect()->route('articles.index')->with('status', 'The article has been updated successfully');
    }

    public function edit($id)
    {
        $article = Article::findOrFail($id);
        return view('article.edit', compact('article'));
    }
}
