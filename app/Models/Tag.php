<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    use HasFactory;

    public $timestamps = false;

    public function articles()
    {
        return $this->belongsToMany(Article::class);
    }

    public static function getArticlesBySlug($slug)
    {
        $tagId = Tag::getIdBySlug($slug);
       return Tag::find($tagId)->articles()->paginate(10);
    }

    public static function getIdBySlug($slug)
    {
        return Tag::where('url', $slug)->pluck('id')->first();
    }
}
