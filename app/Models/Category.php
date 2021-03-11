<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'slug',
        'status',

    ];

    public function posts()
    {
        // ekhane post model er vitor foreign key hisabe category_id ace ejonno relationship er vitor foreign key na bole dle o kaj hbe
        //return $this->hasMany('App\Models\Post');
        // Foreign key dle o kaj hbe
        return $this->hasMany('App\Models\Post','category_id','id');
    }

}
