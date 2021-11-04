<?php

namespace App\Http\Controllers;

use App\Models\Tag;
use Illuminate\Http\Request;

class TagController extends Controller
{
    public function tag($slug)
    {
        $articles = Tag::getArticlesBySlug($slug);

        return view('articles')->withArticles($articles);
    }
}
