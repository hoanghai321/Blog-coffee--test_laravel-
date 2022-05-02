<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\CategoryPost;

class Post extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $fillable = [
        'title',
        'image',
        'short_desc',
        'desc',
        'post_category_id'
    ];
    public function category(){
        return $this->belongsTo('App\Models\CategoryPost', 'post_category_id');
    }
}
