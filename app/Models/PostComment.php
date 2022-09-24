<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PostComment extends Model
{
    use HasFactory;

    protected $table = 'posts_comments';
    protected $guarded = false;
    protected $fillable = ['body', 'post_id', 'img_path'];
}
