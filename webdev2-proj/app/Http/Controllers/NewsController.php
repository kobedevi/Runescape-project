<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\News;
class NewsController extends Controller
{
    public function getIndex() {
        $blogs = News::orderBy('id', 'DESC')->paginate(10);

        // month arrays to translate dates
        $enmonths = array('january', 'february', 'march', 'april', 'may', 'june', 'july', 'august', 'september', 'october', 'november', 'december'); 
        $nlmonths = array('januari', 'februari', 'maart', 'april', 'mei', 'juni', 'juli', 'augustus', 'september', 'oktober', 'november', 'december');

        return view('news', compact('blogs', 'enmonths', 'nlmonths'));
    }

    public function getDetail($lang, $slug = null) {
        // get detail page where given slug = nl/en slug in database
        $post = News::where('slug_en',$slug)->orWhere('slug_nl', $slug)->firstOrFail();

        return view('newsDetail', compact(['post', 'slug']));
    }
}
