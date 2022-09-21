<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PostCategory extends Model
{
    use HasFactory;

    protected $table = 'post_categories';
    protected $guarded = false;
    protected $fillable = ['name', 'description'];

    public function posts()
    {
        return $this->hasMany(__NAMESPACE__ . '\Post', 'category_id');
    }
}
