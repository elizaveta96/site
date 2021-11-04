<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Article;
use App\Jobs\SaveComment;

class ArticlesController extends Controller
{
    public function articles()
    {
        $articles = Article::paginate(10);

        return view('articles')->withArticles($articles);
    }

    public function show($slug)
    {
        $article = Article::getBySlug($slug);

        return view('article')->withArticle($article);
    }

    public function like(Request $request)
    {
        $likes = Article::likesIncrement($request->post('id'));

        return response()->json(['likes' => $likes], 200);
    }

    public static function updateViews(Request $request)
    {
        $views = Article::viewsIncrement($request->post('id'));

        return response()->json(['views' => $views], 200);
    }

    public static function addComment(Request $request)
    {
        $data = $request->except('_token');

        $request->validate([
            'identifier' => 'required|exists:articles,id',
            'subject' => 'required|string|max:255',
            'body' => 'required'
        ], [
            'required' => 'Поле обязательно для заполнения',
            'string' => 'Неверный формат данных',
            'subject.max' => 'Тема письма не должна превышать 255 символов'
        ]);

        SaveComment::dispatch($data);
        return response()->json(['success' => true], 200);
    }
}
