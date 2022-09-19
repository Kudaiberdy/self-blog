<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PostComment extends Model
{
    use HasFactory;

    protected $table = 'article_comments';
    protected $guarded = false;
    protected $fillable = ['body', 'post_id'];
}
