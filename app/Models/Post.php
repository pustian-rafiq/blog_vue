<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'category_id',
        'title',
        'content',
        'thumbnail',
        'status',
    ];
    public function category(){
        return $this->belongsTo('App\Models\Category')->select('id','name','slug');
    }
    public function user(){
        return $this->belongsTo('App\Models\User')->select('id','name','email');
    }
}
