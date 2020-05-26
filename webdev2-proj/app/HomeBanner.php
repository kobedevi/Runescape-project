<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class HomeBanner extends Model
{
    protected $table = 'homebanners';
    protected $fillable = ['position', 'color', 'title_eng', 'text_eng', 'title_nl', 'text_nl', 'image'];
}
