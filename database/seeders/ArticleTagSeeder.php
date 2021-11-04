<?php

namespace Database\Seeders;

use App\Models\Article;
use App\Models\Tag;
use Illuminate\Database\Seeder;

class ArticleTagSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // создать связи между статьями и тегами
        foreach(Article::all() as $articleKey => $article) {
            foreach(Tag::all() as $tagKey => $tag) {
                if($articleKey % 2 === 0 && $tagKey % 2 !== 0) {
                    $article->tags()->attach($tag->id);
                }
//                if (rand(1, 20) == 10) {
//                    $article->tags()->attach($tag->id);
//                }
            }
        }
    }
}
