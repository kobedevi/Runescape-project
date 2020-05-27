<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    protected $table = 'news';
    protected $fillable = ['title_en', 'intro_en', 'text_en', 'title_nl', 'intro_nl', 'text_nl', 'image'];
}
