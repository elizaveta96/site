<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $fillable = array('*');

    public static function saveComment($data)
    {
        Comment::insert([
            'article_id' => $data['identifier'],
            'subject' => $data['subject'],
            'body' => $data['body'],
        ]);
    }
}
