<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Page;

class PagesController extends Controller
{
    public function getIndex($language, $slug=null){
        // get active pages, where given slug equals nl/en slug

        $post = Page::where('active', 1)
        ->Where(function($query) use($slug)
        {
            $query->where('slug_en',$slug)
                  ->orWhere('slug_nl', $slug);
        })
        ->firstOrFail();        
        
        return view('page', compact(['post', 'slug']));
    }
}
