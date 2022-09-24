<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Post extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'posts';
    protected $guarded = false;
    protected $fillable = ['title', 'content', 'img_path', 'category_id'];

    public function category()
    {
        return $this->belongsTo(__NAMESPACE__ . '\PostCategory');
    }
}
