<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;

class Article extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $fillable = array('*');

    protected $with = [
        'tags'
    ];

    protected static function boot()
    {
        parent::boot();

        static::addGlobalScope('order', function (Builder $builder) {
            $builder->orderBy('created_at', 'desc');
        });
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    public function tags()
    {
        return $this->belongsToMany(Tag::class);
    }

    public function getShortTextAttribute()
    {
        return mb_strimwidth($this->text, 0, 100, "...");
    }

    public static function getAll($limit = 0)
    {
        $query = Article::query();

        if($limit) {
            $query->limit($limit);
        }

        return $query->get();
    }

    public static function getBySlug($slug)
    {
        return Article::where('url', $slug)->first();
    }

    public static function likesIncrement($articleId)
    {
        $article = Article::find($articleId);
        $article->likes = $article->likes+1;
        $article->save();

        return $article->likes;
    }

    public static function viewsIncrement($articleId)
    {
        $article = Article::find($articleId);
        $article->views = $article->views+1;
        $article->save();

        return $article->views;
    }
}
