<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Page extends Model
{
    protected $table = 'pages';
    protected $fillable = ['slug_en', 'slug_nl', 'title_en', 'intro_en', 'text_en', 'title_nl', 'intro_nl', 'text_nl', 'active'];
}
